@extends('layouts.app')

@section('title', 'Fiyat Hesaplama Aracı')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <h4 class="fs-18 fw-semibold">Fiyat Hesaplama Aracı</h4>
    </div>

    <div class="card p-4 mb-4">
        <form method="POST" action="{{ route('fiyat.hesapla') }}">
            @csrf 
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="ulke" class="form-label">Nereye</label>
                    <select class="form-select" id="ulke" name="ulke">
                        <option selected>Amerika Birleşik Devletleri</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="agirlik" class="form-label">Ağırlık (kg)</label>
                    <input type="number" step="0.1" class="form-control" id="agirlik" name="agirlik" value="{{ old('agirlik', $agirlik ?? 0) }}">
                </div>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="olcuSec" checked>
                <label class="form-check-label" for="olcuSec">
                    Ölçüleri de girip daha yakın fiyatları görmek istiyorum
                </label>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="en" class="form-label">En (cm)</label>
                    <input type="number" class="form-control" id="en" name="en" value="{{ old('en', $en ?? 0) }}">
                </div>
                <div class="col">
                    <label for="boy" class="form-label">Boy (cm)</label>
                    <input type="number" class="form-control" id="boy" name="boy" value="{{ old('boy', $boy ?? 0) }}">
                </div>
                <div class="col">
                    <label for="yukseklik" class="form-label">Yükseklik (cm)</label>
                    <input type="number" class="form-control" id="yukseklik" name="yukseklik" value="{{ old('yukseklik', $yukseklik ?? 0) }}">
                </div>
            </div>

            @if(isset($agirlik))
            <div class="mb-3">
                <p><strong>Brüt ağırlık:</strong> {{ $agirlik }} Kg</p>
                <p><strong>Hacimsel ağırlık:</strong> {{ $hacimselAgirlik }} Desi</p>
                <p><strong>Ücrete esas ağırlık:</strong> {{ $ucreteEsasAgirlik }} Kgs</p>
            </div>
            @endif

            <button type="submit" class="btn btn-primary">Fiyat Hesapla</button>
        </form>
    </div>

    @if(isset($fiyatlar))
    <div class="mb-3">
        <h5 class="fw-semibold">Size özel taşıma teklifleri</h5>
        <div class="alert alert-warning small">
            Gördüğünüz fiyatlar başlangıç fiyatlarıdır. Teklif alırken tüm detayları girdiğinizde ek ücretler ile karşılaşabilirsiniz.
        </div>
    </div>

    <div class="card p-3">
        <div class="row mb-2 fw-bold">
            <div class="col-md-2">Taşıyıcı</div>
            <div class="col-md-3">Hizmet tipi</div>
            <div class="col-md-3">Tahmini varış süresi</div>
            <div class="col-md-2">Başlangıç fiyatı</div>
        </div>
        <hr>

        @foreach($fiyatlar as $fiyat)
        <div class="row align-items-center mb-3">
            <div class="col-md-2">
                <img src="https://seeklogo.com/images/U/ups-logo-0D82CF2CB5-seeklogo.com.png" alt="{{ $fiyat->tasiyici }}" height="30">
            </div>
            <div class="col-md-3">
                <span class="badge bg-primary">{{ $fiyat->hizmet_tipi }}</span>
                @if ($loop->first)
                    <span class="badge bg-danger ms-2">En Uygun Express Fiyat</span>
                @endif
            </div>
            <div class="col-md-3">{{ $fiyat->tahmini_varis }}</div>
            <div class="col-md-2 text-success">USD {{ $fiyat->fiyat }}</div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
