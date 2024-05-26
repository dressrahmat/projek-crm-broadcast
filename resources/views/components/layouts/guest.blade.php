<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @livewireStyles --}}
</head>

<body class="font-lora text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-base-content">

    <div class="hero min-h-screen bg-base-100" style="background-image: url({{ asset('../assets/images/website/hero-auth.png') }});">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <img src="{{ asset('../assets/images/website/logo-1.png') }}" alt="" class="w-5/6">
                <h2 class="text-2xl text-white font-bold mt-4">"Kelola Daftar Kontak dengan Mudah"</h2>
                <p class="py-6 text-white text-lg">Markcomm merupakan platform komunikasi yang inovatif, dirancang khusus untuk memudahkan pengguna dalam mengelompokkan dan mengelola kontak mereka untuk pesan broadcast. Dengan fitur-fitur yang disediakan, Markcomm memungkinkan pengguna untuk dengan mudah membuat daftar kontak yang spesifik dan mengirim pesan broadcast kepada mereka secara efisien.</p>
            </div>
            <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100 text-base-content">
                {{{ $slot }}}
            </div>
        </div>
    </div>
    </div>
    @livewireScripts
</body>

</html>