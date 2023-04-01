<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('VEHICULO')->insert([
            ['placa_vehiculo' => '1234ABC', 'marca' => 'suzuki', 'modelo' => 'celerio', 'tipo' => 'vagoneta'],
            ['placa_vehiculo' => '0000AAA', 'marca' => 'toyota', 'modelo' => 'rav4', 'tipo' => 'vagoneta'],
            ['placa_vehiculo' => '1111AAA', 'marca' => 'suzuki', 'modelo' => 'vitara', 'tipo' => 'vagoneta'],
            ['placa_vehiculo' => '2222AAA', 'marca' => 'toyota', 'modelo' => 'cube', 'tipo' => 'vagoneta'],
        ]);
    }
}
