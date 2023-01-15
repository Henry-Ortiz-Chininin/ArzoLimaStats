<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;
use App\Models\capillas;
use App\Models\distritos;
use Illuminate\Support\Str;

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

    public function nuevo($parroquia)
    {        
        $Distritos=distritos::all();
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();

        return view('capilla.nuevo',['Distritos'=>$Distritos, 'Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
    }

    public function editar($parroquia, $capilla)
    {        
        $Distritos=distritos::all();
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        $Capilla = capillas::where('c_parroquia',$parroquia)
                            ->where('codigo',$capilla)->first();

        return view('capilla.editar',['Capilla'=>$Capilla, 'Distritos'=>$Distritos, 'Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
    }

    public function guardar(Request $request){

        $request->validate([
            'Nombre'=>'required',
            'Direccion'=>'required',
            'Distritos'=>'required',
            'Telefono'=>'required',
            'FechaEreccion'=>'required'
        ]);

        $parroquiaId = $request->route('parroquia');
        $mytime = date("Y/m/d");

        $codigo = $request->get('codigo'); 
        if($codigo=='')
        {
            $semilla = intval(capillas::where('c_parroquia',$parroquiaId)->max('codigo'))+1;
            $codigo=Str::padLeft($semilla, 2,'0');

            $record= capillas::create([
                'c_parroquia'=>$parroquiaId,
                'codigo'=>$codigo,
                'nombre'=>$request->get('Nombre'),
                'direcc'=>$request->get('Direccion'),
                'distri'=>$request->get('Distritos'),
                'telef1'=>$request->get('Telefono'),
                'telfax'=>$request->get('Fax'),
                'sacram'=>$request->get('Sacramentos'),
                'i_sacramentos'=>$request->get('Sacramentos')=='S'?True:False,
                'respon'=>$request->get('Responsable'),   
                'estado'=>$request->get('Estado'),   
                'd_erecion'=>$request->get('FechaEreccion')    
            ]);
            $record->save();
        }else{
            $record = capillas::where('c_parroquia',$parroquiaId)
                                ->where('codigo',$codigo)->first();
            
            
            $record->nombre=$request->get('Nombre');
            $record->direcc=$request->get('Direccion');
            $record->distri=$request->get('Distritos');
            $record->telef1=$request->get('Telefono');
            $record->telfax=$request->get('Fax');
            $record->sacram=$request->get('Sacramentos');
            $record->i_sacramentos=$request->get('Sacramentos')=='S'?True:False;
            $record->respon=$request->get('Responsable');
            $record->estado=$request->get('Estado');
            $record->d_erecion=$request->get('FechaEreccion'); 
            $record->i_desactivada=$request->get('Desactivado');
            $record->d_desactivada=$request->get('FechaDesactivacion');
                                            
            $record->save();

        }



        return redirect()->route('capilla.editar', [$parroquiaId,$codigo]);
    }
}
