<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\KonfirmasiPenjualan;
use App\Models\TbHeadJual;
use DB;
use File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Helpers\Whatsapp;

class KonfirmasiPenjualanController extends Controller
{
    public function __construct (
        KonfirmasiPenjualan $konfirmasiPenjualan
    ) {
        $this->konfirmasiPenjualanRepo = $konfirmasiPenjualan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $konfirmasiPenjualan = $this->konfirmasiPenjualanRepo->getAll();
        // dd($konfirmasiPenjualan);
        return view('backend.store.konfirmasi-penjualan.index')->with([
            'user' => $user,
            'konfirmasiPenjualan' => $konfirmasiPenjualan,
        ]);
    }

    public function datatable() {
        $konfirmasiPenjualan = $this->konfirmasiPenjualanRepo->getAll();
        return Datatables::of($konfirmasiPenjualan)     
            ->editColumn('filename', function($konfirmasiPenjualan) {
                if(!empty($konfirmasiPenjualan->filename)) {
                    return route('admin.konfirmasi-penjualan.konfirmasi-image', $konfirmasiPenjualan->id);
                } else {
                    return '../../img/no-image-product.jpg';
                }
            })
            ->addColumn('status', function($konfirmasiPenjualan) {
                if(!empty($konfirmasiPenjualan->transaction)) {
                    if($konfirmasiPenjualan->transaction->status_transaksi == "TRANSFERRED" ||
                        $konfirmasiPenjualan->transaction->status_transaksi == "PLACE ORDER"
                    ) { 
                        return '<span class="badge bg-warning">Not confirm yet</span>';
                    } else {
                        return '<span class="badge bg-success">Confirmed</span>';
                    }
                }
            })
            ->addColumn('action', function ($konfirmasiPenjualan){
                return [
                    'edit'      => route('admin.konfirmasi-penjualan.edit', $konfirmasiPenjualan->transaction->id),
                    'cancel'      => route('admin.konfirmasi-penjualan.cancel', $konfirmasiPenjualan->transaction->id),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function edit($id) {
        $konfirm = TbHeadJual::where('id', $id)->update(['status_transaksi' => "PAYMENT CONFIRMED"]);

        $getTrans = TbHeadJual::with('items', 'address', 'user')->where('id', $id);
        $data = $getTrans->first();

        if($data) {
            if(isset($data->user->email)) {
                Mail::to($data->user->email)->send(new OrderConfirmed($data));

                if(!empty($data->address->telepon_pengirim)) {
                    $phone = $data->address->telepon_pengirim;
                } else if (!empty($data->user->phone)) {
                    $phone = $data->user->phone;
                } else {
                    $phone = 0;
                }
                // notify to whatsapp
                $to = $phone;
                $message = "Terimakasih telah melakukan pembayaran di Toko Kami, pembayaran kakak telah terkonfirmasi. 
                Kami akan segera memproses pesanannya, ditunggu ya kak.";

                Whatsapp::sendMSG($to, $message);                
            } 
        }

        flash('<i class="fa fa-info"></i>&nbsp; <strong>Transaksi berhasil di confirm</strong>')->success()->important();
        return redirect()->route('admin.konfirmasi-penjualan.index');
    }

    public function cancel($id) {
        $konfirm = TbHeadJual::where('id', $id)->update(['status_transaksi' => "TRANSFERRED"]);
        flash('<i class="fa fa-info"></i>&nbsp; <strong>Konfirmasi berhasil dibatalkan</strong>')->success()->important();
        return redirect()->route('admin.konfirmasi-penjualan.index');
    }

    public function getKonfirmasiImage($id) {
        $konfirmasiImage = $this->konfirmasiPenjualanRepo->find($id);
        
        if(!$konfirmasiImage) {
            abort(404); 
        }

        // Access local storage
        $path = storage_path('app/public/konfirmasi_pembayaran/' . $konfirmasiImage->filename);

        if (!File::exists($path)) {
            abort(404);
        }

        // Return file
        return (new Response(File::get($path), 200))
              ->header('Content-Type', File::mimeType($path));
    }
}
