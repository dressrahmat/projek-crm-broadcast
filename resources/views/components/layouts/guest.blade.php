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

    <div class="hero min-h-screen bg-base-100">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">Simple Projek</h1>
                <h2 class="text-2xl text-neutral font-bold mt-4">"Sistem Pelejit Potensi Ruang Objek"</h2>
                <p class="py-6">Lejitkan potensi perusahaan dan instansi anda dengan sistem manajemen online. Rasakan pertumbuhan perusahaan dengan sistem yang dirancang khusus untuk perusahaan/instansi anda.</p>
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