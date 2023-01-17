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
        $Catequistas=tcateq::where('c_parroquia',$parroquia)->orderBy('c_anno','desc')->get();
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        return view('catequista.index',['Parroquia'=>$Parroquia, 'Catequistas'=>$Catequistas, 'codigo'=>$parroquia]);
    }


    public function nuevo($parroquia)
    {        
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();

        return view('catequista.nuevo',['Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
    }

    public function editar($parroquia, $anno)
    {        
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        $Catequista = tcateq::where('c_parroquia',$parroquia)
                            ->where('c_anno',$anno)->first();

        return view('catequista.editar',['Catequista'=>$Catequista, 'Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
    }

    public function guardar(Request $request){

        $request->validate([
            'Agno'=>'required'
        ]);

        $parroquiaId = $request->route('parroquia');

        $record = tcateq::where('c_parroquia',$parroquiaId)
                            ->where('c_anno',$request->get('Agno'))->first();

        if($record){
            $record->c_parroquia=$parroquiaId;
            $record->c_anno=$request->get('Agno');
            $record->n_cateq=$request->get('n_cateq');
            $record->n_agenp=$request->get('n_agenp');
            $record->save();
        }else{
            $record= tcateq::create([
                'c_parroquia'=>$parroquiaId,
                'c_anno'=>$request->get('Agno'),
                'n_cateq'=>$request->get('n_cateq'), 
                'n_agenp'=>$request->get('n_agenp')   
            ]);
            $record->save();            
        }

        return redirect()->route('catequista.editar', [$parroquiaId,$request->get('Agno')]);
    }



}
