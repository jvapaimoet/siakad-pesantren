<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIPES - Sistem Informasi Pesantren</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="font-sans antialiased min-h-screen bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ asset('images/pesantren.jpeg.jpeg') }}');">

    <!-- Overlay Gelap -->
    <div class="fixed inset-0 bg-black/50"></div>

    <!-- Konten -->
    <div class="relative min-h-screen flex flex-col items-center justify-center">

        <!-- Logo -->
        <div class="mb-6">
            <a href="/">
                <img src="{{ asset('images/sipes.jpg.jpg') }}"
                     alt="Logo SIPES"
                     class="w-24 h-24 mx-auto object-contain">
            </a>
        </div>

        <!-- Card Login -->
        <div class="w-full sm:max-w-md px-8 py-8 bg-white shadow-2xl rounded-2xl">

            <div class="text-center mb-6">
                <h1 class="text-3xl font-bold text-green-700">
                    SIPES
                </h1>

                <p class="text-gray-500 mt-2">
                    Sistem Informasi Pondok Pesantren
                </p>
            </div>

            {{ $slot }}

        </div>

        <!-- Footer -->
        <div class="mt-6 text-white text-sm">
            © {{ date('Y') }} SIPES - Pondok Pesantren Daarul Huffaazh Jambi
        </div>

    </div>

</body>
</html>
