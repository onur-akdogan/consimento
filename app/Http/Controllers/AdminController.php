<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Ulke;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function teklifForm()
    {
        $ulkes = Ulke::orderBy('ad')->get();

        return view('admin.teklif-ekle',compact("ulkes"));
    }

    public function teklifKaydet(Request $request)
    {
        $request->validate([
            'ulke' => 'required|string',
            'min_kg' => 'required|numeric|min:0.1',
            'max_kg' => 'required|numeric|gte:min_kg',
            'tasiyici' => 'required|string',
            'hizmet_tipi' => 'required|string',
            'tahmini_varis' => 'required|string',
            'fiyat' => 'required|numeric|min:0',
        ]);

        DB::table('tasima_teklifleri')->insert([
            'ulke' => $request->ulke,
            'min_kg' => $request->min_kg,
            'max_kg' => $request->max_kg,
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
            abort(404);
        }

        return view('admin.teklif-duzenle', compact('teklif'));
    }

    public function teklifGuncelle(Request $request, $id)
    {
        $request->validate([
            'ulke' => 'required|string',
            'min_kg' => 'required|numeric|min:0.1',
            'max_kg' => 'required|numeric|gte:min_kg',
            'tasiyici' => 'required|string',
            'hizmet_tipi' => 'required|string',
            'tahmini_varis' => 'required|string',
            'fiyat' => 'required|numeric|min:0',
        ]);

        $teklif = DB::table('tasima_teklifleri')->where('id', $id)->first();

        if (!$teklif) {
            abort(404);
        }

        DB::table('tasima_teklifleri')
            ->where('id', $id)
            ->update([
                'ulke' => $request->ulke,
                'min_kg' => $request->min_kg,
                'max_kg' => $request->max_kg,
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
            abort(404);
        }

        DB::table('tasima_teklifleri')->where('id', $id)->delete();

        return redirect()->route('admin.teklif.liste')->with('success', 'Taşıma teklifi silindi.');
    }
    
    
}
