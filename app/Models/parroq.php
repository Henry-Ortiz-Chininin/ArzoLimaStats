<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parroq extends Model
{
    protected $table = 'parroq';
    protected $primaryKey = 'ID';
    use HasFactory;
}
