<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroqui;

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

    public function editar($codigo)
    {        
        return view('parroquia.editar');
    }
    public function nuevo()
    {        
        return view('parroquia.nuevo');
    }
    
}
