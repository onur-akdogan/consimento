@extends('layouts.app')

@section('title', 'Taşıma Teklifleri')

@section('content')
<div class="container py-4">
    <h4 class="mb-4">Tüm Taşıma Teklifleri</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.teklif.form') }}" class="btn btn-primary mb-3">Yeni Teklif Ekle</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Ülke</th>
                <th>Ağırlık Aralığı (kg)</th>
                <th>Taşıyıcı</th>
                <th>Hizmet Tipi</th>
                <th>Varış Süresi</th>
                <th>Fiyat (USD)</th>
                <th>İşlem</th>
            </tr>
        </thead>
        <tbody>
            @forelse($teklifler as $teklif)
                <tr>
                    <td>{{ $teklif->id }}</td>
                    <td>{{ $teklif->ulke }}</td>
                    <td>{{ $teklif->min_kg }} - {{ $teklif->max_kg }}</td>
                    <td>{{ $teklif->tasiyici }}</td>
                    <td>{{ $teklif->hizmet_tipi }}</td>
                    <td>{{ $teklif->tahmini_varis }}</td>
                    <td>{{ $teklif->fiyat }}</td>
                    <td>
                        <a href="{{ route('admin.teklif.duzenle.form', $teklif->id) }}" class="btn btn-sm btn-warning">Düzenle</a>

                        <form action="{{ route('admin.teklif.sil', $teklif->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Hiç teklif bulunamadı.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
