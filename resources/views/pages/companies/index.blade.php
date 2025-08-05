@extends('layouts.app')

@section('title', 'Firmalarım')

@section('content')
<div class="container py-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Firmalarım</h4>
        <a href="{{ route('companies.create') }}" class="btn btn-success">Yeni Firma Ekle</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Kapat"></button>
        </div>
    @endif

    @if($companies->count())
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Firma Adı</th>
                        <th>E-posta</th>
                        <th>Telefon</th>
                        <th>Hizmet Tipleri</th>
                        <th>Oluşturulma</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>
                                <strong>{{ $company->name }}</strong>
                                @if($company->brand_name)
                                    <br><small class="text-muted">({{ $company->brand_name }})</small>
                                @endif
                            </td>
                            <td>{{ $company->email ?? '-' }}</td>
                            <td>{{ $company->phone ?? '-' }}</td>
                            <td>
                                @if(!empty($company->service_types))
                                    {{-- service_types_text, modelinizde tanımlanmış bir accessor olmalıdır --}}
                                    <span class="badge bg-primary">{{ $company->service_types_text }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>{{ $company->created_at->format('d.m.Y H:i') }}</td>
                            <td>
                                {{-- Detay butonu, şimdi tek bir genel modalı tetikleyecek --}}
                                {{-- Firma verilerini JSON olarak data özniteliğine ekliyoruz --}}
                                <button type="button" class="btn btn-info btn-sm view-company-details-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#companyDetailModal"
                                        data-company-details="{{ json_encode($company) }}">
                                    <i class="fas fa-eye"></i> Detay
                                </button>

                                {{-- Silme butonu, confirm() yerine modalı tetikleyecek --}}
                                <button type="button" class="btn btn-danger btn-sm delete-company-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteConfirmationModal"
                                        data-company-id="{{ $company->id }}"
                                        data-company-name="{{ $company->name }}">
                                    <i class="fas fa-trash"></i> Sil
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-5">
            <i class="fas fa-building fa-3x text-muted mb-3"></i>
            <p class="text-muted">Henüz bir firma kaydınız yok.</p>
            <a href="{{ route('companies.create') }}" class="btn btn-primary">İlk Firmayı Ekle</a>
        </div>
    @endif
</div>

{{-- Firma Detay Modalı (Döngü dışına taşındı ve tek bir modal olarak tanımlandı) --}}
<div class="modal fade" id="companyDetailModal" tabindex="-1" aria-labelledby="companyDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="companyDetailModalLabel">Firma Detayları</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
            </div>
            <div class="modal-body">
                {{-- İçerik JavaScript ile doldurulacak --}}
                <div class="row">
                    <!-- Temel Bilgiler -->
                    <div class="col-md-6">
                        <h6 class="text-primary mb-3">Temel Bilgiler</h6>
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <td><strong>Firma Adı:</strong></td>
                                    <td id="detail-company-name"></td>
                                </tr>
                                <tr id="detail-brand-name-row" style="display: none;">
                                    <td><strong>Marka Adı:</strong></td>
                                    <td id="detail-brand-name"></td>
                                </tr>
                                <tr id="detail-tax-number-row" style="display: none;">
                                    <td><strong>Vergi No:</strong></td>
                                    <td id="detail-tax-number"></td>
                                </tr>
                                <tr id="detail-establishment-year-row" style="display: none;">
                                    <td><strong>Kuruluş Yılı:</strong></td>
                                    <td id="detail-establishment-year"></td>
                                </tr>
                                <tr id="detail-website-row" style="display: none;">
                                    <td><strong>Web Sitesi:</strong></td>
                                    <td id="detail-website"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- İletişim Bilgileri -->
                    <div class="col-md-6">
                        <h6 class="text-primary mb-3">İletişim Bilgileri</h6>
                        <table class="table table-sm">
                            <tbody>
                                <tr id="detail-contact-person-row" style="display: none;">
                                    <td><strong>Yetkili Kişi:</strong></td>
                                    <td id="detail-contact-person"></td>
                                </tr>
                                <tr id="detail-email-row" style="display: none;">
                                    <td><strong>E-posta:</strong></td>
                                    <td id="detail-email"></td>
                                </tr>
                                <tr id="detail-phone-row" style="display: none;">
                                    <td><strong>Telefon:</strong></td>
                                    <td id="detail-phone"></td>
                                </tr>
                                <tr id="detail-address-row" style="display: none;">
                                    <td><strong>Adres:</strong></td>
                                    <td id="detail-address"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Hizmet Bilgileri -->
                <div class="row mt-3" id="detail-service-info-section" style="display: none;">
                    <div class="col-12">
                        <h6 class="text-primary mb-3">Hizmet Bilgileri</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <p id="detail-service-types-p" style="display: none;"><strong>Hizmet Tipleri:</strong><br><span id="detail-service-types"></span></p>
                                <p id="detail-shipping-capacity-p" style="display: none;"><strong>Gönderi Kapasitesi:</strong><br><span id="detail-shipping-capacity"></span></p>
                            </div>
                            <div class="col-md-6">
                                <p id="detail-accepted-product-types-p" style="display: none;"><strong>Kabul Edilen Ürün Tipleri:</strong><br><span id="detail-accepted-product-types"></span></p>
                                <p id="detail-uk-regions-p" style="display: none;"><strong>İngiltere Bölgeleri:</strong><br><span id="detail-uk-regions"></span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Partner ve Hizmet Durumu -->
                <div class="row mt-3" id="detail-partner-service-section" style="display: none;">
                    <div class="col-md-6">
                        <h6 class="text-primary mb-3">Partner Bilgileri</h6>
                        <p id="detail-uk-partner-p" style="display: none;"><strong>İngiltere Partneri:</strong>
                            <span class="badge" id="detail-uk-partner-status"></span>
                        </p>
                        <p id="detail-partner-company-name-p" style="display: none;"><strong>Partner Firma:</strong> <span id="detail-partner-company-name"></span></p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-primary mb-3">Hizmetler</h6>
                        <p id="detail-customs-service-p" style="display: none;"><strong>Gümrük Müşavirliği:</strong>
                            <span class="badge" id="detail-customs-service-status"></span>
                        </p>
                    </div>
                </div>

                <!-- Sertifikalar -->
                <div class="row mt-3" id="detail-certificates-section" style="display: none;">
                    <div class="col-12">
                        <h6 class="text-primary mb-3">Sertifikalar</h6>
                        <p id="detail-certificates-p" style="display: none;"><strong>Sertifika Açıklaması:</strong><br><span id="detail-certificates"></span></p>
                        <p id="detail-certificate-files-p" style="display: none;"><strong>Sertifika Dosyaları:</strong></p>
                        <div class="d-flex flex-wrap gap-2" id="detail-certificate-files"></div>
                    </div>
                </div>

                <!-- Ek Bilgiler -->
                <div class="row mt-3" id="detail-additional-info-section" style="display: none;">
                    <div class="col-12">
                        <h6 class="text-primary mb-3">Ek Bilgiler</h6>
                        <p id="detail-additional-info"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>

{{-- Silme Onayı Modalı --}}
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Firma Silme Onayı</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
            </div>
            <div class="modal-body">
                Bu firmayı silmek istediğinizden emin misiniz? Bu işlem geri alınamaz.
                <br><br>
                <strong>Firma Adı:</strong> <span id="companyNameToDelete"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                {{-- Silme formunu ve butonunu önceki doğru haline geri getiriyoruz --}}
                <form id="deleteCompanyForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Sil</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .modal-body .table td {
        border: none;
        padding: 0.25rem 0.5rem;
    }
    .modal-body .table td:first-child {
        width: 40%;
        color: #6c757d;
    }
    .badge {
        font-size: 0.75em;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Silme Onayı Modalı için JavaScript
        const deleteConfirmationModal = document.getElementById('deleteConfirmationModal');
        deleteConfirmationModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const companyId = button.getAttribute('data-company-id');
            const companyName = button.getAttribute('data-company-name');
            const deleteForm = document.getElementById('deleteCompanyForm');
            const companyNameToDeleteSpan = document.getElementById('companyNameToDelete');

            // Formun action URL'ini Laravel'in url() helper'ı ile dinamik olarak ayarla
                         deleteForm.action = `{{ url('companies/destroy') }}/${companyId}`;

            companyNameToDeleteSpan.textContent = companyName;
        });

        // Firma Detay Modalı için JavaScript
        const companyDetailModal = document.getElementById('companyDetailModal');
        companyDetailModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const companyDetailsJson = button.getAttribute('data-company-details');
            const company = JSON.parse(companyDetailsJson);

            // Yardımcı fonksiyon: Bir elementin metnini ayarlar ve görünür yapar
            function setAndShowText(elementId, text) {
                const element = document.getElementById(elementId);
                if (element) {
                    element.textContent = text;
                    element.closest('tr, p').style.display = ''; // TR veya P elementini görünür yap
                }
            }

            // Yardımcı fonksiyon: Bir elementin innerHTML'ini ayarlar ve görünür yapar
            function setAndShowHtml(elementId, html) {
                const element = document.getElementById(elementId);
                if (element) {
                    element.innerHTML = html;
                    element.closest('tr, p').style.display = '';
                }
            }

            // Yardımcı fonksiyon: Bir bölümü (div.row.mt-3) gizler veya gösterir
            function toggleSectionVisibility(sectionId, hasContent) {
                const section = document.getElementById(sectionId);
                if (section) {
                    section.style.display = hasContent ? '' : 'none';
                }
            }

            // Tüm detay alanlarını ve ilgili satırları/paragrafları başlangıçta gizle
            document.querySelectorAll('#companyDetailModal [id^="detail-"]').forEach(el => {
                if (el.tagName === 'TD' || el.tagName === 'SPAN') {
                    el.textContent = ''; // İçeriği temizle
                }
                const parentRowOrP = el.closest('tr, p');
                if (parentRowOrP) {
                    parentRowOrP.style.display = 'none';
                }
            });
            // Tüm ana bölümleri gizle
            toggleSectionVisibility('detail-service-info-section', false);
            toggleSectionVisibility('detail-partner-service-section', false);
            toggleSectionVisibility('detail-certificates-section', false);
            toggleSectionVisibility('detail-additional-info-section', false);


            // Başlık Güncelleme
            const modalTitle = document.getElementById('companyDetailModalLabel');
            modalTitle.textContent = `${company.name} ${company.brand_name ? `(${company.brand_name})` : ''} - Detayları`;

            // Temel Bilgiler
            setAndShowText('detail-company-name', company.name);
            if (company.brand_name) setAndShowText('detail-brand-name', company.brand_name);
            if (company.tax_number) setAndShowText('detail-tax-number', company.tax_number);
            if (company.establishment_year) {
                const age = new Date().getFullYear() - company.establishment_year;
                setAndShowText('detail-establishment-year', `${company.establishment_year} (${age} yıllık)`);
            }
            if (company.website) {
                const formattedWebsite = company.website.startsWith('http') ? company.website : `http://${company.website}`;
                setAndShowHtml('detail-website', `<a href="${formattedWebsite}" target="_blank" rel="noopener noreferrer">${company.website}</a>`);
            }

            // İletişim Bilgileri
            if (company.contact_person) setAndShowText('detail-contact-person', company.contact_person);
            if (company.email) setAndShowHtml('detail-email', `<a href="mailto:${company.email}">${company.email}</a>`);
            if (company.phone) setAndShowHtml('detail-phone', `<a href="tel:${company.phone}">${company.phone}</a>`);
            if (company.address) setAndShowText('detail-address', company.address);

            // Hizmet Bilgileri
            let hasServiceInfo = false;
            if (company.service_types && company.service_types.length > 0) {
                const serviceBadges = company.service_types.map(type => `<span class="badge bg-secondary me-1">${type.charAt(0).toUpperCase() + type.slice(1)}</span>`).join('');
                setAndShowHtml('detail-service-types', serviceBadges);
                hasServiceInfo = true;
            }
            if (company.shipping_capacity) {
                setAndShowText('detail-shipping-capacity', company.shipping_capacity);
                hasServiceInfo = true;
            }
            if (company.accepted_product_types) {
                setAndShowText('detail-accepted-product-types', company.accepted_product_types);
                hasServiceInfo = true;
            }
            if (company.uk_regions) {
                setAndShowText('detail-uk-regions', company.uk_regions);
                hasServiceInfo = true;
            }
            toggleSectionVisibility('detail-service-info-section', hasServiceInfo);


            // Partner ve Hizmet Durumu
            let hasPartnerServiceInfo = false;
            if (typeof company.has_uk_partner !== 'undefined') {
                const statusText = company.has_uk_partner ? 'Evet' : 'Hayır';
                const statusClass = company.has_uk_partner ? 'bg-success' : 'bg-secondary';
                setAndShowHtml('detail-uk-partner-status', `<span class="badge ${statusClass}">${statusText}</span>`);
                hasPartnerServiceInfo = true;
            }
            if (company.partner_company_name) {
                setAndShowText('detail-partner-company-name', company.partner_company_name);
                hasPartnerServiceInfo = true;
            }
            if (typeof company.provides_customs_service !== 'undefined') {
                const statusText = company.provides_customs_service ? 'Evet' : 'Hayır';
                const statusClass = company.provides_customs_service ? 'bg-success' : 'bg-secondary';
                setAndShowHtml('detail-customs-service-status', `<span class="badge ${statusClass}">${statusText}</span>`);
                hasPartnerServiceInfo = true;
            }
            toggleSectionVisibility('detail-partner-service-section', hasPartnerServiceInfo);


            // Sertifikalar
            let hasCertificateInfo = false;
            if (company.certificates) {
                setAndShowText('detail-certificates', company.certificates);
                hasCertificateInfo = true;
            }
            const certificateFilesContainer = document.getElementById('detail-certificate-files');
            if (certificateFilesContainer) {
                certificateFilesContainer.innerHTML = ''; // Önceki dosyaları temizle
                if (company.certificate_files && company.certificate_files.length > 0) {
                    company.certificate_files.forEach((fileName, index) => {
                        // Laravel'de gerçek URL'ler için company.certificate_file_urls[index] kullanılabilir
                        const fileUrl = `#`; // Örnek için placeholder
                        const link = document.createElement('a');
                        link.href = fileUrl;
                        link.target = '_blank';
                        link.rel = 'noopener noreferrer';
                        link.className = 'btn btn-outline-primary btn-sm';
                        link.innerHTML = `<i class="fas fa-file"></i> ${fileName}`;
                        certificateFilesContainer.appendChild(link);
                    });
                    document.getElementById('detail-certificate-files-p').style.display = '';
                    hasCertificateInfo = true;
                }
            }
            toggleSectionVisibility('detail-certificates-section', hasCertificateInfo);


            // Ek Bilgiler
            if (company.additional_info) {
                setAndShowText('detail-additional-info', company.additional_info);
                toggleSectionVisibility('detail-additional-info-section', true);
            } else {
                toggleSectionVisibility('detail-additional-info-section', false);
            }
        });
    });
</script>
@endpush
@endsection
