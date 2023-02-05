<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class miembros extends Model
{
    protected $table = 'miembros';
    protected $primaryKey = 'ID';
    use HasFactory;
    const CREATED_AT = 'suscri';
    const UPDATED_AT = 'suscri';

    protected $fillable = [
        'c_codigo', //Codigo 
        'c_congrega', //Codigo Congregacion
        'congre', //Siglas congreacion
        'codigo', //Codigo 
        'vicari', //Nombre Vicaria 
        'c_vicaria', //Codigo Vicaria 
        'c_decanato', //Codigo Decanato
        'suscri', //Fecha de creacion/actualizacion 
        'patern', //Apellido paterno
        'matern', //apellido materno
        'nombre', //nombres
        'sexomf', //Sexo M/F
        'siglas', //Siglas 
        'nacimi', //Fecha de nacimiento 
        'lugarn', //Lugar de nacimiento
        'forden', //Fecha de ordenacion
        'lugaro', //Lugar de ordenacion
        'clases', //tipo de clase
        'c_clase', //Codigo identificador de clase
        'cargos', //Codigo asociado
        'c_cargo', //Codigo identificador de cargo
        'cenlab', //Centro de labores
        'direcc', //direccion
        'distri', //codigo de distrito
        'telef1', //Telefono
        'telfax', //Celular
        'aparta', //Apartado
        'email', //email
        'observ', //Observacion 
        'estudi', //Estudios
        'flagde', //Flag desactivado
        'archiv', //Archivo
        'x_nombres', //Nombre + Ape Paterno + Ape Materno + Siglas 
        'i_ausente', //Flag ausente
        'i_fallecido', //Flag fallecido
        'i_retirado', //Flag retirado
        'i_incardi', //Flag incardinado
        'i_excardi', //Flag excardinado
        'd_ausente', //Fecha de ausencia
        'd_fallecido', //fecha de fallecido
        'd_retirado', //Fecha de retiro
        'd_incardi', //Fecha de incardinacion
        'd_excardi', //Fecha de Excardinacion
        'x_excardi', //Codigo 
        'c_estado' //Estado, default 1, Ausente 2, Fallecido 3 (No considerados: Incardinado 5, Excardinado 6) 

                            ];
}
