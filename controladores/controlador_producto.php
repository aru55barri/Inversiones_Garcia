<?php

include_once '../modelos/modelo_productos.php';
include '../Config/conn.php';

$id = $_SESSION['rol'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_permisos where ID_OBJETO = 7 and ID_ROL = '$id'");
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

     static function InsertarProducto($descripcion, $precio, $categ, $existencia, $cant_minima, $cant_maxima, $tipo, $estado)
    {

        $modelo = new ModeloProducto();
        $sql = "INSERT INTO tbl_producto (codproducto, id_categoria, id_tipo_producto, descripcion, precio_venta, existencia, cantidad_minima, cantidad_maxima, estado) 
        VALUES (null,'$categ', '$tipo', '$descripcion', '$precio', '$existencia', '$cant_minima', '$cant_maxima', '$estado')";
        $modelo->insertargeneral($sql);
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
        $matrizproductos = $productos->mostrargeneral("select u.*,r.DESCRIPCION as TIPO_PRODUC, s.descripcion as CATEGORIA from tbl_producto u inner join tipo_producto r on u.id_tipo_producto = r.id inner join tbl_categoria s on u.id_categoria = s.id");

        if($matrizproductos != null)
        {
            foreach ($matrizproductos as $key => $value) {
                foreach ($value as $registro) { ?>
    
    
                    <tr>
                        <td> <?= $registro['codproducto'] ?></td>
                        <td> <?= $registro['CATEGORIA'] ?></td>
                        <td><?= $registro['TIPO_PRODUC'] ?></td>
                        <td><?= $registro['descripcion'] ?></td>
                        <td><?= $registro['precio_venta'] ?></td>
                        <td><?= $registro['existencia'] ?></td>
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
                $fecha = date("Y-m-d-H:i:s");
                $IDUS = $_SESSION['id_usuario'];
    
                $sql = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
                 VALUES(null,'$fecha', '$IDUS', 3, 'INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO')";
                $ModeloProducto->insertargeneral($sql);
                // FIN vista en bitacora al mostrar empleados Joel Montoya
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


    static function InsertarUpdateProducto($id, $descripcion, $categ, $tipo, $existencia, $precio, $cant_minima, $cant_maxima, $estado)
    {
        $modeloCompras = new ModeloProducto();

        $modeloCompras->UpdateProducto($id, $descripcion, $categ, $tipo, $existencia, $precio, $cant_minima, $cant_maxima, $estado);
        $_SESSION['Editarproducto'] = 'edicion';
        echo "<script>
            location.href ='../src/producto.php';
            </script>";
    }
}
