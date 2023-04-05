<?php
include_once "../Login/header.php";
include '../config/conn.php';


class tipo_producto
{
    private $db;
    private $tipoProducto;


    public function __construct()
    {
        $this->db = getConexion();
        $this->tipoProducto = array();

    }

    private function setNames()
    {
        return $this->db->query("SET NAMES 'utf8'");
    }

    public function get_tipoProducto(){

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_tipo_producto";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->tipoProducto[] = $resp;
        }

        return $this->tipoProducto;
        $this->db = null;
    }


    public function insert_producto($descripcion){

        $this->db = getConexion();
        self::setNames();
        $sql="INSERT INTO tbl_tipo_producto (descripcion) VALUES ('$descripcion')";
        $resultado = $this->db->query($sql);
        //ALTERAR BITACORA______________________
        $fecha = date("Y-m-d-H:i:s");
        $IDUSUARIO = $_SESSION['id_usuario'];
        
        $sql1 = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
        VALUES(null,'$fecha','$IDUSUARIO',28,'REGISTRO', 'SE CREO UN NUEVO REGISTRO EN TIPO PRODUCTO')";
     $this->db->query($sql1);
        //ALTERAR BITACORA______________________

        if ($resultado) {
            return true;
        }else{
            return false;
        }

        return $this->tipoProducto;
        $this->db = null;

    }

    public function editar_tipo_producto($id, $descripcion)
    {
        $this->db = getConexion();
        self::setNames();

        $sql = "UPDATE tbl_tipo_producto SET descripcion = '$descripcion' WHERE id = $id";
        $resultado = $this->db->query($sql);
        //ALTERAR BITACORA______________________
        $fecha = date("Y-m-d-H:i:s");
        $IDUSUARIO = $_SESSION['id_usuario'];

        $sql1 = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
        VALUES(null,'$fecha','$IDUSUARIO',28,'EDITAR', 'SE EDITO UN NUEVO REGISTRO EN TIPO PRODUCTO')";
     $this->db->query($sql1);
        //ALTERAR BITACORA______________________

        if ($resultado) {
            return true;
        } else {
            return false;
        }

        return $this->tipoProducto;
        $this->db = null;
    }

    public function delete_tipo_producto($id){

        $this->db = getConexion();
        self::setNames();
        $sql="DELETE FROM tbl_tipo_producto WHERE id = $id";
        /*$resultado = $this->db->query($sql);
        //ALTERAR BITACORA______________________
        $fecha = date("Y-m-d-H:i:s");
        $IDUSUARIO = $_SESSION['ID_USUARIO'];
        $sql1 = "INSERT INTO tbl_bitacora(ID_BITACORA, FECHA, ACCION, DESCRIPCION_BITACORA, ID_USUARIO, ID_OBJETO)
         VALUES(null,'$fecha','ELIMINAR','ELIMINO UN TIPO PRODUCTO ','$IDUSUARIO',31)";
        $this->db->query($sql1);
        //ALTERAR BITACORA______________________

        if ($resultado) {
            return true;
        }else{
            return false;
        }

        return $this->tipoProducto;
        $this->db = null;*/

        try {
            $this->db->query($sql);
        //ALTERAR BITACORA______________________
        $fecha = date("Y-m-d-H:i:s");
        $IDUSUARIO = $_SESSION['id_usuario'];
        $sql1 = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
        VALUES(null,'$fecha','$IDUSUARIO',28,'ELIMINAR', 'SE ELIMINO UN NUEVO REGISTRO EN TIPO PRODUCTO')";
     $this->db->query($sql1);
        //ALTERAR BITACORA______________________
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function get_tipo_producto_ID($id)
    {

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_tipo_producto WHERE id = $id";
        $resultado = $this->db->query($sql);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $this->db = null;
    }
}
?>