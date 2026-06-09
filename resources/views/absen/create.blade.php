<h1 class="text-2xl font-bold mb-4">Tambah Absen</h1>

<form method="POST" action="/absen">
    @csrf

    <input type="text" name="nama_santri" placeholder="Nama Santri"
           class="border p-2 w-full mb-3">

    <input type="date" name="tanggal"
           class="border p-2 w-full mb-3">

    <select name="status" class="border p-2 w-full mb-3">
        <option>Hadir</option>
        <option>Izin</option>
        <option>Sakit</option>
        <option>Alpha</option>
    </select>

    <button class="bg-green-500 text-white px-4 py-2 rounded">
        Simpan
    </button>
</form>