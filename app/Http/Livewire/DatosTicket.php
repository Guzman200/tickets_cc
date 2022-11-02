<?php

namespace App\Http\Livewire;

use App\Models\EstatusTicket;
use App\Models\Tickets;
use Carbon\Carbon;
use Livewire\Component;

class DatosTicket extends Component
{
    public $ticket_id;

    public function render()
    {
        $ticket = Tickets::findOrFail($this->ticket_id);

        $estatusTickets = EstatusTicket::orderBy('estatus')->get();

        $date = Carbon::parse($ticket->created_at);
        $ticket->fecha_registro = $date->locale('es')->format('d/m/Y h:i:s A');
        $ticket->fecha_transferencia = Carbon::parse($ticket->fecha_transferencia)->format('d/m/Y ');
        
        if(!is_null($ticket->fecha_update_atendido)){
            $ticket->fecha_update_atendido = Carbon::parse($ticket->fecha_update_atendido)
                ->format('d/m/Y h:i:s A');
        }

        return view('livewire.datos-ticket', compact('ticket', 'estatusTickets'));
    }

    public function cambiarEstatus($ticket_id, $estatus_id)
    {
        $data = ['estatus_ticket_id' => $estatus_id];

        // Si el estatus es en proceso
        if($estatus_id == 2){
            $data = ['estatus_ticket_id' => $estatus_id, 'fecha_update_en_proceso' => Carbon::now()];
        }

        // Si el estatus es atendido
        if($estatus_id == 3){
            $data = ['estatus_ticket_id' => $estatus_id, 'fecha_update_atendido' => Carbon::now()];
        }

        Tickets::findOrFail($ticket_id)->update($data);

        $this->emit('updatedEstatusTicket');
    }
}
