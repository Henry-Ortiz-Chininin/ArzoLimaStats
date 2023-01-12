<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;
use App\Models\sacramen;

class SacramentoController extends Controller
{
    //
    public function index($parroquia)
    {   
        $Sacramentos = sacramen::where('c_parroquia',$parroquia)->get();
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();

        return view('sacramento.index')
                ->with('Sacramentos',$Sacramentos)
                ->with('Parroquia',$Parroquia)
                ->with('codigo',$parroquia);
    }
}
