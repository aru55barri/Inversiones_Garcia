<?php
    require_once '../modelos/modelo_CAI.php';

    $id = $_SESSION['rol'];
    $sql = mysqli_query($conn, "SELECT * FROM tbl_permisos where ID_OBJETO = 22 and ID_ROL = '$id'");
    $row = mysqli_fetch_array($sql);

    $insertar = $row['permiso_insercion'];
    $modificar = $row['permiso_modificar'];
    $consultar = $row['permiso_consultar'];
    $eliminar = $row['permiso_eliminacion'];

    class CAIContralador
    {



        //funcion para mostrar
        static public function mostrarCAI()
        {
            global $eliminar;
        global $modificar;

        $ventas = new ModeloPrincipal();
        $matriz = $ventas->mostrargeneral("select * from tbl_cai;");
        $ii = 0;
        if($matriz != null)
        {
           

            foreach ($matriz as $key => $value)   {
                foreach ($value as $registro) {?>
              
                    <tr>
                    <td><?=$ii = $ii + 1?></td>
                    <td><?=$registro['rango_inicial']?></td>
                    <td><?=$registro['rango_final']?></td>
                    <td><?=$registro['rango_actual']?></td>
                    <td><?=$registro['numero_CAI']?></td>
                    <td><?=$registro['fecha_vencimiento']?></td>
                    <td><?=$registro['id_usuario']?></td>
                    <?php
                        if ($modificar == 1) { ?>
                            <th><a href="../Login/modificar_CAI.php?id=<?= $registro['id'] ?>" class='btn btn-round btn-info'><i class='fas fa-pen-square'style='color: white'></i></a></th>
                       <?php }
                        
                        if ($eliminar == 1) { ?>
                            <th><a onclick="eliminar(<?= $registro['id'] ?>)"  class='btn btn-round btn-danger' type='submit'><i class='fas fa-trash-alt' style="color: white;"></i></a></th>
                        <?php } ?>
                </tr>
             <?php   }
                // Inicio vista en bitacora al mostrar empleados Joel Montoya
                $modeloPrincipal = new ModeloPrincipal();
                $fecha = date("Y-m-d-H:i:s");
                $IDUS = $_SESSION['id_usuario'];
    
                $sql = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
                VALUES(null,'$fecha','$IDUS',22, 'INGRESO','EL USUARIO INGRESA A TABLA CAI')";
                $modeloPrincipal->insertargeneral($sql);
                // FIN vista en bitacora al mostrar empleados Joel Montoya
    
            }
        }
        }
    }

    
?>

