<?php

include_once '../modelos/modelo_preguntas.php';
include '../config/conn.php';

function mostrarPreguntas()
{

    $modeloPregunta = new Pregunta();
    $resultado = $modeloPregunta->get_pregunta();
    return $resultado;
}

function insert_pregunta($PREGUNTA)
{

    $modeloPregunta = new Pregunta();
    $resultado = $modeloPregunta->insert_pregunta($PREGUNTA);
    return $resultado;
}

function editar_pregunta($ID_PREGUNTA,$Pregunta)
{
    $modeloPregunta = new Pregunta();
    $resultado = $modeloPregunta->editar_pregunta($ID_PREGUNTA,$Pregunta);
    return $resultado;
}

function delete_pregunta($ID_PREGUNTA)
{
    $modeloPregunta = new Pregunta();
    $resultado = $modeloPregunta->delete_pregunta($ID_PREGUNTA);
    return $resultado;
}

function get_pregunta_ID($ID_PREGUNTA)
{
    $modeloPregunta = new Pregunta();
    $resultado = $modeloPregunta->get_pregunta_ID($ID_PREGUNTA);
    return $resultado;
}

function obtenerPreguntaExistente($pregunta)
{
    $modeloPregunta = new Pregunta();
    $resultado = $modeloPregunta->obtenerPreguntaExistente($pregunta);
    return $resultado;
}