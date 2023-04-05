<?php
include_once '../modelos/modelo_principal.php';

require_once '../config/conexion.php';

class categoria
{
    private $db;
    private $Pregunta;


    public function __construct()
    {
        $this->db = getConexion();
        $this->Pregunta = array();

    }

    private function setNames()
    {
        return $this->db->query("SET NAMES 'utf8'");
    }

    public function get_categoria(){

        $this->db = getConexion();
        self::setNames();
        $sql = "select u.*,r.descripcion as TIPO_CATEG from tbl_categoria u inner join tbl_tipo_categoria r on u.id_tipo_categ = r.id";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->Pregunta[] = $resp;
        }

        return $this->Pregunta;
        $this->db = null;
    }


    public function insert_categoria($PREGUNTA){

        $this->db = getConexion();
        self::setNames();
        $sql="INSERT INTO tbl_categoria (descripcion) VALUES ('$PREGUNTA')";
        $resultado = $this->db->query($sql);
        //ALTERAR BITACORA______________________
        $fecha = date("Y-m-d-H:i:s");
        $IDUSUARIO = $_SESSION['id_usuario'];
       
       
       $sql1 = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
        VALUES(null,'$fecha','$IDUSUARIO',28,'REGISTRO', 'SE CREO UN NUEVO REGISTRO EN PREGUNTAS')";
     $this->db->query($sql1);
        //ALTERAR BITACORA______________________


        if ($resultado) {
            return true;
        }else{
            return false;
        }

        return $this->Pregunta;
        $this->db = null;

    }

    public function editar_categoria($ID_PREGUNTA,$Pregunta)
    {
        $this->db = getConexion();
        self::setNames();

        $sql = "UPDATE tbl_categoria SET descripcion = '$Pregunta'  WHERE id = '$ID_PREGUNTA'";
        $resultado = $this->db->query($sql);
        //ALTERAR BITACORA______________________
        $fecha = date("Y-m-d-H:i:s");
        $IDUSUARIO = $_SESSION['id_usuario'];

        $sql1 = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
        VALUES(null,'$fecha','$IDUSUARIO',28,'EDITAR', 'SE EDITO UN NUEVO REGISTRO EN PREGUNTAS')";
     $this->db->query($sql1);
        //ALTERAR BITACORA______________________

        if ($resultado) {
            return true;
        } else {
            return false;
        }

        return $this->Pregunta;
        $this->db = null;
    }

    public function delete_categoria($ID_PREGUNTA){

        $this->db = getConexion();
        self::setNames();
        $sql="DELETE FROM tbl_categoria WHERE id = $ID_PREGUNTA";
        /*$resultado = $this->db->query($sql);
        //ALTERAR BITACORA______________________
        $fecha = date("Y-m-d-H:i:s");
        $IDUSUARIO = $_SESSION['ID_USUARIO'];
        $sql1 = "INSERT INTO tbl_bitacora(ID_BITACORA, FECHA, ACCION, DESCRIPCION_BITACORA, ID_USUARIO, ID_OBJETO)
         VALUES(null,'$fecha','ELIMINAR','ELIMINO UNA PREGUNTA ','$IDUSUARIO',28)";
        $this->db->query($sql1);
        //ALTERAR BITACORA______________________

        if ($resultado) {
            return true;
        }else{
            return false;
        }

        return $this->Pregunta;
        $this->db = null;*/

        try {
            $this->db->query($sql);
        //ALTERAR BITACORA______________________
        $fecha = date("Y-m-d-H:i:s");
        $IDUSUARIO = $_SESSION['id_usuario'];
        $sql1 = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
        VALUES(null,'$fecha','$IDUSUARIO',28,'ELIMINAR', 'SE ELIMINO UN NUEVO REGISTRO EN PREGUNTAS')";
     $this->db->query($sql1);
        //ALTERAR BITACORA______________________

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function get_categoria_id($ID_PREGUNTA)
    {

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_categoria WHERE id = '$ID_PREGUNTA'";
        $resultado = $this->db->query($sql);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $this->db = null;
    }
 
    public function obtenerCategoriaExistente($pregunta)
    {

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_categoria WHERE descripcion = '$pregunta'";
        $resultado = $this->db->query($sql);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $this->db = null;
    }

    public function UpdateCategoria($id, $Tcategoria, $descripcion){
        $this->db = getConexion();
        $sql = "UPDATE tbl_categoria SET id_tipo_categ ='$Tcategoria', descripcion='$descripcion' WHERE id='$id'";
        $this->db->query($sql);
        $this->db=null;
    }

    public function UpdateEmpresa($id, $tel, $eslogan, $nombre, $correo, $direccion, $rtn, $imagen1){
        $this->db = getConexion();
        $sql = "UPDATE tbl_config_empresa SET nombre ='$nombre', eslogan='$eslogan', rtn='$rtn', tel='$tel', correo='$correo', direccion='$direccion', logo = '$imagen1' WHERE id='$id'";
        $this->db->query($sql);
        $this->db=null;

        $modeloPrincipal = new ModeloPrincipal();

        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d-H:i:s");
        $IDUS = $_SESSION['id_usuario'];

        include '../Config/conn.php';

        $rs = mysqli_query($conn, "SELECT * FROM tbl_usuario where id_usuario = $IDUS");
        $row = mysqli_fetch_array($rs);
        $Usuarioo = $row['usuario'];

        $sql = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
        VALUES(null,'$fecha','$IDUS',18, 'EDITAR','$Usuarioo EDITÓ CONFIGURACIÓN DE LA EMPRESA')";
        $modeloPrincipal->insertargeneral($sql);
    }
}
?>
