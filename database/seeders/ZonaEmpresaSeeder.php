<?php

namespace Database\Seeders;

use App\Models\ZonaEmpresa;
use Illuminate\Database\Seeder;

class ZonaEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ZonaEmpresa::create([
            'empresa_id' => 1,
            'zona'       => 'Valle norte'
        ]);

        ZonaEmpresa::create([
            'empresa_id' => 1,
            'zona'       => 'Valle sur'
        ]);

        ZonaEmpresa::create([
            'empresa_id' => 1,
            'zona'       => 'Centro'
        ]);

        ZonaEmpresa::create([
            'empresa_id' => 1,
            'zona'       => 'Pacífico'
        ]);

        ZonaEmpresa::create([
            'empresa_id' => 1,
            'zona'       => 'Norte'
        ]);

        ZonaEmpresa::create([
            'empresa_id' => 1,
            'zona'       => 'Bajío'
        ]);

    }
}
