<?php

namespace App\Http\Controllers;
use App\Models\PriceOffer; // <-- BU SATIR EKSİKTİ

use App\Models\Ulke;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // <-- EKLENMESİ GEREKEN SATIR BU
use Auth;
class PriceOfferController extends Controller
{
    public function index(){
        $ulkes=Ulke::get();
        return view("pages.priceoffer",compact("ulkes"));
    }

    public function indexadmin()
    {
        // Giriş yapan kullanıcının admin olup olmadığını kontrol et
        if (Auth::user()->is_admin) {
            // Admin ise: Tüm teklifleri, ilişkili kullanıcı bilgisiyle birlikte al.
            // latest() -> en yeni olanı en üste getirir.
            // paginate() -> Sayfalama yapar, sayfa başına 15 kayıt gösterir.
            $offers = PriceOffer::with('user')->latest()->paginate(15);
        } else {
            // Normal kullanıcı ise: Sadece kendi tekliflerini al.
            $offers = PriceOffer::where('user_id', Auth::id())->latest()->paginate(15);
        }
         // Verileri 'price_offers.index' view'ine gönder
        return view('pages.price_offers', compact('offers'));
    }


    /**
     * Store a newly created price offer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'offer_type' => 'required|string|max:255',
            'details' => 'required|array'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        try {
            PriceOffer::create([
                'user_id' => Auth::id(), // Giriş yapmış kullanıcının ID'si
                'offer_type' => $request->input('offer_type'),
                'details' => $request->input('details'), // Modeldeki $casts sayesinde Laravel bunu JSON'a çevirecek
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Talebiniz başarıyla alınmıştır. En kısa sürede sizinle iletişime geçeceğiz.'
            ]);

        } catch (\Exception $e) {
            // Hata durumunda loglama ve genel bir hata mesajı döndürme
            report($e);
            return response()->json(['success' => false, 'message' => 'Bir hata oluştu. Lütfen tekrar deneyin.'], 500);
        }
    }
}
