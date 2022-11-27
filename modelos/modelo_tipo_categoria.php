<?php

    require_once '../config/conexion.php';

    class Cliente{

        private $db;
        private $clientes;
        private $idclientes;

    public function __construct(){
        $this->clientes = array();
        
    }

    private function setNames(){
        return $this->db->query("SET NAMES 'utf8'");
    }

    public function ListarCliente(){
        $this->db = getConexion();
        $this->setNames();
        $sql = "select * from tbl_cliente";
        $resultado = $this->db->query($sql);
        while ($filas = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->clientes[] = $filas;    
        }
        return $this->clientes;
        $this->db=null;
    }
    //FUNCION PARA INSERTAR PROVEEDORES---KEVIN
    public function InsertarCliente($nombre) //////////////////////////////////////////////////////////////////////////////
    {
        $this->db = getConexion();
        $this->setNames();
        $IDUSUARIO = $_SESSION['id_usuario'];
       // $sql = "INSERT into tbl_proveedores (NOMBRE_PROVEEDOR) VALUES ('$nombre')";
       // $resultado = $this->db->query($sql);
        $id=$this->obtenerUltimoProveedorID();   
        $sql = "INSERT into tipo_categoria (descripcion	) VALUES ('$nombre')";
        $resultado = $this->db->query($sql);
         //ALTERAR BITACORA______________________
         $fecha = date("Y-m-d-H:i:s");
      
         $sql1 = "INSERT INTO tbl_bitacora(id, FECHA, id_usuario, id_objeto, accion, descripcion)
            VALUES(null,'$fecha','$IDUSUARIO',33,'REGISTRO', 'SE CREO UN NUEVO REGISTRO EN TIPO CATEGORIA')";
         $this->db->query($sql1);
         //ALTERAR BITACORA______________________
 

        if($resultado){
            return true;
        }else{
            return false;
        }
    }

    //OBTENER EL ULTIMO ID PROVEEDOR INGRESADO
    public function obtenerUltimoProveedorID()
    {
        $this->db = getConexion();
        self::setNames();
        $sql = "SELECT max(idcliente) AS idcliente from tbl_cliente";
        $resultado = $this->db->query($sql);

        foreach ($resultado as $resp) {
            $this->idclientes[] = $resp;
        }

        return $this->idclientes[0]['idcliente'];
        $this->db = null;
    }

    //FUNCON PARA EDITAR PROVEEDORES---KEVIN
    public function EditarCliente($id,$nombre)
    {
        $this->db = getConexion();
        $this->setNames();
        //$sql = "UPDATE tbl_proveedores SET NOMBRE_PROVEEDOR = '$nombreProveedor' WHERE ID_PROVEEDOR ='$id'";
        //$resultado = $this->db->query($sql);
        $sql = "UPDATE tipo_categoria SET descripcion = '$nombre' WHERE id ='$id'";
        $resultado = $this->db->query($sql);
        //ALTERAR BITACORA______________________
        $fecha = date("Y-m-d-H:i:s");
        $IDUSUARIO = $_SESSION['id_usuario'];

        $sql1 = "INSERT INTO tbl_bitacora(id, FECHA, id_usuario, id_objeto, accion, descripcion)
           VALUES(null,'$fecha','$IDUSUARIO',33,'REGISTRO', 'SE EDITO UN TIPO CATEGORIA')";
        $this->db->query($sql1);
        //ALTERAR BITACORA______________________

        if($resultado){
            return true;
        }else{
            return false;
        }
    }

    //FUNCION PARA ELIMINAR UN PROVEEDOR--KEVIN
    public function eliminarCliente($id)
    {
        $this->db = getConexion();
        $this->setNames();
       // $sql = "DELETE FROM tbl_contacto_proveedor WHERE ID_PROVEEDOR = '$id'";
       // $resultado = $this->db->query($sql);
        $sql = "DELETE FROM tbl_cliente WHERE idcliente = '$id'";
        $resultado = $this->db->query($sql);
        //ALTERAR BITACORA______________________
        $fecha = date("Y-m-d-H:i:s");
        $IDUSUARIO = $_SESSION['id_usuario'];

     $sql1 = "INSERT INTO tbl_bitacora(id, FECHA, id_usuario, id_objeto, accion, descripcion)
     VALUES(null,'$fecha','$IDUSUARIO',33,'REGISTRO', 'SE ELIMINO UN CLIENTE')";
        $this->db->query($sql1);
        //ALTERAR BITACORA______________________


        if($resultado){
            return true;
        }else{
            return false;
        }
    }

    //FUNCION PARA OBTENER UN PROVEEDOR
    public function obtenerUnCliente($id)
    {
        $this->db = getConexion();
        $this->setNames();
        $sql = "SELECT * from tipo_categoria where id = $id;";
        $resultado = $this->db->query($sql);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $this->db = null;
    }

    //FUNCION QUE DEVUELVE SI YA EXISTE UN PROVEEDOR EXISTENTE
    public function obtenerProveedorExistente($proveedor)
    {
        $this->db = getConexion();
        $this->setNames();
        $sql = "SELECT * FROM tbl_proveedores WHERE NOMBRE_PROVEEDOR = '$proveedor'";
        $resultado = $this->db->query($sql);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $this->db = null;
    }

    //FUNCION QUE DEVUELVE SI YA EXISTE UN PROVEEDOR EXISTENTE
    public function obtenerCorreoExistente($correo)
    {
        $this->db = getConexion();
        $this->setNames();
        $sql = "SELECT * FROM tbl_contacto_proveedor WHERE CORREO = '$correo'";
        $resultado = $this->db->query($sql);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $this->db = null;
    }

}