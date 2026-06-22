<x-guest-layout>
    <div class="text-center mb-8">
        <img src="{{ asset('images/sipes.jpg.jpg') }}"
             alt="Logo SIPES"
             class="w-24 h-24 mx-auto object-contain">

        <h2 class="text-3xl font-bold mt-4">SIPES</h2>
        <p class="text-gray-600">Sistem Informasi Pondok Pesantren</p>
    </div>

    <div class="text-center mb-8">
        <h3 class="text-xl font-semibold text-gray-800">Pilih Tipe Akun Anda</h3>
    </div>

    <div class="grid grid-cols-1 gap-4">
        <!-- Login Ustadz -->
        <a href="{{ route('login.ustadz') }}"
           class="block p-6 border-2 border-blue-700 rounded-lg hover:bg-blue-50 transition">
            <div class="flex items-center justify-center mb-2">
                <i class="fas fa-chalkboard-user text-3xl text-blue-700"></i>
            </div>
            <h4 class="font-semibold text-blue-700 text-lg">Ustadz (Pengajar)</h4>
            <p class="text-sm text-gray-600">Mengelola jadwal, laporan dan absensi</p>
        </a>

        <!-- Login Santri -->
        <a href="{{ route('login.santri') }}"
           class="block p-6 border-2 border-purple-700 rounded-lg hover:bg-purple-50 transition">
            <div class="flex items-center justify-center mb-2">
                <i class="fas fa-graduation-cap text-3xl text-purple-700"></i>
            </div>
            <h4 class="font-semibold text-purple-700 text-lg">Santri (Siswa)</h4>
            <p class="text-sm text-gray-600">Melihat jadwal kegiatan</p>
        </a>
    </div>

    <div class="mt-8 text-center text-sm text-gray-600">
        Belum punya akun?
        <a href="{{ route('register') }}" class="font-semibold text-green-700 hover:text-green-900">
            Daftar akun baru
        </a>
    </div>
</x-guest-layout>
