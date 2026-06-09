<h1 class="text-2xl font-bold mb-4">Edit Absen</h1>

<form method="POST" action="/absen/{{ $absen->id }}">
    @csrf
    @method('PUT')

    <input type="text" name="nama_santri"
           value="{{ $absen->nama_santri }}"
           class="border p-2 w-full mb-3">

    <input type="date" name="tanggal"
           value="{{ $absen->tanggal }}"
           class="border p-2 w-full mb-3">

    <select name="status" class="border p-2 w-full mb-3">
        <option {{ $absen->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
        <option {{ $absen->status == 'Izin' ? 'selected' : '' }}>Izin</option>
        <option {{ $absen->status == 'Sakit' ? 'selected' : '' }}>Sakit</option>
        <option {{ $absen->status == 'Alpha' ? 'selected' : '' }}>Alpha</option>
    </select>

    <button class="bg-blue-500 text-white px-4 py-2 rounded">
        Update
    </button>
</form>