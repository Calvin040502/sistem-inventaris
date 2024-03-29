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
        $perPage = $request->input('rowsPerPage', 5); // Default to 5 rows per page
        // Mengambil data Kendaraan dengan urutan terbaru
        $kendaraans = Kendaraan::latest()
            ->where(function ($query) use ($search) {
                $query
                    ->where('kode', 'LIKE', '%' . $search . '%')
                    ->orWhere('plat_nomor', 'LIKE', '%' . $search . '%')
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
            })
            ->paginate($perPage, ['*'], 'kendaraan_page');

        if ($kendaraans->isEmpty()) {
            session()->flash('error', 'Aset tidak ditemukan');
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
                'plat_nomor' => 'required',
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
        $kendaraan = Kendaraan::find($id);

        if (!$kendaraan) {
            session()->flash('error', 'Aset tidak ditemukan');
            return redirect('/kendaraan');
        }

        // Ambil data keterangan terkait dengan kendaraan
        $keterangans = $kendaraan->keterangans;

        return view('kendaraan.detail', compact('kendaraan', 'keterangans'));
    }

    public function print($id)
    {
        $kendaraan = Kendaraan::find($id);

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
                'plat_nomor' => 'required',
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

    function export_excel(Request $request)
    {
        $selectedIds = $request->input('selectedCheckboxes');
        return Excel::download(new ExportKendaraan($selectedIds), 'Kendaraan.xlsx');
    }
}
