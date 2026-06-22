<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPES - Tambah Ustadz</title>
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
            <p class="text-xs text-gray-500 mt-1">Halaman Tambah Data Ustadz Baru</p>
        </header>
        
        <!-- Isi Halaman Form -->
        <main class="p-8 max-w-2xl">
            
            <div class="bg-white rounded-xl shadow-sm border p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Form Tambah Ustadz</h3>
                
                <!-- Notifikasi Jika Ada Validasi yang Gagal -->
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
                        <strong class="font-bold">Gagal Menyimpan! Periksa inputan berikut:</strong>
                        <ul class="mt-1 list-disc list-inside text-xs">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('ustadz.store') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <!-- Input Nama -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="Masukkan nama lengkap ustadz" required>
                    </div>

                    <!-- Input No. HP -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">No. HP / WhatsApp</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="Contoh: 08123456789" required>
                    </div>

                    <!-- Input Bidang / Mata Pelajaran -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Bidang / Mata Pelajaran</label>
                        <input type="text" name="bidang" value="{{ old('bidang') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="Contoh: Fiqih / Tahfidz / Bahasa Arab" required>
                    </div>

                    <!-- Input Alamat -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Alamat Rumah</label>
                        <textarea name="alamat" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="Masukkan alamat lengkap ustadz" required>{{ old('alamat') }}</textarea>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex items-center gap-3 pt-4 border-t">
                        <a href="{{ route('ustadz.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition">
                            Batal
                        </a>
                        <button type="submit" class="bg-emerald-800 hover:bg-emerald-900 text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition shadow-sm">
                            Simpan Data
                        </button>
                    </div>
                </form>
            </div>

        </main>
    </div>

</body>
</html>
