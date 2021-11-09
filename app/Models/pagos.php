<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagos extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'id_cursos', 
        'id_user',
        'id_hijos',
        'tipopago',
        'costo',
        'verificar',
        'estatus'
    ];
}
