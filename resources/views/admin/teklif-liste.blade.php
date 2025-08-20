@extends('layouts.app')

@section('title', 'Taşıma Teklifleri')

@section('content')
    <!-- begin: grid -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 lg:gap-7.5 p-5">
        <div class="col-span-2">
            <div class="flex flex-col gap-5 lg:gap-7.5">

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
                                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 
                                                  00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 
                                                  00-1.414 1.414l2 2a1 1 0 
                                                  001.414 0l4-4z"
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
                                              d="M4.293 4.293a1 1 0 
                                              011.414 0L10 8.586l4.293-4.293a1 1 0 
                                              111.414 1.414L11.414 10l4.293 4.293a1 1 0 
                                              01-1.414 1.414L10 11.414l-4.293 
                                              4.293a1 1 0 
                                              01-1.414-1.414L8.586 10 4.293 
                                              5.707a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Offers Table -->
                @if ($teklifler->count() > 0)
                    <div class="kt-card kt-card-grid min-w-full">
                        <div class="kt-card-header py-5 flex-wrap gap-2 flex justify-between items-center">
                            <h3 class="kt-card-title">Tüm Taşıma Firmaları</h3>
                            <a href="{{ route('admin.teklif.form') }}"
                               class="kt-btn kt-btn-sm kt-btn-primary">
                                Yeni Firma Ekle
                            </a>
                        </div>
                        <div class="kt-card-content">
                            <div class="grid" data-kt-datatable="true" data-kt-datatable-page-size="10">

                                <!-- Masaüstü Tablo -->
                                <div class="kt-scrollable-x-auto hidden lg:block">
                                    <table class="kt-table kt-table-border" id="offers_table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ülke</th>
                                            <th>Ağırlık Aralığı</th>
                                            <th>Taşıyıcı</th>
                                            <th>Hizmet Tipi</th>
                                            <th>Varış Süreci</th>
                                            <th>Fiyat (USD)</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($teklifler as $teklif)
                                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                                <td>{{ $teklif->id }}</td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div
                                                            class="flex items-center justify-center w-9 h-9 bg-blue-100 rounded-full">
                                                            <i class="ki-filled ki-geolocation text-blue-600 text-lg"></i>
                                                        </div>
                                                        <span class="font-medium text-sm">{{ $teklif->ulke }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="kt-badge kt-badge-outline kt-badge-primary">
                                                        {{ $teklif->min_kg }} - {{ $teklif->max_kg }} kg
                                                    </span>
                                                </td>
                                                <td>{{ $teklif->tasiyici }}</td>
                                                <td>
                                                    <span class="kt-badge kt-badge-outline kt-badge-info">
                                                        {{ $teklif->hizmet_tipi }}
                                                    </span>
                                                </td>
                                                <td>{{ $teklif->tahmini_varis }}</td>
                                                <td>
                                                    <span class="font-semibold">
                                                        ${{ number_format($teklif->fiyat, 2) }}
                                                    </span>
                                                </td>
                                                <td class="space-x-2">
                                                    <a href="{{ route('admin.teklif.duzenle.form', $teklif->id) }}"
                                                       class="kt-btn kt-btn-sm kt-btn-outline kt-btn-primary">
                                                        <i class="ki-filled ki-pencil mr-1"></i>Düzenle
                                                    </a>
                                                    <form action="{{ route('admin.teklif.sil', $teklif->id) }}"
                                                          method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                onclick="return confirm('Silmek istediğinize emin misiniz?')"
                                                                class="kt-btn kt-btn-sm kt-btn-outline kt-btn-danger">
                                                            <i class="ki-filled ki-trash mr-1"></i>Sil
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Mobil Kartlar -->
                                <div class="lg:hidden space-y-4">
                                    @foreach ($teklifler as $teklif)
                                        <div class="kt-card">
                                            <div class="kt-card-content p-5">
                                                <div class="flex justify-between items-start mb-4">
                                                    <div class="flex items-center gap-3">
                                                        <div
                                                            class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                                                            <i class="ki-filled ki-geolocation text-blue-600 text-lg"></i>
                                                        </div>
                                                        <div>
                                                            <h3 class="text-base font-semibold">{{ $teklif->ulke }}</h3>
                                                            <p class="text-sm text-gray-500">{{ $teklif->tasiyici }}</p>
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded">#{{ $teklif->id }}</span>
                                                </div>

                                                <div class="grid grid-cols-2 gap-4 mb-4">
                                                    <div>
                                                        <p class="text-xs text-gray-400 mb-1">Ağırlık Aralığı</p>
                                                        <span class="kt-badge kt-badge-outline kt-badge-primary text-xs">
                                                            {{ $teklif->min_kg }} - {{ $teklif->max_kg }} kg
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <p class="text-xs text-gray-400 mb-1">Hizmet Tipi</p>
                                                        <span class="kt-badge kt-badge-outline kt-badge-info text-xs">
                                                            {{ $teklif->hizmet_tipi }}
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <p class="text-xs text-gray-400 mb-1">Varış Süreci</p>
                                                        <span class="text-sm">{{ $teklif->tahmini_varis }}</span>
                                                    </div>
                                                    <div>
                                                        <p class="text-xs text-gray-400 mb-1">Fiyat</p>
                                                        <span class="font-semibold">${{ number_format($teklif->fiyat, 2) }}</span>
                                                    </div>
                                                </div>

                                                <div class="flex justify-between items-center pt-3 border-t">
                                                    <a href="{{ route('admin.teklif.duzenle.form', $teklif->id) }}"
                                                       class="kt-btn kt-btn-sm kt-btn-outline kt-btn-primary">
                                                        <i class="ki-filled ki-pencil mr-1"></i>Düzenle
                                                    </a>
                                                    <form action="{{ route('admin.teklif.sil', $teklif->id) }}"
                                                          method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                onclick="return confirm('Silmek istediğinize emin misiniz?')"
                                                                class="kt-btn kt-btn-sm kt-btn-outline kt-btn-danger">
                                                            <i class="ki-filled ki-trash mr-1"></i>Sil
                                                        </button>
                                                    </form>
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
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Henüz teklif firma kaydınız yok</h3>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-span-1">
            <div class="flex flex-col gap-5 lg:gap-7.5">

                <!-- İstatistikler -->
                <div class="kt-card">
                    <div class="kt-card-header">
                        <h3 class="kt-card-title">İstatistikler</h3>
                    </div>
                    <div class="kt-card-content">
                        <div class="grid gap-4">
                            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg">
                                <div>
                                    <p class="text-sm text-blue-600 font-medium">Toplam Firma</p>
                                    <p class="text-2xl font-bold text-blue-900">{{ $teklifler->count() }}</p>
                                </div>
                                <div class="p-3 bg-blue-100 rounded-full">
                                    <i class="ki-filled ki-abstract-25 text-blue-600 text-xl"></i>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg">
                                <div>
                                    <p class="text-sm text-green-600 font-medium">Bu Ay Gelen Eklenen Firma</p>
                                    <p class="text-2xl font-bold text-green-900">
                                        {{ $teklifler->where('created_at', '>=', now()->startOfMonth())->count() }}
                                    </p>
                                </div>
                                <div class="p-3 bg-green-100 rounded-full">
                                    <i class="ki-filled ki-calendar-add text-green-600 text-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Destek Kartı -->
                <div class="kt-card">
                    <div class="kt-card-content p-6">
                        <h2 class="text-lg font-semibold mb-2">Destek Merkezi</h2>
                        <p class="text-sm text-gray-600 mb-4">
                            Sorularınız mı var? Destek ekibimizle iletişime geçin.
                        </p>
                        <a class="kt-btn kt-btn-sm kt-btn-primary" href="#contact-support">
                            Destek Al
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
