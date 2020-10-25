<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

use App\Models\ViewPemesanan;
use App\Models\TbHeadJual;
use PDF;

class PemesananController extends Controller
{
    public function index()
    {
        $data = ViewPemesanan::all();

        return view('backend.order.pemesanan.index', compact('data'));
    }

    public function datatable()
    {
        $data = ViewPemesanan::all();
        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return [
                    'edit' => route('admin.pemesanan.edit', $data->no_do),
                    'hapus' => route('admin.pemesanan.delete', $data->no_do),
                    'print' => route('admin.pemesanan.print_kurir', $data->no_do),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function printKurir($no_do)
    {
        $headJual = TbHeadJual::where('no_do', $no_do)->first();

        // dd($headJual);

        $pdf = PDF::loadView('backend.order.pemesanan.print_kurir', compact('headJual'))->setPaper('a4', 'landscape');
        return $pdf->stream();
        // dd($headJual);
        // return view('backend.order.pemesanan.print_kurir', compact('headJual'));
    }
}
