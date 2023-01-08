<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class miemparr extends Model
{
    protected $table = 'miemparr';
    protected $primaryKey = 'ID';
    public  $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'c_parroquia',
        'c_miembro',
        'c_cargo',
        'congre',
        'codigo',
        'd_elimina',
        'user'
    ];
}
