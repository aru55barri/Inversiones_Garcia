<?php

include_once '../modelos/modelo_inventario.php';

class InventarioContralador
{
    public $inventario;
    public  $matrizInventario;
    
   

    public function __construct()
    {   
        $this->cotizacion = new ModeloInventario();
    }

    static function InsertarInventario($cantidad,$descripcion, $produ,$producto) {
        
        $modelo = new ModeloInventario();
        $sql = "INSERT INTO tbl_inventario (ID_INVENTARIO, CAN_EXISTENCIA, DESCRIPCION_INVENTARIO, INV_PRODUCCION, ID_PRODUCTO) VALUES (null,'$cantidad','$descripcion', '$produ', '$producto')";
        $modelo->insertargeneral($sql);
        $_SESSION['registro'] = 'ok';
        echo "<script> 
        location.href ='../vistas/vista_inventario_producto.php';
        </script>"; 
         
    }
    
      
 //funcion para mostrar
    static public function mostrarInventario()
    {

         $inventario = new ModeloInventario();
        $matrizInventario =  $inventario->mostrargeneral("select i.*,tp.descripcion from tbl_inventario i inner join tbl_producto tp on i.COD_PRODUCTO = tp.CODPRODUCTO;");
        $ii = 0;

        if($matrizInventario != null)
        {
            foreach ($matrizInventario as $key => $value) {
                foreach ($value as $registro) {?>
                
                    <tr>
                    <td><?=$ii = $ii + 1?></td>
                    <th><span class="<?= $registro['cantidad'] >= 10 ? 'badge badge-primary' : 'badge badge-danger'?>"> <?=$registro['cantidad']?></span></th>
                    <th><?=$registro['descripcion']?></th>
                    <th><a href="../src/vista_movimientos_producto.php?id=<?=$registro['cod_producto']?>" class='btn btn-round btn-info btn-block'><i class='fa-solid fa-plus'></i></a></th>
    
                    </tr>
                    
             <?php   }
        $modeloPrincipal = new ModeloInventario();

        date_default_timezone_set('America/Mexico_City');
        $fecha=date("Y-m-d-H:i:s");
        
        $IDUS = $_SESSION['id_usuario'];

        include '../Config/conn.php';

        $rs = mysqli_query($conn, "SELECT * FROM tbl_usuario where id_usuario = $IDUS");
        $row = mysqli_fetch_array($rs);
        $Usuarioo = $row['usuario'];

        $sql = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
        VALUES(null,'$fecha','$IDUS',9, 'INGRESO','$Usuarioo INGRESÓ A LA TABLA INVENTARIO')";
            $modeloPrincipal->insertargeneral($sql);


            
            }
        }
    
    } 

    //funcion para eliminar
    static public function eliminarInventario($id)
    {

        $usuarios = new ModeloInventario();
        $usuario = $usuarios->eliminar("tbl_inventario", "ID_INVENTARIO = '$id'");

        // Inicio eliminar empleado Joel Montoya
        $modeloPrincipal = new ModeloInventario();
        $fecha=date("Y-m-d-H:i:s");
        $IDUS=$_SESSION['ID_USUARIO'];
        
        $sql="INSERT INTO tbl_bitacora(ID_BITACORA, FECHA, ACCION, DESCRIPCION_BITACORA, ID_USUARIO, ID_OBJETO)
        VALUES(null,'$fecha','ELIMINAR','EL USUARIO ELIMINA DE LA TABLA INVENTARIO','$IDUS',3)";
        $modeloPrincipal->insertargeneral($sql);
        // FIN eliminar empleado Joel Montoya

        $empleado = $usuarios->eliminar("tbl_inventario", "ID_INVENTARIO = '$id'");
        $_SESSION['eliminacion'] = "Eliminado correctamente";
        echo "<script> 
        location.href ='../vistas/vista_cotizaciones.php';
        </script>";
    }

    static function InsertarUpdateInventario($id,$cantidad,$descripcion, $produ,$producto) {
        $matrizInventario = new ModeloInventario();

        $matrizInventario->InsertarUpdateInventario($id, $cantidad,$descripcion, $produ,$producto);
        $_SESSION['edicion'] = 'edicion';
        echo "<script>
            location.href ='../vistas/vista_inventario_producto.php';
            </script>";
         
    }
 
}

 
