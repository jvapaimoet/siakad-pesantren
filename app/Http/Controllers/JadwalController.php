<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /**
     * Check if user can edit jadwal (only ustadz)
     */
    private function checkEditPermission()
    {
        if (Auth::user()->role !== 'ustadz') {
            abort(403, 'Hanya ustadz yang dapat melakukan perubahan jadwal.');
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = Jadwal::orderBy('hari')->orderBy('jam')->get();
        return view('jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkEditPermission();
        return view('jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->checkEditPermission();
        
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'hari' => 'required|string|max:50',
            'jam' => 'required|date_format:H:i',
        ]);

        Jadwal::create($validated);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('jadwal.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->checkEditPermission();
        
        $jadwal = Jadwal::findOrFail($id);
        return view('jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->checkEditPermission();
        
        $jadwal = Jadwal::findOrFail($id);

        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'hari' => 'required|string|max:50',
            'jam' => 'required|date_format:H:i',
        ]);

        $jadwal->update($validated);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->checkEditPermission();
        
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus');
    }
}
