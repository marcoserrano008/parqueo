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
        Schema::create('CLIENTE', function (Blueprint $table) {
            $table->integer('id_cliente')->primary();
            $table->string('nombre', 45)->nullable();
            $table->string('apellido_paterno', 45)->nullable();
            $table->string('apellido_materno', 45)->nullable();
            $table->string('rol', 45)->nullable();
            $table->integer('celular')->nullable();
            $table->string('correo', 100)->nullable();
            $table->string('placa_vehiculo', 15)->nullable()->index('placa_vehiculo_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CLIENTE');
    }
};
