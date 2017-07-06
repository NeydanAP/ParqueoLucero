<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstacionamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estacionamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechaingreso');
            $table->Time('horaigreso');

            $table->integer('espacio_id')->unsigned();
            $table->foreign('espacio_id')->references('id')->on('espacios')->onDelete('cascade');

            $table->integer('vehiculo_id')->unsigned();
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('estacionamientos');
    }
}
