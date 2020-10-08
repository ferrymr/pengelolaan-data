<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;

use App\Models\TbHeadJual;
use App\Models\TbDetJual;
use App\Models\TbMember;
use App\Models\TbBarang;
use App\Models\TbHeadPack;


class PenjualanController extends Controller
{
    public function index()
    {

        $items = TbHeadJual::with('detjual')->get();
        // $items = TbHeadJual::all();

        dd($items);
       
       

         return view('backend.order.penjualan.index', compact('items'));
    }

    public function datatable() {

        $items = TbHeadJual::with('detjual')->get();

        return Datatables::of($items)
            ->editColumn('role', function($user) {
                return $user->roles[0]->display_name;
            })
            ->editColumn('created_at', function($user) {
                return date('d F Y', strtotime($user->created_at));
            })
            ->addColumn('action', function ($user){
                return [
                    'edit' => route('admin.user.edit', $user->id),
                    'hapus' => route('admin.user.delete', $user->id),
                ];
            })
            ->escapeColumns([])
            ->make(true);

        // return Datatables::of(TbHeadJual::query())->make(true);

    }

    public function create()
    {
        return view("backend.order.penjualan.create");
    }

    public function store(Request $request)
    {
        $dates = Carbon::now();
        $index = $dates->format('Y') . '/INV' . '/' . substr(rand(),0,5); 

        $this->validate($request, [
            'no_do' => 'required|string',
        ]);

        $newPenjualan = TbHeadJual::create([
            'no_do' => $request->no_do
        ]);
        

        return view('backend.order.penjualan.index');
        

    }

    // ====================================GET NAMA MEMBER===========================================
    public function getNama(Request $request)
    {
        $no_member = $request->get('no_member');
        if($request->ajax()) {
            $data = '';
            $qry = DB::select("SELECT * FROM tb_member where no_member='$no_member'");
            foreach ($qry as $q) {
                $data = array(
                        'nama'  =>  $q->nama,
                    );
            }
            echo json_encode($data);
        }

    }

    public function create_invoice()
    {
        $data = TbHeadJual::orderBy('created_at','DESC')->limit(1)->get();

        if (isset($data[0]['no_do'])){
            $invoice = substr($data[0]['no_do'],9);
            $invoice = abs($invoice)+1;
            $invoice = str_pad($invoice,5,'0',STR_PAD_LEFT);
            $dates = Carbon::now();
            $index = $dates->format('Y') . '/INV' . '/'.$invoice;
            
            $create = TbHeadJual::create([
                'no_do' => $index
            ]);

            $create = TbDetJual::create([
                'no_do' => $index
            ]);
            return $index; 
        } else {
            $dates = Carbon::now();
            $index = $dates->format('Y') . '/INV' . '/00001';
            
            $create = TbHeadJual::create([
                'no_do' => $index
            ]);

            $create = TbDetJual::create([
                'no_do' => $index
            ]);
            return $index; 
        }
        
    }

    public function create_kode(Request $request)
    {
        // dd($request->all());
        // $data = TbBarang::where('kode_barang',$request->kode_barang)->count();
        // $data2 = TbHeadPack::where('kode_pack',$request->kode_barang)->count();
        // if($data>0){
        //     return $request->nama;
        // } else {
        //     return $request->jenis;
        // }
     
        // dd($data);
        $kode_barang = $request->get('kode_barang');
        if($request->ajax()) {
            $data = '';
            $qry = DB::select("SELECT * FROM tb_barang where kode_barang='$kode_barang'");
            foreach ($qry as $q) {
                $data = array(
                        'nama'  =>  $q->nama,
                        'jenis' =>  $q->jenis,
                        'h_member' => $q->h_member,
                    );
            }
            echo json_encode($data);
        }
    }

}
