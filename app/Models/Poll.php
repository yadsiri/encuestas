<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    // Permitir asignación masiva para estos campos
    protected $fillable = ['title', 'description'];

    // Relación: Un Poll tiene muchas opciones
    public function options()
    {
        return $this->hasMany(PollOption::class);
    }
}
