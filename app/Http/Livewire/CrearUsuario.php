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

        //$this->resetErrorBag();
        //$this->resetValidation();

        $validatedData = $this->validate([
            'nombres'         => 'required',
            'apellidos'       => 'required',
            'email'           => 'required|email|unique:users',
            'password'        => 'required',
            'tipo_usuario_id' => 'required',
            'area_id'         => 'required',
        ], [], [
            'password' => 'contraseña',
            'tipo_usuario_id' => 'tipo de usuario',
            'area_id' => 'area'
        ]);

        $validatedData['password'] = Hash::make($this->password);

        User::create($validatedData);

        $this->reset(['nombres', 'apellidos', 'email', 'password', 'tipo_usuario_id', 'area_id']);
        
        session()->flash('usuario_creado', 'Usuario creado correctamente');
    }
}
