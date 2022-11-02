<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdTicketsComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_tickets_comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id');
            $table->text('comentario');
            $table->unsignedBigInteger('estatus_ticket_id');
            $table->unsignedBigInteger('agente_id');
            $table->timestamps();

            $table->foreign('estatus_ticket_id')
                ->references('id')->on('sd_estatus_tickets');

            $table->foreign('ticket_id')
                ->references('id')->on('sd_tickets');

            $table->foreign('agente_id')
                ->references('id')->on('sd_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sd_tickets_comentarios');
    }
}
