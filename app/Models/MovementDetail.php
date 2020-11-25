<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovementDetail extends Model
{
    protected $table = 'tb_movement_detail';

    // no protection on field
    protected $guarded = ['id'];

}
