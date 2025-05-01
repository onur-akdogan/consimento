@extends('layouts.app')

@section('title', 'Taşıma Teklifi Güncelle')

@section('content')
<div class="container py-4">
    <h4 class="mb-4">Taşıma Teklifi Güncelle</h4>

    <form method="POST" action="{{ route('admin.teklif.guncelle', $teklif->id) }}">
        @csrf

        <div class="mb-3">
            <label for="tasiyici" class="form-label">Taşıyıcı</label>
            <input type="text" class="form-control" id="tasiyici" name="tasiyici" value="{{ old('tasiyici', $teklif->tasiyici) }}" required>
        </div>

        <div class="mb-3">
            <label for="hizmet_tipi" class="form-label">Hizmet Tipi</label>
            <input type="text" class="form-control" id="hizmet_tipi" name="hizmet_tipi" value="{{ old('hizmet_tipi', $teklif->hizmet_tipi) }}" required>
        </div>

        <div class="mb-3">
            <label for="tahmini_varis" class="form-label">Tahmini Varış Süresi</label>
            <input type="text" class="form-control" id="tahmini_varis" name="tahmini_varis" value="{{ old('tahmini_varis', $teklif->tahmini_varis) }}" required>
        </div>

        <div class="mb-3">
            <label for="fiyat" class="form-label">Fiyat (USD)</label>
            <input type="number" step="0.01" class="form-control" id="fiyat" name="fiyat" value="{{ old('fiyat', $teklif->fiyat) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Güncelle</button>
        <a href="{{ route('admin.teklif.liste') }}" class="btn btn-secondary">Geri Dön</a>
    </form>
</div> 
@endsection
