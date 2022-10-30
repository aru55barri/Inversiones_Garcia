<?php
include_once('../Login/header.php');
include_once '../modelos/modelo_principal.php';
include '../config/conn.php';

$id = $_SESSION['rol'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_permisos where ID_OBJETO = 2 and ID_ROL = '$id'");
$row = mysqli_fetch_array($sql);

$insertar = $row['permiso_insercion'];
$modificar = $row['permiso_modificar'];
$consultar = $row['permiso_consultar'];
$eliminar = $row['permiso_eliminacion'];

if (isset($_GET['idusuario']) && isset($_GET['idempleado'])) {
    UsuariosContralador::eliminarUsuario($_GET['idusuario'], $_GET['idempleado']);
}

if (isset($_GET['buscar'])) {
    echo json_encode([
        'usuario' => 'juan'
    ]);
}

class UsuariosContralador
{
    public $usuarios;
    public  $matrizUsuario;

    public function __construct()
    {
        $this->usuarios = new ModeloPrincipal();
    }

    //funcion para mostrar
    static public function mostrarUsuario()
    {

        $usuarios = new ModeloPrincipal();
        $matrizUsuario = $usuarios->mostrargeneral("select u.*,r.ROL,te.NOMBRE_EMPLEADO,te2.NOMBRE_ESTADO  from tbl_usuario u inner join tbl_roles r on u.ID_ROL = r.ID_ROL inner join tbl_empleados te ON u.ID_EMPLEADO = te.ID_EMPLEADO
            inner join tbl_estado te2 on u.ID_ESTADO = te2.ID_ESTADO", "1");
        foreach ($matrizUsuario as $key => $value) {
            foreach ($value as $registro) {

                global $modificar;
                global $eliminar;

                echo "<tr>";
                echo "<td>" . $registro['id_usuario'] . "</td>";
                echo "<td>" . $registro['usuario'] . "</td>";
             // echo "<td>" . $registro['NOMBRE_USUARIO'] . "</td>";
                echo "<td>" . $registro['ROL'] . "</td>";
                echo "<td>" . $registro['fecha_ultima_conexion'] . "</td>";
                echo "<td>" . $registro['primer_ingreso'] . "</td>";
                echo "<td>" . $registro['fecha_vencimiento'] . "</td>";
                echo "<td>" . $registro['correo'] . "</td>";
                echo "<td>" . $registro['NOMBRE_ESTADO'] . "</td>";
                echo "<td>" . $registro['NOMBRE_EMPLEADO'] . "</td>";
                if ($modificar == 1){
                echo "<th><a href=../Login/modificar_usuario.php?id=" . $registro['id_usuario'] . " class='btn btn-round btn-info'><i class='fas fa-pen-square' style='color: white'></i></a></th>";
                }
                if ($eliminar == 1) {
                echo "<th><a href=../controladores/controlador_usuario.php?idusuario=" . $registro['id_usuario'] . "&idempleado=" . $registro['id_empleado'] . "  class='btn btn-round btn-danger' type='submit'><i class='fas fa-trash-alt'></i></a></th>";
                }
                echo "</tr>";
            }
            // Inicio vista en bitacora al mostrar usuarios Joel Montoya
            $modeloPrincipal = new ModeloPrincipal();
            $fecha = date("Y-m-d-H:i:s");
            $IDUS = $_SESSION['id_usuario'];

            $sql = "INSERT INTO tbl_bitacora(ID, FECHA, ACCION, DESCRIPCION, ID_USUARIO, ID_OBJETO)
            VALUES(null,'$fecha','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS','$IDUS',2)";
            $modeloPrincipal->insertargeneral($sql);
            // FIN vista en bitacora al mostrar usuarios Joel Montoya
        }
    }

    //funcion para eliminar
    static public function eliminarUsuario($idusuario, $idempleado)
    {
        $usuarios = new ModeloPrincipal();
        $user = $usuarios->mostrartipo($idusuario);
        $user = $user[0][0]['id_estado'];

        //$usuario = $usuarios->eliminar("tbl_empleados", "ID_EMPLEADO = '$idempleado'");
        $empleado = $usuarios->eliminar("tbl_usuario", "id_usuario = '$idusuario'");

        if ($empleado) {
            $_SESSION['eliminacion'] = "Eliminado correctamente";
            // Inicio eliminar usuario Joel Montoya
            $modeloPrincipal = new ModeloPrincipal();
            $fecha = date("Y-m-d-H:i:s");
            $IDUS = $_SESSION['id_usuario'];

            $sql = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
            VALUES(null,'$fecha','$IDUS', 4, 'ELIMINAR','USUARIO ELIMINADO DE LA TABLA USUARIOS')";
            $modeloPrincipal->insertargeneral($sql);
            // FIN eliminar usuario Joel Montoya 
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'EXCELENTE!',
                text: 'USUARIO ELIMINADO CON EXITO',
                confirmButtonText: 'Aceptar',
                position:'center',
                allowOutsideClick:false,
                padding:'1rem'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href ='../Login/vista_usuarios.php';
                 }
            })    
         </script>";
         
          /*  echo "<script>
            location.href ='../Login/vista_usuarios.php';
            </script>";*/
        } else {
            $_SESSION['erroruser'] = true;
            $modeloPrincipal = new ModeloPrincipal();
            $fecha = date("Y-m-d-H:i:s");

            $IDUS = $_SESSION['id_usuario'];
            echo "<script>
            Swal.fire({
                icon: 'warning',
                title: 'AVISO',
                text: 'ESTE USUARIO NO PUEDE SER ELIMINADO',
                confirmButtonText: 'Aceptar',
                position:'center',
                allowOutsideClick:false,
                padding:'1rem'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href ='../Login/vista_usuarios.php';
                 }
            })    
         </script>";
            /*echo "<script>
            location.href ='../Login/vista_usuarios.php';
            </script>";*/
            $sql1 = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
            VALUES(null,'$fecha','$IDUS', 5, 'INACTIVO','USUARIO NO SE PUEDE ELIMINAR PASA A QUEDAR INACTIVO')";
            $modeloPrincipal->insertargeneral($sql1);
         
        }
    }
    //MOSTRAR USUARIO MANTENIMIENTO AUTOREGISTR0
    static public function mostrarUsuarioMantenimiento()
    {
        $usuarios = new ModeloPrincipal();
        $matrizUsuario = $usuarios->mostrargeneral("select u.*,r.ROL,te.NOMBRE_EMPLEADO,te2.NOMBRE_ESTADO from tbl_usuarios u inner join tbl_roles r on u.ID_ROL = r.ID_ROL inner join tbl_empleados te ON u.ID_EMPLEADO = te.ID_EMPLEADO
            inner join tbl_estado te2 on u.ID_ESTADO = te2.ID_ESTADO", "5");
        foreach ($matrizUsuario as $key => $value) {
            foreach ($value as $registro) {
                if ($registro['nombre_estado'] == "NUEVO") {
                    echo "<tr>";
                    echo "<td>" . $registro['ID_USUARIO'] . "</td>";
                    echo "<td>" . $registro['USUARIO'] . "</td>";
                    // echo "<td>" . $registro['NOMBRE_USUARIO'] . "</td>";
                    echo "<td>" . $registro['ROL'] . "</td>";
                    echo "<td>" . $registro['FECHA_ULTIMA_CONEXION'] . "</td>";
                    echo "<td>" . $registro['PRIMER_INGRESO'] . "</td>";
                    echo "<td>" . $registro['FECHA_VENCIMIENTO'] . "</td>";
                    echo "<td>" . $registro['CORREO'] . "</td>";
                    echo "<td>" . $registro['DESCRIPCION_ESTADO'] . "</td>";
                    echo "<td>" . $registro['NOMBRE_EMPLEADO'] . "</td>";
                    echo "<th><a href=../Login/editar_usuario.php?id=" . $registro['ID_USUARIO'] . " class='btn btn-round btn-info'><i class='fa-solid fa-pen-to-square'></i></a></th>";
                    echo "<th><a href=../controladores/controlador_usuario.php?idusuario=" . $registro['ID_USUARIO'] . "&idempleado=" . $registro['ID_EMPLEADO'] . "  class='btn btn-round btn-danger' type='submit'><i class='fas fa-trash-alt'></i></a></th>";
                    echo "</tr>";
                }
            }
        }
    }
}
