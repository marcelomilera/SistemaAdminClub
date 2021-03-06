<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSorteoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sorteo',function (Blueprint $table){
            //Estos son los atributos que estaban en el caso de uso
            $table->increments('id');
            $table->string('nombre_sorteo');
            $table->string('descripcion');
            $table->integer('id_sede');
            $table->integer('numero_bungalows');
            $table->date('fecha_abierto');
            $table->date('fecha_cerrado');            
            $table->Boolean('estado');
            $table->softDeletes();
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
        Schema::drop('sorteo');
    }
}
