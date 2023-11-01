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
        $kendaraans = Kendaraan::latest()->get();
        $elektroniks = Elektronik::latest()->get();
        $furniturs = Furnitur::latest()->get();
        $aksesoris = Aksesori::latest()->get();
    
        return view('dashboard.index', compact('kendaraans', 'elektroniks', 'furniturs', 'aksesoris'));
    }

}
