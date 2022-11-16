<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParroquiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('parroquia.index');
    }
    
}
