@extends('layouts.app')

@section('title', ucfirst($type) . ' Adresi Ekle')

@section('content')
<div class="container py-3">
    <h4 class="mb-4">{{ $type === 'receiver' ? 'Alıcı' : 'Gönderici' }} Adresi Ekle</h4>

    @if(session('warning'))
        <div class="alert alert-warning">{{ session('warning') }}</div>
    @endif

    <form action="{{ route('addresses.store', ['type' => $type]) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Ad Soyad / Firma</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Telefon</label>
            <input type="text" class="form-control" name="phone" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Şehir</label>
            <input type="text" class="form-control" name="city" required>
        </div>

        <div class="mb-3">
            <label class="form-label">İlçe</label>
            <input type="text" class="form-control" name="district" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Adres</label>
            <textarea class="form-control" name="address" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Kaydet</button>
    </form>
</div>
@endsection
