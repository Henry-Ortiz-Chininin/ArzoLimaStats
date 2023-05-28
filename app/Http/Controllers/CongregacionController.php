<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vicarias;
use App\Models\distritos;
use App\Models\cargos;
use App\Models\congrega;
use App\Models\casacong;
use App\Models\decanato;
use App\Models\religcon;
use App\Models\miembros;


class CongregacionController extends Controller
{
    //
    public function index()
    {        
        return view('congregacion.index');
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $Congregaciones = congrega::query()
            ->where('x_nombre', 'LIKE', "%{$search}%")
            ->orWhere('siglas', 'LIKE', "%{$search}%")
            ->get();
        
        $Distritos = distritos::orderBy('x_nombre')->get();
    
        // Return the search view with the resluts compacted
        return view('congregacion.index')
                        ->with('Distritos',$Distritos)
                        ->with('Congregaciones',$Congregaciones);
    }

    public function editar($codigo)
    {
        $Vicarias = vicarias::where('l_area','True')->orderBy('nvicar')->get();        
        $Distritos = distritos::orderBy('x_nombre')->get();
        $Cargos = cargos::orderBy('x_nombre')->get();
        $Decanatos = decanato::orderBy('x_nombre')->get();
        $Congregaciones = congrega::orderBy('x_nombre')->get();
        $Casas = casacong::orderBy('nombre')->get();
        $Religion = religcon::orderBy('c_anno')->get();
        $TipoCongregacion = tipocong::orderBy('x_nombre')->get();


        return view('congregacion.editar',['Vicarias'=>$Vicarias,
                                        'Distritos'=>$Distritos,
                                        'Decanatos'=>$Decanatos,
                                        'Clases'=>$Clases,
                                        'Cargos'=>$Cargos,
                                        'Congregaciones'=>$Congregaciones]);
    }

    public function nuevo()
    {
        $Vicarias = vicarias::where('l_area','True')->orderBy('nvicar')->get();        
        $Distritos = distritos::orderBy('x_nombre')->get();
        $Decanatos = decanato::orderBy('x_nombre')->get();

        return view('congregacion.nuevo',['Vicarias'=>$Vicarias,
                                        'Distritos'=>$Distritos,
                                        'Decanatos'=>$Decanatos]);
    }


    public function agregar(Request $request){
        $request->validate([
            'Nombre'=>'required',
            'Vicarias'=>'required',
            'Siglas'=>'required',
            'EmailCongregacion'=>'required',
            'fundad'=>'required',
            'LugarFundacion'=>'required',
            'Fechafundac'=>'required',
            'NombreGeneral'=>'required',
            'NombreNacional'=>'required',
            'DireccionGeneral'=>'required',
            'DireccionNacional'=>'required',
            'EmailGeneral'=>'required',
            'EmailNacional'=>'required',
            'TelefonoGeneral'=>'required',
            'TelefonoNacional'=>'required',
            'fecfun'=>'required'
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
        
        

    }

}
