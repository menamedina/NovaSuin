<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelEquipos extends Model
{
    use HasFactory;
    protected $guarded = []; //['status']; proyeger que no lo cambien
    protected $table = 'equipos';
}
