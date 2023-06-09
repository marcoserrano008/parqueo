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
        Schema::table('CLIENTE', function (Blueprint $table) {
            $table->foreign(['placa_vehiculo'], 'placa_vehiculo')->references(['placa_vehiculo'])->on('VEHICULO')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('CLIENTE', function (Blueprint $table) {
            $table->dropForeign('placa_vehiculo');
        });
    }
};
