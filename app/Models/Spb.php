<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spb extends Model
{
    protected $table = 'tb_spb';

    // no protection on field
    protected $guarded = ['id'];
}
