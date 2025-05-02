<?php

// app/Http/Controllers/AddressController.php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index($type)
    {
        $user = auth()->user();

        // Kullanıcının sadece kendi adresleri
        $addresses = Address::where('user_id', $user->id)
                            ->where('type', $type)
                            ->latest()
                            ->get();
    
        return view('pages.addresses.index', [
            'addresses' => $addresses,
            'type' => $type,
        ]);
    
     }

    public function create($type)
    {
        if (!in_array($type, ['receiver', 'sender'])) {
            abort(404);
        }

        return view('pages.addresses.create', compact('type'));
    }

    public function store(Request $request, $type)
    {
        if (!in_array($type, ['receiver', 'sender'])) {
            abort(404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'city' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'address' => 'required|string',
        ]);

        Address::create([
            'user_id' => Auth::id(),
            'type' => $type,
            'name' => $request->name,
            'phone' => $request->phone,
            'city' => $request->city,
            'district' => $request->district,
            'address' => $request->address,
        ]);

        return redirect()->route('addresses.index', ['type' => $type])
            ->with('success', 'Adres başarıyla kaydedildi.');
    }
}
