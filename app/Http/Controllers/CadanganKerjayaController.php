<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CadanganKerjaya;

class CadanganKerjayaController extends Controller
{
    public function index()
    {
        $cadanganKerjaya = CadanganKerjaya::all();
        return view('admin.cadanganKerjaya.index', compact('cadanganKerjaya'));
    }

    public function create()
    {
        return view('admin.cadanganKerjaya.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jawatan' => 'required|string|max:255',
            'telefon' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        CadanganKerjaya::create($request->all());
        return redirect()->route('admin.cadanganKerjaya.index')->with('success', 'Cadangan kerjaya berjaya ditambah!');
    }

    public function destroy($id)
    {
        $cadanganKerjaya = CadanganKerjaya::findOrFail($id);
        $cadanganKerjaya->delete();

        return redirect()->route('admin.cadanganKerjaya.index')->with('success', 'Data berjaya dipadam!');
    }
}

