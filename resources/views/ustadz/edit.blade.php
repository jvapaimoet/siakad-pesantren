<x-app-layout>

<div class="p-5">

<h1 class="text-3xl font-bold mb-5">
Edit Ustadz
</h1>

<form action="/ustadz/{{ $ustadz->id }}"
method="POST">

@csrf
@method('PUT')

<div class="mb-3">

<label>Nama</label>

<input type="text"
name="nama"
value="{{ $ustadz->nama }}"
class="border w-full p-2 rounded">

</div>

<div class="mb-3">

<label>Bidang</label>

<input type="text"
name="bidang"
value="{{ $ustadz->bidang }}"
class="border w-full p-2 rounded">

</div>

<div class="mb-3">

<label>No HP</label>

<input type="text"
name="no_hp"
value="{{ $ustadz->no_hp }}"
class="border w-full p-2 rounded">

</div>

<div class="mb-3">

<label>Alamat</label>

<textarea name="alamat"
class="border w-full p-2 rounded">{{ $ustadz->alamat }}</textarea>

</div>

<button type="submit"
class="bg-yellow-500 text-white px-4 py-2 rounded">

Update

</button>

</form>

</div>

</x-app-layout>