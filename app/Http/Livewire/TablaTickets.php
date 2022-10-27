<?php

namespace App\Http\Livewire;

use App\Models\EstatusTicket;
use App\Models\Tickets;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TablaTickets extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = "";
    public $fecha  = "";

    public function render()
    {

        $tickets = Tickets::with(['usuarioSolicita','estatus']);

        if($this->search != ""){

            $search = $this->search;

            $tickets = $tickets->where(function($query) use ($search){

                $query->where('id', 'like', "%{$search}%")
                    ->orWhereHas('usuario.area', function($query) use ($search){
                        $query->where('area', 'like', "%{$search}%");
                    })
                    ->orWhereHas('usuario', function($query) use ($search){
                        $query->where('nombres', 'like', "%{$search}%")
                            ->orWhere('apellidos', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    })
                    ->orWhereHas('estatus', function($query) use ($search){
                        $query->where('estatus', 'like', "%{$search}%");
                    });
            });

        }

        if($this->fecha != ""){

            $tickets = $tickets->whereRaw("DATE_FORMAT(tickets.created_at, '%Y-%m-%d') = ?", [$this->fecha]);

        }

        /*if (!auth()->user()->esAdmin()) {

            $tickets = $tickets->where('usuario_id', auth()->user()->id);
            
        }*/

        $tickets = $tickets->orderBy('sd_tickets.id', 'DESC')->paginate(15);

        foreach($tickets as $ticket){
            $date = Carbon::parse($ticket->created_at);
            $ticket->fecha_registro = $date->locale('es')->translatedFormat('l d \\de  F \\de\\l Y \\a \\l\\a\\s h:i:s A');
        }

        $estatusTickets = EstatusTicket::get();
        

        return view('livewire.tabla-tickets', compact('tickets', 'estatusTickets'));
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
    }
}
