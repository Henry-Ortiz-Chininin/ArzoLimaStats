<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class histomiem extends Model
{
    protected $table = 'histomiem';
    protected $primaryKey = 'ID';
    public  $timestamps = false;
    use HasFactory;

    protected $fillable=[
        'c_miembro',
        'c_parroquia',
        'c_vicaria',
        'c_decanato',
        'x_miembro',
        'c_cargo',
        'email',
        'd_desde',
        'd_hasta',
        'x_cargo',
        'x_centrolab'
    ];
}
