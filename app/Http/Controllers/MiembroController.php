<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\miembros;
use App\Models\vicarias;
use App\Models\distritos;
use App\Models\congrega;
use App\Models\decanato;
use App\Models\clases;
use App\Models\capillas;
use App\Models\cargos;

class MiembroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {        
        return view('miembro.index');
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $Miembros = miembros::query()
            ->where('nombre', 'LIKE', "%{$search}%")
            ->orWhere('patern', 'LIKE', "%{$search}%")
            ->orWhere('matern', 'LIKE', "%{$search}%")
            ->get();
        
        $Distritos = distritos::orderBy('x_nombre')->get();
    
        // Return the search view with the resluts compacted
        return view('miembro.index')
                        ->with('Distritos',$Distritos)
                        ->with('Miembros',$Miembros);
    }

    public function editar($codigo)
    {
        $Vicarias = vicarias::where('l_area','True')->orderBy('nvicar')->get();        
        $Distritos = distritos::orderBy('x_nombre')->get();
        $Decanatos = decanato::orderBy('x_nombre')->get();
        $Congregaciones = congrega::orderBy('x_nombre')->get();
        $Clases = clases::orderBy('x_nombre')->get();
        $Cargos = cargos::orderBy('x_nombre')->get();
        $Miembro = miembros::where('c_codigo',$codigo)->first();


        return view('miembro.editar',['Vicarias'=>$Vicarias,
                                        'Miembro'=>$Miembro,
                                        'Distritos'=>$Distritos,
                                        'Decanatos'=>$Decanatos,
                                        'Clases'=>$Clases,
                                        'Cargos'=>$Cargos,
                                        'codigo'=>$codigo,
                                        'Congregaciones'=>$Congregaciones]);
    }

    public function nuevo()
    {
        $Vicarias = vicarias::where('l_area','True')->orderBy('nvicar')->get();        
        $Distritos = distritos::orderBy('x_nombre')->get();
        $Decanatos = decanato::orderBy('x_nombre')->get();
        $Congregaciones = congrega::orderBy('x_nombre')->get();
        $Clases = clases::orderBy('x_nombre')->get();
        $Cargos = cargos::orderBy('x_nombre')->get();


        return view('miembro.nuevo',['Vicarias'=>$Vicarias,
                                        'Distritos'=>$Distritos,
                                        'Decanatos'=>$Decanatos,
                                        'Clases'=>$Clases,
                                        'Cargos'=>$Cargos,
                                        'Congregaciones'=>$Congregaciones]);
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
            'FechaNacimiento'=>'required',
            'Decanatos'=>'required'
        ]);


        $count = intval(miembros::where('c_codigo','LIKE','98%')->get()->max('c_codigo'))+1;
        $mytime = date("Y/m/d");

        $Congregacion = congrega::where('c_codigo',$request->get('Congregaciones'))->first(); 
        $Vicaria = vicarias::where('c_codigo',$request->get('Vicarias'))->first(); 
        $Clase = clases::where('c_codigo',$request->get('Clase'))->first();
        $Cargo = cargos::where('c_codigo',$request->get('Cargo'))->first();

        $miembro = miembros::create([
            'c_codigo'=>$count,
            'c_congrega'=>$request->get('Congregaciones'),
            'congre'=>$Congregacion->codigo,
            'c_vicaria'=>$request->get('Vicarias'),
            'vicari'=>$Vicaria->x_nombre,
            'c_decanato'=>$request->get('Decanatos'),
            'nombre'=>$request->get('Nombre'),
            'patern'=>$request->get('Paterno'),
            'matern'=>$request->get('Materno'),
            'sexomf'=>$request->get('Sexo'),
            'siglas'=>$request->get('Siglas'),
            'nacimi'=>$request->get('FechaNacimiento'),
            'lugarn'=>$request->get('LugarNacimiento'),
            'forden'=>$request->get('FechaOrdenacion'),
            'lugaro'=>$request->get('LugarOrdenacion'),
            'clases'=>$Clase->codigo,
            'c_clase'=>$request->get('Clase'),
            'cargos'=>$Clase->codigo,
            'c_cargo'=>$request->get('Clase'),
            'cenlab'=>$request->get('CentroLaboral'),
            'direcc'=>$request->get('Direccion'),
            'distri'=>$request->get('Distritos'),
            'telef1'=>$request->get('Telefono'),
            'telfax'=>$request->get('Fax'),
            'aparta'=>$request->get('Apartado'),
            'email'=>$request->get('Email'),
            'estudi'=>$request->get('Estudios'),
            'x_nombres'=>"{$request->get('Nombre')} {$request->get('Paterno')} {$request->get('Materno')} {$request->get('Siglas')}"
        ]);

        $miembro->save();

        return redirect()->route('miembros.search');

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
            'FechaNacimiento'=>'required',
            'Decanatos'=>'required'
        ]);


        $count = intval(miembros::where('c_codigo','LIKE','98%')->get()->max('c_codigo'))+1;
        $mytime = date("Y/m/d");

        $Congregacion = congrega::where('c_codigo',$request->get('Congregaciones'))->first(); 
        $Vicaria = vicarias::where('c_codigo',$request->get('Vicarias'))->first(); 
        $Clase = clases::where('c_codigo',$request->get('Clase'))->first();
        $Cargo = cargos::where('c_codigo',$request->get('Cargo'))->first();

        $miembro = miembros::create([
            'c_codigo'=>$count,
            'c_congrega'=>$request->get('Congregaciones'),
            'congre'=>$Congregacion->codigo,
            'c_vicaria'=>$request->get('Vicarias'),
            'vicari'=>$Vicaria->x_nombre,
            'c_decanato'=>$request->get('Decanatos'),
            'nombre'=>$request->get('Nombre'),
            'patern'=>$request->get('Paterno'),
            'matern'=>$request->get('Materno'),
            'sexomf'=>$request->get('Sexo'),
            'siglas'=>$request->get('Siglas'),
            'nacimi'=>$request->get('FechaNacimiento'),
            'lugarn'=>$request->get('LugarNacimiento'),
            'forden'=>$request->get('FechaOrdenacion'),
            'lugaro'=>$request->get('LugarOrdenacion'),
            'clases'=>$Clase->codigo,
            'c_clase'=>$request->get('Clase'),
            'cargos'=>$Clase->codigo,
            'c_cargo'=>$request->get('Clase'),
            'cenlab'=>$request->get('CentroLaboral'),
            'direcc'=>$request->get('Direccion'),
            'distri'=>$request->get('Distritos'),
            'telef1'=>$request->get('Telefono'),
            'telfax'=>$request->get('Fax'),
            'aparta'=>$request->get('Apartado'),
            'email'=>$request->get('Email'),
            'estudi'=>$request->get('Estudios'),
            'x_nombres'=>"{$request->get('Nombre')} {$request->get('Paterno')} {$request->get('Materno')} {$request->get('Siglas')}"
        ]);

        $miembro->save();

        return redirect()->route('miembros.search');

    }


}
