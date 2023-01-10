<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;
use App\Models\obraspar;
use App\Models\distritos;

class ObraController extends Controller
{
    //

    public function parroquia($parroquia)

    {   $Obras = obraspar::where('c_parroquia',$parroquia)->get();
        $Distritos=distritos::all();
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();

        return view('obra.parroquia')
                            ->with('Distritos',$Distritos)
                            ->with('Obras',$Obras)
                            ->with('Parroquia',$Parroquia)
                            ->with('codigo',$parroquia);
    }
}
