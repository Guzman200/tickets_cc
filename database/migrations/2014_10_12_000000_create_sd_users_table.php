<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_users', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('estatus')->default(1);
            $table->unsignedBigInteger('tipo_usuario_id');
            $table->unsignedBigInteger('empresa_id');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('tipo_usuario_id')
                ->references('id')->on('sd_tipos_usuario');
            
            $table->foreign('empresa_id')
                ->references('id')->on('sd_empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sd_users');
    }
}
