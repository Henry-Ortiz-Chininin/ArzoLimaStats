<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obraspar extends Model
{
    protected $table = 'obraspar';
    protected $primaryKey = 'ID';
    public  $timestamps = false;
    use HasFactory;

    protected $fillable=[
        'c_parroquia',
        'parroq',
        'codigo',
        'c_obra',
        'tipobr',
        'nombre',
        'direcc',
        'distri',
        'respon',
        'telef1',
        'atendi',
        'observac',
        'i_desactivada',
        'd_desactivada'
    ];
}
