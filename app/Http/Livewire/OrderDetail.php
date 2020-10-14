<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class OrderDetail extends Component
{
    public $transaction;
    public $items;
    public $history;
    public $shippingAddress;

    // benerin grand total
    // cek order progressnya
    public function mount($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        $detail = $transaction->with(
            [
                'items' => function($item) {
                    $item->select('transaksi_id', 'kode_barang', 'harga', 'qty', 'subtotal')->with([
                        'itemDetail' => function($itemInfo) {
                                $itemInfo->select('kode_barang', 'nama', 'jenis');
                        }
                    ]);
                },
                'history' => function($history) {
                    $history->select('transaksi_id', 'tanggal', 'keterangan');
                },
                'shippingAddress' => function($address) {
                    $address->select('cn_shipping_address.nama', 'telepon', 'provinsi_nama', 'kota_nama', 'kecamatan_nama', 'alamat', 'kode_pos');
                }
            ]
        )->first();

        $transactionNew = Transaction::where('id', $transactionId)->with('items.itemDetail', 'shippingAddress')->first();

        // dd($transactionNew->shippingAddress);

        $this->transaction = $transaction;
        $this->items = $transactionNew->items;
        $this->history = $detail->history;
        $this->shippingAddress = $transactionNew->shippingAddress;

        return view('frontend.detail-history-transaction');
    }

    public function render()
    {
        return view('livewire.order-detail');
    }
}
