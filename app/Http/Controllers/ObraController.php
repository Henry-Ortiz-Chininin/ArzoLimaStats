<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;
use App\Models\obrassoc;
use App\Models\obraspar;
use App\Models\distritos;
use Illuminate\Support\Str;

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

    public function parroquianuevo($parroquia)
    {        
        $ObraSocial = obrassoc::all();
        $Distritos=distritos::all();
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();

        return view('obra.parroquia_nuevo',['ObraSocial'=>$ObraSocial, 'Distritos'=>$Distritos, 'Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
    }

    public function parroquiaeditar($parroquia, $obra)
    {        
        $ObraSocial = obrassoc::all();
        $Distritos=distritos::all();
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        $Obra = obraspar::where('c_parroquia',$parroquia)
                            ->where('codigo',$obra)->first();

        return view('obra.parroquia_editar',['ObraSocial'=>$ObraSocial, 'Obra'=>$Obra, 'Distritos'=>$Distritos, 'Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
    }

    public function parroquiaguardar(Request $request){

        $request->validate([
            'Nombre'=>'required',
            'Direccion'=>'required',
            'Distritos'=>'required',
            'Telefono'=>'required'
        ]);

        $parroquiaId = $request->route('parroquia');
        $mytime = date("Y/m/d");

        $codigo = $request->get('codigo'); 
        
        if($codigo=='')
        {
            $semilla = intval(obraspar::where('c_parroquia',$parroquiaId)->max('codigo'))+1;
            $codigo=Str::padLeft($semilla, 3,'0');

            $record= obraspar::create([
                'c_parroquia'=>$parroquiaId,
                'codigo'=>$codigo,
                'c_obra'=>$request->get('ObraSocial'),
                'tipobr'=>$request->get('TipoObra'),
                'nombre'=>$request->get('Nombre'),
                'direcc'=>$request->get('Direccion'),
                'distri'=>$request->get('Distritos'),
                'respon'=>$request->get('Responsable'),   
                'telef1'=>$request->get('Telefono'),
                'atendi'=>$request->get('Atendido'),  
                'observac'=>$request->get('Observacion')   
            ]);
            $record->save();
        }else{
            $record = obraspar::where('c_parroquia',$parroquiaId)
                                ->where('codigo',$codigo)->first();
            
            
            $record->c_obra=$request->get('ObraSocial');
            $record->tipobr=$request->get('TipoObra');
            $record->nombre=$request->get('Nombre');
            $record->direcc=$request->get('Direccion');
            $record->distri=$request->get('Distritos');
            $record->respon=$request->get('Responsable');
            $record->telef1=$request->get('Telefono');
            $record->atendi=$request->get('Atendido');
            $record->observac=$request->get('Observacion');
            $record->i_desactivada=$request->get('Desactivado');
            $record->d_desactivada=$request->get('FechaDesactivacion');
                                            
            $record->save();

        }



        return redirect()->route('obra.parroquia.editar', [$parroquiaId,$codigo]);
    }

}
