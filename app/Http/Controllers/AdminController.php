<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard(){
        dd(auth()->user());
        return view("admin.dashboard");
    }
}
