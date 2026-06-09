<?php

namespace App\Http\Controllers;

use App\Models\ustadz;
use Illuminate\Http\Request;

class ustadzController extends Controller
{
    public function index()
    {
        $ustadz = ustadz::all();
        return view('ustadz.index', compact('ustadz'));
    }

    public function create()
    {
        return view('ustadz.create');
    }

    public function store(Request $request)
    {
        Ustadz::create($request->all());
        return redirect('/ustadz');
    }

    public function edit($id)
    {
        $ustadz = ustadz::find($id);
        return view('ustadz.edit', compact('ustadz'));
    }

    public function update(Request $request, $id)
    {
        $ustadz = ustadz::find($id);
        $ustadz->update($request->all());

        return redirect('/ustadz');
    }

    public function destroy($id)
    {
        $ustadz = ustadz::find($id);
        $ustadz->delete();

         return redirect('/ustadz');
    }
}