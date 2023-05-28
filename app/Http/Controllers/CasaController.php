<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;
use App\Models\casaconp;
use App\Models\congrega;
use App\Models\distritos;
use Illuminate\Support\Str;

class CasaController extends Controller
{
    //

    public function parroquia($parroquia)
    {   
        $Distritos=distritos::all();
        $Casas = casaconp::where('c_parroquia',$parroquia)->get();
        $Congregaciones = congrega::all();
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        return view('casa.parroquia')
                    ->with('Distritos',$Distritos)
                    ->with('Casas',$Casas)
                    ->with('Congregaciones',$Congregaciones)
                    ->with('Parroquia',$Parroquia)
                    ->with('codigo',$parroquia);
    }

    public function parroquianuevo($parroquia)
    {        
        $Distritos=distritos::all();
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        $Congregaciones = congrega::orderBy('x_nombre')->get();

        return view('casa.parroquia_nuevo')
                            ->with('Distritos',$Distritos)
                            ->with('Congregaciones',$Congregaciones)
                            ->with('Parroquia',$Parroquia)
                            ->with('codigo',$parroquia);
    }

    public function parroquiaeditar($parroquia, $casa)
    {        
        $Distritos=distritos::all();
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        $Congregaciones = congrega::orderBy('x_nombre')->get();
        $Casa = casaconp::where('c_parroquia',$parroquia)
                            ->where('codigo',$casa)->first();
        
        return view('casa.parroquia_editar')
                            ->with('Distritos',$Distritos)
                            ->with('Casa',$Casa)
                            ->with('Congregaciones',$Congregaciones)
                            ->with('Parroquia',$Parroquia)
                            ->with('codigo',$parroquia);
    }

    public function parroquiaguardar(Request $request){

        $request->validate([
            'Nombre'=>'required',
            'Congregaciones'=>'required',
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
            $semilla = intval(casaconp::where('c_parroquia',$parroquiaId)->max('codigo'))+1;
            $codigo=Str::padLeft($semilla, 3,'0');

            $record= casaconp::create([
                'c_parroquia'=>$parroquiaId,
                'codigo'=>$codigo,
                'c_congre'=>$request->get('Congregaciones'),
                'd_constitucion'=>$request->get('FechaConsitucion'),
                'd_erecion'=>$request->get('FechaEreccion'),  
                'respon'=>$request->get('Responsable'),   
                'nombre'=>$request->get('Nombre'),
                'direcc'=>$request->get('Direccion'),
                'distri'=>$request->get('Distritos'),
                'telef1'=>$request->get('Telefono'),
                'telfax'=>$request->get('Fax'),
                'aparta'=>$request->get('Apartado'),
                'observ'=>$request->get('Observacion')
            ]);
            $record->save();
        }else{
            $record = casaconp::where('c_parroquia',$parroquiaId)
                                ->where('codigo',$codigo)->first();
            
            
            $record->c_congre=$request->get('Congregaciones'); 
            $record->d_constitucion=$request->get('FechaConsitucion'); 
            $record->d_erecion=$request->get('FechaEreccion'); 
            $record->respon=$request->get('Responsable');
            $record->nombre=$request->get('Nombre');
            $record->direcc=$request->get('Direccion');
            $record->distri=$request->get('Distritos');
            $record->telef1=$request->get('Telefono');
            $record->telfax=$request->get('Fax');
            $record->aparta=$request->get('Apartado');
            $record->observ=$request->get('Observacion');
            $record->i_desactivada=$request->get('Desactivado');
            $record->d_desactivada=$request->get('FechaDesactivacion');
                                            
            $record->save();

        }



        return redirect()->route('casa.parroquia.editar', [$parroquiaId,$codigo]);
    }


    /* CONGREGACION*/

    public function congregacion($congregacion)
    {   
        $Distritos=distritos::all();
        $Casas = casacong::where('c_congre',$congregacion)->get();
        $Congregacion = congrega::where('c_codigo',$congregacion)->first();
        return view('casa.congregacion')
                    ->with('Distritos',$Distritos)
                    ->with('Casas',$Casas)
                    ->with('Congregacion',$Congregacion)
                    ->with('codigo',$Congregacion);
    }

    public function congregacionnuevo($congregacion)
    {        
        $Distritos=distritos::all();
        $Congregacion = congrega::where('c_codigo',$congregacion)->first();

        return view('casa.congregacion.nuevo')
                            ->with('Distritos',$Distritos)
                            ->with('Congregacion',$Congregacion)
                            ->with('codigo',$congregacion);
    }

    public function congregacioneditar($congregacion, $casa)
    {        
        $Distritos=distritos::all();
        $Congregacion = congrega::where('c_codigo',$congregacion)->first();
        $Casa = casaconp::where('congregacion',$congregacion)
                            ->where('codigo',$casa)->first();
        
        return view('casa.congregacion')
                            ->with('Distritos',$Distritos)
                            ->with('Casa',$Casa)
                            ->with('Congregaciones',$Congregaciones)
                            ->with('Parroquia',$Parroquia)
                            ->with('codigo',$parroquia);
    }

    public function congregacionguardar(Request $request){

        $request->validate([
            'Nombre'=>'required',
            'Congregaciones'=>'required',
            'Direccion'=>'required',
            'Distritos'=>'required',
            'Telefono'=>'required',
            'FechaEreccion'=>'required'
        ]);

        $congregacionId = $request->route('congregacion');
        $mytime = date("Y/m/d");

        $codigo = $request->get('codigo'); 
        if($codigo=='')
        {
            $semilla = intval(casaconp::where('c_parroquia',$parroquiaId)->max('codigo'))+1;
            $codigo=Str::padLeft($semilla, 3,'0');

            $record= casaconp::create([
                'c_parroquia'=>$parroquiaId,
                'codigo'=>$codigo,
                'c_congre'=>$request->get('Congregaciones'),
                'd_constitucion'=>$request->get('FechaConsitucion'),
                'd_erecion'=>$request->get('FechaEreccion'),  
                'respon'=>$request->get('Responsable'),   
                'nombre'=>$request->get('Nombre'),
                'direcc'=>$request->get('Direccion'),
                'distri'=>$request->get('Distritos'),
                'telef1'=>$request->get('Telefono'),
                'telfax'=>$request->get('Fax'),
                'aparta'=>$request->get('Apartado'),
                'observ'=>$request->get('Observacion')
            ]);
            $record->save();
        }else{
            $record = casaconp::where('c_parroquia',$parroquiaId)
                                ->where('codigo',$codigo)->first();
            
            
            $record->c_congre=$request->get('Congregaciones'); 
            $record->d_constitucion=$request->get('FechaConsitucion'); 
            $record->d_erecion=$request->get('FechaEreccion'); 
            $record->respon=$request->get('Responsable');
            $record->nombre=$request->get('Nombre');
            $record->direcc=$request->get('Direccion');
            $record->distri=$request->get('Distritos');
            $record->telef1=$request->get('Telefono');
            $record->telfax=$request->get('Fax');
            $record->aparta=$request->get('Apartado');
            $record->observ=$request->get('Observacion');
            $record->i_desactivada=$request->get('Desactivado');
            $record->d_desactivada=$request->get('FechaDesactivacion');
                                            
            $record->save();

        }



        return redirect()->route('casa.congregacion.editar', [$congregacionId,$codigo]);
    }

}
