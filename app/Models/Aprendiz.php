<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aprendiz extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'nombre_completo',
        'estado',
        'ficha_id'
    ];

    public function ficha()
    {
        return $this->belongsTo(Ficha::class);
    }
    
}

?>
