<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TablaUsuarios extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {

        $users = User::paginate(15);

        return view('livewire.tabla-usuarios', compact('users'));
    }
}
