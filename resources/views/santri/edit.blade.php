<x-app-layout>

<div class="p-5">

    <h1 class="text-2xl mb-5 font-bold text-gray-800">
        Edit Santri
    </h1>

    <form action="/santri/{{ $santri->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ old('nama', $santri->nama) }}" class="border w-full p-2 rounded bg-gray-50 focus:ring-green-500 focus:border-green-500" required>
        </div>

        <div class="mb-3">
            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="border w-full p-2 rounded bg-gray-50 focus:ring-green-500 focus:border-green-500" required>
                <option value="Laki-laki" {{ $santri->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $santri->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="block text-sm font-medium text-gray-700 mb-1">Kelas / Kamar</label>
            <input type="text" name="kelas" value="{{ old('kelas', $santri->kelas) }}" class="border w-full p-2 rounded bg-gray-50 focus:ring-green-500 focus:border-green-500">
        </div>

        <div class="flex gap-2 mt-5">
            <a href="{{ route('santri.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                Batal
            </a>
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition font-medium">
                Update Data
            </button>
        </div>

    </form>

</div>

</x-app-layout>