<?php

include_once '../modelos/modelo_productos.php';
include '../Config/conn.php';


$id = $_SESSION['rol'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_permisos where id_objeto = 7 and id_rol = '$id'");
$row = mysqli_fetch_array($sql);

$insertar = $row['permiso_insercion'];
$modificar = $row['permiso_modificar'];
$consultar = $row['permiso_consultar'];
$eliminar = $row['permiso_eliminacion'];

 

class ProductoContralador
{
    public $productos;
    public  $matrizproductoss;



    public function __construct()
    {
        $this->productos = new ModeloProducto();
    }

     static function InsertarProducto($descripcion, $precio, $categ, $cant_minima, $cant_maxima, $tipo, $estado)
    {
        include '../Config/conn.php';

        $modelo = new ModeloProducto();
        $sql = "INSERT INTO tbl_producto (codproducto, id_categoria, id_tipo_producto, descripcion, precio_venta, existencia, cantidad_minima, cantidad_maxima, estado) 
        VALUES (null,'$categ', '$tipo', '$descripcion', '$precio', 0, '$cant_minima', '$cant_maxima', '$estado')";
        $modelo->insertargeneral($sql);

        $rs = mysqli_query($conn, "SELECT MAX(codproducto) as id FROM tbl_producto");
        $raw = mysqli_fetch_array($rs);
        $id = $raw['id'];

        $sql1 = "INSERT INTO tbl_inventario (id, cod_producto, cantidad) 
        VALUES (null,'$id', 0 )";
        $modelo->insertargeneral($sql1);

        $_SESSION['registro'] = 'ok';
        echo "<script> 
        location.href ='../src/producto.php';
        </script>";
    }


    //funcion para mostrar
    static public function mostrarProducto()
    {


        global $eliminar;
        global $modificar;
        global $IDE;

        $productos = new ModeloProducto();
        $matrizproductos = $productos->mostrargeneral("select u.*,r.DESCRIPCION as TIPO_PRODUC, s.descripcion as CATEGORIA from tbl_producto u inner join tbl_tipo_producto r on u.id_tipo_producto = r.id inner join tbl_categoria s on u.id_categoria = s.id");
        $ii = 0;

        if($matrizproductos != null)
        {
            foreach ($matrizproductos as $key => $value) {
                foreach ($value as $registro) { ?>
              <tr>
                    <td><?=$ii = $ii + 1?></td>
                        <td> <?= $registro['CATEGORIA'] ?></td>
                        <td><?= $registro['TIPO_PRODUC'] ?></td>
                        <td><?= $registro['descripcion'] ?></td>
                        <td><?= $registro['precio_venta'] ?></td>
                         
                        <td><span class="<?= $registro['existencia'] <= $registro['cantidad_minima']  ? 'badge badge-danger'  : 'badge badge-success'?>"> <?=$registro['existencia']?></span></td>

                        <td><?= $registro['cantidad_minima'] ?></td>
                        <td><?= $registro['cantidad_maxima'] ?></td> 
                  
                        <?php
                        
                        if ($modificar == 1) { ?>
                            <th><a href="../Login/modificar_producto.php?id=<?= $registro['codproducto'] ?>" class='btn btn-round btn-info'><i class='fas fa-pen-square'style='color: white'></i></a></th>
                                             <?php }
                        
                        if ($eliminar == 1) { ?>
                            <th><a onclick="eliminar(<?= $registro['codproducto'] ?>)"  class='btn btn-round btn-danger' type='submit'><i class='fas fa-trash-alt' style="color: white;"></i></a></th>
                        <?php } ?>
                    </tr>
    
    <?php }
                // Inicio vista en bitacora al mostrar empleados Joel Montoya
                $ModeloProducto = new ModeloProducto();
                date_default_timezone_set('America/Mexico_City');
                $fecha = date("Y-m-d-H:i:s");
                $IDUSUARIO = $_SESSION['id_usuario'];
    
                include '../Config/conn.php';
    
                $rs = mysqli_query($conn, "SELECT * FROM tbl_usuario where id_usuario = $IDUSUARIO");
                $row = mysqli_fetch_array($rs);
                $Usuarioo = $row['usuario'];
    
                $sql = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
                 VALUES(null,'$fecha', '$IDUSUARIO', 7, 'INGRESO','EL USUARIO $Usuarioo INGRESA A TABLA PRODUCTO')";
                $ModeloProducto->insertargeneral($sql);
            }
        }
    }

    //funcion para elimina
    /*static public function eliminarProducto($id)
    {


        $usuarios = new ModeloProducto();
        $usuario = $usuarios->eliminar("tbl_productos", "ID_PRODUCTO = '$id'");

       
        // FIN eliminar empleado Joel Montoya

        $empleado = $usuarios->eliminar("tbl_productos", "ID_PRODUCTO = '$id'");
        $_SESSION['eliminacion'] = "Eliminado correctamente";
        echo "<script> 
        location.href ='../vistas/vista_productos.php';
        </script>";
    }*/
  static function eliminarProducto($id)
    {
        $modeloProducto = new ModeloProducto();
        $resultado = $modeloProducto->eliminarProducto($id);
        return $resultado;
    }


    static function InsertarUpdateProducto($id, $descripcion, $categ, $tipo, $precio, $cant_minima, $cant_maxima, $estado)
    {
        $modeloCompras = new ModeloProducto();

        $modeloCompras->UpdateProducto($id, $descripcion, $categ, $tipo, $precio, $cant_minima, $cant_maxima, $estado);
        $_SESSION['Editarproducto'] = 'edicion';
        echo "<script>
            location.href ='../src/producto.php';
            </script>";
    }
}
