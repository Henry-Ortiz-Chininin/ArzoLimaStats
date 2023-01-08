<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;

class CatequistaController extends Controller
{
    //

    public function index($parroquia)
    {        
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        return view('catequista.index',['Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
    }

}
