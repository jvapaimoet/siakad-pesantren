<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPES - Data Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                    <i class="fa-solid fa-house w-5"></i><span>Dashboard</span>
                </a>
                @if(Auth::user()->role === 'ustadz')
                    <a href="{{ route('santri.index') }}" class="flex items-center space-x-3 px-4 py-3 bg-emerald-600 text-white font-medium rounded-lg transition">
                        <i class="fa-solid fa-user-graduate w-5"></i><span>Data Santri</span>
                    </a>
                    <a href="{{ route('ustadz.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                        <i class="fa-solid fa-chalkboard-user w-5"></i><span>Data Ustadz</span>
                    </a>
                @endif
                <a href="{{ route('jadwal.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                    <i class="fa-solid fa-calendar-days w-5"></i><span>Jadwal Kegiatan</span>
                </a>
                @if(Auth::user()->role === 'ustadz')
                    <a href="{{ route('laporan.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                        <i class="fa-solid fa-file-lines w-5"></i><span>Laporan</span>
                    </a>
                    <a href="{{ route('keuangan.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                        <i class="fa-solid fa-money-bill-wave w-5"></i><span>Keuangan</span>
                    </a>
                @endif
            </nav>
        </div>
        <div class="p-4">
            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin?')">
                @csrf
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-2.5 px-4 rounded-lg transition flex items-center justify-center space-x-2 shadow-sm cursor-pointer">
                    <i class="fa-solid fa-right-from-bracket"></i><span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col overflow-y-auto">
        <header class="bg-white px-8 py-4 flex justify-between items-center shadow-sm">
            <div>
                <h2 class="text-2xl font-bold text-emerald-800">Pondok Pesantren Daarul Huffaazh Jambi</h2>
                <p class="text-sm text-gray-500">Halaman Manajemen Data Santri</p>
            </div>
        </header>

        <section class="p-8 space-y-6">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative shadow-sm" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Daftar Data Santri</h3>
                    <p class="text-sm text-gray-500 mt-1">Kelola semua informasi data santri di sini.</p>
                </div>
                @if(Auth::user()->role === 'ustadz')
                    <a href="{{ route('santri.create') }}" class="text-sm font-medium text-white transition rounded-lg shadow-sm flex items-center space-x-2 px-4 py-2.5" style="background-color: #046A4E;">
                        <i class="fa-solid fa-plus"></i>
                        <span>Tambah Santri</span>
                    </a>
                @endif
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-700 font-semibold border-b border-gray-100">
                            <th class="py-4 px-6 text-center w-16">No</th>
                            <th class="py-4 px-6">Nama Lengkap</th>
                            <th class="py-4 px-6">Jenis Kelamin</th>
                            <th class="py-4 px-6">Kelas / Kamar</th>
                            @if(Auth::user()->role === 'ustadz')
                                <th class="py-4 px-6 text-center w-32">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-gray-600">
                        @forelse($santris as $index => $santri)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-4 px-6 text-center">{{ $index + 1 }}</td>
                                <td class="py-4 px-6 font-medium text-emerald-800">{{ $santri->nama }}</td>
                                <td class="py-4 px-6">{{ $santri->jenis_kelamin ?? '-' }}</td>
                                <td class="py-4 px-6">{{ $santri->kelas ?? '-' }}</td>
                                @if(Auth::user()->role === 'ustadz')
                                    <td class="py-4 px-6 text-center flex justify-center items-center gap-3">
                                        <a href="{{ route('santri.edit', $santri->id) }}" class="text-blue-600 hover:text-blue-900" title="Edit Data">
                                            <i class="fa-solid fa-pen-to-square text-lg"></i>
                                        </a>

                                        <form action="{{ route('santri.destroy', $santri->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data santri ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 cursor-pointer" title="Hapus Data">
                                                <i class="fa-solid fa-trash text-lg"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ Auth::user()->role === 'ustadz' ? 5 : 4 }}" class="py-8 text-center text-gray-400">Belum ada data santri.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>

</body>
</html>
