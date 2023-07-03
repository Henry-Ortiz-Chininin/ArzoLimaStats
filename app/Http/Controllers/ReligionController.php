<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\religcon;
use App\Models\congrega;

class ReligionController extends Controller
{
    //

    public function congregacion($congregacion)
    {   
        $Religiones = religcon::where('c_congre',$congregacion)->orderBy('c_anno','desc')->get();
        $Congregacion = congrega::where('c_codigo',$congregacion)->first();

        return view('religion.index')
                ->with('Religiones',$Religiones)
                ->with('Congregacion',$Congregacion)
                ->with('codigo',$congregacion);
    }

    public function congregacionnuevo($congregacion)
    {        
        $Congregacion = congrega::where('c_codigo',$congregacion)->first();

        return view('religion.nuevo',['Congregacion'=>$Congregacion, 'codigo'=>$congregacion]);
    }

    public function congregacioneditar($congregacion, $c_anno)
    {        
        $Congregacion = congrega::where('c_codigo',$congregacion)->first();
        $Religion = religcon::where('c_congre',$congregacion)
                            ->where('c_anno',$c_anno)->first();

        return view('religion.editar',['Religion'=>$Religion, 'Congregacion'=>$Congregacion, 'codigo'=>$congregacion]);
    }

    public function congregacionguardar(Request $request){

        $request->validate([
            'Agno'=>'required'
        ]);

        $congregacionId = $request->route('congregacion');
        $record = religcon::where('c_congre',$congregacionId)
                            ->where('c_anno',$request->get('Agno'))->first();

        if($record){
            $record->c_congre=$congregacionId;
            $record->c_anno=$request->get('Agno');
            $record->n_profesas=$request->get('n_profesas');
            $record->n_profesos=$request->get('n_profesos');
            $record->n_sacerdotes=$request->get('n_sacerdotes');
            $record->n_laicosconsagrados=$request->get('n_laicosconsagrados');
            
            $record->save();

        }else{
            $record= sacramen::create([
                'c_congre'=>$congregacionId,
                'c_anno'=>$request->get('Agno'),
                'n_profesas'=>$request->get('n_profesas'),
                'n_profesos'=>$request->get('n_profesos'),
                'n_sacerdotes'=>$request->get('n_sacerdotes'),
                'n_laicosconsagrados'=>$request->get('n_laicosconsagrados'),
                
            ]);
            $record->save();
        }               

        return redirect()->route('religion.editar', [$congregacionId,$request->get('Agno')]);
        
    }

}
