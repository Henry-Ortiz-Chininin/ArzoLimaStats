<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;

class SacramentoController extends Controller
{
    //
    public function index($parroquia)
    {        
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        return view('sacramento.index',['Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
    }
}
