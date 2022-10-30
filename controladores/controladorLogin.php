<?php
// session_start();
include_once '../modelos/modelo_login.php';
include_once '../modelos/modelo_principal.php';


function iniciarSesion($usuarios, $contras)
{
    $modeloUsuario = new Usuario();
    return $modeloUsuario->verificarUsuario($usuarios, $contras);
}

function actualizarUltimaConexion($id){
    $modeloUsuario = new Usuario();
    return $modeloUsuario->actualizarUltimaConexion($id);
}

function verificarUsuariosPreguntas($user, $idPregunta, $resp)
{
    $modeloUsuario = new Usuario();
    return $modeloUsuario->verificarUsuarioPregunta($user, $idPregunta, $resp);
}

function verificarCorreosUsuarios($user)
{
    $modeloUsuario = new Usuario();
    return $modeloUsuario->verificarCorreoUsuario($user);
}

function cambiarContra($user, $contra)
{
    $modeloUsuario = new Usuario();
    return $modeloUsuario->cambiarContra($user, $contra);
}

function obtenerIntentosFallidos()
{
    $modeloUsuario = new Usuario();
    return $modeloUsuario->obtenerIntentosFallidos();
}

function validarContra($contra)
{

    $modeloUsuario = new Usuario();
    $maximoContra = obtenerMaximoContra();

    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){5,' . $maximoContra . '}$/', $contra)) {
        return false;
    } else {
        return true;
    }
}

function obtenerMaximoContra()
{
    $modeloUsuario = new Usuario();
    $caracteresContra = $modeloUsuario->obtenerMaximoContrasena();
    return $caracteresContra[0]['valor'];
}

function validarTodoMayuscula($usuario)
{
    if (!preg_match('/^[A-ZÑÁÉÍÓÚÜ]+$/', $usuario)) {
        return false;
    } else {
        return true;
    }
}

function validarUsuarioExistente($usuario)
{
    $modeloUsuario = new Usuario();
    $usuarios = array();
    $usuarios = $modeloUsuario->verificarUsuarioExistente($usuario);

    if (count($usuarios) > 0) {
        return true;
    } else {
        return false;
    }
}

function verificarContraAnterior($contra, $user)
{
    $modeloUsuario = new Usuario();
    $usuarios = array();
    $usuarios = $modeloUsuario->verificarContraAnterior($contra, $user);

    if (count($usuarios) > 0) {
        return true;
    } else {
        return false;
    }
}

function obtenerNombre($user)
{
    $modeloUsuario = new Usuario();
    $usuarios = array();
    $usuarios = $modeloUsuario->obtenerNombre($user);

    if (count($usuarios) > 0) {
        return $usuarios[0]['nombre'];
    } else {
        return 0;
    }
}

function obtenerTipoUsuario($user)
{
    $modeloUsuario = new Usuario();
    $usuarios = array();
    $usuarios = $modeloUsuario->obtenerTipoUsuario($user);

    if (count($usuarios) > 0) {
        return $usuarios[0]['rol'];
    } else {
        return 0;
    }
}


function obtenerRol($user)
{
    $modeloUsuario = new Usuario();
    $usuarios = array();
    $usuarios = $modeloUsuario->obtenerRol($user);

    if (count($usuarios) > 0) {
        return $usuarios[0]['id_rol'];
    } else {
        return 0;
    }
}
function soloNumeros($cadena)
{
    if (!preg_match('/^[0-9]+$/', $cadena)) {
        return false;
    } else {
        return true;
    }
}

function soloLetras($cadena)
{
    if (!preg_match('/^[a-zA-Z]+$/', $cadena)) {
        return false;
    } else {
        return true;
    }
}

function obtenerHorasVigencia()
{
    $modeloUsuario = new Usuario();
    $usuarios = array();
    $usuarios = $modeloUsuario->obtenerHorasVigencia();

    if (count($usuarios) > 0) {
        return $usuarios[0]['valor'];
    } else {
        return 0;
    }
}

function insertarToken($user, $token, $fechaEnvio, $fechaExpiracion)
{
    $modeloUsuario = new Usuario();
    return $modeloUsuario->insertarToken($token, $user, $fechaEnvio, $fechaExpiracion);
}

function obtenerFechaFinalizacion($token)
{
    $modeloUsuario = new Usuario();
    $usuarios = array();
    $usuarios = $modeloUsuario->obtenerFechaFinalizacion($token);

    if (count($usuarios) > 0) {
        return $usuarios;
    } else {
        return 0;
    }
}

function obtenerNombreUser($id)
{
    $modeloUsuario = new Usuario();
    $usuarios = array();
    $usuarios = $modeloUsuario->obtenerNombreUser($id);

    if (count($usuarios) > 0) {
        return $usuarios[0]['usuario'];
    } else {
        return 0;
    }
}

function bloquearUsuario($id)
{

    $modeloUsuario = new Usuario();
    $modeloUsuario->bloquearUsuario($id);
}

function desbloquearUsuario($id)
{

    $modeloUsuario = new Usuario();
    $modeloUsuario->desbloquearUsuario($id);
}

//-----KEVIN
function obtenerIdUsuario($nombreUsuario)
{

    $modeloUsuario = new Usuario();
    $ids = $modeloUsuario->obtenerIdUsuario($nombreUsuario);

    if($ids == null)
    {
        return 0;
    }
    else
    {
        if (count($ids) > 0) {
            return $ids[0]['ID_USUARIO'];
        } elseif (count($ids) == 0) {
            return 0;
        }
    }
}

//obtener preguntas-----------KEVIN
function obtenerPreguntas()
{
    $modeloUsuario = new Usuario();
    $pregunta= array();
    $pregunta= $modeloUsuario->obtenerPreguntas();

    if(count($pregunta)> 0){
        return $pregunta;
    }else{

    return 0;
    }
}

//FUNCION PARA OBTENER EL CORREO DEL USUARIO-----------KEVIN
function obtenerDatosUsuario($correo)
{

    $modeloUsuario = new Usuario();
    $datos = $modeloUsuario->obtenerDatosUsuario($correo);

    return $datos;
}
//+---------KEVIN
function obtenerNombreUsuario($user)
{
    $modeloUsuario = new Usuario();
    $usuarios = array();
    $usuarios = $modeloUsuario->obtenerNombreUsuario1($user);

    if(count($usuarios) > 0)
    {
        return $usuarios[0]['usuario'];
    }
    else
    {
        return 0;
    }
}


//editar Usuarios cesia
function InsertarUpdateUsuarios($id, $usuario, $correo, $rol, $nombre, $estado) /////////////////////////////////////////////
{
    $modeloUsuario = new Usuario();
    $valor = $modeloUsuario->updateUsuario($id, $usuario, $correo, $rol, $nombre, $estado);
    if ($valor == 'correo') {
        $_SESSION['correo'] = 'listo';
       
       echo "<script> 
        location.href ='../Login/vista_usuarios.php';
        </script>";
    } else {
        $_SESSION['edicion'] = 'listo';
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'EXCELENTE!',
            text: 'USUARIO EDITADO CON EXITO',
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
       /* echo "<script> 
        location.href ='../Login/vista_usuarios.php';
        </script>";*/
        
    }
}


function respuestaspreguntas($id)
{
    $modeloUsuario = new Usuario();

    $modeloUsuario->obtenerCantidadPreguntasrespondidas($id);

    return $modeloUsuario;
}



// funcion insertar
function InsertarUsuarioEmppleados(
    $nombres,
    $apellidos,
    $cargo
) {
    $modeloPrincipal = new ModeloPrincipal();
    $sql = "INSERT INTO tbl_empleados
    (NOMBRE_EMPLEADO, APELLIDO_EMPLEADO, ID_CARGO)
    VALUES('$nombres', '$apellidos', '$cargo')";
    $modeloPrincipal->insertargeneral($sql);
 
    // Inicio insertar en bitacora al Insertar un empleado 
    $fecha = date("Y-m-d-H:i:s");
    $IDUS = $_SESSION['id_usuario'];


    $sql = "INSERT INTO tbl_bitacora(ID, FECHA, ACCION, DESCRIPCION, ID_USUARIO, ID_OBJETO)
      VALUES(null,'$fecha','NUEVO','SE CREA NUEVO REGISTRO EN EMPLEADOS','$IDUS',3)";
    $modeloPrincipal->insertargeneral($sql);
    // FIN insertar en bitacora al Insertar un empleado 
    
    /*
    $_SESSION['registro'] = 'ok';
    echo "<script> 
     location.href ='../vistas/vista_empleados.php';
     </script>";
    */
}


// funcion update empleados
function InsertarUpdateEmppleados(
    $id,
    $nombres,
    $apellidos,
    $fecha,
    $identidad,
    $genero,
    $cargo,
    $estado
) {
    $modeloPrincipal = new ModeloPrincipal();

    $modeloPrincipal->UpdateEmpleados($id, $nombres, $apellidos, $fecha, $identidad, $genero, $cargo, $estado);
    $_SESSION['edicion'] = 'edicion';
    echo "<script>
         location.href ='../vistas/vista_empleados.php';
         </script>";
}

/*********************************FERNANDO******************************************/
function obtenerPreguntass()
{

    $modeloUsuario = new Usuario();
    return $pregunta = $modeloUsuario->obtenerPreguntass();
}

function InsertarPreguntas($ipregunta, $respuesta, $usuario)
{
    $modeloUsuario = new Usuario();

    $modeloUsuario->insertarPreguntas($ipregunta, $respuesta, $usuario);
}
function cambiarpass($user, $pass)
{
    $modeloUsuario = new Usuario();
    $modeloUsuario->cambiarContra($user, $pass);
    // Inicio actualizar contraseña en un nuevo usuario Joel Montoya
    $modeloPrincipal = new ModeloPrincipal();
    $fecha = date("Y-m-d-H:i:s");
    $IDUS = $_SESSION['id_usuario'];

    $sql = "INSERT INTO tbl_bitacora(ID, FECHA, ACCION, DESCRIPCION, ID_USUARIO, ID_OBJETO)
         VALUES(null,'$fecha','ACTUALIZAR','EL USUARIO ACTUALIZA LA CONTRASEÑA','$IDUS',2)";
    $modeloPrincipal->insertargeneral($sql);
    // FIN actualizar contraseña en un nuevo usuario Joel Montoya

}
/*********************************FIN FERNANDO******************************************/

/*********************************DENIA******************************************/
//Insertar Usuarios register
function InsertarUsuarioEmpleado($nombre, $apellido, $correo, $username, $password)
{
    $modeloUsuario = new Usuario();
    return $modeloUsuario->insertarUsuarioEmpleado($nombre, $apellido, $correo, $username, $password);
    

}

if (!empty($_POST['_action'])) {
    if ($_POST['_action'] == 'validarDNI') {
        $error = "";
        $modelo = new Usuario();
        $empleado_dni = $modelo->obtenerEmpleadoPorDNI($_POST['txtidentidad']);

        if (count($empleado_dni)) {
            $error = "DNI YA INGRESADO";
        }

        echo json_encode([
            'POST' => $_POST,
            'error' => $error,
        ]);
        die();
    }
}


if (!empty($_POST['_action'])) {
    if ($_POST['_action'] == 'validarCORREO') {
        $error = "";
        $modelo = new Usuario();
        $empleado_correo = $modelo->obtenerEmpleadoPorCORREO($_POST['txtemail']);

        if (count($empleado_correo)) {
            $error = "correo ya ingresado";
        }

        echo json_encode([
            'POST' => $_POST,
            'error' => $error,
        ]);
        die();
    }
}
if (!empty($_POST['_action'])) {
    if ($_POST['_action'] == 'validarusuario') {
        $error = "";
        $modelo = new Usuario();
        $nombre_usuario = $modelo->obtenernombreusuario($_POST['txtusuario']);

        if (count($nombre_usuario)) {
            $error = "NOMBRE USUARIO NO SE ENCUENTRA DISPONIBLE";
        }

        echo json_encode([
            'POST' => $_POST,
            'error' => $error,
        ]);
        die();
    }

    if (!empty($_POST['_action'])) {
        if ($_POST['_action'] == 'validarDNICliente') {
            $error = "";
            $modelo = new Usuario();
            $cliente = $modelo->obtenerClientePorDNI($_POST['txtidentidad']);
    
            if (count($cliente)) {
                $error = "DNI YA INGRESADO";
            }
    
            echo json_encode([
                'POST' => $_POST,
                'error' => $error,
            ]);
            die();
        }
    }
}


