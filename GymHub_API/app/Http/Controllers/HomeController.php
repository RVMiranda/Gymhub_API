<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function eduardo(){
        return "Eduardo es un tremendo gilipollas";
    }

    public function home(){
        return view('homedashboard');
    }

    public function homeLogin(){
        return view('homelogin');
    }
}
