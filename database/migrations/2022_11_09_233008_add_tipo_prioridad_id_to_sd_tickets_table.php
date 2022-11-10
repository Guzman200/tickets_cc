<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoPrioridadIdToSdTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sd_tickets', function (Blueprint $table) {
            $table->unsignedBigInteger('tipo_prioridad_id')->nullable();
            $table->foreign('tipo_prioridad_id')->references('id')->on('sd_tipos_prioridad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sd_tickets', function (Blueprint $table) {
            //
        });
    }
}
