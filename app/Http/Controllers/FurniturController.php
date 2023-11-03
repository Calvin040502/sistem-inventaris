<?php

namespace App\Http\Controllers;

use App\Exports\ExportFurnitur;
use App\Models\Furnitur;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FurniturController extends Controller
{
    protected $furniturs;

    public function __construct()
    {
        $this->furniturs = Furnitur::all();
    }

    public function index(Request $request)
{
    $search = $request->input('search');

    // Filter Furnitur berdasarkan pencarian
    $furniturs = Furnitur::latest()->where(function ($query) use ($search) {
        $query
            ->where('kode', 'LIKE', '%' . $search . '%')
            ->orWhere('jenis_furniture', 'LIKE', '%' . $search . '%')
            ->orWhere('merek', 'LIKE', '%' . $search . '%')
            ->orWhere('tahun_perolehan', 'LIKE', '%' . $search . '%') 
            ->orWhere('harga_perolehan', 'LIKE', '%' . $search . '%')
            ->orWhere('masa_guna', 'LIKE', '%' . $search . '%') 
            ->orWhere('lama_pakai', 'LIKE', '%' . $search . '%')
            ->orWhere('kondisi', 'LIKE', '%' . $search . '%')
            ->orWhere('lokasi', 'LIKE', '%' . $search . '%')
            ->orWhere('pengguna', 'LIKE', '%' . $search . '%');
    })->get();

    if ($furniturs->isEmpty()) {
        session()->flash('error', 'Aset tidak ditemukan');
        return view('furnitur.index', ['furniturs' => $furniturs]);
    }

    return view('furnitur.index', ['furniturs' => $furniturs]);
}

public function create()
{
    // $this->authorize('super admin');
    $lastSerialNumber = Furnitur::latest('kode')->first();

    if ($lastSerialNumber) {
        $lastNumber = (int) substr($lastSerialNumber->kode, 5); // Ubah 3 menjadi 5
        $nextNumber = $lastNumber + 1;
    } else {
        $nextNumber = 1;
    }

    $serialNumber = 'FRTR-' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

    return view('furnitur.create', compact('serialNumber'));
}

public function store(Request $request)
{
    try {
        $lastSerialNumber = Furnitur::latest('kode')->first();

        if ($lastSerialNumber) {
            $lastNumber = (int) substr($lastSerialNumber->kode, 5); // Ubah 3 menjadi 5
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        $serialNumber = 'FRTR-' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

        $validatedData = $request->validate([
            'jenis_furniture' => 'required',
            'merek' => 'required',
            'tahun_perolehan' => 'required',
            'harga_perolehan' => 'required',
            'masa_guna' => 'required',
            'lama_pakai' => 'required',
            'kondisi' => 'required',
            'lokasi' => 'required',
            'pengguna' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['kode'] = $serialNumber;

        Furnitur::create($validatedData);

        return redirect('/furnitur');
    } catch (Exception $e) {
        session()->flash('error', $e->getMessage());

        return back();
    }
}


    public function detail($id)
    {
        $furnitur = $this->furniturs->find($id);

        if (!$furnitur) {
            session()->flash('error', 'Aset tidak ditemukan');

            return redirect('/furnitur');
        }

        return view('furnitur.detail', compact('furnitur'));
    }
    public function print($id)
    {
        $furnitur = $this->furniturs->find($id);

        if (!$furnitur) {
            session()->flash('error', 'Aset tidak ditemukan');

            return redirect('/furnitur');
        }

        return view('furnitur.cetak', compact('furnitur'));
    }

    public function edit(Furnitur $furnitur)
    {
        return view('furnitur.edit', compact('furnitur'));
    }

    public function update(Request $request, Furnitur $furnitur)
    {
        try {
            $rules = [
                'jenis_furniture' => 'required',
                'merek' => 'required',
                'tahun_perolehan' => 'required',
                'harga_perolehan' => 'required',
                'masa_guna' => 'required',
                'lama_pakai' => 'required',
                'kondisi' => 'required',
                'lokasi' => 'required',
                'pengguna' => 'required',
            ];

            
            $validatedData = $request->validate($rules);

            // Update data kwitansi
            $furnitur->update($validatedData);

            return redirect('/furnitur')->with('success', 'Aset berhasil diperbarui');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());

            return back();
        }
    }

    public function destroy(Furnitur $furnitur)
    {
        Furnitur::destroy($furnitur->id);

        return redirect('/furnitur');
    }

    function export_excel()
    {
        return Excel::Download(new ExportFurnitur(), 'Furnitur.xlsx');
    }
}
