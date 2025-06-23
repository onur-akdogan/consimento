@extends('layouts.app')

@section('title', 'Fiyat Teklifi Talepleri')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <h4 class="fs-18 fw-semibold mb-4">Fiyat Teklifi Talepleri</h4>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#ID</th>
                                         <th scope="col">Kullanıcı</th>
                                         <th scope="col">Kullanıcı Mail</th>
                                         <th scope="col">Kullanıcı Telefon</th>

                                     <th scope="col">Gönderi Türü</th>
                                    <th scope="col">Durum</th>
                                    <th scope="col">Talep Tarihi</th>
                                    <th scope="col">Aksiyonlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($offers as $offer)
                                    <tr>
                                        <th scope="row">{{ $offer->id }}</th>
                                           <td>{{ $offer->user->name ?? 'Bilinmiyor' }}</td>

                                           <td>{{ $offer->user->email ?? 'Yok' }}</td>

                                           <td>{{ $offer->user->phone ?? 'Yok' }}</td>

                                         <td>{{ $offer->offer_type }}</td>
                                        <td>
                                            <span class="badge 
                                                @if($offer->status == 'beklemede') bg-warning text-dark 
                                                @elseif($offer->status == 'cevaplandı') bg-success 
                                                @else bg-secondary @endif">
                                                {{ ucfirst($offer->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $offer->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#offerModal-{{ $offer->id }}">
                                                Detayları Gör
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="{{ Auth::user()->is_admin ? '6' : '5' }}" class="text-center">Henüz bir teklif talebi bulunmuyor.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $offers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($offers as $offer)
<div class="modal fade" id="offerModal-{{ $offer->id }}" tabindex="-1" aria-labelledby="offerModalLabel-{{ $offer->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="offerModalLabel-{{ $offer->id }}">Teklif #{{ $offer->id }} Detayları</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Teklif Türü:</strong> {{ $offer->offer_type }}</li>
                    @if(Auth::user()->is_admin)
                        <li class="list-group-item"><strong>Kullanıcı:</strong> {{ $offer->user->name }} ({{ $offer->user->email }})</li>
                    @endif
                    <li class="list-group-item"><strong>Durum:</strong> {{ ucfirst($offer->status) }}</li>
                    <li class="list-group-item"><strong>Talep Tarihi:</strong> {{ $offer->created_at->format('d/m/Y H:i:s') }}</li>
                </ul>
                <hr>
                <h6>Form Detayları:</h6>
                <ul class="list-group">
                    @if(is_array($offer->details))
                        @foreach($offer->details as $key => $value)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $key }}</span>
                                <span class="badge bg-primary rounded-pill">{{ $value ?: 'Belirtilmedi' }}</span>
                            </li>
                        @endforeach
                    @else
                        <li class="list-group-item">Detay bilgisi bulunamadı.</li>
                    @endif
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection