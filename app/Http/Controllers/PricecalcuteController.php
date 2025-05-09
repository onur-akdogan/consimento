<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TasimaTeklifi;
use App\Models\Ulke;
use DB;
class PricecalcuteController extends Controller
{
    public function index(){
        $ulkes=Ulke::get();

        return view("pages.pricecalcute",compact("ulkes"));
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
