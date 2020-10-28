<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\HistoryTransaction;
use App\Models\ShippingAddress;
use App\Models\Transaction;
use App\Models\User;

// use App\DetailTransaksi;

class HistoryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = '')
    {

        $userId = auth()->user()->id;
        $user = User::find($userId);
        $transactions = $user->transactions()->with(
            [
                'items' => function($item) {
                    $item->select('transaksi_id', 'kode_barang', 'harga', 'qty', 'subtotal');
                },
                'history' => function($history) {
                    $history->select('transaksi_id', 'tanggal', 'keterangan');
                },
                'shippingAddress' => function($address) {
                    $address->select('tb_shipping_address.nama', 'telepon', 'provinsi_nama', 'kota_nama', 'kecamatan_nama', 'alamat', 'kode_pos');
                }
            ]
        );
        
        if($status == 'waiting') {
            $transactions = $transactions
                            ->whereIn('status_transaksi', ['PLACE ORDER', 'TRANSFERRED']);
        }  else if ($status == 'process') {
            $transactions = $transactions
                            ->whereIn('status_transaksi', ['PAYMENT CONFIRMED', 'PACKED', 'SHIPPED']);        
        } else if ($status == 'done') {
            $transactions = $transactions
                            ->whereIn('status_transaksi', ['RECEIVED']);
        }

        $transactions = $transactions->orderBy('tanggal', 'DESC')->get();
        
        // Place order
        $totalPlaceOrder = $user->transactions()
                                ->where('status_transaksi', 'PLACE ORDER')
                                ->count();

        // Transfered
        $totalTransfered = $user->transactions()
                                ->where('status_transaksi', 'TRANSFERRED')
                                ->count();
        
        // Payment confirmed
        $totalPaymentConfirmed = $user->transactions()
                                    ->where('status_transaksi', 'PAYMENT CONFIRMED')
                                    ->count();

        // Packed
        $totalPacked = $user->transactions()
                                    ->where('status_transaksi', 'PACKED')
                                    ->count();

        // Shipped
        $totalShipped = $user->transactions()
                                    ->where('status_transaksi', 'SHIPPED')
                                    ->count();
        
        // Pesanan selesai
        $totalPesananSelesai = $user->transactions()
                                    ->where('status_transaksi', 'RECEIVED')
                                    ->count();

        $totalMenungguPembayaran = $totalPlaceOrder + $totalTransfered;
        $totalPesananDiproses = $totalPaymentConfirmed + $totalPacked + $totalShipped;

        return view('frontend.history-transaction-order-list', 
                compact(
                    'transactions',
                    'totalMenungguPembayaran',
                    'totalPesananDiproses',
                    'totalPesananSelesai',
                    'status'
                ));

    }

    public function detail($transactionId)
    {
        $transaction = Transaction::find($transactionId)->with(
            [
                'items' => function($item) {
                    $item->select('transaksi_id', 'kode_barang', 'harga', 'qty', 'subtotal');
                },
                'history' => function($history) {
                    $history->select('transaksi_id', 'tanggal', 'keterangan');
                },
                'shippingAddress' => function($address) {
                    $address->select('tb_shipping_address.nama', 'telepon', 'provinsi_nama', 'kota_nama', 'kecamatan_nama', 'alamat', 'kode_pos');
                }
            ]
        )->first();

        return view('frontend.detail-history-transaction', compact('transaction'));
    }
}
