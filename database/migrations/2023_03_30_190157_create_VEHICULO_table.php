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
        Schema::create('VEHICULO', function (Blueprint $table) {
            $table->string('placa_vehiculo', 15)->primary();
            $table->string('marca', 45)->nullable();
            $table->string('modelo', 45)->nullable();
            $table->string('tipo', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('VEHICULO');
    }
};
