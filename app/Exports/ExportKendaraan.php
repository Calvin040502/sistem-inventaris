<?php

namespace App\Exports;

use App\Models\Kendaraan;
use App\Models\Keterangan;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportKendaraan implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $kendaraans = Kendaraan::orderBy('kode', 'asc')->get();
        $keterangans = Keterangan::orderBy('tanggal', 'desc')->get();

        return view('kendaraan.table', [
            'kendaraans' => $kendaraans,
            'keterangans' => $keterangans,
        ]);
    }
}
