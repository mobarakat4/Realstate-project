<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThemeContoller extends Controller
{
    //
    public function light(){
        session(['light'=>true]);
        return redirect()->back();
    }
    public function dark(){
        session()->forget('light');
        return redirect()->back();
    }
}
