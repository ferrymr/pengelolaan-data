<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

use App\Models\TbHeadBeli;
use App\Models\TbDetBeli;
use App\Models\Supplier;
use App\Models\Barang;

class PembelianController extends Controller
{
    public function __contruct(TbHeadBeli $TbHeadBeli)
    {
        $this->TbHeadBeliRepo = $TbHeadBeli;
    }

    public function index()
    {
        $data = TbHeadBeli::with('detBeli')->get();

        return view('backend.order.pembelian.index')->with([
            'data' => $data
        ]);
    }

    public function datatable()
    {
        $data = TbHeadBeli::with('detBeli', 'supplier', 'items')->get();
        return Datatables::of($data)

            ->addColumn('action', function ($data) {
                return [
                    'show'  => route('admin.pembelian.show', $data->no_po),
                    'edit'  => route('admin.pembelian.edit', $data->no_po),
                    'hapus' => route('admin.pembelian.delete', $data->no_po),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function show($no_po)
    {
        $data = TbHeadBeli::with('detBeli')
            ->findOrFail($no_po);
        return view(
            'backend.order.pembelian.show',
            compact('data')
        );
    }
}
