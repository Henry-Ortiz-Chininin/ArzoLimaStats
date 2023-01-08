<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;

class CasaController extends Controller
{
    //

    public function parroquia($parroquia)
    {        
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        return view('casa.parroquia',['Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
    }
}
