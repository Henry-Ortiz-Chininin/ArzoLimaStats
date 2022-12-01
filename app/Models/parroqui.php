<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parroqui extends Model
{
    protected $table = 'parroqui';
    protected $primaryKey = 'ID';
    use HasFactory;
}
