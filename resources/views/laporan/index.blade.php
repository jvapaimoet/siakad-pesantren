<x-app-layout>

<div class="p-5">

<h1 class="text-3xl font-bold mb-5">
Data Laporan
</h1>

<a href="/laporan/create"
class="bg-blue-500 text-white px-4 py-2 rounded">

Tambah Laporan

</a>

<table class="table-auto w-full mt-5 border">

<thead class="bg-gray-200">

<tr>

<th class="border p-2">ID</th>
<th class="border p-2">Judul</th>
<th class="border p-2">Tanggal</th>
<th class="border p-2">Deskripsi</th>
<th class="border p-2">Aksi</th>

</tr>

</thead>

<tbody>

@foreach($laporan as $l)

<tr>

<td class="border p-2">{{ $l->id }}</td>
<td class="border p-2">{{ $l->judul }}</td>
<td class="border p-2">{{ $l->tanggal }}</td>
<td class="border p-2">{{ $l->deskripsi }}</td>

<td class="border p-2">

<a href="/laporan/{{ $l->id }}/edit"
class="bg-yellow-500 text-white px-3 py-1 rounded">

Edit

</a>

<form action="/laporan/{{ $l->id }}"
method="POST"
class="inline">

@csrf
@method('DELETE')

<button type="submit"
class="bg-red-500 text-white px-3 py-1 rounded">

Hapus

</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</x-app-layout>