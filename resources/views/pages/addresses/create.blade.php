@extends('layouts.app')

@section('title', ucfirst($type) . ' Adresi Ekle')

@section('content')
<div class="grid gap-6 p-5">

    {{-- Hata Mesajları --}}
    @if ($errors->any())
        <div class="bg-destructive/10 text-destructive p-4 rounded-lg">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('addresses.store', ['type' => $type]) }}" method="POST" class="space-y-6">
        @csrf

        {{-- Adres Bilgileri --}}
        <div class="kt-card mb-5">
            <div class="kt-card-header">
                <h3 class="kt-card-title">
                    {{ $type === 'receiver' ? '📦 Alıcı' : '🚚 Gönderici' }} Adresi
                </h3>
            </div>
            <div class="kt-card-content grid gap-4 p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Ad Soyad / Firma <span class="text-destructive">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" required class="kt-input">
                    </div>
                    <div>
                        <label class="form-label">Telefon <span class="text-destructive">*</span></label>
                        <input type="text" name="phone" value="{{ old('phone') }}" required class="kt-input">
                    </div>
                    <div>
                        <label class="form-label">Şehir <span class="text-destructive">*</span></label>
                        <input type="text" name="city" value="{{ old('city') }}" required class="kt-input">
                    </div>
                    <div>
                        <label class="form-label">İlçe <span class="text-destructive">*</span></label>
                        <input type="text" name="district" value="{{ old('district') }}" required class="kt-input">
                    </div>
                    <div class="md:col-span-2">
                        <label class="form-label">Adres <span class="text-destructive">*</span></label>
                        <textarea name="address" rows="3" required class="kt-input">{{ old('address') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form Butonları --}}
        <div class="flex justify-end gap-4">
            <a href="{{ route('addresses.index', ['type' => $type]) }}" class="kt-btn kt-btn-ghost">İptal</a>
            <button type="submit" class="kt-btn kt-btn-primary">Kaydet</button>
        </div>
    </form>
</div>
@endsection
