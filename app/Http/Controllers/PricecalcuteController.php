<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TasimaTeklifi;
use DB;
class PricecalcuteController extends Controller
{
    public function index(){
        return view("pages.pricecalcute");
    }
    public function hesapla(Request $request)
    {
        // Giriş doğrulaması
        $request->validate([
            'agirlik' => 'required|numeric|min:0.1',
            'en' => 'required|numeric|min:1',
            'boy' => 'required|numeric|min:1',
            'yukseklik' => 'required|numeric|min:1',
        ]);
    
        // Girdi verileri
        $agirlik = $request->input('agirlik');
        $en = $request->input('en');
        $boy = $request->input('boy');
        $yukseklik = $request->input('yukseklik');
    
        // Hacimsel ağırlık hesaplama (Desi): cm cinsinden / 3000
        $hacimselAgirlik = ($en * $boy * $yukseklik) / 3000;
    
        // Ücrete esas ağırlık
        $ucreteEsasAgirlik = max($agirlik, $hacimselAgirlik);
     
        // Veritabanından fiyat tekliflerini çek (Query Builder ile)
        $fiyatlar = DB::table('tasima_teklifleri')->get(); // stdClass koleksiyonu
    
        return view('pages.pricecalcute', [
            'agirlik' => $agirlik,
            'en' => $en,
            'boy' => $boy,
            'yukseklik' => $yukseklik,
            'hacimselAgirlik' => number_format($hacimselAgirlik, 2),
            'ucreteEsasAgirlik' => number_format($ucreteEsasAgirlik, 2),
            'fiyatlar' => $fiyatlar // Blade içinde -> ile erişilmeli
        ]);
    }
}
