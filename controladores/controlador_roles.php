<?php
include_once('../Login/header.php');
include_once '../modelos/modelo_principal.php';
include '../config/conn.php';

$id = $_SESSION['rol'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_permisos where ID_OBJETO = 3 and ID_ROL = '$id'");
$row = mysqli_fetch_array($sql);

$insertar = $row['permiso_insercion'];
$modificar = $row['permiso_modificar'];
$consultar = $row['permiso_consultar'];
$eliminar = $row['permiso_eliminacion'];


if (isset($_GET['eliminar'])) {
    Contralador::eliminar($_GET['eliminar']);
}

class Contralador
{
    public $data;
    public $matriz;

    public function __construct()
    {
        $this->data = new ModeloPrincipal();
    }

    static function Insertar($rol, $descripcion)
    {

        $modelo = new ModeloPrincipal();
        $sql = "SELECT * FROM tbl_roles WHERE rol = '$rol'";
        $matriz = $modelo->mostrargeneral($sql);
        if (count($matriz) > 0) {
            $_SESSION['existe'] = 'error';
            echo "<script> 
            location.href ='../src/Mantenimiento_Roles.php';
            </script>";
        } else {
            $sql = "INSERT INTO tbl_roles (rol, descripcion) VALUES ('$rol','$descripcion')";
            $modelo->insertargeneral($sql);
            $_SESSION['registro'] = 'ok';
            echo "<script> 
            location.href ='../src/Mantenimiento_Roles.php';
            </script>";
        }
    }

    //funcion para mostrar
    static public function mostrar()
    {
        global $eliminar;
        global $modificar;

        $data = new ModeloPrincipal();
        $matriz = $data->mostrargeneral("SELECT * FROM tbl_roles", "1");
        foreach ($matriz as $key => $VALUE) {
            foreach ($VALUE as $registro) { ?>
                <tr>
                    <td><?= $registro['id_rol'] ?></td>
                    <td><?= $registro['rol'] ?></td>
                    <td><?= $registro['descripcion'] ?></td>
                    <?php if ($modificar == 1) { ?>
                        <th><a href="../src/editar_roles.php?id=<?= $registro['id_rol'] ?>" class='btn btn-round btn-info'><i class='fa-solid fa-pen-to-square'></i></a></th>
                    <?php }
                    if ($eliminar == 1) { ?>
                        <th><a onclick="eliminar(<?= $registro['id_rol'] ?>)" class='btn btn-round btn-danger' type='submit'><i class='fas fa-trash-alt' style="color: white;"></i></a></th>
                    <?php } ?>
                </tr>
        <?php   }
          // Inicio vista en bitacora al mostrar usuarios Joel Montoya
          $modeloPrincipal = new ModeloPrincipal();
          $fecha = date("Y-m-d-H:i:s");
          $IDUS = $_SESSION['id_usuario'];

          $sql = "INSERT INTO tbl_bitacora(ID, FECHA, ACCION, DESCRIPCION, ID_USUARIO, ID_OBJETO)
          VALUES(null,'$fecha','INGRESO','EL USUARIO INGRESA A TABLA CLIENTES','$IDUS',2)";
          $modeloPrincipal->insertargeneral($sql);
          // FIN vista en bitacora al mostrar usuarios Joel Montoya
        }
    }


    static public function mostrarid($id)
    {
        $data = new ModeloPrincipal();
        $matriz = $data->mostrargeneral("SELECT * FROM tbl_roles WHERE ID_ROL = '$id'", "1");
        return $matriz;
    }

    //funcion para eliminar
    static public function eliminar($id)
    {
        $model = new ModeloPrincipal();
        $elimin = $model->eliminar("tbl_roles", "id_Rol = '$id'");

        if ($elimin) {
            $_SESSION['eliminacion'] = "Eliminado correctamente";
            $modeloPrincipal = new ModeloPrincipal();
            $fecha = date("Y-m-d-H:i:s");
            $IDUS = $_SESSION['id_usuario'];

            $sql = "INSERT INTO tbl_bitacora(ID, FECHA, ACCION, DESCRIPCION, ID_USUARIO, ID_OBJETO)
            VALUES(null,'$fecha','INGRESO','EL USUARIO INGRESA A TABLA CLIENTES','$IDUS',2)";
            $modeloPrincipal->insertargeneral($sql);

            echo "<script>
            location.href ='../src/Mantenimiento_roles.php';
            </script>";
        } else {
            $_SESSION['erroruser'] = true;
            echo "<script>
            location.href ='../src/Mantimiento_roles.php';
            </script>";
        }
    }
}
