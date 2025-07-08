<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = ['documento_identidad', 'diploma_acta_bachiller',
     'certificado_eps', 'icfes', 'compromiso_aprendiz',
     'tratamientos_datos', 'documento_acudiente', 'estado', 'aprendiz_id'];
}
