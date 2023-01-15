<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class capillas extends Model
{
    protected $table = 'capillas';
    protected $primaryKey = 'ID';
    public  $timestamps = false;
    use HasFactory;

    protected $fillable=[
        'c_parroquia',
        'parroq',
        'codigo',
        'nombre',
        'direcc',
        'distri',
        'd_erecion',
        'telef1',
        'telfax',
        'respon',
        'numfam',
        'sacram',
        'i_sacramentos',
        'estado',
        'i_desactivada',
        'd_desactivada'
    ];
}
