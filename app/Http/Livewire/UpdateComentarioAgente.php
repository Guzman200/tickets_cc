<?php

namespace App\Http\Livewire;

use App\Models\TicketComentario;
use App\Models\Tickets;
use Livewire\Component;

class UpdateComentarioAgente extends Component
{

    protected $listeners = ['updatedEstatusTicket'];

    public $ticket_id;
    public $comentario_agente;

    public function render()
    {

        $ticket = Tickets::findOrFail($this->ticket_id);

        return view('livewire.update-comentario-agente', compact('ticket'));
    }

    public function guardarComentario()
    {

        $this->validate([
            'comentario_agente'         => 'required'
        ], [], [
            'comentario_agente' => 'comentario agente'
        ]);

        $ticket = Tickets::findOrFail($this->ticket_id);

        TicketComentario::create([
            'ticket_id'         => $this->ticket_id,
            'comentario'        => $this->comentario_agente,
            'estatus_ticket_id' => $ticket->estatus_ticket_id,
            'agente_id'         => auth()->user()->id
        ]);

        $this->comentario_agente = "";

        session()->flash('success', 'Tu comentario se ha realizado exitosamente');
    }

    public function updatedEstatusTicket()
    {
        //
    }
}
