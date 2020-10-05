<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

use App\Models\TbHeadJual;
use App\Models\TbDetJual;
use App\Models\TbMember;

class PenjualanController extends Controller
{
    public function index()
    {

        $items = TbHeadJual::with('detjual')->get();
       
        // dd($items);

        return view('backend.order.penjualan.index')->with([
            'items' => $items,
        ]);
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
}
