<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(EmpresaSeeder::class);
        $this->call(TipoUsuarioSeeder::class);
        $this->call(EstatusTicketsSeeder::class);
        $this->call(ZonaEmpresaSeeder::class);
        $this->call(TipoEvidenciaSeeder::class);
        $this->call(TipoFormularioSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TipoPrioridadSeeder::class);
    }
}
