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
        $Congregacion = congrega::where('c_codigo', $codigo)->get();
        $Casas = casacong::where('c_congre', $codigo)->get();
        $Religion = religcon::where('c_congre', $codigo)->orderBy('c_anno')->get();


        return view('congregacion.editar',['Vicarias'=>$Vicarias,
                                        'Casas'=>$Casas,
                                        'Religion'=>$Religion,
                                        'Congregacion'=>$Congregacion]);
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


        $count = intval(congrega::max('c_codigo'))+1;
        $mytime = date("Y/m/d");

        $item = congrega::create([
            'c_codigo'=>$count,
            'x_nombre'=>$request->get('Nombre'),
            'c_vicaria'=>$request->get('Vicarias'),
            'emailcon'=>$request->get('EmailCongregacion'),
            'derech'=>$request->get('Derecho'),
            'siglas'=>$request->get('Siglas'),
            'carism'=>$request->get('Carisma'),
            'fundad'=>$request->get('fundad'),
            'fundac'=>$request->get('Fechafundac'),
            'lugarf'=>$request->get('LugarFundacion'),
            'nomgen'=>$request->get('NombreGeneral'),
            'dirgen'=>$request->get('DireccionGeneral'),
            'faxgen'=>$request->get('FaxGeneral'),
            'telgen'=>$request->get('TelefonoGeneral'),
            'apagen'=>$request->get('LugarOrdenacion'),
            'emailgen'=>$request->get('EmailGeneral'),
            'desgen'=>$request->get('desgen'),
            'hasgen'=>$request->get('hasgen'),
            'fecfun'=>$request->get('fecfun'),
            'nomnac'=>$request->get('NombreNacional'),
            'dirnac'=>$request->get('DireccionNacional'),
            'faxnac'=>$request->get('FaxNacional'),
            'telnac'=>$request->get('TelefonoNacional'),
            'apanac'=>$request->get('Apartado'),
            'emailnac'=>$request->get('EmailNacional'),
            'desnac'=>$request->get('desnac'),
            'hasnac'=>$request->get('hasnac')
        ]);

        $item->save();

        return redirect()->route('congregaciones.search');
        

    }


    public function actualizar(Request $request){
        
        

    }

}
