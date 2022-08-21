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
            'jumlah_barang' => 'required',
        ]);
        $barang_id = Request()->barang_id;
        $barang = Barang::findOrfail($barang_id)->stok;

        $jumlah = $barang - Request()->jumlah_barang;

        Transaksi::create($validateTransaksi);

        Barang::findOrfail($barang_id)->update([
            'stok' => $jumlah,
        ]);

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
