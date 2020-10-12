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

        // dd($items);
       
       

         return view('backend.order.penjualan.index', compact('items'));
    }

    public function datatable() {

        $items = TbHeadJual::with('detjual')->get();

        return Datatables::of($items)
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

    public function update(Request $request, $no_do)
    {
        TbHeadJual::find($no_do)->update([
            'tanggal'   => $request->tanggal,
            'no_member' => $request->no_member,
            'nama'      => $request->nama
        ]);


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
            return $index; 
        } else {
            $dates = Carbon::now();
            $index = $dates->format('Y') . '/INV' . '/00001';
            
            $create = TbHeadJual::create([
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

    public function update_penjualan(Request $request)
    {
        $headJual = TbHeadJual::find($request['no_invoice']);
        if($headJual){
            $headJual->tanggal = date('Y-m-d',strtotime($request['tanggal']));
            $headJual->kode_cust = $request['no_member'];
            $headJual->nama = $request['nama'];
            $headJual->sub_total= $request['sub_total'];
            $headJual->trans = $request['trans'];
            $headJual->bayar = $request['bayar'];
            $headJual->cc = $request['cc'];
            $headJual->note = $request['note'];

            

            if($headJual->save()){
                foreach($request['detail_barang'] as $row){
                    $data[] = explode(',',$row);
                }
                unset($data[0]);
               
                foreach($data as $row){
                    $kode_barang = str_replace('undefined','',$row[0]);
                    $nama       = $row[1];
                    $jenis      = $row[2];
                    $jumlah     = $row[3];
                    $harga      = $row[4];
                    $total      = $row[5];
    
                        $detJual = TbDetJual::create([
                        'no_do'       => $request['no_invoice'],
                        'kode_barang' => $kode_barang,
                        'nama'        => $nama,
                        'jenis'       => $jenis,
                        'jumlah'      => $jumlah,
                        'harga'       => $harga,
                        'total'       => $total
                        ]);
                        if ($detJual){
                            $barang = TbBarang::find($kode_barang);
                            $barang->stok = $barang->stok-$jumlah;
                            $barang->save();
                        }
    
                }

                if($request['ongkir'] == 'OK001'){
                    $nama_ongkir = "ONGKIR DALAM KOTA";
                }else{
                    $nama_ongkir = "ONGKIR LUAR KOTA";
                }
                $ongkir = TbDetJual::create([
                    'no_do'       => $request['no_invoice'],
                    'kode_barang' => $request['ongkir'],
                    'nama'        => $nama_ongkir,
                    'jenis'       => 'BIAYA LAIN-LAIN',
                    'jumlah'      => '1',
                    'harga'       => $request['harga'],
                    'total'       => $request['harga']
                    ]);
            }
            return redirect()->route('admin.penjualan.index');
        }

    }
}