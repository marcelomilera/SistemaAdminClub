<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reserva', function (Blueprint $table) {
            $table->foreign('ambiente_id')
                  ->references('id')
                  ->on('ambiente');
            $table->foreign('id_persona')
                  ->references('id')
                  ->on('persona');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reserva', function (Blueprint $table) {
            $table->dropForeign('reserva_ambiente_id_foreign');
            $table->dropForeign('reserva_id_persona_foreign');
        });
    }
}
