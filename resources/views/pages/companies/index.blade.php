@extends('layouts.app')

@section('title', 'Firmalarım')

@section('content')
    <!-- Delete Confirmation Modal -->
    <div id="deleteConfirmationModal" class="sticky inset-0 z-50 overflow-y-auto p-5" style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" onclick="closeDeleteModal()"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div
                class="inline-block w-full max-w-md px-6 pt-6 pb-6 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-xl shadow-2xl sm:my-8 sm:align-middle sm:p-8">
                <div class="flex items-center mb-6">
                    <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z">
                            </path>
                        </svg>
                    </div>
                </div>

                <div class="text-center">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Firma Silme Onayı</h3>
                    <h1> <span id="companyNameToDelete" class="text-gray-900 font-medium"></span>
                    </h1>
                    <p class="text-sm text-gray-600 mb-6">Bu firmayı silmek istediğinizden emin misiniz? Bu işlem geri
                        alınamaz.</p>
                    <div class="p-4 bg-gray-50 rounded-lg mb-6">
                        <p class="text-sm"><strong class="text-gray-700">Firma Adı:</strong>
                        </p>
                    </div>
                </div>

                <div class="flex space-x-3">
                    <button type="button" onclick="closeDeleteModal()"
                        class="flex-1 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium rounded-lg transition-all duration-200">
                        İptal
                    </button>
                    <form id="deleteCompanyForm" method="POST" action="" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-all duration-200 shadow-sm "style="background-color: red;">
                            Sil
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Company Detail Modal -->
    <div id="companyDetailModal"
        class="sticky inset-0 z-50 flex items-center justify-center overflow-y-auto hidden bg-black">
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeDetailModal()"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div
                class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                <div class="bg-white px-6 pt-6 pb-4 sm:p-8">
                    <div class="flex items-start justify-between mb-6">
                        <h3 class="text-xl font-semibold text-gray-900" id="modal-title">Firma Detayları</h3>
                        <button type="button" onclick="closeDetailModal()"
                            class="bg-gray-100 hover:bg-gray-200 rounded-lg p-2 text-gray-400 hover:text-gray-600 transition-colors duration-200">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="max-h-[70vh] overflow-y-auto space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-4">
                                <h4 class="text-blue-600 font-semibold text-base mb-3 border-b border-blue-100 pb-2">Temel
                                    Bilgiler</h4>
                                <div class="space-y-3">
                                    <p class="flex"><strong class="text-gray-700 min-w-[120px]">Firma Adı:</strong> <span
                                            id="detail-company-name" class="text-gray-900"></span></p>
                                    <p id="detail-brand-name-row" class="hidden flex"><strong
                                            class="text-gray-700 min-w-[120px]">Marka Adı:</strong> <span
                                            id="detail-brand-name" class="text-gray-900"></span></p>
                                    <p id="detail-tax-number-row" class="hidden flex"><strong
                                            class="text-gray-700 min-w-[120px]">Vergi No:</strong> <span
                                            id="detail-tax-number" class="text-gray-900"></span></p>
                                    <p id="detail-establishment-year-row" class="hidden flex"><strong
                                            class="text-gray-700 min-w-[120px]">Kuruluş Yılı:</strong> <span
                                            id="detail-establishment-year" class="text-gray-900"></span></p>
                                    <p id="detail-website-row" class="hidden flex"><strong
                                            class="text-gray-700 min-w-[120px]">Web Sitesi:</strong> <span
                                            id="detail-website" class="text-gray-900"></span></p>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <h4 class="text-blue-600 font-semibold text-base mb-3 border-b border-blue-100 pb-2">
                                    İletişim Bilgileri</h4>
                                <div class="space-y-3">
                                    <p id="detail-contact-person-row" class="hidden flex"><strong
                                            class="text-gray-700 min-w-[120px]">Yetkili:</strong> <span
                                            id="detail-contact-person" class="text-gray-900"></span></p>
                                    <p id="detail-email-row" class="hidden flex"><strong
                                            class="text-gray-700 min-w-[120px]">E-posta:</strong> <span id="detail-email"
                                            class="text-gray-900"></span></p>
                                    <p id="detail-phone-row" class="hidden flex"><strong
                                            class="text-gray-700 min-w-[120px]">Telefon:</strong> <span id="detail-phone"
                                            class="text-gray-900"></span></p>
                                    <p id="detail-address-row" class="hidden flex"><strong
                                            class="text-gray-700 min-w-[120px]">Adres:</strong> <span id="detail-address"
                                            class="text-gray-900"></span></p>
                                </div>
                            </div>
                        </div>

                        <div id="detail-service-info-section" class="hidden space-y-4">
                            <h4 class="text-blue-600 font-semibold text-base mb-3 border-b border-blue-100 pb-2">Hizmet
                                Bilgileri</h4>
                            <div class="space-y-3">
                                <p id="detail-service-types-p" class="hidden"><strong class="text-gray-700">Hizmet
                                        Tipleri:</strong> <span id="detail-service-types" class="ml-2"></span></p>
                                <p id="detail-shipping-capacity-p" class="hidden"><strong class="text-gray-700">Gönderi
                                        Kapasitesi:</strong> <span id="detail-shipping-capacity"
                                        class="text-gray-900 ml-2"></span></p>
                                <p id="detail-accepted-product-types-p" class="hidden"><strong
                                        class="text-gray-700">Kabul Edilen Ürünler:</strong> <span
                                        id="detail-accepted-product-types" class="text-gray-900 ml-2"></span></p>
                                <p id="detail-uk-regions-p" class="hidden"><strong class="text-gray-700">İngiltere
                                        Bölgeleri:</strong> <span id="detail-uk-regions"
                                        class="text-gray-900 ml-2"></span></p>
                            </div>
                        </div>

                        <div id="detail-partner-service-section" class="hidden space-y-4">
                            <h4 class="text-blue-600 font-semibold text-base mb-3 border-b border-blue-100 pb-2">Partner
                                Bilgileri</h4>
                            <div class="space-y-3">
                                <p id="detail-uk-partner-p" class="hidden"><strong class="text-gray-700">İngiltere
                                        Partneri:</strong> <span id="detail-uk-partner-status" class="ml-2"></span></p>
                                <p id="detail-partner-company-name-p" class="hidden"><strong
                                        class="text-gray-700">Partner Firma:</strong> <span
                                        id="detail-partner-company-name" class="text-gray-900 ml-2"></span></p>
                                <p id="detail-customs-service-p" class="hidden"><strong class="text-gray-700">Gümrük
                                        Hizmeti:</strong> <span id="detail-customs-service-status" class="ml-2"></span>
                                </p>
                            </div>
                        </div>

                        <div id="detail-certificates-section" class="hidden space-y-4">
                            <h4 class="text-blue-600 font-semibold text-base mb-3 border-b border-blue-100 pb-2">
                                Sertifikalar</h4>
                            <div class="space-y-3">
                                <p id="detail-certificates-p" class="hidden"><strong
                                        class="text-gray-700">Açıklama:</strong> <span id="detail-certificates"
                                        class="text-gray-900 ml-2"></span></p>
                                <div id="detail-certificate-files-p" class="hidden">
                                    <strong class="text-gray-700">Dosyalar:</strong>
                                    <div id="detail-certificate-files" class="mt-2 flex flex-wrap gap-2"></div>
                                </div>
                            </div>
                        </div>

                        <div id="detail-additional-info-section" class="hidden space-y-4">
                            <h4 class="text-blue-600 font-semibold text-base mb-3 border-b border-blue-100 pb-2">Ek
                                Bilgiler</h4>
                            <p id="detail-additional-info" class="text-gray-700 leading-relaxed"></p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-6 py-4 sm:px-8 sm:flex sm:flex-row-reverse border-t border-gray-200">
                    <button type="button" onclick="closeDetailModal()"
                        class="w-full inline-flex justify-center rounded-lg border border-gray-300 shadow-sm px-6 py-2.5 bg-white text-gray-700 hover:bg-gray-100 transition-colors duration-200 sm:ml-3 sm:w-auto font-medium">
                        Kapat
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- begin: grid -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 lg:gap-7.5 p-5">
        <div class="col-span-2">
            <div class="flex flex-col gap-5 lg:gap-7.5">
                <!-- Add New Company Card -->
                <div class="kt-card">
                    <div class="kt-card-header">
                        <h3 class="kt-card-title">Yeni Firma Ekle</h3>
                    </div>
                    <div class="kt-card-content">
                        <p class="text-sm text-gray-600 mb-4">
                            Yeni bir firma ekleyerek iş ağınızı genişletin ve işbirliklerinizi artırın.
                        </p>
                    </div>
                    <div class="kt-card-footer justify-center">
                        <a href="{{ route('companies.create') }}" class="kt-btn kt-btn-primary">
                            <i class="ki-filled ki-plus-squared mr-2"></i>
                            Yeni Firma Ekle
                        </a>
                    </div>
                </div>

                <!-- Success Alert -->
                @if (session('success'))
                    <div class="kt-card kt-card-grid">
                        <div class="kt-card-content">
                            <div
                                class="flex items-center justify-between p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <span class="font-medium">{{ session('success') }}</span>
                                    </div>
                                </div>
                                <button type="button" onclick="this.closest('.kt-card').remove()"
                                    class="text-green-400 hover:text-green-600 transition-colors duration-200">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Companies Table -->
                @if ($companies->count())
                    <div class="kt-card kt-card-grid min-w-full">
                        <div class="kt-card-header py-5 flex-wrap gap-2">
                            <h3 class="kt-card-title">Firmalarım</h3>
                            <div class="flex gap-6">


                            </div>
                        </div>
                        <div class="kt-card-content">
                            <div class="grid" data-kt-datatable="true" data-kt-datatable-page-size="10">
                                <!-- Desktop Table -->
                                <div class="kt-scrollable-x-auto hidden lg:block">
                                    <table class="kt-table kt-table-border" data-kt-datatable-table="true"
                                        id="companies_table">
                                        <thead>
                                            <tr>
                                                <th class="w-[60px] text-center">
                                                    <input class="kt-checkbox kt-checkbox-sm"
                                                        data-kt-datatable-check="true" type="checkbox">
                                                </th>
                                                <th class="min-w-[250px]">
                                                    <span class="kt-table-col">
                                                        <span class="kt-table-col-label">Firma</span>
                                                        <span class="kt-table-col-sort"></span>
                                                    </span>
                                                </th>
                                                <th class="min-w-[160px]">
                                                    <span class="kt-table-col">
                                                        <span class="kt-table-col-label">İletişim</span>
                                                        <span class="kt-table-col-sort"></span>
                                                    </span>
                                                </th>
                                                <th class="min-w-[140px]">
                                                    <span class="kt-table-col">
                                                        <span class="kt-table-col-label">Hizmet Tipi</span>
                                                        <span class="kt-table-col-sort"></span>
                                                    </span>
                                                </th>
                                                <th class="min-w-[120px]">
                                                    <span class="kt-table-col">
                                                        <span class="kt-table-col-label">Oluşturulma</span>
                                                        <span class="kt-table-col-sort"></span>
                                                    </span>
                                                </th>
                                                <th class="w-[80px]"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($companies as $company)
                                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                                    <td class="text-center">
                                                        <input class="kt-checkbox kt-checkbox-sm"
                                                            data-kt-datatable-row-check="true" type="checkbox"
                                                            value="{{ $company->id }}" />
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center gap-2.5">
                                                            <div
                                                                class="flex items-center justify-center w-9 h-9 bg-blue-100 rounded-full">
                                                                <i
                                                                    class="ki-filled ki-abstract-25 text-blue-600 text-lg"></i>
                                                            </div>
                                                            <div class="flex flex-col gap-0.5">
                                                                <a class="leading-none font-medium text-sm text-mono hover:text-primary"
                                                                    href="#">
                                                                    {{ $company->name }}
                                                                </a>
                                                                @if ($company->brand_name)
                                                                    <span
                                                                        class="text-sm text-secondary-foreground font-normal">
                                                                        {{ $company->brand_name }}
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex flex-col gap-1">
                                                            @if ($company->email)
                                                                <div class="text-sm text-foreground">{{ $company->email }}
                                                                </div>
                                                            @endif
                                                            @if ($company->phone)
                                                                <div class="text-sm text-secondary-foreground">
                                                                    {{ $company->phone }}</div>
                                                            @endif
                                                            @if (!$company->email && !$company->phone)
                                                                <span class="text-sm text-gray-400">-</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if (!empty($company->service_types))
                                                            <span
                                                                class="kt-badge kt-badge-outline kt-badge-primary items-center">
                                                                <span class="kt-badge-primary"></span>
                                                                {{ $company->service_types_text }}
                                                            </span>
                                                        @else
                                                            <span class="text-gray-400">-</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-foreground font-normal text-sm">
                                                        {{ $company->created_at->format('d.m.Y') }}
                                                    </td>
                                                    <td>
                                                        <div class="kt-menu inline-flex" data-kt-menu="true">
                                                            <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                                                data-kt-menu-item-placement="bottom-end"
                                                                data-kt-menu-item-placement-rtl="bottom-start"
                                                                data-kt-menu-item-toggle="dropdown"
                                                                data-kt-menu-item-trigger="click">
                                                                <button
                                                                    class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                                    <i class="ki-filled ki-dots-vertical text-lg"></i>
                                                                </button>
                                                                <div class="kt-menu-dropdown kt-menu-default w-full max-w-[175px]"
                                                                    data-kt-menu-dismiss="true">
                                                                    <div class="kt-menu-item">
                                                                        <button class="kt-menu-link w-full text-left"
                                                                            data-company="{{ base64_encode(json_encode($company)) }}"
                                                                            onclick="openDetailModalFromButton(this)">
                                                                            <span class="kt-menu-icon">
                                                                                <i class="ki-filled ki-search-list"></i>
                                                                            </span>
                                                                            <span class="kt-menu-title">Detay</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="kt-menu-item">
                                                                        <a class="kt-menu-link" href="">
                                                                            <span class="kt-menu-icon">
                                                                                <i class="ki-filled ki-pencil"></i>
                                                                            </span>
                                                                            <span class="kt-menu-title">Düzenle</span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="kt-menu-separator"></div>
                                                                    <div class="kt-menu-item">
                                                                        <button
                                                                            class="kt-menu-link w-full text-left text-red-600"
                                                                            onclick="openDeleteModal({{ $company->id }}, '{{ addslashes($company->name) }}')">
                                                                            <span class="kt-menu-icon">
                                                                                <i class="ki-filled ki-trash"></i>
                                                                            </span>
                                                                            <span class="kt-menu-title">Sil</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Mobile Cards -->
                                <div class="lg:hidden space-y-4">
                                    @foreach ($companies as $company)
                                        <div class="kt-card">
                                            <div class="kt-card-content p-5">
                                                <div class="flex justify-between items-start mb-4">
                                                    <div class="flex items-center gap-3">
                                                        <div
                                                            class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                                                            <i class="ki-filled ki-abstract-25 text-blue-600 text-lg"></i>
                                                        </div>
                                                        <div>
                                                            <h3 class="text-base font-semibold text-gray-900">
                                                                {{ $company->name }}</h3>
                                                            @if ($company->brand_name)
                                                                <p class="text-sm text-gray-500">
                                                                    ({{ $company->brand_name }})</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded">#{{ $company->id }}</span>
                                                </div>

                                                <div class="space-y-2 mb-4">
                                                    @if ($company->email)
                                                        <div class="flex items-center text-sm text-gray-600">
                                                            <i class="ki-filled ki-sms w-4 h-4 mr-2 text-gray-400"></i>
                                                            {{ $company->email }}
                                                        </div>
                                                    @endif
                                                    @if ($company->phone)
                                                        <div class="flex items-center text-sm text-gray-600">
                                                            <i class="ki-filled ki-phone w-4 h-4 mr-2 text-gray-400"></i>
                                                            {{ $company->phone }}
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="flex justify-between items-center">
                                                    <div>
                                                        @if (!empty($company->service_types))
                                                            <span class="kt-badge kt-badge-outline kt-badge-primary">
                                                                {{ $company->service_types_text }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="flex space-x-2">
                                                        <button type="button"
                                                            class="kt-btn kt-btn-sm kt-btn-outline kt-btn-primary"
                                                            data-company="{{ base64_encode(json_encode($company)) }}"
                                                            onclick="openDetailModalFromButton(this)">
                                                            <i class="ki-filled ki-eye mr-1"></i>
                                                            Detay
                                                        </button>
                                                        <button type="button"
                                                            class="kt-btn kt-btn-sm kt-btn-outline kt-btn-danger"
                                                            onclick="openDeleteModal({{ $company->id }}, '{{ addslashes($company->name) }}')">
                                                            <i class="ki-filled ki-trash mr-1"></i>
                                                            Sil
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="mt-4 pt-3 border-t border-gray-100">
                                                    <span
                                                        class="text-xs text-gray-400">{{ $company->created_at->format('d.m.Y H:i') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>


                            </div>
                        </div>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="kt-card">
                        <div class="kt-card-content px-10 py-12 text-center">
                            <div class="flex flex-col items-center gap-4">
                                <div class="relative size-[80px] shrink-0 mb-4">
                                    <svg class="w-full h-full stroke-primary/10 fill-primary-soft" fill="none"
                                        height="80" viewBox="0 0 44 48" width="80"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                            fill=""></path>
                                        <path
                                            d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                            stroke=""></path>
                                    </svg>
                                    <div
                                        class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                        <i class="ki-filled ki-abstract-25 text-2xl text-primary"></i>
                                    </div>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Henüz firma kaydınız yok</h3>
                                <p class="text-gray-600 mb-6 max-w-md">
                                    İş ağınızı genişletmek için ilk firmayı ekleyerek başlayın. Kolay ve hızlı bir şekilde
                                    firma bilgilerinizi yönetebilirsiniz.
                                </p>
                                <a href="{{ route('companies.create') }}" class="kt-btn kt-btn-primary">
                                    <i class="ki-filled ki-plus-squared mr-2"></i>
                                    İlk Firmayı Ekle
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-span-1">
            <div class="flex flex-col gap-5 lg:gap-7.5">
                <div class="kt-card">
                    <div class="kt-card-content py-10 flex flex-col gap-5 lg:gap-7.5">
                        <div class="flex flex-col items-start gap-2.5">
                            <div class="mb-2.5">
                                <div class="relative size-[50px] shrink-0">
                                    <svg class="w-full h-full stroke-primary/10 fill-primary-soft" fill="none"
                                        height="48" viewBox="0 0 44 48" width="44"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                            fill=""></path>
                                        <path
                                            d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                            stroke=""></path>
                                    </svg>
                                    <div
                                        class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                        <i class="ki-filled ki-abstract-25 text-xl ps-px text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <a class="text-base font-semibold text-mono hover:text-primary" href="#">
                                Firma Ağınızı Genişletin
                            </a>
                            <p class="text-sm text-secondary-foreground">
                                Yeni firmalar ekleyerek iş ağınızı büyütün ve işbirliği fırsatlarınızı artırın. Kolay firma
                                yönetimi ile başarıya ulaşın.
                            </p>
                            <a class="kt-link kt-link-underlined kt-link-dashed" href="{{ route('companies.create') }}">
                                Daha fazla bilgi
                            </a>
                        </div>

                        <span class="border-b border-b-border"></span>

                        <div class="flex flex-col items-start gap-2.5">
                            <div class="mb-2.5">
                                <div class="relative size-[50px] shrink-0">
                                    <svg class="w-full h-full stroke-primary/10 fill-primary-soft" fill="none"
                                        height="48" viewBox="0 0 44 48" width="44"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                            fill=""></path>
                                        <path
                                            d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                            stroke=""></path>
                                    </svg>
                                    <div
                                        class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                        <i class="ki-filled ki-profile-circle text-xl ps-px text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <a class="text-base font-semibold text-mono hover:text-primary" href="#">
                                Profesyonel İşbirliği
                            </a>
                            <p class="text-sm text-secondary-foreground">
                                Güvenilir iş ortakları ile bağlantı kurun ve projelerinizi güçlendirin. Detaylı firma
                                profilleri ile doğru seçimleri yapın.
                            </p>
                            <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                                Daha fazla bilgi
                            </a>
                        </div>

                        <span class="border-b border-b-border"></span>

                        <div class="flex flex-col items-start gap-2.5">
                            <div class="mb-2.5">
                                <div class="relative size-[50px] shrink-0">
                                    <svg class="w-full h-full stroke-primary/10 fill-primary-soft" fill="none"
                                        height="48" viewBox="0 0 44 48" width="44"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                            fill=""></path>
                                        <path
                                            d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                            stroke=""></path>
                                    </svg>
                                    <div
                                        class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                        <i class="ki-filled ki-chart-line text-xl ps-px text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <a class="text-base font-semibold text-mono hover:text-primary" href="#">
                                İstatistikler ve Raporlar
                            </a>
                            <p class="text-sm text-secondary-foreground">
                                Firma performansınızı takip edin, detaylı raporlar alın ve büyüme stratejilerinizi optimize
                                edin.
                            </p>
                            <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                                Daha fazla bilgi
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Statistics Card -->
                <div class="kt-card">
                    <div class="kt-card-header">
                        <h3 class="kt-card-title">İstatistikler</h3>
                    </div>
                    <div class="kt-card-content">
                        <div class="grid grid-cols-1 gap-4">
                            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg">
                                <div>
                                    <p class="text-sm text-blue-600 font-medium">Toplam Firma</p>
                                    <p class="text-2xl font-bold text-blue-900">{{ $companies->count() }}</p>
                                </div>
                                <div class="p-3 bg-blue-100 rounded-full">
                                    <i class="ki-filled ki-abstract-25 text-blue-600 text-xl"></i>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg">
                                <div>
                                    <p class="text-sm text-green-600 font-medium">Bu Ay Eklenen</p>
                                    <p class="text-2xl font-bold text-green-900">
                                        {{ $companies->where('created_at', '>=', now()->startOfMonth())->count() }}
                                    </p>
                                </div>
                                <div class="p-3 bg-green-100 rounded-full">
                                    <i class="ki-filled ki-calendar-add text-green-600 text-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Support Card -->
                <div class="kt-card">
                    <div class="kt-card-content px-8 py-8 lg:pr-10">
                        <div class="flex flex-wrap md:flex-nowrap items-center gap-6 md:gap-8">
                            <div class="flex flex-col items-start gap-3">
                                <h2 class="text-xl font-semibold text-mono">Destek Merkezi</h2>
                                <p class="text-sm text-foreground leading-relaxed mb-2.5">
                                    Sorularınız mı var? Destek ekibimizle iletişime geçin ve hızlı çözümler alın.
                                </p>
                            </div>
                            <div class="relative size-[100px] shrink-0">
                                <svg class="w-full h-full stroke-primary/10 fill-primary-soft" fill="none"
                                    height="100" viewBox="0 0 44 48" width="100"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                        fill=""></path>
                                    <path
                                        d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                        stroke=""></path>
                                </svg>
                                <div
                                    class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                    <i class="ki-filled ki-support text-2xl ps-px text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-card-footer justify-center">
                        <a class="kt-link kt-link-underlined kt-link-dashed" href="#contact-support">
                            Destek Al
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end: grid -->


    <!-- Company Detail Modal -->
    <!-- Tailwind CSS - Company Detail Modal -->

    <!-- Delete Confirmation Modal -->

    <script>
       function openDetailModalFromButton(button) {
    const companyData = button.getAttribute('data-company');
    const company = JSON.parse(atob(companyData));
    showCompanyDetail(company);
}

function showCompanyDetail(company) {
    // Firma detaylarını organize et
    const companyDetails = {};
    
    // Temel Bilgiler
    if (company.name) companyDetails['Firma Adı'] = company.name;
    if (company.brand_name) companyDetails['Marka Adı'] = company.brand_name;
    if (company.tax_number) companyDetails['Vergi No'] = company.tax_number;
    if (company.establishment_year) {
        const age = new Date().getFullYear() - company.establishment_year;
        companyDetails['Kuruluş Yılı'] = `${company.establishment_year} (${age} yıllık)`;
    }
    if (company.website) {
        const formattedWebsite = company.website.startsWith('http') ? company.website : `http://${company.website}`;
        companyDetails['Web Sitesi'] = `<a href="${formattedWebsite}" target="_blank" style="color: #2563eb; text-decoration: underline;">${company.website}</a>`;
    }
    
    // İletişim Bilgileri
    if (company.contact_person) companyDetails['Yetkili Kişi'] = company.contact_person;
    if (company.email) {
        companyDetails['E-posta'] = `<a href="mailto:${company.email}" style="color: #2563eb; text-decoration: underline;">${company.email}</a>`;
    }
    if (company.phone) {
        companyDetails['Telefon'] = `<a href="tel:${company.phone}" style="color: #2563eb; text-decoration: underline;">${company.phone}</a>`;
    }
    if (company.address) companyDetails['Adres'] = company.address;
    
    // Hizmet Bilgileri
    if (company.service_types && company.service_types.length > 0) {
        const serviceBadges = company.service_types.map(type => 
            `<span style="display: inline-block; background: #e5e7eb; color: #374151; padding: 2px 8px; border-radius: 12px; font-size: 12px; margin-right: 4px;">${type.charAt(0).toUpperCase() + type.slice(1)}</span>`
        ).join('');
        companyDetails['Hizmet Tipleri'] = serviceBadges;
    }
    if (company.shipping_capacity) companyDetails['Gönderi Kapasitesi'] = company.shipping_capacity;
    if (company.accepted_product_types) companyDetails['Kabul Edilen Ürünler'] = company.accepted_product_types;
    if (company.uk_regions) companyDetails['İngiltere Bölgeleri'] = company.uk_regions;
    
    // Partner Bilgileri
    if (typeof company.has_uk_partner !== 'undefined') {
        const statusText = company.has_uk_partner ? 'Evet' : 'Hayır';
        const statusColor = company.has_uk_partner ? '#10b981' : '#6b7280';
        companyDetails['İngiltere Partneri'] = `<span style="color: ${statusColor}; font-weight: 500;">${statusText}</span>`;
    }
    if (company.partner_company_name) companyDetails['Partner Firma'] = company.partner_company_name;
    if (typeof company.provides_customs_service !== 'undefined') {
        const statusText = company.provides_customs_service ? 'Evet' : 'Hayır';
        const statusColor = company.provides_customs_service ? '#10b981' : '#6b7280';
        companyDetails['Gümrük Hizmeti'] = `<span style="color: ${statusColor}; font-weight: 500;">${statusText}</span>`;
    }
    
    // Sertifikalar
    if (company.certificates) companyDetails['Sertifika Açıklaması'] = company.certificates;
    if (company.certificate_files && company.certificate_files.length > 0) {
        const fileLinks = company.certificate_files.map(fileName => 
            `<a href="#" style="display: inline-block; background: #dbeafe; color: #1d4ed8; padding: 4px 8px; border-radius: 6px; text-decoration: none; font-size: 12px; margin-right: 4px; margin-bottom: 4px;">📄 ${fileName}</a>`
        ).join('');
        companyDetails['Sertifika Dosyaları'] = fileLinks;
    }
    
    // Ek Bilgiler
    if (company.additional_info) companyDetails['Ek Bilgiler'] = company.additional_info;
    
    // HTML oluştur
    let html = `
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; text-align: left; max-height: 400px; overflow-y: auto;">
    `;

    for (const [key, value] of Object.entries(companyDetails)) {
        html += `
            <div style="background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; padding: 12px;">
                <p style="margin: 0; font-size: 13px; color: #6b7280; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">${key}</p>
                <div style="margin: 6px 0 0; font-size: 14px; color: #111827; line-height: 1.4;">${value ?? '-'}</div>
            </div>
        `;
    }

    html += `</div>`;

    // SweetAlert2 ile göster
    Swal.fire({
        title: `🏢 ${company.name} ${company.brand_name ? `(${company.brand_name})` : ''}`,
        html: html,
        icon: 'info',
        confirmButtonText: 'Kapat',
        confirmButtonColor: '#2563eb',
        width: '800px',
        customClass: {
            popup: 'company-detail-popup',
            title: 'company-detail-title',
            htmlContainer: 'company-detail-content'
        },
        showCloseButton: true,
        focusConfirm: false,
        allowOutsideClick: true,
        allowEscapeKey: true
    });
}

function openDeleteModal(companyId, companyName) {
    Swal.fire({
        title: 'Firma Silme Onayı',
        html: `
            <div style="text-align: center; padding: 10px;">
                <div style="background: #fef2f2; border: 1px solid #fecaca; border-radius: 8px; padding: 16px; margin-bottom: 20px;">
                    <div style="display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                        <div style="width: 48px; height: 48px; background: #fee2e2; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <svg style="width: 24px; height: 24px; color: #dc2626;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                    </div>
                    <p style="margin: 0; font-size: 16px; font-weight: 600; color: #991b1b; margin-bottom: 8px;">
                        ${companyName}
                    </p>
                    <p style="margin: 0; font-size: 14px; color: #7f1d1d;">
                        Bu firmayı silmek istediğinizden emin misiniz?<br>
                        <strong>Bu işlem geri alınamaz.</strong>
                    </p>
                </div>
                <div style="background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 6px; padding: 12px;">
                    <p style="margin: 0; font-size: 12px; color: #6b7280; text-align: left;">
                        <strong>Silinecek Firma:</strong> ${companyName}
                    </p>
                </div>
            </div>
        `,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Evet, Sil',
        cancelButtonText: 'İptal',
        reverseButtons: true,
        focusCancel: true,
        customClass: {
            popup: 'delete-confirmation-popup',
            confirmButton: 'delete-confirm-btn',
            cancelButton: 'delete-cancel-btn'
        },
        allowOutsideClick: false,
        allowEscapeKey: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Form oluştur ve gönder
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/companies/${companyId}`;
            
            // CSRF token ekle
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            if (csrfToken) {
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = csrfToken;
                form.appendChild(csrfInput);
            }
            
            // DELETE method ekle
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';
            form.appendChild(methodInput);
            
            document.body.appendChild(form);
            form.submit();
        }
    });
}

function closeDeleteModal() {
    // SweetAlert2 kullanıldığı için bu fonksiyon artık gereksiz
    // Ancak mevcut kod uyumluluğu için boş bırakılabilir
}

// CSS stillerini ekle (head'e eklenmesi önerilir)
const style = document.createElement('style');
style.textContent = `
    .company-detail-popup {
        border-radius: 12px !important;
    }
    
    .company-detail-title {
        font-size: 18px !important;
        font-weight: 600 !important;
        color: #1f2937 !important;
        margin-bottom: 16px !important;
    }
    
    .company-detail-content {
        padding: 0 !important;
    }
    
    .company-detail-content a:hover {
        opacity: 0.8;
    }
    
    .delete-confirmation-popup {
        border-radius: 12px !important;
    }
    
    .delete-confirm-btn {
        font-weight: 600 !important;
        border-radius: 8px !important;
        padding: 10px 20px !important;
    }
    
    .delete-cancel-btn {
        font-weight: 600 !important;
        border-radius: 8px !important;
        padding: 10px 20px !important;
    }
    
    @media (max-width: 768px) {
        .company-detail-popup {
            width: 95% !important;
            max-width: 95% !important;
        }
        
        .company-detail-content > div {
            grid-template-columns: 1fr !important;
        }
        
        .delete-confirmation-popup {
            width: 95% !important;
            max-width: 95% !important;
        }
    }
`;
document.head.appendChild(style);
 </script>
@endsection
