<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class histopar extends Model
{
    protected $table = 'histopar';
    protected $primaryKey = 'ID';
    public  $timestamps = false;
    use HasFactory;

    protected $fillable=[
        'c_parroquia',
        'c_miembro',
        'x_miembro',
        'c_cargo',
        'email',
        'd_desde',
        'd_hasta'
    ];
}
