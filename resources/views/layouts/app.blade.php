 
<!DOCTYPE html>
<html class="h-full" data-kt-theme="true" data-kt-theme-mode="light" dir="ltr" lang="en">

<head>
    <base href="../../">
    <title>
        Moblogi
    </title>
    <meta charset="utf-8" />
    <meta content="follow, index" name="robots" />
     <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="@keenthemes" name="twitter:site" />
    <meta content="@keenthemes" name="twitter:creator" />
    <meta content="summary_large_image" name="twitter:card" />
     <meta content="" name="twitter:description" />
    <meta content="{{asset('assets/media/app/og-image.png')}}" name="twitter:image" />
     <meta content="en_US" property="og:locale" />
    <meta content="website" property="og:type" />
    <meta content="@keenthemes" property="og:site_name" />
     <meta content="" property="og:description" />
    <meta content="{{asset('assets/media/app/og-image.png')}}" property="og:image" />
    <link href="{{asset('assets/media/app/apple-touch-icon.png')}}" rel="apple-touch-icon" sizes="180x180" />
    <link href="{{asset('assets/media/app/favicon-32x32.png')}}" rel="icon" sizes="32x32" type="image/png" />
    <link href="{{asset('assets/media/app/favicon-16x16.png')}}" rel="icon" sizes="16x16" type="image/png" />
    <link href="{{asset('assets/media/app/favicon.ico')}}" rel="shortcut icon" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="{{asset('assets/vendors/apexcharts/apexcharts.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/vendors/keenicons/styles.bundle.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body
    class="antialiased flex h-full text-base text-foreground bg-background [--header-height:60px] [--sidebar-width:90px] bg-muted">
    <!-- Theme Mode -->
    <script>
        const defaultThemeMode = 'light'; // light|dark|system
        let themeMode;

        if (document.documentElement) {
            if (localStorage.getItem('kt-theme')) {
                themeMode = localStorage.getItem('kt-theme');
            } else if (
                document.documentElement.hasAttribute('data-kt-theme-mode')
            ) {
                themeMode =
                    document.documentElement.getAttribute('data-kt-theme-mode');
            } else {
                themeMode = defaultThemeMode;
            }

            if (themeMode === 'system') {
                themeMode = window.matchMedia('(prefers-color-scheme: dark)').matches ?
                    'dark' :
                    'light';
            }

            document.documentElement.classList.add(themeMode);
        }
    </script>
    <!-- End of Theme Mode -->
    <!-- Page -->
    <!-- Base -->
    <div class="flex grow">
        <!-- Header -->
        <header class="flex lg:hidden items-center fixed z-10 top-0 start-0 end-0 shrink-0 bg-muted h-(--header-height)"
            id="header">
            <!-- Container -->
            <div class="kt-container-fixed flex items-center justify-between flex-wrap gap-3">
                <a href="html/demo8.html">
                    <img class="dark:hidden min-h-[30px]" src="{{asset('assets/media/app/mini-logo-gray.svg')}}" />
                    <img class="hidden dark:block min-h-[30px]" src="{{asset('assets/media/app/mini-logo-gray-dark.svg')}}" />
                </a>
                <button class="kt-btn kt-btn-icon kt-btn-ghost -me-1" data-kt-drawer-toggle="#sidebar">
                    <i class="ki-filled ki-menu">
                    </i>
                </button>
            </div>
            <!-- End of Container -->
        </header>
        <!-- End of Header -->
        <!-- Wrapper -->
        <div class="flex flex-col lg:flex-row grow pt-(--header-height) lg:pt-0">
            <!-- Sidebar -->
            @include('layouts.partials.sidebar')
            <!-- End of Sidebar -->
            <!-- Main -->
            <div
                class="flex flex-col grow rounded-xl bg-background border border-input lg:ms-(--sidebar-width) mt-0 lg:mt-5 m-5">
                <div class="flex flex-col grow kt-scrollable-y-auto lg:[--scrollbar-width:auto] pt-5"
                    id="scrollable_content">
                    <main class="grow" role="content">
                        <!-- Toolbar -->
                        <div class="pb-5">
                            <!-- Container -->
                                      @yield('content')
 
                            <!-- End of Container -->
                        </div>
                        <!-- End of Toolbar -->
                        <!-- Container -->

                        <!-- End of Container -->
                    </main>
                </div>
                <!-- Footer -->
                <footer class="footer">
                    <!-- Container -->
                    <div class="kt-container-fixed">
                        <div
                            class="flex flex-col md:flex-row justify-center md:justify-between items-center gap-3 py-5">
                            <div class="flex order-2 md:order-1 gap-2 font-normal text-sm">
                                <span class="text-muted-foreground">
                                    2025©
                                </span>
                                <a class="text-secondary-foreground hover:text-primary" href="https://algi.ai">
                                   AlgiAI.
                                </a>
                            </div>
                         
                        </div>
                    </div>
                    <!-- End of Container -->
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- End of Main -->
        </div>
        <!-- End of Wrapper -->
    </div>
    <!-- End of Base -->

    <!-- End of Page -->
    <!-- Scripts -->
    <script src="{{asset('assets/js/core.bundle.js')}}"></script>
    <script src="{{asset('assets/vendors/ktui/ktui.min.js')}}"></script>
    <script src="{{asset('assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/js/widgets/general.js')}}"></script>
    <!-- End of Scripts -->
</body>

</html>
