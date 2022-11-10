<?php

namespace Database\Seeders;

use App\Models\TipoPrioridad;
use Illuminate\Database\Seeder;

class TipoPrioridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoPrioridad::create(['tipo' => 'Alta']);
        TipoPrioridad::create(['tipo' => 'Media']);
        TipoPrioridad::create(['tipo' => 'Baja']);
    }
}
