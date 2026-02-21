<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    // Check Auth
    public function panel()
    {
        return view('panel');
    }

    public function mqtt()
    {
        return view('mqtt.index');
    }
}
