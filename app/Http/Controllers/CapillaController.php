<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;
use App\Models\capillas;


class CapillaController extends Controller
{
    //

    public function index($parroquia)
    {        
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        $Capillas = capillas::where('c_parroquia',$parroquia)->get();

        return view('capilla.index',['Capillas'=>$Capillas, 'Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
    }
}
