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
                                    <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="ml-3 font-medium">{{ session('success') }}</span>
                                </div>
                                <button type="button" onclick="this.closest('.kt-card').remove()"
                                    class="text-green-400 hover:text-green-600">
                                    ✕
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Offers Table -->
                @if ($offers->count() > 0)
                    <div class="kt-card kt-card-grid min-w-full">
                        <div class="kt-card-header py-5 flex-wrap gap-2">
                            <h3 class="kt-card-title">Tüm Taşıma Teklifleri</h3>
                        </div>
                        <div class="kt-card-content">
                            <div class="kt-scrollable-x-auto">
                                <table class="kt-table kt-table-border w-full">
                                    <thead>
                                        <tr>
                                            <th class="w-[60px] text-center">#</th>
                                            <th class="min-w-[200px]">Teklif Türü</th>
                                            <th class="min-w-[120px]">Durum</th>
                                            <th class="min-w-[160px]">Oluşturulma</th>
                                            <th class="w-[100px] text-center">İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($offers as $teklif)
                                            <tr class="hover:bg-gray-50 transition-colors">
                                                <td class="text-center">{{ $teklif->id }}</td>
                                                <td>{{ $teklif->offer_type }}</td>
                                                <td>
                                                    <span class="kt-badge kt-badge-outline 
                                                        {{ $teklif->status == 'beklemede' ? 'kt-badge-warning' : 'kt-badge-success' }}">
                                                        {{ ucfirst($teklif->status) }}
                                                    </span>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($teklif->created_at)->format('d.m.Y H:i') }}</td>
                                                <td class="text-center">
                                                  <button type="button" 
    class="kt-btn kt-btn-sm kt-btn-outline kt-btn-info"
    onclick='showDetay(@json(is_array($teklif->details) ? $teklif->details : json_decode($teklif->details, true)))'>
    <i class="ki-filled ki-eye mr-1"></i> Detaylar
</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="kt-card">
                        <div class="kt-card-content px-10 py-12 text-center">
                            <h3 class="text-xl font-semibold text-gray-900">Henüz teklif kaydınız yok</h3>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-span-1">
            <div class="flex flex-col gap-5 lg:gap-7.5">
                <!-- Statistics Card -->
                <div class="kt-card">
                    <div class="kt-card-header">
                        <h3 class="kt-card-title">İstatistikler</h3>
                    </div>
                    <div class="kt-card-content">
                        <div class="grid gap-4">
                            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg">
                                <div>
                                    <p class="text-sm text-blue-600 font-medium">Toplam İstek</p>
                                    <p class="text-2xl font-bold text-blue-900">{{ $offers->count() }}</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg">
                                <div>
                                    <p class="text-sm text-green-600 font-medium">Bu Ay Gelen İstek</p>
                                    <p class="text-2xl font-bold text-green-900">
                                        {{ $offers->where('created_at', '>=', now()->startOfMonth())->count() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Support Card -->
                <div class="kt-card">
                    <div class="kt-card-content px-8 py-8">
                        <h2 class="text-xl font-semibold">Destek Merkezi</h2>
                        <p class="text-sm text-gray-600 mt-2">Sorularınız mı var? Destek ekibimizle iletişime geçin.</p>
                    </div>
                    <div class="kt-card-footer justify-center">
                        <a class="kt-link kt-link-underlined" href="#contact-support">Destek Al</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 

    <script>
function showDetay(detaylar) {
    let html = "";
    for (const [key, value] of Object.entries(detaylar)) {
        html += `<p><strong>${key}:</strong> ${value ?? '-'}</p>`;
    }

    Swal.fire({
        title: 'Teklif Detayları',
        html: html,
        icon: 'info',
        confirmButtonText: 'Kapat',
        confirmButtonColor: '#2563eb',
        width: '600px'
    });
}


    </script>
@endsection
