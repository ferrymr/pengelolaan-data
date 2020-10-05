<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'cn_barang';
    protected $primaryKey = 'kode_barang';
}
