<!-- Güzergah Bilgileri -->
<div class="bg-gray-50 rounded-lg p-6">
    <h3 class="text-lg font-semibold text-blue-600 mb-4 flex items-center">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                clip-rule="evenodd"></path>
        </svg>
        Güzergah Bilgileri
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nereden (Şehir)</label>
            <input type="text"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                id="{{ $formType }}-from" placeholder="Gönderici Şehir">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nereye (Şehir)</label>
            <input type="text"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                id="{{ $formType }}-to" placeholder="Alıcı Şehir">
        </div>
    </div>
</div>