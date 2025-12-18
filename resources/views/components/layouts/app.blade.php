<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'RagExInt' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="bg-white">

    <header class="z-50 sticky top-0">
        <livewire:partial.navbar />
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer>
        <livewire:partial.footer />
    </footer>

    @livewireScripts

    {{-- SweetAlert (enable only if needed) --}}
    {{--
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts/>
    --}}
</body>
</html>
