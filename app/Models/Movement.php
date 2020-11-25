<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $table = 'tb_movement';

    // no protection on field
    protected $guarded = ['id'];

    public function getAll() {
        return Movement::all();
    }

    public function addMovement($input) 
    {
        $movement = Movement::create($input);
        return $movement;
    }
}
