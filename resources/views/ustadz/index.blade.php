<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPES - Data Ustadz</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans flex h-screen overflow-hidden">

    <!-- SIDEBAR UTAMA (KIRI) -->
    <aside class="w-64 bg-emerald-800 text-white flex flex-col justify-between shrink-0 h-full">
        <div>
            <div class="p-5">
                <h1 class="text-2xl font-bold tracking-wide">SIPES</h1>
                <p class="text-xs text-emerald-300">Sistem Informasi Pesantren</p>
            </div>
            <nav class="mt-6 px-3 space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                    <i class="fa-solid fa-house w-5"></i><span>Dashboard</span>
                </a>
                <a href="{{ route('santri.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                    <i class="fa-solid fa-user-graduate w-5"></i><span>Data Santri</span>
                </a>
                <a href="{{ route('ustadz.index') }}" class="flex items-center space-x-3 px-4 py-3 bg-emerald-600 text-white font-medium rounded-lg transition">
                    <i class="fa-solid fa-chalkboard-user w-5"></i><span>Data Ustadz</span>
                </a>
                <a href="{{ route('jadwal.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                    <i class="fa-solid fa-calendar-days w-5"></i><span>Jadwal Kegiatan</span>
                </a>
                <a href="{{ route('laporan.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                    <i class="fa-solid fa-file-lines w-5"></i><span>Laporan</span>
                </a>
                <a href="{{ route('keuangan.index') }}" class="flex items-center space-x-3 px-4 py-3 text-emerald-100 hover:bg-emerald-700 rounded-lg transition">
                    <i class="fa-solid fa-money-bill-wave w-5"></i><span>Keuangan</span>
                </a>
            </nav>
        </div>
        <div class="p-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition flex items-center justify-center space-x-2">
                    <i class="fa-solid fa-right-from-bracket"></i><span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- AREA KONTEN UTAMA (KANAN) -->
    <div class="flex-1 flex flex-col h-full overflow-y-auto">
        
        <!-- Header Atas -->
        <header class="bg-white px-8 py-5 shadow-sm border-b">
            <h2 class="text-2xl font-bold text-emerald-800">Pondok Pesantren Daarul Huffaazh Jambi</h2>
            <p class="text-xs text-gray-500 mt-1">Halaman Manajemen Data Ustadz</p>
        </header>
        
        <!-- Isi Halaman Konten -->
        <main class="p-8 space-y-6">
            
            <!-- Notifikasi Sukses -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl shadow-sm">
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Blok Judul Daftar Data & Tombol Tambah -->
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Daftar Data Ustadz</h3>
                    <p class="text-sm text-gray-500 mt-1">Kelola semua informasi data ustadz di sini.</p>
                </div>
                <a href="{{ route('ustadz.create') }}" class="bg-emerald-800 hover:bg-emerald-900 text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition flex items-center space-x-2 shadow-sm">
                    <i class="fa-solid fa-plus"></i><span>Tambah Ustadz</span>
                </a>
            </div>

            <!-- Tabel Data Melayang Putih -->
            <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-700 font-semibold border-b">
                            <th class="py-4 px-6 text-center w-20">No</th>
                            <th class="py-4 px-6">Nama Lengkap</th>
                            <th class="py-4 px-6">Bidang / Mengajar</th>
                            <th class="py-4 px-6">No. HP / WhatsApp</th>
                            <th class="py-4 px-6 text-center w-36">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-gray-600">
                        @forelse($ustadzs as $index => $ustadz)
                            <tr class="hover:bg-gray-50/70 transition">
                                <td class="py-4 px-6 text-center font-medium">{{ $index + 1 }}</td>
                                <td class="py-4 px-6 font-bold text-emerald-800">{{ $ustadz->nama }}</td>
                                <td class="py-4 px-6"><span class="bg-emerald-50 text-emerald-700 px-2.5 py-1 rounded-md text-xs font-semibold border border-emerald-200">{{ $ustadz->bidang }}</span></td>
                                <td class="py-4 px-6">{{ $ustadz->no_hp }}</td>
                                <td class="py-4 px-6 text-center flex justify-center items-center gap-4">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('ustadz.edit', $ustadz->id) }}" class="text-blue-600 hover:text-blue-800 transition">
                                        <i class="fa-regular fa-pen-to-square text-xl"></i>
                                    </a>
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('ustadz.destroy', $ustadz->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ustadz ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 transition cursor-pointer bg-transparent border-none p-0">
                                            <i class="fa-solid fa-trash-can text-xl"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center text-gray-400 font-medium">Belum ada data ustadz yang terdaftar. silakan klik tombol tambah ustadz.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </main>
    </div>

</body>
</html>
