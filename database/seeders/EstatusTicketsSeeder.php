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
        EstatusTicket::create(['estatus' => 'Ticket Nuevo']);
        EstatusTicket::create(['estatus' => 'Proceso']);
        EstatusTicket::create(['estatus' => 'Finalizado']);
    }
}
