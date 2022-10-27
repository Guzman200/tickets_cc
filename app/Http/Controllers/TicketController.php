<?php

namespace App\Http\Controllers;

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

        // Si el usuario no es administrador
        if(!auth()->user()->esAdmin()){

            // Verificamos que el ticket sea del usuario en sesion
            if( !($ticket->usuario_id == auth()->user()->id)){
                abort(404);
            }

        }

        $date = Carbon::parse($ticket->created_at);
        $ticket->fecha_registro = $date->locale('es')->translatedFormat('l d \\de  F \\de\\l Y \\a \\l\\a\\s h:i:s A');

        return view('ver_descripcion', compact("ticket"));
    }
}
