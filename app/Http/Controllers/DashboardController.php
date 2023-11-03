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
        $kendaraans = Kendaraan::orderBy('created_at', 'desc')->take(5)->get();
        $elektroniks = Elektronik::orderBy('created_at', 'desc')->take(5)->get();
        $furniturs = Furnitur::orderBy('created_at', 'desc')->take(5)->get();
        $aksesoris = Aksesori::orderBy('created_at', 'desc')->take(5)->get();

        return view('dashboard.index', compact('kendaraans', 'elektroniks', 'furniturs', 'aksesoris'));
    }

}
