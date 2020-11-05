<?php

namespace App\Http\Livewire;

use App\Models\TbDetJual;
use App\Models\TbHeadJual;
use App\Models\KonfirmasiPenjualan;
use Livewire\Component;
use Livewire\WithFileUploads;

class OrderDetail extends Component
{
    use WithFileUploads;

    public $transaction;
    public $items;
    public $shippingAddress;
    public $bankList;

    // insert confirmation
    public $user;
    public $selectedBank;
    public $rekeningNumber;
    public $rekeningName;
    public $filename;
    public $transId;
    public $status_transaksi;

    // benerin grand total
    // cek order progressnya
    public function mount($transactionId)
    {
        $this->bankList = array('BCA', 'BNI', 'BRI', 'MANDIRI');
        $transaction = TbHeadJual::with('items','address','spb')
                            ->find($transactionId);

        $this->transId = $transactionId;
        $this->status_transaksi = $transaction->status_transaksi;
        $this->selectedBank;
        $this->rekeningNumber;
        $this->rekeningName;
        $this->filename;

        $this->user = auth()->user();
        $this->transaction = $transaction;
        $this->items = $transaction->items;
        $this->shippingAddress = $transaction->address;

        return view('frontend.detail-history-transaction');
    }

    public function render()
    {
        return view('livewire.order-detail');
    }

    public function resetAddressInputFields() {
        $this->selectedBank = '';
        $this->rekeningNumber = '';
        $this->rekeningName = '';
        $this->filename = '';
    }

    // untuk menyimpan alamat baru
    public function saveConfirmation() {
        
        $this->validate([
            'selectedBank' => 'required',
            'rekeningNumber' => 'required',
            'rekeningName' => 'required',
            'filename' => 'required'
        ]);

        $filename = 'konfirmasi-'. $this->user->name .'-' . date('YmdHis') . '.' . $this->filename->getClientOriginalExtension();
                
        $this->filename->storeAs('public/konfirmasi_pembayaran', $filename);
        
        $input = [
            'tb_head_jual_id' => $this->transId,
            'user_id' => $this->user->id,
            'bank' => $this->selectedBank,
            'rekening_number' => $this->rekeningNumber,
            'rekening_name' => $this->rekeningName,
            'filename' => $filename,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        KonfirmasiPenjualan::create($input);

        // update status TbHeadJual
        TbHeadJual::where('id', $this->transId)->update(['status_transaksi' => "TRANSFERRED"]);

        $this->status_transaksi = "TRANSFERRED";

        // flash
        flash('Konfirmasi pembayaran sudah dikirim, team kami akan segera mengkonfirmasi')->success();

        $this->resetAddressInputFields();
    }
}
