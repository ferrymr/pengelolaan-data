<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function show()
    {
        $data = DB::table('tb_barang')->get();
        
    }
}
