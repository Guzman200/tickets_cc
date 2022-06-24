<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class TablaUsuarios extends Component
{

    public $crearUsuario = false;

    public function render()
    {

        $users = User::paginate(10);

        return view('livewire.tabla-usuarios', compact('users'));
    }
}
