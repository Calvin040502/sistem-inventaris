<?php

namespace App\Exports;

use App\Models\Kendaraan;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportKendaraan implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = Kendaraan::orderBy('kode', 'asc')->get();
        return view('kendaraan.table', ['kendaraans' => $data]);
    }
}
