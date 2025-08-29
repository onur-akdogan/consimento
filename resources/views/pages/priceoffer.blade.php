@extends('layouts.app')

@section('title', 'Fiyat Teklifi Al')

@section('content')
    <div class="grid grid-cols-1 xl:grid-cols-1 gap-1 lg:gap-7.5 p-5">


        <form id="quote-form">
            @csrf
            <div
                class=" w-full max-w-6xl mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

                <!-- Progress Bar -->
                <div class="w-full bg-gray-200 rounded-full h-3 mb-8 dark:bg-gray-700">
                    <div id="progress-bar" class="bg-blue-600 h-3 rounded-full transition-all duration-300 ease-in-out"
                        style="width: 33.33%"></div>
                </div>


<!-- Kartlar Grid -->
                <div class="step-content" id="step-1-content">
                    <!-- Başlık -->
                    <h2 class="mb-6 text-2xl font-bold text-gray-900 text-center dark:text-white shipping-type-optionstitle">
                        Gönderi Türü Seçin
                    </h2>
                    <div class="grid grid-cols-3 md:grid-cols-3 gap-6 p-5 shipping-type-options">

                        <!-- Kargo -->
                        <div class="w-full p-5 text-center bg-white border border-gray-200 rounded-lg shadow-sm cursor-pointer hover:shadow-md hover:border-blue-500 transition dark:bg-gray-700 dark:border-gray-600 option-card"
                            data-type="Kargo ve Paket Taşımacılığı">
                            <div class="flex justify-center mb-3">
                                <div class="p-3 bg-blue-100 text-blue-600 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                        </path>
                                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                    </svg>
                                </div>
                            </div>
                            <h5 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Kargo ve Paket
                                Taşımacılığı</h5>
                        </div>

                        <!-- Komple Tır -->
                        <div class="w-full p-5 text-center bg-white border border-gray-200 rounded-lg shadow-sm cursor-pointer hover:shadow-md hover:border-green-500 transition dark:bg-gray-700 dark:border-gray-600 option-card"
                            data-type="Komple Tır">
                            <div class="flex justify-center mb-3">
                                <div class="p-3 bg-green-100 text-green-600 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <rect x="2" y="6" width="6" height="8" rx="1"></rect>
                                        <rect x="8" y="4" width="13" height="10" rx="1"></rect>
                                        <circle cx="5" cy="16" r="2"></circle>
                                        <circle cx="12" cy="16" r="2"></circle>
                                        <circle cx="18" cy="16" r="2"></circle>
                                    </svg>
                                </div>
                            </div>
                            <h5 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Komple Tır</h5>
                        </div>

                        <!-- Ticari Eşya -->
                        <div class="w-full p-5 text-center bg-white border border-gray-200 rounded-lg shadow-sm cursor-pointer hover:shadow-md hover:border-purple-500 transition dark:bg-gray-700 dark:border-gray-600 option-card"
                            data-type="Ticari Eşya Taşımacılığı">
                            <div class="flex justify-center mb-3">
                                <div class="p-3 bg-purple-100 text-purple-600 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <rect x="1" y="3" width="15" height="13"></rect>
                                        <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                        <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                        <circle cx="18.5" cy="18.5" r="2.5"></circle>
                                    </svg>
                                </div>
                            </div>
                            <h5 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Ticari Eşya
                                Taşımacılığı</h5>
                        </div>

                        <!-- Yeni Mobilya -->
                        <div class="w-full p-5 text-center bg-white border border-gray-200 rounded-lg shadow-sm cursor-pointer hover:shadow-md hover:border-pink-500 transition dark:bg-gray-700 dark:border-gray-600 option-card"
                            data-type="Yeni Mobilya Taşımacılığı">
                            <div class="flex justify-center mb-3">
                                <div class="p-3 bg-pink-100 text-pink-600 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                </div>
                            </div>
                            <h5 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Yeni Mobilya
                                Taşımacılığı</h5>
                        </div>

                        <!-- Uluslararası Evden Eve -->
                        <div class="w-full p-5 text-center bg-white border border-gray-200 rounded-lg shadow-sm cursor-pointer hover:shadow-md hover:border-yellow-500 transition dark:bg-gray-700 dark:border-gray-600 option-card"
                            data-type="Uluslararası Evden Eve Taşımacılık">
                            <div class="flex justify-center mb-3">
                                <div class="p-3 bg-yellow-100 text-yellow-600 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                </div>
                            </div>
                            <h5 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Uluslararası Evden Eve
                                Taşımacılık</h5>
                        </div>

                        <!-- Araç ve Motosiklet -->
                        <div class="w-full p-5 text-center bg-white border border-gray-200 rounded-lg shadow-sm cursor-pointer hover:shadow-md hover:border-red-500 transition dark:bg-gray-700 dark:border-gray-600 option-card"
                            data-type="Araç ve Motosiklet Taşımacılığı">
                            <div class="flex justify-center mb-3">
                                <div class="p-3 bg-red-100 text-red-600 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <rect x="1" y="3" width="15" height="13"></rect>
                                        <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                        <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                        <circle cx="18.5" cy="18.5" r="2.5"></circle>
                                    </svg>
                                </div>
                            </div>
                            <h5 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Araç ve Motosiklet
                                Taşımacılığı</h5>
                        </div>

                        <!-- Konteyner -->
                        <div class="w-full p-5 text-center bg-white border border-gray-200 rounded-lg shadow-sm cursor-pointer hover:shadow-md hover:border-indigo-500 transition dark:bg-gray-700 dark:border-gray-600 option-card"
                            data-type="Konteyner Taşımacılığı">
                            <div class="flex justify-center mb-3">
                                <div class="p-3 bg-indigo-100 text-indigo-600 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                                        <path
                                            d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                        </path>
                                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                    </svg>
                                </div>
                            </div>
                            <h5 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Konteyner Taşımacılığı
                            </h5>
                        </div>

                        <!-- E-Ticaret Taşımacılığı -->
                        <div class="w-full p-5 text-center bg-white border border-gray-200 rounded-lg shadow-sm cursor-pointer hover:shadow-md hover:border-orange-500 transition dark:bg-gray-700 dark:border-gray-600 option-card"
                            data-type="E-Ticaret Taşımacılığı">
                            <div class="flex justify-center mb-3">
                                <div class="p-3 bg-orange-100 text-orange-600 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <circle cx="9" cy="21" r="1"></circle>
                                        <circle cx="20" cy="21" r="1"></circle>
                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                        <path d="m9 6 1 12"></path>
                                        <path d="m20 6-1 12"></path>
                                    </svg>
                                </div>
                            </div>
                            <h5 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">E-Ticaret Taşımacılığı
                            </h5>
                        </div>

                        <!-- Minivan Taşımacılığı -->
                        <div class="w-full p-5 text-center bg-white border border-gray-200 rounded-lg shadow-sm cursor-pointer hover:shadow-md hover:border-teal-500 transition dark:bg-gray-700 dark:border-gray-600 option-card"
                            data-type="Minivan Taşımacılığı">
                            <div class="flex justify-center mb-3">
                                <div class="p-3 bg-teal-100 text-teal-600 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M8 6v6"></path>
                                        <path d="M15 6v6"></path>
                                        <path d="M2 12h19.6"></path>
                                        <path d="M18 18h3s.5-1.7.8-2.8c.1-.4.2-.8.2-1.2 0-.4-.1-.8-.2-1.2L21 10H3l-.8 2.8c-.1.4-.2.8-.2 1.2 0 .4.1.8.2 1.2.3 1.1.8 2.8.8 2.8h3"></path>
                                        <circle cx="7" cy="18" r="2"></circle>
                                        <circle cx="17" cy="18" r="2"></circle>
                                    </svg>
                                </div>
                            </div>
                            <h5 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Minivan Taşımacılığı
                            </h5>
                        </div>
                    </div>
                </div>
                <!-- Buton   r
                                    <div class="text-center mt-8">
                                        <button id="step1-next"
                                            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow-sm font-medium transition focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
                                            Devam Et
                                        </button>
                                    </div> -->
            </div>


            <!-- Step 2: Gönderi Bilgileri -->
            <div class="step-content  d-none" id="step-2-content">
                <h5 class="text-center text-2xl font-bold mb-6">Gönderi Bilgileri</h5>


                <div class="bg-blue-100 text-blue-800 px-4 py-3 rounded-lg mb-6" role="alert">
                    <strong>Seçilen Gönderi Türü:</strong> <span id="selected-type-display"></span>
                </div>

                <!-- Kargo ve Paket Taşımacılığı Formu -->
                <div class="form-section  d-none" id="kargo-form">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                        <!-- Gönderici Bilgileri -->
                        <div class="col-span-1 md:col-span-3">
                            <h6 class="kt-card-title">Gönderici Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Gönderici Adı</label>
                            <input type="text"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="kargo-sender-name" placeholder="Ad Soyad">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Gönderici Adresi</label>
                            <input type="text"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="kargo-sender-address" placeholder="Adres">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Gönderici Telefon</label>
                            <input type="text"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="kargo-sender-phone" placeholder="Telefon">
                        </div>

                        <!-- Güzergah Bilgileri -->
                        <div class="col-span-1 md:col-span-3 mt-6">
                            <h6 class="kt-card-title">Güzergah Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Nereden (Şehir)</label>
                            <input type="text"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="kargo-from" placeholder="Gönderici Şehir">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Nereye (Şehir)</label>
                            <input type="text"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="kargo-to" placeholder="Alıcı Şehir">
                        </div>

                        <!-- Alıcı Bilgileri -->
                        <div class="col-span-1 md:col-span-3 mt-6">
                            <h6 class="kt-card-title">Alıcı Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Alıcı Adı</label>
                            <input type="text"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="kargo-receiver-name" placeholder="Ad Soyad">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Alıcı Adresi</label>
                            <input type="text"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="kargo-receiver-address" placeholder="Adres">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Alıcı Telefon</label>
                            <input type="text"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="kargo-receiver-phone" placeholder="Telefon">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Posta Kodu</label>
                            <input type="text"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="kargo-postcode" placeholder="Posta Kodu">
                        </div>

                        <!-- Paket Bilgileri -->
                        <div class="col-span-1 md:col-span-3 mt-6">
                            <h6 class="kt-card-title">Paket Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Ağırlık (kg)</label>
                            <input type="number"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="kargo-weight" placeholder="Kg">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">En (cm)</label>
                            <input type="number"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="kargo-width" placeholder="cm">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Boy (cm)</label>
                            <input type="number"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="kargo-length" placeholder="cm">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Yükseklik (cm)</label>
                            <input type="number"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="kargo-height" placeholder="cm">
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-gray-700 font-medium mb-1">İçerik Açıklaması</label>
                            <textarea
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="kargo-content" rows="2" placeholder="Paket içeriği"></textarea>
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-gray-700 font-medium mb-1">Sigorta İsteği</label>
                            <select
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="kargo-insurance">
                                <option value="">Seçiniz</option>
                                <option value="Var">Var</option>
                                <option value="Yok">Yok</option>
                            </select>
                        </div>
                    </div>
                </div> <!-- Kargo ve Paket Taşımacılığı Formu -->
                <div class="form-section  d-none" id="tir-form">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Yük Bilgileri -->
                        <div class="col-span-2">
                            <h6 class="kt-card-title">Yük Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Yükün Türü</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="tir-cargo-type">
                                <option value="">Seçiniz</option>
                                <option value="mobilya">Mobilya</option>
                                <option value="gida">Gıda</option>
                                <option value="tekstil">Tekstil</option>
                                <option value="kimyasal">Kimyasal Madde</option>
                                <option value="elektronik">Elektronik</option>
                                <option value="otomotiv">Otomotiv</option>
                                <option value="diger">Diğer</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Tehlikeli Madde (ADR)</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="tir-adr-status">
                                <option value="">Seçiniz</option>
                                <option value="yok">Yok</option>
                                <option value="var">Var</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Net Ağırlık (kg)</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2"
                                id="tir-net-weight" placeholder="kg">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Brüt Ağırlık (kg)</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2"
                                id="tir-gross-weight" placeholder="kg">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Hacim (m³)</label>
                            <input type="number" step="0.1" class="w-full border border-gray-300 rounded-lg p-2"
                                id="tir-volume" placeholder="m³">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Palet Sayısı</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2"
                                id="tir-pallet-count" placeholder="Adet">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Palet Türü</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="tir-pallet-type">
                                <option value="">Seçiniz</option>
                                <option value="euro">Euro Palet</option>
                                <option value="blok">Blok Palet</option>
                                <option value="amerikan">Amerikan Palet</option>
                                <option value="diger">Diğer</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Ambalaj Şekli</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="tir-packaging">
                                <option value="">Seçiniz</option>
                                <option value="dokme">Dökme</option>
                                <option value="paletli">Paletli</option>
                                <option value="kasali">Kasalı</option>
                                <option value="diger">Diğer</option>
                            </select>
                        </div>

                        <!-- Yükleme/Boşaltma Şekli -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Yükleme/Boşaltma Şekli</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Yükleme Şekli</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="tir-loading-method">
                                <option value="">Seçiniz</option>
                                <option value="forklift">Forklift</option>
                                <option value="rampa">Rampa</option>
                                <option value="vinc">Vinç</option>
                                <option value="manuel">Manuel</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Boşaltma Şekli</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="tir-unloading-method">
                                <option value="">Seçiniz</option>
                                <option value="forklift">Forklift</option>
                                <option value="rampa">Rampa</option>
                                <option value="vinc">Vinç</option>
                                <option value="manuel">Manuel</option>
                            </select>
                        </div>

                        <!-- Yükleme Bilgileri -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Yükleme Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Yükleme Ülkesi</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="tir-loading-country" placeholder="Ülke">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Yükleme Şehri</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="tir-loading-city" placeholder="Şehir">
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-1 font-semibold">Yükleme Adresi (Açık Adres)</label>
                            <textarea class="w-full border border-gray-300 rounded-lg p-2" id="tir-loading-address" rows="2"
                                placeholder="Detaylı adres"></textarea>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Yükleme Tarihi</label>
                            <input type="date" class="w-full border border-gray-300 rounded-lg p-2"
                                id="tir-loading-date">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Yükleme Saati</label>
                            <input type="time" class="w-full border border-gray-300 rounded-lg p-2"
                                id="tir-loading-time">
                        </div>

                        <!-- Boşaltma Bilgileri -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Boşaltma Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Boşaltma Ülkesi</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="tir-unloading-country" placeholder="Ülke">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Boşaltma Şehri</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="tir-unloading-city" placeholder="Şehir">
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-1 font-semibold">Boşaltma Adresi (Açık Adres)</label>
                            <textarea class="w-full border border-gray-300 rounded-lg p-2" id="tir-unloading-address" rows="2"
                                placeholder="Detaylı adres"></textarea>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Boşaltma Tarihi Tahmini</label>
                            <input type="date" class="w-full border border-gray-300 rounded-lg p-2"
                                id="tir-unloading-date">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Gümrük İşlemleri</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="tir-customs">
                                <option value="">Seçiniz</option>
                                <option value="musteri">Müşteri</option>
                                <option value="sirket">Taşıyıcı Firma</option>
                            </select>
                        </div>

                        <!-- Araç Talebi ve Operasyonel Bilgiler -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Araç Talebi ve Operasyonel Bilgiler</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Araç Türü</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="tir-vehicle-type">
                                <option value="">Seçiniz</option>
                                <option value="tenteli">Tenteli TIR</option>
                                <option value="frigorifik">Frigorifik/Frigo</option>
                                <option value="mega">Mega</option>
                                <option value="kapali-kasa">Kapalı Kasa</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Şoför Sayısı</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="tir-driver-count">
                                <option value="">Seçiniz</option>
                                <option value="tek">Tek Şoför</option>
                                <option value="cift">Çift Şoför</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Transit Süresi Tahmini (Gün)</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2"
                                id="tir-transit-days" placeholder="Gün">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Kapalı Dorsede Açılış</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="tir-trailer-opening">
                                <option value="">Seçiniz</option>
                                <option value="var">Var</option>
                                <option value="yok">Yok</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Gümrüklü/Gümrüksüz Taşıma</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="tir-customs-transport">
                                <option value="">Seçiniz</option>
                                <option value="gumruklu">Gümrüklü</option>
                                <option value="gumruksuz">Gümrüksüz</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">İhracat Beyannamesi ve CMR Belgesi</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="tir-documents">
                                <option value="">Seçiniz</option>
                                <option value="musteri">Müşteri</option>
                                <option value="tasiyici">Taşıyıcı Firma</option>
                            </select>
                        </div>

                        <!-- Ücret ve Fatura Bilgileri -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Ücret ve Fatura Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Navlun (Taşıma) Ücreti</label>
                            <input type="number" step="0.01" class="w-full border border-gray-300 rounded-lg p-2"
                                id="tir-transport-fee" placeholder="Ücret">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Para Birimi</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="tir-currency">
                                <option value="">Seçiniz</option>
                                <option value="EUR">EUR</option>
                                <option value="USD">USD</option>
                                <option value="TRY">TRY</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Firma Adı</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="tir-company-name" placeholder="Firma Adı">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Vergi Numarası</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="tir-tax-number" placeholder="Vergi No">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Vergi Dairesi</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="tir-tax-office" placeholder="Vergi Dairesi">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Ödeme Şekli ve Süresi</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="tir-payment-terms">
                                <option value="">Seçiniz</option>
                                <option value="pesin">Peşin</option>
                                <option value="15-gun">15 Gün Vadeli</option>
                                <option value="30-gun">30 Gün Vadeli</option>
                                <option value="45-gun">45 Gün Vadeli</option>
                                <option value="60-gun">60 Gün Vadeli</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-1 font-semibold">Fatura Adresi</label>
                            <textarea class="w-full border border-gray-300 rounded-lg p-2" id="tir-invoice-address" rows="2"
                                placeholder="Fatura adresi"></textarea>
                        </div>
                    </div>
                </div>


                <div class="form-section  d-none" id="ticari-form">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Gönderici & Alıcı Firma Bilgileri -->
                        <div class="col-span-2">
                            <h6 class="kt-card-title">Gönderici & Alıcı Firma Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Gönderici Firma</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="ticari-sender-company" placeholder="Firma Adı">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Alıcı Firma</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="ticari-receiver-company" placeholder="Firma Adı">
                        </div>

                        <!-- Güzergah -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Güzergah</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Nereden</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="ticari-from"
                                placeholder="Çıkış Noktası">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Nereye</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="ticari-to"
                                placeholder="Varış Noktası">
                        </div>

                        <!-- Gümrük Bilgileri -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Gümrük Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Çıkış Gümrüğü</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="gumruk-from"
                                placeholder="Gümrük Çıkış Noktası">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Varış Gümrüğü</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="gumruk-to"
                                placeholder="Gümrük Varış Noktası">
                        </div>

                        <!-- Ticari Mal Bilgileri -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Ticari Mal Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Ticari Mal Türü</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="ticari-goods-type" placeholder="Eşya türü">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block mb-1 font-semibold">Ticari Mal Açıklaması</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="ticari-goods-desc" placeholder="Detaylı açıklama">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Toplam Brüt Ağırlık (kg)</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2"
                                id="ticari-total-weight" placeholder="kg">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Palet Sayısı</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2"
                                id="ticari-pallets" placeholder="Adet">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Koli Sayısı</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2" id="ticari-boxes"
                                placeholder="Adet">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Koli Boyutları</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="ticari-box-dimensions" placeholder="Örnek: 50x40x30">
                        </div>

                        <!-- Diğer Bilgiler -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Diğer Bilgiler</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Toplam Değer</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2"
                                id="ticari-total-value" placeholder="Fatura bedeli">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Para Birimi</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="ticari-currency">
                                <option value="">Seçiniz</option>
                                <option value="TL">TL</option>
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">İhracat/İthalat Beyannamesi</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="ticari-declaration">
                                <option value="">Seçiniz</option>
                                <option value="Gerekli">Gerekli</option>
                                <option value="Gerekli Değil">Gerekli Değil</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Teslim Şekli (INCOTERM)</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="ticari-incoterm">
                                <option value="">Seçiniz</option>
                                <option value="EXW">EXW</option>
                                <option value="DDP">DDP</option>
                                <option value="CIF">CIF</option>
                                <option value="FOB">FOB</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Yükleme Tarihi</label>
                            <input type="date" class="w-full border border-gray-300 rounded-lg p-2"
                                id="ticari-loading-date">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Teslim Süresi Talebi</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="ticari-delivery-time" placeholder="Örnek: 5 gün">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block mb-1 font-semibold">Nakliye Türü</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="ticari-transport-type">
                                <option value="">Seçiniz</option>
                                <option value="Kara">Kara</option>
                                <option value="Hava">Hava</option>
                                <option value="Deniz">Deniz</option>
                            </select>
                        </div>
                    </div>
                </div>


                <!-- Yeni Mobilya Taşımacılığı Formu -->
                <div class="form-section  d-none" id="mobilya-form">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Gönderici & Alıcı Bilgileri -->
                        <div class="col-span-2">
                            <h6 class="kt-card-title">Gönderici & Alıcı Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Gönderici Bilgileri</label>
                            <textarea class="w-full border border-gray-300 rounded-lg p-2" id="mobilya-sender" rows="2"
                                placeholder="Ad, adres, telefon"></textarea>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Alıcı Bilgileri</label>
                            <textarea class="w-full border border-gray-300 rounded-lg p-2" id="mobilya-receiver" rows="2"
                                placeholder="Ad, adres, telefon"></textarea>
                        </div>

                        <!-- Güzergah -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Güzergah</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Nereden</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="mobilya-from"
                                placeholder="Çıkış noktası">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Nereye</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="mobilya-to"
                                placeholder="Varış noktası">
                        </div>

                        <!-- Ürün Bilgileri -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Ürün Bilgileri</h6>
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-1 font-semibold">Ürün Listesi</label>
                            <textarea class="w-full border border-gray-300 rounded-lg p-2" id="mobilya-product-list" rows="3"
                                placeholder="Adet, tür, malzeme bilgileri"></textarea>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Toplam Ağırlık (kg)</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2"
                                id="mobilya-weight" placeholder="kg">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Toplam Hacim (m³)</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2"
                                id="mobilya-volume" placeholder="m³">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Paketleme Durumu</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="mobilya-packaging">
                                <option value="">Seçiniz</option>
                                <option value="Demonte">Demonte</option>
                                <option value="Montajlı">Montajlı</option>
                            </select>
                        </div>

                        <!-- Diğer Bilgiler -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Diğer Bilgiler</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Sigorta Talebi</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="mobilya-insurance">
                                <option value="">Seçiniz</option>
                                <option value="Var">Var</option>
                                <option value="Yok">Yok</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Teslimat Yeri Detayları</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="mobilya-delivery-details" placeholder="Kat bilgisi, asansör durumu vb.">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Nakliye Türü</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="mobilya-transport-type">
                                <option value="">Seçiniz</option>
                                <option value="Parça Yük">Parça Yük</option>
                                <option value="Tam Kamyon">Tam Kamyon</option>
                                <option value="Konteyner">Konteyner</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Fatura Değeri</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2"
                                id="mobilya-invoice-value" placeholder="Değer">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Yükleme Tarihi</label>
                            <input type="date" class="w-full border border-gray-300 rounded-lg p-2"
                                id="mobilya-loading-date">
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-1 font-semibold">Boşaltma Tarihi</label>
                            <input type="date" class="w-full border border-gray-300 rounded-lg p-2"
                                id="mobilya-unloading-date">
                        </div>
                    </div>
                </div>

                <!-- Uluslararası Evden Eve Taşımacılık Formu -->
                <div class="form-section  d-none" id="evden-eve-form">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Adres Bilgileri -->
                        <div class="col-span-2">
                            <h6 class="kt-card-title">Adres Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Gönderici Adresi</label>
                            <textarea class="w-full border border-gray-300 rounded-lg p-2" id="evden-sender-address" rows="2"
                                placeholder="Tam adres"></textarea>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Alıcı Adresi</label>
                            <textarea class="w-full border border-gray-300 rounded-lg p-2" id="evden-receiver-address" rows="2"
                                placeholder="Tam adres"></textarea>
                        </div>

                        <!-- Güzergah -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Güzergah</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Nereden (Ülke/Şehir)</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="evden-from"
                                placeholder="Örnek: Türkiye/İstanbul">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Nereye (Ülke/Şehir)</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="evden-to"
                                placeholder="Örnek: Almanya/Berlin">
                        </div>

                        <!-- Ev Bilgileri -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Ev Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Ev Tipi</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="evden-house-type">
                                <option value="">Seçiniz</option>
                                <option value="1+1">1+1</option>
                                <option value="2+1">2+1</option>
                                <option value="3+1">3+1</option>
                                <option value="4+1">4+1</option>
                                <option value="5+1">5+1</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Taşınacak Eşya Listesi (Opsiyonel)</label>
                            <textarea class="w-full border border-gray-300 rounded-lg p-2" id="evden-items" rows="2"
                                placeholder="Envanter detayları"></textarea>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Tahmini Hacim (m³)</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2" id="evden-volume"
                                placeholder="m³">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Kat Bilgileri (Çıkış)</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="evden-floor-from">
                                <option value="">Seçiniz</option>
                                <option value="Asansörlü">Asansörlü</option>
                                <option value="Asansörsüz">Asansörsüz</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Kat Bilgileri (Varış)</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="evden-floor-to">
                                <option value="">Seçiniz</option>
                                <option value="Asansörlü">Asansörlü</option>
                                <option value="Asansörsüz">Asansörsüz</option>
                            </select>
                        </div>

                        <!-- Hizmet Talepleri -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Hizmet Talepleri</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Ambalaj Hizmeti</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="evden-packaging">
                                <option value="">Seçiniz</option>
                                <option value="Var">Var</option>
                                <option value="Yok">Yok</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Montaj/Demontaj</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="evden-assembly">
                                <option value="">Seçiniz</option>
                                <option value="Var">Var</option>
                                <option value="Yok">Yok</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Sigorta Talebi</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="evden-insurance">
                                <option value="">Seçiniz</option>
                                <option value="Var">Var</option>
                                <option value="Yok">Yok</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Gümrükleme</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="evden-customs">
                                <option value="">Seçiniz</option>
                                <option value="Evraklı">Evraklı</option>
                                <option value="Evraksız">Evraksız</option>
                            </select>
                        </div>

                        <!-- Tarih Bilgileri -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Tarih Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Yükleme Tarihi</label>
                            <input type="date" class="w-full border border-gray-300 rounded-lg p-2"
                                id="evden-loading-date">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Teslimat Tarihi</label>
                            <input type="date" class="w-full border border-gray-300 rounded-lg p-2"
                                id="evden-delivery-date">
                        </div>
                    </div>
                </div>


                <!-- Araç ve Motosiklet Taşımacılığı Formu -->
                <div class="form-section  d-none" id="arac-form">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Gönderici & Alıcı -->
                        <div class="col-span-2">
                            <h6 class="kt-card-title">Gönderici & Alıcı Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Gönderici Bilgileri</label>
                            <textarea class="w-full border border-gray-300 rounded-lg p-2" id="arac-sender" rows="2"
                                placeholder="Ad, adres, telefon"></textarea>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Alıcı Bilgileri</label>
                            <textarea class="w-full border border-gray-300 rounded-lg p-2" id="arac-receiver" rows="2"
                                placeholder="Ad, adres, telefon"></textarea>
                        </div>

                        <!-- Güzergah -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Güzergah</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Nereden</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="arac-from"
                                placeholder="Çıkış noktası">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Nereye</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="arac-to"
                                placeholder="Varış noktası">
                        </div>

                        <!-- Araç Bilgileri -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Araç Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Araç Türü</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="arac-type">
                                <option value="">Seçiniz</option>
                                <option value="Otomobil">Otomobil</option>
                                <option value="Motosiklet">Motosiklet</option>
                                <option value="SUV">SUV</option>
                                <option value="Minivan">Minivan</option>
                                <option value="Pickup">Pickup</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Marka</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="arac-brand"
                                placeholder="Marka">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Model</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="arac-model"
                                placeholder="Model">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Yıl</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2" id="arac-year"
                                placeholder="2023">
                        </div>

                        <!-- Araç Ölçüleri -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Araç Boyutları</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Uzunluk (cm)</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2" id="arac-length"
                                placeholder="cm">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Genişlik (cm)</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2" id="arac-width"
                                placeholder="cm">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Yükseklik (cm)</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2" id="arac-height"
                                placeholder="cm">
                        </div>

                        <!-- Diğer Bilgiler -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Diğer Bilgiler</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Şasi Numarası (VIN)</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="arac-vin"
                                placeholder="VIN numarası">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Çalışır Durumda mı?</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="arac-working">
                                <option value="">Seçiniz</option>
                                <option value="Evet">Evet</option>
                                <option value="Hayır">Hayır</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Gümrük Evrakları</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="arac-customs-docs">
                                <option value="">Seçiniz</option>
                                <option value="Var">Var</option>
                                <option value="Yok">Yok</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Teslimat Tipi</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="arac-delivery-type">
                                <option value="">Seçiniz</option>
                                <option value="Kapıdan">Kapıdan</option>
                                <option value="Limandan">Limandan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Sigorta Talebi</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="arac-insurance">
                                <option value="">Seçiniz</option>
                                <option value="Var">Var</option>
                                <option value="Yok">Yok</option>
                            </select>
                        </div>

                        <!-- Tarih ve Yer Bilgileri -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Tarih ve Yer Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Yükleme Yeri</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="arac-loading-place" placeholder="Yükleme yeri">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Teslim Yeri</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="arac-delivery-place" placeholder="Teslim yeri">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Yükleme Tarihi</label>
                            <input type="date" class="w-full border border-gray-300 rounded-lg p-2"
                                id="arac-loading-date">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Teslim Tarihi</label>
                            <input type="date" class="w-full border border-gray-300 rounded-lg p-2"
                                id="arac-delivery-date">
                        </div>
                    </div>
                </div>


                <!-- Konteyner Taşımacılığı Formu -->
                <div class="form-section  d-none" id="konteyner-form">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Konteyner Bilgileri -->
                        <div class="col-span-2">
                            <h6 class="kt-card-title">Konteyner Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Konteyner Tipi</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="konteyner-type">
                                <option value="">Seçiniz</option>
                                <option value="20'lik">20'lik</option>
                                <option value="40'lık">40'lık</option>
                                <option value="HC (High Cube)">HC (High Cube)</option>
                                <option value="Açık Üst">Açık Üst</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Yükleme Türü</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="konteyner-loading-type">
                                <option value="">Seçiniz</option>
                                <option value="FCL">FCL (Full Container Load)</option>
                                <option value="LCL">LCL (Less Container Load)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Tahmini Ağırlık (kg)</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2"
                                id="konteyner-weight" placeholder="kg">
                        </div>

                        <!-- Yük Bilgileri -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Yük Bilgileri</h6>
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-1 font-semibold">Yük İçeriği</label>
                            <textarea class="w-full border border-gray-300 rounded-lg p-2" id="konteyner-content" rows="3"
                                placeholder="Yük içeriği detayları"></textarea>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Gümrük Evrakları</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="konteyner-customs">
                                <option value="">Seçiniz</option>
                                <option value="Var">Var</option>
                                <option value="Yok">Yok</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Teslim Şekli (INCOTERM)</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="konteyner-incoterm">
                                <option value="">Seçiniz</option>
                                <option value="EXW">EXW</option>
                                <option value="DDP">DDP</option>
                                <option value="CIF">CIF</option>
                                <option value="FOB">FOB</option>
                            </select>
                        </div>

                        <!-- Güzergah Bilgileri -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Güzergah Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Gideceği Ülke</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="konteyner-destination-country" placeholder="Hedef ülke">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Varış Limanı</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="konteyner-destination-port" placeholder="Varış limanı">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Çıkış Limanı</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="konteyner-origin-port" placeholder="Çıkış limanı">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Depo</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2"
                                id="konteyner-warehouse" placeholder="Depo bilgisi">
                        </div>

                        <!-- Tarih Bilgileri -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Tarih Bilgileri</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Yükleme Tarihi</label>
                            <input type="date" class="w-full border border-gray-300 rounded-lg p-2"
                                id="konteyner-loading-date">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Varış Tarihi Talebi</label>
                            <input type="date" class="w-full border border-gray-300 rounded-lg p-2"
                                id="konteyner-arrival-date">
                        </div>

                        <!-- Diğer Bilgiler -->
                        <div class="col-span-2 mt-6">
                            <h6 class="kt-card-title">Diğer Bilgiler</h6>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Ambalaj/Paletleme</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="konteyner-packaging">
                                <option value="">Seçiniz</option>
                                <option value="Var">Var</option>
                                <option value="Yok">Yok</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Tehlikeli Madde</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="konteyner-dangerous">
                                <option value="">Seçiniz</option>
                                <option value="Evet (IMO Sertifikası Var)">Evet (IMO Sertifikası Var)</option>
                                <option value="Hayır">Hayır</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Sigorta Talebi</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2" id="konteyner-insurance">
                                <option value="">Seçiniz</option>
                                <option value="Var">Var</option>
                                <option value="Yok">Yok</option>
                            </select>
                        </div>
                    </div>
                </div>
 

<!-- E-Ticaret Taşımacılığı Formu -->
      <div class="form-section d-none" id="eticaret-form">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Gönderici Bilgileri -->
              <div class="col-span-2">
                  <h6 class="kt-card-title">Gönderici (Shipper) Bilgileri</h6>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Gönderici Adı/Firma</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-sender-name"
                      placeholder="Firma veya kişi adı">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Gönderici Vergi No (VKN/TCKN)</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-sender-tax"
                      placeholder="Vergi numarası">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Gönderici Adresi</label>
                  <textarea class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-sender-address" rows="2"
                      placeholder="Tam adres (ülke, şehir, posta kodu dahil)"></textarea>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Gönderici Telefon/E-posta</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-sender-contact"
                      placeholder="Telefon ve e-posta">
              </div>

              <!-- Alıcı Bilgileri -->
              <div class="col-span-2 mt-6">
                  <h6 class="kt-card-title">Alıcı (Consignee) Bilgileri</h6>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Alıcı Adı/Firma</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-receiver-name"
                      placeholder="Alıcı firma veya kişi adı">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Alıcı Adresi (UK)</label>
                  <textarea class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-receiver-address" rows="2"
                      placeholder="İngiltere tam adresi (şehir, posta kodu dahil)"></textarea>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Alıcı Telefon/E-posta</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-receiver-contact"
                      placeholder="Telefon ve e-posta">
              </div>

              <!-- Ürün Bilgileri -->
              <div class="col-span-2 mt-6">
                  <h6 class="kt-card-title">Ürün Bilgileri</h6>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Ürün Adı (TR)</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-product-name-tr"
                      placeholder="Türkçe ürün adı">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Ürün Adı (EN)</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-product-name-en"
                      placeholder="İngilizce ürün adı">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">HS Kodu</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-hs-code"
                      placeholder="Gümrük tarife kodu">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Miktar & Birim Fiyat</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-quantity-price"
                      placeholder="Adet x Birim fiyat">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Toplam Değer</label>
                  <input type="number" class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-total-value"
                      placeholder="Toplam değer">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Para Birimi</label>
                  <select class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-currency">
                      <option value="">Seçiniz</option>
                      <option value="USD">USD</option>
                      <option value="GBP">GBP</option>
                      <option value="EUR">EUR</option>
                      <option value="TRY">TRY</option>
                  </select>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Üretim Ülkesi</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-origin-country"
                      placeholder="Menşe ülkesi">
              </div>

              <!-- Paket Bilgileri -->
              <div class="col-span-2 mt-6">
                  <h6 class="kt-card-title">Paket Bilgileri</h6>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Paket Ağırlığı (kg)</label>
                  <input type="number" class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-weight"
                      placeholder="Toplam ağırlık">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Paket Ölçüleri (cm)</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-dimensions"
                      placeholder="U x G x Y (cm)">
              </div>

              <!-- Evraklar ve Diğer -->
              <div class="col-span-2 mt-6">
                  <h6 class="kt-card-title">Evrak ve Diğer Bilgiler</h6>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Ticari Fatura</label>
                  <input type="file" class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-invoice"
                      accept=".pdf,.jpg,.png">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">IOSS/UK VAT/EORI No (Opsiyonel)</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-vat-eori"
                      placeholder="Vergi numaraları">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Sigorta</label>
                  <select class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-insurance">
                      <option value="">Seçiniz</option>
                      <option value="Var">Var</option>
                      <option value="Yok">Yok</option>
                  </select>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Özel Notlar</label>
                  <textarea class="w-full border border-gray-300 rounded-lg p-2" id="eticaret-notes" rows="3"
                      placeholder="Ek bilgiler ve notlar"></textarea>
              </div>
          </div>
      </div>

      <!-- Minivan Taşımacılığı Formu -->
      <div class="form-section d-none" id="minivan-form">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Şirket Bilgileri -->
              <div class="col-span-2">
                  <h6 class="kt-card-title">Şirket Bilgileri</h6>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Şirket Adı</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-company-name"
                      placeholder="Firma adı">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Vergi Numarası</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-tax-number"
                      placeholder="VKN/TCKN">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Yetkili Kişi</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-authorized-person"
                      placeholder="Yetkili kişi adı">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Telefon / E-posta</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-contact"
                      placeholder="İletişim bilgileri">
              </div>

              <!-- İhracat & İthalat Bilgileri -->
              <div class="col-span-2 mt-6">
                  <h6 class="kt-card-title">İhracat & İthalat Bilgileri</h6>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Incoterms</label>
                  <select class="w-full border border-gray-300 rounded-lg p-2" id="minivan-incoterms">
                      <option value="">Seçiniz</option>
                      <option value="EXW">EXW</option>
                      <option value="FCA">FCA</option>
                      <option value="CPT">CPT</option>
                      <option value="CIP">CIP</option>
                      <option value="DAP">DAP</option>
                      <option value="DPU">DPU</option>
                      <option value="DDP">DDP</option>
                  </select>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">TR İhracatçı Firma</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-tr-exporter"
                      placeholder="Türkiye ihracatçı firma">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">UK İthalatçı Firma</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-uk-importer"
                      placeholder="İngiltere ithalatçı firma">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">UK EORI Numarası</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-eori"
                      placeholder="EORI veya XI EORI numarası">
              </div>

              <!-- Adres Bilgileri -->
              <div class="col-span-2 mt-6">
                  <h6 class="kt-card-title">Adres Bilgileri</h6>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Alım Adresi (+ Posta Kodu)</label>
                  <textarea class="w-full border border-gray-300 rounded-lg p-2" id="minivan-pickup-address" rows="2"
                      placeholder="Tam alım adresi ve posta kodu"></textarea>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Yetkili Kişi & Yükleme Saatleri</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-pickup-contact"
                      placeholder="Yetkili kişi ve çalışma saatleri">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Teslim Adresi (+ Posta Kodu)</label>
                  <textarea class="w-full border border-gray-300 rounded-lg p-2" id="minivan-delivery-address" rows="2"
                      placeholder="Tam teslim adresi ve posta kodu"></textarea>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Yetkili Kişi & Teslim Saatleri</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-delivery-contact"
                      placeholder="Yetkili kişi ve çalışma saatleri">
              </div>

              <!-- Yük Detayları -->
              <div class="col-span-2 mt-6">
                  <h6 class="kt-card-title">Yük Detayları</h6>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Yük Tanımı</label>
                  <textarea class="w-full border border-gray-300 rounded-lg p-2" id="minivan-cargo-description" rows="2"
                      placeholder="Yük detaylı açıklaması"></textarea>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Toplam Brüt Ağırlık (kg)</label>
                  <input type="number" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-total-weight"
                      placeholder="Toplam ağırlık">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Toplam Hacim (m³)</label>
                  <input type="number" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-total-volume"
                      placeholder="Toplam hacim">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Koli/Parça Sayısı ve Ölçüler</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-package-info"
                      placeholder="Adet ve ölçüler">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Palet Bilgisi</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-pallet-info"
                      placeholder="Palet ölçüleri ve stackable bilgisi">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">ADR (Tehlikeli Madde) Bilgisi</label>
                  <select class="w-full border border-gray-300 rounded-lg p-2" id="minivan-adr">
                      <option value="">Seçiniz</option>
                      <option value="Var">Var</option>
                      <option value="Yok">Yok</option>
                  </select>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Sıcaklık Gereksinimi</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-temperature"
                      placeholder="Özel sıcaklık ihtiyacı">
              </div>

              <!-- Araç ve Operasyon -->
              <div class="col-span-2 mt-6">
                  <h6 class="kt-card-title">Araç ve Operasyon Gereksinimi</h6>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Araç Tipi Tercihi</label>
                  <select class="w-full border border-gray-300 rounded-lg p-2" id="minivan-vehicle-type">
                      <option value="">Seçiniz</option>
                      <option value="Panel Van">Panel Van</option>
                      <option value="Perdeli">Perdeli</option>
                      <option value="Kapalı Kasa">Kapalı Kasa</option>
                      <option value="Soğutmalı">Soğutmalı</option>
                  </select>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">İç Ölçü İhtiyacı (cm)</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-inner-dimensions"
                      placeholder="U x G x Y (cm)">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Yükleme / Boşaltma Şekli</label>
                  <select class="w-full border border-gray-300 rounded-lg p-2" id="minivan-loading-type">
                      <option value="">Seçiniz</option>
                      <option value="Manuel">Manuel</option>
                      <option value="Forklift">Forklift</option>
                      <option value="Vinç">Vinç</option>
                      <option value="Transpalet">Transpalet</option>
                  </select>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Ekipman İhtiyacı</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-equipment"
                      placeholder="Lift, transpalet vb. ekipman">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Hizmet Türü</label>
                  <select class="w-full border border-gray-300 rounded-lg p-2" id="minivan-service-type">
                      <option value="">Seçiniz</option>
                      <option value="Dedike">Dedike</option>
                      <option value="Parsiyel">Parsiyel</option>
                  </select>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Planlanan Çıkış Tarihi</label>
                  <input type="date" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-departure-date">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Hedef Teslim Süresi (SLA)</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-delivery-time"
                      placeholder="Gün cinsinden">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Güzergâh Tercihi</label>
                  <select class="w-full border border-gray-300 rounded-lg p-2" id="minivan-route">
                      <option value="">Seçiniz</option>
                      <option value="Ferry">Ferry</option>
                      <option value="Eurotunnel">Eurotunnel</option>
                      <option value="Fark Etmez">Fark Etmez</option>
                  </select>
              </div>

              <!-- Gümrük & Evrak -->
              <div class="col-span-2 mt-6">
                  <h6 class="kt-card-title">Gümrük & Evrak</h6>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">TR Broker Bilgisi</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-tr-broker"
                      placeholder="Türkiye gümrük müşaviri">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">UK Broker Bilgisi</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-uk-broker"
                      placeholder="İngiltere gümrük müşaviri">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Gerekli Evraklar</label>
                  <input type="file" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-documents"
                      multiple accept=".pdf,.jpg,.png">
              </div>

              <!-- Sigorta & Güvenlik -->
              <div class="col-span-2 mt-6">
                  <h6 class="kt-card-title">Sigorta & Güvenlik</h6>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Mal Bedeli</label>
                  <input type="number" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-goods-value"
                      placeholder="Toplam mal bedeli">
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Para Birimi</label>
                  <select class="w-full border border-gray-300 rounded-lg p-2" id="minivan-currency">
                      <option value="">Seçiniz</option>
                      <option value="USD">USD</option>
                      <option value="GBP">GBP</option>
                      <option value="EUR">EUR</option>
                      <option value="TRY">TRY</option>
                  </select>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Kargo Sigortası</label>
                  <select class="w-full border border-gray-300 rounded-lg p-2" id="minivan-cargo-insurance">
                      <option value="">Seçiniz</option>
                      <option value="Var">Var</option>
                      <option value="Yok">Yok</option>
                  </select>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Özel Güvenlik/Takip Talepleri</label>
                  <textarea class="w-full border border-gray-300 rounded-lg p-2" id="minivan-security" rows="2"
                      placeholder="Güvenlik ve takip talepleri"></textarea>
              </div>

              <!-- Notlar ve Kısıtlar -->
              <div class="col-span-2 mt-6">
                  <h6 class="kt-card-title">Notlar ve Kısıtlar</h6>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Fiyatlandırma Yöntemi</label>
                  <select class="w-full border border-gray-300 rounded-lg p-2" id="minivan-pricing-method">
                      <option value="">Seçiniz</option>
                      <option value="All-in">All-in</option>
                      <option value="Detaylı">Detaylı</option>
                  </select>
              </div>
              <div>
                  <label class="block mb-1 font-semibold">Ödeme Vadesi</label>
                  <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="minivan-payment-terms"
                      placeholder="Ödeme vadesi ve şartları">
              </div>
              <div class="col-span-2">
                  <label class="block mb-1 font-semibold">Özel Notlar</label>
                  <textarea class="w-full border border-gray-300 rounded-lg p-2" id="minivan-special-notes" rows="3"
                      placeholder="Ek bilgiler, kısıtlar ve özel talepler"></textarea>
              </div>
          </div>
      </div>


                <div class="text-center mt-4 flex justify-center gap-3">
                    <button type="button" id="step2-prev"
                        class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded-lg"
                        style="background-color: #2a2a2a;">
                        Geri
                    </button>
                    <button type="button" id="step2-next"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
                        Devam Et
                    </button>
                </div>

            </div>

            <!-- Step 3: Teklif Özeti -->
            <div class="step-content hidden " id="step-3-content">
                <h5 class="text-center text-xl font-bold mb-6 step-header text-gray-800">
                    Teklif Özeti
                </h5>

                <!-- Özet Kartı -->
                <div class="bg-white shadow-lg rounded-2xl overflow-hidden border border-gray-200 p-5">
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-center border-b pb-3">
                            <span class="text-gray-600 font-medium">Gönderi Türü:</span>
                            <span id="summary-gonderi-text" class="text-gray-900 font-semibold"></span>
                        </div>
                        <div>
                            <h6 class="text-gray-700 font-semibold mb-2">Detaylar</h6>
                            <div id="summary-details" class="bg-gray-50 p-4 rounded-lg text-sm text-gray-700 space-y-2">
                                <!-- JS ile doldurulacak -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Butonlar -->
                <div class="flex justify-center gap-4 mt-8 p-5">
                    <button type="button" id="step3-prev"
                        class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-6 rounded-xl shadow p-5"
                        style="background-color: #2a2a2a;">
                        Geri
                    </button>
                    <button type="button" id="submit-form"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-xl shadow  p-5"
                        style="background-color: #28a745;">
                        Teklif Al
                    </button>
                </div>
            </div>


        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let selectedGonderiType = '';
            let currentStep = 1;

            // Açılışta sadece Step-1 görünür
            document.querySelectorAll('.step-content').forEach(c => c.classList.add('hidden'));
            document.getElementById('step-1-content').classList.remove('hidden');

            // Formları gizle
            document.querySelectorAll('.form-section').forEach(f => f.classList.add('hidden'));

            // Step-1 seçenek kartları
            const optionCards = document.querySelectorAll('.option-card');
            optionCards.forEach(card => {
                card.addEventListener('click', function() {
                    optionCards.forEach(c => c.classList.remove('selected'));
                    this.classList.add('selected');
                    selectedGonderiType = this.getAttribute('data-type');
                    goToStep(2);
                });
            });

            // Step-2 butonları
            document.getElementById('step2-prev').addEventListener('click', () => goToStep(1));
            document.getElementById('step2-next').addEventListener('click', () => goToStep(3));

            // Step-3 butonları
            document.getElementById('step3-prev').addEventListener('click', () => goToStep(2));
            document.getElementById('submit-form').addEventListener('click', submitForm);

            // Adım değiştirme
            function goToStep(step) {
                if (step === 2 && !selectedGonderiType) {
                    Swal.fire("Lütfen bir gönderi türü seçin!");
                    return;
                }

                if (step === 2) {
                    document.querySelectorAll('.form-section').forEach(f => f.classList.add('hidden'));
                    showRelevantForm();
                    document.getElementById('selected-type-display').textContent = selectedGonderiType;
                }

                if (step === 3) {
                    if (!validateStep2()) return;
                    updateSummary();
                }

                // Step içeriklerini gizle/aç
                document.querySelectorAll('.step-content').forEach(c => c.classList.add('hidden'));
                document.getElementById(`step-${step}-content`).classList.remove('hidden');

                // Progress bar güncelle
                document.getElementById('progress-bar').style.width = `${(step / 3) * 100}%`;
                currentStep = step;
            }

            // Seçime göre ilgili formu göster
            function showRelevantForm() {
                if (!selectedGonderiType) return;

                const forms = {
                    'Kargo ve Paket Taşımacılığı': 'kargo-form',
                    'Komple Tır': 'tir-form',
                    'Ticari Eşya Taşımacılığı': 'ticari-form',
                    'Yeni Mobilya Taşımacılığı': 'mobilya-form',
                    'Uluslararası Evden Eve Taşımacılık': 'evden-eve-form',
                    'Araç ve Motosiklet Taşımacılığı': 'arac-form',
                    'Konteyner Taşımacılığı': 'konteyner-form',
                            'E-Ticaret Taşımacılığı': 'eticaret-form',
        'Minivan Taşımacılığı': 'minivan-form'

                };

                const formId = forms[selectedGonderiType];
                if (formId) document.getElementById(formId).classList.remove('hidden');
            }

            // Step-2 doğrulama
            function validateStep2() {
                let requiredFields = [];

                switch (selectedGonderiType) {
                    case 'Kargo ve Paket Taşımacılığı':
                        requiredFields = ['kargo-from', 'kargo-to', 'kargo-weight'];
                        break;
                    case 'Ticari Eşya Taşımacılığı':
                        requiredFields = ['ticari-from', 'ticari-to', 'ticari-total-weight'];
                        break;
                    case 'Yeni Mobilya Taşımacılığı':
                        requiredFields = ['mobilya-from', 'mobilya-to', 'mobilya-weight'];
                        break;
                    case 'Uluslararası Evden Eve Taşımacılık':
                        requiredFields = ['evden-from', 'evden-to', 'evden-volume'];
                        break;
                    case 'Araç ve Motosiklet Taşımacılığı':
                        requiredFields = ['arac-from', 'arac-to', 'arac-brand', 'arac-model'];
                        break;
                    case 'Konteyner Taşımacılığı':
                        requiredFields = ['konteyner-destination-country', 'konteyner-origin-port',
                            'konteyner-destination-port'
                        ];
                        break;
                }

                for (const id of requiredFields) {
                    const field = document.getElementById(id);
                    if (!field || !field.value.trim()) {
                        const label = field && field.previousElementSibling ? field.previousElementSibling
                            .innerText : id;
                        Swal.fire({
                            icon: 'error',
                            title: 'Eksik Bilgi',
                            text: `Lütfen "${label}" alanını doldurun.`
                        });
                        return false;
                    }
                }
                return true;
            }

            // Step-3 özet güncelle
            function updateSummary() {
                document.getElementById('summary-gonderi-text').textContent = selectedGonderiType;

                let summaryHTML = "";
                const activeForm = document.querySelector('.form-section:not(.hidden)');
                if (activeForm) {
                    const formInputs = activeForm.querySelectorAll('input, select, textarea');
                    formInputs.forEach(input => {
                        const label = input.previousElementSibling ? input.previousElementSibling
                            .innerText : input.id;
                        summaryHTML += `
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">${label}</span>
                        <span class="text-gray-900 font-medium">${input.value || '-'}</span>
                    </div>
                `;
                    });
                }
                document.getElementById('summary-details').innerHTML = summaryHTML;
            }

            // Form gönderme
            function submitForm() {
                const submitButton = document.getElementById('submit-form');
                submitButton.disabled = true;
                submitButton.innerText = "Gönderiliyor...";

                const postData = {
                    offer_type: selectedGonderiType,
                    details: {}
                };

                const activeForm = document.querySelector('.form-section:not(.hidden)');
                if (activeForm) {
                    const formInputs = activeForm.querySelectorAll('input, select, textarea');
                    formInputs.forEach(input => {
                        const label = input.previousElementSibling ? input.previousElementSibling
                            .innerText : input.id;
                        postData.details[label] = input.value;
                    });
                }

                const csrfToken = document.querySelector('input[name="_token"]');
                if (!csrfToken) {
                    alert("CSRF token bulunamadı!");
                    return;
                }

                fetch("{{ route('price.offer.store') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken.value,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(postData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire("Başarılı", data.message, "success").then(() => location.reload());
                        } else {
                            Swal.fire("Hata", data.message || "Bir sorun oluştu", "error");
                        }
                    })
                    .catch(error => {
                        console.error("Fetch hatası:", error);
                        Swal.fire("Ağ Hatası!", "Sunucuya bağlanırken bir sorun oluştu.", "error");
                    })
                    .finally(() => {
                        submitButton.disabled = false;
                        submitButton.innerText = "Teklif Al";
                    });
            }

            // Step-2 alanlarında değişiklik oldukça özet güncellensin
            function attachFormListeners() {
                const allFields = document.querySelectorAll(
                    '#step-2-content input, #step-2-content select, #step-2-content textarea');
                allFields.forEach(element => {
                    element.addEventListener('input', updateSummary);
                    element.addEventListener('change', updateSummary);
                });
            }
            attachFormListeners();
        });
    </script>

@endsection
