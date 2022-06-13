<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function create(Request $request){
        $validated = $request->validate([
            'descripcion' => 'required',
        ]);
        $user = Auth()->user();

        Tickets::create([
            'usuario_id' => $user->id,
            'estatus_ticket_id' => 1,
            'descripcion' => $request->descripcion 
        ]);

        return redirect('tickets')->with('creacion_ticket_status', 'Ticket Creado con Exito!');
    }
}
