<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\TipoUsuario;
use Livewire\Component;

class CrearUsuario extends Component
{
    public function render()
    {

        $tipos_usuarios = TipoUsuario::get();
        $areas = Area::get();

        return view('livewire.crear-usuario', compact('tipos_usuarios', 'areas'));
    }
}
