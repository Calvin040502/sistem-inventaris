<?php

namespace App\Http\Controllers;

use App\Exports\ExportAksesori;
use App\Models\Aksesori;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AksesoriController extends Controller
{
    protected $aksesoris;

    public function __construct()
    {
        $this->aksesoris = Aksesori::all();
    }

    public function index(Request $request)
{
    $search = $request->input('search');

    // Filter Aksesori berdasarkan pencarian
    $aksesoris = Aksesori::latest()->where(function ($query) use ($search) {
        $query
            ->where('kode', 'LIKE', '%' . $search . '%')
            ->orWhere('jenis_aksesoris', 'LIKE', '%' . $search . '%')
            ->orWhere('merek', 'LIKE', '%' . $search . '%')
            ->orWhere('tahun_perolehan', 'LIKE', '%' . $search . '%') 
            ->orWhere('harga_perolehan', 'LIKE', '%' . $search . '%')
            ->orWhere('masa_guna', 'LIKE', '%' . $search . '%') 
            ->orWhere('lama_pakai', 'LIKE', '%' . $search . '%')
            ->orWhere('kondisi', 'LIKE', '%' . $search . '%')
            ->orWhere('lokasi', 'LIKE', '%' . $search . '%')
            ->orWhere('pengguna', 'LIKE', '%' . $search . '%');
    })->get();

    if ($aksesoris->isEmpty()) {
        session()->flash('error', 'Aset tidak ditemukan');
        return view('aksesori.index', ['aksesoris' => $aksesoris]);
    }

    return view('aksesori.index', ['aksesoris' => $aksesoris]);
}

public function create()
{
    // $this->authorize('super admin');
    $lastSerialNumber = Aksesori::latest('kode')->first();

    if ($lastSerialNumber) {
        $lastNumber = (int) substr($lastSerialNumber->kode, 5); // Ubah 3 menjadi 5
        $nextNumber = $lastNumber + 1;
    } else {
        $nextNumber = 1;
    }

    $serialNumber = 'AKSR-' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

    return view('aksesori.create', compact('serialNumber'));
}

public function store(Request $request)
{
    try {
        $lastSerialNumber = Aksesori::latest('kode')->first();

        if ($lastSerialNumber) {
            $lastNumber = (int) substr($lastSerialNumber->kode, 5); // Ubah 3 menjadi 5
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        $serialNumber = 'AKSR-' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

        $validatedData = $request->validate([
            'jenis_aksesoris' => 'required',
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

        Aksesori::create($validatedData);

        return redirect('/aksesori');
    } catch (Exception $e) {
        session()->flash('error', $e->getMessage());

        return back();
    }
}


    public function detail($id)
    {
        $aksesori = $this->aksesoris->find($id);

        if (!$aksesori) {
            session()->flash('error', 'Aset tidak ditemukan');

            return redirect('/aksesori');
        }

        return view('aksesori.detail', compact('aksesori'));
    }
    public function print($id)
    {
        $aksesori = $this->aksesoris->find($id);

        if (!$aksesori) {
            session()->flash('error', 'Aset tidak ditemukan');

            return redirect('/aksesori');
        }

        return view('aksesori.cetak', compact('aksesori'));
    }

    public function edit(Aksesori $aksesori)
    {
        return view('aksesori.edit', compact('aksesori'));
    }

    public function update(Request $request, Aksesori $aksesori)
    {
        try {
            $rules = [
                'jenis_aksesoris' => 'required',
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
            $aksesori->update($validatedData);

            return redirect('/aksesori')->with('success', 'Aset berhasil diperbarui');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());

            return back();
        }
    }

    public function destroy(Aksesori $aksesori)
    {
        Aksesori::destroy($aksesori->id);

        return redirect('/aksesori');
    }

    function export_excel()
    {
        return Excel::Download(new ExportAksesori(), 'Aksesoris.xlsx');
    }
}
