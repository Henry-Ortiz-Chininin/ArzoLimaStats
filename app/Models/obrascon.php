<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obrascon extends Model
{
    protected $table = 'obrascon';
    protected $primaryKey = 'ID';
    public  $timestamps = false;
    use HasFactory;

    protected $fillable=[
        'c_congre',
        'congre',
        'codigo',
        'arepas',
        'vicari',
        'c_obra',
        'tipobr',
        'nombre',
        'direcc',
        'distri',
        'respon',
        'telef1',
        'telfax',
        'atendi',
        'observ',
        'i_desactivada',
        'd_desactivada'
    ];

}
