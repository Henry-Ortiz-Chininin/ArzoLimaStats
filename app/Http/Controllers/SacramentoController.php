<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;
use App\Models\sacramen;

class SacramentoController extends Controller
{
    //
    public function index($parroquia)
    {   
        $Sacramentos = sacramen::where('c_parroquia',$parroquia)->orderBy('sacano','desc')->get();
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();

        return view('sacramento.index')
                ->with('Sacramentos',$Sacramentos)
                ->with('Parroquia',$Parroquia)
                ->with('codigo',$parroquia);
    }

    public function nuevo($parroquia)
    {        
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();

        return view('sacramento.nuevo',['Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
    }

    public function editar($parroquia, $sacano)
    {        
        $Parroquia = parroqui::where('c_codigo',$parroquia)->first();
        $Sacramento = sacramen::where('c_parroquia',$parroquia)
                            ->where('sacano',$sacano)->first();

        return view('sacramento.editar',['Sacramento'=>$Sacramento, 'Parroquia'=>$Parroquia, 'codigo'=>$parroquia]);
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
            $record->sacano=$request->get('Agno');
            $record->bauinf=$request->get('bauinf');
            $record->baunin=$request->get('baunin');
            $record->baumay=$request->get('baumay');
            $record->bauadu=$request->get('bauadu');
            $record->pcteca=$request->get('pcteca');
            $record->pccole=$request->get('pccole');
            $record->coteca=$request->get('coteca');
            $record->cocole=$request->get('cocole');
            $record->matcat=$request->get('matcat');
            $record->matmix=$request->get('matmix');
            $record->save();

        }else{
            $record= sacramen::create([
                'c_parroquia'=>$parroquiaId,
                'sacano'=>$request->get('Agno'),
                'bauinf'=>$request->get('bauinf'),
                'baunin'=>$request->get('baunin'),
                'baumay'=>$request->get('baumay'),
                'bauadu'=>$request->get('bauadu'),
                'pcteca'=>$request->get('pcteca'),
                'pccole'=>$request->get('pccole'),   
                'coteca'=>$request->get('coteca'),
                'cocole'=>$request->get('cocole'),  
                'matcat'=>$request->get('matcat'),  
                'matmix'=>$request->get('matmix')   
            ]);
            $record->save();
        }               

        return redirect()->route('sacramento.editar', [$parroquiaId,$request->get('Agno')]);
    }


}
