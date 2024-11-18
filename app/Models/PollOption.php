<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollOption extends Model
{
    use HasFactory;

    // Permitir asignación masiva para estos campos
    protected $fillable = ['poll_id', 'option_text', 'votes'];

    // Relación: Una opción pertenece a un Poll
    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }

}