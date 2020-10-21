<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\User;
use App\Models\Role;
use App\Models\ViewBarang;
use Illuminate\Support\Facades\DB;

class ViewBarangController extends Controller
{
    public function index() {
        $viewbarang = ViewBarang::with('barang')->get();
        return view('backend.master.viewbarang.index', compact('viewbarang'));
        
    }

}
