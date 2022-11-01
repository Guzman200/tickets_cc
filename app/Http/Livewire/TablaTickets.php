<?php

namespace App\Http\Livewire;

use App\Models\EstatusTicket;
use App\Models\Tickets;
use App\Models\TipoFormulario;
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
    public $estatus_ticket_id = "";
    public $tipo_formulario_id = "";

    public function render()
    {

        $tickets = Tickets::with(['usuarioSolicita','estatus']);

        if($this->search != ""){

            $search = $this->search;

            $tickets = $tickets->where(function($query) use ($search){

                $query->where('id', 'like', "%{$search}%")
                    ->orWhereHas('usuarioSolicita', function($query) use ($search){
                        $query->where('nombres', 'like', "%{$search}%")
                            ->orWhere('apellidos', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    })
                    ->orWhereHas('usuarioAsignado', function($query) use ($search){
                        $query->where('nombres', 'like', "%{$search}%")
                            ->orWhere('apellidos', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    })
                    ->orWhereHas('empresa', function($query) use ($search){
                        $query->where('nombre', 'like', "%{$search}%");
                    })
                    ->orWhereHas('estatus', function($query) use ($search){
                        $query->where('estatus', 'like', "%{$search}%");
                    })
                    ->orWhereHas('tipoFormulario', function($query) use ($search){
                        $query->where('nombre', 'like', "%{$search}%");
                    });
            });

        }

        if($this->fecha != ""){
            $tickets = $tickets->whereRaw("to_char(sd_tickets.created_at, 'YYYY-MM-DD')::date = ?", [$this->fecha]);
        }

        if($this->estatus_ticket_id != ""){
            $tickets = $tickets->where("estatus_ticket_id", $this->estatus_ticket_id);
        }

        if($this->tipo_formulario_id != ""){
            $tickets = $tickets->where("tipo_formulario_id", $this->tipo_formulario_id);
        }

        if (auth()->user()->esCliente()) {

            $tickets = $tickets->where('usuario_solicita_id', auth()->user()->id);
            
        }

        if (auth()->user()->esAgente()) {

            $tickets = $tickets->where('usuario_asignado_id', auth()->user()->id);
            
        }

        if (auth()->user()->esAdminCliente()) {

            $tickets = $tickets->where('empresa_id', auth()->user()->empresa_id);
            
        }

        $tickets = $tickets->orderBy('sd_tickets.id', 'DESC')->paginate(15);

        foreach($tickets as $ticket){
            $date = Carbon::parse($ticket->created_at);
            //$ticket->fecha_registro = $date->locale('es')->translatedFormat('l d \\de  F \\de\\l Y \\a \\l\\a\\s h:i:s A');
            $ticket->fecha_registro = $date->locale('es')->format('d/m/Y h:i:s A');
        }

        $estatusTickets = EstatusTicket::orderBy('estatus')->get();
        $tiposFormularios = TipoFormulario::orderBy('nombre')->get();
        
        

        return view('livewire.tabla-tickets', compact('tickets', 'estatusTickets', 'tiposFormularios'));
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
