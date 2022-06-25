<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\TipoUsuario;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CrearUsuario extends Component
{

    public $nombres;
    public $apellidos;
    public $email;
    public $password;
    public $tipo_usuario_id;
    public $area_id;

    public function render()
    {

        $tipos_usuarios = TipoUsuario::get();
        $areas = Area::get();

        return view('livewire.crear-usuario', compact('tipos_usuarios', 'areas'));
    }

    public function crear()
    {
        $validatedData = $this->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'tipo_usuario_id' => 'required',
            'area_id' => 'required',
        ]);

        $validatedData['password'] = Hash::make($this->password);

        User::create($validatedData);
    }
}
