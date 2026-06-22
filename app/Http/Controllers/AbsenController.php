<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absens = Absen::latest('tanggal')->get();
        return view('absen.index', compact('absens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('absen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_santri' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'status' => 'required|in:Hadir,Izin,Sakit,Alpha',
        ]);

        Absen::create($validated);

        return redirect()->route('absen.index')->with('success', 'Absensi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $absen = Absen::findOrFail($id);
        return view('absen.show', compact('absen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $absen = Absen::findOrFail($id);
        return view('absen.edit', compact('absen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $absen = Absen::findOrFail($id);

        $validated = $request->validate([
            'nama_santri' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'status' => 'required|in:Hadir,Izin,Sakit,Alpha',
        ]);

        $absen->update($validated);

        return redirect()->route('absen.index')->with('success', 'Absensi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $absen = Absen::findOrFail($id);
        $absen->delete();

        return redirect()->route('absen.index')->with('success', 'Absensi berhasil dihapus!');
    }
}
