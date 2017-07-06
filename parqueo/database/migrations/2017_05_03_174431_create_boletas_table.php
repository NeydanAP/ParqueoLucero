<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletas', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('ingreso');
            $table->dateTime('salida');
            $table->time('total_horas');
            $table->decimal('total_dias', 5, 2);
            $table->decimal('valor', 5, 2);
            $table->decimal('total_pagar', 5, 2);

            $table->integer('estacionamiento_id')->unsigned();
            $table->foreign('estacionamiento_id')->references('id')->on('estacionamientos')->onDelete('cascade');

            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->integer('tarifa_id')->unsigned();
            $table->foreign('tarifa_id')->references('id')->on('tarifas')->onDelete('cascade');

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
        Schema::dropIfExists('boletas');
    }
}
