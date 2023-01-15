<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;
use App\Models\colespar;
use App\Models\distritos;
use Illuminate\Support\Str;

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

    public function nuevo($parroquia)
    {        
        $Distritos=distritos::all();
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();

        return view('colegio.parroquia_nuevo',['Distritos'=>$Distritos, 'Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
    }
    public function editar($parroquia, $colegio)
    {        
        $Distritos=distritos::all();
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        $Colegio = colespar::where('c_parroquia',$parroquia)
                            ->where('codigo',$colegio)->first();

        return view('colegio.parroquia_editar',['Colegio'=>$Colegio, 'Distritos'=>$Distritos, 'Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
    }

    public function guardar(Request $request){

        $request->validate([
            'Nombre'=>'required',
            'Tipo'=>'required',
            'Direccion'=>'required',
            'Distritos'=>'required',
            'Telefono'=>'required'
        ]);

        $parroquiaId = $request->route('parroquia');
        $mytime = date("Y/m/d");

        $codigo = $request->get('codigo'); 
        if($codigo=='')
        {
            $semilla = intval(colespar::where('c_parroquia',$parroquiaId)->max('codigo'))+1;
            $codigo=Str::padLeft($semilla, 3,'0');

            $record= colespar::create([
                'c_parroquia'=>$parroquiaId,
                'codigo'=>$codigo,
                'nombre'=>$request->get('Nombre'),
                'tipcol'=>$request->get('Tipo'),
                'direcc'=>$request->get('Direccion'),
                'distri'=>$request->get('Distritos'),
                'direct'=>$request->get('Director'),
                'telef1'=>$request->get('Telefono'),
                'telfax'=>$request->get('Fax'),
                'guarde'=>$request->get('Guarderia'),
                'inicia'=>$request->get('Inicial'),
                'jardin'=>$request->get('Jardin'),
                'primar'=>$request->get('Primaria'),
                'secund'=>$request->get('Secundaria'),
                'tecnic'=>$request->get('Tecnico'),
                'ocupac'=>$request->get('Ocupacional'),
                'especi'=>$request->get('Especial'),
                'observac'=>$request->get('Observacion'),   
                'emal'=>$request->get('Email')
            ]);
            $record->save();
        }else{
            $record = colespar::where('c_parroquia',$parroquiaId)
                                ->where('codigo',$codigo)->first();
            
            
            $record->nombre=$request->get('Nombre');
            $record->tipcol=$request->get('Tipo');
            $record->direcc=$request->get('Direccion');
            $record->distri=$request->get('Distritos');
            $record->direct=$request->get('Director');
            $record->telef1=$request->get('Telefono');
            $record->telfax=$request->get('Fax');
            $record->guarde=$request->get('Guarderia');
            $record->inicia=$request->get('Inicial');
            $record->jardin=$request->get('Jardin');
            $record->primar=$request->get('Primaria');
            $record->secund=$request->get('Secundaria');
            $record->tecnic=$request->get('Tecnico');
            $record->ocupac=$request->get('Ocupacional');
            $record->especi=$request->get('Especial');            
            $record->observac=$request->get('Observacion');
            $record->emal=$request->get('Email');
            $record->i_desactivada=$request->get('Desactivado');
            $record->d_desactivada=$request->get('FechaDesactivacion');
                                            
            $record->save();

        }

        return redirect()->route('colegio.editar', [$parroquiaId,$codigo]);
    }



}
