<?php
include_once "../Login/header.php";
include '../config/conn.php';
include_once '../modelos/modelo_tipo_producto.php';

function mostrarTipoproducto()
{

    $modelotipoProducto = new tipo_producto();
    $resultado = $modelotipoProducto->get_tipoProducto();
    return $resultado;
}

function insert_producto($descripcion)
{

    $modelotipoProducto = new tipo_producto();
    $resultado = $modelotipoProducto->insert_producto($descripcion);
    return $resultado;
}

function  editar_tipo_producto($id, $descripcion)
{
    $modelotipoProducto = new tipo_producto();
    $resultado = $modelotipoProducto->editar_tipo_producto($id, $descripcion);
    return $resultado;
}

function delete_tipo_producto($id)
{

    $modelotipoProducto = new tipo_producto();
    $resultado = $modelotipoProducto->delete_tipo_producto($id);
    return $resultado;
}

function get_tipo_producto_ID($id)
{

    $modelotipoProducto = new tipo_producto();
    $resultado = $modelotipoProducto->get_tipo_producto_ID($id);
    return $resultado;
}


