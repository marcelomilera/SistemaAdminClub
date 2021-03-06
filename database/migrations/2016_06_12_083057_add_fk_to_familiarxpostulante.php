<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToFamiliarxpostulante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('familiarxpostulante', function (Blueprint $table) {
            $table->foreign('postulante_id')->references('id_postulante')->on('postulante')->onDelete('cascade');
            $table->foreign('persona_id')->references('id')->on('persona')->onDelete('cascade');
            $table->foreign('tipo_familia_id')->references('id')->on('tipofamilia')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('familiarxpostulante', function (Blueprint $table) {
            $table->dropForeign('familiarxpostulante_postulante_id_foreign');
            $table->dropForeign('familiarxpostulante_persona_id_foreign');
            $table->dropForeign('familiarxpostulante_tipo_familia_id_foreign');               
        });
    }
}
