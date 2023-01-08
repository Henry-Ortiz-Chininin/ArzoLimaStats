<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parroqui extends Model
{
    protected $table = 'parroqui';
    protected $primaryKey = 'ID';
    const CREATED_AT = 'd_suscri';
    const UPDATED_AT = 'd_suscri';

    use HasFactory;

    protected $fillable = ['c_codigo', //Codigo Identificador
                            'c_vicaria', //Vicaria asociada
                            'c_decanato', //Decanato Asociado
                            'x_nombre', //Nombre de la parroquia
                            'x_direcc', //Direccion de la parroquia
                            'distri', //ID del distrito
                            'dirpos', //Direccion postal
                            'x_email', //Correo electronico
                            'vicari', //Correo electronico
                            'decana', //Correo electronico
                            'suscri', //Fecha de suscripcion o actualizacion formato texto
                            'd_suscri', //Fecha de suscripcion o actualizacion
                            'telef1', //Telefono fij
                            'telfax', //Celular/Wathsapp/Otro
                            'aparta', //Apartado postal
                            'congre', //Apartado postal
                            'c_congrega', //ID Congregacion
                            'siglas', //Siglas de la parroquia
                            'fecere', //Fecha de Creacion de la parroquia formato texto
                            'd_erec',  //Fecha de Creacion de la parroquia formato datetime
                            'adminf',
                            'nfamil',
                            'nmiemf',
                            'npoblac',
                            'ncapil',
                            'nobras',
                            'ncoles',
                            'nsacra',
                            'ncasas',
                            'observ',
                            'archiv',
                            'flagde', //Flag de desactivado
                            'i_desactivada', //indicador de desactivado
                            'd_desactivada' //Fecha de desactivacion
                        ];
}
