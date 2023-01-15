<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;
use App\Models\vicarias;
use App\Models\distritos;
use App\Models\congrega;
use App\Models\decanato;
use App\Models\miembros;
use App\Models\miemparr;
use App\Models\capillas;
use App\Models\cargos;
use App\Models\histomiem;
use App\Models\histopar;


class ParroquiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {        
        return view('parroquia.index');
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $parroquias = parroqui::query()
            ->where('x_nombre', 'LIKE', "%{$search}%")
            ->orWhere('x_direcc', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('parroquia.index', compact('parroquias'));
    }

    public function buscarmiembro_get($codigo){
        $Miembros = null; 
        $Parroquia = parroqui::where('c_codigo',$codigo)->first();

        return view('parroquia.miembrobuscar',['Miembros'=>$Miembros, 'Parroquia'=>$Parroquia, 'codigo'=>$codigo]);

    }
    public function buscarmiembro_post(Request $request){
        $search = $request->input('search');
        $codigo = $request->route('codigo');

        $Miembros = miembros::where('nombre','LIKE',"%{$search}%")
                                ->orWhere('patern','LIKE',"%{$search}%")
                                ->orWhere('matern','LIKE',"%{$search}%")
                                ->get();

        $Parroquia = parroqui::where('c_codigo',$codigo)->first();

        return view('parroquia.miembrobuscar',['Miembros'=>$Miembros,'Parroquia'=>$Parroquia, 'codigo'=>$codigo]);

    }

    public function nuevomiembro($codigo,$miembro){

        $Miembro = miembros::where('c_codigo',$miembro)->first(); 
        $Cargos = cargos::orderBy('x_nombre')->get(); 

        $Parroquia = parroqui::where('c_codigo',$codigo)->first();

        return view('parroquia.miembronuevo',['Miembro'=>$Miembro,
                                        'Cargos'=>$Cargos,
                                        'Parroquia'=>$Parroquia,
                                        'codigo'=>$codigo]);

    }

    public function agregarmiembro(Request $request){

        $parroquiaId = $request->route('codigo');

        $request->validate([
            'Cargos'=>'required',
        ]);

        //Agregamos el miembro a la parroquia
        $miembro = miemparr::create([
            'c_parroquia'=>$parroquiaId,
            'c_miembro'=>$request->get('MiembroId'),
            'c_cargo'=>$request->get('Cargos'),
            'congre'=>$request->get('Congre')
        ]);

        $miembro->save();

        //agregamos el evento a la historia del miembro
        $Miembro = miembros::where('c_codigo',$request->get('MiembroId'))->first();
        $Parroquia = parroqui::where('c_codigo',$parroquiaId)->first();
        $Cargo = cargos::where('c_codigo',$request->get('Cargos'))->first(); 
        $mytime = date("Y/m/d");

        $historia = histomiem::create(
            [
                'c_miembro'=>$Miembro->c_codigo,
                'c_parroquia'=>$parroquiaId,
                'x_miembro'=>"{$Miembro->patern} {$Miembro->matern} {$Miembro->nombre} {$Miembro->siglas}",
                'c_cargo'=>$Cargo->c_codigo,
                'd_desde'=>$mytime,
                'x_cargo'=>$Cargo->x_nombre,
                'x_centrolab'=>$Parroquia->x_nombre
            ]
        );
        $historia->save();

        //Agregamos el evento a la historia de la parroquia
        $historia = histopar::create(
            [
                'c_miembro'=>$Miembro->c_codigo,
                'c_parroquia'=>$parroquiaId,
                'x_miembro'=>"{$Miembro->patern} {$Miembro->matern} {$Miembro->nombre} {$Miembro->siglas}",
                'c_cargo'=>$Cargo->c_codigo,
                'd_desde'=>$mytime
            ]
        );
        $historia->save();


        $Parroquia = parroqui::where('c_codigo',$parroquiaId)->first();
        $Parroquia->d_suscri=$mytime;
        $Parroquia->save();

        return redirect()->route('parroquia.editar',$parroquiaId);
    }

    public function desactivarmiembro($parroquiaId, $miembroId){

        $mytime = date("Y/m/d");

        
        //Desactivamos el miembro a la parroquia
        $miembro = miemparr::where('c_miembro',$miembroId)
                                ->where('d_elimina', null)
                                ->where('c_parroquia',$parroquiaId)->first();   
        if($miembro)
        {
            $miembro->d_elimina=$mytime;
            $miembro->save();    
            
            //agregamos el evento a la historia del miembro
            $historiamiembro = histomiem::where('c_miembro',$miembroId)
                                    ->where('c_cargo', $miembro->c_cargo)
                                    ->where('c_parroquia',$parroquiaId)->first();
            if($historiamiembro)
            {
                $historiamiembro->d_hasta=$mytime;
                $historiamiembro->save();    
            }

            // Agregamos el evento a la historia de la parroquia
            $historiaparroquia = histopar::where('c_miembro',$miembroId)
                                    ->where('c_cargo', $miembro->c_cargo)
                                    ->where('c_parroquia',$parroquiaId)->first();

            if($historiaparroquia)
            {
                $historiaparroquia->d_hasta=$mytime;
                $historiaparroquia->save();    
            }
        
        } 
        
        $Parroquia = parroqui::where('c_codigo',$parroquiaId)->first();
        $Parroquia->d_suscri=$mytime;
        $Parroquia->save();

        return redirect()->route('parroquia.editar',$parroquiaId);
    }


    public function capillas($codigo){

        $Capillas = capillas::where('c_parroquia',$codigo)->get();

        $Parroquia = parroqui::where('c_codigo',$codigo)->first();

        return view('parroquia.capillas',['Capillas'=>$Capillas,
                                        'Parroquia'=>$Parroquia,
                                        'codigo'=>$codigo]);
    }
    
    public function agregarcapilla($codigo){

    }
    
    
    public function editar($codigo)
    {
        $Vicarias = vicarias::where('l_area','True')->orderBy('c_codigo')->get();        
        $Distritos = distritos::orderBy('x_nombre')->get();
        $Decanatos = decanato::orderBy('x_nombre')->get();
        $Congregaciones = congrega::orderBy('x_nombre')->get();
        $MiembrosParroquia = miemparr::where('c_parroquia',$codigo)
                                        ->where('d_elimina',null)->get();

        $Miembros = miembros::whereIn('c_codigo', miemparr::where('c_parroquia',$codigo)->select('c_miembro')->get())->get(); 
        $Cargos = cargos::whereIn('c_codigo', miemparr::where('c_parroquia',$codigo)->select('c_cargo')->get())->get(); 
        
        $Parroquia = parroqui::where('c_codigo',$codigo)->first();

        return view('parroquia.editar',['Vicarias'=>$Vicarias,
                                        'Distritos'=>$Distritos,
                                        'Decanatos'=>$Decanatos,
                                        'Congregaciones'=>$Congregaciones,
                                        'Parroquia'=>$Parroquia,
                                        'MiembrosParroquia'=>$MiembrosParroquia,
                                        'Miembros'=>$Miembros,
                                        'Cargos'=>$Cargos,
                                        'codigo'=>$codigo]);

    }


    public function nuevo()
    {
        $Vicarias = vicarias::where('l_area','True')->orderBy('nvicar')->get();        
        $Distritos = distritos::orderBy('x_nombre')->get();
        $Decanatos = decanato::orderBy('x_nombre')->get();
        $Congregaciones = congrega::orderBy('x_nombre')->get();


        return view('parroquia.nuevo',['Vicarias'=>$Vicarias,
                                        'Distritos'=>$Distritos,
                                        'Decanatos'=>$Decanatos,
                                        'Congregaciones'=>$Congregaciones]);
    }

    public function actualizar(Request $request){

        $request->validate([
            'Nombre'=>'required',
            'Direccion'=>'required',
            'Distritos'=>'required',
            'Email'=>'required',
            'Telefono'=>'required',
            'Congregaciones'=>'required',
            'Vicarias'=>'required',
            'Siglas'=>'required',
            'FechaEreccion'=>'required',
            'Decanatos'=>'required'
        ]);

        $id = $request->route('codigo');

        $mytime = date("Y/m/d");

        $parroquia = parroqui::where('c_codigo',$id)->first();
        $parroquia->x_nombre=$request->get('Nombre');
        $parroquia->x_direcc=$request->get('Direccion');
        $parroquia->dirpos=$request->get('DireccionPostal');
        $parroquia->distri=$request->get('Distritos');
        $parroquia->x_email=$request->get('Email');
        $parroquia->telef1=$request->get('Telefono');
        $parroquia->telfax=$request->get('Fax');
        $parroquia->aparta=$request->get('Apartado');
        $parroquia->c_congrega=$request->get('Congregaciones');
        $parroquia->c_vicaria=$request->get('Vicarias');
        $parroquia->d_suscri=$mytime;
        $parroquia->d_erec=$request->get('FechaEreccion');
        $parroquia->siglas=$request->get('Siglas');
        $parroquia->c_decanato=$request->get('Decanatos');

        $parroquia->save();

        return redirect()->route('parroquia.editar', $id);

    }
    

    public function agregar(Request $request){
        
        $request->validate([
            'Nombre'=>'required',
            'Direccion'=>'required',
            'Distritos'=>'required',
            'Email'=>'required',
            'Telefono'=>'required',
            'Congregaciones'=>'required',
            'Vicarias'=>'required',
            'Siglas'=>'required',
            'FechaEreccion'=>'required',
            'Decanatos'=>'required'
        ]);


        $count = parroqui::get()->count();
        $mytime = date("Y/m/d");

        $parroquia = parroqui::create([
            'c_codigo'=>$count+1,
            'x_nombre'=>$request->get('Nombre'),
            'x_direcc'=>$request->get('Direccion'),
            'dirpos'=>$request->get('DireccionPostal'),
            'distri'=>$request->get('Distritos'),
            'x_email'=>$request->get('Email'),
            'telef1'=>$request->get('Telefono'),
            'telfax'=>$request->get('Fax'),
            'aparta'=>$request->get('Apartado'),
            'c_congrega'=>$request->get('Congregaciones'),
            'c_vicaria'=>$request->get('Vicarias'),
            'd_suscri'=>$mytime,
            'd_erec'=>$request->get('FechaEreccion'),
            'siglas'=>$request->get('Siglas'),
            'c_decanato'=>$request->get('Decanatos')
        ]);

        $parroquia->save();

        return redirect()->route('parroquias');

    }
    
}
