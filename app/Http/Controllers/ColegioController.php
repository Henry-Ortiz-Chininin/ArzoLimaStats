<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;
use App\Models\colespar;
use App\Models\distritos;

class ColegioController extends Controller
{
    //

    public function parroquia($parroquia)
    {   
        $Distritos=distritos::all();
        $Colegios = colespar::where('c_parroquia','LIKE', "%{$parroquia}%")->get();
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();

        return view('colegio.parroquia',['Distritos'=>$Distritos,'Colegios'=>$Colegios,'Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
    }
}
