<?php

require_once '../config/conexion.php';

class parametros
{
    private $db;
    private $parametros;


    public function __construct()
    {
        $this->db = getConexion();
        $this->parametros = array();
    }

    private function setNames()
    {
        return $this->db->query("SET NAMES 'utf8'");
    }

    public function get_parametro()
    {

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_parametros";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->parametros[] = $resp;
        }

        return $this->parametros;
        $this->db = null;
    }

    public function insert_parametros($PARAMETRO, $VALOR, $FECHA_CREACION, $FECHA_MODIFICACION)
    {

        $this->db = getConexion();
        self::setNames();
        //OBTENER ULTIMO ID USUARIO
        $IDUSUARIO = $this->obtenerUltimousuarioID();
        $sql = "INSERT INTO tbl_parametros (PARAMETRO,VALOR,fecha_creacion,FECHA_MODIFICACION,ID_USUARIO) VALUES ('$PARAMETRO','$VALOR','$FECHA_CREACION','$FECHA_MODIFICACION','$IDUSUARIO')";
        $resultado = $this->db->query($sql);

        //ALTERAR BITACORA______________________
        $fecha = date("Y-m-d-H:i:s");
        $IDUSUARIO = $_SESSION['ID_USUARIO'];
        $sql1 = "INSERT INTO tbl_bitacora(ID, FECHA, ACCION, DESCRIPCION, ID_USUARIO, ID_OBJETO)
           VALUES(null,'$fecha','REGISTRO','SE CREO UN NUEVO REGISTRO EN PARAMETROS','$IDUSUARIO',27)";
        $this->db->query($sql1);
       //ALTERAR BITACORA______________________

        if ($resultado) {
            return true;
        } else {
            return false;
        }

        return $this->parametros;
        $this->db = null;
    }
    //FUNCION OBTENER ID USUARIO
    public function obtenerUltimousuarioID()
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT max(ID_USUARIO) AS ID_USUARIO from tbl_usuario";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->parametros[] = $resp;
        }

        return $this->parametros[0]['ID_USUARIO'];
        $this->db = null;
    }

    public function delete_parametro($id){

        $this->db = getConexion();
        $this->setNames();
       // $sql = "DELETE FROM tbl_contacto_proveedor WHERE ID_PROVEEDOR = '$id'";
       // $resultado = $this->db->query($sql);
        $sql = "DELETE FROM tbl_parametros WHERE id = '$id'";
        $resultado = $this->db->query($sql);
        //ALTERAR BITACORA______________________
        $fecha = date("Y-m-d-H:i:s");
        $IDUSUARIO = $_SESSION['id_usuario'];

     $sql1 = "INSERT INTO tbl_bitacora(id, FECHA, id_usuario, id_objeto, accion, descripcion)
     VALUES(null,'$fecha','$IDUSUARIO',33,'REGISTRO', 'SE ELIMINO UN PARAMETRO')";
        $this->db->query($sql1);
        //ALTERAR BITACORA______________________


        if ($resultado) {
            return true;
        }else{
            return false;
        }

        return $this->parametros;
        $this->db = null;
    }

    public function get_parametro_ID($id)
    {

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_parametros WHERE id = $id";
        $resultado = $this->db->query($sql);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $this->db = null;
    }

    public function editar_parametro($id,$parametro,$valor,$fecha_creacion,$fecha_modificacion)
    {
        $this->db = getConexion();
        $this->setNames();
        $IDUSUARIO = $_SESSION['id_usuario'];

        $sql = "UPDATE tbl_parametros SET parametro = '$parametro', valor = '$valor', fecha_creacion = '$fecha_creacion', fecha_modificacion = '$fecha_modificacion' WHERE id = '$id'";
        $resultado = $this->db->query($sql);
        //ALTERAR BITACORA______________________
        $fecha = date("Y-m-d-H:i:s");
        $sql1 = "INSERT INTO tbl_bitacora(id, FECHA, id_usuario, id_objeto, accion, descripcion)
        VALUES(null,'$fecha','$IDUSUARIO',33,'REGISTRO', 'SE CREO UN NUEVO REGISTRO EN PARAMETROS')";
        $this->db->query($sql1);
        //ALTERAR BITACORA______________________

        if ($resultado) {
            return true;
        } else {
            return false;
        }

        return $this->parametros;
        $this->db = null;
    }

    public function obtenerParametroExistente($parametro)
    {

        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT * FROM tbl_parametros WHERE parametro = '$parametro'";
        $resultado = $this->db->query($sql);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $this->db = null;
    }
}
?>