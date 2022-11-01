<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class TablaUsuarios extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = "";
    
    public function render()
    {

        if($this->search != ""){
            $search = $this->search;
            $users = User::where('nombres', 'like', "%{$this->search}%")->orWhere('apellidos', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%")
                        ->orWhereHas('empresa', function($query) use ($search) {
                            $query->where('nombre', 'like', "%{$search}%");
                        })
                        ->orWhereHas('tipoUsuario', function($query) use ($search) {
                            $query->where('tipo', 'like', "%{$search}%");
                        })
                        ->paginate(15);
        }else{
            $users = User::paginate(15);
        }

        foreach($users as $user){
            $date = Carbon::parse($user->created_at);
            //$user->fecha_registro = $date->locale('es')->translatedFormat('l d \\de  F \\de\\l Y \\a \\l\\a\\s h:i:s A');
            $user->fecha_registro = $date->locale('es')->format('d/m/Y h:i:s A');
        }

        return view('livewire.tabla-usuarios', compact('users'));
    }

    public function cambiarEstatus($user_id)
    {

        $user = User::findOrFail($user_id);
        
        $user->estatus = !$user->estatus;

        $user->update();
    }
}
