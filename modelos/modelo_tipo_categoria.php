<?php

require_once '../config/conexion.php';

class tipocat
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

    public function get_pregunta(){

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tipo_categoria";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->Pregunta[] = $resp;
        }

        return $this->Pregunta;
        $this->db = null;
    }


    public function insert_tipoca($PREGUNTA){

        $this->db = getConexion();
        self::setNames();
        $sql="INSERT INTO tipo_categoria (descripcion) VALUES ('$PREGUNTA')";
        $resultado = $this->db->query($sql);
        //ALTERAR BITACORA______________________
        $fecha = date("Y-m-d-H:i:s");
        $IDUSUARIO = $_SESSION['id_usuario'];

       $sql1 = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
        VALUES(null,'$fecha','$IDUSUARIO',28,'REGISTRO', 'SE CREO UN NUEVO REGISTRO EN TIPO CATEGORIA')";
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

    public function editar_tipoca($ID_PREGUNTA,$Pregunta)
    {
        $this->db = getConexion();
        self::setNames();

        $sql = "UPDATE tipo_categoria SET descripcion = '$Pregunta'  WHERE id = '$ID_PREGUNTA'";
        $resultado = $this->db->query($sql);
        //ALTERAR BITACORA______________________
        $fecha = date("Y-m-d-H:i:s");
        $IDUSUARIO = $_SESSION['id_usuario'];

        $sql1 = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
        VALUES(null,'$fecha','$IDUSUARIO',28,'EDITAR', 'SE EDITO UN NUEVO REGISTRO EN TIPO CATEGORIA')";
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

    public function delete_tipoca($ID_PREGUNTA){

        $this->db = getConexion();
        self::setNames();
        $sql="DELETE FROM tipo_categoria WHERE id = $ID_PREGUNTA";
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
        VALUES(null,'$fecha','$IDUSUARIO',28,'ELIMINAR', 'SE ELIMINO UN NUEVO REGISTRO EN TIPO CATEGORIA')";
     $this->db->query($sql1);
        //ALTERAR BITACORA______________________

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function get_tipoca($ID_PREGUNTA)
    {

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tipo_categoria WHERE id = '$ID_PREGUNTA'";
        $resultado = $this->db->query($sql);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $this->db = null;
    }
 
    public function obtenertipocaExistente($pregunta)
    {

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tipo_categoria WHERE descripcion = '$pregunta'";
        $resultado = $this->db->query($sql);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $this->db = null;
    }


}
?>
