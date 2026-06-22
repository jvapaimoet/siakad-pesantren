<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KeuanganController extends Controller
{
    public function index(): View
    {
        $transaksis = Laporan::where('jenis_laporan', 'keuangan')
            ->orderByDesc('tanggal')
            ->orderByDesc('id')
            ->get();

        $totalPemasukan = $transaksis->where('tipe_transaksi', 'pemasukan')->sum('nominal');
        $totalPengeluaran = $transaksis->where('tipe_transaksi', 'pengeluaran')->sum('nominal');
        $saldo = $totalPemasukan - $totalPengeluaran;

        return view('keuangan.index', compact(
            'transaksis',
            'totalPemasukan',
            'totalPengeluaran',
            'saldo'
        ));
    }

    public function create(): View
    {
        return view('keuangan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required|string|max:100',
            'tipe_transaksi' => 'required|in:pemasukan,pengeluaran',
            'nominal' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
        ]);

        Laporan::create($validated + ['jenis_laporan' => 'keuangan']);

        return redirect()->route('keuangan.index')->with('success', 'Data keuangan berhasil ditambahkan!');
    }

    public function destroy(string $id): RedirectResponse
    {
        $transaksi = Laporan::where('jenis_laporan', 'keuangan')->findOrFail($id);
        $transaksi->delete();

        return redirect()->route('keuangan.index')->with('success', 'Data keuangan berhasil dihapus!');
    }

    public function cetak(): View
    {
        $data = Laporan::where('jenis_laporan', 'keuangan')
            ->orderByDesc('tanggal')
            ->orderByDesc('id')
            ->get();

        $judul = 'Laporan Keuangan Pesantren';

        return view('keuangan.cetak', compact('data', 'judul'));
    }
}
