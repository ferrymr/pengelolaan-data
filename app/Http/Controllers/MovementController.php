<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMovementRequest;
use App\Models\HeadStom;
use App\Models\DetStom;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\Movement;
use App\Models\MovementDetail;
use App\Models\Barang;
use App\Models\Spb;
use App\Models\SpbStock;
use Carbon\Carbon;
use DB;

class MovementController extends Controller
{
    public function __construct (
        Movement $movement, 
        Barang $barang
    ) 
    {
        $this->movementRepo = $movement;
        $this->barangRepo   = $barang;
    }
    
    public function index()
    {
        $user = Auth::user();
        $movement = $this->movementRepo->getAll();
        // dd($movement);

        return view('backend.order.movement.index')->with([
            'user' => $user,
            'movement' => $movement
        ]);
    }

    public function datatable() 
    {
        $movement = $this->movementRepo->getAll();

        return Datatables::of($movement)
            ->addColumn('action', function ($movement){
                return [
                    // 'view' => route('admin.barang.view', $movement->no_id),
                    // 'edit' => route('admin.movement.edit', $movement->id),
                    // 'hapus' => route('admin.movement.delete', $movement->no_id),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create()
    {
        $user = Auth::user();
        $barang = $this->barangRepo->getAll();
        $spb = Spb::get();

        $data = Movement::orderBy('created_at', 'DESC')->first();

        if(!empty($data)) {
            $invoice = explode('-', $data);
            $invoice = (int) $invoice[2];
        } else {            
            $invoice = 0;
        }
        
        $invoice = abs($invoice) + 1;
        $invoice = str_pad($invoice, 5, '0', STR_PAD_LEFT);
        $noFaktur = date("Y") . '-SM' . '-' . $invoice;
        
        return view("backend.order.movement.create")->with([
            'user' => $user,
            'barang' => $barang,
            'spb' => $spb,
            'noFaktur' => $noFaktur,
        ]);

    }

    public function store(Request $request)
    {

        // to do check barang di spb asal uda ada atw belum

        DB::beginTransaction();

        try {

            $input = array(
                'no_faktur' => $request->no_faktur,
                'tb_spb_id_from' => $request->tb_spb_id_from,
                'tb_spb_id_to' => $request->tb_spb_id_to,
                'tanggal' => $request->tanggal,
                'note' => $request->note,
                'jenis_movement' => $request->jenis_movement,
                'user' => Auth::user()->id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            );

            // insert to movement
            $movement = $this->movementRepo->addMovement($input);

            // insert into movement detail
            foreach ($request->kode_barang as $key => $kode_barang) {

                // get id barang
                $barangId = Barang::where('kode_barang', $request->kode_barang[$key])->first()->id;

                $data = array (
                    'tb_barang_id' => $barangId,
                    'qty' => $request->jumlah[$key]
                );
                MovementDetail::insert($data);

                // decrease stock spb from
                $spbStockFrom = SpbStock::where('tb_barang_id', $barangId)
                                            ->where('tb_spb_id', $request->tb_spb_id_from)->first();

                // update
                if($spbStockFrom) {
                    SpbStock::where('tb_barang_id', $barangId)
                                ->where('tb_spb_id', $request->tb_spb_id_from)
                                ->update(['stock' => (int) $spbStockFrom->stock - $request->jumlah[$key]]);
                }

                // add stock spb destination
                $spbStockTo = SpbStock::where('tb_barang_id', $barangId)
                                    ->where('tb_spb_id', $request->tb_spb_id_to)->first();

                // update
                if($spbStockTo) {
                    SpbStock::where('tb_barang_id', $barangId)
                                    ->where('tb_spb_id', $request->tb_spb_id_to)
                                    ->update(['stock' => (int) $spbStockTo->stock + $request->jumlah[$key]]);
                // create new record
                } else {
                    SpbStock::insert([
                        'tb_barang_id' => $barangId,
                        'tb_spb_id' => $request->tb_spb_id_to,
                        'stock' => $request->jumlah[$key],
                    ]);
                }

            }

            DB::commit();

            // flash
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data movement berhasil ditambah</strong>')->success()->important();
            return redirect()->route('admin.movement.index');

        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data gagal disimpan</strong>')->error()->important();
            return redirect()->route('admin.movement.add');
        }

    }

    public function addinvoice(){

        $data = HeadStom::orderBy('created_at', 'DESC')->limit(1)->get();
        if (isset($data[0]['no_sm'])) {
            $invoice = substr($data[0]['no_sm'], 9);
            $invoice = abs($invoice) + 1;
            $invoice = str_pad($invoice, 5, '0', STR_PAD_LEFT);
            $dates = Carbon::now();
            $index = $dates->format('Y') . '/SM' . '/' . $invoice;
            return $index;
        } else {
            $dates = Carbon::now();
            $index = $dates->format('Y') . '/SM' . '/00001';
            return $index;
        }       

    }

    public function view($id)
    {
        //
    }

    public function edit($id) 
    {        
        $user = Auth::user();
        $movement = $this->movementRepo->findId($id);
        $barang = $this->barangRepo->getAll();

        return view('backend.order.movement.edit')->with([
            'user' => $user,
            'movement' =>$movement,
            'barang' => $barang,
        ]);
    }

    public function getNama(Request $request)
    {
        $no_member = $request->get('no_member');

        $data = User::select('name as nama_member')->where('no_member', $no_member)->firstOrFail();
        return response()->json($data);
    }

    public function create_kode(Request $request)
    {      
        $kode_barang = $request->get('kode_barang');
        
        if($request->ajax()) {
            $data = '';
            $qry = Barang::where('kode_barang', $kode_barang)->get();
            foreach ($qry as $value) {
                $data = array(
                    'nama'  =>  $value->nama,
                    'jenis' => $value->jenis,
                );
            }
            echo json_encode($data);
        }
    }
}
