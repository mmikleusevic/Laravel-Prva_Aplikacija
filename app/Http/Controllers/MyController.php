<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//kontroleri vježba
class MyController extends Controller
{
    public function metodajedan()
    {
        $txt = "stranica";
        return view('mojView.stranica',compact('txt'));
    }
    public function metodadva()
    {
        $txt = "broj";
        return view('mojView.broj',compact('txt'));
    }
    public function metodatri()
    {
        $txt = "znamenka";
        return view('mojView.znamenka',compact('txt'));
    }
}
