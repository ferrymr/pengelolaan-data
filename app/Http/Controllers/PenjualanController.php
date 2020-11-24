<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;

use App\Models\Role;
use App\Models\TbHeadJual;
use App\Models\TbDetJual;
use App\Models\Barang;
use App\Models\User;
use App\Mail\OrderConfirmed;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use App\Helpers\Whatsapp;
use App\Models\ShippingAddress;
use App\Mail\OrderCreated;


class PenjualanController extends Controller
{
    public function index()
    {

        $items = TbHeadJual::with('detjual')->get();

        return view('backend.order.penjualan.index', compact('items'));
    }

    public function datatable()
    {

        $data = TbHeadJual::with('detjual')->orderBy('id', "DESC");
        return Datatables::of($data)
            ->addColumn('status', function ($data) {
                return '<span class="badge bg-success">' . $data->status_transaksi . '</span>';
            })

            ->addColumn('action', function ($data) {

                return [
                    'show' => route('admin.penjualan.show', $data->id),
                ];
            })
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
        $index = $dates->format('Y') . 'INV' . substr(rand(), 0, 5);

        $this->validate($request, [
            'no_do' => 'required|string',
        ]);

        $newPenjualan = TbHeadJual::create([
            'no_do' => $request->no_do
        ]);


        return view('backend.order.penjualan.index');
    }

    public function show($id)
    {
        $data = TbHeadJual::with('items.itemDetailHas', 'address', 'user', 'spb')
            ->findOrFail($id);
        return view(
            'backend.order.penjualan.show',
            compact('data')
        );
    }


    // ====================================GET NAMA MEMBER===========================================
    public function getNama(Request $request)
    {
        $no_member = $request->get('no_member');

        $data = User::select('name as nama')->where('no_member', $no_member)->firstOrFail();

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
            $index = $dates->format('Y') . 'INV' . $invoice;

            $create = TbHeadJual::create([
                'no_do' => $index
            ]);

            return $index;
        } else {
            $dates = Carbon::now();
            $index = $dates->format('Y') . 'INV' . '00001';

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

            $data = Barang::select('nama', 'jenis', 'h_member')->where('kode_barang', $kode_barang)->first();
            // if ($data == null) {
            //     $data = TbHeadPack::select('nama_pack as nama', 'jenis_pack as jenis', 'h_member')->where('kode_pack', $kode_barang)->first();
            // }
            return response()->json($data, 200);
        }
    }

    public function update_penjualan(Request $request)
    {
        // dd($request->all());
        $data = TbHeadJual::where('no_do', $request['no_invoice'])->first();
        $dataHead = [
            'user_id' => $request['user_id'],
            'tanggal' => date('Y-m-d', strtotime($request['tanggal'])),
            'no_member' => $request['no_member'],
            'nama' => $request['nama'],
            'sub_total' => $request['sub_total'],
            'trans' => $request['trans'],
            'bayar' => $request['bayar'],
            'cc' => $request['cc'],
            'note' => $request['note'],
            'status_transaksi' => 'PLACE ORDER',
        ];

        $prosesUpdate = TbHeadJual::where('id', $data->id)->update($dataHead);
        // dd($prosesUpdate);

        // dd($data->id);
        $headJual = TbHeadJual::where('id', $data->id);
        // dd($headJual);
        if ($prosesUpdate == 1) {

            foreach ($request['detail_barang'] as $row => $value) {
                // dd($value);
                if ($value != null) {
                    // dd($value);
                    $detail = explode(',', $value);
                    // dd($detail[0][1]);
                    $kode_barang = str_replace('undefined', '', $detail[0]);
                    $nama       = $detail[1];
                    $jenis      = $detail[2];
                    $jumlah     = $detail[3];
                    $harga      = $detail[4];
                    $total      = $detail[5];
                    $no_do      = $detail[6];
                    // dd($nama);

                    $detJual = TbDetJual::create([
                        'tb_head_jual_id' => $data->id,
                        'no_do'       => $request['no_invoice'],
                        'kode_barang' => $kode_barang,
                        'nama'        => $nama,
                        'jenis'       => $jenis,
                        'jumlah'      => $jumlah,
                        'harga'       => $harga,
                        'total'       => $total
                    ]);
                    // dd($detJual);
                    // if ($detJual) {
                    $barang = Barang::where('kode_barang', $kode_barang)->first();
                    // dd($barang->stok);
                    // if ($barang == null) {
                    //     $barang = TbHeadPack::findOrFail($kode_barang);
                    // }
                    $barang->stok = $barang->stok - $jumlah;
                    $barang->save();
                    // }
                }
            }

            if ($request['ongkir'] == 'OK001') {
                $nama_ongkir = "ONGKIR DALAM KOTA";
            } else {
                $nama_ongkir = "ONGKIR LUAR KOTA";
            }
            $ongkir = TbDetJual::create([
                'tb_head_jual_id' => $data->id,
                'no_do'       => $request['no_invoice'],
                'kode_barang' => $request['ongkir'],
                'nama'        => $nama_ongkir,
                'jenis'       => 'BIAYA LAIN-LAIN',
                'jumlah'      => '1',
                'harga'       => $request['harga'],
                'total'       => $request['harga']
            ]);

            return response()->json([
                'success' => true,
                'redirect_url' => route('admin.penjualan.index'),
            ]);
        }
    }

    public function setStatus(Request $request, $id)
    {
        // password kosong
        $param["status_transaksi"] = $request->input('status_transaksi');

        // get transaction
        $getTrans = TbHeadJual::with('items', 'address', 'user')->where('id', $id);

        $data = $getTrans->first();

        if ($data) {
            if (isset($data->user->email)) {
                if ($request->input('status_transaksi') == 'PAYMENT CONFIRMED') {

                    // notif email
                    Mail::to($data->user->email)->send(new OrderConfirmed($data));

                    if (!empty($data->address->telepon_pengirim)) {
                        $phone = $data->address->telepon_pengirim;
                    } else if (!empty($data->user->phone)) {
                        $phone = $data->user->phone;
                    } else {
                        $phone = 0;
                    }
                    // notify to whatsapp
                    $to = $phone;
                    $message = "Terimakasih telah melakukan pembayaran di Toko Kami, pembayaran kakak telah terkonfirmasi. 
                    Kami akan segera memproses pesanannya, ditunggu ya kak.";

                    Whatsapp::sendMSG($to, $message);
                } else if ($request->input('status_transaksi') == 'SHIPPED') {

                    $param["resi"] = $request->input('input_resi');

                    // notif email
                    Mail::to($data->user->email)->send(new OrderShipped($data));

                    if (!empty($data->address->telepon_pengirim)) {
                        $phone = $data->address->telepon_pengirim;
                    } else if (!empty($data->user->phone)) {
                        $phone = $data->user->phone;
                    } else {
                        $phone = 0;
                    }
                    // notify to whatsapp
                    $to = $phone;
                    $message = "Pesanan kakak telah kami pack dan sedang dalam proses pengiriman, ditunggu ya kakak :).
                    Berikut ini nomor resinya " . $param["resi"] . ", bisa di check di https://cekresi.com/. Terimakasih";

                    Whatsapp::sendMSG($to, $message);

                    // update user to member if code status is 2424
                    if ($data->user->status == 2424) {
                        $userUpdate = User::where('id', $data->user->id);

                        $userUpdate = $userUpdate->update([
                            'status' => null
                        ]);

                        // get useragain
                        $userUpdateRole = User::find($data->user->id);

                        // check user role member
                        $assign = Role::where('name', 'member')->first();

                        // change role to member
                        $userUpdateRole->attachRole($assign);
                    }

                    // update user to reseller if code status is 2525
                    if ($data->user->status == 2525) {
                        $userUpdate = User::where('id', $data->user->id);

                        $randCodeReseller = substr(md5(uniqid(mt_rand(), true)), 0, 10);

                        $userUpdate = $userUpdate->update([
                            'apro' => $randCodeReseller,
                            'status' => null
                        ]);

                        // get useragain
                        $userUpdateRole = User::find($data->user->id);

                        // check user role member
                        $assign = Role::where('name', 'reseller')->first();

                        // change role to member
                        $userUpdateRole->attachRole($assign);
                    }
                }
            }
        }

        $trans = $getTrans->update($param);

        if ($trans) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Status pemesanan berhasil diupdate</strong>')->success()->important();
            return redirect()->route('admin.penjualan.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Status pemesanan gagal diupdate </strong>')->error()->important();
            return redirect()->route('admin.penjualan.index')->withError();
        }
    }
}
