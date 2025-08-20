@extends('layouts.app')

@section('title', 'Anasayfa')

@section('content')
 

            <!-- begin: grid -->
            <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch p-5">
                <div class="lg:col-span-3">
                    <div class="kt-card h-full">
                        <div class="kt-card-content flex flex-col place-content-center gap-5">
                            <div class="flex justify-center">
                                <img alt="image" class="dark:hidden max-h-[180px]"
                                    src="assets/media/illustrations/32.svg" />
                                <img alt="image" class="light:hidden max-h-[180px]"
                                    src="assets/media/illustrations/32-dark.svg" />
                            </div>
                            <div class="flex flex-col gap-4">
                                <div class="flex flex-col gap-3 text-center">
                                    <h2 class="text-xl font-semibold text-mono">
                                       Hızlı ve Kolay Firma Ekleme
                                    </h2>
                                    <p class="text-sm font-medium text-secondary-foreground">
                                        Firmanızı ekleyin ve hızlı bir şekilde iş süreçlerinizi yönetin.
                                        <br />
                                     </p>
                                </div>
                                <div class="flex justify-center">
                                    <a class="kt-btn kt-btn-mono" href="{{route('companies.create')}}">
                                        Firma Ekle
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!--Swift Setup for New Teams
-->
            </div>
            <!-- end: grid -->
        
      
 
@endsection
