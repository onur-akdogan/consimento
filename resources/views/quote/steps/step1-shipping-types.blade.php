<!-- Step 1: Gönderi Türü -->
<div class="step-content" id="step-1-content">
    <h2 class="text-xl font-semibold text-center text-gray-800 mb-8">Gönderi Türü Seçin</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
        @include('quote.shipping-types.kargo-paket')
        @include('quote.shipping-types.komple-tir')
       <!--
    
    -->
    </div>

    <div class="text-center">
        <button type="button"
            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-8 rounded-lg transition-colors duration-300 shadow-md hover:shadow-lg"
            id="step1-next">
            Devam Et
        </button>
    </div>
</div>