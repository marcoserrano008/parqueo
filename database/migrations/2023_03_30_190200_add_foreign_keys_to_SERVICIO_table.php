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
        Schema::table('SERVICIO', function (Blueprint $table) {
            $table->foreign(['id_espacio'], 'fk_id_espacio')->references(['id_espacio'])->on('ESPACIO')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['placa_vehiculo'], 'fk_placa_vehiculo')->references(['placa_vehiculo'])->on('VEHICULO')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('SERVICIO', function (Blueprint $table) {
            $table->dropForeign('fk_id_espacio');
            $table->dropForeign('fk_placa_vehiculo');
        });
    }
};
