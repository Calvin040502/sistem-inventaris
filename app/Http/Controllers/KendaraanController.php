<?php

namespace App\Http\Controllers;

use App\Exports\ExportKendaraan;
use App\Models\Kendaraan;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KendaraanController extends Controller
{
    protected $kendaraans;

    public function __construct()
    {
        $this->kendaraans = Kendaraan::all();
    }

    public function index(Request $request)
{
    $search = $request->input('search');

    // Filter Kendaraan berdasarkan pencarian
    $kendaraans = Kendaraan::where(function ($query) use ($search) {
        $query
            ->where('kode', 'LIKE', '%' . $search . '%')
            ->orWhere('jenis_kendaraan', 'LIKE', '%' . $search . '%')
            ->orWhere('merek', 'LIKE', '%' . $search . '%')
            ->orWhere('tahun_perolehan', 'LIKE', '%' . $search . '%') 
            ->orWhere('harga_perolehan', 'LIKE', '%' . $search . '%')
            ->orWhere('masa_guna', 'LIKE', '%' . $search . '%') 
            ->orWhere('lama_pakai', 'LIKE', '%' . $search . '%')
            ->orWhere('kondisi', 'LIKE', '%' . $search . '%')
            ->orWhere('lokasi', 'LIKE', '%' . $search . '%')
            ->orWhere('pengguna', 'LIKE', '%' . $search . '%')
            ->orWhere('masa_pajak', 'LIKE', '%' . $search . '%');
    })->get();

    if ($kendaraans->isEmpty()) {
        session()->flash('error', 'Aset tidak ditemukan');
        return view('kendaraan.index', ['kendaraans' => $kendaraans]);
    }

    return view('kendaraan.index', ['kendaraans' => $kendaraans]);
}

public function create()
{
    // $this->authorize('super admin');
    $lastSerialNumber = Kendaraan::latest('kode')->first();

    if ($lastSerialNumber) {
        $lastNumber = (int) substr($lastSerialNumber->kode, 5); // Ubah 3 menjadi 5
        $nextNumber = $lastNumber + 1;
    } else {
        $nextNumber = 1;
    }

    $serialNumber = 'KDRN-' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

    return view('kendaraan.create', compact('serialNumber'));
}

public function store(Request $request)
{
    try {
        $lastSerialNumber = Kendaraan::latest('kode')->first();

        if ($lastSerialNumber) {
            $lastNumber = (int) substr($lastSerialNumber->kode, 5); // Ubah 3 menjadi 5
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        $serialNumber = 'KDRN-' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

        $validatedData = $request->validate([
            'jenis_kendaraan' => 'required',
            'merek' => 'required',
            'tahun_perolehan' => 'required',
            'harga_perolehan' => 'required',
            'masa_guna' => 'required',
            'lama_pakai' => 'required',
            'kondisi' => 'required',
            'lokasi' => 'required',
            'pengguna' => 'required',
            'masa_pajak' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['kode'] = $serialNumber;

        Kendaraan::create($validatedData);

        return redirect('/kendaraan');
    } catch (Exception $e) {
        session()->flash('error', $e->getMessage());

        return back();
    }
}


    public function detail($id)
    {
        $kendaraan = $this->kendaraans->find($id);

        if (!$kendaraan) {
            session()->flash('error', 'Aset tidak ditemukan');

            return redirect('/kendaraan');
        }

        return view('kendaraan.detail', compact('kendaraan'));
    }
    
    public function print($id)
    {
        $kendaraan = $this->kendaraans->find($id);

        if (!$kendaraan) {
            session()->flash('error', 'Aset tidak ditemukan');

            return redirect('/kendaraan');
        }

        return view('kendaraan.cetak', compact('kendaraan'));
    }

    public function edit(Kendaraan $kendaraan)
    {
        return view('kendaraan.edit', compact('kendaraan'));
    }

    public function update(Request $request, Kendaraan $kendaraan)
    {
        try {
            $rules = [
                'jenis_kendaraan' => 'required',
                'merek' => 'required',
                'tahun_perolehan' => 'required',
                'harga_perolehan' => 'required',
                'masa_guna' => 'required',
                'lama_pakai' => 'required',
                'kondisi' => 'required',
                'lokasi' => 'required',
                'pengguna' => 'required',
                'masa_pajak' => 'required',
            ];

            
            $validatedData = $request->validate($rules);

            // Update data kwitansi
            $kendaraan->update($validatedData);

            return redirect('/kendaraan')->with('success', 'Aset berhasil diperbarui');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());

            return back();
        }
    }

    public function destroy(Kendaraan $kendaraan)
    {
        Kendaraan::destroy($kendaraan->id);

        return redirect('/kendaraan');
    }

    function export_excel()
    {
        return Excel::Download(new ExportKendaraan(), 'Kendaraan.xlsx');
    }
}
