<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class miembros extends Model
{
    protected $table = 'miembros';
    protected $primaryKey = 'ID';
    use HasFactory;
}