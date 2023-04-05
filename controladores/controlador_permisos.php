<?php
include_once('../Login/header.php');
include_once '../modelos/modelo_principal.php';
include '../config/conn.php';

$id = $_SESSION['rol'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_permisos where ID_OBJETO = 4 and ID_ROL = '$id'");
$row = mysqli_fetch_array($sql);

$insertar = $row['permiso_insercion'];
$modificar = $row['permiso_modificar'];
$consultar = $row['permiso_consultar'];
$eliminar = $row['permiso_eliminacion'];
$PDF = $row['pdf'];


if (isset($_GET['eliminar'])) {
    Contralador::eliminar($_GET['eliminar']);
}
 

class Contralador
{
    public $data;
    public  $matriz;

    public function __construct()
    {
        $this->data = new ModeloPrincipal();
    }

    static function Insertar($inserta, $eliminar, $modificar, $consultar, $PDF, $rol, $objeto)
    {

        $modelo = new ModeloPrincipal();
        $sql = "INSERT INTO tbl_permisos (permiso_insercion, permiso_eliminacion, permiso_modificar, permiso_consultar, id_rol, id_objeto, pdf)VALUES($inserta,$eliminar,$modificar,$consultar,$rol,$objeto, $PDF)";
        $modelo->insertargeneral($sql);
        $_SESSION['registro'] = 'ok';
        echo "<script> 
        location.href ='../src/permisos.php';
        </script>";
    }

    //funcion para mostrar
    static public function mostrar()
    {

        global $eliminar;
        global $modificar;

        $data = new ModeloPrincipal();
        $matriz = $data->mostrargeneral("select tp.*,tm.OBJETO,tr.ROL from tbl_permisos tp inner join tbl_modulos tm on tp.ID_OBJETO = tm.ID_OBJETO inner join tbl_roles tr ON tp.ID_ROL = tr.ID_ROL", "1");
        foreach ($matriz as $key => $value) {
            foreach ($value as $registro) { ?>
                <tr>
                    <td><?= $registro['id_permiso'] ?></td>
                    <td><?= $registro['permiso_insercion'] == 1 ? 'SI' : 'NO' ?></td>
                    <td><?= $registro['permiso_eliminacion'] == 1 ? 'SI' : 'NO'  ?></td>
                    <td><?= $registro['permiso_modificar'] == 1 ? 'SI' : 'NO' ?></td>
                    <td><?= $registro['permiso_consultar'] == 1 ? 'SI' : 'NO' ?></td>
                    <td><?= $registro['pdf'] == 1 ? 'SI' : 'NO' ?></td>
                    <td><?= $registro['ROL'] ?></td>
                    <td><?= $registro['OBJETO'] ?></td>
                    <?php if ($modificar == 1) { ?>
                        <th><a href="../src/editar_permiso.php?id=<?= $registro['id_permiso'] ?>" class='btn btn-round btn-info'><i class='fa-solid fa-pen-to-square'></i></a></th>
                    <?php }
                    if ($eliminar == 1) { ?>
                        <th><a onclick="eliminar(<?= $registro['id_permiso'] ?>)" class='btn btn-round btn-danger' type='submit'><i class='fas fa-trash-alt' style="color: white;"></i></a></th>
                    <?php } ?>
                </tr>
<?php }
             $modeloPrincipal = new ModeloPrincipal();

             date_default_timezone_set('America/Mexico_City');
             $fecha = date("Y-m-d-H:i:s");
             $IDUS = $_SESSION['id_usuario'];

             include '../Config/conn.php';

             $rs = mysqli_query($conn, "SELECT * FROM tbl_usuario where id_usuario = $IDUS");
             $row = mysqli_fetch_array($rs);
             $Usuarioo = $row['usuario'];

             $sql = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
             VALUES(null,'$fecha','$IDUS',20, 'INGRESO','$Usuarioo INGRESÓ A TABLA PERMISOS')";
             $modeloPrincipal->insertargeneral($sql);
        }
       
    }

    static public function mostrarid($id)
    {
        $data = new ModeloPrincipal();
        $matriz = $data->mostrargeneral("SELECT * FROM tbl_permisos WHERE id_permiso = '$id'", "1");
        return $matriz;
    }

    static public function mostrarpermisos($rol, $objeto)
    {
        $data = new ModeloPrincipal();
        $matriz = $data->mostrargeneral("SELECT * FROM tbl_permisos WHERE id_rol = '$rol' AND id_objeto = '$objeto'", "1");
        return $matriz;
    }


    static public function obtenerRoles()
    {
        $data = new ModeloPrincipal();
        $matriz = $data->mostrarselect("select * from tbl_roles", "1");
        return $matriz;
    }

    static public function obtenerObjetos()
    {
        $data = new ModeloPrincipal();
        $matriz = $data->mostrarselect("select * from tbl_modulos", "1");
        return $matriz;
    }

    //funcion para eliminar
    static public function eliminar($id)
    {
        $data = new ModeloPrincipal();
        $result = $data->eliminar("tbl_permisos", "id_permiso = '$id'");

        if ($result) {
            $_SESSION['eliminacion'] = "Eliminado correctamente";
            $modeloPrincipal = new ModeloPrincipal();
            $fecha = date("Y-m-d-H:i:s");
            $IDUS = $_SESSION['id_usuario'];
            $sql = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
            VALUES(null,'$fecha','$IDUS',20, 'ELIMINAR','EL USUARIO ELIMINA DE LA TABLA PERMISOS')";
            $modeloPrincipal->insertargeneral($sql);
            // FIN eliminar usuario Joel Montoya 
            echo "<script>
            location.href ='../src/permisos.php';
            </script>";
        } else {
            $_SESSION['erroruser'] = true;
            echo "<script>
            location.href ='../src/permisos.php';
            </script>";
        }
    }
}
