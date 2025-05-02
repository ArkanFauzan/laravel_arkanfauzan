<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::with('rumahSakit')->get();
        $rumahSakits = RumahSakit::all();
        return view('pasien.index', compact('pasiens', 'rumahSakits'));
    }

    public function create()
    {
        $rumahSakits = RumahSakit::all();
        return view('pasien.create', compact('rumahSakits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'rumah_sakit_id' => 'required|exists:rumah_sakits,id'
        ]);

        Pasien::create($request->all());
        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil ditambahkan');
    }

    public function edit(Pasien $pasien)
    {
        $rumahSakits = RumahSakit::all();
        return view('pasien.edit', compact('pasien', 'rumahSakits'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'rumah_sakit_id' => 'required|exists:rumah_sakits,id'
        ]);

        $pasien->update($request->all());
        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil diupdate');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return response()->json(['success' => true]);
    }

    public function filter($rumah_sakit_id)
    {
        $data = Pasien::with('rumahSakit')->where('rumah_sakit_id', $rumah_sakit_id)->get();
        return response()->json($data);
    }
}
