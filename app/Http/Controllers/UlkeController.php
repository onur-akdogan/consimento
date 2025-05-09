<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulke;

class UlkeController extends Controller
{
    public function index()
    {
        $ulkeler = Ulke::orderBy('ad')->get();
        return view('admin.ulkeler.index', compact('ulkeler'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ad' => 'required|string|unique:ulke,ad'
        ]);

        Ulke::create($request->only('ad'));

        return redirect()->back()->with('success', 'Ülke başarıyla eklendi.');
    }

    public function destroy($id)
    {
        $ulke = Ulke::findOrFail($id);
        $ulke->delete();

        return redirect()->back()->with('success', 'Ülke silindi.');
    }
}
