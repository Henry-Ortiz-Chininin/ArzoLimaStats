<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tcateq extends Model
{
    protected $table = 'tcateq';
    protected $primaryKey = 'ID';
    public  $timestamps = false;
    use HasFactory;

    protected $fillable=[
        'c_parroquia',
        'c_anno',
        'n_cateq',
        'n_agenp'
    ];

}
