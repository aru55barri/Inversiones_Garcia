<?php

require_once '../config/conex.php';

class Usuario
{
    private $db;
    private $usuario;
    private $intentos;
    private $maxContra;
    private $horas;
    private $fecha;
    private $nombre;
    private $id;

    public function __construct()
    {
        $this->usuario = array();
        $this->intentos = array();
        $this->maxContra = array();
    }

    private function setNames()
    {
        return $this->db->query("SET NAMES 'utf8'");
    }

    //Iniciar sesion
    public function verificarUsuario($usuario, $contra)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_usuario WHERE usuario = '$usuario' AND clave = '$contra' AND (id_estado = 1 or id_estado = 5)";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->usuario[] = $resp;
            // Inicio insertar en bitacora al iniciar sesion 
            $fecha = date("Y-m-d-H:i:s");
            $IDUSUARIOB = "$resp[id_usuario]";

            $sql1 = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
           VALUES(null,'$fecha','$IDUSUARIOB',1,'INGRESO','EL USUARIO INICIA SESION')";
            $this->db->query($sql1);
            // FIN insertar en bitacora al iniciar sesion 
        }

        return $this->usuario;
        $this->db = null;
    }


    public function verificarUsuarioPregunta($username, $pregunta, $respuesta)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT c.id_usuario, c.usuario, b.id_pregunta, b.pregunta, a.respuesta FROM tbl_preguntas_usuario as a 
        inner join tbl_preguntas as b on a.id_pregunta = b.id_pregunta 
        left join tbl_usuario c on a.id_usuario = c.id_usuario 
        where c.usuario = '$username' AND b.id_pregunta = $pregunta AND respuesta = '$respuesta';
        ";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->usuario[] = $resp;
        }

        return $this->usuario;
        $this->db = null;
    }

    public function verificarCorreoUsuario($username)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_usuario WHERE usuario = '$username'";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->usuario[] = $resp;
        }

        return $this->usuario;
        $this->db = null;
    }

    public function verificarUsuarioExistente($username)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_usuario WHERE usuario = '$username'";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->usuario[] = $resp;
        }

        return $this->usuario;
        $this->db = null;
    }

    public function obtenerIntentosFallidos()
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT valor FROM tbl_parametros WHERE parametro = 'intentos_fallidos'";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->intentos[] = $resp;
        }

        return $this->intentos;
        $this->db = null;
    }

    public function obtenerMaximoContrasena()
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT valor FROM tbl_parametros WHERE parametro = 'max_contrasena'";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->maxContra[] = $resp;
        }

        return $this->maxContra;
        $this->db = null;
    }

    public function verificarContraAnterior($contra, $user)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_usuario WHERE clave = '$contra' AND usuario = '$user'";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->usuario[] = $resp;
        }

        return $this->usuario;
        $this->db = null;
    }

    public function obtenerNombre($user)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT nombre FROM tbl_usuario WHERE usuario = '$user'";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->usuario[] = $resp;
        }

        return $this->usuario;
        $this->db = null;
    }

    public function obtenerTipoUsuario($user)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT b.rol FROM tbl_usuario as a inner join tbl_roles b on a.id_rol = b.id_rol  WHERE usuario = '$user'";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->usuario[] = $resp;
        }

        return $this->usuario;
        $this->db = null;
    }

    public function obtenerRol($user)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT b.id_rol FROM tbl_usuario as a inner join tbl_roles b on a.id_rol = b.id_rol  WHERE usuario = '$user'";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->usuario[] = $resp;
        }

        return $this->usuario;
        $this->db = null;
    }

    public function insertarToken($token, $user, $fechaInicio, $fechaFinalizacion)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "INSERT INTO tbl_tokens (TOKEN, ID_USUARIO, FECHA_INICIO, FECHA_FINALIZACION) VALUES ('$token', '$user', '$fechaInicio', '$fechaFinalizacion')";
        $resultado = $this->db->query($sql);

        return $resultado;
        $this->db = null;
    }

    public function obtenerHorasVigencia()
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT valor FROM tbl_parametros WHERE parametro = 'horas_vigencia_correo'";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->horas[] = $resp;
        }

        return $this->horas;
        $this->db = null;
    }

    public function obtenerFechaFinalizacion($token)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT FECHA_FINALIZACION, ID_USUARIO FROM tbl_tokens WHERE TOKEN = '$token'";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->fecha[] = $resp;
        }

        return $this->fecha;
        $this->db = null;
    }

    public function obtenerNombreUser($id)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT usuario FROM tbl_usuario WHERE id_usuario = '$id'";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->nombre[] = $resp;
        }

        return $this->nombre;
        $this->db = null;
    }

    //Funcion para cambiar el estado del usuario a bloqueado
 
    public function bloquearUsuario($id)
    {

        $this->db = getConexion();
        self::setNames();
        $sql = "UPDATE tbl_usuario SET ID_ESTADO = 3 WHERE ID_USUARIO='$id'";

        $this->db->query($sql);
        $this->db = null;
    }
   
    public function desbloquearUsuario($id)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "UPDATE tbl_usuario SET ID_ESTADO = 1 WHERE ID_USUARIO='$id'";

        $this->db->query($sql);
        $this->db = null;
    }
  
    //Funcion para obtener el ID del usuario
    public function obtenerIdUsuario($nombreUsuario)
    {

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT ID_USUARIO from tbl_usuario WHERE USUARIO = '$nombreUsuario'";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->id[] = $resp;
        }

        return $this->id;
        $this->db = null;
    }

    //obtener preguntas
    public function obtenerPreguntas()
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_preguntas";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->pregunta[] = $resp;
        }

        return $this->pregunta;
        $this->db = null;
    }
    
    public function obtenerCantidadPreguntasrespondidas($id)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT *  from tbl_preguntas_usuarios where ID_USUARIO = '$id'";
        $resultado = $this->db->query($sql);

        $resultado->rowCount();


        return $resultado;
    }

    // funcion editar usuario 
    public function updateUsuario($id, $correo, $rol, $estado) 
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_usuario WHERE CORREO = '$correo' and ID_USUARIO != '$id'";
        $correov = $this->db->query($sql);
        if ($correov->rowCount() > 0) {
            return 'correo';
        } else {
            $sql = "UPDATE tbl_usuario SET ID_ROL = '$rol',CORREO = '$correo', ID_ESTADO = '$estado' where ID_USUARIO = '$id'";
            $this->db->query($sql);
            $this->db = null;
        }
    }


    //funcion insertar, nuevo_usuario 
    public function insertarUsuario($username, $password, $idrol, $correo, $estado, $idEmpleado, $fecha)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_usuario WHERE ID_EMPLEADO = '$idEmpleado'";
        $resultado = $this->db->query($sql);
        $sql = "SELECT * FROM tbl_usuario WHERE CORREO = '$correo'";
        $correov = $this->db->query($sql);
        $idEmpleado = $this->obtenerUltimoEmpleadoId();

        if ($correov->rowCount() > 0) {
            return 'correo';
        } else {
            
            $sql = "INSERT INTO tbl_usuario (USUARIO, NOMBRE, CLAVE, ID_ROL, FECHA_ULTIMA_CONEXION, PRIMER_INGRESO, FECHA_VENCIMIENTO, CORREO, ID_ESTADO, ID_EMPLEADO, preguntas_contestadas)
            VALUES('$username', '$username','$password','$idrol','0000-00-00',0, '$fecha', '$correo',$estado, $idEmpleado, 2)";
            $this->db->query($sql);

        }
    }

    //OBTENER EL ULTIMO ID EMPLEADO INGRESADO
    public function obtenerUltimoEmpleadoId()
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT max(ID_EMPLEADO) AS ID_EMPLEADO from tbl_empleados";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->idEmpleado[] = $resp;
        }

        return $this->idEmpleado[0]['ID_EMPLEADO'];
        $this->db = null;
    }

    //OBTENER EL CORREO DEL USUARIO.......KEVIN
    public function obtenerDatosUsuario($correo)
    {

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_usuario WHERE correo = '$correo'";
        $resultado = $this->db->query($sql);

        foreach($resultado as $resp)
        {
            $this->nombre[] = $resp;
        }

        return $this->nombre;
        $this->db = null;
    }

    public function obtenerNombreUsuario1($user)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT usuario FROM tbl_usuario WHERE usuario = '$user'";
        $resultado = $this->db->query($sql);

        foreach($resultado as $resp)
        {
            $this->usuario[] = $resp;
        }

        return $this->usuario;
        $this->db = null;
    }
    /*
    //Obtener generos
    public function obtenerGeneros()
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_genero";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->genero[] = $resp;
        }

        return $this->genero;
        $this->db = null;
    }
    */
    /*
    //OBTENER ESTADO CIVIL
    public function obtenerEstadoCivil()
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_estado_civil";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->estado[] = $resp;
        }

        return $this->estado;
        $this->db = null;
    }*/



    //funcion obtener usuarios, editar_usuario cesia
    public function obtenerNombreUsuarios($id)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT *  from tbl_usuario where ID_USUARIO = '$id'";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->usuario[] = $resp;
        }

        return $this->usuario;
        $this->db = null;


    }
    
    public function obtenerClientes($id)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT *  from tbl_cliente where idcliente  = '$id'";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->usuario[] = $resp;
        }

        return $this->usuario;
        $this->db = null;
    }

    public function obtenerUsuarios($id)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT *  from tbl_usuario where ID_USUARIO = '$id'";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->usuario[] = $resp;
        }

        return $this->usuario;
        $this->db = null;
    }


    //funcion obtener roles, nuevo_usuario cesia
    public function obtenerRoles()
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT *  from tbl_roles";
        $roles = $this->db->query($sql);
        return $roles;
        $this->db = null;
    }

    //funcion obtener empleados, nuevo_editar empleado  nelson
    public function obtenerEmpleados()
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT *  from tbl_empleados";
        $empleados = $this->db->query($sql);
        return $empleados;
        $this->db = null;
    }

    //funcion obtener cargos, nuevo_editar empleado  nelson
    public function obtenerCargos()
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT *  from tbl_cargos";
        $empleados = $this->db->query($sql);
        return $empleados;
        $this->db = null;
    }
    /* COMPRA LUIS */
    //funcion obtener proveedores, nuevo_editar compra  
    public function obtenerProveedor()
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT *  from tbl_proveedores";
        $empleados = $this->db->query($sql);
        return $empleados;
        $this->db = null;
    }
    
     //funcion obtener empleados, nuevo_usuario cesia y nelson
     
     public function obtenerCompra($id)
    {
        
        $this->db = getConexion();
        self::setNames();
        $stm = $this->db->query("SELECT * FROM tbl_compras WHERE ID_COMPRA = '$id'");
        foreach ($stm as $re) {
            $this->usuario[] = $re;
        }

        return $this->usuario;
        $this->db = null;
    }
     
     
    
     
     public function obtenerUsuarioCompra()
     {
         $this->db = getConexion();
         self::setNames();
         $sql = "SELECT *  from tbl_usuarios";
         $usuario = $this->db->query($sql);
         return $usuario;
         $this->db = null;
     }

     public function obtenerpago()
     {
         $this->db = getConexion();
         self::setNames();
         $sql = "SELECT *  from tbl_tipo_pago";
         $pago = $this->db->query($sql);
         return $pago;
         $this->db = null;
     }
      /* FIN  COMPRA LUIS */


    //funcion obtener empleados, nuevo_usuario cesia y nelson
    public function obtenerEmpleado($id)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT *  from tbl_empleados where ID_EMPLEADO = '$id'";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->usuario[] = $resp;
        }

        return $this->usuario;
        $this->db = null;
    }

    public function obtenerGenero()
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT *  from tbl_genero";
        $empleados = $this->db->query($sql);
        return $empleados;
        $this->db = null;
    }

    public function obtenerEstadoC()
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT *  from tbl_estado_civil";
        $empleados = $this->db->query($sql);
        return $empleados;
        $this->db = null;
    }

    //funcion obtener estados, nuevo_usuario cesia
    public function obtenerEstados()
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT *  from tbl_estado";
        $estados = $this->db->query($sql);
        return $estados;
        $this->db = null;
    }
    /*********************************FERNANDO******************************************/
    public function obtenerPreguntass()
    {
        $this->db = getConexion();
        self::setNames();
        $num = $this->obtenerMaxpreguntas();
        $num = $num[0]['VALOR'];
        $_SESSION['maxpreguntas'] = $num;
        $sql = "SELECT * FROM tbl_preguntas";
        $resultado = $this->db->query($sql);
        return $resultado;
    }
    public function obtenerMaxpreguntas()
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT VALOR FROM tbl_parametros WHERE PARAMETRO = 'NUM_PREGUNTAS'";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->maxContra[] = $resp;
        }

        return $this->maxContra;
        $this->db = null;
    }
    public function insertarPreguntas($pregunta, $respuesta, $usuario) ///////////////////////////////////////////////////////////
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "INSERT INTO tbl_preguntas_usuario(id_pregunta, id_usuario, respuesta)VALUES('$pregunta','$usuario','$respuesta')";
        $this->db->query($sql);

        $fecha = date("Y-m-d-H:i:s");
        $sql1 = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
        VALUES(null,'$fecha','$usuario',2,'INGRESAR PREGUNTAS','EL USUARIO INGRESA PREGUNTAS DE SEGURIDAD')";
        $this->db->query($sql1);
    }
    public function cambiarContra($username, $contra)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "UPDATE tbl_usuario SET clave = '$contra' WHERE usuario = '$username'";
        $resultado = $this->db->query($sql);
        // Inicio agregar cambio de contraseña por correo Joel Montoya
        $fecha = date("Y-m-d-H:i:s");
        $IDUS = obtenerIdUsuario($username);

        $sql1 = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
        VALUES(null,'$fecha','$IDUS',2,'ACTUALIZAR','EL USUARIO ACTUALIZA LA CONTRASEÑA')";
        $this->db->query($sql1);


        // fin agregar cambio de contraseña por correo Joel Montoya
        return $resultado;
        $this->db = null;
    }

    public function insertarcompra($fecha,$subtotal,$isv,$total,$usuario,$proveedor,$pago)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "INSERT INTO tbl_compras (ID_COMPRA, FEC_COMPRA, SUBTOTAL, ISV, TOTAL, ID_PROVEEDOR, ID_USUARIO, ID_TIP_PAGO) VALUES (null,'$fecha', '$subtotal', '$isv', '$total', '$proveedor', $usuario, '$pago')";
        $resultado = $this->db->query($sql);

        return $resultado;
        $this->db = null;
    }

    /*********************************FIN FERNANDO******************************************/

    /*********************************KEVIN********************************************************************************************/
    //INSERTAR EMPLEADOS Y USUARIOS register
    public function insertarUsuarioEmpleado($nombre, $apellido, $correo, $username, $password)
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "INSERT INTO tbl_empleados(NOMBRE_EMPLEADO,APELLIDO_EMPLEADO,ID_CARGO)
        VALUES('$nombre','$apellido',8)";
        $this->db->query($sql);
        $idEmpleado = $this->obtenerUltimoEmpleadoId();
        $fechaHoy = date("Y-m-d");
        $meses = $this->mesesVencimiento();
        $fechaVencimiento = date("Y-m-d", strtotime($fechaHoy . "+" . $meses[0]['VALOR']  . " month"));
        $sql = "INSERT INTO tbl_usuario (USUARIO, NOMBRE, clave, ID_ROL, FECHA_ULTIMA_CONEXION, PRIMER_INGRESO, FECHA_VENCIMIENTO, CORREO, ID_ESTADO, ID_EMPLEADO, PREGUNTAS_CONTESTADAS)
        VALUES('$username', '$nombre','$password', 1, '0000-00-00', 0, '$fechaVencimiento', '$correo', 5, '$idEmpleado',2)";
        $this->db->query($sql);
        
        // Inicio insertar en bitacora al autoregistrarse Joel Montoya
        $fecha = date("Y-m-d-H:i:s");
        $IDUSUARIO = $this->obtenerUltimousuarioid();
        $sql1 = "INSERT INTO tbl_bitacora(ID, FECHA, ACCION, DESCRIPCION, ID_USUARIO, ID_OBJETO)
           VALUES(null,'$fecha','NUEVO','UN NUEVO USUARIO SE HA AUTOREGISTRADO','$IDUSUARIO',2)";
        $this->db->query($sql1);
        // FIN insertar en bitacora al autoregistrarse Joel Montoya
        
    }
    public function mesesVencimiento()
    {
        $mesesVencimiento = [];
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT VALOR FROM tbl_parametros WHERE PARAMETRO = 'FECHA_DE_VENCIMIENTO'";
        $resultado = $this->db->query($sql);
        foreach ($resultado as $resp) {
            $mesesVencimiento[] = $resp;
        }
        return $mesesVencimiento;
    }

    public function actualizarUltimaConexion($id){
        $this->db = getConexion();
        self::setNames();
        $fechahoy = date("Y-m-d");
        $sql = "UPDATE tbl_usuario SET FECHA_ULTIMA_CONEXION = '$fechahoy' WHERE id_usuario ='$id'";
        $this->db->query($sql);
        $this->db=null;
    }

    /*********************************KEVIN******************************************/

    public function obtenerEmpleadoPorDNI($dni)
    {
        $this->db = getConexion();
        self::setNames();

        $stm = $this->db->query("SELECT * FROM tbl_empleados WHERE IDENTIDAD = '$dni'");
        $rows = $stm->fetchAll(PDO::FETCH_NUM);

        return $rows;
        $this->db = null;
    }

    public function obtenerEmpleadoPorCORREO($correo)
    {
        $this->db = getConexion();
        self::setNames();

        $stm = $this->db->query("SELECT * FROM tbl_usuario WHERE correo = '$correo'");
        $rows = $stm->fetchAll(PDO::FETCH_NUM);

        return $rows;
        $this->db = null;
    }
    public function obtenernombreusuario($usuario)
    {
        $this->db = getConexion();
        self::setNames();

        $stm = $this->db->query("SELECT * FROM tbl_usuario WHERE USUARIO = '$usuario'");
        $rows = $stm->fetchAll(PDO::FETCH_NUM);

        return $rows;
        $this->db = null;
    }

    /*********************************FIN DENIA******************************************/


    /*********************************JOEL******************************************/
    //OBTENER EL ULTIMO ID USUARIO INGRESADO
    public function obtenerUltimousuarioid()
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT max(ID_USUARIO) AS ID_USUARIO from tbl_usuario;";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->idusuario[] = $resp;
        }

        return $this->idusuario[0]['ID_USUARIO'];
        $this->db = null;
    }
    /*********************************FIN JOEL******************************************/

    public function obtenerClientePorDNI($dni)
    {
        $this->db = getConexion();
        self::setNames();

        $stm = $this->db->query("SELECT * FROM tbl_clientes WHERE IDENTIDAD = '$dni'");
        $rows = $stm->fetchAll(PDO::FETCH_NUM);

        return $rows;
        $this->db = null;
    }
}
