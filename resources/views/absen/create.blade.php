<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPES - Tambah Absensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <main class="max-w-2xl mx-auto p-8">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-emerald-800">Tambah Absensi</h1>
                <p class="text-sm text-gray-500">Input presensi santri.</p>
            </div>
            <a href="{{ route('absen.index') }}" class="bg-white border px-4 py-2 rounded-lg text-sm font-semibold text-gray-700">Kembali</a>
        </div>

        <form method="POST" action="{{ route('absen.store') }}" class="bg-white rounded-xl shadow-sm border p-6 space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Santri</label>
                <input type="text" name="nama_santri" value="{{ old('nama_santri') }}" placeholder="Nama Santri" class="border rounded-lg p-2 w-full" required>
                @error('nama_santri') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal</label>
                <input type="date" name="tanggal" value="{{ old('tanggal', now()->toDateString()) }}" class="border rounded-lg p-2 w-full" required>
                @error('tanggal') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                <select name="status" class="border rounded-lg p-2 w-full" required>
                    <option value="Hadir" @selected(old('status') === 'Hadir')>Hadir</option>
                    <option value="Izin" @selected(old('status') === 'Izin')>Izin</option>
                    <option value="Sakit" @selected(old('status') === 'Sakit')>Sakit</option>
                    <option value="Alpha" @selected(old('status') === 'Alpha')>Alpha</option>
                </select>
                @error('status') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end pt-3 border-t">
                <button class="bg-emerald-700 hover:bg-emerald-800 text-white px-5 py-2 rounded-lg text-sm font-semibold">
                    Simpan
                </button>
            </div>
        </form>
    </main>
</body>
</html>
