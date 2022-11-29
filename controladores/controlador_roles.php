<?php

include_once '../modelos/modelo_roles.php';
include '../Config/conn.php';

function mostrarRoles()
{

    $modeloRol = new rol();
    $resultado = $modeloRol->get_rol();
    return $resultado;
}

function insert_rol($ROL,$DESCRIPCION)
{

    $modeloRol = new rol();
    $resultado = $modeloRol->insert_rol($ROL,$DESCRIPCION);
    return $resultado;
}

function editar_rol($ID_ROL,$ROL,$DESCRIPCION)
{
    $modeloRol = new rol();
    $resultado = $modeloRol->editar_rol($ID_ROL,$ROL,$DESCRIPCION);
    return $resultado;
}

function delete_rol($ID_ROL)
{
    $modeloRol = new rol();
    $resultado = $modeloRol->delete_rol($ID_ROL);
    return $resultado;
}

function get_rol_ID($ID_ROL)
{
    $modeloRol = new rol();
    $resultado = $modeloRol->get_rol_ID($ID_ROL);
    return $resultado;
}

function obtenerRolExistente($ROL)
{
    $modeloRol = new rol();
    $resultado = $modeloRol->obtenerRolExistente($ROL);
    return $resultado;
}
