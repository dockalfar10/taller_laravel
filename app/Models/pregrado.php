<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pregrado extends Model
{
    use HasFactory;

    protected $table = 'pregrados';

    protected $fillable = [
        'nombre',
        'img',
        'plasEs',
        'duracion',
        'facultad',
        'titulo',
        'estado'        
    ];
}
