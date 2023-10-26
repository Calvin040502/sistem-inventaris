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

        return view('kendaraan.keterangan.index', [
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

        return redirect()->route('kendaraan.keterangan.index', $id);
    }
}