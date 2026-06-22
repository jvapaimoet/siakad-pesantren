<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPES - Keuangan</title>
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
                <a href="{{ route('laporan.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                    <i class="fa-solid fa-file-lines w-5"></i>
                    <span>Laporan</span>
                </a>
                <a href="{{ route('keuangan.index') }}" class="flex items-center space-x-3 px-4 py-3 bg-emerald-600 text-white font-medium rounded-lg transition">
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
                <p class="text-sm text-gray-500 mt-1">Halaman Manajemen Keuangan</p>
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
                    <h3 class="text-xl font-bold text-gray-900">Data Keuangan Pesantren</h3>
                    <p class="text-sm text-gray-500 mt-1">Kelola pemasukan dan pengeluaran pesantren.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('keuangan.cetak') }}" class="bg-white hover:bg-gray-50 text-emerald-800 border border-emerald-200 px-5 py-2.5 rounded-xl text-sm font-semibold transition inline-flex items-center gap-2 shadow-sm">
                        <i class="fa-solid fa-print"></i>
                        <span>Cetak</span>
                    </a>
                    <a href="{{ route('keuangan.create') }}" class="bg-emerald-700 hover:bg-emerald-800 text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition inline-flex items-center gap-2 shadow-sm">
                        <i class="fa-solid fa-plus"></i>
                        <span>Tambah Transaksi</span>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                    <p class="text-sm text-gray-500 font-medium">Total Pemasukan</p>
                    <h4 class="text-2xl font-bold text-emerald-700 mt-2">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</h4>
                </div>
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                    <p class="text-sm text-gray-500 font-medium">Total Pengeluaran</p>
                    <h4 class="text-2xl font-bold text-red-600 mt-2">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</h4>
                </div>
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                    <p class="text-sm text-gray-500 font-medium">Saldo</p>
                    <h4 class="text-2xl font-bold text-gray-900 mt-2">Rp {{ number_format($saldo, 0, ',', '.') }}</h4>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-700 font-semibold border-b border-gray-100">
                            <th class="py-4 px-6 text-center w-16">No</th>
                            <th class="py-4 px-6">Tanggal</th>
                            <th class="py-4 px-6">Kategori</th>
                            <th class="py-4 px-6">Tipe</th>
                            <th class="py-4 px-6 text-right">Nominal</th>
                            <th class="py-4 px-6">Deskripsi</th>
                            <th class="py-4 px-6 text-center w-24">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-gray-600">
                        @forelse($transaksis as $transaksi)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-4 px-6 text-center">{{ $loop->iteration }}</td>
                                <td class="py-4 px-6">{{ optional($transaksi->tanggal)->format('d/m/Y') ?? '-' }}</td>
                                <td class="py-4 px-6 font-medium text-gray-900">{{ $transaksi->kategori }}</td>
                                <td class="py-4 px-6 capitalize">{{ $transaksi->tipe_transaksi }}</td>
                                <td class="py-4 px-6 text-right font-semibold {{ $transaksi->tipe_transaksi === 'pengeluaran' ? 'text-red-600' : 'text-emerald-700' }}">
                                    {{ $transaksi->tipe_transaksi === 'pengeluaran' ? '-' : '+' }} Rp {{ number_format($transaksi->nominal, 0, ',', '.') }}
                                </td>
                                <td class="py-4 px-6">{{ $transaksi->deskripsi ?? '-' }}</td>
                                <td class="py-4 px-6 text-center">
                                    <form action="{{ route('keuangan.destroy', $transaksi->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 cursor-pointer" title="Hapus Data">
                                            <i class="fa-solid fa-trash text-lg"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-8 text-center text-gray-400">Belum ada data keuangan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>

</body>
</html>
