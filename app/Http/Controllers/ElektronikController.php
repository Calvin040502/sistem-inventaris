<?php

namespace App\Http\Controllers;

use App\Exports\ExportElektronik;
use App\Models\Elektronik;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ElektronikController extends Controller
{
    protected $elektroniks;

    public function __construct()
    {
        $this->elektroniks = Elektronik::all();
    }

    public function index(Request $request)
{
    $search = $request->input('search');
    $perPage = $request->input('rowsPerPage', 5); // Default to 5 rows per page

    // Filter Elektronik berdasarkan pencarian
    $elektroniks = Elektronik::latest()->where(function ($query) use ($search) {
        $query
            ->where('kode', 'LIKE', '%' . $search . '%')
            ->orWhere('tipe', 'LIKE', '%' . $search . '%')
            ->orWhere('jenis_elektronik', 'LIKE', '%' . $search . '%')
            ->orWhere('merek', 'LIKE', '%' . $search . '%')
            ->orWhere('tahun_perolehan', 'LIKE', '%' . $search . '%') 
            ->orWhere('harga_perolehan', 'LIKE', '%' . $search . '%')
            ->orWhere('masa_guna', 'LIKE', '%' . $search . '%') 
            ->orWhere('lama_pakai', 'LIKE', '%' . $search . '%')
            ->orWhere('kondisi', 'LIKE', '%' . $search . '%')
            ->orWhere('lokasi', 'LIKE', '%' . $search . '%')
            ->orWhere('pengguna', 'LIKE', '%' . $search . '%');
    })->paginate($perPage, ['*'], 'elektronik_page');

    if ($elektroniks->isEmpty()) {
        session()->flash('error', 'Aset tidak ditemukan');
        return view('elektronik.index', ['elektroniks' => $elektroniks]);
    }

    return view('elektronik.index', ['elektroniks' => $elektroniks]);
}

public function create()
{
    // $this->authorize('super admin');
    $lastSerialNumber = Elektronik::latest('kode')->first();

    if ($lastSerialNumber) {
        $lastNumber = (int) substr($lastSerialNumber->kode, 5); // Ubah 3 menjadi 5
        $nextNumber = $lastNumber + 1;
    } else {
        $nextNumber = 1;
    }

    $serialNumber = 'ELTK-' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

    return view('elektronik.create', compact('serialNumber'));
}

public function store(Request $request)
{
    try {
        $lastSerialNumber = Elektronik::latest('kode')->first();

        if ($lastSerialNumber) {
            $lastNumber = (int) substr($lastSerialNumber->kode, 5); // Ubah 3 menjadi 5
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        $serialNumber = 'ELTK-' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

        $validatedData = $request->validate([
            'tipe' => 'required',
            'jenis_elektronik' => 'required',
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

        Elektronik::create($validatedData);

        return redirect('/elektronik');
    } catch (Exception $e) {
        session()->flash('error', $e->getMessage());

        return back();
    }
}


    public function detail($id)
    {
        $elektronik = $this->elektroniks->find($id);

        if (!$elektronik) {
            session()->flash('error', 'Aset tidak ditemukan');

            return redirect('/elektronik');
        }

        return view('elektronik.detail', compact('elektronik'));
    }
    public function print($id)
    {
        $elektronik = $this->elektroniks->find($id);

        if (!$elektronik) {
            session()->flash('error', 'Aset tidak ditemukan');

            return redirect('/elektronik');
        }

        return view('elektronik.cetak', compact('elektronik'));
    }

    public function edit(Elektronik $elektronik)
    {
        return view('elektronik.edit', compact('elektronik'));
    }

    public function update(Request $request, Elektronik $elektronik)
    {
        try {
            $rules = [
                'tipe' => 'required',
                'jenis_elektronik' => 'required',
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
            $elektronik->update($validatedData);

            return redirect('/elektronik')->with('success', 'Aset berhasil diperbarui');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());

            return back();
        }
    }

    public function destroy(Elektronik $elektronik)
    {
        Elektronik::destroy($elektronik->id);

        return redirect('/elektronik');
    }

    function export_excel()
    {
        return Excel::Download(new ExportElektronik(), 'Elektronik.xlsx');
    }
}
