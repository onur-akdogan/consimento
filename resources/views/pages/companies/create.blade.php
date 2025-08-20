@extends('layouts.app')

@section('title', 'Firma Ekle')

@section('content')
<div class="grid gap-6 p-5">

    @if ($errors->any())
        <div class="bg-destructive/10 text-destructive p-4 rounded-lg">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 ">
        @csrf

        {{-- Temel Firma Bilgileri --}}
        <div class="kt-card mb-5">
            <div class="kt-card-header">
                <h3 class="kt-card-title">Temel Firma Bilgileri</h3>
            </div>
            <div class="kt-card-content grid gap-4 p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Firma Adı <span class="text-destructive">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" required class="kt-input">
                    </div>
                    <div>
                        <label class="form-label">Marka Adı (Varsa)</label>
                        <input type="text" name="brand_name" value="{{ old('brand_name') }}" class="kt-input">
                    </div>
                    <div>
                        <label class="form-label">Vergi Numarası</label>
                        <input type="text" name="tax_number" value="{{ old('tax_number') }}" class="kt-input">
                    </div>
                    <div>
                        <label class="form-label">Kuruluş Yılı</label>
                        <input type="number" name="establishment_year" min="1900" max="{{ date('Y') }}" value="{{ old('establishment_year') }}" class="kt-input">
                    </div>
                    <div class="md:col-span-2">
                        <label class="form-label">Web Sitesi</label>
                        <input type="url" name="website" value="{{ old('website') }}" class="kt-input" placeholder="https://example.com">
                    </div>
                </div>
            </div>
        </div>

        {{-- İletişim Bilgileri --}}
        <div class="kt-card mb-5">
            <div class="kt-card-header">
                <h3 class="kt-card-title">İletişim Bilgileri</h3>
            </div>
            <div class="kt-card-content grid gap-4 p-6">
                <div>
                    <label class="form-label">Yetkili Kişi</label>
                    <input type="text" name="contact_person" value="{{ old('contact_person') }}" class="kt-input">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">E-posta</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="kt-input">
                    </div>
                    <div>
                        <label class="form-label">Telefon</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="kt-input">
                    </div>
                </div>
                <div>
                    <label class="form-label">Adres</label>
                    <textarea name="address" rows="3" class="kt-input">{{ old('address') }}</textarea>
                </div>
            </div>
        </div>

        {{-- Hizmet Bilgileri --}}
        <div class="kt-card mb-5">
            <div class="kt-card-header">
                <h3 class="kt-card-title">Hizmet Bilgileri</h3>
            </div>
            <div class="kt-card-content grid gap-4 p-6">
                <div>
                    <label class="form-label">Hizmet Tipleri</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                        @foreach (['kara', 'hava', 'deniz', 'parsiyel'] as $type)
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="service_types[]" value="{{ $type }}" class="form-checkbox" {{ in_array($type, old('service_types', [])) ? 'checked' : '' }}>
                            <span class="capitalize">{{ $type }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>
                <div>
                    <label class="form-label">Gönderi Kapasitesi</label>
                    <input type="text" name="shipping_capacity" value="{{ old('shipping_capacity') }}" placeholder="Örn: 100 ton/ay" class="kt-input">
                </div>
                <div>
                    <label class="form-label">Kabul Edilen Ürün Tipleri</label>
                    <textarea name="accepted_product_types" rows="3" class="kt-input" placeholder="Elektronik, Tekstil, Gıda...">{{ old('accepted_product_types') }}</textarea>
                </div>
                <div>
                    <label class="form-label">İngiltere Bölgeleri</label>
                    <textarea name="uk_regions" rows="3" class="kt-input" placeholder="Londra, Manchester, Birmingham...">{{ old('uk_regions') }}</textarea>
                </div>
            </div>
        </div>

        {{-- Partner Bilgileri --}}
        <div class="kt-card mb-5">
            <div class="kt-card-header">
                <h3 class="kt-card-title">Partner Bilgileri</h3>
            </div>
            <div class="kt-card-content grid gap-4 p-6">
                <div>
                    <label class="form-label">İngiltere'de Partner Var mı?</label>
                    <div class="flex gap-6 mt-1">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="has_uk_partner" value="1" class="form-radio" {{ old('has_uk_partner') == '1' ? 'checked' : '' }}>
                            <span>Evet</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="has_uk_partner" value="0" class="form-radio" {{ old('has_uk_partner') == '0' ? 'checked' : '' }}>
                            <span>Hayır</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="form-label">Partner Firma Adı</label>
                    <input type="text" id="partner_company_name" name="partner_company_name" value="{{ old('partner_company_name') }}" class="kt-input">
                </div>
            </div>
        </div>

        {{-- Sertifikalar ve Ek Bilgi --}}
        <div class="kt-card mb-5">
            <div class="kt-card-header">
                <h3 class="kt-card-title">Hizmet ve Sertifikalar</h3>
            </div>
            <div class="kt-card-content grid gap-4 p-6">
                <div>
                    <label class="form-label">Gümrük Müşavirliği Hizmeti?</label>
                    <div class="flex gap-6 mt-1">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="provides_customs_service" value="1" class="form-radio" {{ old('provides_customs_service') == '1' ? 'checked' : '' }}>
                            <span>Evet</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="provides_customs_service" value="0" class="form-radio" {{ old('provides_customs_service') == '0' ? 'checked' : '' }}>
                            <span>Hayır</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="form-label">Sertifikalar</label>
                    <textarea name="certificates" rows="3" class="kt-input">{{ old('certificates') }}</textarea>
                </div>
                <div>
                    <label class="form-label">Sertifika Belgeleri (Dosya Yükleme)</label>
                    <input type="file" name="certificate_files[]" multiple accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" class="kt-input file:mr-3 file:bg-primary file:text-white file:px-3 file:py-1 file:rounded-md">
                    <p class="text-xs text-muted-foreground mt-1">PDF, DOC, JPG, PNG yükleyebilirsiniz.</p>
                </div>
            </div>
        </div>

        {{-- Ek Bilgiler --}}
        <div class="kt-card mb-5">
            <div class="kt-card-header">
                <h3 class="kt-card-title">Ek Bilgiler</h3>
            </div>
            <div class="kt-card-content p-6">
                <textarea name="additional_info" rows="4" class="kt-input w-full" placeholder="Firma hakkında ek bilgiler...">{{ old('additional_info') }}</textarea>
            </div>
        </div>

        {{-- Form Butonları --}}
        <div class="flex justify-end gap-4">
            <a href="{{ route('companies.index') }}" class="kt-btn kt-btn-ghost">İptal</a>
            <button type="submit" class="kt-btn kt-btn-primary">Kaydet</button>
        </div>
    </form>
</div>

{{-- Partner input disable/enable --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const partnerRadios = document.querySelectorAll('input[name="has_uk_partner"]');
    const partnerInput = document.getElementById('partner_company_name');

    function togglePartnerField() {
        if (document.querySelector('input[name="has_uk_partner"]:checked')?.value === "0") {
            partnerInput.disabled = true;
            partnerInput.value = '';
        } else {
            partnerInput.disabled = false;
        }
    }

    partnerRadios.forEach(r => r.addEventListener('change', togglePartnerField));
    togglePartnerField();
});
</script>
@endsection
