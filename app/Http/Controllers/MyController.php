<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//kontroleri vježba
class MyController extends Controller
{
    public function metodajedan()
    {
        return view('stranica');
    }
    public function metodadva()
    {
        return view('broj');
    }
    public function metodatri()
    {
        return view('znamenka');
    }
}
