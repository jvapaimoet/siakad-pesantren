<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Absen;
use App\Models\Laporan;
use App\Models\Santri;
use App\Models\Ustadz;

class LaporanController extends Controller
{
    private array $jenisLaporan = ['santri', 'ustadz', 'absen'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporans = Laporan::whereIn('jenis_laporan', $this->jenisLaporan)->latest()->get();
        return view('laporan.index', compact('laporans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'jenis_laporan' => ['required', 'in:'.implode(',', $this->jenisLaporan)],
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
        ]);

        $validated['tanggal'] ??= now()->toDateString();

        $laporan = Laporan::create($validated);

        return redirect()
            ->route('laporan.cetak', $laporan->jenis_laporan)
            ->with('success', 'Laporan berhasil ditambahkan dan siap dicetak!');
    }

    public function cetak(string $jenis): View
    {
        abort_unless(in_array($jenis, $this->jenisLaporan, true), 404);

        $data = match ($jenis) {
            'santri' => Santri::orderBy('nama')->get(),
            'ustadz' => Ustadz::orderBy('nama')->get(),
            'absen' => Absen::orderByDesc('tanggal')->get(),
        };

        $judul = match ($jenis) {
            'santri' => 'Laporan Data Santri Keseluruhan',
            'ustadz' => 'Laporan Data Ustadz/Ustadzah',
            'absen' => 'Laporan Presensi Santri',
        };

        return view('laporan.cetak', compact('jenis', 'judul', 'data'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('laporan.show', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('laporan.edit', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $laporan = Laporan::findOrFail($id);

        $validated = $request->validate([
            'jenis_laporan' => ['required', 'in:'.implode(',', $this->jenisLaporan)],
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
        ]);

        $validated['tanggal'] ??= now()->toDateString();

        $laporan->update($validated);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus!');
    }

}
