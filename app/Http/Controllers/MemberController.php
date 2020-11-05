<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TbHeadJual;
use App\Models\DaftarMember;
use App\Models\KonfirmasiDaftar;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function signup() {
        $banks = array('BCA', 'BNI', 'BRI', 'MANDIRI');
        $user = Auth::user();
        $transactions = TbHeadJual::where('user_id', $user->id)->get();
        
        // check pendaftaran
        $checkDaftarMember = DaftarMember::where('user_id', $user->id)
                                        ->where('jenis', 'member')
                                        ->first();
        $checkDaftarReseller = DaftarMember::where('user_id', $user->id)
                                        ->where('jenis', 'reseller')
                                        ->first();

        // check konfirmasi pendaftaran
        if($checkDaftarMember) {
            $checkKonfirmasiPendaftaranMember = KonfirmasiDaftar::where('tb_daftar_member_id', $checkDaftarMember->id)->first();
        } else {
            $checkKonfirmasiPendaftaranMember = false;
        }

        if($checkDaftarReseller) {
            $checkKonfirmasiPendaftaranReseller = KonfirmasiDaftar::where('tb_daftar_member_id', $checkDaftarReseller->id)->first();
        } else {
            $checkKonfirmasiPendaftaranReseller = false;
        }

        return view('frontend.profiles.members.signup-form', 
                compact(
                    'banks',
                    'transactions',
                    'checkDaftarMember',
                    'checkDaftarReseller',
                    'checkKonfirmasiPendaftaranMember',
                    'checkKonfirmasiPendaftaranReseller'
                )
            );
    }

    public function store(Request $request) 
    {       
        $user = Auth::user();

        $this->validate($request, [
            'jenis' => 'required|string',
            // 'tb_head_jual_id' => 'required|numeric',
            'bank' => 'required|string',
        ]);
            
        try {

            DaftarMember::create([
                'user_id' => $user->id,
                'tb_head_jual_id' => $request->tb_head_jual_id,
                'jenis' => $request->jenis,
                'status' => 0,
                'bank' => $request->bank,
                'grand_total' => $request->jenis == "member" ? 10000 : 500000,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
            flash('Terimakasih telah mendaftar sebagai ' . $request->jenis . '. Kami akan segera memprosesnya')->success()->important();
            return redirect(route('profile.index'));
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function konfirmasi(Request $request) 
    {       

        $user = Auth::user();

        $this->validate($request, [
            'bank' => 'required',
            'rekening_number' => 'required',
            'rekening_name' => 'required',
            'filename' => 'required'
        ]);
            
        try {

            // konfirmasi member
            if($request->jenis == 'member') {

                // upload file
                if(!empty($request->file('filename'))) {
                    // upload file
                    $file = $request->file('filename');
                    $filename = 'konfirmasi-pendaftaran-member-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('public/konfirmasi_pendaftaran', $filename);
                } else {
                    $filename = '';
                }

                // get daftar member tb_daftar_member_id
                $checkDaftarMember = DaftarMember::where('user_id', $user->id)
                                        ->where('jenis', 'member')
                                        ->first();
                
                $input = [
                    'tb_daftar_member_id' => $checkDaftarMember->id,
                    'user_id' => $user->id,
                    'bank' => $request->bank,
                    'rekening_number' => $request->rekening_number,
                    'rekening_name' => $request->rekening_name,
                    'filename' => $filename,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ];

                KonfirmasiDaftar::create($input);

            } else {

                // upload file
                if(!empty($request->file('filename'))) {
                    // upload file
                    $file = $request->file('filename');
                    $filename = 'konfirmasi-pendaftaran-reseller-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('public/konfirmasi_pendaftaran', $filename);
                } else {
                    $filename = '';
                }

                // get daftar reseller tb_daftar_reseller_id
                $checkDaftarReseller = DaftarMember::where('user_id', $user->id)
                                        ->where('jenis', 'reseller')
                                        ->first();

                $input = [
                    'tb_daftar_member_id' => $checkDaftarReseller->id,
                    'user_id' => $user->id,
                    'bank' => $request->bank,
                    'rekening_number' => $request->rekening_number,
                    'rekening_name' => $request->rekening_name,
                    'filename' => $filename,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ];

                KonfirmasiDaftar::create($input);

            }
            
            // flash
            flash('Konfirmasi pembayaran sudah dikirim, team kami akan segera mengkonfirmasi')->success();
            
            return redirect(route('profile.index'));
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
