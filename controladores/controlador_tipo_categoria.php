<?php

include_once '../modelos/modelo_tipo_categoria.php';
include '../Config/conn.php';

function mostrarTipoca()
{

    $modeloPregunta = new tipocat();
    $resultado = $modeloPregunta->get_pregunta();
    return $resultado;
}

function insert_tipoca($PREGUNTA)
{

    $modeloPregunta = new tipocat();
    $resultado = $modeloPregunta->insert_tipoca($PREGUNTA);
    return $resultado;
}

function editar_tipoca($ID_PREGUNTA,$Pregunta)
{
    $modeloPregunta = new tipocat();
    $resultado = $modeloPregunta->editar_tipoca($ID_PREGUNTA,$Pregunta);
    return $resultado;
}

function delete_tipoca($ID_PREGUNTA)
{
    $modeloPregunta = new tipocat();
    $resultado = $modeloPregunta->delete_tipoca($ID_PREGUNTA);
    return $resultado;
}

function get_tipoca($ID_PREGUNTA)
{
    $modeloPregunta = new tipocat();
    $resultado = $modeloPregunta->get_tipoca($ID_PREGUNTA);
    return $resultado;
}

function obtenertipocaExistente($pregunta)
{
    $modeloPregunta = new tipocat();
    $resultado = $modeloPregunta->obtenertipocaExistente($pregunta);
    return $resultado;
}
