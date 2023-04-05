<?php
    require_once '../modelos/modelo_CAI.php';

    include_once '../modelos/modelo_principal.php';
    include_once('../Login/header.php');

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

            $CAI = new ModeloPrincipal();
            $matriz = $CAI->mostrargeneral("select * from tbl_cai;");
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
                                <th><a href="../src/modificar_CAI.php?id=<?= $registro['id'] ?>" class='btn btn-round btn-info'><i class='fas fa-pen-square'style='color: white'></i></a></th>
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
        
                    include '../Config/conn.php';
    
                    $rs = mysqli_query($conn, "SELECT * FROM tbl_usuario where id_usuario = $IDUS");
                    $row = mysqli_fetch_array($rs);
                    $Usuarioo = $row['usuario'];
        
                    $sql = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
                    VALUES(null,'$fecha','$IDUS',22, 'INGRESO','$Usuarioo INGRESÓ A TABLA CAI')";
                    $modeloPrincipal->insertargeneral($sql);
                    // FIN vista en bitacora al mostrar empleados Joel Montoya
        
                }
            }
        }

        static function InsertarCAI($rango_inicial, $rango_final, $rango_actual, $numero_CAI, $fecha_vencimiento, $usuario)
        {
            include '../Config/conn.php';
    
            $modelo = new CAI();
            $sql = "INSERT INTO tbl_cai (id, rango_inicial, rango_final, rango_actual, numero_CAI, fecha_vencimiento, id_usuario) 
            VALUES (null,'$rango_inicial', '$rango_final', '$rango_actual', '$numero_CAI','$fecha_vencimiento', '$usuario')";
            $modelo->insertargeneral($sql);

            $_SESSION['registro'] = 'ok';
            echo "<script> 
            location.href ='../src/CAI.php';
            </script>";
        }

        static function eliminarCAI($id)
        {
            $modeloCAI = new CAI();
            $resultado = $modeloCAI->eliminarCAI($id);
            return $resultado;
        }

        
    }

    function obtenerCAI($id)
    {
        $modeloCAI = new CAI();
        $resultado = $modeloCAI->obtenerCAI($id);
        return $resultado;
    }

    function EditarCAI($id, $rango_inicial,$rango_final,$rango_actual,$numero_CAI,$fecha_vencimiento)
    {
        $modeloCAI = new CAI();
        $resultado = $modeloCAI->EditarCAI($id, $rango_inicial,$rango_final,$rango_actual,$numero_CAI,$fecha_vencimiento);
        return $resultado;
    }


?>

