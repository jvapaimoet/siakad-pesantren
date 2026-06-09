<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    // Tampilkan semua data santri
    public function index()
    {
        $santri = Santri::latest()->get();
        return view('santri.index', compact('santri'));
    }

    // Form tambah santri
    public function create()
    {
        return view('santri.create');
    }

    // Simpan data
    public function store(Request $request)
    {
        $request->validate([
            'nis'   => 'required|unique:santris,nis',
            'nama'  => 'required',
            'kelas' => 'required',
        ]);

        Santri::create([
            'nis'   => $request->nis,
            'nama'  => $request->nama,
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('santri.index')
            ->with('success', 'Data santri berhasil ditambahkan');
    }

    // Detail (optional)
    public function show($id)
    {
        $santri = Santri::findOrFail($id);
        return view('santri.show', compact('santri'));
    }

    // Edit form
    public function edit($id)
    {
        $santri = Santri::findOrFail($id);
        return view('santri.edit', compact('santri'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis'   => 'required',
            'nama'  => 'required',
            'kelas' => 'required',
        ]);

        $santri = Santri::findOrFail($id);
        $santri->update($request->all());

        return redirect()->route('santri.index')
            ->with('success', 'Data berhasil diupdate');
    }

    // Hapus data
    public function destroy($id)
    {
        Santri::destroy($id);

        return redirect()->route('santri.index')
            ->with('success', 'Data berhasil dihapus');
    }
}