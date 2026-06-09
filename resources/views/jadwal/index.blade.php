<x-app-layout>

<div class="p-5">

<h1 class="text-3xl font-bold mb-5">
Data Jadwal
</h1>

<a href="/jadwal/create"
class="bg-blue-500 text-white px-4 py-2 rounded">

Tambah Jadwal

</a>

<table class="table-auto w-full mt-5 border">

<thead class="bg-gray-200">

<tr>

<th class="border p-2">ID</th>
<th class="border p-2">Nama Kegiatan</th>
<th class="border p-2">Tempat</th>
<th class="border p-2">Waktu</th>
<th class="border p-2">Penanggung Jawab</th>
<th class="border p-2">Aksi</th>

</tr>

</thead>

<tbody>

@foreach($jadwal as $j)

<tr>

<td class="border p-2">{{ $j->id }}</td>
<td class="border p-2">{{ $j->nama_kegiatan }}</td>
<td class="border p-2">{{ $j->tempat }}</td>
<td class="border p-2">{{ $j->waktu }}</td>
<td class="border p-2">{{ $j->penanggung_jawab }}</td>

<td class="border p-2">

<a href="/jadwal/{{ $j->id }}/edit"
class="bg-yellow-500 text-white px-3 py-1 rounded">

Edit

</a>

<form action="/jadwal/{{ $j->id }}"
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