<x-app-layout>

<div class="p-5">

<h1 class="text-3xl font-bold mb-5">
Edit Laporan
</h1>

<form action="/laporan/{{ $laporan->id }}"
method="POST">

@csrf
@method('PUT')

<input type="text"
name="judul"
value="{{ $laporan->judul }}"
class="border w-full p-2 rounded mb-3">

<input type="date"
name="tanggal"
value="{{ $laporan->tanggal }}"
class="border w-full p-2 rounded mb-3">

<textarea name="deskripsi"
class="border w-full p-2 rounded mb-3">{{ $laporan->deskripsi }}</textarea>

<button type="submit"
class="bg-yellow-500 text-white px-4 py-2 rounded">

Update

</button>

</form>

</div>

</x-app-layout>