<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPES - Absensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <main class="max-w-5xl mx-auto p-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-emerald-800">Data Absensi</h1>
                <p class="text-sm text-gray-500">Kelola presensi santri.</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('dashboard') }}" class="bg-white border px-4 py-2 rounded-lg text-sm font-semibold text-gray-700">Dashboard</a>
                <a href="{{ route('absen.create') }}" class="bg-emerald-700 hover:bg-emerald-800 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                    Tambah Absen
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-emerald-100 text-emerald-900 border border-emerald-200 rounded-lg p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-700 text-sm">
                        <th class="py-3 px-5">Nama</th>
                        <th class="py-3 px-5">Tanggal</th>
                        <th class="py-3 px-5">Status</th>
                        <th class="py-3 px-5 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                    @forelse($absens as $a)
                        <tr>
                            <td class="py-3 px-5 font-semibold text-emerald-800">{{ $a->nama_santri }}</td>
                            <td class="py-3 px-5">{{ date('d/m/Y', strtotime($a->tanggal)) }}</td>
                            <td class="py-3 px-5">{{ $a->status }}</td>
                            <td class="py-3 px-5 text-center">
                                <a href="{{ route('absen.edit', $a->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold mr-3">Edit</a>
                                <form method="POST" action="{{ route('absen.destroy', $a->id) }}" class="inline" onsubmit="return confirm('Hapus data absensi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:text-red-800 font-semibold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-8 px-5 text-center text-gray-400">Belum ada data absensi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
