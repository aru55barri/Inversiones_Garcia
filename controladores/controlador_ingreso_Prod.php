<?php

include_once '../modelos/modelo_principal.php';

include '../config/conn.php';

if (isset($_GET['cancelar'])) {
    $IDC=$_GET['cancelar'];
    $sq = mysqli_query($conn, "SELECT * FROM tbl_detalle_ingreso_producto where id_ingreso = '$IDC' ");
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
    
    CompraContralador::UpdateCompra($_GET['cancelar'],$producto,$cantidad,$inventario,$existencia,$usua);
    
}
$id = $_SESSION['rol'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_permisos where ID_OBJETO = 11 and ID_ROL = '$id'");
$row = mysqli_fetch_array($sql);

$insertar = $row['permiso_insercion'];
$modificar = $row['permiso_modificar'];
$consultar = $row['permiso_consultar'];
$eliminar = $row['permiso_eliminacion'];


class CompraContralador
{
    public $compras;
    public  $matrizCompras;



    public function __construct()
    {
        $this->compras = new ModeloPrincipal();
    }

    static function InsertarCompra($fecha, $subtotal, $isv, $total, $usuario, $lote)
    {

        $modelo = new ModeloPrincipal();
        $sql = "INSERT INTO tbl_ingreso_producto (ID_COMPRA, FEC_COMPRA, SUBTOTAL, ISV, TOTAL, ID_LOTE, ID_USUARIO) VALUES (null,'$fecha', '$subtotal', '$isv', '$total', '$lote', $usuario)";
        $modelo->insertargeneral($sql);
        $_SESSION['registro'] = 'ok';
        echo "<script> 
        location.href ='../src/Inventario_materia.php';
        </script>";
    }

    static function mostrartipoPago()
    {
        $modelo = new ModeloPrincipal();
        $sql = "SELECT * FROM tbl_tipo_pago";
        $matrizProveedores = $modelo->mostrarselect($sql);
        return $matrizProveedores;
    }

    static function mostrarProductos()
    {
        $modelo = new ModeloPrincipal();
        $sql = "SELECT * FROM tbl_producto";
        $matrizProductos = $modelo->mostrarselect($sql);
        return $matrizProductos;
    }

    static function mostrarProveedores()
    {
        $modelo = new ModeloPrincipal();
        $sql = "SELECT * FROM tbl_proveedores";
        $matrizProveedores = $modelo->mostrarselect($sql);
        return $matrizProveedores;
    }
    static function mostrarLotes()
    {
        $modelo = new ModeloPrincipal();
        $sql = "SELECT * FROM tbl_lote";
        $matrizProveedores = $modelo->mostrarselect($sql);
        return $matrizProveedores;
    }


    //funcion para mostrar
    static public function mostrarIngproducto()
    {
        global $eliminar;
        global $modificar;

        $compras = new ModeloPrincipal();
        $matrizCompras = $compras->mostrargeneral("select tc.*,tp.descripcion,tu.USUARIO from tbl_ingreso_producto tc inner join tbl_lote tp ON tc.id_lote = tp.id inner join tbl_usuario tu on tc.id_usuario = tu.id_usuario");
        $ii = 0;

        if($matrizCompras != null)
        {
            foreach ($matrizCompras as $key => $value) {
                foreach ($value as $registro) {?>
    
     
                <tr>
                <td><?=$ii = $ii + 1?></td>
                  <td><?=$registro['fecha']?></td>
                    <td><?=$registro['sub_total']?></td>
                    <td><?=$registro['isv']?></td>
                    <td><?=$registro['total']?></td>
                    <td><?=$registro['descripcion']?></td>
                    <td><?=$registro['USUARIO']?></td>
                    <td><?=$registro['estado'] == '' ? 'ACTIVO' : 'CANCELADO'?></th>
                    <th><a href="../src/vista_detalle_ingProd.php?id=<?=$registro['id']?>" class='btn btn-round btn-info btn-block'><i class='fa-solid fa-plus'></i></a></th>
                    <?php
                    if ($eliminar == 1) { ?>
                        <th><a  onclick="eliminar(<?= $registro['id'] ?>)"  class='btn btn-round btn-danger' type='submit'><i class='fas fa-trash-alt'style="color: white;"></i></a></th>
                    <?php } ?>
                </tr>
                <?php }
                // Inicio vista en bitacora al mostrar empleados Joel Montoya
                $modeloPrincipal = new ModeloPrincipal();
                $fecha = date("Y-m-d-H:i:s");
                $IDUS = $_SESSION['id_usuario'];

                $sql = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
                VALUES(null,'$fecha','$IDUS',3, 'INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS')";
                    $modeloPrincipal->insertargeneral($sql);
                // FIN vista en bitacora al mostrar empleados Joel Montoya
    
            }
        }
    }

    //funcion para eliminar
     

    static public function UpdateCompra($id,$producto,$cantidad,$inventario,$existencia,$usua)
    {
        
        include '../config/conn.php';


        $can=($existencia-$cantidad);
        $sqlk = "INSERT INTO tbl_kardex(id_movimiento, id_producto, fecha, id_usuario, cantidad) VALUES(5,'$producto',now(),'$usua','$cantidad')";

        $modeloPrincipal  = new ModeloPrincipal();

        $sql1 = "UPDATE tbl_producto SET existencia = '$can' WHERE codproducto = '$producto' ";
        mysqli_query($conn, $sql1);
    
        $modeloPrincipal ->UpdateCompra($id, $sqlk,$can,$inventario);
        
        $_SESSION['cancelado'] = 'edicion';
        
        echo "<script>
            location.href ='../src/Inventario_materia.php';
            </script>";
    }
}
