@extends('layouts.app')

@section('title', 'Adreslerim')

@section('content')
<div class="kt-container p-6 m-5 grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- Sol / Orta Alan: Adresler -->
    <div class="col-span-2 flex flex-col gap-6">
        <!-- Başlık ve Sekmeler -->
        <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">📍 Adreslerim</h3>

        <nav class="flex border-b border-gray-200 dark:border-gray-700 mb-6" aria-label="Tabs">
            <a href="{{ route('addresses.index', ['type' => 'sender']) }}"
               class="flex-1 text-center px-4 py-3 border-b-4 text-base font-semibold transition-all duration-300
                      {{ $type == 'sender' 
                          ? 'border-blue-600 text-blue-600 bg-blue-50 dark:bg-blue-900/30 rounded-t-lg' 
                          : 'border-transparent text-gray-600 hover:text-blue-600 hover:border-blue-300' }}">
                🚚 Gönderim Adreslerim
            </a>
            <a href="{{ route('addresses.index', ['type' => 'receiver']) }}"
               class="flex-1 text-center px-4 py-3 border-b-4 text-base font-semibold transition-all duration-300
                      {{ $type == 'receiver' 
                          ? 'border-blue-600 text-blue-600 bg-blue-50 dark:bg-blue-900/30 rounded-t-lg' 
                          : 'border-transparent text-gray-600 hover:text-blue-600 hover:border-blue-300' }}">
                🎯 Alıcı Adreslerim
            </a>
        </nav>

        <h5 class="text-lg font-medium mb-4 text-gray-700 dark:text-gray-200">
            {{ $type === 'sender' ? 'Gönderim' : 'Alıcı' }} Adreslerim
        </h5>

        <!-- Kart Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Yeni Adres Ekle -->
            <a href="{{ route('addresses.create', ['type' => $type]) }}" class="block group">
                <div class="h-full border-2 border-dashed border-gray-300 rounded-2xl flex flex-col items-center justify-center p-8
                            bg-gray-50 dark:bg-gray-800 hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20
                            transition-all duration-300 shadow-sm group-hover:shadow-lg">
                    <div class="w-14 h-14 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 text-4xl mb-3 group-hover:scale-110 transition">
                        +
                    </div>
                    <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">Yeni Adres Ekle</div>
                </div>
            </a>

            <!-- Mevcut Adresler -->
            @foreach($addresses as $address)
            <div class="h-full rounded-2xl shadow-md hover:shadow-lg transition p-5 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 relative">
                <h6 class="font-bold text-lg mb-3 text-gray-800 dark:text-gray-100">{{ $address->name }}</h6>
                <p class="mb-1"><span class="font-semibold">📞 Telefon:</span> {{ $address->phone }}</p>
                <p class="mb-1"><span class="font-semibold">🏙️ Şehir:</span> {{ $address->city }} / {{ $address->district }}</p>
                <p class="mb-1"><span class="font-semibold">📍 Adres:</span> {{ $address->address }}</p>
                <p class="text-xs text-gray-500 mt-3">📅 {{ $address->created_at->format('d.m.Y H:i') }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Sağ Alan: Destek / Sidebar -->
       <!-- Sidebar -->
            <div class="col-span-1">
                <div class="flex flex-col gap-5 lg:gap-7.5">
                    <div class="kt-card">
                        <div class="kt-card-content py-10 flex flex-col gap-5 lg:gap-7.5">
                            <div class="flex flex-col items-start gap-2.5">
                                <div class="mb-2.5">
                                    <div class="relative size-[50px] shrink-0">
                                        <svg class="w-full h-full stroke-primary/10 fill-primary-soft" fill="none" height="48" viewBox="0 0 44 48" width="44" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z" fill=""></path>
                                            <path d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z" stroke=""></path>
                                        </svg>
                                        <div class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                            <i class="ki-filled ki-abstract-25 text-xl ps-px text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                                <a class="text-base font-semibold text-mono hover:text-primary" href="#">
                                    Adres Ağınızı Genişletin
                                </a>
                                <p class="text-sm text-secondary-foreground">
                                    Yeni adresler ekleyerek iş ağınızı büyütün ve işbirliği fırsatlarınızı artırın. Kolay Adres yönetimi ile başarıya ulaşın.
                                </p>
                                <a class="kt-link kt-link-underlined kt-link-dashed" href="{{ route('addresses.create', ['type' => $type]) }}">
                                    Daha fazla bilgi
                                </a>
                            </div>
                            
                            <span class="border-b border-b-border"></span>
                            
                            <div class="flex flex-col items-start gap-2.5">
                                <div class="mb-2.5">
                                    <div class="relative size-[50px] shrink-0">
                                        <svg class="w-full h-full stroke-primary/10 fill-primary-soft" fill="none" height="48" viewBox="0 0 44 48" width="44" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z" fill=""></path>
                                            <path d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z" stroke=""></path>
                                        </svg>
                                        <div class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                            <i class="ki-filled ki-profile-circle text-xl ps-px text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                                <a class="text-base font-semibold text-mono hover:text-primary" href="#">
                                    Profesyonel İşbirliği
                                </a>
                                <p class="text-sm text-secondary-foreground">
                                    Güvenilir iş ortakları ile bağlantı kurun ve projelerinizi güçlendirin. Detaylı Adres profilleri ile doğru seçimleri yapın.
                                </p>
                                <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                                    Daha fazla bilgi
                                </a>
                            </div>
                            
                            <span class="border-b border-b-border"></span>
                            
                            <div class="flex flex-col items-start gap-2.5">
                                <div class="mb-2.5">
                                    <div class="relative size-[50px] shrink-0">
                                        <svg class="w-full h-full stroke-primary/10 fill-primary-soft" fill="none" height="48" viewBox="0 0 44 48" width="44" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z" fill=""></path>
                                            <path d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z" stroke=""></path>
                                        </svg>
                                        <div class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                            <i class="ki-filled ki-chart-line text-xl ps-px text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                                <a class="text-base font-semibold text-mono hover:text-primary" href="#">
                                    İstatistikler ve Raporlar
                                </a>
                                <p class="text-sm text-secondary-foreground">
                                    Adres performansınızı takip edin, detaylı raporlar alın ve büyüme stratejilerinizi optimize edin.
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
                                        <p class="text-sm text-blue-600 font-medium">Toplam Adres</p>
                                        <p class="text-2xl font-bold text-blue-900">{{ $addresses->count() }}</p>
                                    </div>
                                    <div class="p-3 bg-blue-100 rounded-full">
                                        <i class="ki-filled ki-abstract-25 text-blue-600 text-xl"></i>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg">
                                    <div>
                                        <p class="text-sm text-green-600 font-medium">Bu Ay Eklenen</p>
                                        <p class="text-2xl font-bold text-green-900">
                                            {{ $addresses->where('created_at', '>=', now()->startOfMonth())->count() }}
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
                                    <svg class="w-full h-full stroke-primary/10 fill-primary-soft" fill="none" height="100" viewBox="0 0 44 48" width="100" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z" fill=""></path>
                                        <path d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z" stroke=""></path>
                                    </svg>
                                    <div class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
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
@endsection
