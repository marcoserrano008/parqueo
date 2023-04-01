<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('CLIENTE')->insert([
            [
                'id_cliente'=>'1234567', 'nombre'=>'marco','apellido_paterno'=>'serrano',
                'apellido_materno'=>'bazan', 'rol'=>'estudiante', 'celular'=>'69459869',
                'celular'=>'69459869', 'correo'=>'marcoserrano008@gmail.com', 'placa_vehiculo'=>'1234ABC', 
            ],
            [
                'id_cliente'=>'1123456', 'nombre'=>'jose','apellido_paterno'=>'perez',
                'apellido_materno'=>'lopez', 'rol'=>'estudiante', 'celular'=>'69459869',
                'celular'=>'78245598', 'correo'=>'joserperez@gmail.com', 'placa_vehiculo'=>'0000AAA', 
            ],
            [
                'id_cliente'=>'1112345', 'nombre'=>'manuel','apellido_paterno'=>'perez',
                'apellido_materno'=>'salvador', 'rol'=>'estudiante', 'celular'=>'69459869',
                'celular'=>'73756884', 'correo'=>'manuelperez@gmail.com', 'placa_vehiculo'=>'1111AAA', 
            ],
            [
                'id_cliente'=>'1111234', 'nombre'=>'maria','apellido_paterno'=>'saavedra',
                'apellido_materno'=>'salazar', 'rol'=>'estudiante', 'celular'=>'69459869',
                'celular'=>'69457812', 'correo'=>'mariasaavedra@gmail.com', 'placa_vehiculo'=>'2222AAA', 
            ],
        ]);
    } 
}
