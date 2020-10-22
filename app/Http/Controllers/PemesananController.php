<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

use App\Models\ViewPemesanan;

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
            // ->addColumn('action', function ($data) {
            //     // return [
            //     //     'edit' => route('admin.pemesanan.edit', $data->id),
            //     //     'hapus' => route('admin.pemesanan.delete', $data->id),
            //     // ];
            // })
            ->escapeColumns([])
            ->make(true);
    }

    public function print(Request $request)
    {
        $data = ViewPemesanan::where('no_do');

        return view('backend.order.pemesanan.print', compact('data'));
    }
}
