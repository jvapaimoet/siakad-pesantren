<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPES - Tambah Santri</title>
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
                    <i class="fa-solid fa-house w-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('santri.index') }}" class="flex items-center space-x-3 px-4 py-3 bg-emerald-600 text-white font-medium rounded-lg transition">
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
        <header class="bg-white px-8 py-4 flex justify-between items-center shadow-sm">
            <div>
                <h2 class="text-2xl font-bold text-emerald-800">Pondok Pesantren Daarul Huffaazh Jambi</h2>
                <p class="text-sm text-gray-500">Halaman Manajemen Data Santri</p>
            </div>
        </header>

        <section class="p-8 space-y-6">
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Tambah Data Santri</h3>
                    <p class="text-sm text-gray-500 mt-1">Silakan isi formulir di bawah ini untuk mendaftarkan santri baru.</p>
                </div>
                <a href="{{ route('santri.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 bg-white border px-4 py-2 rounded-lg shadow-sm flex items-center space-x-2">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Kembali ke Data Santri</span>
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 max-w-2xl">
                <form action="{{ route('santri.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" required placeholder="Contoh: Ahmad Al-Ghifari" 
                            class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm p-2 bg-gray-50 border">
                        @error('nama') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Jenis Kelamin</label>
                        <select name="jenis_kelamin" required class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm p-2 bg-gray-50 border">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('jenis_kelamin') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Kelas / Kamar</label>
                        <input type="text" name="kelas" id="kelas" placeholder="Contoh: Kelas X - Kamar Al-Khawarizmi" 
                            class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm p-2 bg-gray-50 border">
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <button type="reset" class="px-4 py-2 border rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            Reset Form
                        </button>
                        <button type="submit" class="px-5 py-2 rounded-lg text-sm font-medium text-white transition hover:bg-emerald-800" style="background-color: #046A4E;">
                            Simpan Data Santri
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>

</body>
</html>
