<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    //
    public function readDashboard()
    {
        return view('barang.dashboard');
    }
}
