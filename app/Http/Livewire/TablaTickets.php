<?php

namespace App\Http\Livewire;

use App\Models\Tickets;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class TablaTickets extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $user = User::findOrFail(Auth()->user()->id);

        if ($user->esAdmin()) {

            $tickets = Tickets::with(['usuario','usuario.area','estatus'])->paginate(15);
            
        }else{
            $tickets = Tickets::with(['usuario','usuario.area','estatus'])
                ->where(function ($query) use ($user) {
                    $query->whereHas('usuario', function ($query) use ($user) {
                        $query->where('usuario_id', $user->id);
                    });
                })->paginate(15);
        }

        foreach($tickets as $ticket){
            $date = Carbon::parse($ticket->created_at);
            $ticket->fecha_registro = $date->locale('es')->translatedFormat('l d \\de  F \\de\\l Y \\a \\l\\a\\s h:i:s A');
        }
        

        return view('livewire.tabla-tickets', compact('tickets'));
    }
}
