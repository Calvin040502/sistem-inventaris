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
            'keterangan' => $keterangan,
        ]);
    }

    public function create($keterangan)
    {
        return view('kendaraan.keterangan.create', [
            'keterangan' => $keterangan,
        ]);
    }

    public function store(Request $request, $id)
    {
        $keterangan = new Keterangan();
        $keterangan->tanggal = $request->input('tanggal');
        $keterangan->keterangan = $request->input('keterangan');
        $keterangan->kilometer = $request->input('kilometer') ?: null;
        $keterangan->total_harga = $request->input('total_harga');

        $keterangan->kendaraan_id = $id;

        $keterangan->save();

        return redirect()->route('kendaraan.detail', ['kendaraan' => $id]);
    }

    public function edit($kendaraan, $keterangan)
    {
        $kendaraanModel = Kendaraan::findOrFail($kendaraan);
        $keteranganModel = Keterangan::findOrFail($keterangan);

        return view('kendaraan.keterangan.edit', [
            'kendaraan' => $kendaraanModel,
            'keterangan' => $keteranganModel,
        ]);
    }

    // Metode untuk meng-update data setelah edit
    public function update(Request $request, $id)
    {
        $keterangan = Keterangan::find($id);

        if (!$keterangan) {
            return redirect()
                ->route('kendaraan.detail')
                ->with('error', 'Data tidak ditemukan');
        }

        $keterangan->tanggal = $request->input('tanggal');
        $keterangan->keterangan = $request->input('keterangan');
        $keterangan->kilometer = $request->input('kilometer') ?: null;
        $keterangan->total_harga = $request->input('total_harga');
        $keterangan->save();

        return redirect()->route('kendaraan.detail', ['kendaraan' => $keterangan->kendaraan->id]);
    }

    // Metode untuk menghapus data
    public function destroy($kendaraanId, $keteranganId)
    {
        try {
            // Temukan kendaraan berdasarkan ID
            $kendaraan = Kendaraan::findOrFail($kendaraanId);
    
            // Temukan keterangan berdasarkan ID dan kendaraan_id yang sesuai
            $keterangan = Keterangan::where('kendaraan_id', $kendaraanId)
                ->findOrFail($keteranganId);
    
            // Hapus keterangan
            $keterangan->delete();
    
            // Alternatif: Hapus keterangan dengan menggunakan relasi pada model Kendaraan
            // $kendaraan->keterangans()->where('id', $keteranganId)->delete();
    
            return redirect()->route('kendaraan.detail', ['kendaraan' => $kendaraanId])
        ->with('success', 'Data keterangan berhasil dihapus');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return redirect()->route('kendaraan.detail')
                ->with('error', 'Gagal menghapus data keterangan');
        }
    }
}
