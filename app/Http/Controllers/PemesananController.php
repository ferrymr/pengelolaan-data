<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Role;
use App\Models\TbHeadJual;
use App\Models\TbDetJual;
use PDF;
use App\Mail\OrderConfirmed;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use App\Helpers\Whatsapp;

class PemesananController extends Controller
{
    public function __contruct(TbHeadJual $TbHeadJual) {
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
            ->addColumn('status', function($data) {
                return '<span class="badge bg-success">'.$data->status_transaksi.'</span>';
            })
            // nah nanti pengecekannya di sini om 
            ->addColumn('action', function ($data) {

                if ($data->metode_pengiriman == "EXPEDITION") {
                    $printRouting = route('admin.pemesanan.print_trf', $data->id);
                } else {
                    $printRouting = route('admin.pemesanan.print_immadiate', $data->id);
                }

                return [
                    'show' => route('admin.pemesanan.show', $data->id),
                    'hapus' => route('admin.pemesanan.delete', $data->id),
                    'print' => $printRouting,
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function show($id)
    {
        $data = TbHeadJual::with('items.itemDetailHas','address','user','spb')
                    ->findOrFail($id);
        return view('backend.order.pemesanan.show', 
                compact('data'));
    }

    public function printTrf($id)
    {
        $headJual = TbHeadJual::with('detjual', 'address', 'user')->find($id)->first();

        $pdf = PDF::loadView('backend.order.pemesanan.print_trf', compact('headJual'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function printImmadiate($id)
    {
        $headJual = TbHeadJual::with('detjual', 'address', 'user')->find($id)->first();

        $pdf = PDF::loadView('backend.order.pemesanan.print_immadiate', compact('headJual'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }


    public function setStatus(Request $request, $id)
    {
        // password kosong
        $param["status_transaksi"] = $request->input('status_transaksi');

        // get transaction
        $getTrans = TbHeadJual::with('items', 'address', 'user')->where('id', $id);

        $data = $getTrans->first();

        if($data) {
            if(isset($data->user->email)) {
                if($request->input('status_transaksi') == 'PAYMENT CONFIRMED') {
                    
                    // notif email
                    Mail::to($data->user->email)->send(new OrderConfirmed($data));

                    // notify to whatsapp
                    $to = $data->user->email;
                    $message = "Terimakasih telah melakukan pembayaran di Toko Kami, pembayaran kakak telah terkonfirmasi. 
                    Kami akan segera memproses pesanannya, ditunggu ya kak.";

                    Whatsapp::sendMSG($to, $message);

                } else if($request->input('status_transaksi') == 'SHIPPED') {

                    $param["resi"] = $request->input('input_resi');

                    // notif email
                    Mail::to($data->user->email)->send(new OrderShipped($data));

                    // notify to whatsapp
                    $to = $data->user->email;
                    $message = "Pesanan kakak telah kami pack dan sedang dalam proses pengiriman, ditunggu ya kakak :). 
                    Terimakasih";

                    Whatsapp::sendMSG($to, $message);

                    // update user to member if code status is 2424
                    if($data->user->status == 2424) {
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

                }
            } 
        }

        // dd($param);

        $trans = $getTrans->update($param);
        
        if($trans) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Status pemesanan berhasil diupdate</strong>')->success()->important();
            return redirect()->route('admin.pemesanan.index');            
        } else {            
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Status pemesanan gagal diupdate </strong>'  )->error()->important();
            return redirect()->route('admin.pemesanan.index')->withError();
        }
    }
}
