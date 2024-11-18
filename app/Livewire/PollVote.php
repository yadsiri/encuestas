<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Poll;
use App\Models\Vote;
use App\Models\PollOption;
use App\Models\User;

class PollVote extends Component
{
    public $poll;
    public $selectedOption;

    public function mount(Poll $poll)
    {
        $this->poll = $poll->load('options'); // Cargar las opciones de la encuesta
        dd($this->poll);  // Verifica que se están cargando correctamente las opciones
    }
    
    public function options()
{
    return $this->hasMany(PollOption::class);
}

    public function vote()
    {
        // Validar si se seleccionó una opción válida
        $this->validate([
            'selectedOption' => 'required|exists:poll_options,id',
        ]);
    
        // Obtener la opción seleccionada y aumentar el contador de votos
        $option = PollOption::find($this->selectedOption);
        $option->increment('votes');
    
        // Registrar el voto del usuario
        Vote::create([
            'poll_option_id' => $this->selectedOption,
            'poll_id' => $this->poll->id,
        ]);
        
    
        // Mensaje de éxito
        session()->flash('success', '¡Gracias por tu voto!');
    
        // Actualizar el componente o redirigir (redirigir es opcional)
        $this->emit('voteSubmitted'); // Este evento actualizará la vista si es necesario
    }

    public function render()
    {
        return view('livewire.poll-vote', [
            'poll' => $this->poll,  // Pasa la encuesta a la vista
        ]);
    }
    
    
}
