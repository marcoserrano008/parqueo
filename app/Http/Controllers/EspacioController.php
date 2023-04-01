<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Espacio;
use App\Models\Cliente;

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

    function listaEspacios()
    {
        return [
            'libre' => 'Espacio Libre',
            'ocupado' => 'Espacio Ocupado',
            'reservado' => 'Espacio Reservado',
        ]; 
    }

    function estadoEspacio($id)
    {

        $espacios = Espacio::select('id_espacio')->get();
        $espacios_ocupados = Espacio::join('SERVICIO','ESPACIO.id_espacio','=','SERVICIO.id_espacio')
        ->select('ESPACIO.id_espacio','SERVICIO.placa_vehiculo','SERVICIO.hora_inicio as hora', 'SERVICIO.fecha_inicio as fecha')
        ->whereNull('SERVICIO.hora_fin')
        ->whereNull('SERVICIO.fecha_fin')
        ->get()
        //->pluck('id_espacio', 'hora_inicio')
        ->toArray();

        $espacios_estado = [];
        foreach($espacios_ocupados as $esp){
            $esp["estado"] = 'ocupado';
            $espacios_estado[] = $esp;
        }


        $espacios_reservados = Espacio::join('RESERVA','ESPACIO.id_espacio','=','RESERVA.id_espacio')
        ->join('CLIENTE', 'RESERVA.ci_cliente','=','CLIENTE.id_cliente')
        ->select('ESPACIO.id_espacio','CLIENTE.placa_vehiculo','RESERVA.hora_solicitada as hora', 'RESERVA.fecha_solicitada as fecha')
        ->where('RESERVA.estado','=','aceptado')
        ->get()
        ->toArray();

        foreach($espacios_reservados as $esp){
            $esp["estado"] = 'reservado';
            $espacios_estado[] = $esp;
        }

        $espacios_libres = Espacio::leftJoin('RESERVA','RESERVA.id_espacio','=','ESPACIO.id_espacio')
        ->leftJoin('SERVICIO','SERVICIO.id_espacio','=','ESPACIO.id_espacio')
        ->select('ESPACIO.id_espacio') 
        ->whereNull('RESERVA.id_espacio')
        ->whereNull('SERVICIO.id_espacio')
        ->whereNull('SERVICIO.fecha_fin')
        ->whereNull('SERVICIO.hora_fin')
        ->get()
        ->toArray();

        foreach($espacios_libres as $esp){
            $esp["placa_vehiculo"] = '0000NUL';
            $esp["hora"] = '00:00';
            $esp["fecha"] = '10/10/1010';
            $esp["estado"] = 'libre';
            $espacios_estado[] = $esp;
        }


        $espacios_estado_filtrado = array_values(array_filter($espacios_estado, function($espacio) use ($id) {
            return $espacio['id_espacio'] == $id;
        }));

        return $espacios_estado_filtrado;

        
    }
}

