<?php
    require_once '../modelos/modelo_parametro.php';


    function mostrarparametros()
    {
    
        $modeloParametro = new parametros();
        $resultado = $modeloParametro->get_parametro();
        return $resultado;
    }
    
    function insert_paramtros($parametro,$valor,$fecha_creacion,$fecha_modificacion)
    {
    
        $modeloParametro = new parametros();
        $resultado = $modeloParametro->insert_parametros($parametro,$valor,$fecha_creacion,$fecha_modificacion);
        return $resultado;
    }
    
    function obtenerUltimousuarioID(){
        $modeloParametro = new parametros();
        $resultado = $modeloParametro->obtenerUltimousuarioID();
        return $resultado;
    }
    
    function delete_parametro($id)
    {
        $modeloParametro = new parametros();
        $resultado = $modeloParametro->delete_parametro($id);
        return $resultado;
    }
    
    function get_parametro_ID($id)
    {
        $modeloParametro = new parametros();
        $resultado = $modeloParametro->get_parametro_ID($id);
        return $resultado;
    }
    
    function editar_parametro($id,$parametro,$valor,$fecha_creacion,$fecha_modificacion)
    {
        $modeloParametro = new parametros();
        $resultado = $modeloParametro->editar_parametro($id,$parametro,$valor,$fecha_creacion,$fecha_modificacion);
        return $resultado;
    }
    
    function obtenerParametroExistente($parametro)
    {
        $modeloParametro = new parametros();
        $resultado = $modeloParametro->obtenerParametroExistente($parametro);
        return $resultado;
    }
    
    function obtenerFechaActual()
    {
    
        $fecha = date('Y-m-d');
        //$fecha = date('Y-m-d', strtotime($fecha . '+ 1 hours'));
        return $fecha;
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

