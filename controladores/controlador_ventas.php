<?php

include_once '../modelos/modelo_principal.php';


include '../Config/conn.php';
if (isset($_GET['cancelar'])) {
    Contralador::UpdateVenta($_GET['cancelar']);
}

$id = $_SESSION['rol'];   
$sql = mysqli_query($conn, "SELECT * FROM tbl_permisos where ID_OBJETO = 2 and ID_ROL = '$id'");
$row = mysqli_fetch_array($sql);

$insertar = $row['permiso_insercion'];
$modificar = $row['permiso_modificar'];
$consultar = $row['permiso_consultar'];
$eliminar = $row['permiso_eliminacion'];
 


class Contralador
{
    public $ventas;
    public  $matriz;


    static public function obtenerimpuesto()
    {
    $modeloCompras = new ModeloPrincipal();
    return $modeloCompras->obtenerimpuesto();
    }


    public function __construct()
    {
        $this->ventas = new ModeloPrincipal();
    }


    static function mostrarProductos()
    {
        $modelo = new ModeloPrincipal();
        $sql = "SELECT * FROM tbl_producto";
        $matrizProductos = $modelo->mostrarselect($sql);
        return $matrizProductos;
    }

    static function mostrarPago()
    {
        $modelo = new ModeloPrincipal();
        $sql = "SELECT * FROM tbl_tipo_pago";
        $matrizProductos = $modelo->mostrarselect($sql);
        return $matrizProductos;
    }

    static function mostrarClientes()
    {
        $modelo = new ModeloPrincipal();
        $sql = "SELECT * FROM tbl_cliente";
        $matrizProveedores = $modelo->mostrarselect($sql);
        return $matrizProveedores;
    }


    //funcion para mostrar
    static public function mostrar()
    {
        global $eliminar;
        global $modificar;

        $ventas = new ModeloPrincipal();
        $matriz = $ventas->mostrargeneral("select tc.*,tp.nombre as nombre_cliente, tk.descripcion as tipo_pago, aa.nombre as usuario from tbl_factura tc inner join tbl_cliente tp ON tc.idcliente = tp.idcliente inner join tbl_tipo_pago tk on tc.id_Tpago = tk.id_Tpago inner join tbl_usuario aa on tc.id_usuario = aa.id_usuario ORDER BY tc.Fecha_fac DESC");
        $ii = 0;
        if($matriz != null)
        {
           

            foreach ($matriz as $key => $value)   {
                foreach ($value as $registro) {?>
    
                    <tr>
                    <td><?=$ii = $ii + 1?></td>
                    <td><?=$registro['Fecha_fac']?></td>
                    <td><?=number_format($registro['Sub_Total'], 2)?></td>
                    <td><?=number_format($registro['ISV'], 2)?></td>
                    <td><?=number_format($registro['Total'], 2)?></td>
                    <td><?=$registro['nombre_cliente']?></td>
                    <td><?=$registro['tipo_pago']?></td>
                    <td><?=$registro['usuario']?></td>
                    <td><?=$registro['estado'] == 'Activo' ? 'ACTIVO' : 'CANCELADO'?></th>

                    <th> <a href="../src/vista_detalle_factura.php?id=<?=$registro['id_factura']?>" class='btn btn-round btn-info btn-block'><i class='fa fa-eye' style='color: white'></i></a></th>
                    <th> <a href="../pdf/Regenerar.php?id=<?=$registro['id_factura']?>" class="btn btn-round btn-danger" style="color: white">PDF <i class="fas fa-file-pdf"></i></a></th>

                   <?php
                    
                    if ($eliminar == 1) { ?>
                      <th><a onclick="eliminar(<?= $registro['id_factura'] ?>)"  class='btn btn-round btn-danger' type='submit'><i class='fas fa-trash-alt' style="color: white;"></i></a></th>
                    <?php } ?>
                </tr>
             <?php   }
           
           $modeloPrincipal = new ModeloPrincipal();

           date_default_timezone_set('America/Mexico_City');
           $fecha = date("Y-m-d-H:i:s");
           $IDUS = $_SESSION['id_usuario'];

           include '../Config/conn.php';

           $rs = mysqli_query($conn, "SELECT * FROM tbl_usuario where id_usuario = $IDUS");
           $row = mysqli_fetch_array($rs);
           $Usuarioo = $row['usuario'];

           $sql = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
           VALUES(null,'$fecha','$IDUS',2, 'INGRESO','EL USUARIO $Usuarioo INGRESA A TABLA FACTURAS')";
           $modeloPrincipal->insertargeneral($sql);
           // FIN vista en bitacora al mostrar empleados Joel Montoya
    
            }
        }
    }

    //funcion para eliminar
    static public function eliminarcompra($id)
    {

        $usuarios = new ModeloPrincipal();
        $usuario = $usuarios->eliminar("tbl_compra", "ID_COMPRA = '$id'");

        // Inicio eliminar empleado Joel Montoya
        $modeloPrincipal = new ModeloPrincipal();
        $fecha = date("Y-m-d-H:i:s");
        $IDUS = $_SESSION['id_usuario'];

        $sql = "INSERT INTO tbl_bitacora(ID_BITACORA, FECHA, ACCION, DESCRIPCION_BITACORA, ID_USUARIO, ID_OBJETO)
        VALUES(null,'$fecha','ELIMINAR','EL USUARIO ELIMINA DE LA TABLA COMPRA','$IDUS',3)";
        $modeloPrincipal->insertargeneral($sql);
        // FIN eliminar empleado Joel Montoya

        $empleado = $usuarios->eliminar("tbl_compras", "ID_COMPRA = '$id'");
        $_SESSION['eliminacion'] = "Eliminado correctamente";
        echo "<script> 
        location.href ='../vistas/vista_compra.php';
        </script>";
    }

    static function UpdateVenta($id){
        global $conn; 
        $sq = mysqli_query($conn, "SELECT * FROM tbl_detalle_factura where id_factura = '$id' ");
        $ro = mysqli_fetch_array($sq);
        $producto = $ro['codproducto'];
        $cantidad = $ro['cantidad']; 

        $sqt = mysqli_query($conn, "SELECT * FROM tbl_kardex where id_producto = '$producto' ");
        $in = mysqli_fetch_array($sqt);
        $usua = $in['id_usuario']; 

        
        $sqt = mysqli_query($conn, "SELECT * FROM tbl_inventario where cod_producto = '$producto' ");
        $in = mysqli_fetch_array($sqt);
        $inventario = $in['id']; 
        $existencia = $in['cantidad']; 

        $can=($existencia+$cantidad);
        $sql = "INSERT INTO tbl_kardex(id_movimiento, id_producto, fecha, id_usuario, cantidad) VALUES(1,'$producto',now(),'$usua','$cantidad')";

        $sql1 = "UPDATE tbl_producto SET existencia = '$can' WHERE codproducto = '$producto' ";
        mysqli_query($conn, $sql1);

        $modelo = new ModeloPrincipal();
        $modelo->UpdateVenta($id, $sql,$can,$inventario);
        $_SESSION['cancelado'] = "Eliminado correctamente";
        echo "<script> 
        location.href ='../src/factura.php';
        </script>";
    }

    static function InsertarUpdateCompra($id, $fecha, $subtotal, $isv, $total, $usuario, $proveedor, $pago)
    {
        $modeloCompras = new ModeloPrincipal();

        $modeloCompras->UpdateCompra($id, $fecha, $subtotal, $isv, $total, $usuario, $proveedor, $pago);
        $_SESSION['edicion'] = 'edicion';
        echo "<script>
            location.href ='../vistas/vista_compra.php';
            </script>";
    }
}
