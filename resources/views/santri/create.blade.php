<x-app-layout>
    <div class="flex min-h-screen bg-gray-50">
        
        <div class="flex-1 py-6 px-4 sm:px-6 lg:px-8">
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Tambah Data Santri</h1>
                    <p class="text-sm text-gray-500 mt-1">Silakan isi formulir di bawah ini untuk mendaftarkan santri baru.</p>
                </div>
                <a href="/dashboard" class="text-sm font-medium text-gray-600 hover:text-gray-900 bg-white border px-4 py-2 rounded-lg shadow-sm">
                    Kembali ke Dashboard
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 max-w-2xl">
                <form action="{{ route('santri.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="nis" class="block text-sm font-semibold text-gray-700 mb-1">Nomor Induk Santri (NIS)</label>
                        <input type="text" name="nis" id="nis" required placeholder="Contoh: 0082741233" 
                            class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm">
                        @error('nis') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="nama" class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" required placeholder="Contoh: Ahmad Al-Ghifari" 
                            class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm">
                        @error('nama') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="kelas" class="block text-sm font-semibold text-gray-700 mb-1">Kelas</label>
                        <input type="text" name="kelas" id="kelas" placeholder="Contoh: 12-A Aliyah (Boleh dikosongkan)" 
                            class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm">
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <button type="reset" class="px-4 py-2 border rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            Reset Form
                        </button>
                        <button type="submit" class="px-5 py-2 rounded-lg text-sm font-medium text-white transition hover:bg-green-800" style="background-color: #046A4E;">
                            Simpan Data Santri
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>