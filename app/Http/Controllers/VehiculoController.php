<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
    function index()
    {
        $vehiculos = Vehiculo::join('CLIENTE', 'VEHICULO.placa_vehiculo', '=', 'CLIENTE.placa_vehiculo')
            ->select('VEHICULO.placa_vehiculo', 'CLIENTE.nombre')
            ->get();

        if($vehiculos->count() > 0){
            return $vehiculos;
        }
        else{
            return 'No records found Dx';
        }
    }
}
