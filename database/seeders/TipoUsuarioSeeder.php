<?php

namespace Database\Seeders;

use App\Models\TipoUsuario;
use Illuminate\Database\Seeder;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoUsuario::create(['tipo' => 'administrador']);
        TipoUsuario::create(['tipo' => 'cliente']);
        TipoUsuario::create(['tipo' => 'agente']);
        TipoUsuario::create(['tipo' => 'administrador cliente']);
    }
}
