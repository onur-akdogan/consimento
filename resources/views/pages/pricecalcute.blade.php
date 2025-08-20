@extends('layouts.app')

@section('title', 'Fiyat Hesaplama Aracı')

@section('content')
    <div class="container mx-auto px-4 py-6 lg:py-8">
        <!-- Başlık Bölümü -->
        <div class="mb-6 lg:mb-8">
            <h2 class="text-xl lg:text-2xl font-semibold text-mono mb-2">Fiyat Hesaplama Aracı</h2>
            <p class="text-sm font-medium text-secondary-foreground">
                Kargo gönderim fiyatlarınızı hesaplayın ve en uygun teklifleri karşılaştırın.
            </p>
        </div>

        <!-- Hesaplama Formu -->
        <div class="kt-card mb-6 lg:mb-8">
            <div class="kt-card-header border-b border-input">
                <h3 class="kt-card-title">Gönderi Bilgileri</h3>
                <div class="flex items-center gap-2">
                    <i class="ki-filled ki-calculator text-lg text-muted-foreground"></i>
                </div>
            </div>
            <div class="kt-card-content p-5 lg:p-7.5">
                <form method="POST" action="{{ route('fiyat.hesapla') }}">
                    @csrf
                    
                    <!-- Temel Bilgiler -->
                    <div class="grid lg:grid-cols-2 gap-5 lg:gap-7.5 mb-6">
                        <div class="flex flex-col gap-2">
                            <label for="ulke" class="text-sm font-medium text-foreground">Nereye</label>
                            <select class="kt-select" id="ulke" name="ulke" required>
                                <option value="">Ülke Seçiniz</option>
                                @foreach ($ulkes as $ulkem)
                                    <option value="{{ $ulkem->ad }}"
                                        {{ old('ulke', $ulke ?? '') == $ulkem->ad ? 'selected' : '' }}>
                                        {{ $ulkem->ad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="flex flex-col gap-2">
                            <label for="agirlik" class="text-sm font-medium text-foreground">Ağırlık (kg)</label>
                            <input type="number" 
                                   step="0.1" 
                                   min="0.1" 
                                   class="kt-input" 
                                   id="agirlik"
                                   name="agirlik" 
                                   value="{{ old('agirlik', $agirlik ?? '') }}" 
                                   placeholder="0.5"
                                   required>
                        </div>
                    </div>

                    <!-- Ölçü Seçeneği -->
                    <div class="mb-6 pt-3 pb-3">
                        <div class="flex items-start gap-3 p-4 bg-secondary/5 rounded-lg border border-input">
                            <input class="kt-checkbox" type="checkbox" id="olcuSec" name="olcuSec"
                                {{ old('olcuSec', true) ? 'checked' : '' }}>
                            <div class="flex flex-col gap-1">
                                <label class="text-sm font-medium text-foreground cursor-pointer" for="olcuSec">
                                    Ölçüleri de girip daha yakın fiyatları görmek istiyorum
                                </label>
                                <p class="text-xs text-muted-foreground">
                                    Paket ölçülerini girerek hacimsel ağırlık hesaplaması yapılır ve daha kesin fiyat alırsınız.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Ölçü Alanları -->
                    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 mb-6 pb-5" id="olcuAlanlari">
                        <div class="flex flex-col gap-2">
                            <label for="en" class="text-sm font-medium text-foreground">En (cm)</label>
                            <input type="number" 
                                   step="0.1" 
                                   class="kt-input" 
                                   id="en" 
                                   name="en"
                                   value="{{ old('en', $en ?? '') }}"
                                   placeholder="20">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="boy" class="text-sm font-medium text-foreground">Boy (cm)</label>
                            <input type="number" 
                                   step="0.1" 
                                   class="kt-input" 
                                   id="boy" 
                                   name="boy"
                                   value="{{ old('boy', $boy ?? '') }}"
                                   placeholder="30">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="yukseklik" class="text-sm font-medium text-foreground">Yükseklik (cm)</label>
                            <input type="number" 
                                   step="0.1" 
                                   class="kt-input" 
                                   id="yukseklik" 
                                   name="yukseklik"
                                   value="{{ old('yukseklik', $yukseklik ?? '') }}"
                                   placeholder="10">
                        </div>
                    </div>

                    <!-- Hesaplama Sonuçları -->
                    @if (isset($ucreteEsasAgirlik))
                        <div class="bg-success/5 border border-success/20 rounded-lg p-4 mb-6 pt-4">
                            <h4 class="text-sm font-semibold text-success mb-3 flex items-center gap-2">
                                <i class="ki-filled ki-information-2"></i>
                                Ağırlık Hesaplama Sonuçları
                            </h4>
                            <div class="grid lg:grid-cols-3 gap-4 text-sm">
                                <div class="flex flex-col gap-1">
                                    <span class="text-muted-foreground">Brüt Ağırlık</span>
                                    <span class="font-semibold text-foreground">{{ number_format($agirlik, 2) }} kg</span>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <span class="text-muted-foreground">Hacimsel Ağırlık</span>
                                    <span class="font-semibold text-foreground">{{ number_format($hacimselAgirlik, 2) }} desi</span>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <span class="text-muted-foreground">Ücrete Esas Ağırlık</span>
                                    <span class="font-semibold text-success">{{ number_format($ucreteEsasAgirlik, 2) }} kg</span>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="flex justify-center lg:justify-start pt-5">
                        <button type="submit" class="kt-btn kt-btn-primary px-8">
                            <i class="ki-filled ki-calculator mr-2"></i>
                            Fiyat Hesapla
                        </button>
                    </div>
                </form>
            </div>
        </div>

     <!-- begin: grid -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 lg:gap-7.5 p-5">
        <!-- Sol Alan -->
        <div class="col-span-2">
            <div class="flex flex-col gap-5 lg:gap-7.5">

                <!-- Teklifler Kartı -->
                <div class="kt-card kt-card-grid min-w-full">
                    <div class="kt-card-header py-5 flex-wrap gap-2 justify-between items-center">
                        <h3 class="kt-card-title">
                            Size Özel Taşıma Teklifleri
                        </h3>
                        <span class="kt-badge kt-badge-outline kt-badge-success kt-badge-sm">
                            {{ isset($fiyatlar) ? count($fiyatlar) : 0 }} Teklif
                        </span>
                    </div>

                    <div class="kt-card-content">
                        @if(isset($fiyatlar) && count($fiyatlar) > 0)
                            <div class="kt-scrollable-x-auto">
                                <table class="kt-table kt-table-border">
                                    <thead>
                                        <tr>
                                            <th class="min-w-[150px]">Taşıyıcı</th>
                                            <th class="min-w-[150px]">Hizmet Tipi</th>
                                            <th class="min-w-[150px]">Tahmini Varış</th>
                                            <th class="min-w-[120px]">Fiyat (USD)</th>
                                            <th class="min-w-[120px]">Durum</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fiyatlar as $fiyat)
                                            <tr>
                                                <td>
                                                    <span class="kt-badge kt-badge-warning font-semibold px-3 py-1.5">
                                                        {{ $fiyat->tasiyici }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="kt-badge kt-badge-primary font-medium px-3 py-1.5">
                                                        {{ $fiyat->hizmet_tipi }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2">
                                                        <i class="ki-filled ki-calendar text-muted-foreground"></i>
                                                        <span class="text-sm font-medium text-foreground">
                                                            {{ $fiyat->tahmini_varis }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2">
                                                        <i class="ki-filled ki-dollar text-green-500"></i>
                                                        <span class="text-lg font-semibold text-green-500">
                                                            {{ number_format($fiyat->fiyat, 2) }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($loop->first)
                                                        <span class="kt-badge kt-badge-success">
                                                            <i class="ki-filled ki-star mr-1"></i>
                                                            En Uygun
                                                        </span>
                                                    @else
                                                        <span class="kt-badge kt-badge-outline kt-badge-secondary">
                                                            Alternatif
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <!-- Teklif Bulunamadı -->
                            <div class="flex flex-col items-center gap-5 p-8 text-center">
                                <i class="ki-filled ki-information-2 text-6xl text-muted-foreground"></i>
                                <h3 class="text-lg font-semibold text-mono">Teklif Bulunamadı</h3>
                                <p class="text-sm text-muted-foreground">
                                    Girilen bilgilere uygun taşıma teklifi bulunamadı. Lütfen bilgilerinizi kontrol ederek tekrar deneyin.
                                </p>
                                <button onclick="window.location.reload()" class="kt-btn kt-btn-outline kt-btn-primary">
                                    <i class="ki-filled ki-reload mr-2"></i> Tekrar Dene
                                </button>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <!-- Sağ Alan (Destek Kartı) -->
        <div class="col-span-1">
            <div class="flex flex-col gap-5 lg:gap-7.5">
                <div class="kt-card">
                    <div class="kt-card-content px-10 py-7.5 lg:pr-12.5">
                        <div class="flex flex-col gap-3">
                            <h2 class="text-xl font-medium text-mono">Destek</h2>
                            <p class="text-sm text-foreground leading-5.5">
                                Sorularınız mı var? Destek ekibimizle iletişime geçerek hızlıca yanıt alabilirsiniz.
                            </p>
                        </div>
                    </div>
                    <div class="kt-card-footer justify-center">
                        <a class="kt-link kt-link-underlined kt-link-dashed" href="https://keenthemes.com/contact">
                            Destek ile İletişim
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const olcuSecCheckbox = document.getElementById('olcuSec');
            const olcuAlanlari = document.getElementById('olcuAlanlari');
            
            function toggleOlcuAlanlari() {
                if (olcuSecCheckbox.checked) {
                    olcuAlanlari.style.display = 'grid';
                    olcuAlanlari.classList.add('animate-fade-in');
                } else {
                    olcuAlanlari.style.display = 'none';
                    olcuAlanlari.classList.remove('animate-fade-in');
                }
            }
            
            // İlk yüklemede kontrol et
            toggleOlcuAlanlari();
            
            // Checkbox değişikliğinde kontrol et
            olcuSecCheckbox.addEventListener('change', toggleOlcuAlanlari);
            
            // Form validasyonu
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                const ulke = document.getElementById('ulke').value;
                const agirlik = document.getElementById('agirlik').value;
                
                if (!ulke || !agirlik) {
                    e.preventDefault();
                    alert('Lütfen tüm zorunlu alanları doldurun.');
                }
            });
        });
    </script>

    <style>
        .animate-fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .kt-input {
            @apply w-full px-3 py-2 border border-input rounded-lg bg-background text-foreground text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all;
        }
        
        .kt-select {
            @apply w-full px-3 py-2 border border-input rounded-lg bg-background text-foreground text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all;
        }
        
        .kt-checkbox {
            @apply w-4 h-4 text-primary border-2 border-input rounded focus:ring-primary focus:ring-2;
        }
        
        .kt-btn {
            @apply inline-flex items-center justify-center px-4 py-2 text-sm font-medium rounded-lg transition-all focus:outline-none focus:ring-2 focus:ring-offset-2;
        }
        
        .kt-btn-primary {
            @apply bg-primary text-primary-foreground hover:bg-primary/90 focus:ring-primary;
        }
        
        .kt-btn-outline {
            @apply border border-input bg-background hover:bg-secondary;
        }
        
        .kt-card {
            @apply bg-background border border-input rounded-lg shadow-sm;
        }
        
        .kt-card-header {
            @apply px-5 py-4 lg:px-7.5 lg:py-6;
        }
        
        .kt-card-title {
            @apply text-lg font-semibold text-mono;
        }
        
        .kt-card-content {
            @apply px-5 py-4 lg:px-7.5 lg:py-6;
        }
        
        .kt-badge {
            @apply inline-flex items-center px-2 py-1 text-xs font-medium rounded-full;
        }
        
        .kt-badge-primary {
            @apply bg-primary text-primary-foreground;
        }
        
        .kt-badge-success {
            @apply bg-green-500 text-white;
        }
        
        .kt-badge-warning {
            @apply bg-yellow-500 text-white;
        }
        
        .kt-badge-outline {
            @apply border border-current bg-transparent;
        }
        
        .kt-badge-secondary {
            @apply bg-secondary text-secondary-foreground;
        }
        
        .kt-badge-sm {
            @apply px-1.5 py-0.5 text-xs;
        }
    </style>
@endpush