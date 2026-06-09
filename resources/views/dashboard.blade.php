<x-app-layout>

<div class="flex min-h-screen bg-gray-100"
     x-data="{ sidebarOpen: true }">

    <!-- SIDEBAR -->
    <div :class="sidebarOpen ? 'w-64' : 'w-20'"
         class="bg-green-800 text-white min-h-screen transition-all duration-300 flex flex-col">

        <!-- HEADER SIDEBAR -->
        <div class="p-4 border-b border-green-700 flex justify-between items-center">

            <div x-show="sidebarOpen">
                <h1 class="text-3xl font-bold">SIPES</h1>
                <p class="text-xs text-green-200">
                    Sistem Informasi Pesantren
                </p>
            </div>

            <button @click="sidebarOpen = !sidebarOpen"
                    class="bg-green-700 px-2 py-1 rounded">
                ☰
            </button>

        </div>

        <!-- MENU -->
        <nav class="p-3 space-y-2">

            <a href="/dashboard"
               class="flex items-center gap-3 p-3 rounded bg-green-600">
                <span>🏠</span>
                <span x-show="sidebarOpen">Dashboard</span>
            </a>

            <a href="/santri"
               class="flex items-center gap-3 p-3 rounded hover:bg-green-700">
                <span>👨‍🎓</span>
                <span x-show="sidebarOpen">Data Santri</span>
            </a>

            <a href="/ustadz"
               class="flex items-center gap-3 p-3 rounded hover:bg-green-700">
                <span>👨‍🏫</span>
                <span x-show="sidebarOpen">Data Ustadz</span>
            </a>

            <a href="/jadwal"
               class="flex items-center gap-3 p-3 rounded hover:bg-green-700">
                <span>📅</span>
                <span x-show="sidebarOpen">Jadwal Kegiatan</span>
            </a>

            <a href="/laporan"
               class="flex items-center gap-3 p-3 rounded hover:bg-green-700">
                <span>📄</span>
                <span x-show="sidebarOpen">Laporan</span>
            </a>

        </nav>

        <!-- FOOTER SIDEBAR -->
        <div class="mt-auto p-5 text-center">

            <div class="border-t border-green-700 pt-4">

                <h3 class="font-bold">
                    Pondok Pesantren
                </h3>

                <p class="font-bold text-lg">
                    Daarul Huffaazh Jambi
                </p>

                <p class="text-xs mt-3 text-green-200">
                    "Mencetak Generasi Qur'ani,
                    Berilmu dan Berakhlak Mulia"
                </p>

            </div>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="flex-1">

        <!-- TOP HEADER -->
        <div class="bg-white shadow px-6 py-4 flex justify-between items-center">

            <div>
                <h1 class="text-3xl font-bold text-green-800">
                    Pondok Pesantren Daarul Huffaazh Jambi
                </h1>

                <p class="text-gray-500">
                    Selamat datang di Sistem Informasi Pesantren
                </p>
            </div>

            <div class="flex items-center gap-4">

                <div class="relative">
                    🔔
                    <span class="absolute -top-2 -right-2 bg-green-600 text-white text-xs rounded-full px-1">
                        3
                    </span>
                </div>

                <div class="text-right">
                    <h4 class="font-bold">Admin</h4>
                    <p class="text-sm text-gray-500">
                        Administrator
                    </p>
                </div>

            </div>

        </div>

        <div class="p-6">

            <!-- CARD -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">

                <div class="bg-white rounded-xl shadow p-5">
                    <p class="text-gray-500">Total Santri</p>
                    <h2 class="text-4xl font-bold text-green-600">
                        {{ $totalSantri }}
                    </h2>
                </div>

                <div class="bg-white rounded-xl shadow p-5">
                    <p class="text-gray-500">
                        Total Ustadz/Ustadzah
                    </p>
                    <h2 class="text-4xl font-bold text-green-600">
                        {{ $totalUstadz }}
                    </h2>
                </div>

                <div class="bg-white rounded-xl shadow p-5">
                    <p class="text-gray-500">
                        Total Jadwal Kegiatan
                    </p>
                    <h2 class="text-4xl font-bold text-yellow-500">
                        {{ $totalJadwal }}
                    </h2>
                </div>

                <div class="bg-white rounded-xl shadow p-5">
                    <p class="text-gray-500">
                        Total Laporan
                    </p>
                    <h2 class="text-4xl font-bold text-blue-500">
                        {{ $totalLaporan }}
                    </h2>
                </div>

            </div>

            <!-- GRAFIK + JADWAL -->
            <div class="grid lg:grid-cols-3 gap-6 mb-6">

                <div class="lg:col-span-2 bg-white rounded-xl shadow p-5">

                    <div class="flex justify-between mb-4">
                        <h2 class="font-bold text-lg">
                            Ringkasan Data
                        </h2>
                    </div>

                    <canvas id="chartRingkasan"></canvas>

                </div>

                <div class="bg-white rounded-xl shadow p-5">

                    <h2 class="font-bold text-lg mb-4">
                        Jadwal Kegiatan Terdekat
                    </h2>

                    <div class="space-y-4">

                        <div class="flex justify-between border-b pb-2">
                            <span>Tahfidz Qur'an</span>
                            <span class="text-green-600">
                                07.00 WIB
                            </span>
                        </div>

                        <div class="flex justify-between border-b pb-2">
                            <span>Kajian Kitab</span>
                            <span class="text-green-600">
                                09.30 WIB
                            </span>
                        </div>

                        <div class="flex justify-between border-b pb-2">
                            <span>Bahasa Arab</span>
                            <span class="text-green-600">
                                14.00 WIB
                            </span>
                        </div>

                        <div class="flex justify-between border-b pb-2">
                            <span>Olahraga</span>
                            <span class="text-green-600">
                                16.00 WIB
                            </span>
                        </div>

                    </div>

                </div>

            </div>

            <!-- TABEL + LAPORAN -->
            <div class="grid lg:grid-cols-3 gap-6">

                <div class="lg:col-span-2 bg-white rounded-xl shadow p-5">

                    <h2 class="font-bold text-lg mb-4">
                        Data Santri Terbaru
                    </h2>

                    <table class="w-full">

                        <thead>

                            <tr class="bg-gray-100">

                                <th class="p-2 text-left">No</th>
                                <th class="p-2 text-left">NIS</th>
                                <th class="p-2 text-left">Nama</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($santriTerbaru as $i => $s)

                            <tr class="border-b">

                                <td class="p-2">{{ $i+1 }}</td>
                                <td class="p-2">{{ $s->nis }}</td>
                                <td class="p-2">{{ $s->nama }}</td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

                <div class="bg-white rounded-xl shadow p-5">

                    <h2 class="font-bold text-lg mb-4">
                        Laporan Cepat
                    </h2>

                    <div class="space-y-3">

                        <button class="w-full border rounded p-3">
                            Laporan Data Santri
                        </button>

                        <button class="w-full border rounded p-3">
                            Laporan Data Ustadz
                        </button>

                        <button class="w-full border rounded p-3">
                            Laporan Jadwal Kegiatan
                        </button>

                        <button class="w-full border rounded p-3">
                            Laporan Bulanan
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
new Chart(document.getElementById('chartRingkasan'), {
    type: 'line',
    data: {
        labels: ['Jan','Feb','Mar','Apr','Mei','Jun'],
        datasets: [
        {
            label: 'Santri',
            data: [240,280,320,300,325,340],
            borderWidth: 3
        },
        {
            label: 'Ustadz',
            data: [20,22,24,25,27,28],
            borderWidth: 3
        }
        ]
    }
});
</script>

</x-app-layout>