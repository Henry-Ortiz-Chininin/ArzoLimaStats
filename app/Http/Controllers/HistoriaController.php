<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;
use App\Models\histopar;
use App\Models\cargos;
use App\Models\vicarias;
use App\Models\decanato;
use App\Models\histomiem;
use App\Models\miembros;



class HistoriaController extends Controller
{
    //
    public function parroquia($parroquia)
    {        
        $Historia=histopar::where('c_parroquia',$parroquia)->get();
        $Cargos = cargos::all(); 

        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        return view('historia.parroquia')
                    ->with('Historia',$Historia)
                    ->with('Parroquia',$Parroquia)
                    ->with('Cargos',$Cargos)
                    ->with('codigo',$parroquia);
    }

    public function parroquianuevo($parroquia)
    {        
        $Distritos=distritos::all();
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();

        return view('capilla.nuevo',['Distritos'=>$Distritos, 'Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
    }

    public function parroquiaeditar($parroquia, $ID)
    {        
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        $Historia = histopar::where('c_parroquia',$parroquia)->where('ID',$ID)->first();
        $Cargos = cargos::all(); 
        $Miembros=miembros::all();

        return view('historia.parroquia_editar',['Historia'=>$Historia, 
                                        'Cargos'=>$Cargos, 
                                        'Parroquia'=>$Parroquia, 
                                        'Miembros'=>$Miembros, 
                                        'historiaID'=>$ID, 
                                        'codigo'=>$parroquia]);
    }

    public function parroquiaguardar(Request $request){

        $request->validate([
            'Cargo'=>'required',
            'FechaDesde'=>'required',
            'FechasHasta'=>'required'
        ]);

        $parroquiaId = $request->route('parroquia');
        $historiaId = $request->route('ID');

        $record = histopar::where('c_parroquia',$parroquiaId)
                                ->where('ID',$historiaId)->first();


        $record->c_cargo=$request->get('Cargo');

        $record->d_desde=$request->get('FechaDesde');
        $record->d_hasta=$request->get('FechaHasta');
                            
        $record->save();

        return redirect()->route('historia.parroquia', $parroquiaId);
    }



    public function miembro($miembro)
    {        
        $Miembro=miembros::where('c_codigo',$miembro)->first();
        $Historia=histomiem::where('c_miembro',$miembro)->get();
        $Parroquias = parroqui::all();
        $Vicarias = vicarias::where('l_area','True')->get();        
        $Decanatos = decanato::all();
        $Cargos = cargos::all(); 

        return view('historia.miembro')
                    ->with('Miembro',$Miembro)
                    ->with('Parroquias',$Parroquias)
                    ->with('Vicarias',$Vicarias)
                    ->with('Decanatos',$Decanatos)
                    ->with('Historia',$Historia);
    }

}
