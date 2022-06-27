<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
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
        return view('ver_descripcion', compact("ticket"));
    }
}
