<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('estatus_id');
            $table->string('solicitud');
            $table->timestamps();

            $table->foreign('usuario_id')
                ->references('id')->on('area');

            $table->foreign('estatus_id')
                ->references('id')->on('estatus');
                   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
}
