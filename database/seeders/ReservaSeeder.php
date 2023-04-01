<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
date_default_timezone_set("America/New_York");

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('RESERVA')->insert([
            [
                'id_espacio'=>'A1', 'ci_cliente'=>'1234567', 'hora_solicitada'=>'18:30', 'fecha_solicitada'=>'2023-04-10',
                'minutos_solicitados'=>'120','timestamp'=> date("Y-m-d H:i:s"),
            ],
        ]);
        DB::table('RESERVA')->insert([
            [
                'id_espacio'=>'D7', 'ci_cliente'=>'1234567', 'hora_solicitada'=>'18:30', 'fecha_solicitada'=>'2023-04-10',
                'minutos_solicitados'=>'120','timestamp'=> date("Y-m-d H:i:s"),'estado'=>'aceptado',
            ],
            [
                'id_espacio'=>'L1', 'ci_cliente'=>'1234567', 'hora_solicitada'=>'18:30', 'fecha_solicitada'=>'2023-04-10',
                'minutos_solicitados'=>'120','timestamp'=> date("Y-m-d H:i:s"),'estado'=>'aceptado',
            ],
            [
                'id_espacio'=>'C5', 'ci_cliente'=>'1234567', 'hora_solicitada'=>'18:30', 'fecha_solicitada'=>'2023-04-10',
                'minutos_solicitados'=>'120','timestamp'=> date("Y-m-d H:i:s"),'estado'=>'aceptado',
            ],
        ]);
    }
}
