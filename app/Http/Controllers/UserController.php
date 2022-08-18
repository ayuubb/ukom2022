<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function readDashboard()
    {
        return view('dashboard');
    }

    public function readBarang()
    {
        $barang = Barang::all();
        return view('barang.barang', compact('barang'));
    }
    public function readPelanggan()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.pelanggan', compact('pelanggan'));
    }
    public function readTransaksi()
    {
        $pelanggan = Pelanggan::all();
        $transaksi = Transaksi::all();
        $barang = Barang::all();
        $kode_transaksi = 'ODR-' . date('Ymd') . '-' . (int)substr($transaksi->count(), -1) + 1;
        return view('transaksi.transaksi', compact('pelanggan', 'kode_transaksi', 'transaksi', 'barang'));
    }
}
