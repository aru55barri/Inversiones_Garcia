<?php

require_once '../config/conexion.php';

class bitacora
{
    private $db;
    private $bitacora;


    public function __construct()
    {
        $this->db = getConexion();
        $this->bitacora = array();

    }

    private function setNames()
    {
        return $this->db->query("SET NAMES 'utf8'");
    }

    public function get_bitacora(){

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT b.id as id, b.fecha AS fecha, b.fecha AS fecha, u.usuario AS id_usuario, m.Objeto AS id_objeto, b.accion AS accion, b.descripcion AS descripcion FROM tbl_bitacora as b inner join tbl_usuario as u on b.id_usuario = u.id_usuario inner join tbl_modulos as m on b.id_objeto = m.id_objeto;";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->bitacora[] = $resp;
        }

        return $this->bitacora;
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

        return $this->bitacora;
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

        return $this->bitacora;
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

        return $this->bitacora;
        $this->db = null;
    }

    public function get_tipo_producto_ID($ID_TIP_PRODUCTO)
    {

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_tipo_productos WHERE ID_TIP_PRODUCTO = $ID_TIP_PRODUCTO";
        $resultado = $this->db->query($sql);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $this->db = null;
    }
    */
}
?>