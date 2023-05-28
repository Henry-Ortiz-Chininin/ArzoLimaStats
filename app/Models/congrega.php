<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class congrega extends Model
{
    protected $table = 'congrega';
    protected $primaryKey = 'ID';
    const CREATED_AT = 'd_suscrip';
    const UPDATED_AT = 'd_suscrip';

    use HasFactory;

    protected $fillable = ['c_codigo', //Codigo Identificador
                            'codigo', 
                            'x_nombre', 
                            'c_vicaria', 
                            'emailcon' ,
                            'derech', 
                            'siglas' ,
                            'carism', 
                            'fundad', 
                            'fundac', 
                            'lugarf', 
                            'nomgen', 
                            'dirgen', 
                            'faxgen', 
                            'telgen', 
                            'apagen', 
                            'emailgen', 
                            'desgen', 
                            'hasgen', 
                            'fecfun', 
                            'nomnac', 
                            'carnac', 
                            'dirnac', 
                            'faxnac', 
                            'telnac', 
                            'apanac', 
                            'emailnac', 
                            'desnac', 
                            'hasnac', 
                            'codniv', 
                            'c_niv', 
                            'desniv', 
                            'hasniv', 
                            'ncasas', 
                            'nobras', 
                            'ncoles', 
                            'nactiv', 
                            'nmiemb', 
                            'flagde', 
                            'i_retirada', 
                            'd_retirada',
                            'x_coment' 
    
    ];
}
