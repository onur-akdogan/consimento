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
                    <select class="form-select" id="ulke" name="ulke" required>
                        <option value="">Seçiniz</option>
                         @foreach ($ulkes as $ulkem)
                        <option value="{{ $ulkem->ad }}" {{ old('ulke', $ulke ?? '') == $ulkem->ad ? 'selected' : '' }}>{{ $ulkem->ad }}
                        </option>
                    @endforeach
                      </select>
                </div>
                <div class="col-md-6">
                    <label for="agirlik" class="form-label">Ağırlık (kg)</label>
                    <input type="number" step="0.1" min="0.1" class="form-control" id="agirlik" name="agirlik" value="{{ old('agirlik', $agirlik ?? '') }}" required>
                </div>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="olcuSec" name="olcuSec" {{ old('olcuSec', true) ? 'checked' : '' }}>
                <label class="form-check-label" for="olcuSec">
                    Ölçüleri de girip daha yakın fiyatları görmek istiyorum
                </label>
            </div>

            <div class="row mb-3" id="olcuAlanlari">
                <div class="col">
                    <label for="en" class="form-label">En (cm)</label>
                    <input type="number" step="0.1" class="form-control" id="en" name="en" value="{{ old('en', $en ?? '') }}">
                </div>
                <div class="col">
                    <label for="boy" class="form-label">Boy (cm)</label>
                    <input type="number" step="0.1" class="form-control" id="boy" name="boy" value="{{ old('boy', $boy ?? '') }}">
                </div>
                <div class="col">
                    <label for="yukseklik" class="form-label">Yükseklik (cm)</label>
                    <input type="number" step="0.1" class="form-control" id="yukseklik" name="yukseklik" value="{{ old('yukseklik', $yukseklik ?? '') }}">
                </div>
            </div>

            @if(isset($ucreteEsasAgirlik))
            <div class="mb-3">
                <p><strong>Brüt ağırlık:</strong> {{ number_format($agirlik, 2) }} kg</p>
                <p><strong>Hacimsel ağırlık:</strong> {{ number_format($hacimselAgirlik, 2) }} desi</p>
                <p><strong>Ücrete esas ağırlık:</strong> {{ number_format($ucreteEsasAgirlik, 2) }} kg</p>
            </div>
            @endif

            <button type="submit" class="btn btn-primary">Fiyat Hesapla</button>
        </form>
    </div>

    @if(isset($fiyatlar) && count($fiyatlar) > 0)
    <div class="mb-3">
        <h5 class="fw-semibold">Size özel taşıma teklifleri</h5>
        <div class="alert alert-warning small">
            Gördüğünüz fiyatlar başlangıç fiyatlarıdır. Gönderinizin ölçüleri, paket tipi veya varış bölgesine göre değişebilir.
        </div>
    </div>

    <div class="card p-3">
        <div class="row mb-2 fw-bold">
            <div class="col-md-2">Taşıyıcı</div>
            <div class="col-md-3">Hizmet Tipi</div>
            <div class="col-md-3">Tahmini Varış</div>
            <div class="col-md-2">Fiyat (USD)</div>
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
                    <span class="badge bg-danger ms-2">En Uygun Express</span>
                @endif
            </div>
            <div class="col-md-3">{{ $fiyat->tahmini_varis }}</div>
            <div class="col-md-2 text-success">USD {{ number_format($fiyat->fiyat, 2) }}</div>
        </div>
        @endforeach
    </div>
    @elseif(isset($fiyatlar))
        <div class="alert alert-info mt-3">Girilen bilgilere uygun teklif bulunamadı.</div>
    @endif
</div>

@endsection

@push('scripts')
<script>
    document.getElementById('olcuSec').addEventListener('change', function () {
        const olcuAlanlari = document.getElementById('olcuAlanlari');
        olcuAlanlari.style.display = this.checked ? 'flex' : 'none';
    });

    // Sayfa yüklendiğinde checkbox kontrolü
    window.addEventListener('load', () => {
        document.getElementById('olcuAlanlari').style.display = document.getElementById('olcuSec').checked ? 'flex' : 'none';
    });
</script>
@endpush
