<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();

        return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        return view('jadwal.create');
    }

    public function store(Request $request)
    {
        Jadwal::create($request->all());

        return redirect('/jadwal');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::find($id);

        return view('jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::find($id);

        $jadwal->update($request->all());

        return redirect('/jadwal');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::find($id);

        $jadwal->delete();

        return redirect('/jadwal');
    }
}