@extends('layouts.app')

@section('title', 'Taşıma Teklifi Ekle')

@section('content')
    <div class="max-w-3xl mx-auto py-6 px-4">
        <h4 class="text-xl font-semibold mb-6">Yeni Taşıma Teklifi Ekle</h4>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.teklif.kaydet') }}" class="space-y-6">
            @csrf

            <div>
                <label for="ulke" class="block text-sm font-medium text-gray-700 mb-1">Ülke</label>
                <select id="ulke" name="ulke" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    <option value="">Seçiniz</option>
                    @foreach ($ulkes as $ulkem)
                        <option value="{{ $ulkem->ad }}">{{ $ulkem->ad }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="min_kg" class="block text-sm font-medium text-gray-700 mb-1">Minimum Ağırlık (kg)</label>
                    <input type="number" step="0.1" id="min_kg" name="min_kg" required
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div>
                    <label for="max_kg" class="block text-sm font-medium text-gray-700 mb-1">Maksimum Ağırlık (kg)</label>
                    <input type="number" step="0.1" id="max_kg" name="max_kg" required
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                </div>
            </div>

            <div>
                <label for="fiyat" class="block text-sm font-medium text-gray-700 mb-1">Fiyat (USD)</label>
                <input type="number" step="0.01" id="fiyat" name="fiyat" required
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div>
                <label for="tasiyici" class="block text-sm font-medium text-gray-700 mb-1">Taşıyıcı</label>
                <input type="text" id="tasiyici" name="tasiyici" required
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div>
                <label for="hizmet_tipi" class="block text-sm font-medium text-gray-700 mb-1">Hizmet Tipi</label>
                <input type="text" id="hizmet_tipi" name="hizmet_tipi" required
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div>
                <label for="tahmini_varis" class="block text-sm font-medium text-gray-700 mb-1">Tahmini Varış Süresi</label>
                <input type="text" id="tahmini_varis" name="tahmini_varis" required
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div>
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-6 rounded">
                    Kaydet
                </button>
            </div>
        </form>
    </div>
@endsection
