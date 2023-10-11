<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $kendaraans = Kendaraan::all();

        $kendaraans = Kendaraan::latest()->get();

        return view('dashboard.index', compact('kendaraans'));
    }
}
