<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPES - Laporan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans flex h-screen overflow-hidden">

    <aside class="w-64 bg-emerald-800 text-white flex flex-col justify-between hidden md:flex shrink-0">
        <div>
            <div class="p-5 flex justify-between items-center border-b border-emerald-700">
                <div>
                    <h1 class="text-2xl font-bold tracking-wide">SIPES</h1>
                    <p class="text-xs text-emerald-300">Sistem Informasi Pesantren</p>
                </div>
            </div>
            <nav class="mt-6 px-3 space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                    <i class="fa-solid fa-house w-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('santri.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                    <i class="fa-solid fa-user-graduate w-5"></i>
                    <span>Data Santri</span>
                </a>
                <a href="{{ route('ustadz.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                    <i class="fa-solid fa-chalkboard-user w-5"></i>
                    <span>Data Ustadz</span>
                </a>
                <a href="{{ route('jadwal.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                    <i class="fa-solid fa-calendar-days w-5"></i>
                    <span>Jadwal Kegiatan</span>
                </a>
                <a href="{{ route('laporan.index') }}" class="flex items-center space-x-3 px-4 py-3 bg-emerald-600 text-white font-medium rounded-lg transition">
                    <i class="fa-solid fa-file-lines w-5"></i>
                    <span>Laporan</span>
                </a>
                <a href="{{ route('keuangan.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                    <i class="fa-solid fa-money-bill-wave w-5"></i>
                    <span>Keuangan</span>
                </a>
            </nav>
        </div>
        <div class="p-4">
            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin?')">
                @csrf
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-2.5 px-4 rounded-lg transition flex items-center justify-center space-x-2 shadow-sm cursor-pointer">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col overflow-y-auto">
        <header class="bg-white px-8 py-6 flex justify-between items-center shadow-sm">
            <div>
                <h2 class="text-2xl font-bold text-emerald-800">Pondok Pesantren Daarul Huffaazh Jambi</h2>
                <p class="text-sm text-gray-500 mt-1">Halaman Rekapitualisasi & Laporan</p>
            </div>
        </header>

        <section class="p-8 space-y-6">
            @if(session('success'))
                <div class="bg-emerald-100 text-emerald-900 border border-emerald-200 rounded-lg p-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex items-center justify-between gap-4">
                <div>
                    <h3 class="text-xl font-bold text-gray-900">Cetak Laporan Pesantren</h3>
                    <p class="text-sm text-gray-500 mt-1">Silakan pilih data laporan yang ingin Anda ekspor atau cetak.</p>
                </div>
                <a href="{{ route('laporan.create') }}" class="bg-emerald-700 hover:bg-emerald-800 text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition inline-flex items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-plus"></i>
                    <span>Tambah Laporan</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex justify-between items-center gap-4 transition hover:shadow-md">
                    <div class="flex items-center gap-4 min-w-0">
                        <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-user-graduate text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-base">Laporan Data Santri Keseluruhan</h4>
                            <p class="text-xs text-gray-400 mt-1">Format dokumen tersedia: PDF / Excel</p>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('laporan.cetak', 'santri') }}" class="bg-emerald-100 hover:bg-emerald-200 text-emerald-800 px-5 py-2 rounded-xl text-sm font-semibold transition inline-block shadow-sm cursor-pointer">
                            Cetak
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex justify-between items-center gap-4 transition hover:shadow-md">
                    <div class="flex items-center gap-4 min-w-0">
                        <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-chalkboard-user text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-base">Laporan Data Ustadz & Staff</h4>
                            <p class="text-xs text-gray-400 mt-1">Format dokumen tersedia: PDF / Excel</p>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('laporan.cetak', 'ustadz') }}" class="bg-emerald-100 hover:bg-emerald-200 text-emerald-800 px-5 py-2 rounded-xl text-sm font-semibold transition inline-block shadow-sm cursor-pointer">
                            Cetak
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex justify-between items-center gap-4 transition hover:shadow-md">
                    <div class="flex items-center gap-4 min-w-0">
                        <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-clipboard-check text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-base">Laporan Presensi Santri</h4>
                            <p class="text-xs text-gray-400 mt-1">Rekap kehadiran santri</p>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('laporan.cetak', 'absen') }}" class="bg-emerald-100 hover:bg-emerald-200 text-emerald-800 px-5 py-2 rounded-xl text-sm font-semibold transition inline-block shadow-sm cursor-pointer">
                            Cetak
                        </a>
                    </div>
                </div>

            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100">
                    <h4 class="font-bold text-gray-900">Riwayat Laporan</h4>
                </div>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 text-sm">
                            <th class="py-3 px-6">Jenis</th>
                            <th class="py-3 px-6">Tanggal</th>
                            <th class="py-3 px-6">Kategori</th>
                            <th class="py-3 px-6">Nominal</th>
                            <th class="py-3 px-6">Deskripsi</th>
                            <th class="py-3 px-6 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                        @forelse($laporans as $laporan)
                            <tr>
                                <td class="py-3 px-6 font-semibold capitalize">{{ $laporan->jenis_laporan }}</td>
                                <td class="py-3 px-6">{{ optional($laporan->tanggal)->format('d/m/Y') ?? '-' }}</td>
                                <td class="py-3 px-6">{{ $laporan->kategori ?? '-' }}</td>
                                <td class="py-3 px-6">
                                    @if($laporan->nominal)
                                        <span class="{{ $laporan->tipe_transaksi === 'pengeluaran' ? 'text-red-600' : 'text-emerald-700' }} font-semibold">
                                            {{ $laporan->tipe_transaksi === 'pengeluaran' ? '-' : '+' }} Rp {{ number_format($laporan->nominal, 0, ',', '.') }}
                                        </span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="py-3 px-6">{{ $laporan->deskripsi ?? '-' }}</td>
                                <td class="py-3 px-6 text-center">
                                    <a href="{{ route('laporan.cetak', $laporan->jenis_laporan) }}" class="text-emerald-700 hover:text-emerald-900 font-semibold">
                                        Cetak
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 px-6 text-center text-gray-400">Belum ada riwayat laporan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>

</body>
</html>
