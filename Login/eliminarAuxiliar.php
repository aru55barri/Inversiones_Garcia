<?php

/*include_once '../controladores/controlador_proveedor.php';
include_once '../controladores/controlador_cargos.php';
include_once '../controladores/controlador_estado_civil.php';
include_once '../controladores/controlador_estado_producto.php';
include_once '../controladores/controlador_estados.php';
include_once '../controladores/controlador_genero.php';
include_once '../controladores/controlador_modulo.php';
//***************************************************/
/*include_once '../controladores/controlador_parametros.php';
include_once '../controladores/controlador_rol.php';
include_once '../controladores/controlador_tipo_pago.php';

include_once '../controladores/controlador_trabajos.php';

//**********************denia****************************/
include_once '../controladores/controlador_cliente.php';
include_once '../controladores/controlador_producto.php';
include_once '../controladores/controlador_parametro.php';
include_once '../controladores/controlador_roles.php';
include_once '../controladores/controlador_preguntas.php';
include_once '../controladores/controlador_tipo_producto.php';
include_once '../controladores/controlador_tipo_categoria.php';
include_once '../controladores/controlador_categoria.php';
if(!empty($_GET))
    {
        $id = $_GET['id'];
        $tabla  = $_GET['tabla'];

        if($tabla == 'producto')
        {
            //Se ejecuta eliminar
            $resultado= ProductoContralador::eliminarProducto($id);

            if($resultado == true)
            {
                echo "<script>
                window.location.href= '../src/producto.php';
                </script>";
                $_SESSION['eliminarproducto'] = 'Si';
            }
            else{
                echo "<script>
                window.location.href= '../src/producto.php';
                </script>";
                $_SESSION['eliminarproducto'] = 'No';
            }
            
        }

    }




    /*if(!empty($_GET))
    {
        $id = $_GET['id'];
        $tabla  = $_GET['tabla'];

        if($tabla == 'clientes')
        {
            //Se ejecuta eliminar
            $resultado= ClienteContralador::eliminarCliente($id);

            if($resultado == true)
            {
                echo "<script>
                window.location.href= '../vistas/vista_clientes.php';
                </script>";
                $_SESSION['eliminarCliente'] = 'Si';
                
            }
            else
            {
                echo "<script>
                window.location.href= '../vistas/vista_clientes.php';
                </script>";
                $_SESSION['eliminarCliente'] = 'No';
            }
            
        }

    }*/

   
//***************************************************/

//**********************NELSOM****************************/

include_once '../controladores/controlador_cliente.php';
if(!empty($_GET))
    {
        $id = $_GET['id'];
        $tabla  = $_GET['tabla'];

        if($tabla == 'clientes')
        {
            //Se ejecuta eliminar
            $resultado=  eliminarCliente($id);

            if($resultado == true)
            {
                echo "<script>
                window.location.href= '../src/vista_cliente.php';
                </script>";
                $_SESSION['eliminarcliente'] = 'Si';
            }
            else{
                echo "<script>
                window.location.href= '../src/vista_cliente.php';
                </script>";
                $_SESSION['eliminarcliente'] = 'No';
            }
            
        }

    }

   
//***************************************************/


    if(!empty($_GET))
    {
        $id = $_GET['id'];
        $tabla  = $_GET['tabla'];

        if($tabla == 'proveedores')
        {
            //Se ejecuta eliminar
            $resultado= eliminarProveedor($id);

            if($resultado == true)
            {
                echo "<script>
                window.location.href= '../Paginas/listaproveedores.php';
                </script>";
                $_SESSION['eliminarProveedor'] = 'ok';
            }
            
        }

    }
    
    if(!empty($_GET))
    {
        $id = $_GET['id'];
        $tabla  = $_GET['tabla'];

        if($tabla == 'cargos')
        {
            //Se ejecuta eliminar
            $resultado = eliminarCargos($id);

            if($resultado == true)
            {
                echo "<script>
                window.location.href= '../Paginas/listarCargos.php';
                </script>";
                $_SESSION['EliminarCargos'] = 'Si';
            }
            else{
                echo "<script>
                window.location.href= '../Paginas/listarCargos.php';
                </script>";
                $_SESSION['EliminarCargos'] = 'No';
            }
            
        }
    }

    
    if(!empty($_GET))
    {
        $id = $_GET['id'];
        $tabla  = $_GET['tabla'];

        if($tabla == 'estadocivil')
        {
            //Se ejecuta eliminar
            $resultado = eliminarEstadoCivil($id);

            if($resultado == true)
            {
                echo "<script>
                window.location.href= '../Paginas/listar_estado_civil.php';
                </script>";
                $_SESSION['EliminarEstadoCivil'] = 'Si';
            }
            else {
                echo "<script>
                window.location.href= '../Paginas/listar_estado_civil.php';
                </script>";
                $_SESSION['EliminarEstadoCivil'] = 'No';
            }
        }
    }

    if(!empty($_GET))
    {
        $id = $_GET['id'];
        $tabla  = $_GET['tabla'];

        if($tabla == 'estadoproducto')
        {
            //Se ejecuta eliminar
            $resultado = eliminarEstadoProducto($id);

            if($resultado == true)
            {
                echo "<script>
                window.location.href= '../Paginas/listarEstado_producto.php';
                </script>";
                $_SESSION['EliminarEstadoProducto'] = 'Si';
            }
            else
            {
                echo "<script>
                window.location.href= '../Paginas/listarEstado_producto.php';
                </script>";
                $_SESSION['EliminarEstadoProducto'] = 'No';
            }
        }
    }

    if(!empty($_GET))
    {
        $id = $_GET['id'];
        $tabla  = $_GET['tabla'];

        if($tabla == 'estados')
        {
            //Se ejecuta eliminar
            $resultado = eliminarEstado($id);

            if($resultado == true)
            {
                echo "<script>
                window.location.href= '../Paginas/listarEstados.php';
                </script>";
                $_SESSION['EliminarEstados'] = 'Si';
            }
            else 
            {
                echo "<script>
                window.location.href= '../Paginas/listarEstados.php';
                </script>";
                $_SESSION['EliminarEstados'] = 'No'; 
            }
        }
    }

    if(!empty($_GET))
    {
        $id = $_GET['id'];
        $tabla  = $_GET['tabla'];

        if($tabla == 'genero')
        {
            //Se ejecuta eliminar
            $resultado= eliminarGenero($id);

            if($resultado == true)
            {
                echo "<script>
                window.location.href= '../Paginas/listarGenero.php';
                </script>";
                $_SESSION['EliminarGenero'] = 'Si';
            }
            else
            {
                echo "<script>
                window.location.href= '../Paginas/listarGenero.php';
                </script>";
                $_SESSION['EliminarGenero'] = 'No';
            }
            
        }

    }

    if(!empty($_GET))
    {
        $id = $_GET['id'];
        $tabla  = $_GET['tabla'];

        if($tabla == 'modulos')
        {
            //Se ejecuta eliminar
            $resultado= eliminarModulo($id);

            if($resultado == true)
            {
                echo "<script>
                window.location.href= '../Paginas/listarModulos.php';
                </script>";
                $_SESSION['EliminarModulos'] = 'ok';
            }
            
        }

    }



    //****************************************************/

    if ($tabla == 'parametros'){

        $resultado = delete_parametro($id);

        if ($resultado == true) {

            //se ejecuta el eliminar
            echo "<script>
                window.location.href='../src/parametro.php';
                </script>";

            $_SESSION['eliminarParametros'] = 'ok';
        } 
    }
    elseif ($tabla == 'rol'){

        $resultado = delete_rol($id);

        if ($resultado == true) {

            //se ejecuta el eliminar
            echo "<script>
                window.location.href='../src/Mantenimiento_roles.php';
                </script>";

            $_SESSION['eliminarRol'] = 'Si';
        } 
        else
        {
            echo "<script>
                window.location.href='../src/Mantenimiento_roles.php';
                </script>";

            $_SESSION['eliminarRol'] = 'No';
        }
    }

    elseif ($tabla == 'tipoPago'){

        $resultado = delete_tipo_pago($id);

        if ($resultado == true) {

            //se ejecuta el eliminar
            echo "<script>
                window.location.href='../Paginas/vista_tipo_pago.php';
                </script>";

            $_SESSION['eliminartipoPago'] = 'Si';
        } 
        else
        {
            echo "<script>
                window.location.href='../Paginas/vista_tipo_pago.php';
                </script>";

            $_SESSION['eliminartipoPago'] = 'No'; 
        }
    }

    elseif ($tabla == 'tipoProducto'){

        $resultado = delete_tipo_producto($id);

        if ($resultado == true) {

            //se ejecuta el eliminar
            echo "<script>
                window.location.href='../src/tipo_producto.php';
                </script>";

            $_SESSION['tipoProducto'] = 'Si';
        } 
        else 
        {
            echo "<script>
                window.location.href='../src/tipo_producto.php';
                </script>";

            $_SESSION['tipoProducto'] = 'No'; 
        }
    }


    elseif ($tabla == 'trabajos'){

        $resultado = delete_trabajos($id);

        if ($resultado == true) {

            //se ejecuta el eliminar
            echo "<script>
                window.location.href='../Paginas/vista_trabajos.php';
                </script>";

            $_SESSION['eliminartrabajo'] = 'ok';
        } 
    }

    elseif ($tabla == 'pregunta'){

        $resultado = delete_pregunta($id);

        if ($resultado == true) {

            //se ejecuta el eliminar
            echo "<script>
                window.location.href='../src/preguntas.php';
                </script>";

            $_SESSION['eliminarPregunta'] = 'Si';
        } 
        else
        {
            echo "<script>
            window.location.href='../src/preguntas.php';
            </script>";

        $_SESSION['eliminarPregunta'] = 'No'; 
        }
    }
    elseif ($tabla == 'tabla'){

        $resultado = delete_tipoca($id);

        if ($resultado == true) {

            //se ejecuta el eliminar
            echo "<script>
                window.location.href='../src/tipo_categoria.php';
                </script>";

            $_SESSION['eliminartipoca'] = 'Si';
        } 
        else
        {
            echo "<script>
            window.location.href='../src/tipo_categoria.php';
            </script>";

        $_SESSION['eliminartipoca'] = 'No'; 
        }
    }
    elseif ($tabla == 'categoria'){

        $resultado = delete_categoria($id);

        if ($resultado == true) {

            //se ejecuta el eliminar
            echo "<script>
                window.location.href='../src/categoria.php';
                </script>";

            $_SESSION['eliminartipoca'] = 'Si';
        } 
        else
        {
            echo "<script>
            window.location.href='../src/categoria.php';
            </script>";

        $_SESSION['eliminartipoca'] = 'No'; 
        }
    }
?>
