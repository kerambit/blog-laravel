<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{

    public function index () {

        $info_var = 'BX is finally dead';
        return view('index')->with('message', $info_var); //первый аргумент название переменной, второй - значение

    }
}
