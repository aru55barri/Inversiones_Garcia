<?php

include_once '../modelos/modelo_categoria.php';
include '../Config/conn.php';

function mostrarcategoria()
{

    $modeloPregunta = new categoria();
    $resultado = $modeloPregunta->get_categoria();
    return $resultado;
}

function insert_categoria($PREGUNTA)
{

    $modeloPregunta = new categoria();
    $resultado = $modeloPregunta->insert_categoria($PREGUNTA);
    return $resultado;
}

function editar_categoria($ID_PREGUNTA,$Pregunta)
{
    $modeloPregunta = new categoria();
    $resultado = $modeloPregunta->editar_categoria($ID_PREGUNTA,$Pregunta);
    return $resultado;
}

function delete_categoria($ID_PREGUNTA)
{
    $modeloPregunta = new categoria();
    $resultado = $modeloPregunta->delete_categoria($ID_PREGUNTA);
    return $resultado;
}

function get_categoria_id($ID_PREGUNTA)
{
    $modeloPregunta = new categoria();
    $resultado = $modeloPregunta->get_categoria_id($ID_PREGUNTA);
    return $resultado;
}

function obtenerCategoriaExistente($pregunta)
{
    $modeloPregunta = new categoria();
    $resultado = $modeloPregunta->obtenerCategoriaExistente($pregunta);
    return $resultado;
}