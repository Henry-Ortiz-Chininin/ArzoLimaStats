<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class casaconp extends Model
{

    protected $table = 'casaconp';
    protected $primaryKey = 'ID';
    public  $timestamps = false;    
    use HasFactory;

    protected $fillable=[
        'c_parroquia',
        'codigo',
        'c_congre',
        'congre',
        'd_constitucion',
        'd_erecion',
        'respon',
        'nombre',
        'direcc',
        'distri',
        'telef1',
        'telfax',
        'aparta',
        'observ',
        'i_desactivada',
        'd_desactivada'
    ];
}
