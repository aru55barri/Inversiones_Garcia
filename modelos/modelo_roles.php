<?php

require_once '../config/conexion.php';

class rol
{
    private $db;
    private $rol;


    public function __construct()
    {
        $this->db = getConexion();
        $this->rol = array();

    }

    private function setNames()
    {
        return $this->db->query("SET NAMES 'utf8'");
    }

    public function get_rol(){

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_roles";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->rol[] = $resp;
        }

        return $this->rol;
        $this->db = null;
    }


    public function insert_rol($ROL,$DESCRIPCION){

        $this->db = getConexion();
        self::setNames();
        $sql="INSERT INTO tbl_roles (rol,descripcion) VALUES ('$ROL','$DESCRIPCION')";
        $resultado = $this->db->query($sql);
        //ALTERAR BITACORA______________________
        $fecha = date("Y-m-d-H:i:s");
        $IDUSUARIO = $_SESSION['id_usuario'];
        $sql1 = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
        VALUES(null,'$fecha','$IDUSUARIO',17,'REGISTRO', 'SE CREO UN NUEVO REGISTRO EN ROLES')";
     $this->db->query($sql1);
        //ALTERAR BITACORA______________________

        if ($resultado) {
            return true;
        }else{
            return false;
        }

        return $this->rol;
        $this->db = null;

    }

    public function editar_rol($ID_ROL,$ROL, $DESCRIPCION)
    {
        $this->db = getConexion();
        self::setNames();

        $sql = "UPDATE tbl_roles SET rol = '$ROL', descripcion = '$DESCRIPCION' WHERE id_rol = $ID_ROL";
        $resultado = $this->db->query($sql);
        //ALTERAR BITACORA______________________
        $fecha = date("Y-m-d-H:i:s");
        $IDUSUARIO = $_SESSION['id_usuario'];
        $sql1 = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
        VALUES(null,'$fecha','$IDUSUARIO',17,'EDITAR', 'SE EDITO UN NUEVO REGISTRO EN PREGUNTAS')";
     $this->db->query($sql1);
        //ALTERAR BITACORA______________________

        if ($resultado) {
            return true;
        } else {
            return false;
        }

        return $this->rol;
        $this->db = null;
    }

    public function delete_rol($ID_ROL){

        $this->db = getConexion();
        self::setNames();
        $sql="DELETE FROM tbl_roles WHERE id_rol = $ID_ROL";
        /*$resultado = $this->db->query($sql);
        //ALTERAR BITACORA______________________
        $fecha = date("Y-m-d-H:i:s");
        $IDUSUARIO = $_SESSION['ID_USUARIO'];
        $sql1 = "INSERT INTO tbl_bitacora(ID_BITACORA, FECHA, ACCION, DESCRIPCION_BITACORA, ID_USUARIO, ID_OBJETO)
         VALUES(null,'$fecha','ELIMINAR','ELIMINO UN ROL ','$IDUSUARIO',29)";
        $this->db->query($sql1);
        //ALTERAR BITACORA______________________

        if ($resultado) {
            return true;
        }else{
            return false;
        }

        return $this->rol;
        $this->db = null;*/

        try {
            $this->db->query($sql);
            //ALTERAR BITACORA______________________
            $fecha = date("Y-m-d-H:i:s");
            $IDUSUARIO = $_SESSION['id_usuario'];
            $sql1 = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
            VALUES(null,'$fecha','ELIMINAR','ELIMINO UN ROL ','$IDUSUARIO',17)";
            $this->db->query($sql1);
            //ALTERAR BITACORA______________________
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function get_rol_ID($ID_ROL)
    {

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_roles WHERE id_rol = '$ID_ROL'";
        $resultado = $this->db->query($sql);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $this->db = null;
    }
 
    public function obtenerRolExistente($rol)
    {

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_roles WHERE rol = '$rol'";
        $resultado = $this->db->query($sql);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $this->db = null;
    }


}
?>