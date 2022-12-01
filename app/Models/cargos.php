<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cargos extends Model
{
    protected $table = 'cargos';
    protected $primaryKey = 'ID';
    use HasFactory;
}
