<?php

namespace App\Exports;

use App\Models\Elektroni;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportElektronik implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = Elektronik::orderBy('kode', 'asc')->get();
        return view('elektronik.table', ['elektroniks' => $data]);
    }
}
