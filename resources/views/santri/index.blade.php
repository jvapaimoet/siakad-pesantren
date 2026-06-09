<x-app-layout>

<div class="p-5">

    <h1 class="text-3xl mb-5">Data Santri</h1>

    <a href="/santri/create" class="bg-blue-500 text-white px-4 py-2 rounded">
        Tambah Santri
    </a>

    <table class="table-auto w-full mt-5 border">

        <tr>
            <th>ID</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>

        @foreach($santri as $s)

        <tr>
            <td>{{ $s->id }}</td>
            <td>{{ $s->nis }}</td>
            <td>{{ $s->nama }}</td>
            <td>{{ $s->kelas }}</td>

            <td>

                <a href="/santri/{{ $s->id }}/edit">
                    Edit
                </a>

                <form action="/santri/{{ $s->id }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Hapus
                    </button>

                </form>

            </td>
        </tr>

        @endforeach

    </table>

</div>

</x-app-layout>