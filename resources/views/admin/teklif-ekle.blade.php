@extends('layouts.app')

@section('title', 'Taşıma Teklifi Ekle')

@section('content')
    <div class="container py-4">
        <h4 class="mb-4">Yeni Taşıma Teklifi Ekle</h4>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.teklif.kaydet') }}">
            @csrf

            <label for="ulke" class="form-label">Ülke</label>

            <select class="form-select" id="ulke" name="ulke" required>

                <option value="">Seçiniz</option>
                @foreach ($ulkes as $ulkem)
                    <option value="{{ $ulkem->ad }}">{{ $ulkem->ad }}
                    </option>
                @endforeach
            </select>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="min_kg" class="form-label">Minimum Ağırlık (kg)</label>
                    <input type="number" step="0.1" class="form-control" id="min_kg" name="min_kg" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="max_kg" class="form-label">Maksimum Ağırlık (kg)</label>
                    <input type="number" step="0.1" class="form-control" id="max_kg" name="max_kg" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="fiyat" class="form-label">Fiyat (USD)</label>
                <input type="number" step="0.01" class="form-control" id="fiyat" name="fiyat" required>
            </div>

            <div class="mb-3">
                <label for="tasiyici" class="form-label">Taşıyıcı</label>
                <input type="text" class="form-control" id="tasiyici" name="tasiyici" required>
            </div>

            <div class="mb-3">
                <label for="hizmet_tipi" class="form-label">Hizmet Tipi</label>
                <input type="text" class="form-control" id="hizmet_tipi" name="hizmet_tipi" required>
            </div>

            <div class="mb-3">
                <label for="tahmini_varis" class="form-label">Tahmini Varış Süresi</label>
                <input type="text" class="form-control" id="tahmini_varis" name="tahmini_varis" required>
            </div>

            <button type="submit" class="btn btn-success">Kaydet</button>
        </form>
    </div>
@endsection
