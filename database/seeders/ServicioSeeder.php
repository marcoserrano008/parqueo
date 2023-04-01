<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('SERVICIO')->insert([
            [
                'fecha_inicio'=>'2023-03-03', 'fecha_fin'=>'2023-03-03', 'hora_inicio'=>'10:30', 'hora_fin'=>'12:30',
                'id_espacio'=>'A1','placa_vehiculo'=> '0000AAA',
            ],
            [
                'fecha_inicio'=>'2023-03-16', 'fecha_fin'=>'2023-03-17', 'hora_inicio'=>'22:30', 'hora_fin'=>'08:30',
                'id_espacio'=>'A1','placa_vehiculo'=> '0000AAA',
            ],

        ]);

        DB::table('SERVICIO')->insert([
            [
                'fecha_inicio'=>'2023-03-03', 'hora_inicio'=>'10:30',
                'id_espacio'=>'A1','placa_vehiculo'=> '0000AAA',
            ],
            [
                'fecha_inicio'=>'2023-03-30', 'hora_inicio'=>'21:30',
                'id_espacio'=>'B10','placa_vehiculo'=> '1111AAA',
            ],
            [
                'fecha_inicio'=>'2023-03-31', 'hora_inicio'=>'08:25',
                'id_espacio'=>'C3','placa_vehiculo'=> '2222AAA',
            ],
            [
                'fecha_inicio'=>'2023-03-19', 'hora_inicio'=>'16:30',
                'id_espacio'=>'J4','placa_vehiculo'=> '1234ABC',
            ],
        ]);
    }
}
