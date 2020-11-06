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

class MovementController extends Controller
{
    public function __construct (User $user, Role $role, Movement $movement) 
    {
        $this->userRepo     = $user;
        $this->roleRepo     = $role;
        $this->movementRepo   = $movement;
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
                    'view' => route('admin.barang.view', $movement->no_faktur),
                    'edit' => route('admin.movement.edit', $movement->no_faktur),
                    'hapus' => route('admin.movement.delete', $movement->no_faktur),
                ];
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create()
    {
        $user = Auth::user();
        $roles = $this->userRepo->getAll();
        
        return view("backend.order.movement.create");

    }

    public function store(Request $request)
    {
        $dates = Carbon::now();
        $index = $dates->format('Y') . '/SM' . '/' . substr(rand(), 0, 5);

        $this->validate($request, [
            'no_sm' => 'required|string',
        ]);

        $newMovement = HeadStom::create([
            'no_sm' => $request->no_sm
        ]);


        return view('backend.order.movement.index');
        
        
    }

    public function view($no_faktur)
    {
        $user = Auth::user();
        $movement = Movement::where('no_faktur', $no_faktur)->first();
        $roles = $this->roleRepo->getAll();
        return view('backend.order.movement.view')->with([
            'user' => $user,
            'roles' => $roles,
            'movement' =>$movement,
        ]);
    }

    public function edit($no_faktur)
    {
        
        $user = Auth::user();
        $movement = Movement::where('no_faktur', $no_faktur)->first();
        $roles = $this->roleRepo->getAll();

        return view('backend.order.movement.edit')->with([
            'user' => $user,
            'roles' => $roles,
            'movement' =>$movement
        ]);
    }

    public function getNama(Request $request)
    {
        $no_member = $request->get('no_member');

        $data = User::select('name as nama')->where('no_member', $no_member)->firstOrFail();
        return response()->json($data);
    }

    public function create_invoice()
    {
        $data = HeadStom::orderBy('created_at', 'DESC')->limit(1)->get();

        if (isset($data[0]['no_sm'])) {
            $invoice = substr($data[0]['no_sm'], 9);
            $invoice = abs($invoice) + 1;
            $invoice = str_pad($invoice, 5, '0', STR_PAD_LEFT);
            $dates = Carbon::now();
            $index = $dates->format('Y') . '/SM' . '/' . $invoice;

            $create = HeadStom::create([
                'no_sm' => $index
            ]);
            return $index;
        } else {
            $dates = Carbon::now();
            $index = $dates->format('Y') . '/SM' . '/00001';

            $create = HeadStom::create([
                'no_sm' => $index
            ]);

            return $index;
        }
    }

    public function create_kode(Request $request)
    {
        $kode_barang = $request->get('kode_barang');
        if ($request->ajax()) {
            $no_member = $request->no_member;
            $kode_barang = $request->kode_barang;
            $data = Barang::select('nama', 'jenis',)->where('kode_barang', $kode_barang)->first();
            return response()->json($data, 200);
        }
    }

    public function update_movement(Request $request)
    {
        $headstom = HeadStom::find($request['no_invoice']);
        if ($headstom) {
            $headstom->tanggal = date('Y-m-d', strtotime($request['tanggal']));
            $headstom->kode_cust = $request['no_member'];
            $headstom->nama = $request['nama'];
            $headstom->note = $request['tipe_move'];
            $headstom->note = $request['note'];

            if ($headstom->save()) {

                foreach ($request['detail_barang'] as $row) {
                    $data[] = explode(',', $row);
                }
                unset($data[0]);

                foreach ($data as $row) {
                    $kode_barang = str_replace('undefined', '', $row[0]);
                    $nama       = $row[1];
                    $jenis      = $row[2];
                    $jumlah     = $row[3];

                $detail = DetStom::select('tb_det_stom.*')
                        ->join('tb_head_stom', 'tb_head_stom.no_sm', 'tb_det_stom.no_sm')
                        ->where('tb_det_stom.no_sm', $request['no_invoice'])
                        ->where('tb_det_stom.kode_barang', $kode_barang)
                        ->where('tb_head_stom.kode_cust', $request['no_member'])
                        ->whereMonth('tb_det_jual.created_at', date('m'))
                        ->get();


                        $detStom = DetStom::create([
                            'no_sm'       => $request['no_invoice'],
                            'kode_barang' => $kode_barang,
                            'nama'        => $nama,
                            'jenis'       => $jenis,
                            'jumlah'      => $jumlah,
                        ]);
                        if ($detStom) {
                            $barang = Barang::find($kode_barang);
                            $barang->stok = $barang->stok - $jumlah;
                            $barang->save();
                        }
            }
        }
        return response()->json([
            'success' => true,
            'redirect_url' => route('admin.movement.index'),
        ]);

    }
    }
}
