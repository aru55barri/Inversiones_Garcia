<?php

require_once '../modelos/modelo_ajustes.php';

function crearRespaldoBD()
{
    $modeloAjustes = new ajustes();
    $modeloAjustes->generarRespaldoBD2();
}

function obtenerNombresdeArchivosRespaldo()
{
    $modeloAjustes = new ajustes();
    $nombresArchivos = $modeloAjustes->obtenerNombresArchivosRespaldo();
    return $nombresArchivos;
}

function restaurarBD($nombreArchivo)
{
    $modeloAjustes = new ajustes();
    $modeloAjustes->restaurarBD($nombreArchivo);
}

function obtenerNombresdeArchivosRespaldoUltimo()
{
    $modeloAjustes = new ajustes();
    $nombresArchivos = $modeloAjustes->obtenerNombresArchivosRespaldoUltimo();
    return $nombresArchivos;
}

?>