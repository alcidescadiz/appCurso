<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hijos extends Model
{
    use HasFactory;



    protected $fillable = [
        'id_user',
        'nombres',
        'apellidos',
        'edad',
        'fechanacimiento',
        'estatus'
    ];

}
