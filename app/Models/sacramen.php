<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sacramen extends Model
{
    protected $table = 'sacramen';
    protected $primaryKey = 'ID';
    public  $timestamps = false;
    use HasFactory;

    protected $fillable=[
        'c_parroquia',
        'parroq',
        'sacano',
        'bauinf',
        'baunin',
        'baumay',
        'bauadu',
        'pcteca',
        'pccole',
        'coteca',
        'cocole',
        'matcat',
        'matmix'
    ];
}
