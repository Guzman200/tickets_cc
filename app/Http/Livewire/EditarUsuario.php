<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\TipoUsuario;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditarUsuario extends Component
{

    public $user_id;
    public $nombres;
    public $apellidos;
    public $email;
    public $password = "";
    public $tipo_usuario_id;
    public $area_id;

    public function render()
    {

        $tipos_usuarios = TipoUsuario::get();
        $areas = Area::get();

        return view('livewire.editar-usuario', compact('tipos_usuarios', 'areas'));
    }

    public function editar(){

        $validatedData = $this->validate([
            'nombres'         => 'required',
            'apellidos'       => 'required',
            'email'           => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user_id)],
            'password'        => 'nullable|min:5',
            'tipo_usuario_id' => 'required',
            'area_id'         => 'required',
        ], [], [
            'password' => 'contraseña',
            'tipo_usuario_id' => 'tipo de usuario',
            'area_id' => 'area'
        ]);

        if($this->password != ""){
            $validatedData['password'] = Hash::make($this->password);
        }

        User::findOrFail($this->user_id)->update($validatedData);
        
        session()->flash('usuario_editado', 'Usuario editado correctamente');
    }
}
