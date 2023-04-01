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
        Schema::create('ESPACIO', function (Blueprint $table) {
            $table->string('id_espacio', 10)->primary();
            $table->string('estado', 30)->nullable();
            $table->integer('ci_propietario')->nullable()->index('ci_propietario_idx');
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
        Schema::dropIfExists('ESPACIO');
    }
};
