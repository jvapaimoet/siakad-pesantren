<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri; // Memanggil model Santri

class SantriController extends Controller
{
    /**
     * Menampilkan daftar semua santri (Halaman Utama Santri)
     */
    public function index()
    {
        $santris = Santri::all();
        return view('santri.index', compact('santris'));
    }

    /**
     * Menampilkan formulir tambah santri (create.blade.php)
     */
    public function create()
    {
        return view('santri.create');
    }

    /**
     * Menyimpan data santri baru ke dalam database (Proses dari Form Create)
     */
    public function store(Request $request)
    {
        // 1. Validasi input dari form
        $request->validate([
            'nama'          => 'required',
            'jenis_kelamin' => 'required',
        ]);

        // 2. Menyimpan data HANYA ke kolom yang ada di database Anda
        Santri::create([
            'nama'          => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas'         => $request->kelas, 
        ]);

        // 3. Kembali ke halaman utama santri dengan notifikasi sukses
        return redirect()->route('santri.index')->with('success', 'Data Santri baru berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail informasi satu santri (Opsional)
     */
    public function show(string $id)
    {
        $santri = Santri::findOrFail($id);
        return view('santri.show', compact('santri'));
    }

    /**
     * Menampilkan formulir edit data santri (edit.blade.php)
     */
    public function edit(string $id)
    {
        $santri = Santri::findOrFail($id);
        return view('santri.edit', compact('santri'));
    }

    /**
     * Memperbarui data santri di database (Proses dari Form Edit)
     */
    public function update(Request $request, string $id)
    {
        // 1. Validasi data yang diubah
        $request->validate([
            'nama'          => 'required',
            'jenis_kelamin' => 'required',
        ]);

        // 2. Cari data santri berdasarkan ID
        $santri = Santri::findOrFail($id);
        
        // 3. Lakukan pembaruan data secara aman tanpa kolom 'nis'
        $santri->update([
            'nama'          => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas'         => $request->kelas,
        ]);

        // 4. Kembali ke halaman utama santri dengan notifikasi sukses
        return redirect()->route('santri.index')->with('success', 'Data Santri berhasil diperbarui!');
    }

    /**
     * Menghapus data santri dari database
     */
    public function destroy(string $id)
    {
        $santri = Santri::findOrFail($id);
        $santri->delete();

        return redirect()->route('santri.index')->with('success', 'Data Santri berhasil dihapus!');
    }
}