<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::all();

        return view('laporan.index', compact('laporan'));
    }

    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        Laporan::create($request->all());

        return redirect('/laporan');
    }

    public function edit($id)
    {
        $laporan = Laporan::find($id);

        return view('laporan.edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $laporan = Laporan::find($id);

        $laporan->update($request->all());

        return redirect('/laporan');
    }

    public function destroy($id)
    {
        $laporan = Laporan::find($id);

        $laporan->delete();

        return redirect('/laporan');
    }
}