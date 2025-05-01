<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\TasimaTeklifi;

class AdminController extends Controller
{
    public function teklifForm()
    {
        return view('admin.teklif-ekle');
    }

    public function teklifKaydet(Request $request)
    {
        $request->validate([
            'tasiyici' => 'required|string',
            'hizmet_tipi' => 'required|string',
            'tahmini_varis' => 'required|string',
            'fiyat' => 'required|numeric|min:0',
        ]);

        DB::table('tasima_teklifleri')->insert([
            'tasiyici' => $request->tasiyici,
            'hizmet_tipi' => $request->hizmet_tipi,
            'tahmini_varis' => $request->tahmini_varis,
            'fiyat' => $request->fiyat,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        return redirect()->route('admin.teklif.form')->with('success', 'Taşıma teklifi başarıyla eklendi.');
    }
    public function teklifListe()
{
    $teklifler = DB::table('tasima_teklifleri')->latest()->get();
 
    return view('admin.teklif-liste', compact('teklifler'));
}

public function teklifDuzenleForm($id)
{

    $teklif = DB::table('tasima_teklifleri')->where('id', $id)->first();

    if (!$teklif) {
        abort(404); // veya istediğin bir hata dönüşü
    }
        return view('admin.teklif-duzenle', compact('teklif'));
}

 public function teklifGuncelle(Request $request, $id)
{
    $request->validate([
        'tasiyici' => 'required|string',
        'hizmet_tipi' => 'required|string',
        'tahmini_varis' => 'required|string',
        'fiyat' => 'required|numeric|min:0',
    ]);

    $teklif = DB::table('tasima_teklifleri')->where('id', $id)->first();

    if (!$teklif) {
        abort(404); // Kayıt bulunamadıysa 404
    }
    
    DB::table('tasima_teklifleri')
        ->where('id', $id)
        ->update([
            'tasiyici' => $request->tasiyici,
            'hizmet_tipi' => $request->hizmet_tipi,
            'tahmini_varis' => $request->tahmini_varis,
            'fiyat' => $request->fiyat,
            'updated_at' => now(),
        ]);
    

    return redirect()->route('admin.teklif.liste')->with('success', 'Taşıma teklifi güncellendi.');
}

public function teklifSil($id)
{
    $teklif = DB::table('tasima_teklifleri')->where('id', $id)->first();

    if (!$teklif) {
        abort(404); // Manuel 404 hatası
    }
    
    DB::table('tasima_teklifleri')->where('id', $id)->delete();
    

    return redirect()->route('admin.teklif.liste')->with('success', 'Taşıma teklifi silindi.');
}

}
