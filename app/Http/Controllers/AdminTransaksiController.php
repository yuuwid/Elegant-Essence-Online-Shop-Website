<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{

    public function list_transaksi(Request $request)
    {
        if ($request->has('filter')) {
            $filter = $request->get('filter');

            if ($filter == 'hari-ini') {
                $filterQuery = now()->subDay(1)->endOfDay();
            } elseif ($filter == '3-hari-terakhir') {
                $filterQuery = now()->subDay(3)->endOfDay();
            } elseif ($filter == '7-hari-terakhir') {
                $filterQuery = now()->subDay(7)->endOfDay();
            } elseif ($filter == '30-hari-terakhir') {
                $filterQuery = now()->subDay(30)->endOfDay();
            } elseif ($filter == '3-bulan-terakhir') {
                $filterQuery = now()->subDay(30 * 3)->endOfDay();
            } else {
                $filterQuery = now()->subDay(30)->endOfDay();
            }
        } else {
            $filterQuery = now()->subDay(30)->endOfDay();
        }

        $transactions = Transaction::with(['delivery', 'user', 'detail_transaction', 'transaction_track.status_transaction', 'detail_transaction.product'])
            ->where('created_at', '>',  $filterQuery);

        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $transactions = $transactions
                ->whereRelation('user', 'full_name', 'LIKE', '%' . $keyword . '%');
        }


        $transactions = $transactions->paginate(25, ['*'], 'transaction-page');

        return view('admin.transaksi.list_transaksi', [
            'title' => "Admin | Daftar Transaksi",
            'transactions' => $transactions,
        ]);
    }

    public function detail_transaksi($kode_transaksi)
    {
        $kode_transaksi = substr($kode_transaksi, 7);
        $kode_transaksi = substr($kode_transaksi, 0, 5);
        $kode_transaksi = ltrim($kode_transaksi, "0");
        $id_transaksi = $kode_transaksi;

        $transaction = Transaction::with(['delivery', 'user', 'detail_transaction', 'transaction_track.status_transaction', 'detail_transaction.product', 'detail_transaction.product.images', 'detail_transaction.variant', 'detail_transaction.variant.size', 'detail_transaction.variant.color', 'delivery.address', 'delivery.expedition'])
            ->where('id_transaction',  $id_transaksi)->get()->first();

        return view('admin.transaksi.detail_transaksi', [
            'title' => "Admin | Detail Transaksi",
            'transaction' => $transaction,
        ]);
    }

    public function list_transaksi_baru(Request $request)
    {
        return $this->list_transaksi($request);
    }

    public function list_transaksi_diproses(Request $request)
    {
        return $this->list_transaksi($request);
    }

    public function list_transaksi_dikirim(Request $request)
    {
        return $this->list_transaksi($request);
    }

    public function list_transaksi_selesai(Request $request)
    {
        return $this->list_transaksi($request);
    }
}
