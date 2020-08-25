<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() {
        $user = auth()->user();

        echo "<pre>";
        echo $user->id . '<br>';
        echo $user->name . '<br>';
        echo $user->email . '<br>';
        echo $user->photo . '<br>';
        echo "</pre>";
    }
}
