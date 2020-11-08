<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\ShippingAddress;
use App\Models\TbDetJual;
use App\Models\TbHeadJual;
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
        $user = User::with('transactions.items','transactions.address')
                    ->find($userId);

        $transactions = $user->transactions;

        $transaksi = TbHeadJual::where('user_id', $userId);
        
        if($status == 'waiting') {
            $transaksi = $transaksi
                            ->whereIn('status_transaksi', ['PLACE ORDER', 'TRANSFERRED']);
        }  else if ($status == 'process') {
            $transaksi = $transaksi
                            ->whereIn('status_transaksi', ['PAYMENT CONFIRMED', 'PACKED']);        
        } else if ($status == 'done') {
            $transaksi = $transaksi
                            ->whereIn('status_transaksi', ['RECEIVED', 'SHIPPED']);
        }        

        $transaksi = $transaksi
                            ->orderBy('id', 'DESC')
                            ->paginate(6);

        $transactions = $transaksi;

        // dd($transactions->sortBy('id'));
        
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
        $transaction = TbDetJual::find($transactionId)->with(
            [
                'items' => function($item) {
                    $item->select('tb_head_jual_id', 'kode_barang', 'harga', 'qty', 'subtotal');
                },
                'history' => function($history) {
                    $history->select('tb_head_jual_id', 'tanggal', 'keterangan');
                },
                'shippingAddress' => function($address) {
                    $address->select('tb_shipping_address.nama', 'telepon', 'provinsi_nama', 'kota_nama', 'kecamatan_nama', 'alamat', 'kode_pos');
                }
            ]
        )->first();

        return view('frontend.detail-history-transaction', compact('transaction'));
    }
}
