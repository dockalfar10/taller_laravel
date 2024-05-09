<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontAdmitidosController extends Controller
{
    public function index()
    {
        return view('front-admitidos.index');
    }
}
