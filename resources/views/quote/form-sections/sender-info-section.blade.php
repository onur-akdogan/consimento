<!-- Gönderici Bilgileri -->
<div class="bg-gray-50 rounded-lg p-6">
    <h3 class="text-lg font-semibold text-blue-600 mb-4 flex items-center">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
        </svg>
        Gönderici Bilgileri
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Gönderici Adı</label>
            <input type="text"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                id="{{ $formType }}-sender-name" placeholder="Ad Soyad">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Gönderici Adresi</label>
            <input type="text"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                id="{{ $formType }}-sender-address" placeholder="Adres">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Gönderici Telefon</label>
            <input type="text"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                id="{{ $formType }}-sender-phone" placeholder="Telefon">
        </div>
    </div>
</div>