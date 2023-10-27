<?php

namespace App\Exports;

use App\Models\Aksesori;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportAksesori implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = Aksesori::orderBy('kode', 'asc')->get();
        return view('aksesori.table', ['aksesoris' => $data]);
    }
}
