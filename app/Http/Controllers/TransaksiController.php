<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //
    public function createTransaksi()
    {
        // $transaksi = Transaksi::all();
        // $kode_transaksi = 'ODR-' . date('Ymd') . '-' . (int)substr($transaksi->count(), -1) + 1;
        $validateTransaksi = Request()->validate([
            'kode_transaksi' => 'required',
            'barang_id' => 'required',
            'tanggal_transaksi' => 'required',
            'pelanggan_id' => 'required',

            'status' => 'required',
        ]);
        // $tes = Request()->barang_id;
        // $harga=
        // $validateTransaksi['status'] = 'pending';
        // $jumlah = Request()->jumlah;
        Transaksi::create($validateTransaksi);

        // $barang = Request()->barang_id;
        // $stok =  Barang::find($barang)->stok;
        // $jumlah = $jumlah - $stok;
        // Barang::find($barang)->update($jumlah);
        return redirect('/transaksi');
    }

    public function updateTransaksi($id)
    {
        $validateTransaksi = Request()->validate([
            'kode_transaksi' => 'required',
            'barang_id' => 'required',
            'tanggal_transaksi' => 'required',

            'pelanggan_id' => 'required',
            'status' => 'required',
        ]);
        Transaksi::where('id', $id)->update($validateTransaksi);
        return redirect('/transaksi');
    }

    public function deleteTransaksi($id)
    {
        Transaksi::destroy($id);
        return redirect('/transaksi');
    }
}
