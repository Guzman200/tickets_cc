<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'descripcion' => 'required',
        ]);
        $user = Auth()->user();

        $ticket = Tickets::create([
            'usuario_id' => $user->id,
            'estatus_ticket_id' => 1,
            'descripcion' => $request->descripcion
        ]);

        $mensaje = "Ticket creado con exito, el folio de tu ticket es " . $ticket->id;

        return redirect('tickets')->with('creacion_ticket_status', $mensaje);
    }

    public function verDescripcion(Request $request, Tickets $ticket)
    {

        $date = Carbon::parse($ticket->created_at);
        $ticket->fecha_registro = $date->locale('es')->translatedFormat('l d \\de  F \\de\\l Y \\a \\l\\a\\s h:i:s A');

        return view('ver_descripcion', compact("ticket"));
    }
}
