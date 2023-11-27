<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Elektronik;
use App\Models\Furnitur;
use App\Models\Aksesori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $kendaraans = Kendaraan::orderBy('created_at', 'desc')->paginate(5, ['*'], 'kendaraan_page');
        $elektroniks = Elektronik::orderBy('created_at', 'desc')->paginate(5, ['*'], 'elektronik_page');
        $furniturs = Furnitur::orderBy('created_at', 'desc')->paginate(5, ['*'], 'furnitur_page');
        $aksesoris = Aksesori::orderBy('created_at', 'desc')->paginate(5, ['*'], 'aksesori_page');
        
        return view('dashboard.index', compact('kendaraans', 'elektroniks', 'furniturs', 'aksesoris'));
    }

}
