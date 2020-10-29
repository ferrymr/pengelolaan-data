<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\TbHeadJual;
use App\Models\TbDetJual;
use PDF;

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
        $data = TbHeadJual::with('detjual');
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
        $param = array(
            "status_transaksi" => $request->input('status_transaksi')
        );

        $trans = TbHeadJual::where('id', $id)->update($param);
        
        if(!$trans) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Status pemesanan berhasil diupdate</strong>')->success()->important();
            return redirect()->route('admin.pemesanan.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Status pemesanan gagal diupdate </strong>'  )->error()->important();
            return redirect()->route('admin.pemesanan.index')->withInput()->withError();
        }
    }
}
