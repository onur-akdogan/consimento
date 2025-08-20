<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow, index" />
    <meta name="description" content="" />
    <meta name="twitter:site" content="@keenthemes" />
    <meta name="twitter:creator" content="@keenthemes" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="{{ asset('assets/media/app/og-image.png') }}" />
    <meta property="og:locale" content="tr_TR" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Moblogi" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="{{ asset('assets/media/app/og-image.png') }}" />

    <title>Moblogi - @yield('title')</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/app/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/media/app/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/media/app/favicon-16x16.png') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/media/app/favicon.ico') }}" />

    <!-- Tailwind CSS CDN (veya local olarak kendi Tailwind derlemeni kullanabilirsin) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Eğer ek stil dosyaları varsa -->
    @stack('css')
</head>

<body class="bg-gray-100 min-h-screen flex flex-col justify-between">

    <!-- Content -->
    <main class="flex-grow">
        <div class="container mx-auto px-4 py-10">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center text-sm text-gray-500 py-6">
        <script>document.write(new Date().getFullYear())</script> &copy; AlgiAi
    </footer>

    <!-- JavaScript (isteğe bağlı) -->
    @stack('scripts')
</body>
</html>
