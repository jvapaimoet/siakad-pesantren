<h1 class="text-2xl font-bold mb-4">Data Absen</h1>

<a href="/absen/create" class="bg-green-500 text-white px-4 py-2 rounded">
    + Tambah Absen
</a>

<table class="w-full mt-4 bg-white shadow">
    <tr class="bg-gray-200">
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($absen as $a)
    <tr>
        <td>{{ $a->nama_santri }}</td>
        <td>{{ $a->tanggal }}</td>
        <td>{{ $a->status }}</td>
        <td>
            <form method="POST" action="/absen/{{ $a->id }}">
                @csrf
                @method('DELETE')
                <button class="text-red-500">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>