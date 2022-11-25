<?php

require_once '../config/conexion.php';

class Pregunta
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
        $sql = "SELECT * FROM tbl_preguntas";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->Pregunta[] = $resp;
        }

        return $this->Pregunta;
        $this->db = null;
    }


    public function insert_pregunta($PREGUNTA){

        $this->db = getConexion();
        self::setNames();
        $sql="INSERT INTO tbl_preguntas (pregunta) VALUES ('$PREGUNTA')";
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

    public function editar_pregunta($ID_PREGUNTA,$Pregunta)
    {
        $this->db = getConexion();
        self::setNames();

        $sql = "UPDATE tbl_preguntas SET pregunta = '$Pregunta'  WHERE id_pregunta = '$ID_PREGUNTA'";
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

    public function delete_pregunta($ID_PREGUNTA){

        $this->db = getConexion();
        self::setNames();
        $sql="DELETE FROM tbl_preguntas WHERE id_pregunta = $ID_PREGUNTA";
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

    public function get_pregunta_ID($ID_PREGUNTA)
    {

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_preguntas WHERE id_pregunta = '$ID_PREGUNTA'";
        $resultado = $this->db->query($sql);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $this->db = null;
    }
 
    public function obtenerPreguntaExistente($pregunta)
    {

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_preguntas WHERE pregunta = '$pregunta'";
        $resultado = $this->db->query($sql);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $this->db = null;
    }


}
?>
