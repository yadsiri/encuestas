<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    // Permitir asignación masiva
    protected $fillable = ['poll_id', 'poll_option_id', 'user_id'];

    // Relación con Poll (Encuesta)
    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }

    // Relación con PollOption (Opción de la encuesta)
    public function pollOption()
    {
        return $this->belongsTo(PollOption::class, 'poll_option_id');
    }

    // Relación con User (Usuario que votó)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

