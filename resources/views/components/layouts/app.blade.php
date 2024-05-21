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
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @livewireStyles --}}
</head>

<body class="font-lora antialiased bg-base-200 text-sm">

    {{-- <div x-data="{ isLoading: true }" x-init="() => { setTimeout(() => { isLoading = false; }, 2000); }">
        <template x-if="isLoading">
            <div id="loading-spinner" class="fixed top-0 left-0 w-full h-full bg-gray-950 bg-opacity-90 flex items-center justify-center z-50">
                <div>
                    <img src="{{asset('../assets/images/loading1.gif')}}" alt="" class="w-56 h-56">
                </div>
            </div>
        </template>
    </div> --}}

    <div x-data="{ isOpen: true }" class="flex flex-col relative min-h-screen">
        <!-- Navbar -->
        @include('components.partials.navbar')

        <!-- Sidebar -->
        @include('components.partials.sidebar')

        <!-- Main Content -->
        <main :class="{ 'md:ml-40 lg:ml-64': isOpen, 'md:ml-28': !isOpen }" class="sm:p-4 mb-20">
            <!-- Your page content here -->
            {{ $slot }}

        </main>

        <!-- Footer -->
        @include('components.partials.footer')

    </div>
    <div class="sm:hidden">
        @include('components.partials.bottom-botton')
    </div>
    @livewireScripts
    @stack('scripts')
</body>

</html>
