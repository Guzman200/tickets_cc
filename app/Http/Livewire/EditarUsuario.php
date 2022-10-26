<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\Empresa;
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
    public $empresa_id;

    public function render()
    {

        $tipos_usuarios = TipoUsuario::get();
        $empresas = Empresa::get();

        return view('livewire.editar-usuario', compact('tipos_usuarios', 'empresas'));
    }

    public function editar(){

        $validatedData = $this->validate([
            'nombres'         => 'required',
            'apellidos'       => 'required',
            'email'           => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user_id)],
            'password'        => 'nullable|min:5',
            'tipo_usuario_id' => 'required',
            'empresa_id'         => 'required',
        ], [], [
            'password' => 'contraseña',
            'tipo_usuario_id' => 'tipo de usuario',
            'empresa_id' => 'empresa'
        ]);

        if($this->password != ""){
            $validatedData['password'] = Hash::make($this->password);
        }

        User::findOrFail($this->user_id)->update($validatedData);
        
        session()->flash('usuario_editado', 'Usuario editado correctamente');
    }
}
