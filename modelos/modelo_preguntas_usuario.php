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

    public function get_pregunta_usuario(){

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT pU.RESPUESTA as RESPUESTA, p.PREGUNTA AS PREGUNTA, u.USUARIO AS USUARIO
        FROM tbl_preguntas_usuario as pU inner join tbl_usuario as u on pU.ID_USUARIO = u.ID_USUARIO 
        inner join tbl_preguntas as p on pU.ID_PREGUNTA = p.ID_PREGUNTA;";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->Pregunta[] = $resp;
        }

        return $this->Pregunta;
        $this->db = null;
    }
/*
    public function insert_producto($DESCRIPCION_TIPO_PRODUCTO){

        $this->db = getConexion();
        self::setNames();
        $sql="INSERT INTO tbl_tipo_productos (DESCRIPCION_TIP_PRODUCTO) VALUES ('$DESCRIPCION_TIPO_PRODUCTO')";
        $resultado = $this->db->query($sql);

        if ($resultado) {
            return true;
        }else{
            return false;
        }

        return $this->Pregunta;
        $this->db = null;

    }

    public function editar_tipo_producto($ID_TIP_PRODUCTO, $DESCRIPCION_TIP_PRODUCTO)
    {
        $this->db = getConexion();
        self::setNames();

        $sql = "UPDATE tbl_tipo_productos SET DESCRIPCION_TIP_PRODUCTO = '$DESCRIPCION_TIP_PRODUCTO' WHERE ID_TIP_PRODUCTO = $ID_TIP_PRODUCTO";
        $resultado = $this->db->query($sql);

        if ($resultado) {
            return true;
        } else {
            return false;
        }

        return $this->Pregunta;
        $this->db = null;
    }

    public function delete_tipo_producto($ID_TIP_PRODUCTO){

        $this->db = getConexion();
        self::setNames();
        $sql="DELETE FROM tbl_tipo_productos WHERE ID_TIP_PRODUCTO = $ID_TIP_PRODUCTO";
        $resultado = $this->db->query($sql);

        if ($resultado) {
            return true;
        }else{
            return false;
        }

        return $this->Pregunta;
        $this->db = null;
    }

    public function get_tipo_producto_ID($ID_TIP_PRODUCTO)
    {

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_tipo_producto WHERE ID_TIP_PRODUCTO = $ID_TIP_PRODUCTO";
        $resultado = $this->db->query($sql);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $this->db = null;
    }
    */
}
?>