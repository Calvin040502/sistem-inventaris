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
        $kendaraans = Kendaraan::orderBy('created_at', 'desc')->paginate(2);
        $elektroniks = Elektronik::orderBy('created_at', 'desc')->paginate(2);
        $furniturs = Furnitur::orderBy('created_at', 'desc')->paginate(2);
        $aksesoris = Aksesori::orderBy('created_at', 'desc')->paginate(2);

        return view('dashboard.index', compact('kendaraans', 'elektroniks', 'furniturs', 'aksesoris'));
    }

}
