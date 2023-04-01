<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('RESERVA', function (Blueprint $table) {
            $table->foreign(['ci_cliente'], 'ci_cliente')->references(['id_cliente'])->on('CLIENTE')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_espacio'], 'id_espacio')->references(['id_espacio'])->on('ESPACIO')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('RESERVA', function (Blueprint $table) {
            $table->dropForeign('ci_cliente');
            $table->dropForeign('id_espacio');
        });
    }
};
