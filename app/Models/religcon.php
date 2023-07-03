<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class religcon extends Model
{
    protected $table = 'religcon';
    protected $primaryKey = 'ID';
    public  $timestamps = false;
    use HasFactory;


    protected $fillable=[
        'c_congre',
        'c_anno',
        'n_profesas',
        'n_profesos',
        'n_sacerdotes',
        'n_laicosconsagrados'

    ];
}
