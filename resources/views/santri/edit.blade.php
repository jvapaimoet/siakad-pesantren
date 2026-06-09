<x-app-layout>

<div class="p-5">

<h1 class="text-2xl mb-5">
Edit Santri
</h1>

<form action="/santri/{{ $santri->id }}" method="POST">

@csrf
@method('PUT')

<input type="text" name="nis" value="{{ $santri->nis }}" class="border w-full mb-3">

<input type="text" name="nama" value="{{ $santri->nama }}" class="border w-full mb-3">

<input type="text" name="jenis_kelamin" value="{{ $santri->jenis_kelamin }}" class="border w-full mb-3">

<input type="text" name="kelas" value="{{ $santri->kelas }}" class="border w-full mb-3">

<textarea name="alamat" class="border w-full mb-3">{{ $santri->alamat }}</textarea>

<input type="date" name="tanggal_daftar" value="{{ $santri->tanggal_daftar }}" class="border w-full mb-3">

<button class="bg-yellow-500 text-white px-4 py-2 rounded">
Update
</button>

</form>

</div>

</x-app-layout>