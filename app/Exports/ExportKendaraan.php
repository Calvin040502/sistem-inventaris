<?php

namespace App\Exports;

use App\Models\Kendaraan;
use App\Models\Keterangan;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportKendaraan implements FromView
{
    protected $selectedIds;

    public function __construct($selectedIds)
    {
        $this->selectedIds = $selectedIds;
    }

    public function view(): View
    {
        // Get the data based on the selected checkboxes
        $selectedKendaraans = Kendaraan::whereIn('id', explode(',', $this->selectedIds))
            ->orderBy('kode', 'asc')->get();

        $keterangans = Keterangan::orderBy('tanggal', 'desc')->get();

        return view('kendaraan.table', [
            'kendaraans' => $selectedKendaraans,
            'keterangans' => $keterangans,
        ]);
    }
}

