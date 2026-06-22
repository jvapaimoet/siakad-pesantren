<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPES - Pondok Pesantren Daarul Huffaazh Jambi</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" type="image/jpg" href="{{ asset('images/sipes.jpg.jpg') }}">
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- HEADER -->
    <header class="absolute top-0 left-0 w-full z-20">
        <div class="container mx-auto px-6 py-5 flex justify-between items-center">

            <div class="flex items-center space-x-4">

                <div class="bg-white p-2 rounded-full shadow-lg">
                    <img
                        src="{{ asset('images/sipes.jpg.jpg') }}"
                        alt="Logo SIPES"
                        class="w-16 h-16 rounded-full object-cover">
                </div>

                <div class="text-white">
                    <h1 class="text-3xl font-bold tracking-wide">
                        SIPES
                    </h1>

                    <p class="text-sm text-gray-200">
                        Ponpes Daarul Huffaazh Jambi
                    </p>
                </div>

            </div>

            <a href="/login"
               class="bg-white text-green-700 px-6 py-3 rounded-xl font-semibold shadow-lg hover:bg-green-50 transition duration-300">
                <i class="fa-solid fa-right-to-bracket mr-2"></i>
                Masuk Sistem
            </a>

        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="relative min-h-screen flex items-center justify-center text-center overflow-hidden">

        <!-- Background Image -->
        <div class="absolute inset-0">
            <img
                src="{{ asset('images/pesantren.jpeg.jpeg') }}"
                alt="Pesantren"
                class="w-full h-full object-cover">
        </div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/60"></div>

        <!-- Content -->
        <div class="relative z-10 px-6 max-w-5xl">

            <h2 class="text-5xl md:text-7xl font-extrabold text-white mb-6 leading-tight">
                Selamat Datang di Sistem Informasi Pesantren
            </h2>

            <p class="text-lg md:text-2xl text-gray-200 leading-relaxed">
                Layanan integrasi data akademik, absensi, pembayaran,
                dan informasi hafalan santri secara real-time.
            </p>

            <div class="mt-10 flex flex-wrap justify-center gap-4">

                <a href="/login"
                   class="bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-xl font-semibold shadow-lg transition">
                    Masuk Sistem
                </a>

                <a href="#portal"
                   class="bg-white hover:bg-gray-100 text-gray-800 px-8 py-4 rounded-xl font-semibold shadow-lg transition">
                    Lihat Layanan
                </a>

            </div>

        </div>

    </section>

    <!-- PORTAL -->
    <main id="portal" class="container mx-auto px-6 py-20">

        <div class="text-center mb-14">
            <h2 class="text-4xl font-bold text-gray-800">
                Portal SIPES
            </h2>
            <p class="text-gray-600 mt-3">
                Pilih akses sesuai peran pengguna
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Santri -->
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center border border-gray-100 hover:-translate-y-2 hover:shadow-2xl transition duration-300">

                <div class="text-5xl text-green-600 mb-5">
                    <i class="fa-solid fa-user-graduate"></i>
                </div>

                <h3 class="text-2xl font-bold mb-3">
                    Portal Santri
                </h3>

                <p class="text-gray-600 mb-6">
                    Melihat data pribadi, absensi,
                    jadwal kegiatan, dan perkembangan hafalan.
                </p>

                <a href="/login?role=santri"
                   class="block bg-green-600 text-white py-3 rounded-xl font-medium hover:bg-green-700 transition">
                    Masuk sebagai Santri
                </a>

            </div>

            <!-- Ustadz -->
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center border border-gray-100 hover:-translate-y-2 hover:shadow-2xl transition duration-300">

                <div class="text-5xl text-green-600 mb-5">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>

                <h3 class="text-2xl font-bold mb-3">
                    Portal Ustadz/ah
                </h3>

                <p class="text-gray-600 mb-6">
                    Mengelola data santri,
                    absensi, penilaian dan pengumuman.
                </p>

                <a href="/login?role=ustadz"
                   class="block bg-green-600 text-white py-3 rounded-xl font-medium hover:bg-green-700 transition">
                    Masuk sebagai Ustadz
                </a>

            </div>

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-300 text-center py-8">

        <h4 class="font-bold text-lg mb-2">
            SIPES
        </h4>

        <p>
            Sistem Informasi Pondok Pesantren Daarul Huffaazh Jambi
        </p>

        <p class="text-sm mt-3 text-gray-400">
            © 2026 SIPES. All Rights Reserved.
        </p>

    </footer>

</body>
</html>
