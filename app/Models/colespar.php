<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colespar extends Model
{
    protected $table = 'colespar';
    protected $primaryKey = 'ID';
    
    public  $timestamps = false;
    use HasFactory;

    protected $fillable=[
        'c_parroquia',
        'codigo',
        'nombre',
        'tipcol',
        'direcc',
        'distri',
        'direct',
        'telef1',
        'telfax',
        'guarde',
        'inicia',
        'jardin',
        'primar',
        'secund',
        'tecnic',
        'ocupac',
        'especi',
        'observac',
        'emal',
        'i_desactivada',
        'd_desactivada'
    ];

}
