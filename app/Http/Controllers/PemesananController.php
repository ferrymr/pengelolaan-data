<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Role;
use App\Models\Barang;
use App\Models\TbHeadJual;
use App\Models\TbDetSeries;
use PDF;
use DB;
use App\Mail\OrderConfirmed;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use App\Helpers\Whatsapp;
use App\Models\ShippingAddress;

class PemesananController extends Controller
{
    public function __contruct(TbHeadJual $TbHeadJual)
    {
        $this->TbHeadJualRepo = $TbHeadJual;
    }

    public function index()
    {
        $data = TbHeadJual::with('detjual')->get();
        return view('backend.order.pemesanan.index')->with([
            'data' => $data
        ]);
    }

    public function datatable()
    {
        $data = TbHeadJual::with('detjual')->orderBy('id', "DESC");
        return Datatables::of($data)
            ->addColumn('kode_barang', function ($data) {
                return $data->detjual->kode_barang;
                return $data->detjual->jumlah;
            })
            ->addColumn('jumlah', function ($data) {
                return $data->detjual->jumlah;
            })
            ->addColumn('status', function ($data) {
                return '<span class="badge bg-success">' . $data->status_transaksi . '</span>';
            })
            // nah nanti pengecekannya di sini om 
            ->addColumn('action', function ($data) {

                if ($data->metode_pengiriman == "EXPEDITION") {
                    $printRouting = route('admin.pemesanan.print_trf', $data->id);
                    $showRouting = route('admin.pemesanan.show', $data->id);
                } else {
                    $printRouting = route('admin.pemesanan.print_immadiate', $data->id);
                    $showRouting = route('admin.pemesanan.show_immediate', $data->id);
                }

                return [
                    'show' => $showRouting,
                    'cancel' => route('admin.pemesanan.cronCancelProduct', $data->id),
                    'print' => $printRouting,
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function getSpbList()
    {
        $spbList = DB::table('tb_spb')->get()->toArray();

        // dd($spbList);

        // foreach($spbListPrepare as $row) {
        //     $spbList[$row->name] = (array) $row;
        // }

        // // CHECK KETERSEDIAAN STOK DI MASING-MASING SPB
        // // JIKA STOK TIDAK TERSEDIA DI SALAH SATU SPB, MAKA DISABLE SPB TERSEBUT
        // foreach($spbList as $spb) {

        //     foreach ($newCartItems as $newCartItem) {

        //         $spbIndex = 'SPB' . $spb['code'];

        //         if ($spb['code'] == '00000') {

        //             $stockAvailable = Barang::where('kode_barang', $newCartItem['kode_barang'])
        //                                 ->where('stok', '>=', $newCartItem['qty'])
        //                                 ->count();

        //             // JIKA SALAH SATU STOK ITEM TIDAK MENCUKUPI DI SPB, SKIP PERULANGAN
        //             // TIDAK PERLU CHECK STOK ITEM YANG LAIN, KARENA JIKA SALAH SATU ITEM STOKNYA TIDAK AVAILABLE DI SPB
        //             // MAKA OTOMATIS SPB ITU AKAN DI DISABLE DI FRONT-END
        //             if ($stockAvailable < 1) {
        //                 $spbList[$spbIndex]['disabled'] = 'disabled';
        //                 continue 2;
        //             }

        //         } else {

        //             // todo checking ke pak alan
        //             $stockAvailable = DB::table('tb_produk')
        //                 ->where('no_member', $spb['code'])
        //                 ->where('kode_barang', $newCartItem['kode_barang'])
        //                 ->where('stok', '>=', $newCartItem['qty'])
        //                 ->count();

        //             // JIKA SALAH SATU STOK ITEM TIDAK MENCUKUPI DI SPB, SKIP PERULANGAN
        //             // TIDAK PERLU CHECK STOK ITEM YANG LAIN, KARENA JIKA SALAH SATU ITEM STOKNYA TIDAK AVAILABLE DI SPB
        //             // MAKA OTOMATIS SPB ITU AKAN DI DISABLE DI FRONT-END
        //             if ($stockAvailable < 1) {
        //                 $spbList[$spbIndex]['disabled'] = 'disabled';
        //                 continue 2;
        //             }
        //         }
        //     }
        // }

        return $spbList;
    }

    public function add()
    {
        $user = Auth::user();
        $products = Barang::get();
        $users = User::get();

        $alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L"];
        $no_do  = "TRX" . date('y') . $alphabet[date('m') - 1] . date('d') . rand(1000, 9999);

        $spb = $this->getSpbList();
        // dd($sbp);

        return view('backend.order.pemesanan.create', compact(
            'user',
            'products',
            'users',
            'no_do',
            'spb'
        ));
    }

    public function show($id)
    {
        $data = TbHeadJual::with('items.itemDetailHas', 'address', 'user', 'spb')
            ->findOrFail($id);
        return view(
            'backend.order.pemesanan.show',
            compact('data')
        );
    }

    public function showImmediate($id)
    {
        $data = TbHeadJual::with('items.itemDetailHas', 'address', 'user', 'spb')
            ->findOrFail($id);
        return view(
            'backend.order.pemesanan.show-immediate',
            compact('data')
        );
    }

    public function printTrf($id)
    {
        $data = TbHeadJual::with('items.itemDetailHas', 'address', 'user', 'spb', 'detjual')->find($id);

        $pdf = PDF::loadView('backend.order.pemesanan.print_trf', compact('data'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function printImmadiate($id)
    {
        $data = TbHeadJual::with('items.itemDetailHas', 'address', 'user', 'spb', 'detjual')->find($id);

        $pdf = PDF::loadView('backend.order.pemesanan.print_immadiate', compact('data'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }


    public function setStatus(Request $request, $id)
    {
        // password kosong
        $param["status_transaksi"] = $request->input('status_transaksi');

        // get transaction
        $getTrans = TbHeadJual::with('items', 'address', 'user')->where('id', $id);

        $data = $getTrans->first();

        if ($data) {
            if (isset($data->user->email)) {
                if ($request->input('status_transaksi') == 'PAYMENT CONFIRMED') {

                    // notif email
                    Mail::to($data->user->email)->send(new OrderConfirmed($data));

                    // notify to whatsapp
                    $to = $data->user->email;
                    $message = "Terimakasih telah melakukan pembayaran di Toko Kami, pembayaran kakak telah terkonfirmasi. 
                    Kami akan segera memproses pesanannya, ditunggu ya kak.";

                    Whatsapp::sendMSG($to, $message);
                } else if ($request->input('status_transaksi') == 'SHIPPED') {

                    $param["resi"] = $request->input('input_resi');

                    // notif email
                    Mail::to($data->user->email)->send(new OrderShipped($data));

                    // notify to whatsapp
                    $to = $data->user->email;
                    $message = "Pesanan kakak telah kami pack dan sedang dalam proses pengiriman, ditunggu ya kakak :). 
                    Terimakasih";

                    Whatsapp::sendMSG($to, $message);

                    // update user to member if code status is 2424
                    if ($data->user->status == 2424) {
                        $userUpdate = User::where('id', $data->user->id);

                        $userUpdate = $userUpdate->update([
                            'status' => null
                        ]);

                        // get useragain
                        $userUpdateRole = User::find($data->user->id);

                        // check user role member
                        $assign = Role::where('name', 'member')->first();

                        // change role to member
                        $userUpdateRole->attachRole($assign);
                    }

                    // update user to reseller if code status is 2525
                    if ($data->user->status == 2525) {
                        $userUpdate = User::where('id', $data->user->id);

                        $randCodeReseller = substr(md5(uniqid(mt_rand(), true)), 0, 10);

                        $userUpdate = $userUpdate->update([
                            'apro' => $randCodeReseller,
                            'status' => null
                        ]);

                        // get useragain
                        $userUpdateRole = User::find($data->user->id);

                        // check user role member
                        $assign = Role::where('name', 'reseller')->first();

                        // change role to member
                        $userUpdateRole->attachRole($assign);
                    }
                }
            }
        }

        $trans = $getTrans->update($param);

        if ($trans) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Status pemesanan berhasil diupdate</strong>')->success()->important();
            return redirect()->route('admin.pemesanan.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Status pemesanan gagal diupdate </strong>')->error()->important();
            return redirect()->route('admin.pemesanan.index')->withError();
        }
    }

    public function cronCancelProduct()
    {
        $transactions = TbHeadJual::with('items')
            ->where('status_transaksi', "PLACE ORDER")
            ->where('tanggal', '<=', date("Y-m-d"))
            ->get();

        foreach ($transactions as $transaction) {
            // update status transaksi
            $update = TbHeadJual::find($transaction->id)
                // ->first();
                ->update(['status_transaksi' => 'CANCEL']);

            foreach ($transaction->items as $row) {

                if ($row->unit == "SERIES") {
                    // get id from code barang
                    $barang = Barang::where('kode_barang', $row->kode_barang)->first();

                    $serieItems = TbDetSeries::where('tb_series_id', $barang->id)
                        ->get();

                    foreach ($serieItems as $serieItem) {
                        $currentQuantity = Barang::select('stok')
                            ->where('id', $serieItem->tb_barang_id)
                            ->first()
                            ->stok;
                        Barang::where('id', $serieItem->tb_barang_id)
                            ->update(['stok' => $currentQuantity - ($serieItem->qty * $row->jumlah)]);
                    }
                } else {
                    // get last stock
                    $barang = Barang::where('kode_barang', $row->kode_barang)
                        ->first();

                    Barang::where('kode_barang', $row->kode_barang)
                        ->update(['stok' => ($barang->stok + $row->jumlah)]);
                }
            }
        }

        flash('<i class="fa fa-info"></i>&nbsp; <strong>Status pemesanan berhasil dicancel</strong>')->success()->important();
        return redirect()->route('admin.pemesanan.index');
    }
}
