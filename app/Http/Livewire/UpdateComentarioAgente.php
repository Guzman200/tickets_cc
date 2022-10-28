<?php

namespace App\Http\Livewire;

use App\Models\Tickets;
use Livewire\Component;

class UpdateComentarioAgente extends Component
{

    public $ticket_id;
    public $comentario_agente;

    public function render()
    {

        $ticket = Tickets::findOrFail($this->ticket_id);

        $this->comentario_agente = $ticket->comentario_agente;

        return view('livewire.update-comentario-agente', compact('ticket'));
    }

    public function updateComentario()
    {

        $validatedData = $this->validate([
            'comentario_agente'         => 'required'
        ], [], [
            'comentario_agente' => 'comentario agente'
        ]);

        $ticket = Tickets::findOrFail($this->ticket_id);

        $ticket->comentario_agente = $this->comentario_agente;
        $ticket->update();

        session()->flash('success', 'Cambios guardados exitosamente');
    }
}
