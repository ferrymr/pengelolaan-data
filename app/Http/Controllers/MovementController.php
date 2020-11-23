<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMovementRequest;
use App\Models\HeadStom;
use App\Models\DetStom;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\Movement;
use App\Models\User;
use App\Models\Role;
use App\Models\Barang;
use Carbon\Carbon;
use DB;

class MovementController extends Controller
{
    public function __construct (User $user, Role $role, HeadStom $movement, Barang $barang) 
    {
        $this->userRepo     = $user;
        $this->roleRepo     = $role;
        $this->movementRepo   = $movement;
        $this->barangRepo   = $barang;
    }
    
    public function index()
    {
        $user = Auth::user();
        $movement = $this->movementRepo->getAll();

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
                    'edit' => route('admin.movement.edit', $movement->id),
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
        $roles = $this->userRepo->getAll();
        $movement = $this->movementRepo->getAll();
        
        return view("backend.order.movement.create")->with([
            'user' => $user,
            'barang' => $barang,
            'roles' => $roles,
            'movement' => $movement,
        ]);

    }

    public function store(Request $request)
    {
        $data1 = $request->all();

        $movement = new HeadStom();
        $movement->no_sm = $request->input('no_sm');
        $movement->no_member = $request->input('no_member');
        $movement->nama = $request->input('nama_member');
        $movement->tgl_pinjam = $request->input('tgl_pinjam');
        $movement->keterangan = $request->input('keterangan');
        $movement->tipe_move = $request->input('tipe_move');
        $movement->kassir = $request->input('kassir');

        foreach ($request->kode_barang as $key=>$kode_barang) {
        $data = array (
        'no_sm' => $request->no_sm,
        'kode_barang' => $request->kode_barang[$key],
        'nama_barang' => $request->nama[$key],
        'jenis' => $request->jenis[$key],
        'jumlah' => $request->jumlah[$key],
        );
        DetStom::insert($data);
        }

        if (empty($movement)){
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data belum diisi</strong>')->error()->important();
            return redirect()->route('admin.movement.add');
            
        } else{
            $movement->save();
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Data movement berhasil ditambah</strong>')->success()->important();
            return redirect()->route('admin.movement.index');

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
        $roles = $this->roleRepo->getAll();

        return view('backend.order.movement.edit')->with([
            'user' => $user,
            'roles' => $roles,
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

    // public function update_movement(Request $request)
    // {
    //     $headstom = HeadStom::find($request['no_invoice']);
    //     if ($headstom) {
    //         $headstom->tanggal = date('Y-m-d', strtotime($request['tanggal']));
    //         $headstom->kode_cust = $request['no_member'];
    //         $headstom->nama = $request['nama'];
    //         $headstom->note = $request['tipe_move'];
    //         $headstom->note = $request['note'];

    //         if ($headstom->save()) {

    //             foreach ($request['detail_barang'] as $row) {
    //                 $data[] = explode(',', $row);
    //             }
    //             unset($data[0]);

    //             foreach ($data as $row) {
    //                 $kode_barang = str_replace('undefined', '', $row[0]);
    //                 $nama       = $row[1];
    //                 $jenis      = $row[2];
    //                 $jumlah     = $row[3];

    //             $detail = DetStom::select('tb_det_stom.*')
    //                     ->join('tb_head_stom', 'tb_head_stom.no_sm', 'tb_det_stom.no_sm')
    //                     ->where('tb_det_stom.no_sm', $request['no_invoice'])
    //                     ->where('tb_det_stom.kode_barang', $kode_barang)
    //                     ->where('tb_head_stom.kode_cust', $request['no_member'])
    //                     ->whereMonth('tb_det_jual.created_at', date('m'))
    //                     ->get();


    //                     $detStom = DetStom::create([
    //                         'no_sm'       => $request['no_invoice'],
    //                         'kode_barang' => $kode_barang,
    //                         'nama'        => $nama,
    //                         'jenis'       => $jenis,
    //                         'jumlah'      => $jumlah,
    //                     ]);
    //                     if ($detStom) {
    //                         $barang = Barang::find($kode_barang);
    //                         $barang->stok = $barang->stok - $jumlah;
    //                         $barang->save();
    //                     }
    //         }
    //     }
        // return response()->json([
        //     'success' => true,
        //     'redirect_url' => route('admin.movement.index'),
        // ]);

    // }
    // }
}
