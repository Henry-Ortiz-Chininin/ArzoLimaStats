<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;
use App\Models\casaconp;
use App\Models\congrega;
use App\Models\distritos;

class CasaController extends Controller
{
    //

    public function parroquia($parroquia)
    {   
        $Distritos=distritos::all();
        $Casas = casaconp::where('c_parroquia',$parroquia)->get();
        $Congregaciones = congrega::all();
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        return view('casa.parroquia')
                    ->with('Distritos',$Distritos)
                    ->with('Casas',$Casas)
                    ->with('Congregaciones',$Congregaciones)
                    ->with('Parroquia',$Parroquia)
                    ->with('codigo',$parroquia);
    }
}
