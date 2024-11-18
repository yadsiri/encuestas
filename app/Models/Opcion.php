<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    use HasFactory;

    protected $table = 'opciones';

    protected $fillable = ['opcion', 'encuesta_id'];
    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class);
    }
}

