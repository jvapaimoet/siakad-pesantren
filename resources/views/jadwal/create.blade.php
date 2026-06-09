<x-app-layout>

<div class="p-5">

<h1 class="text-3xl font-bold mb-5">
Tambah Jadwal
</h1>

<form action="/jadwal" method="POST">

@csrf

<input type="text"
name="nama_kegiatan"
placeholder="Nama Kegiatan"
class="border w-full p-2 rounded mb-3">

<input type="text"
name="tempat"
placeholder="Tempat"
class="border w-full p-2 rounded mb-3">

<input type="time"
name="waktu"
class="border w-full p-2 rounded mb-3">

<input type="text"
name="penanggung_jawab"
placeholder="Penanggung Jawab"
class="border w-full p-2 rounded mb-3">

<button type="submit"
class="bg-green-500 text-white px-4 py-2 rounded">

Simpan

</button>

</form>

</div>

</x-app-layout>