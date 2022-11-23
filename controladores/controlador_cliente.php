<?php
    require_once '../modelos/modelo_cliente.php';


    function ListarCliente(){
        $modeloCliente = new Cliente();
        $resultado = $modeloCliente->ListarCliente();
        return $resultado;

    }

    //FUNCION INSERTAR PROVEEDORES---KEVIN
    function InsertarCliente($nombre,$DNI,$telefono,$rtn,$direccion){

        $modeloCliente = new Cliente();
        $resultado = $modeloCliente->InsertarCliente($nombre,$DNI,$telefono,$rtn,$direccion);
        return $resultado;
    }

    //FUNCION EDITAR PROVEEDORES---KEVIN
    function EditarCliente($id,$nombre,$DNI,$telefono,$rtn,$direccion)
    {
        $modeloCliente = new Cliente();
        $resultado = $modeloCliente->EditarCliente($id,$nombre,$DNI,$telefono,$rtn,$direccion);
        return $resultado;
    }

    //FUNCION ELIMINAR PROVEEDORES--KEVIN
    function eliminarCliente($id)
    {
        $modeloCliente = new Cliente();
        $resultado = $modeloCliente->eliminarCliente($id);
        return $resultado;
    }

    //FUNCION PARA OBTENER UN PROVEEDOR
    function obtenerUnCliente($id)
    {
        $modeloCliente = new Cliente();
        $resultado = $modeloCliente->obtenerUnCliente($id);
        return $resultado;
    }

    //FUNCION QUE DEVUELVE SI YA EXISTE UN PROVEEDOR EXISTENTE
    function obtenerProveedorExistente($proveedor)
    {
        $modeloCliente = new Proveedor();
        $resultado = $modeloCliente->obtenerProveedorExistente($proveedor);
        return $resultado;
    }

    //FUNCION QUE DEVUELVE SI YA EXISTE UN CORREO EXISTENTE
     function obtenerCorreoExistente($correo)
    {
        $modeloCorreo = new Cliente();
        $resultado = $modeloCorreo->obtenerCorreoExistente($correo);
        return $resultado;
    }
?>

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
        $matrizUsuario = $usuarios->mostrargeneral("select * from tbl_cliente");
        foreach ($matrizUsuario as $key => $value) {
            foreach ($value as $registro) {

                global $modificar;
                global $eliminar;
                
                echo "<tr>";
                
                
                echo "<td>" . $registro['idcliente'] . "</td>";
                echo "<td>" . $registro['DNI'] . "</td>";
             // echo "<td>" . $registro['NOMBRE_USUARIO'] . "</td>";
                echo "<td>" . $registro['nombre'] . "</td>";
                echo "<td>" . $registro['telefono'] . "</td>";
                echo "<td>" . $registro['RTN'] . "</td>";
                echo "<td>" . $registro['direccion'] . "</td>";
    
                if ($modificar == 1){
                echo "<th><a href=../src/modificar_cliente.php?id=" . $registro['idcliente'] . " class='btn btn-round btn-info'><i class='fas fa-pen-square' style='color: white'></i></a></th>";
                }
                if ($eliminar == 1) {
                echo "<th><a href=../controladores/controlador_cliente.php?idusuario=" . $registro['idcliente'] . "&idempleado=" . "  class='btn btn-round btn-danger' type='submit'><i class='fas fa-trash-alt'></i></a></th>";
                }
                echo "</tr>";
            }
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

    //funcion para eliminar
    
    //MOSTRAR USUARIO MANTENIMIENTO AUTOREGISTR0
    
}
