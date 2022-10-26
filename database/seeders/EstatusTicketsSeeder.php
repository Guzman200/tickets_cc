<?php

namespace Database\Seeders;

use App\Models\Estatus;
use App\Models\EstatusTicket;
use Illuminate\Database\Seeder;

class EstatusTicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstatusTicket::create(['estatus' => 'Abierto']);
        EstatusTicket::create(['estatus' => 'En proceso']);
        EstatusTicket::create(['estatus' => 'Atendido']);
    }
}
