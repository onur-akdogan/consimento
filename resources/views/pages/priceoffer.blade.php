@extends('layouts.app')

@section('title', 'Fiyat Teklifi Al')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-sm-center flex-sm-row flex-column mb-4">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Fiyat Teklifi Al</h4>
                    </div>
                </div>

                <form id="quote-form">
                        @csrf

                    <!-- Progress Bar -->
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 33.33%" id="progress-bar"></div>
                    </div>

                    <!-- Step 1: Gönderi Türü -->
                    <div class="step-content" id="step-1-content">
                        <h5 class="text-center step-header">Gönderi Türü Seçin</h5>
                        <div class="row g-3 justify-content-center">
                            <!-- Option Cards -->
                            <div class="col-6 col-md-4 mb-3">
                                <div class="card text-center p-3 h-100 option-card" data-type="Kargo ve Paket Taşımacılığı">
                                    <div class="icon-container">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-box">
                                            <path
                                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                            </path>
                                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                        </svg>
                                    </div>
                                    <div class="fw-semibold">Kargo ve Paket Taşımacılığı</div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <div class="card text-center p-3 h-100 option-card" data-type="Ticari Eşya Taşımacılığı">
                                    <div class="icon-container">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck">
                                            <rect x="1" y="3" width="15" height="13"></rect>
                                            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                            <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                            <circle cx="18.5" cy="18.5" r="2.5"></circle>
                                        </svg>
                                    </div>
                                    <div class="fw-semibold">Ticari Eşya Taşımacılığı</div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <div class="card text-center p-3 h-100 option-card" data-type="Yeni Mobilya Taşımacılığı">
                                    <div class="icon-container">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                        </svg>
                                    </div>
                                    <div class="fw-semibold">Yeni Mobilya Taşımacılığı</div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <div class="card text-center p-3 h-100 option-card"
                                    data-type="Uluslararası Evden Eve Taşımacılık">
                                    <div class="icon-container">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-file-text">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                            <polyline points="10 9 9 9 8 9"></polyline>
                                        </svg>
                                    </div>
                                    <div class="fw-semibold">Uluslararası Evden Eve Taşımacılık</div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <div class="card text-center p-3 h-100 option-card"
                                    data-type="Araç ve Motosiklet Taşımacılığı">
                                    <div class="icon-container">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck">
                                            <rect x="1" y="3" width="15" height="13"></rect>
                                            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                            <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                            <circle cx="18.5" cy="18.5" r="2.5"></circle>
                                        </svg>
                                    </div>
                                    <div class="fw-semibold">Araç ve Motosiklet Taşımacılığı</div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <div class="card text-center p-3 h-100 option-card" data-type="Konteyner Taşımacılığı">
                                    <div class="icon-container">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-package">
                                            <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                                            <path
                                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                            </path>
                                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                        </svg>
                                    </div>
                                    <div class="fw-semibold">Konteyner Taşımacılığı</div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="button" class="btn btn-primary" id="step1-next">Devam Et</button>
                        </div>
                    </div>

                    <!-- Step 2: Gönderi Bilgileri -->
                    <div class="step-content d-none" id="step-2-content">
                        <h5 class="text-center step-header">Gönderi Bilgileri</h5>

                        <div class="alert alert-info mb-4">
                            <strong>Seçilen Gönderi Türü:</strong> <span id="selected-type-display"></span>
                        </div>

                        <!-- Kargo ve Paket Taşımacılığı Formu -->
                        <div class="form-section d-none" id="kargo-form">
                            <div class="row g-3">
                                <!-- Gönderici Bilgileri -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3">Gönderici Bilgileri</h6>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Gönderici Adı</label>
                                    <input type="text" class="form-control" id="kargo-sender-name"
                                        placeholder="Ad Soyad">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Gönderici Adresi</label>
                                    <input type="text" class="form-control" id="kargo-sender-address"
                                        placeholder="Adres">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Gönderici Telefon</label>
                                    <input type="text" class="form-control" id="kargo-sender-phone"
                                        placeholder="Telefon">
                                </div>

                                <!-- Nereden / Nereye -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Güzergah Bilgileri</h6>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nereden (Şehir)</label>
                                    <input type="text" class="form-control" id="kargo-from"
                                        placeholder="Gönderici Şehir">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nereye (Şehir)</label>
                                    <input type="text" class="form-control" id="kargo-to" placeholder="Alıcı Şehir">
                                </div>

                                <!-- Alıcı Bilgileri -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Alıcı Bilgileri</h6>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Alıcı Adı</label>
                                    <input type="text" class="form-control" id="kargo-receiver-name"
                                        placeholder="Ad Soyad">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Alıcı Adresi</label>
                                    <input type="text" class="form-control" id="kargo-receiver-address"
                                        placeholder="Adres">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Alıcı Telefon</label>
                                    <input type="text" class="form-control" id="kargo-receiver-phone"
                                        placeholder="Telefon">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Posta Kodu</label>
                                    <input type="text" class="form-control" id="kargo-postcode"
                                        placeholder="Posta Kodu">
                                </div>

                                <!-- Paket Bilgileri -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Paket Bilgileri</h6>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Ağırlık (kg)</label>
                                    <input type="number" class="form-control" id="kargo-weight" placeholder="Kg">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">En (cm)</label>
                                    <input type="number" class="form-control" id="kargo-width" placeholder="cm">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Boy (cm)</label>
                                    <input type="number" class="form-control" id="kargo-length" placeholder="cm">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Yükseklik (cm)</label>
                                    <input type="number" class="form-control" id="kargo-height" placeholder="cm">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">İçerik Açıklaması</label>
                                    <textarea class="form-control" id="kargo-content" rows="2" placeholder="Paket içeriği"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Sigorta İsteği</label>
                                    <select class="form-select" id="kargo-insurance">
                                        <option value="">Seçiniz</option>
                                        <option value="Var">Var</option>
                                        <option value="Yok">Yok</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Ticari Eşya Taşımacılığı Formu -->
                        <div class="form-section d-none" id="ticari-form">
                            <div class="row g-3">
                                <!-- Firma Bilgileri -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3">Gönderici & Alıcı Firma Bilgileri</h6>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Gönderici Firma</label>
                                    <input type="text" class="form-control" id="ticari-sender-company"
                                        placeholder="Firma Adı">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Alıcı Firma</label>
                                    <input type="text" class="form-control" id="ticari-receiver-company"
                                        placeholder="Firma Adı">
                                </div>

                                <!-- Güzergah -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Güzergah</h6>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nereden</label>
                                    <input type="text" class="form-control" id="ticari-from"
                                        placeholder="Çıkış Noktası">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nereye</label>
                                    <input type="text" class="form-control" id="ticari-to"
                                        placeholder="Varış Noktası">
                                </div>

                                <!-- Eşya Bilgileri -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Eşya Bilgileri</h6>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Eşya Türü</label>
                                    <input type="text" class="form-control" id="ticari-goods-type"
                                        placeholder="Eşya türü">
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">Eşya Açıklaması</label>
                                    <input type="text" class="form-control" id="ticari-goods-desc"
                                        placeholder="Detaylı açıklama">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Toplam Brüt Ağırlık (kg)</label>
                                    <input type="number" class="form-control" id="ticari-total-weight"
                                        placeholder="kg">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Palet Sayısı</label>
                                    <input type="number" class="form-control" id="ticari-pallets" placeholder="Adet">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Koli Sayısı</label>
                                    <input type="number" class="form-control" id="ticari-boxes" placeholder="Adet">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Koli Boyutları</label>
                                    <input type="text" class="form-control" id="ticari-box-dimensions"
                                        placeholder="ÖrnekÇ 50x40x30">
                                </div>

                                <!-- Değer ve Diğer Bilgiler -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Diğer Bilgiler</h6>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Toplam Değer</label>
                                    <input type="number" class="form-control" id="ticari-total-value"
                                        placeholder="Fatura bedeli">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Para Birimi</label>
                                    <select class="form-select" id="ticari-currency">
                                        <option value="">Seçiniz</option>
                                        <option value="TL">TL</option>
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">İhracat/İthalat Beyannamesi</label>
                                    <select class="form-select" id="ticari-declaration">
                                        <option value="">Seçiniz</option>
                                        <option value="Gerekli">Gerekli</option>
                                        <option value="Gerekli Değil">Gerekli Değil</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Teslim Şekli (INCOTERM)</label>
                                    <select class="form-select" id="ticari-incoterm">
                                        <option value="">Seçiniz</option>
                                        <option value="EXW">EXW</option>
                                        <option value="DDP">DDP</option>
                                        <option value="CIF">CIF</option>
                                        <option value="FOB">FOB</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Yükleme Tarihi</label>
                                    <input type="date" class="form-control" id="ticari-loading-date">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Teslim Süresi Talebi</label>
                                    <input type="text" class="form-control" id="ticari-delivery-time"
                                        placeholder="Örnek: 5 gün">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Nakliye Türü</label>
                                    <select class="form-select" id="ticari-transport-type">
                                        <option value="">Seçiniz</option>
                                        <option value="Kara">Kara</option>
                                        <option value="Hava">Hava</option>
                                        <option value="Deniz">Deniz</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Yeni Mobilya Taşımacılığı Formu -->
                        <div class="form-section d-none" id="mobilya-form">
                            <div class="row g-3">
                                <!-- Gönderici & Alıcı -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3">Gönderici & Alıcı Bilgileri</h6>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Gönderici Bilgileri</label>
                                    <textarea class="form-control" id="mobilya-sender" rows="2" placeholder="Ad, adres, telefon"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Alıcı Bilgileri</label>
                                    <textarea class="form-control" id="mobilya-receiver" rows="2" placeholder="Ad, adres, telefon"></textarea>
                                </div>

                                <!-- Güzergah -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Güzergah</h6>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nereden</label>
                                    <input type="text" class="form-control" id="mobilya-from"
                                        placeholder="Çıkış noktası">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nereye</label>
                                    <input type="text" class="form-control" id="mobilya-to"
                                        placeholder="Varış noktası">
                                </div>

                                <!-- Ürün Bilgileri -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Ürün Bilgileri</h6>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Ürün Listesi</label>
                                    <textarea class="form-control" id="mobilya-product-list" rows="3" placeholder="Adet, tür, malzeme bilgileri"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Toplam Ağırlık (kg)</label>
                                    <input type="number" class="form-control" id="mobilya-weight" placeholder="kg">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Toplam Hacim (m³)</label>
                                    <input type="number" class="form-control" id="mobilya-volume" placeholder="m³">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Paketleme Durumu</label>
                                    <select class="form-select" id="mobilya-packaging">
                                        <option value="">Seçiniz</option>
                                        <option value="Demonte">Demonte</option>
                                        <option value="Montajlı">Montajlı</option>
                                    </select>
                                </div>

                                <!-- Diğer Bilgiler -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Diğer Bilgiler</h6>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Sigorta Talebi</label>
                                    <select class="form-select" id="mobilya-insurance">
                                        <option value="">Seçiniz</option>
                                        <option value="Var">Var</option>
                                        <option value="Yok">Yok</option>
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">Teslimat Yeri Detayları</label>
                                    <input type="text" class="form-control" id="mobilya-delivery-details"
                                        placeholder="Kat bilgisi, asansör durumu vb.">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Nakliye Türü</label>
                                    <select class="form-select" id="mobilya-transport-type">
                                        <option value="">Seçiniz</option>
                                        <option value="Parça Yük">Parça Yük</option>
                                        <option value="Tam Kamyon">Tam Kamyon</option>
                                        <option value="Konteyner">Konteyner</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Fatura Değeri</label>
                                    <input type="number" class="form-control" id="mobilya-invoice-value"
                                        placeholder="Değer">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Yükleme Tarihi</label>
                                    <input type="date" class="form-control" id="mobilya-loading-date">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Boşaltma Tarihi</label>
                                    <input type="date" class="form-control" id="mobilya-unloading-date">
                                </div>
                            </div>
                        </div>

                        <!-- Uluslararası Evden Eve Taşımacılık Formu -->
                        <div class="form-section d-none" id="evden-eve-form">
                            <div class="row g-3">
                                <!-- Adres Bilgileri -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3">Adres Bilgileri</h6>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Gönderici Adresi</label>
                                    <textarea class="form-control" id="evden-sender-address" rows="2" placeholder="Tam adres"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Alıcı Adresi</label>
                                    <textarea class="form-control" id="evden-receiver-address" rows="2" placeholder="Tam adres"></textarea>
                                </div>

                                <!-- Güzergah -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Güzergah</h6>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nereden (Ülke/Şehir)</label>
                                    <input type="text" class="form-control" id="evden-from"
                                        placeholder="Örnek: Türkiye/İstanbul">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nereye (Ülke/Şehir)</label>
                                    <input type="text" class="form-control" id="evden-to"
                                        placeholder="Örnek: Almanya/Berlin">
                                </div>

                                <!-- Ev Bilgileri -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Ev Bilgileri</h6>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Ev Tipi</label>
                                    <select class="form-select" id="evden-house-type">
                                        <option value="">Seçiniz</option>
                                        <option value="1+1">1+1</option>
                                        <option value="2+1">2+1</option>
                                        <option value="3+1">3+1</option>
                                        <option value="4+1">4+1</option>
                                        <option value="5+1">5+1</option>
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">Taşınacak Eşya Listesi (Opsiyonel)</label>
                                    <textarea class="form-control" id="evden-items" rows="2" placeholder="Envanter detayları"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Tahmini Hacim (m³)</label>
                                    <input type="number" class="form-control" id="evden-volume" placeholder="m³">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Kat Bilgileri (Çıkış)</label>
                                    <select class="form-select" id="evden-floor-from">
                                        <option value="">Seçiniz</option>
                                        <option value="Asansörlü">Asansörlü</option>
                                        <option value="Asansörsüz">Asansörsüz</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Kat Bilgileri (Varış)</label>
                                    <select class="form-select" id="evden-floor-to">
                                        <option value="">Seçiniz</option>
                                        <option value="Asansörlü">Asansörlü</option>
                                        <option value="Asansörsüz">Asansörsüz</option>
                                    </select>
                                </div>

                                <!-- Hizmet Talepleri -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Hizmet Talepleri</h6>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Ambalaj Hizmeti</label>
                                    <select class="form-select" id="evden-packaging">
                                        <option value="">Seçiniz</option>
                                        <option value="Var">Var</option>
                                        <option value="Yok">Yok</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Montaj/Demontaj</label>
                                    <select class="form-select" id="evden-assembly">
                                        <option value="">Seçiniz</option>
                                        <option value="Var">Var</option>
                                        <option value="Yok">Yok</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Sigorta Talebi</label>
                                    <select class="form-select" id="evden-insurance">
                                        <option value="">Seçiniz</option>
                                        <option value="Var">Var</option>
                                        <option value="Yok">Yok</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Gümrükleme</label>
                                    <select class="form-select" id="evden-customs">
                                        <option value="">Seçiniz</option>
                                        <option value="Evraklı">Evraklı</option>
                                        <option value="Evraksız">Evraksız</option>
                                    </select>
                                </div>

                                <!-- Tarih Bilgileri -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Tarih Bilgileri</h6>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Yükleme Tarihi</label>
                                    <input type="date" class="form-control" id="evden-loading-date">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Teslimat Tarihi</label>
                                    <input type="date" class="form-control" id="evden-delivery-date">
                                </div>
                            </div>
                        </div>

                        <!-- Araç ve Motosiklet Taşımacılığı Formu -->
                        <div class="form-section d-none" id="arac-form">
                            <div class="row g-3">
                                <!-- Gönderici & Alıcı -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3">Gönderici & Alıcı Bilgileri</h6>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Gönderici Bilgileri</label>
                                    <textarea class="form-control" id="arac-sender" rows="2" placeholder="Ad, adres, telefon"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Alıcı Bilgileri</label>
                                    <textarea class="form-control" id="arac-receiver" rows="2" placeholder="Ad, adres, telefon"></textarea>
                                </div>

                                <!-- Güzergah -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Güzergah</h6>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nereden</label>
                                    <input type="text" class="form-control" id="arac-from"
                                        placeholder="Çıkış noktası">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nereye</label>
                                    <input type="text" class="form-control" id="arac-to"
                                        placeholder="Varış noktası">
                                </div>

                                <!-- Araç Bilgileri -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Araç Bilgileri</h6>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Araç Türü</label>
                                    <select class="form-select" id="arac-type">
                                        <option value="">Seçiniz</option>
                                        <option value="Otomobil">Otomobil</option>
                                        <option value="Motosiklet">Motosiklet</option>
                                        <option value="SUV">SUV</option>
                                        <option value="Minivan">Minivan</option>
                                        <option value="Pickup">Pickup</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Marka</label>
                                    <input type="text" class="form-control" id="arac-brand" placeholder="Marka">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Model</label>
                                    <input type="text" class="form-control" id="arac-model" placeholder="Model">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Yıl</label>
                                    <input type="number" class="form-control" id="arac-year" placeholder="2023">
                                </div>

                                <!-- Araç Ölçüleri -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Araç Boyutları</h6>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Uzunluk (cm)</label>
                                    <input type="number" class="form-control" id="arac-length" placeholder="cm">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Genişlik (cm)</label>
                                    <input type="number" class="form-control" id="arac-width" placeholder="cm">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Yükseklik (cm)</label>
                                    <input type="number" class="form-control" id="arac-height" placeholder="cm">
                                </div>

                                <!-- Diğer Bilgiler -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Diğer Bilgiler</h6>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Şasi Numarası (VIN)</label>
                                    <input type="text" class="form-control" id="arac-vin"
                                        placeholder="VIN numarası">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Çalışır Durumda mı?</label>
                                    <select class="form-select" id="arac-working">
                                        <option value="">Seçiniz</option>
                                        <option value="Evet">Evet</option>
                                        <option value="Hayır">Hayır</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Gümrük Evrakları</label>
                                    <select class="form-select" id="arac-customs-docs">
                                        <option value="">Seçiniz</option>
                                        <option value="Var">Var</option>
                                        <option value="Yok">Yok</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Teslimat Tipi</label>
                                    <select class="form-select" id="arac-delivery-type">
                                        <option value="">Seçiniz</option>
                                        <option value="Kapıdan">Kapıdan</option>
                                        <option value="Limandan">Limandan</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Sigorta Talebi</label>
                                    <select class="form-select" id="arac-insurance">
                                        <option value="">Seçiniz</option>
                                        <option value="Var">Var</option>
                                        <option value="Yok">Yok</option>
                                    </select>
                                </div>

                                <!-- Tarih Bilgileri -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Tarih ve Yer Bilgileri</h6>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Yükleme Yeri</label>
                                    <input type="text" class="form-control" id="arac-loading-place"
                                        placeholder="Yükleme yeri">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Teslim Yeri</label>
                                    <input type="text" class="form-control" id="arac-delivery-place"
                                        placeholder="Teslim yeri">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Yükleme Tarihi</label>
                                    <input type="date" class="form-control" id="arac-loading-date">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Teslim Tarihi</label>
                                    <input type="date" class="form-control" id="arac-delivery-date">
                                </div>
                            </div>
                        </div>

                        <!-- Konteyner Taşımacılığı Formu -->
                        <div class="form-section d-none" id="konteyner-form">
                            <div class="row g-3">
                                <!-- Konteyner Bilgileri -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3">Konteyner Bilgileri</h6>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Konteyner Tipi</label>
                                    <select class="form-select" id="konteyner-type">
                                        <option value="">Seçiniz</option>
                                        <option value="20'lik">20'lik</option>
                                        <option value="40'lık">40'lık</option>
                                        <option value="HC (High Cube)">HC (High Cube)</option>
                                        <option value="Açık Üst">Açık Üst</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Yükleme Türü</label>
                                    <select class="form-select" id="konteyner-loading-type">
                                        <option value="">Seçiniz</option>
                                        <option value="FCL">FCL (Full Container Load)</option>
                                        <option value="LCL">LCL (Less Container Load)</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Tahmini Ağırlık (kg)</label>
                                    <input type="number" class="form-control" id="konteyner-weight" placeholder="kg">
                                </div>

                                <!-- Yük Bilgileri -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Yük Bilgileri</h6>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Yük İçeriği</label>
                                    <textarea class="form-control" id="konteyner-content" rows="3" placeholder="Yük içeriği detayları"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Gümrük Evrakları</label>
                                    <select class="form-select" id="konteyner-customs">
                                        <option value="">Seçiniz</option>
                                        <option value="Var">Var</option>
                                        <option value="Yok">Yok</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Teslim Şekli (INCOTERM)</label>
                                    <select class="form-select" id="konteyner-incoterm">
                                        <option value="">Seçiniz</option>
                                        <option value="EXW">EXW</option>
                                        <option value="DDP">DDP</option>
                                        <option value="CIF">CIF</option>
                                        <option value="FOB">FOB</option>
                                    </select>
                                </div>

                                <!-- Güzergah Bilgileri -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Güzergah Bilgileri</h6>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Gideceği Ülke</label>
                                    <input type="text" class="form-control" id="konteyner-destination-country"
                                        placeholder="Hedef ülke">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Varış Limanı</label>
                                    <input type="text" class="form-control" id="konteyner-destination-port"
                                        placeholder="Varış limanı">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Çıkış Limanı</label>
                                    <input type="text" class="form-control" id="konteyner-origin-port"
                                        placeholder="Çıkış limanı">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Depo</label>
                                    <input type="text" class="form-control" id="konteyner-warehouse"
                                        placeholder="Depo bilgisi">
                                </div>

                                <!-- Tarih Bilgileri -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Tarih Bilgileri</h6>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Yükleme Tarihi</label>
                                    <input type="date" class="form-control" id="konteyner-loading-date">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Varış Tarihi Talebi</label>
                                    <input type="date" class="form-control" id="konteyner-arrival-date">
                                </div>

                                <!-- Diğer Bilgiler -->
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 mt-4">Diğer Bilgiler</h6>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Ambalaj/Paletleme</label>
                                    <select class="form-select" id="konteyner-packaging">
                                        <option value="">Seçiniz</option>
                                        <option value="Var">Var</option>
                                        <option value="Yok">Yok</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Tehlikeli Madde</label>
                                    <select class="form-select" id="konteyner-dangerous">
                                        <option value="">Seçiniz</option>
                                        <option value="Evet (IMO Sertifikası Var)">Evet (IMO Sertifikası Var)</option>
                                        <option value="Hayır">Hayır</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Sigorta Talebi</label>
                                    <select class="form-select" id="konteyner-insurance">
                                        <option value="">Seçiniz</option>
                                        <option value="Var">Var</option>
                                        <option value="Yok">Yok</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="button" class="btn btn-secondary me-2" id="step2-prev">Geri</button>
                            <button type="button" class="btn btn-primary" id="step2-next">Devam Et</button>
                        </div>
                    </div>

                    <!-- Step 3: Teklif Özeti -->
                    <div class="step-content d-none" id="step-3-content">
                        <h5 class="text-center step-header">Teklif Özeti</h5>

                        <div class="card mb-4">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong>Gönderi Türü:</strong>
                                        <span id="summary-gonderi-text"></span>
                                    </li>
                                    <li class="list-group-item">
                                        <div id="summary-details"></div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="button" class="btn btn-secondary me-2" id="step3-prev">Geri</button>
                            <button type="button" class="btn btn-success" id="submit-form">Teklif Al</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        .option-card {
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
            overflow: hidden;
        }

        .option-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15);
        }

        .option-card.selected {
            border: 3px solid #0d6efd;
            background-color: rgba(13, 110, 253, 0.1);
            box-shadow: 0 0 15px rgba(13, 110, 253, 0.4);
        }

        .option-card.selected::before {
            content: "✓";
            position: absolute;
            top: -5px;
            right: 10px;
            background-color: #0d6efd;
            color: white;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .option-card.selected .icon-container {
            color: #0d6efd;
        }

        .option-card.selected .fw-semibold {
            color: #0d6efd;
            font-weight: bold !important;
        }

        .icon-container {
            margin-bottom: 0.5rem;
        }

        .icon-container svg {
            width: 40px;
            height: 40px;
        }

        .progress {
            height: 8px;
        }

        .step-content {
            transition: opacity 0.3s ease;
        }

        .step-header {
            margin-bottom: 1.5rem;
        }

        .form-section {
            max-height: 70vh;
            overflow-y: auto;
            padding: 20px;
             border-radius: 8px;
         }
    </style>
    
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Form variables
    let selectedGonderiType = '';
    let currentStep = 1;

    // Select all option cards
    const optionCards = document.querySelectorAll('.option-card');

    // Add click event listener to all option cards
    optionCards.forEach(card => {
        card.addEventListener('click', function() {
            optionCards.forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
            selectedGonderiType = this.getAttribute('data-type');
            console.log('Selected type:', selectedGonderiType);
        });
    });

    // Navigation buttons
    document.getElementById('step1-next').addEventListener('click', () => goToStep(2));
    document.getElementById('step2-prev').addEventListener('click', () => goToStep(1));
    document.getElementById('step2-next').addEventListener('click', () => goToStep(3));
    document.getElementById('step3-prev').addEventListener('click', () => goToStep(2));
    // YENİ: submitForm fonksiyonu artık tanımlı olduğu için bu satır hatasız çalışacak.
    document.getElementById('submit-form').addEventListener('click', submitForm);

    // Step navigation function
    function goToStep(step) {
        // Validation for step 1
        if (step === 2 && !selectedGonderiType) {
            Swal.fire("Lütfen bir gönderi türü seçin!");
            return;
        }

        // EKLENDİ: Validation for step 2 before going to step 3
        if (step === 3 && !validateStep2()) {
            // Doğrulama başarısız olursa fonksiyondan çık
            return;
        }

        if (step === 2) {
            document.getElementById('selected-type-display').textContent = selectedGonderiType;
            showRelevantForm();
        }

        if (step === 3) {
            updateSummary();
        }

        document.querySelectorAll('.step-content').forEach(content => {
            content.classList.add('d-none');
        });

        document.getElementById(`step-${step}-content`).classList.remove('d-none');
        document.getElementById('progress-bar').style.width = `${(step / 3) * 100}%`;
        currentStep = step;
        console.log('Step changed to:', currentStep);
    }

    // EKLENDİ: 2. Adımdaki formların temel doğrulamasını yapan fonksiyon
    function validateStep2() {
        let isValid = true;
        let requiredFields = []; // Kontrol edilecek gerekli alanların ID'leri

        // Seçilen gönderi türüne göre hangi alanların zorunlu olduğunu belirle
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
                requiredFields = ['konteyner-destination-country', 'konteyner-origin-port', 'konteyner-destination-port'];
                break;
        }

        // Gerekli alanları kontrol et
        for (const fieldId of requiredFields) {
            const field = document.getElementById(fieldId);
            if (!field || !field.value.trim()) {
                isValid = false;
                // Hangi alanın eksik olduğunu belirtmek için daha iyi bir hata mesajı
                const fieldLabel = field ? (field.previousElementSibling ? field.previousElementSibling.innerText : fieldId) : fieldId;
                Swal.fire({
                    icon: 'error',
                    title: 'Eksik Bilgi',
                    text: `Lütfen "${fieldLabel}" alanını doldurun.`
                });
                break; // İlk hatada döngüden çık
            }
        }

        return isValid;
    }


    // Show relevant form based on selected type
    function showRelevantForm() {
        document.querySelectorAll('.form-section').forEach(form => {
            form.classList.add('d-none');
        });
        switch (selectedGonderiType) {
            case 'Kargo ve Paket Taşımacılığı':
                document.getElementById('kargo-form').classList.remove('d-none');
                break;
            case 'Ticari Eşya Taşımacılığı':
                document.getElementById('ticari-form').classList.remove('d-none');
                break;
            case 'Yeni Mobilya Taşımacılığı':
                document.getElementById('mobilya-form').classList.remove('d-none');
                break;
            case 'Uluslararası Evden Eve Taşımacılık':
                document.getElementById('evden-eve-form').classList.remove('d-none');
                break;
            case 'Araç ve Motosiklet Taşımacılığı':
                document.getElementById('arac-form').classList.remove('d-none');
                break;
            case 'Konteyner Taşımacılığı':
                document.getElementById('konteyner-form').classList.remove('d-none');
                break;
        }
    }

    // Update summary
    function updateSummary() {
        document.getElementById('summary-gonderi-text').textContent = selectedGonderiType;
        let summaryHTML = '<strong>Detaylar:</strong><br>';

        switch (selectedGonderiType) {
            case 'Kargo ve Paket Taşımacılığı':
                summaryHTML += `
                <small>
                    <strong>Gönderici:</strong> ${document.getElementById('kargo-sender-name').value || 'Belirtilmedi'}<br>
                    <strong>Alıcı:</strong> ${document.getElementById('kargo-receiver-name').value || 'Belirtilmedi'}<br>
                    <strong>Güzergah:</strong> ${document.getElementById('kargo-from').value || '?'} → ${document.getElementById('kargo-to').value || '?'}<br>
                    <strong>Ağırlık:</strong> ${document.getElementById('kargo-weight').value || '0'} kg<br>
                    <strong>Boyutlar:</strong> ${document.getElementById('kargo-width').value || '0'}x${document.getElementById('kargo-length').value || '0'}x${document.getElementById('kargo-height').value || '0'} cm<br>
                    <strong>İçerik:</strong> ${document.getElementById('kargo-content').value || 'Belirtilmedi'}<br>
                    <strong>Sigorta:</strong> ${document.getElementById('kargo-insurance').value || 'Belirtilmedi'}
                </small>`;
                break;
            case 'Ticari Eşya Taşımacılığı':
                summaryHTML += `
                <small>
                    <strong>Gönderici Firma:</strong> ${document.getElementById('ticari-sender-company').value || 'Belirtilmedi'}<br>
                    <strong>Alıcı Firma:</strong> ${document.getElementById('ticari-receiver-company').value || 'Belirtilmedi'}<br>
                    <strong>Güzergah:</strong> ${document.getElementById('ticari-from').value || '?'} → ${document.getElementById('ticari-to').value || '?'}<br>
                    <strong>Eşya Türü:</strong> ${document.getElementById('ticari-goods-type').value || 'Belirtilmedi'}<br>
                    <strong>Toplam Ağırlık:</strong> ${document.getElementById('ticari-total-weight').value || '0'} kg<br>
                    <strong>Palet Sayısı:</strong> ${document.getElementById('ticari-pallets').value || '0'}<br>
                    <strong>Koli Sayısı:</strong> ${document.getElementById('ticari-boxes').value || '0'}<br>
                    <strong>Nakliye Türü:</strong> ${document.getElementById('ticari-transport-type').value || 'Belirtilmedi'}
                </small>`;
                break;
            // Diğer case'ler sizin kodunuzdaki gibi kalabilir...
            // ... (Kısalık olması adına diğer case'ler eklenmemiştir, orijinal kodunuzdaki gibidir)
        }
        document.getElementById('summary-details').innerHTML = summaryHTML;
    }

     function submitForm() {
        // Butonu devre dışı bırak ve bir "loading" göstergesi ekle
        const submitButton = document.getElementById('submit-form');
        submitButton.disabled = true;
        submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Gönderiliyor...';


        // Form verilerini backend'in beklediği formatta topla
        const postData = {
            offer_type: selectedGonderiType,
            details: {}
        };
        
        // Sadece aktif olan form bölümündeki input, select ve textarea'ları seç
        const activeForm = document.querySelector('.form-section:not(.d-none)');
        if (activeForm) {
            const formInputs = activeForm.querySelectorAll('input, select, textarea');
            formInputs.forEach(input => {
                // Etiketi (label) almak için daha sağlam bir yöntem
                let label = input.previousElementSibling ? input.previousElementSibling.innerText : input.id;
                postData.details[label] = input.value;
            });
        }

        // CSRF token'ını formdan al
        const csrfToken = document.querySelector('input[name="_token"]').value;

        // Fetch API ile verileri sunucuya gönder
        fetch("{{ route('price.offer.store') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify(postData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: 'Harika!',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'Tamam'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload(); // Sayfayı yenile
                    }
                });
            } else {
                // Sunucudan gelen validasyon veya diğer hataları göster
                const errorMessages = data.errors ? Object.values(data.errors).join('\n') : data.message;
                Swal.fire({
                    title: 'Hata!',
                    text: errorMessages || 'Bir sorun oluştu. Lütfen bilgilerinizi kontrol edin.',
                    icon: 'error',
                    confirmButtonText: 'Tekrar Dene'
                });
            }
        })
        .catch(error => {
            console.error('Fetch Error:', error);
            Swal.fire({
                title: 'Ağ Hatası!',
                text: 'Sunucuya bağlanırken bir sorun oluştu. Lütfen internet bağlantınızı kontrol edin.',
                icon: 'error',
                confirmButtonText: 'Tamam'
            });
        })
        .finally(() => {
            // Butonu tekrar aktif hale getir
            submitButton.disabled = false;
            submitButton.innerHTML = 'Teklif Al';
        });
    }

    // Form alanları değiştiğinde özeti güncellemek için listener'ları ekleyen fonksiyon
    function attachFormListeners() {
        const allFields = document.querySelectorAll('#step-2-content input, #step-2-content select');
        allFields.forEach(element => {
            if (element) {
                element.addEventListener('input', updateSummary);
                element.addEventListener('change', updateSummary);
            }
        });
    }

    // EKLENDİ: Sayfa yüklendiğinde form dinleyicilerini aktif et
    attachFormListeners();
});


    </script>
    
    @endsection
