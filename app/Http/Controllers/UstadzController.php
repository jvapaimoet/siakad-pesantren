<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ustadz;

class UstadzController extends Controller
{
    /**
     * Menampilkan daftar ustadz
     */
    public function index()
    {
        $ustadzs = Ustadz::all();
        return view('ustadz.index', [
            'ustadzs' => $ustadzs
        ]);
    }

    /**
     * Menampilkan form tambah ustadz
     */
    public function create()
    {
        return view('ustadz.create');
    }

    /**
     * Menyimpan ustadz baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required',
            'bidang' => 'required',
            'no_hp'  => 'required',
            'alamat' => 'required', // Tambahkan validasi alamat
        ]);

        Ustadz::create([
            'nama'   => $request->nama,
            'no_hp'  => $request->no_hp,
            'bidang' => $request->bidang,
            'alamat' => $request->alamat, // Tambahkan alamat ke database
        ]);

        return redirect()->route('ustadz.index')->with('success', 'Data Ustadz berhasil ditambahkan!');
    }

    /**
     * Menampilkan form EDIT ustadz
     */
    public function edit(string $id)
    {
        $ustadz = Ustadz::findOrFail($id);
        return view('ustadz.edit', [
            'ustadz' => $ustadz
        ]);
    }

    /**
     * Memperbarui data ustadz di database
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'   => 'required',
            'bidang' => 'required',
            'no_hp'  => 'required',
            'alamat' => 'required',
        ]);

        $ustadz = Ustadz::findOrFail($id);
        $ustadz->update([
            'nama'   => $request->nama,
            'no_hp'  => $request->no_hp,
            'bidang' => $request->bidang,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('ustadz.index')->with('success', 'Data Ustadz berhasil diperbarui!');
    }

    /**
     * Menghapus data ustadz
     */
    public function destroy(string $id)
    {
        $ustadz = Ustadz::findOrFail($id);
        $ustadz->delete();

        return redirect()->route('ustadz.index')->with('success', 'Data Ustadz berhasil dihapus!');
    }
}