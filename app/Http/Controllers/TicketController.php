<?php

namespace App\Http\Controllers;

use App\Models\EstatusTicket;
use App\Models\Tickets;
use App\Models\TipoFormulario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{

    /**
     * Seleccionar el tipo de formulario para el ticket
     * 
     * @return view
     */
    public function selectTipoFormulario()
    {

        $tiposFormularios = TipoFormulario::where('empresa_id', auth()->user()->empresa_id)->get();

        return view('ticket.selecciona_formulario', compact('tiposFormularios'));

    }

    public function crear(TipoFormulario $tipoFormulario)
    {
        return view('ticket.crear', compact('tipoFormulario'));   
    }

    public function verDescripcion(Request $request, Tickets $ticket)
    {

        if(auth()->user()->esAdminCliente()){

            // Verificamos que el ticket sea de la empresa del admin cliente
            if( !($ticket->empresa_id == auth()->user()->empresa_id)){
                abort(404);
            }

        }

        if(auth()->user()->esAgente()){

            // Verificamos que el ticket lo tenga asignado el agente
            if( !($ticket->usuario_asignado_id == auth()->user()->id)){
                abort(404);
            }

        }

        if(auth()->user()->esCliente()){

            // Verificamos que el ticket alla sido generado por el cliente
            if( !($ticket->usuario_solicita_id == auth()->user()->id)){
                abort(404);
            }

        }

        return view('ver_descripcion', compact("ticket"));
    }
}
