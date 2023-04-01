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
        Schema::table('ESPACIO', function (Blueprint $table) {
            $table->foreign(['ci_propietario'], 'ci_propietario')->references(['id_cliente'])->on('CLIENTE')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ESPACIO', function (Blueprint $table) {
            $table->dropForeign('ci_propietario');
        });
    }
};
