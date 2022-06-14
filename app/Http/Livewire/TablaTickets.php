<?php

namespace App\Http\Livewire;

use App\Models\Tickets;
use App\Models\User;
use Livewire\Component;

class TablaTickets extends Component
{
    public $tickets;

    public function render()
    {
        $user = User::findOrFail(Auth()->user()->id);

        if ($user->esAdmin()) {

            $this->tickets = Tickets::with(['usuario','usuario.area','estatus'])->get();
            
        }else{
            $this->tickets = Tickets::with(['usuario','usuario.area','estatus'])
                ->where(function ($query) use ($user) {
                    $query->whereHas('usuario', function ($query) use ($user) {
                        $query->where('tipo_usuario_id', $user->id);
                    });
                })->get();
        }
        

        return view('livewire.tabla-tickets');
    }
}
