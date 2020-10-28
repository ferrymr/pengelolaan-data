<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\KonfirmasiPenjualan;
use DB;
use File;
use Illuminate\Http\Response;

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
        return view('backend.master.konfirmasi-penjualan.index')->with([
            'user' => $user,
            'konfirmasiPenjualan' => $konfirmasiPenjualan,
        ]);
    }

    public function datatable() {
        $konfirmasiPenjualan = $this->konfirmasiPenjualanRepo->getAll();
        return Datatables::of($konfirmasiPenjualan)     
            ->editColumn('filename', function($konfirmasiPenjualan) {
                if(!empty($konfirmasiPenjualan->filename)) {
                    return route('admin.konfirmasi-penjualan.getFilename', $konfirmasiPenjualan->id);
                } else {
                    return '../../img/no-image-product.jpg';
                }
            })    
            ->addColumn('action', function ($konfirmasiPenjualan){
                return [
                    'edit'      => route('admin.konfirmasi-penjualan.edit', $konfirmasiPenjualan->id),
                    'delete'     => route('admin.konfirmasi-penjualan.delete', $konfirmasiPenjualan->id),
                ];
            })
            ->make(true);
    }
}
