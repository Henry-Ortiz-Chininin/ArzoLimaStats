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

        $Miembro = miembros::where('ID',$miembro)->first(); 
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

        $miembro = miemparr::create([
            'c_parroquia'=>$parroquiaId,
            'c_miembro'=>$request->get('MiembroId'),
            'c_cargo'=>$request->get('Cargos'),
            'congre'=>$request->get('Congre')
        ]);

        $miembro->save();

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
        $MiembrosParroquia = miemparr::where('c_parroquia',$codigo)->get();

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

        $parroquia = parroqui::find($id);
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
