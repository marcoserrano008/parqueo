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
        Schema::create('SERVICIO', function (Blueprint $table) {
            $table->integer('id_servicio', true);
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fin')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string('placa_vehiculo', 15)->nullable()->index('placa_vehiculo_idx');
            $table->string('id_espacio', 10)->nullable()->index('id_espacio_idx');
            $table->string('observacion', 90)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SERVICIO');
    }
};
