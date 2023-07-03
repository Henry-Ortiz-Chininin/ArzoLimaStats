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
        $Congregacion = congrega::where('c_codigo', $codigo)->first();
        $Casas = casacong::where('c_congre', $codigo)->get();
        $Religion = religcon::where('c_congre', $codigo)->orderBy('c_anno')->get();


        return view('congregacion.editar',['Vicarias'=>$Vicarias,
                                        'Casas'=>$Casas,
                                        'Religion'=>$Religion,
                                        'codigo'=>$codigo,
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
        $request->validate([
            'Nombre'=>'required',
            'Vicarias'=>'required',
            'siglas'=>'required',
            'emailcon'=>'required',
            'fundad'=>'required',
            'lugarf'=>'required',
            'fundac'=>'required',
            'nomgen'=>'required',
            'nomnac'=>'required',
            'dirgen'=>'required',
            'dirnac'=>'required',
            'emailgen'=>'required',
            'emailnac'=>'required',
            'telgen'=>'required',
            'telnac'=>'required',
            'fecfun'=>'required'
        ]);
        
        $id = $request->route('codigo');

        $mytime = date("Y/m/d");

        $item = congrega::where('c_codigo',$id)->first();
        $item->x_nombre=$request->get('Nombre');
        $item->c_vicaria=$request->get('Vicarias');
        $item->emailcon=$request->get('emailcon');
        $item->derech=$request->get('Derecho');
        $item->siglas=$request->get('siglas');
        $item->carism=$request->get('Carisma');
        $item->fundad=$request->get('fundad');
        $item->fundac=$request->get('fundac');
        $item->lugarf=$request->get('lugarf');
        $item->nomgen=$request->get('nomgen');
        $item->dirgen=$request->get('dirgen');
        $item->faxgen=$request->get('faxgen');
        $item->telgen=$request->get('telgen');
        $item->apagen=$request->get('apagen');
        $item->emailgen=$request->get('emailgen');
        $item->desgen=$request->get('desgen');
        $item->hasgen=$request->get('hasgen');
        $item->fecfun=$request->get('fecfun');
        $item->nomnac=$request->get('nomnac');
        $item->dirnac=$request->get('dirnac');
        $item->faxnac=$request->get('faxnac');
        $item->telnac=$request->get('telnac');
        $item->apanac=$request->get('apanac');
        $item->emailnac=$request->get('emailnac');
        $item->desnac=$request->get('desnac');
        $item->hasnac=$request->get('hasnac');

        $item->d_suscrip=$mytime;


        $item->save();

        return redirect()->route('congregacion.editar', $id);

    }

}
