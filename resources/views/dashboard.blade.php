<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPES - Sistem Informasi Pesantren</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans flex h-screen overflow-hidden">

    <aside class="w-64 bg-emerald-800 text-white flex flex-col justify-between hidden md:flex shrink-0">
        <div>
            <div class="p-5 flex justify-between items-center border-b border-emerald-700">
                <div>
                    <h1 class="text-2xl font-bold tracking-wide">SIPES</h1>
                    <p class="text-xs text-emerald-300">Sistem Informasi Pesantren</p>
                </div>
            </div>
            
            <nav class="mt-6 px-3 space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-4 py-3 bg-emerald-700 text-white font-medium rounded-lg transition">
                    <i class="fa-solid fa-house w-5"></i>
                    <span>Dashboard</span>
                </a>
                
                @if($user->role === 'ustadz')
                    <!-- Menu Ustadz: Full Edit Access -->
                    <a href="{{ route('jadwal.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                        <i class="fa-solid fa-calendar-days w-5"></i>
                        <span>Jadwal Kegiatan</span>
                    </a>
                    <a href="{{ route('santri.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                        <i class="fa-solid fa-user-graduate w-5"></i>
                        <span>Data Santri</span>
                    </a>
                    <a href="{{ route('ustadz.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                        <i class="fa-solid fa-chalkboard-user w-5"></i>
                        <span>Data Ustadz</span>
                    </a>
                    <a href="{{ route('laporan.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                        <i class="fa-solid fa-file-lines w-5"></i>
                        <span>Laporan</span>
                    </a>
                    <a href="{{ route('keuangan.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                        <i class="fa-solid fa-money-bill-wave w-5"></i>
                        <span>Keuangan</span>
                    </a>
                    <a href="{{ route('absen.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                        <i class="fa-solid fa-clipboard-list w-5"></i>
                        <span>Absensi</span>
                    </a>
                @elseif($user->role === 'santri')
                    <!-- Menu Santri: View Only Jadwal -->
                    <a href="{{ route('jadwal.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                        <i class="fa-solid fa-calendar-days w-5"></i>
                        <span>Jadwal Kegiatan</span>
                    </a>
                @endif
            </nav>
        </div>

        <div class="p-4">
            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin keluar dari sistem SIPES?')">
                @csrf
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-2.5 px-4 rounded-lg transition flex items-center justify-center space-x-2 shadow-sm cursor-pointer">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col overflow-y-auto">
        
        <header class="bg-white px-8 py-4 flex justify-between items-center shadow-sm">
            <div>
                <h2 class="text-2xl font-bold text-emerald-800">Pondok Pesantren Daarul Huffaazh Jambi</h2>
                <p class="text-sm text-gray-500">Selamat datang di Sistem Informasi Pesantren</p>
            </div>
            
            <div class="flex items-center space-x-6">
                <div class="relative cursor-pointer">
                    <i class="fa-solid fa-bell text-xl text-amber-500"></i>
                    <span class="absolute -top-1 -right-2 bg-emerald-600 text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold">3</span>
                </div>
                
                <div class="flex items-center space-x-3 border-l pl-6 border-gray-200">
                    <div class="text-right">
                        <p class="font-bold text-gray-800 text-sm">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-400">
                            @if($user->role === 'ustadz')
                                Pengajar (Ustadz)
                            @else
                                Siswa (Santri)
                            @endif
                        </p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin keluar dari sistem SIPES?')">
                        @csrf
                        <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-600 p-2.5 rounded-full transition shadow-sm group cursor-pointer" title="Logout">
                            <i class="fa-solid fa-right-from-bracket group-hover:scale-110 transition-transform"></i>
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <section class="p-8 space-y-6">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-5 rounded-lg shadow">
                    <p class="text-3xl font-bold text-emerald-700 mt-2">{{ $totalSantri ?? 0 }}</p>
                    <h3 class="text-gray-500 text-sm font-medium">Total Santri</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-sm text-gray-500 font-medium">Total Ustadz/Ustadzah</p>
                    <h3 class="text-4xl font-bold text-emerald-600 mt-2">{{ $totalUstadz ?? 0 }}</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-sm text-gray-500 font-medium">Total Jadwal Kegiatan</p>
                    <h3 class="text-4xl font-bold text-amber-500 mt-2">{{ $totalJadwal ?? 0 }}</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-sm text-gray-500 font-medium">Total Laporan</p>
                    <h3 class="text-4xl font-bold text-blue-500 mt-2">{{ $totalLaporan ?? 0 }}</h3>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm lg:col-span-2">
                    <h4 class="text-lg font-bold text-gray-800 mb-4">Ringkasan Data</h4>
                    <div class="w-full h-64">
                        <canvas id="ringkasanChart"></canvas>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <h4 class="text-lg font-bold text-gray-800 mb-4">Jadwal Kegiatan Terdekat</h4>
                    <div class="divide-y divide-gray-100">
                        @forelse($jadwalTerdekat as $jadwal)
                            <div class="py-3 flex justify-between items-center gap-4">
                                <div>
                                    <span class="text-gray-700 font-medium block">{{ $jadwal->nama_kegiatan }}</span>
                                    <span class="text-gray-400 text-xs">{{ $jadwal->hari }}</span>
                                </div>
                                <span class="text-emerald-600 font-semibold text-sm whitespace-nowrap">
                                    {{ date('H:i', strtotime($jadwal->jam)) }} WIB
                                </span>
                            </div>
                        @empty
                            <div class="py-3 text-sm text-gray-400">
                                Belum ada jadwal kegiatan.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </section>
    </main>

    <script>
        const ctx = document.getElementById('ringkasanChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul'],
                datasets: [
                    {
                        label: 'Santri',
                        data: [240, 280, 320, 300, 325, 340],
                        borderColor: '#3b82f6',
                        backgroundColor: '#3b82f6',
                        tension: 0.2,
                        pointRadius: 4
                    },
                    {
                        label: 'Ustadz',
                        data: [25, 27, 29, 30, 31, 32],
                        borderColor: '#f43f5e',
                        backgroundColor: '#f43f5e',
                        tension: 0.2,
                        pointRadius: 4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'top' }
                },
                scales: {
                    y: { min: 0, max: 350, ticks: { stepSize: 50 } }
                }
            }
        });
    </script>
</body>
</html>
