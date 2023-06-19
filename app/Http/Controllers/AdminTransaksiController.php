<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{

    public function list_transaksi(Request $request)
    {

        return view('admin.transaksi.list_transaksi', [
            'title' => "Admin | Daftar Transaksi",
            'transactions' => [],
        ]);
    }

    public function list_transaksi_baru(Request $request)
    {
    }

    public function list_transaksi_diproses(Request $request)
    {
    }

    public function list_transaksi_dikirim(Request $request)
    {
    }

    public function list_transaksi_selesai(Request $request)
    {
    }
}
