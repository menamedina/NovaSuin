<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDatosMaestros extends Model
{
    use HasFactory;
    protected $guarded = []; //['status']; proyeger que no lo cambien
    protected $table = 'datosmaestros';
}
