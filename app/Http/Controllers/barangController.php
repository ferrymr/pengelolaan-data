<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class barangController extends Controller
{
    public function show()
    {
        $data = DB::table('tb_barang')->get();
        
    }
}
