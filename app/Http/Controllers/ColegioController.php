<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;
use App\Models\colespar;

class ColegioController extends Controller
{
    //

    public function parroquia($parroquia)
    {   
        $Colegios = colespar::where('c_parroquia',$parroquia);
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        return view('colegio.parroquia',['Colegios'=>$Colegios,'Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
    }
}
