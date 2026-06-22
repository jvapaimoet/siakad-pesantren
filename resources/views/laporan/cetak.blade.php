<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul }} - SIPES</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; }
        }
    </style>
</head>
<body class="bg-gray-100 font-sans text-gray-900">
    <main class="max-w-5xl mx-auto bg-white min-h-screen p-8">
        <div class="no-print mb-6 flex justify-between items-center">
            <a href="{{ route('laporan.index') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-900">
                Kembali ke Laporan
            </a>
            <button onclick="window.print()" class="bg-emerald-700 hover:bg-emerald-800 text-white px-5 py-2 rounded-lg text-sm font-semibold">
                Cetak
            </button>
        </div>

        <header class="text-center border-b border-gray-300 pb-5 mb-6">
            <h1 class="text-2xl font-bold uppercase">Pondok Pesantren Daarul Huffaazh Jambi</h1>
            <p class="text-sm text-gray-600 mt-1">Sistem Informasi Pesantren</p>
            <h2 class="text-xl font-bold mt-5">{{ $judul }}</h2>
            <p class="text-sm text-gray-500">Tanggal Cetak: {{ now()->format('d/m/Y H:i') }}</p>
        </header>

        <table class="w-full border border-gray-300 text-sm">
            <thead>
                @if($jenis === 'santri')
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-3 py-2 text-center w-12">No</th>
                        <th class="border border-gray-300 px-3 py-2 text-left">Nama</th>
                        <th class="border border-gray-300 px-3 py-2 text-left">Jenis Kelamin</th>
                        <th class="border border-gray-300 px-3 py-2 text-left">Kelas/Kamar</th>
                    </tr>
                @elseif($jenis === 'ustadz')
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-3 py-2 text-center w-12">No</th>
                        <th class="border border-gray-300 px-3 py-2 text-left">Nama</th>
                        <th class="border border-gray-300 px-3 py-2 text-left">Bidang</th>
                        <th class="border border-gray-300 px-3 py-2 text-left">No. HP</th>
                        <th class="border border-gray-300 px-3 py-2 text-left">Alamat</th>
                    </tr>
                @elseif($jenis === 'absen')
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-3 py-2 text-center w-12">No</th>
                        <th class="border border-gray-300 px-3 py-2 text-left">Nama Santri</th>
                        <th class="border border-gray-300 px-3 py-2 text-left">Tanggal</th>
                        <th class="border border-gray-300 px-3 py-2 text-left">Status</th>
                    </tr>
                @else
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-3 py-2 text-center w-12">No</th>
                        <th class="border border-gray-300 px-3 py-2 text-left">Tanggal</th>
                        <th class="border border-gray-300 px-3 py-2 text-left">Kategori</th>
                        <th class="border border-gray-300 px-3 py-2 text-left">Tipe</th>
                        <th class="border border-gray-300 px-3 py-2 text-right">Nominal</th>
                        <th class="border border-gray-300 px-3 py-2 text-left">Deskripsi</th>
                    </tr>
                @endif
            </thead>
            <tbody>
                @forelse($data as $item)
                    @if($jenis === 'santri')
                        <tr>
                            <td class="border border-gray-300 px-3 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-3 py-2">{{ $item->nama }}</td>
                            <td class="border border-gray-300 px-3 py-2">{{ $item->jenis_kelamin ?? '-' }}</td>
                            <td class="border border-gray-300 px-3 py-2">{{ $item->kelas ?? '-' }}</td>
                        </tr>
                    @elseif($jenis === 'ustadz')
                        <tr>
                            <td class="border border-gray-300 px-3 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-3 py-2">{{ $item->nama }}</td>
                            <td class="border border-gray-300 px-3 py-2">{{ $item->bidang ?? '-' }}</td>
                            <td class="border border-gray-300 px-3 py-2">{{ $item->no_hp ?? '-' }}</td>
                            <td class="border border-gray-300 px-3 py-2">{{ $item->alamat ?? '-' }}</td>
                        </tr>
                    @elseif($jenis === 'absen')
                        <tr>
                            <td class="border border-gray-300 px-3 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-3 py-2">{{ $item->nama_santri ?? '-' }}</td>
                            <td class="border border-gray-300 px-3 py-2">{{ $item->tanggal ? date('d/m/Y', strtotime($item->tanggal)) : '-' }}</td>
                            <td class="border border-gray-300 px-3 py-2">{{ $item->status ?? '-' }}</td>
                        </tr>
                    @else
                        <tr>
                            <td class="border border-gray-300 px-3 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-3 py-2">{{ optional($item->tanggal)->format('d/m/Y') ?? '-' }}</td>
                            <td class="border border-gray-300 px-3 py-2">{{ $item->kategori ?? '-' }}</td>
                            <td class="border border-gray-300 px-3 py-2 capitalize">{{ $item->tipe_transaksi ?? '-' }}</td>
                            <td class="border border-gray-300 px-3 py-2 text-right">Rp {{ number_format($item->nominal ?? 0, 0, ',', '.') }}</td>
                            <td class="border border-gray-300 px-3 py-2">{{ $item->deskripsi ?? '-' }}</td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td colspan="{{ $jenis === 'keuangan' ? 6 : 5 }}" class="border border-gray-300 px-3 py-8 text-center text-gray-500">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($jenis === 'keuangan')
            @php
                $totalPemasukan = $data->where('tipe_transaksi', 'pemasukan')->sum('nominal');
                $totalPengeluaran = $data->where('tipe_transaksi', 'pengeluaran')->sum('nominal');
                $saldo = $totalPemasukan - $totalPengeluaran;
            @endphp
            <div class="mt-6 flex justify-end">
                <table class="w-full max-w-sm border border-gray-300 text-sm">
                    <tr>
                        <td class="border border-gray-300 px-3 py-2 font-semibold">Total Pemasukan</td>
                        <td class="border border-gray-300 px-3 py-2 text-right">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-3 py-2 font-semibold">Total Pengeluaran</td>
                        <td class="border border-gray-300 px-3 py-2 text-right">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="border border-gray-300 px-3 py-2 font-bold">Saldo</td>
                        <td class="border border-gray-300 px-3 py-2 text-right font-bold">Rp {{ number_format($saldo, 0, ',', '.') }}</td>
                    </tr>
                </table>
            </div>
        @endif
    </main>
</body>
</html>
