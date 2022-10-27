<?php

namespace Database\Seeders;

use App\Models\TipoFormulario;
use Illuminate\Database\Seeder;

class TipoFormularioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoFormulario::create([
            'nombre' => 'Integración de pago',
            'empresa_id' => 1
        ]);

        TipoFormulario::create([
            'nombre' => 'Evidencias gestión',
            'empresa_id' => 1
        ]);

        TipoFormulario::create([
            'nombre' => 'Seguimiento de cuenta',
            'empresa_id' => 1
        ]);

        TipoFormulario::create([
            'nombre' => 'Expendiente legal',
            'empresa_id' => 1
        ]);

        TipoFormulario::create([
            'nombre' => 'Recolección CPR y BKHL',
            'empresa_id' => 1
        ]);
    }
}
