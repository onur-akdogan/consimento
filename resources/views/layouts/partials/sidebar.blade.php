<!-- Left Sidebar Start -->
<style>
    .logocolordark {
        color: #000000 !important;
        font-size: large !important;
        font-weight: 700 !important;


    }

    .logocolorlight {
        color: #ffffff !important;
        font-size: large !important;
        font-weight: 700 !important;

    }
</style>

<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="{{ route('dashboard') }}" class="logo logo-light">
                    <span class="logo-sm logocolorlight">
                        CONSIMENTO
                        <!--   <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">-->
                    </span>
                    <span class="logo-lg logocolorlight">
                        CONSIMENTO

                        <!--   <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="24">-->
                    </span>
                </a>
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm logocolordark">
                        CONSIMENTO

                        <!--   <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">-->
                    </span>
                    <span class="logo-lg logocolordark">
                        CONSIMENTO

                        <!--  <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="24">-->
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i data-feather="home"></i>
                        <span> Anasayfa </span>
                    </a>

                </li>
                <li>
                    <a href="{{ route('priceoffer') }}">
                        <i data-feather="dollar-sign"></i>
                        <span> Fiyat Teklifi Al </span>
                    </a>

                </li>

                <li>
                    <a href="{{ route('pricecalcute') }}">
                        <i data-feather="plus-square"></i>
                        <span> Hızlı Fiyat Hesaplama </span>
                    </a>

                </li>
                <li>
                    <a href="{{ route('companies.index') }}">
                        <i data-feather="briefcase"></i>
                        <span> Firmalarım </span>
                    </a>

                </li>
                <li>
                    <a href="{{ route('addresses.index', ['type' => 'sender']) }}">
                        <i data-feather="map-pin"></i>
                        <span> Adreslerim </span>
                    </a>
                </li>


                <!-- Yeni Hizmetler Menüsü Burada Başlıyor -->
                <li>
                    <a href="#sidebarHizmetler" data-bs-toggle="collapse">
                        <i data-feather="package"></i>
                        <span> Hizmetler </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarHizmetler">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#" class="tp-link">Kargo ve Paket Taşımacılığı</a>
                            </li>
                            <li>
                                <a href="#" class="tp-link">Konteyner Taşımacılığı</a>
                            </li>
                            <li>
                                <a href="#" class="tp-link">Ticari Eşya Taşımacılığı</a>
                            </li>
                            <li>
                                <a href="#" class="tp-link">Uluslararası Evden Eve Taşımacılık</a>
                            </li>
                            <li>
                                <a href="#" class="tp-link">Araba Taşımacılığı</a>
                            </li>
                            <li>
                                <a href="#" class="tp-link">Yeni Mobilya Taşımacılığı</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Yeni Hizmetler Menüsü Burada Bitiyor -->

                <!-- Yeni Hizmetler Menüsü Burada Başlıyor -->
                @if (Auth::user()->type == 1)
                    <li>
                        <a href="#sidebarAdmin" data-bs-toggle="collapse">
                            <i data-feather="package"></i>
                            <span> Admin </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarAdmin">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('admin.teklif.liste') }}" class="tp-link">Teklif Firmaları</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif
                <!-- Yeni Hizmetler Menüsü Burada Bitiyor -->








            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
<!-- Left Sidebar End -->
