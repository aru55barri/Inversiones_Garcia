<?php
    require_once '../modelos/modelo_preguntas_usuario.php';

    function ListarPregunta(){
        $modeloPregunta = new Pregunta();
        $resultado = $modeloPregunta->get_pregunta_usuario();
        return $resultado;

    }
/*
    //Funcion para insertar Cargos
    function InsertarCargos($cargos){

        $modeloPregunta = new Cargos();
        $resultado = $modeloPregunta->InsertarCargos($cargos);
        return $resultado;
    }

    //FUNCION EDITAR CARGOS---KEVIN
    function EditarCargos($id,$descCargos)
    {
        $modeloPregunta = new Cargos();
        $resultado = $modeloPregunta->EditarCargos($id, $descCargos);
        return $resultado;
    }

    //FUNCION PARA OBTENER UN CARGO
    function obtenerUnCargo($id)
        {
        $modeloPregunta = new Cargos();
        $resultado = $modeloPregunta->obtenerUnCargo($id);
        return $resultado;
    }

    //FUNCION ELIMINAR CARGOS--KEVIN
    function eliminarCargos($id)
    {
        $modeloPregunta = new Cargos();
        $resultado = $modeloPregunta->eliminarCargos($id);
        return $resultado;
    }
    */
?>