<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Espacio;

class EspacioController extends Controller
{
    function index()
    {
        $espacios = Espacio::select('id_espacio')->get();
        $espacios_ocupados = Espacio::join('SERVICIO','ESPACIO.id_espacio','=','SERVICIO.id_espacio')
        ->select('ESPACIO.id_espacio')
        ->whereNull('SERVICIO.hora_fin')
        ->where('SERVICIO.fecha_fin')
        ->get()
        ->pluck('id_espacio')
        ->toArray();

        $espacios_reservados = Espacio::join('RESERVA','ESPACIO.id_espacio','=','RESERVA.id_espacio')
        ->select('ESPACIO.id_espacio')
        ->where('RESERVA.estado','=','aceptado')
        ->get()
        ->pluck('id_espacio')
        ->toArray();

        $espacios_estado = [];

        foreach($espacios as $espacio){
            if(in_array($espacio->id_espacio, $espacios_ocupados)){
                $estado = 'ocupado';
            }elseif(in_array($espacio->id_espacio, $espacios_reservados)){
                $estado = 'reservado';
            }else{
                $estado = 'libre';
            }
            $espacios_estado[] = [
                'id_espacio' => $espacio->id_espacio,
                'estado' => $estado,
            ];
        }

        return $espacios_estado;

    }

    function estadoParqueo()
    {
        
        $total_espacios = Espacio::select('id_espacio')->count();
        $espacios_ocupados = Espacio::join('SERVICIO','ESPACIO.id_espacio','=','SERVICIO.id_espacio')
        ->select('ESPACIO.id_espacio')
        ->whereNull('SERVICIO.hora_fin')
        ->where('SERVICIO.fecha_fin')
        ->count();

        $espacios_reservados = Espacio::join('RESERVA','ESPACIO.id_espacio','=','RESERVA.id_espacio')
        ->select('ESPACIO.id_espacio')
        ->where('RESERVA.estado','=','aceptado')
        ->count();
        $espacios_disponibles = $total_espacios - $espacios_ocupados - $espacios_reservados;

        
        return [
            'total_espacios'=>$total_espacios,
            'espacios_ocupados'=>$espacios_ocupados,
            'espacios_reservados'=>$espacios_reservados,
            'espacios_disponibles'=>$espacios_disponibles,
        ];
    }
}