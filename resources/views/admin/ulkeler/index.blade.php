@extends('layouts.app')

@section('title', 'Ülke Yönetimi')

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

                <!-- Countries Table -->
                @if ($ulkeler->count() > 0)
                    <div class="kt-card kt-card-grid min-w-full">
                        <div class="kt-card-header py-5 flex-wrap gap-2 flex justify-between items-center">
                            <h3 class="kt-card-title">Tüm Şehirler</h3>
                        </div>
                        <div class="kt-card-content">
                            <div class="grid" data-kt-datatable="true" data-kt-datatable-page-size="10">

                                <!-- Masaüstü Tablo -->
                                <div class="kt-scrollable-x-auto hidden lg:block">
                                    <table class="kt-table kt-table-border" id="countries_table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Şehir Adı</th>
                                            <th>Oluşturulma Tarihi</th>
                                            <th>İşlemler</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($ulkeler as $sehir)
                                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                                <td>{{ $sehir->id }}</td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div
                                                            class="flex items-center justify-center w-9 h-9 bg-blue-100 rounded-full">
                                                            <i class="ki-filled ki-geolocation text-blue-600 text-lg"></i>
                                                        </div>
                                                        <span class="font-medium text-sm">{{ $sehir->ad }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-sm text-gray-600">
                                                        {{ $sehir->created_at->format('d.m.Y H:i') }}
                                                    </span>
                                                </td>
                                                <td class="space-x-2">
                                                    <form action="{{ route('ulkeler.destroy', $sehir->id) }}" 
                                                          method="POST" class="inline"
                                                          onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
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
                                    @foreach ($ulkeler as $sehir)
                                        <div class="kt-card">
                                            <div class="kt-card-content p-5">
                                                <div class="flex justify-between items-start mb-4">
                                                    <div class="flex items-center gap-3">
                                                        <div
                                                            class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                                                            <i class="ki-filled ki-geolocation text-blue-600 text-lg"></i>
                                                        </div>
                                                        <div>
                                                            <h3 class="text-base font-semibold">{{ $sehir->ad }}</h3>
                                                            <p class="text-sm text-gray-500">{{ $sehir->created_at->format('d.m.Y H:i') }}</p>
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded">#{{ $sehir->id }}</span>
                                                </div>

                                                <div class="flex justify-end items-center pt-3 border-t">
                                                    <form action="{{ route('ulkeler.destroy', $sehir->id) }}" 
                                                          method="POST" class="inline"
                                                          onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
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
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Henüz şehir kaydınız yok</h3>
                            <p class="text-gray-600 mb-4">Yeni şehir eklemek için sol taraftaki formu kullanın.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-span-1">
            <div class="flex flex-col gap-5 lg:gap-7.5">

                <!-- Yeni Şehir Ekleme Formu -->
                <div class="kt-card">
                    <div class="kt-card-header">
                        <h3 class="kt-card-title">Yeni Şehir Ekle</h3>
                    </div>
                    <div class="kt-card-content">
                        <form action="{{ route('ulkeler.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Şehir Adı</label>
                                <input type="text" name="ad" 
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="Şehir adını girin" required>
                                @error('ad')
                                    <small class="text-red-600 text-xs mt-1">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" 
                                    class="w-full kt-btn kt-btn-primary">
                                <i class="ki-filled ki-plus mr-2"></i>Şehir Ekle
                            </button>
                        </form>
                    </div>
                </div>

                <!-- İstatistikler -->
                <div class="kt-card">
                    <div class="kt-card-header">
                        <h3 class="kt-card-title">İstatistikler</h3>
                    </div>
                    <div class="kt-card-content">
                        <div class="grid gap-4">
                            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg">
                                <div>
                                    <p class="text-sm text-blue-600 font-medium">Toplam Şehir</p>
                                    <p class="text-2xl font-bold text-blue-900">{{ $ulkeler->count() }}</p>
                                </div>
                                <div class="p-3 bg-blue-100 rounded-full">
                                    <i class="ki-filled ki-geolocation text-blue-600 text-xl"></i>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg">
                                <div>
                                    <p class="text-sm text-green-600 font-medium">Bu Ay Eklenen</p>
                                    <p class="text-2xl font-bold text-green-900">
                                        {{ $ulkeler->where('created_at', '>=', now()->startOfMonth())->count() }}
                                    </p>
                                </div>
                                <div class="p-3 bg-green-100 rounded-full">
                                    <i class="ki-filled ki-calendar-add text-green-600 text-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

              

            </div>
        </div>
    </div>
@endsection