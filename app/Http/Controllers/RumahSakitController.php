<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    public function index()
    {
        $data = RumahSakit::all();
        return view('rumah_sakit.index', compact('data'));
    }

    public function ajaxSearch(Request $request)
    {
        $search = $request->get('q');
        $data = RumahSakit::where('nama_rumah_sakit', 'like', "%$search%")
            ->select('id', 'nama_rumah_sakit as text') // Select2 expects 'text'
            ->limit(10)
            ->get();

        return response()->json($data);
    }

    public function create()
    {
        return view('rumah_sakit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_rumah_sakit' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
        ]);

        RumahSakit::create($request->all());
        return redirect()->route('rumah-sakit.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(RumahSakit $rumahSakit)
    {
        return view('rumah_sakit.edit', compact('rumahSakit'));
    }

    public function update(Request $request, RumahSakit $rumahSakit)
    {
        $request->validate([
            'nama_rumah_sakit' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
        ]);

        $rumahSakit->update($request->all());
        return redirect()->route('rumah-sakit.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(RumahSakit $rumahSakit)
    {
        $rumahSakit->delete();
        return redirect()->route('rumah-sakit.index')->with('success', 'Data berhasil dihapus');
    }
}
