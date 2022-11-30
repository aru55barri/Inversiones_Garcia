<?php

   include '../config/conn.php';
   require_once '../modelos/modelo_bitacora.php';

    function traerBitacora(){
        $modeloBitacora = new bitacora();
        $resultado = $modeloBitacora->get_bitacora();
        return $resultado;

    }
/*
    //Funcion para insertar Cargos
    function InsertarCargos($cargos){

        $modeloBitacora = new Cargos();
        $resultado = $modeloBitacora->InsertarCargos($cargos);
        return $resultado;
    }

    //FUNCION EDITAR CARGOS---KEVIN
    function EditarCargos($id,$descCargos)
    {
        $modeloBitacora = new Cargos();
        $resultado = $modeloBitacora->EditarCargos($id, $descCargos);
        return $resultado;
    }

    //FUNCION PARA OBTENER UN CARGO
    function obtenerUnCargo($id)
        {
        $modeloBitacora = new Cargos();
        $resultado = $modeloBitacora->obtenerUnCargo($id);
        return $resultado;
    }

    //FUNCION ELIMINAR CARGOS--KEVIN
    function eliminarCargos($id)
    {
        $modeloBitacora = new Cargos();
        $resultado = $modeloBitacora->eliminarCargos($id);
        return $resultado;
    }
    */
?>