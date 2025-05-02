<?php

// app/Http/Controllers/CompanyController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

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
        ]);

        Company::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('companies.index')->with('success', 'Firma başarıyla eklendi.');
    }
}
