<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPES - Jadwal Kegiatan</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans flex h-screen overflow-hidden">

    <aside class="w-64 bg-emerald-800 text-white flex flex-col justify-between hidden md:flex">
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
                <a href="{{ route('jadwal.index') }}" class="flex items-center space-x-3 px-4 py-3 bg-emerald-600 text-white font-medium rounded-lg transition">
                    <i class="fa-solid fa-calendar-days w-5"></i>
                    <span>Jadwal Kegiatan</span>
                </a>
                @if(Auth::user()->role === 'ustadz')
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
                <p class="text-sm text-gray-500">Halaman Jadwal Kegiatan Pesantren</p>
            </div>
            <div class="flex items-center space-x-3">
                <div class="text-right">
                    <p class="font-bold text-gray-800 text-sm">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-400">
                        @if(Auth::user()->role === 'ustadz')
                            Pengajar (Ustadz)
                        @else
                            Siswa (Santri)
                        @endif
                    </p>
                </div>
            </div>
        </header>

        <section class="p-8 space-y-6">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Agenda & Jadwal Kegiatan</h3>
                    <p class="text-sm text-gray-500">Manajemen agenda harian, mingguan, dan bulanan santri.</p>
                </div>
                @if(Auth::user()->role === 'ustadz')
                    <a href="{{ route('jadwal.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center space-x-2 shadow-sm">
                        <i class="fa-solid fa-plus"></i>
                        <span>Tambah Jadwal</span>
                    </a>
                @endif
            </div>

            @if(session('success'))
                <div class="bg-emerald-100 text-emerald-900 border border-emerald-200 rounded-lg p-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-gray-600 text-sm font-semibold">
                            <th class="p-4 pl-6">No</th>
                            <th class="p-4">Nama Kegiatan</th>
                            <th class="p-4">Hari</th>
                            <th class="p-4">Jam</th>
                            <th class="p-4 pr-6 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                        @forelse($jadwals as $jadwal)
                            <tr>
                                <td class="p-4 pl-6">{{ $loop->iteration }}</td>
                                <td class="p-4 font-semibold text-emerald-800">{{ $jadwal->nama_kegiatan }}</td>
                                <td class="p-4 text-gray-600">{{ $jadwal->hari }}</td>
                                <td class="p-4 text-gray-600">{{ date('H:i', strtotime($jadwal->jam)) }} WIB</td>
                                <td class="p-4 pr-6 text-center space-x-3">
                                    @if(Auth::user()->role === 'ustadz')
                                        <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="text-blue-600 hover:text-blue-800"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Yakin ingin menghapus jadwal ini?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-400 text-xs">Hanya Lihat</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="p-4 pl-6 text-gray-500" colspan="5">Belum ada jadwal. Tambahkan jadwal baru untuk menampilkan data di sini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>

</body>
</html>
