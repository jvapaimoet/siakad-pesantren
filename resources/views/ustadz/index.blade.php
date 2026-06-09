<x-app-layout>

<div class="p-5">

<h1 class="text-3xl font-bold mb-5">
Data Ustadz
</h1>

<a href="/ustadz/create"
class="bg-blue-500 text-white px-4 py-2 rounded">

Tambah Ustadz

</a>

<table class="table-auto w-full mt-5 border">

<thead class="bg-gray-200">

<tr>

<th class="border p-2">ID</th>
<th class="border p-2">Nama</th>
<th class="border p-2">Bidang</th>
<th class="border p-2">No HP</th>
<th class="border p-2">Alamat</th>
<th class="border p-2">Aksi</th>

</tr>

</thead>

<tbody>

@foreach($ustadz as $u)

<tr>

<td class="border p-2">{{ $u->id }}</td>
<td class="border p-2">{{ $u->nama }}</td>
<td class="border p-2">{{ $u->bidang }}</td>
<td class="border p-2">{{ $u->no_hp }}</td>
<td class="border p-2">{{ $u->alamat }}</td>

<td class="border p-2">

<a href="/ustadz/{{ $u->id }}/edit"
class="bg-yellow-500 text-white px-3 py-1 rounded">

Edit

</a>

<form action="/ustadz/{{ $u->id }}"
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