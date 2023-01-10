<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;
use App\Models\capillas;
use App\Models\distritos;


class CapillaController extends Controller
{
    //

    public function index($parroquia)
    {        
        $Distritos=distritos::all();
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        $Capillas = capillas::where('c_parroquia',$parroquia)->get();

        return view('capilla.index',['Distritos'=>$Distritos,'Capillas'=>$Capillas, 'Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
    }
}
