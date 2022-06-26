<?php

namespace App\Http\Livewire;

use App\Models\User;
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
                        ->orWhereHas('area', function($query) use ($search) {
                            $query->where('area', 'like', "%{$search}%");
                        })
                        ->orWhereHas('tipoUsuario', function($query) use ($search) {
                            $query->where('tipo', 'like', "%{$search}%");
                        })
                        ->paginate(15);
        }else{
            $users = User::paginate(15);
        }

        return view('livewire.tabla-usuarios', compact('users'));
    }
}
