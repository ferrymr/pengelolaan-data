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
use App\Models\Barang;
use App\Models\TbHeadPack;
use App\Models\User;


class PenjualanController extends Controller
{
    public function index()
    {

        $items = TbHeadJual::with('detjual')->get();

        return view('backend.order.penjualan.index', compact('items'));
    }

    public function datatable()
    {

        $items = TbHeadJual::with('detjual')->get();

        return Datatables::of($items)
            ->escapeColumns([])
            ->make(true);
    }

    public function create()
    {
        return view("backend.order.penjualan.create");
    }

    public function store(Request $request)
    {
        $dates = Carbon::now();
        $index = $dates->format('Y') . '/INV' . '/' . substr(rand(), 0, 5);

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

        $data = User::select('name as nama')->where('no_member', $no_member)->firstOrFail();
        // $data = TbMember::select('nama')->where('no_member', $no_member)->firstOrFail();
        return response()->json($data);
    }

    public function create_invoice()
    {
        $data = TbHeadJual::orderBy('created_at', 'DESC')->limit(1)->get();

        if (isset($data[0]['no_do'])) {
            $invoice = substr($data[0]['no_do'], 9);
            $invoice = abs($invoice) + 1;
            $invoice = str_pad($invoice, 5, '0', STR_PAD_LEFT);
            $dates = Carbon::now();
            $index = $dates->format('Y') . '/INV' . '/' . $invoice;

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
        $kode_barang = $request->get('kode_barang');
        if ($request->ajax()) {
            $no_member = $request->no_member;
            $kode_barang = $request->kode_barang;
            $jmljual = \App\Models\TbDetJual::where('kode_barang', $kode_barang)
                ->whereHas('headjual', function ($query) use ($no_member) {
                    $query->where('kode_cust', $no_member);
                })
                ->where('created_at', '>', date('Y-m-d', strtotime('-30 days')))
                ->sum('jumlah');
            if ($jmljual >= 2) {
                return response()->json([
                    'msg' => 'member telah membeli barang ini sebanyak 2x dalam sebulan'
                ], 400);
            }

            $data = Barang::select('nama', 'jenis', 'h_member')->where('kode_barang', $kode_barang)->first();
            if ($data == null) {
                $data = TbHeadPack::select('nama_pack as nama', 'jenis_pack as jenis', 'h_member')->where('kode_pack', $kode_barang)->first();
            }
            return response()->json($data, 200);
        }
    }

    public function update_penjualan(Request $request)
    {
        $headJual = TbHeadJual::find($request['no_invoice']);
        if ($headJual) {
            $headJual->tanggal = date('Y-m-d', strtotime($request['tanggal']));
            $headJual->kode_cust = $request['no_member'];
            $headJual->nama = $request['nama'];
            $headJual->sub_total = $request['sub_total'];
            $headJual->trans = $request['trans'];
            $headJual->bayar = $request['bayar'];
            $headJual->cc = $request['cc'];
            $headJual->note = $request['note'];



            if ($headJual->save()) {
                foreach ($request['detail_barang'] as $row) {
                    $data[] = explode(',', $row);
                }
                unset($data[0]);

                foreach ($data as $row) {
                    $kode_barang = str_replace('undefined', '', $row[0]);
                    $nama       = $row[1];
                    $jenis      = $row[2];
                    $jumlah     = $row[3];
                    $harga      = $row[4];
                    $total      = $row[5];

                    $detail = TbDetJual::select('tb_det_jual.*')
                        ->join('tb_head_jual', 'tb_head_jual.no_do', 'tb_det_jual.no_do')
                        ->where('tb_det_jual.no_do', $request['no_invoice'])
                        ->where('tb_det_jual.kode_barang', $kode_barang)
                        ->where('tb_head_jual.kode_cust', $request['no_member'])
                        ->whereNotIn('tb_det_jual.kode_barang', ['OK001', 'OK002'])
                        ->whereMonth('tb_det_jual.created_at', date('m'))
                        ->get();

                    $detail2 = TbDetJual::select('tb_det_jual.*')
                        ->join('tb_head_jual', 'tb_head_jual.no_do', 'tb_det_jual.no_do')
                        ->where('tb_det_jual.kode_barang', $kode_barang)
                        ->where('tb_head_jual.kode_cust', $request['no_member'])
                        ->whereNotIn('tb_det_jual.kode_barang', ['OK001', 'OK002'])
                        ->whereMonth('tb_det_jual.created_at', date('m'))
                        ->get();

                    if ($detail->count() != 0) {
                        foreach ($detail as $cek) {

                            if ($cek->jumlah + $jumlah > 2) {
                                TbHeadJual::find($headJual->no_do)->delete();
                                abort(404);
                            }
                        }
                    }

                    if ($jumlah > 2) {
                        TbHeadJual::find($headJual->no_do)->delete();
                        return response()->json([
                            'msg' => 'member telah melebihi batas pembelian sebanyak 2x dalam sebulan'
                        ], 400);
                    }

                    if ($detail2->count() != 0) {
                        foreach ($detail2 as $cek) {

                            if ($cek->jumlah + $jumlah > 2) {
                                TbHeadJual::find($headJual->no_do)->delete();
                                abort(404);
                            }
                        }
                    }

                    if ($jumlah > 2) {
                        TbHeadJual::find($headJual->no_do)->delete();
                        // abort(404);
                        return response()->json([
                            'msg' => 'member telah membeli barang sebelumnya & tidak bisa membeli lebih dari 2x'
                        ], 400);
                    }

                    $detJual = TbDetJual::create([
                        'no_do'       => $request['no_invoice'],
                        'kode_barang' => $kode_barang,
                        'nama'        => $nama,
                        'jenis'       => $jenis,
                        'jumlah'      => $jumlah,
                        'harga'       => $harga,
                        'total'       => $total
                    ]);
                    if ($detJual) {
                        $barang = Barang::find($kode_barang);
                        if ($barang == null) {
                            $barang = TbHeadPack::findOrFail($kode_barang);
                        }
                        $barang->stok = $barang->stok - $jumlah;
                        $barang->save();
                    }
                }

                if ($request['ongkir'] == 'OK001') {
                    $nama_ongkir = "ONGKIR DALAM KOTA";
                } else {
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
            return response()->json([
                'success' => true,
                'redirect_url' => route('admin.penjualan.index'),
            ]);
        }
    }
}
