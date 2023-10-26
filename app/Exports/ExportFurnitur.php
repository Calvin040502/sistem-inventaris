<?php

namespace App\Exports;

use App\Models\Furnitur;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportFurnitur implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = Furnitur::orderBy('kode', 'asc')->get();
        return view('furnitur.table', ['furniturs' => $data]);
    }
}
