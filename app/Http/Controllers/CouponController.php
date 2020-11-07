<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\Coupon;
use App\Models\CouponByUser;
use App\Models\CouponByProduct;
use App\Models\Barang;
use App\Models\User;

class CouponController extends Controller
{
    public function __construct (
        Coupon $coupon
    ) {
        $this->couponRepo = $coupon;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $coupons = $this->couponRepo->getAll();
        // dd($coupons);
        return view('backend.store.coupon.index')->with([
            'user' => $user,
            'coupons' => $coupons,
        ]);
    }

    public function datatable() {

        $coupons = $this->couponRepo->getAll();

        return Datatables::of($coupons)
            ->addColumn('status', function ($coupon){
                if($coupon->flag_active == 1) {
                    return '<span class="badge bg-success">Active</span>';
                } else {
                    return '<span class="badge bg-danger">Non Active</span>';
                }                
            })
            ->addColumn('action', function ($coupon){
                return [
                    'edit' => route('admin.coupon.edit', $coupon->id),
                    'hapus' => route('admin.coupon.delete', $coupon->id),
                ];
            })
            ->escapeColumns([])
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $products = Barang::get();
        $users = User::get();

        return view('backend.store.coupon.create')->with([
            'user' => $user,
            'products' => $products,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // insert to coupon table
        $coupon = [
            'code' => $request->code,
            'description' => $request->description,
            'role_id' => null,
            'value' => $request->value,
            'flag_jenis' => $request->flag_jenis,
            'flag_active' => $request->flag_active,
            'expired' => $request->expired,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
        $kupon = $this->couponRepo->addCoupon($coupon);

        // insert to coupon by prod
        if(count($request->tb_barang_id) > 0) {
            foreach($request->tb_barang_id as $barang) {
                if(!empty($barang)) {
                    $product = [
                        'tb_barang_id' => $barang,
                        'coupon_id' => $kupon->id,
                    ];
                    CouponByProduct::insert($product);
                }                
            }
        }

        // insert to coupon by user
        if(count($request->user_id) > 0) {
            foreach($request->user_id as $row) {
                if(!empty($row)) {
                    $user = [
                        'user_id' => $row,
                        'coupon_id' => $kupon->id,
                    ];
                    CouponByUser::insert($user);
                }
            }
        }

        if(!$this->couponRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Coupon Berhasil Ditambah</strong>')->success();
            return redirect()->route('admin.coupon.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Coupon </strong> ' . $this->couponRepo->error)->error()->important();
            return redirect()->route('admin.coupon.add')->withInput()->withError();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $currentCoupon = $this->couponRepo->findId($id);
        $products = Barang::get();
        $users = User::get();
        // get related with user
        $currentCouponUser = CouponByUser::where('coupon_id', $id)->get();
        // get related with product
        $currentCouponProduct = CouponByProduct::where('coupon_id', $id)->get();

        return view('backend.store.coupon.edit')->with([
            'user' => $user,
            'currentCoupon' => $currentCoupon,            
            'products' => $products,
            'users' => $users,
            'currentCouponUser' => $currentCouponUser,
            'currentCouponProduct' => $currentCouponProduct,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // password kosong
        $param = array(
            "code" => $request->input('code'),
            "flag_jenis" => $request->input('flag_jenis'),
            "value" => $request->input('value'),
            "description" => $request->input('description'),
            "expired" => $request->input('expired'),
            "flag_active" => $request->input('flag_active'),
        );
    
        $Coupon = $this->couponRepo->editCoupon($param, $id);

        // insert to coupon by prod
        if(count($request->tb_barang_id) > 0) {

            // delete the existing data
            CouponByProduct::where('coupon_id', $id)->delete();

            foreach($request->tb_barang_id as $barang) {
                if(!empty($barang)) {
                    $product = [
                        'tb_barang_id' => $barang,
                        'coupon_id' => $id,
                    ];
                    CouponByProduct::insert($product);
                }                
            }
        }

        // insert to coupon by user
        if(count($request->user_id) > 0) {

            // delete the existing data
            CouponByUser::where('coupon_id', $id)->delete();

            foreach($request->user_id as $row) {
                if(!empty($row)) {
                    $user = [
                        'user_id' => $row,
                        'coupon_id' => $id,
                    ];
                    CouponByUser::insert($user);
                }
            }
        }

        if(!$this->couponRepo->error) {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Coupon berhasil diupdate</strong>')->success();
            return redirect()->route('admin.coupon.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Coupon </strong> ' . $this->couponRepo->error)->error()->important();
            return redirect()->route('admin.coupon.edit')->withInput()->withError();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->couponRepo->deleteCoupon($id);

        // delete the existing data
        CouponByProduct::where('coupon_id', $id)->delete();

        // delete the existing data
        CouponByUser::where('coupon_id', $id)->delete();

        if(!empty($data)) {
            flash()->success('<i class="fa fa-info"></i>&nbsp; <strong>Coupon berhasil dihapus</strong>');
            return redirect()->route('admin.coupon.index');
        } else {
            flash()->success('<i class="fa fa-info"></i>&nbsp; <strong>Coupon Tidak Ditemukan</strong>');
            return redirect()->route('admin.coupon.index');
        }
    }
}
