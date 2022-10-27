<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_tickets', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('usuario_solicita_id');
            $table->unsignedBigInteger('usuario_asignado_id')->nullable();
            $table->text('descripcion_solicitud')->nullable();
            $table->unsignedBigInteger('estatus_ticket_id');
            $table->string('cpr_bkhl')->nullable();
            $table->string('no_cuenta_deudor')->nullable();
            $table->string('deudor')->nullable();
            $table->date('fecha_transferencia')->nullable();
            $table->float('monto')->nullable();
            $table->unsignedBigInteger('tipo_evidencia_id')->nullable();
            $table->unsignedBigInteger('zona_empresa_id')->nullable();
            $table->date('fecha_atencion')->nullable();
            $table->timestamps();

            $table->foreign('usuario_solicita_id')
                ->references('id')->on('sd_users');

            $table->foreign('usuario_asignado_id')
                ->references('id')->on('sd_users');

            $table->foreign('estatus_ticket_id')
                ->references('id')->on('sd_estatus_tickets');

            $table->foreign('tipo_evidencia_id')
                ->references('id')->on('sd_tipos_evidencias');

            $table->foreign('zona_empresa_id')
                ->references('id')->on('sd_zonas_empresa');
                   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sd_tickets');
    }
}
