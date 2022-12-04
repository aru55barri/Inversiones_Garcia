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

//////////////////////////
 function InsertarUpdateCategoria($id, $Tcategoria, $descripcion)
    {
        $modeloPregunta = new categoria();

        $modeloPregunta->UpdateCategoria($id, $Tcategoria, $descripcion);
        $_SESSION['edicion'] = 'listo';
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'EXCELENTE!',
            text: 'CATEGORIA EDITADA CON EXITO',
            confirmButtonText: 'Aceptar',
            position:'center',
            allowOutsideClick:false,
            padding:'1rem'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href ='../src/categoria.php';
             }
        })    
     </script>";
    }