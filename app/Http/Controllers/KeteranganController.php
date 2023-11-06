<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan; 
use App\Models\Keterangan;

class KeteranganController extends Controller
{
    public function index($keterangan)
    {
        $keterangans = Keterangan::all();

        return view('kendaraan.detail', [
            'keterangans' => $keterangans,
            'keterangan' => $keterangan
        ]);
    }

    public function create($keterangan)
    {
        return view('kendaraan.keterangan.create', [
            'keterangan' => $keterangan
        ]);
    }

    public function store(Request $request, $id)
    {
        $keterangan = new Keterangan();
        $keterangan->tanggal = $request->input('tanggal');
        $keterangan->keterangan = $request->input('keterangan');
        $keterangan->kilometer = $request->input('kilometer');
        $keterangan->total_harga = $request->input('total_harga');

        $keterangan->kendaraan_id = $id;

        $keterangan->save();

        return redirect()->route('kendaraan.detail', $id);
    }

    public function edit($id)
    {
        $keterangan = Keterangan::find($id);
        return view('kendaraan.keterangan.edit', compact('keterangan'));
    }

    // Metode untuk meng-update data setelah edit
    public function update(Request $request, $id)
    {
        $keterangan = Keterangan::find($id);
        $keterangan->tanggal = $request->input('tanggal');
        $keterangan->keterangan = $request->input('keterangan');
        $keterangan->kilometer = $request->input('kilometer');
        $keterangan->total_harga = $request->input('total_harga');
        $keterangan->save();

        return redirect()->route('kendaraan.detail'); // Ganti dengan rute yang sesuai
    }

    // Metode untuk menghapus data
    public function destroy($id)
    {
        $keterangan = Keterangan::find($id);

    if ($keterangan) {
        $keterangan->delete();
        return redirect()->route('kendaraan.detail');
    } else {
        return redirect()->route('kendaraan.detail')->with('error', 'Data tidak ditemukan');
    }
    }
}