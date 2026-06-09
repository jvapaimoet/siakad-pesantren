<x-app-layout>

<div class="p-5">

<h1 class="text-3xl font-bold mb-5">
Edit Jadwal
</h1>

<form action="/jadwal/{{ $jadwal->id }}"
method="POST">

@csrf
@method('PUT')

<input type="text"
name="nama_kegiatan"
value="{{ $jadwal->nama_kegiatan }}"
class="border w-full p-2 rounded mb-3">

<input type="text"
name="tempat"
value="{{ $jadwal->tempat }}"
class="border w-full p-2 rounded mb-3">

<input type="time"
name="waktu"
value="{{ $jadwal->waktu }}"
class="border w-full p-2 rounded mb-3">

<input type="text"
name="penanggung_jawab"
value="{{ $jadwal->penanggung_jawab }}"
class="border w-full p-2 rounded mb-3">

<button type="submit"
class="bg-yellow-500 text-white px-4 py-2 rounded">

Update

</button>

</form>

</div>

</x-app-layout>