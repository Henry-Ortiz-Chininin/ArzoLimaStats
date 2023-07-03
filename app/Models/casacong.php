<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class casacong extends Model
{
    protected $table = 'casacong';
    protected $primaryKey = 'ID';
    public  $timestamps = false;
    use HasFactory;


    protected $fillable=[
        'c_congre',
        'congre',
        'codigo',
        'd_constitucion',
        'd_erecion',
        'respon',
        'nombre',
        'direcc',
        'distri',
        'telef1',
        'telfax',
        'aparta',
        'i_desactivada',
        'd_desactivada',
        'observ'

    ];
}
