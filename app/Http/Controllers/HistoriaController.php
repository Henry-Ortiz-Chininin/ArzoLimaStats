<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;
use App\Models\histopar;
use App\Models\cargos;



class HistoriaController extends Controller
{
    //
    public function parroquia($parroquia)
    {        
        $Historia=histopar::where('c_parroquia',$parroquia)->get();
        $Cargos = cargos::all(); 

        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        return view('historia.parroquia')
                    ->with('Historia',$Historia)
                    ->with('Parroquia',$Parroquia)
                    ->with('Cargos',$Cargos)
                    ->with('codigo',$parroquia);
    }
}
