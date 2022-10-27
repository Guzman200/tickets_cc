<?php

namespace Database\Seeders;

use App\Models\TipoEvidencia;
use Illuminate\Database\Seeder;

class TipoEvidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoEvidencia::create([
            'tipo' => 'Entrega de mercancía'
        ]);

        TipoEvidencia::create([
            'tipo' => 'CR-Acuse de ingreso'
        ]);

        TipoEvidencia::create([
            'tipo' => 'Comprobante de pago'
        ]);

        TipoEvidencia::create([
            'tipo' => 'Reporte fotográfico lugar'
        ]);

        TipoEvidencia::create([
            'tipo' => 'Soporte de gestiones'
        ]);

        
    }
}
