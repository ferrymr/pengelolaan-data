<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use App\Helpers\Whatsapp;
use App\Models\ShippingAddress;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Livewire\Component;
use App\Models\TbHeadJual;
use App\Models\TbDetJual;
use App\Models\TbDetSeries;
use App\Models\Barang;
use App\Models\Setting;
use App\Models\CouponUsed;
use App\Models\SpbStock;
use App\Models\Spb;
use DB;
use App\Mail\OrderCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class CheckoutPayment extends Component
{
    public $spbList;
    public $selectedBank;
    public $bankList;
    public $selectedSpb;
    public $defaultShippingAddress;
    public $shippingMethod;
    public $courier;
    public $totalItems;
    public $totalPoin;
    public $totalBerat;
    public $ongkosKirim;
    public $subtotal;
    public $kodeUnik;
    public $totalBayar;
    public $cartItems;
    public $note;
    public $user;
    public $inputsValid;
    public $transactionNumber;
    public $shippingAddressId;
    public $coupon;

    public function mount()
    {
        // dd(session()->all());
        $this->bankList = array('BCA', 'BNI', 'BRI', 'MANDIRI');
        $this->cartItems = Cart::get();
        $this->user = auth()->user();
        $this->defaultShippingAddress = ShippingAddress::where('user_id', $this->user->id)->where('is_default', 1)->first();
        $this->transactionNumber = session('transactionNumber');
        $this->shippingMethod = session('shippingMethod');
        $this->shippingAddressId = session('shippingAddressId');
        $this->selectedSpb = session('selectedSpb');
        $this->ongkosKirim = session('ongkosKirim');
        $this->courier = session('courier');
        $this->selectedBank = session('selectedBank');
        $this->note = session('note');
        $this->subtotal = session('subtotal');
        $this->totalBayar = session('totalBayar');
        $this->totalBerat = session('totalBerat');
        $this->totalItems = session('totalItems');
        $this->totalPoin = session('totalPoin');
        $this->kodeUnik = session('kodeUnik');
        $this->coupon = session('coupon');
        $this->validateAllInputs();
    }

    public function hydrate()
    {
        $this->validateAllInputs();
    }

    public function render()
    {
        return view('livewire.checkout-payment');
    }
    

    public function saveTransaction()
    {
        $TbHeadJual = new TbHeadJual();
        $TbDetJual = new TbDetJual();

        $user = Auth::user();

        DB::beginTransaction();

        try {

            $alphabet = [ "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L"];

            $transactionNumber = "TRX" . date('y') . $alphabet[date('m')-1] . date('d') . rand(1000,9999);

            $input = array(
                'tanggal' => date('Y-m-d'),
                'no_do' => $transactionNumber,
                // 'no_member' => $this->user->no_member, //$customer->no_member,
                'user_id' => $this->user->id, //$customer->id,
                'nama' => $this->user->name, //$customer->name,
                'metode_pengiriman' => $this->shippingMethod, //$request->shipping_method,
                'kurir' => $this->courier, //$request->courier,
                'shipping_address_id' => $this->shippingMethod == 'EXPEDITION' ? $this->defaultShippingAddress->id : null, //$request->shipping_address_id,
                'sub_total' => $this->subtotal, //$request->subtotal,
                'shipping_fee' => $this->ongkosKirim, //$request->request->shipping_fee,
                'grand_total' => $this->totalBayar, //$request->grand_total,
                'total_berat' => $this->totalBerat, //$request->total_berat,
                'total_item' => $this->totalItems, //$request->total_berat,
                'total_poin' => $this->totalPoin, //$request->note,
                'note' => $this->note, //$request->note,
                'kode_spb' => $this->selectedSpb, //$request->kode_spb,
                'jenis_platform' => 'SHOP',
                'bank' => $this->selectedBank, //$request->bank,
                'status_transaksi' => 'PLACE ORDER',
            );

            // todo change to model, add data to tbheadjual
            $resultId = $TbHeadJual->addData($input);
    
            $transactionId = DB::getPDO()->lastInsertId();
            
            $cartItems = Cart::get();

            if (count($cartItems) < 1) {
                throw new \Exception("No items in the cart!");
            }

            // insert into Detail Penjualan table
            foreach($cartItems as $item) {
                $inputDetJual = array(
                    'tb_head_jual_id' => $transactionId,
                    'kode_barang' => $item['kode_barang'],
                    // 'barang_id' => $item['barang_id'],
                    'harga' => $item['h_nomem'],
                    'jumlah' => $item['qty'],
                    'total' => $item['h_nomem'] * $item['qty'],
                    // 'total_vc' => 0,
                    'poin' => 0,
                    'note' => '',
                    'promo' => 0
                );
                // dd($inputDetJual);
                // insert method
                $TbDetJual->addData($inputDetJual);
            }
            
            $spbId = Spb::where('code', $this->selectedSpb)->first();

            // dd($spbId);

            // decrease stock
            foreach($cartItems as $item) {
                if ($item['unit'] == "SERIES") {

                    $serieItems = TbDetSeries::where('tb_series_id', $item['barang_id'])
                                        ->get();
                    
                    foreach($serieItems as $serieItem) {

                        $currentQuantity = SpbStock::where('tb_barang_id', $serieItem->tb_barang_id)
                                        ->where('tb_spb_id', $spbId->id)
                                        ->first()
                                        ->stock;                        

                        SpbStock::where('tb_barang_id', $serieItem->tb_barang_id)
                            ->where('tb_spb_id', $spbId->id)
                            ->update(['stock' => (int) $currentQuantity - ($serieItem->qty * $item['qty'])]);
                    
                    }

                } else {
                    $currentQuantity = SpbStock::where('tb_barang_id', $serieItem->tb_barang_id)
                                        ->where('tb_spb_id', $spbId->id)
                                        ->first()
                                        ->stock;

                    SpbStock::where('tb_barang_id', $serieItem->tb_barang_id)
                        ->where('tb_spb_id', $spbId->id)
                        ->update(['stock' => $currentQuantity - $item['qty']]);
                }
            }

            DB::commit();

            if(!empty($this->defaultShippingAddress->telepon_pengirim)) {
                $phone = $this->defaultShippingAddress->telepon_pengirim;
            } else if (!empty($this->user->phone)) {
                $phone = $this->user->phone;
            } else {
                $phone = 0;
            }

            $orderFinal = TbHeadJual::with('items', 'address', 'user')->where('id', $transactionId)->first();

            // notify to whatsapp
            $to = $phone;
            $message = "Terimakasih telah melakukan pembelian di Toko Kami. 
            Segera lakukan pembayaran dan konfirmasi pembayaran 
            (melalui menu profile > transaksi > detail transaksi)";

            Whatsapp::sendMSG($to, $message);

            // notify to email
            if(isset($user->email)) {
                Mail::to($user->email)->send(new OrderCreated($orderFinal));
            }

            // send to admin
            $toAdmin = Setting::where('slug', 'phone_admin')->first()->name;
            $messageAdmin = "[NEW ORDER] Ada order baru masuk dari ".$this->user->name.". Silahkan segera di proses.";

            Whatsapp::sendMSG($toAdmin, $messageAdmin);

            foreach ($cartItems as $cartItem) {
                Cart::remove($cartItem['kode_barang']);
            }
    
            // to do if implement coupon need to submit to coupon used
            if(isset($this->coupon) && !empty($this->coupon)) {
                CouponUsed::insert([
                    'user_id' => $this->user->id,
                    'coupon_code' => $this->coupon
                ]);
            }

            // flash
            flash('Transaksi berhasil!')->success();
            // session()->flash('success', 'Transaksi berhasil!');
            return redirect()->route('order-history-status', 'waiting');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            // return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function validateAllInputs()
    {
        if (!$this->selectedBank) {
            $this->inputsValid = false;
            return;
        }

        if (!$this->selectedSpb) {
            $this->inputsValid = false;
            return;
        }

        if (!$this->shippingMethod) {
            $this->inputsValid = false;
            return;
        }

        if ($this->shippingMethod == 'EXPEDITION' && !$this->courier) {
            $this->inputsValid = false;
            return;
        }

        $this->inputsValid = true;
    }
}
