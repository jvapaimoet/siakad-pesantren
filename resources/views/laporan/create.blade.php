<x-app-layout>

<div class="p-5">

<h1 class="text-3xl font-bold mb-5">
Tambah Laporan
</h1>

<form action="/laporan" method="POST">

@csrf

<input type="text"
name="judul"
placeholder="Judul"
class="border w-full p-2 rounded mb-3">

<input type="date"
name="tanggal"
class="border w-full p-2 rounded mb-3">

<textarea name="deskripsi"
placeholder="Deskripsi"
class="border w-full p-2 rounded mb-3"></textarea>

<button type="submit"
class="bg-green-500 text-white px-4 py-2 rounded">

Simpan

</button>

</form>

</div>

</x-app-layout>