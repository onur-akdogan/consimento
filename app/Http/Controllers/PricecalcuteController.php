<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TasimaTeklifi;
use App\Models\Ulke;
use DB;
use Auth;   
use App\Models\PriceOffer;
use App\Models\Company;
class PricecalcuteController extends Controller
{
    public function index(){
        $ulkes=Ulke::get();

        return view("pages.pricecalcute",compact("ulkes"));
    }


 





    public function priceofferindex(){
    
    // Giriş yapan kullanıcının admin olup olmadığını kontrol et
    if (Auth::user()->is_admin) {
        // Admin ise: Tüm teklifleri, ilişkili kullanıcı bilgisiyle birlikte al
        $offers = PriceOffer::with('user')->latest()->paginate(15);
        
        // Admin için tüm şirketleri al
        $companies = Company::all();
        
    } else {
        // Normal kullanıcı ise: Sadece kendi şirketine uygun teklifleri al
        $offers = $this->getOffersForMyCompany(Auth::id());
        
        // Kendi şirketini al
        $companies = Company::where('user_id', Auth::id())->get();
    }
    
    $ulkes = Ulke::get();
    $teklifler = TasimaTeklifi::get();
    
    return view("pages.priceofferindex", compact("ulkes", "teklifler", "offers", "companies"));
}

/**
 * Kullanıcının şirketine uygun teklifleri getiren fonksiyon
 */
private function getOffersForMyCompany($userId)
{
    // Kullanıcının şirketini al
    $userCompany = Company::where('user_id', $userId)->first();
    
    if (!$userCompany) {
        // Şirket yoksa boş collection döndür
        return collect();
    }
    
    // Tüm teklifleri al
    $allOffers = PriceOffer::with('user')->latest()->get();
    
    $matchingOffers = collect();
    
    foreach ($allOffers as $offer) {
        // Bu teklif şirketimize uygun mu kontrol et
        if ($this->isOfferSuitableForCompany($offer, $userCompany)) {
            $matchingOffers->push($offer);
        }
    }
    
    // Collection'ı paginate et
    $page = request()->get('page', 1);
    $perPage = 15;
    $offset = ($page - 1) * $perPage;
    
    $paginatedOffers = new \Illuminate\Pagination\LengthAwarePaginator(
        $matchingOffers->slice($offset, $perPage)->values(),
        $matchingOffers->count(),
        $perPage,
        $page,
        ['path' => request()->url(), 'pageName' => 'page']
    );
    
    return $paginatedOffers;
}

/**
 * Bir teklifin şirkete uygun olup olmadığını kontrol eden fonksiyon
 */
private function isOfferSuitableForCompany($offer, $company)
{
    $decodedDetails = $this->safeJsonDecode($offer->details);
    $serviceTypes = $this->safeJsonDecode($company->service_types);
    
    switch ($offer->offer_type) {
        case 'Kargo ve Paket Taşımacılığı':
            // Kara yolu veya parsiyel hizmet veriyor mu?
            return array_intersect(['kara', 'parsiyel'], $serviceTypes) ? true : false;
            
        case 'Konteyner Taşımacılığı':
            // Deniz yolu hizmet veriyor mu?
            return in_array('deniz', $serviceTypes);
            
        case 'Uluslararası Evden Eve Taşımacılık':
            // UK partner'ı var mı?
            if (!$company->has_uk_partner) return false;
            
            // Hedef UK ise deniz veya hava yolu gerekli
            if (isset($decodedDetails['Nereye (Ülke/Şehir)'])) {
                $destination = $decodedDetails['Nereye (Ülke/Şehir)'];
                if (stripos($destination, 'UK') !== false || stripos($destination, 'İngiltere') !== false) {
                    return array_intersect(['deniz', 'hava'], $serviceTypes) ? true : false;
                }
            }
            return true;
            
        case 'Yeni Mobilya Taşımacılığı':
            // Kara yolu veya parsiyel hizmet veriyor mu?
            if (!array_intersect(['kara', 'parsiyel'], $serviceTypes)) return false;
            
            // Mobilya kabul ediyor mu?
            return (stripos($company->accepted_product_types, 'mobilya') !== false || 
                    stripos($company->accepted_product_types, 'genel') !== false);
                    
        case 'Ticari Eşya Taşımacılığı':
            // Nakliye türüne göre kontrol
            if (isset($decodedDetails['Nakliye Türü'])) {
                $transportType = strtolower($decodedDetails['Nakliye Türü']);
                switch ($transportType) {
                    case 'hava':
                        if (!in_array('hava', $serviceTypes)) return false;
                        break;
                    case 'deniz':
                        if (!in_array('deniz', $serviceTypes)) return false;
                        break;
                    default:
                        if (!in_array('kara', $serviceTypes)) return false;
                }
            }
            
            // Gümrükleme hizmeti gerekirse
            if (isset($decodedDetails['İhracat/İthalat Beyannamesi']) && 
                $decodedDetails['İhracat/İthalat Beyannamesi'] === 'Gerekli') {
                return $company->provides_customs_service;
            }
            return true;
            
        case 'Komple Tır':
            // Kara yolu hizmet veriyor mu?
            if (!in_array('kara', $serviceTypes)) return false;
            
            // Yükün türüne göre kontrol
            if (isset($decodedDetails['Yükün Türü'])) {
                $productType = $decodedDetails['Yükün Türü'];
                if (stripos($company->accepted_product_types, $productType) === false &&
                    stripos($company->accepted_product_types, 'genel') === false) {
                    return false;
                }
            }
            
            // ADR (tehlikeli madde) kontrolü
            if (isset($decodedDetails['Tehlikeli Madde (ADR)']) && 
                $decodedDetails['Tehlikeli Madde (ADR)'] !== 'yok') {
                return (stripos($company->certificates, 'ADR') !== false || 
                        stripos($company->additional_info, 'tehlikeli') !== false);
            }
            return true;
            
        case 'Minivan Taşımacılığı':
            // UK partner'ı var mı ve kara yolu hizmet veriyor mu?
            if (!$company->has_uk_partner || !in_array('kara', $serviceTypes)) return false;
            
            // ADR kontrolü
            if (isset($decodedDetails['ADR (Tehlikeli Madde) Bilgisi']) && 
                $decodedDetails['ADR (Tehlikeli Madde) Bilgisi'] === 'Var') {
                return (stripos($company->certificates, 'ADR') !== false || 
                        stripos($company->additional_info, 'tehlikeli') !== false);
            }
            return true;
            
        case 'Araç ve Motosiklet Taşımacılığı':
            // Kara yolu hizmet veriyor mu?
            if (!in_array('kara', $serviceTypes)) return false;
            
            // Araç taşıma ekipmanı var mı?
            return (stripos($company->accepted_product_types, 'araç') !== false || 
                    stripos($company->accepted_product_types, 'otomobil') !== false ||
                    stripos($company->accepted_product_types, 'motosiklet') !== false ||
                    stripos($company->equipment_types, 'araç taşıyıcı') !== false);
                    
        case 'E-Ticaret Taşımacılığı':
            // Kara/parsiyel/hava yolu hizmet veriyor mu?
            if (!array_intersect(['kara', 'parsiyel', 'hava'], $serviceTypes)) return false;
            
            // E-ticaret deneyimi var mı?
            return (stripos($company->additional_info, 'e-ticaret') !== false || 
                    stripos($company->additional_info, 'hızlı teslimat') !== false ||
                    stripos($company->service_types, 'express') !== false);
    }
    
    return false;
}

/**
 * JSON verisini güvenli şekilde decode eden yardımcı fonksiyon
 */
private function safeJsonDecode($data, $associative = true)
{
    if (is_array($data)) {
        return $data; // Zaten array ise olduğu gibi döndür
    }
    
    if (is_string($data)) {
        $decoded = json_decode($data, $associative);
        return $decoded ?: []; // JSON decode başarısızsa boş array döndür
    }
    
    return []; // Diğer durumlar için boş array
}

/**
 * Teklif türüne göre uygun şirketleri bulan fonksiyon
 */
private function findCompaniesByOfferType($offerType, $details)
{
    // Güvenli JSON decode
    $decodedDetails = $this->safeJsonDecode($details);
    
    $query = Company::query();
    
    switch ($offerType) {
        case 'Kargo ve Paket Taşımacılığı':
            // Kara yolu taşımacılığı yapan şirketler
            $query->whereJsonContains('service_types', 'kara')
                  ->orWhereJsonContains('service_types', 'parsiyel');
            break;
            
        case 'Konteyner Taşımacılığı':
            // Deniz yolu taşımacılığı yapan şirketler
            $query->whereJsonContains('service_types', 'deniz');
            
            // Konteyner tipine göre filtrele
            if (isset($decodedDetails['Konteyner Tipi'])) {
                // Burada konteyner kapasitesine göre ek filtreleme yapılabilir
            }
            break;
            
        case 'Uluslararası Evden Eve Taşımacılık':
            // Uluslararası taşımacılık yapan şirketler (UK partner'ı olanlar)
            $query->where('has_uk_partner', true);
            
            // Hedef ülkeye/şehire göre filtrele
            if (isset($decodedDetails['Nereye (Ülke/Şehir)'])) {
                $destination = $decodedDetails['Nereye (Ülke/Şehir)'];
                if (stripos($destination, 'UK') !== false || stripos($destination, 'İngiltere') !== false) {
                    $query->whereJsonContains('service_types', 'deniz')
                          ->orWhereJsonContains('service_types', 'hava');
                }
            }
            break;
            
        case 'Yeni Mobilya Taşımacılığı':
            // Mobilya taşımacılığı - kara yolu ve parsiyel
            $query->whereJsonContains('service_types', 'kara')
                  ->orWhereJsonContains('service_types', 'parsiyel');
                  
            // Mobilya kabul eden şirketler
            $query->where(function($q) {
                $q->where('accepted_product_types', 'LIKE', '%mobilya%')
                  ->orWhere('accepted_product_types', 'LIKE', '%Mobilya%')
                  ->orWhere('accepted_product_types', 'LIKE', '%genel%');
            });
            break;
            
        case 'Ticari Eşya Taşımacılığı':
            // Nakliye türüne göre filtrele
            if (isset($decodedDetails['Nakliye Türü'])) {
                $transportType = strtolower($decodedDetails['Nakliye Türü']);
                switch ($transportType) {
                    case 'hava':
                        $query->whereJsonContains('service_types', 'hava');
                        break;
                    case 'deniz':
                        $query->whereJsonContains('service_types', 'deniz');
                        break;
                    default:
                        $query->whereJsonContains('service_types', 'kara');
                }
            }
            
            // Gümrükleme hizmeti gerekirse
            if (isset($decodedDetails['İhracat/İthalat Beyannamesi']) && 
                $decodedDetails['İhracat/İthalat Beyannamesi'] === 'Gerekli') {
                $query->where('provides_customs_service', true);
            }
            break;
            
        case 'Komple Tır':
            // Tam kamyon yükü - kara yolu
            $query->whereJsonContains('service_types', 'kara');
            
            // Yükün türüne göre filtrele
            if (isset($decodedDetails['Yükün Türü'])) {
                $productType = $decodedDetails['Yükün Türü'];
                $query->where(function($q) use ($productType) {
                    $q->where('accepted_product_types', 'LIKE', "%{$productType}%")
                      ->orWhere('accepted_product_types', 'LIKE', '%genel%');
                });
            }
            
            // ADR (tehlikeli madde) kontrolü
            if (isset($decodedDetails['Tehlikeli Madde (ADR)']) && 
                $decodedDetails['Tehlikeli Madde (ADR)'] !== 'yok') {
                $query->where(function($q) {
                    $q->where('certificates', 'LIKE', '%ADR%')
                      ->orWhere('additional_info', 'LIKE', '%tehlikeli%')
                      ->orWhere('additional_info', 'LIKE', '%ADR%');
                });
            }
            break;
            
        case 'Minivan Taşımacılığı':
            // UK taşımacılığı - UK partner'ı olan şirketler
            $query->where('has_uk_partner', true)
                  ->whereJsonContains('service_types', 'kara');
                  
            // ADR kontrolü
            if (isset($decodedDetails['ADR (Tehlikeli Madde) Bilgisi']) && 
                $decodedDetails['ADR (Tehlikeli Madde) Bilgisi'] === 'Var') {
                $query->where(function($q) {
                    $q->where('certificates', 'LIKE', '%ADR%')
                      ->orWhere('additional_info', 'LIKE', '%tehlikeli%');
                });
            }
            break;
            
        case 'Araç ve Motosiklet Taşımacılığı':
            // Araç taşımacılığı - özel ekipman gereken kara yolu taşımacılığı
            $query->whereJsonContains('service_types', 'kara');
            
            // Araç taşıyıcı ekipmanı olan şirketler
            $query->where(function($q) {
                $q->where('accepted_product_types', 'LIKE', '%araç%')
                  ->orWhere('accepted_product_types', 'LIKE', '%otomobil%')
                  ->orWhere('accepted_product_types', 'LIKE', '%motosiklet%')
                  ->orWhere('equipment_types', 'LIKE', '%araç taşıyıcı%')
                  ->orWhere('equipment_types', 'LIKE', '%car carrier%');
            });
            
            // Araç türüne göre filtrele
            if (isset($decodedDetails['Araç Türü'])) {
                $vehicleType = $decodedDetails['Araç Türü'];
                $query->where('accepted_product_types', 'LIKE', "%{$vehicleType}%");
            }
            break;
            
        case 'E-Ticaret Taşımacılığı':
            // E-ticaret için genelde kargo ve hızlı teslimat
            $query->whereJsonContains('service_types', 'kara')
                  ->orWhereJsonContains('service_types', 'parsiyel')
                  ->orWhereJsonContains('service_types', 'hava');
            
            // E-ticaret hizmeti veren şirketler
            $query->where(function($q) {
                $q->where('additional_info', 'LIKE', '%e-ticaret%')
                  ->orWhere('additional_info', 'LIKE', '%hızlı teslimat%')
                  ->orWhere('additional_info', 'LIKE', '%same day%')
                  ->orWhere('service_types', 'LIKE', '%express%');
            });
            
            // Paket boyutuna göre filtrele
            if (isset($decodedDetails['Paket Boyutu'])) {
                // Küçük paketler için özel filtreleme
            }
            break;
    }
    
    return $query->get();
}

/**
 * Teklif ile şirket eşleştirme skorunu hesaplayan fonksiyon
 */
public function calculateMatchingScore($offer, $company)
{
    $score = 0;
    
    // Güvenli JSON decode
    $decodedDetails = $this->safeJsonDecode($offer->details);
    $serviceTypes = $this->safeJsonDecode($company->service_types);
    
    // Temel hizmet türü eşleşmesi (40 puan)
    $offerServiceMap = [
        'Kargo ve Paket Taşımacılığı' => ['kara', 'parsiyel'],
        'Konteyner Taşımacılığı' => ['deniz'],
        'Uluslararası Evden Eve Taşımacılık' => ['deniz', 'hava'],
        'Ticari Eşya Taşımacılığı' => ['kara', 'deniz', 'hava'],
        'Komple Tır' => ['kara'],
        'Minivan Taşımacılığı' => ['kara'],
        'Araç ve Motosiklet Taşımacılığı' => ['kara'],
        'E-Ticaret Taşımacılığı' => ['kara', 'parsiyel', 'hava']
    ];
    
    if (isset($offerServiceMap[$offer->offer_type])) {
        $requiredServices = $offerServiceMap[$offer->offer_type];
        $matchingServices = array_intersect($requiredServices, $serviceTypes);
        $score += count($matchingServices) * 20;
    }
    
    // UK partner kontrolü (20 puan)
    if (in_array($offer->offer_type, ['Uluslararası Evden Eve Taşımacılık', 'Minivan Taşımacılığı'])) {
        if ($company->has_uk_partner) {
            $score += 20;
        }
    }
    
    // Gümrükleme hizmeti (15 puan)
    if (isset($decodedDetails['Gümrükleme']) || 
        isset($decodedDetails['İhracat/İthalat Beyannamesi']) ||
        isset($decodedDetails['Gümrük İşlemleri'])) {
        if ($company->provides_customs_service) {
            $score += 15;
        }
    }
    
    // Ürün tipi eşleşmesi (15 puan)
    if (isset($decodedDetails['Yükün Türü']) || isset($decodedDetails['İçerik Açıklaması'])) {
        $productType = $decodedDetails['Yükün Türü'] ?? $decodedDetails['İçerik Açıklaması'] ?? '';
        if (stripos($company->accepted_product_types, $productType) !== false || 
            stripos($company->accepted_product_types, 'genel') !== false) {
            $score += 15;
        }
    }
    
    // Coğrafi konum eşleşmesi (10 puan)
    if (isset($decodedDetails['Nereden']) || isset($decodedDetails['Nereden (Şehir)'])) {
        $origin = $decodedDetails['Nereden'] ?? $decodedDetails['Nereden (Şehir)'] ?? '';
        if (stripos($company->address, $origin) !== false || 
            stripos($company->shipping_capacity, $origin) !== false) {
            $score += 10;
        }
    }
    
    return $score;
}

/**
 * En iyi eşleşen şirketleri getiren fonksiyon
 */
public function getBestMatchingCompanies($offerId, $limit = 5)
{
    $offer = PriceOffer::find($offerId);
    if (!$offer) return collect();
    
    $companies = $this->findCompaniesByOfferType($offer->offer_type, $offer->details);
    
    // Şirketleri eşleşme skoruna göre sırala
    $companiesWithScores = $companies->map(function ($company) use ($offer) {
        $company->matching_score = $this->calculateMatchingScore($offer, $company);
        return $company;
    })->sortByDesc('matching_score');
    
    return $companiesWithScores->take($limit);
}



























    public function hesapla(Request $request)
    {
        $request->validate([
            'ulke' => 'required|string',
            'agirlik' => 'required|numeric|min:0.1',
            'en' => 'nullable|numeric|min:1', 
            'boy' => 'nullable|numeric|min:1',
            'yukseklik' => 'nullable|numeric|min:1',
        ]);
        $ulkes=Ulke::get();

        $ulke = $request->input('ulke');
        $agirlik = $request->input('agirlik');
        $en = $request->input('en');
        $boy = $request->input('boy');
        $yukseklik = $request->input('yukseklik');
    
        $hacimselAgirlik = null;
        $ucreteEsasAgirlik = $agirlik;
    
        if ($en && $boy && $yukseklik) {
            $hacimselAgirlik = ($en * $boy * $yukseklik) / 3000;
            $ucreteEsasAgirlik = max($agirlik, $hacimselAgirlik);
        }
    
        // Adminin belirlediği fiyatlardan uygun olanları al
        $fiyatlar = TasimaTeklifi::where('ulke', $ulke)
            ->where('min_kg', '<=', $ucreteEsasAgirlik)
            ->where('max_kg', '>=', $ucreteEsasAgirlik)
            ->orderBy('fiyat') 
            ->get();
            
         return view('pages.pricecalcute', [
            'agirlik' => $agirlik,
            'en' => $en,
            'boy' => $boy,
            'yukseklik' => $yukseklik,
            'hacimselAgirlik' => $hacimselAgirlik ? number_format($hacimselAgirlik, 2) : null,
            'ucreteEsasAgirlik' => number_format($ucreteEsasAgirlik, 2),
            'fiyatlar' => $fiyatlar,
            'ulkes' => $ulkes,

            
        ]);
    }
    
}
