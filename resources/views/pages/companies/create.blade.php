@extends('layouts.app')

@section('title', 'Firma Ekle')

@section('content')
<div class="container py-3">
    <h4 class="mb-4">Firma Ekle</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Temel Firma Bilgileri -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Temel Firma Bilgileri</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Firma Adı <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="brand_name" class="form-label">Marka Adı (Varsa)</label>
                        <input type="text" class="form-control" id="brand_name" name="brand_name" value="{{ old('brand_name') }}">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tax_number" class="form-label">Vergi Numarası</label>
                        <input type="text" class="form-control" id="tax_number" name="tax_number" value="{{ old('tax_number') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="establishment_year" class="form-label">Kuruluş Yılı</label>
                        <input type="number" class="form-control" id="establishment_year" name="establishment_year" min="1900" max="{{ date('Y') }}" value="{{ old('establishment_year') }}">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="website" class="form-label">Web Sitesi</label>
                    <input  class="form-control" id="website" name="website" value="{{ old('website') }}" placeholder="https://example.com">
                </div>
            </div>
        </div>

        <!-- İletişim Bilgileri -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">İletişim Bilgileri</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="contact_person" class="form-label">Yetkili Kişi Adı Soyadı</label>
                    <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ old('contact_person') }}">
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">E-posta Adresi</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Telefon Numarası</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="address" class="form-label">Firma Adresi</label>
                    <textarea class="form-control" id="address" name="address" rows="3">{{ old('address') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Hizmet Bilgileri -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Hizmet Bilgileri</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="service_types" class="form-label">Hizmet Tipleri</label>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="service_land" name="service_types[]" value="kara" {{ in_array('kara', old('service_types', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="service_land">Kara</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="service_air" name="service_types[]" value="hava" {{ in_array('hava', old('service_types', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="service_air">Hava</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="service_sea" name="service_types[]" value="deniz" {{ in_array('deniz', old('service_types', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="service_sea">Deniz</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="service_partial" name="service_types[]" value="parsiyel" {{ in_array('parsiyel', old('service_types', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="service_partial">Parsiyel</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="shipping_capacity" class="form-label">Gönderi Kapasitesi (Ortalama)</label>
                    <input type="text" class="form-control" id="shipping_capacity" name="shipping_capacity" value="{{ old('shipping_capacity') }}" placeholder="Örn: 100 ton/ay">
                </div>
                
                <div class="mb-3">
                    <label for="accepted_product_types" class="form-label">Kabul Edilen Ürün Tipleri</label>
                    <textarea class="form-control" id="accepted_product_types" name="accepted_product_types" rows="3" placeholder="Örn: Elektronik, Tekstil, Gıda...">{{ old('accepted_product_types') }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="uk_regions" class="form-label">Gönderilen İngiltere Bölgeleri</label>
                    <textarea class="form-control" id="uk_regions" name="uk_regions" rows="3" placeholder="Örn: Londra, Manchester, Birmingham...">{{ old('uk_regions') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Partner Bilgileri -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Partner Bilgileri</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">İngiltere'de Partner Var mı?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="has_uk_partner_yes" name="has_uk_partner" value="1" {{ old('has_uk_partner') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="has_uk_partner_yes">Evet</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="has_uk_partner_no" name="has_uk_partner" value="0" {{ old('has_uk_partner') == '0' ? 'checked' : '' }}>
                        <label class="form-check-label" for="has_uk_partner_no">Hayır</label>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="partner_company_name" class="form-label">Partner Firma Adı (Varsa)</label>
                    <input type="text" class="form-control" id="partner_company_name" name="partner_company_name" value="{{ old('partner_company_name') }}">
                </div>
            </div>
        </div>

        <!-- Hizmet ve Sertifikalar -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Hizmet ve Sertifikalar</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Gümrük Müşavirliği Hizmeti Sunuyor musunuz?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="customs_service_yes" name="provides_customs_service" value="1" {{ old('provides_customs_service') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="customs_service_yes">Evet</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="customs_service_no" name="provides_customs_service" value="0" {{ old('provides_customs_service') == '0' ? 'checked' : '' }}>
                        <label class="form-check-label" for="customs_service_no">Hayır</label>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="certificates" class="form-label">Sertifika ve Yetki Belgeleri</label>
                    <textarea class="form-control" id="certificates" name="certificates" rows="3" placeholder="Sahip olunan sertifika ve yetki belgelerini listeleyin...">{{ old('certificates') }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="certificate_files" class="form-label">Sertifika Belgeleri (Dosya Yükleme)</label>
                    <input type="file" class="form-control" id="certificate_files" name="certificate_files[]" multiple accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                    <div class="form-text">PDF, DOC, DOCX, JPG, JPEG, PNG formatlarında dosya yükleyebilirsiniz. Birden fazla dosya seçebilirsiniz.</div>
                </div>
            </div>
        </div>

        <!-- Ek Bilgiler -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Ek Bilgiler</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="additional_info" class="form-label">Ek Bilgi / Not</label>
                    <textarea class="form-control" id="additional_info" name="additional_info" rows="4" placeholder="Firma hakkında eklemek istediğiniz diğer bilgiler...">{{ old('additional_info') }}</textarea>
                </div>
            </div>
        </div>

        <div class="text-end">
            <a href="{{ route('companies.index') }}" class="btn btn-secondary me-2">İptal</a>
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Partner seçimi için show/hide işlevselliği
    const partnerRadios = document.querySelectorAll('input[name="has_uk_partner"]');
    const partnerNameField = document.getElementById('partner_company_name');
    
    partnerRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === '0') {
                partnerNameField.disabled = true;
                partnerNameField.value = '';
            } else {
                partnerNameField.disabled = false;
            }
        });
    });
    
    // Sayfa yüklendiğinde başlangıç durumunu ayarla
    const selectedPartner = document.querySelector('input[name="has_uk_partner"]:checked');
    if (selectedPartner && selectedPartner.value === '0') {
        partnerNameField.disabled = true;
    }
});
</script>
@endsection