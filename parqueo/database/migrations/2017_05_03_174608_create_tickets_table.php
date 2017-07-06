<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nrocochera');
            $table->integer('nropiso');
            $table->dateTime('ingreso');
           
           

            $table->integer('estacionamiento_id')->unsigned();
            $table->foreign('estacionamiento_id')->references('id')->on('estacionamientos')->onDelete('cascade');

            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
           

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
        Schema::dropIfExists('tickets');
    }
}
