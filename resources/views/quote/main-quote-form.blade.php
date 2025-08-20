@extends('layouts.app')

  
 
@section('title', 'Fiyat Teklifi Al')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6 md:p-8 p-5">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-2xl md:text-3xl font-semibold text-gray-800 text-center">Fiyat Teklifi Al</h1>
    </div>

    <form id="quote-form">
        @csrf
        
        <!-- Progress Bar Component -->
        @include('quote.components.progress-bar')

        <!-- Step 1: Gönderi Türü Seçimi -->
        @include('quote.steps.step1-shipping-types')

        <!-- Step 2: Gönderi Bilgileri -->
        @include('quote.steps.step2-shipping-details')

        <!-- Step 3: Teklif Özeti -->
        @include('quote.steps.step3-quote-summary')
    </form>
</div>

<!-- Scripts -->
@include('quote.scripts.quote-form-scripts')
@endsection