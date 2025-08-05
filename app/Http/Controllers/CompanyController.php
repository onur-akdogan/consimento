<?php

// app/Http/Controllers/CompanyController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $companies = $user->companies; // ilişki üzerinden alırsan daha verimli

        if ($companies->isEmpty()) {
            return redirect()->route('companies.create')->with('warning', 'İlk olarak firma eklemelisiniz.');
        }

        return view('pages.companies.index', compact('companies'));
    }

    public function create()
    {
        return view('pages.companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_name' => 'nullable|string|max:255',
            'tax_number' => 'nullable|string|max:50',
            'establishment_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'website' => 'nullable|url|max:255',
            'contact_person' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'service_types' => 'nullable|array',
            'service_types.*' => 'string|in:kara,hava,deniz,parsiyel',
            'shipping_capacity' => 'nullable|string|max:255',
            'accepted_product_types' => 'nullable|string',
            'uk_regions' => 'nullable|string',
            'has_uk_partner' => 'nullable|boolean',
            'partner_company_name' => 'nullable|string|max:255',
            'provides_customs_service' => 'nullable|boolean',
            'certificates' => 'nullable|string',
            'certificate_files' => 'nullable|array',
            'certificate_files.*' => 'file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240', // 10MB max
            'additional_info' => 'nullable|string',
        ]);

        // Sertifika dosyalarını yükle
        $certificateFilePaths = [];
        if ($request->hasFile('certificate_files')) {
            foreach ($request->file('certificate_files') as $file) {
                $path = $file->store('certificates', 'public');
                $certificateFilePaths[] = $path;
            }
        }

        Company::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'brand_name' => $request->brand_name,
            'tax_number' => $request->tax_number,
            'establishment_year' => $request->establishment_year,
            'website' => $request->website,
            'contact_person' => $request->contact_person,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'service_types' => $request->service_types, // Laravel otomatik JSON'a çevirir
            'shipping_capacity' => $request->shipping_capacity,
            'accepted_product_types' => $request->accepted_product_types,
            'uk_regions' => $request->uk_regions,
            'has_uk_partner' => $request->has_uk_partner,
            'partner_company_name' => $request->partner_company_name,
            'provides_customs_service' => $request->provides_customs_service,
            'certificates' => $request->certificates,
            'certificate_files' => $certificateFilePaths, // Laravel otomatik JSON'a çevirir
            'additional_info' => $request->additional_info,
        ]);
         return redirect()->route('companies.index')->with('success', 'Firma başarıyla eklendi.');
    }

    public function show(Company $company)
    {
        // Kullanıcının kendi firmasını görüntülediğinden emin ol
        if ($company->user_id !== Auth::id()) {
            abort(403, 'Bu firmayı görüntüleme yetkiniz yok.');
        }

        return view('pages.companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        // Kullanıcının kendi firmasını düzenlediğinden emin ol
        if ($company->user_id !== Auth::id()) {
            abort(403, 'Bu firmayı düzenleme yetkiniz yok.');
        }

        return view('pages.companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        // Kullanıcının kendi firmasını güncellediğinden emin ol
        if ($company->user_id !== Auth::id()) {
            abort(403, 'Bu firmayı güncelleme yetkiniz yok.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'brand_name' => 'nullable|string|max:255',
            'tax_number' => 'nullable|string|max:50',
            'establishment_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'website' => 'nullable|url|max:255',
            'contact_person' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'service_types' => 'nullable|array',
            'service_types.*' => 'string|in:kara,hava,deniz,parsiyel',
            'shipping_capacity' => 'nullable|string|max:255',
            'accepted_product_types' => 'nullable|string',
            'uk_regions' => 'nullable|string',
            'has_uk_partner' => 'nullable|boolean',
            'partner_company_name' => 'nullable|string|max:255',
            'provides_customs_service' => 'nullable|boolean',
            'certificates' => 'nullable|string',
            'certificate_files' => 'nullable|array',
            'certificate_files.*' => 'file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240', // 10MB max
            'additional_info' => 'nullable|string',
        ]);

        // Mevcut sertifika dosyalarını al
        $existingFiles = $company->certificate_files ?: [];
        $certificateFilePaths = $existingFiles;

        // Yeni sertifika dosyalarını yükle
        if ($request->hasFile('certificate_files')) {
            foreach ($request->file('certificate_files') as $file) {
                $path = $file->store('certificates', 'public');
                $certificateFilePaths[] = $path;
            }
        }

        $company->update([
            'name' => $request->name,
            'brand_name' => $request->brand_name,
            'tax_number' => $request->tax_number,
            'establishment_year' => $request->establishment_year,
            'website' => $request->website,
            'contact_person' => $request->contact_person,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'service_types' => $request->service_types, // Laravel otomatik JSON'a çevirir
            'shipping_capacity' => $request->shipping_capacity,
            'accepted_product_types' => $request->accepted_product_types,
            'uk_regions' => $request->uk_regions,
            'has_uk_partner' => $request->has_uk_partner,
            'partner_company_name' => $request->partner_company_name,
            'provides_customs_service' => $request->provides_customs_service,
            'certificates' => $request->certificates,
            'certificate_files' => $certificateFilePaths, // Laravel otomatik JSON'a çevirir
            'additional_info' => $request->additional_info,
        ]);

        return redirect()->route('companies.show', $company)->with('success', 'Firma bilgileri başarıyla güncellendi.');
    }

    public function destroy( $id)
    {
        $company = Company::findOrFail($id);

        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Firma başarıyla silindi.');
    }

    /**
     * Sertifika dosyasını sil
     */
    public function deleteCertificateFile(Company $company, $fileIndex)
    {
        // Kullanıcının kendi firmasını düzenlediğinden emin ol
        if ($company->user_id !== Auth::id()) {
            abort(403, 'Bu işlemi yapma yetkiniz yok.');
        }

        $files = $company->certificate_files ?: [];
        
        if (isset($files[$fileIndex])) {
            // Dosyayı diskten sil
            Storage::disk('public')->delete($files[$fileIndex]);
            
            // Array'den kaldır
            unset($files[$fileIndex]);
            $files = array_values($files); // Index'leri yeniden düzenle
            
            // Veritabanını güncelle
            $company->update([
                'certificate_files' => $files
            ]);
        }

        return back()->with('success', 'Sertifika dosyası silindi.');
    }
}