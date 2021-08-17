<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->integer('tipo_id')->unsigned();
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('login')->unique();;
            $table->string('senha');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade');
        });

        /*Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('tipo_id')->references('id')->on('tipos');
            
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}