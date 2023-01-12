<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;
use App\Models\tcateq;

class CatequistaController extends Controller
{
    //

    public function index($parroquia)
    {   
        $Catequistas=tcateq::where('c_parroquia',$parroquia)->get();
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        return view('catequista.index',['Parroquia'=>$Parroquia, 'Catequistas'=>$Catequistas, 'codigo'=>$parroquia]);
    }

}
