<div class="step-content hidden" id="step-2-content">
    <h2 class="text-xl font-semibold text-center text-gray-800 mb-6 pt-3 pb-3">Gönderi Bilgileri</h2>

    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-8 pb-5 pt-5">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="font-semibold text-blue-800">Seçilen Gönderi Türü:</span>
            <span class="ml-2 text-blue-700" id="selected-type-display"></span>
        </div>
    </div>

    <!-- Form Sections -->
    @include('quote.forms.kargo-form')
    @include('quote.forms.tir-form')
    @include('quote.forms.ticari-form')
    @include('quote.forms.mobilya-form')
    @include('quote.forms.evden-eve-form')
    @include('quote.forms.arac-form')
    @include('quote.forms.konteyner-form')

    <!-- Navigation Buttons -->
    <div class="flex justify-center space-x-4 mt-8">
        <button type="button"
            class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-300"
            id="step2-prev">
            Geri
        </button>
        <button type="button"
            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-8 rounded-lg transition-colors duration-300 shadow-md hover:shadow-lg"
            id="step2-next">
            Devam Et
        </button>
    </div>
</div>