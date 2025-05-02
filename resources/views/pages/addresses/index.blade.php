@extends('layouts.app')

@section('title', 'Adreslerim')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Adreslerim</h3>

    <!-- Sekmeler -->
    <ul class="nav nav-tabs mb-4" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ $type == 'sender' ? 'active text-primary fw-bold' : '' }}"
               href="{{ route('addresses.index', ['type' => 'sender']) }}">
                GÖNDERİM ADRESLERİM
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $type == 'receiver' ? 'active text-primary fw-bold' : '' }}"
               href="{{ route('addresses.index', ['type' => 'receiver']) }}">
                ALICI ADRESLERİM
            </a>
        </li>
    </ul>

    <h5 class="mb-3">{{ $type === 'sender' ? 'Gönderim' : 'Alıcı' }} Adreslerim</h5>

    <div class="row g-3">
        <!-- Yeni Adres Ekle Kartı -->
        <div class="col-md-4">
            <a href="{{ route('addresses.create', ['type' => $type]) }}" class="text-decoration-none">
                <div class="card border border-2 border-light shadow-sm text-center p-4 h-100">
                    <div class="fs-1 text-primary">[+]</div>
                    <div class="text-primary fw-semibold">Yeni Adres Ekle</div>
                </div>
            </a>
        </div>

        <!-- Mevcut Adresler -->
        @foreach($addresses as $address)
        <div class="col-md-4">
            <div class="card border shadow-sm h-100">
                <div class="card-body">
                    <h6 class="fw-bold">{{ $address->name }}</h6>
                    <p class="mb-1"><strong>Telefon:</strong> {{ $address->phone }}</p>
                    <p class="mb-1"><strong>Şehir:</strong> {{ $address->city }} / {{ $address->district }}</p>
                    <p class="mb-1"><strong>Adres:</strong> {{ $address->address }}</p>
                    <p class="text-muted small mb-0">{{ $address->created_at->format('d.m.Y H:i') }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
