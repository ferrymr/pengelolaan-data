<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use DB;

use App\Models\TbHeadBeli;
use App\Models\TbDetBeli;
use App\Models\Supplier;
use App\Models\Barang;
use App\Models\SpbStock;

class PembelianController extends Controller
{
    public function __contruct(TbHeadBeli $TbHeadBeli)
    {
        $this->TbHeadBeliRepo = $TbHeadBeli;
    }

    public function index()
    {
        $data = TbHeadBeli::with('detbeli')->get();
        // dd($data);
        return view('backend.order.pembelian.index')->with([
            'data' => $data
        ]);
    }

    public function datatable()
    {
        $data = TbHeadBeli::with('detbeli', 'supplier')->get();
        return Datatables::of($data)

            ->addColumn('action', function ($data) {
                return [
                    'show'  => route('admin.pembelian.show', $data->id),
                    'edit'  => route('admin.pembelian.edit', $data->id),
                    'hapus' => route('admin.pembelian.delete', $data->id),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function show($id)
    {
        $data = TbHeadBeli::with('detbeli', 'supplier', 'items')
            ->findOrFail($id);
        // dd($data);
        return view(
            'backend.order.pembelian.show',
            compact('data')
        );
    }

    public function add()
    {
        $data = TbHeadBeli::orderBy('created_at', 'DESC')->first();

        if(!empty($data)) {
            $invoice = isset($data[0]['no_po']);
            $invoice = substr($data[0]['no_po'], 9);
        } else {            
            $invoice = 0;
        }
        
        $invoice = abs($invoice) + 1;
        $invoice = str_pad($invoice, 5, '0', STR_PAD_LEFT);
        $dates = Carbon::now();
        $index = $dates->format('Y') . '-PO' . '-' . $invoice;
        
        return view('backend.order.pembelian.create', compact('index'));
    }


    public function getNama(Request $request)
    {
        $kode_supp = $request->get('kode_supp');

        $data = Supplier::select('nama')->where('kode_supp', $kode_supp)->firstOrFail();

        return response()->json($data);
    }

    public function create_kode(Request $request)
    {
        $kode_barang = $request->get('kode_barang');
        if ($request->ajax()) {
            $kode_supp = $request->kode_supp;
            $kode_barang = $request->kode_barang;

            $data = Barang::select('nama', 'jenis', 'hpp')
                            ->where('kode_barang', $kode_barang)
                            ->where('unit', 'PIECES')
                            ->first();

            return response()->json($data, 200);
        }
    }

    public function store(Request $request)
    {
        $input = array(
            'no_po' => $request->no_po,
            'tanggal' => $request->tanggal,
            'kode_supp' => $request->kode_supp,
            'nama' => $request->nama_supp,
            'sub_total' => $request->sub_total,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        );

        $beli = TbHeadBeli::create($input);

        $headbeliId = DB::getPDO()->lastInsertId();
        foreach ($request->kode_barang as $item => $kode_barang) {

            // get id barang
            $barangId = Barang::where('kode_barang', $request->kode_barang[$item])->first()->id;

            $data2 = array(
                'tb_head_beli_id' => $beli->id,
                'no_po' => $request['no_po'],
                'kode_barang' => $request->kode_barang[$item],
                'jenis' => $request->jenis[$item],
                'jumlah' => $request->jumlah[$item],
                'harga' => $request->harga[$item],
                'total' => $request->total[$item],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            );
            TbDetBeli::insert($data2);

            // perubahan stock
            if ($data2) {
                // check on spb is exist or not 
                // spb id 1 == HO
                $spbStockTo = SpbStock::where('tb_barang_id', $barangId)
                                    ->where('tb_spb_id', 1)->first();                

                // update
                if($spbStockTo) {
                    SpbStock::where('tb_barang_id', $barangId)
                                    ->where('tb_spb_id', 1)
                                    ->update(['stock' => (int) $spbStockTo->stock + $request->jumlah[$item]]);
                // create new record
                } else {
                    SpbStock::insert([
                        'tb_barang_id' => $barangId,
                        'tb_spb_id' => 1,
                        'stock' => $request->jumlah[$item],
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]);
                }
            }
        }

        flash('<i class="fa fa-info"></i>&nbsp; <strong>Pemesanan Berhasil Diinputkan</strong>')->success();
        return redirect()->route('admin.pembelian.index');
    }
}
