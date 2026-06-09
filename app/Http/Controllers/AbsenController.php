<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $absen = Absen::latest()->get();
        return view('absen.index', compact('absen'));
    }

    public function create()
    {
        return view('absen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_santri' => 'required',
            'tanggal' => 'required',
            'status' => 'required'
        ]);

        Absen::create($request->all());

        return redirect()->route('absen.index')->with('success', 'Absen berhasil ditambahkan');
    }

    public function edit($id)
    {
        $absen = Absen::findOrFail($id);
        return view('absen.edit', compact('absen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_santri' => 'required',
            'tanggal' => 'required',
            'status' => 'required'
        ]);

        $absen = Absen::findOrFail($id);
        $absen->update($request->all());

        return redirect()->route('absen.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Absen::destroy($id);
        return redirect()->route('absen.index')->with('success', 'Data dihapus');
    }
}
