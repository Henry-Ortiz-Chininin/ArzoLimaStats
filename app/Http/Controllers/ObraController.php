<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;

class ObraController extends Controller
{
    //

    public function parroquia($parroquia)
    {        
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        return view('obra.parroquia',['Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
    }
}
