<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tarifas', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('val_hora', 5, 2);
            $table->decimal('val_dia', 5, 2);
            $table->decimal('val_mes', 5, 2);

            $table->integer('clase_id')->unsigned();
            $table->foreign('clase_id')->references('id')->on('clases')->onDelete('cascade');

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
        Schema::dropIfExists('tarifas');
    }
}
