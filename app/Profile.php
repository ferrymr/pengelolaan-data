<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'cn_customer';

    protected $fillable = [
        'nama', 'tgl_lahir', 'telepon', 'email'
    ];
}
