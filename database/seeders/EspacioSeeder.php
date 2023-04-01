<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;

class EspacioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $espacios = [];
    
        $estados = ["libre", "ocupado", "reservado"];
    
        for ($i = 1; $i <= 12; $i++) {
            for ($j = 1; $j <= 10; $j++) {
                $id_espacio = chr(64 + $i) . $j;
                $estado = ($i == $j) ? 'ocupado' : 'libre';
                $espacios[] = ['id_espacio' => $id_espacio, 'estado' => $estado];
            }
        }
    
        DB::table('ESPACIO')->insert($espacios);
    }
}
