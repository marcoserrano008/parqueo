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
        Schema::create('RESERVA', function (Blueprint $table) {
            $table->integer('id_reserva', true);
            $table->string('id_espacio', 10)->nullable()->index('id_espacio_idx');
            $table->integer('ci_cliente')->nullable()->index('ci_cliente_idx');
            $table->time('hora_solicitada')->nullable();
            $table->date('fecha_solicitada')->nullable();
            $table->integer('minutos_solicitados')->nullable();
            $table->timestamp('timestamp')->nullable();
            $table->string('estado',30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('RESERVA');
    }
};
