<x-app-layout>

<div class="p-5">

<h1 class="text-3xl font-bold mb-5">
Tambah Ustadz
</h1>

<form action="/ustadz" method="POST">

@csrf

<div class="mb-3">
<label>Nama</label>

<input type="text"
name="nama"
class="border w-full p-2 rounded">
</div>

<div class="mb-3">
<label>Bidang</label>

<input type="text"
name="bidang"
class="border w-full p-2 rounded">
</div>

<div class="mb-3">
<label>No HP</label>

<input type="text"
name="no_hp"
class="border w-full p-2 rounded">
</div>

<div class="mb-3">
<label>Alamat</label>

<textarea name="alamat"
class="border w-full p-2 rounded"></textarea>
</div>

<button type="submit"
class="bg-green-500 text-white px-4 py-2 rounded">

Simpan

</button>

</form>

</div>

</x-app-layout>