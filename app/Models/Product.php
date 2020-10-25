<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tb_barang';
    protected $primaryKey = 'kode_barang';
}
