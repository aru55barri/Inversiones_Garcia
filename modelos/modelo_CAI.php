<?php

    require_once '../config/conexion.php';

    class CAI{

        private $db;


        public function __construct(){
            require_once '../Config/Conexion.php';         
            $this->db = getConexion();
            $this->Modelo = array();
        }

        private function setNames(){
            return $this->db->query("SET NAMES 'utf8'");
        }

        //insertar datos de una tabla
        public function insertar($tabla, $data){
           $consulta="insert into ".$tabla." values(null,". $data .")";
           $resultado=$this->db->query($consulta);
           if ($resultado) {
               return true;
           }else {
               return false;
           }
       }

        public function insertargeneral($sql){
            
            $this->db = getConexion();
            $resultado=$this->db->query($sql);
            if ($resultado) {
                return true;
            }else {
                return false;
            }
        }

        public function obtenerCAI($id)
        {
            $this->db = getConexion();
            $this->setNames();
            $sql = "SELECT * from tbl_cai where id = $id;";
            $resultado = $this->db->query($sql);
            $fila = $resultado->fetch(PDO::FETCH_ASSOC);
            return $fila;
            $this->db = null;
        }

        public function EditarCAI($id, $rango_inicial,$rango_final,$rango_actual,$numero_CAI,$fecha_vencimiento)
        {
            $this->db = getConexion();
            $this->setNames();
            //$sql = "UPDATE tbl_proveedores SET NOMBRE_PROVEEDOR = '$nombreProveedor' WHERE ID_PROVEEDOR ='$id'";
            //$resultado = $this->db->query($sql);
            $sql = "UPDATE tbl_cai SET rango_inicial = '$rango_inicial', rango_final = '$rango_final', rango_actual= '$rango_actual', numero_CAI = '$numero_CAI' , fecha_vencimiento = '$fecha_vencimiento' WHERE id ='$id'";
            $resultado = $this->db->query($sql);
            //ALTERAR BITACORA______________________
            date_default_timezone_set('America/Mexico_City');
            $fecha = date("Y-m-d-H:i:s");
            $IDUSUARIO = $_SESSION['id_usuario'];


            include '../Config/conn.php';
        
            $rs = mysqli_query($conn, "SELECT * FROM tbl_usuario where id_usuario = $IDUSUARIO");
            $row = mysqli_fetch_array($rs);
            $Usuarioo = $row['usuario'];
    
            $sql1 = "INSERT INTO tbl_bitacora(id, FECHA, id_usuario, id_objeto, accion, descripcion)
               VALUES(null,'$fecha','$IDUSUARIO',22,'REGISTRO', '$Usuarioo EDITÓ UN CAI')";
            $this->db->query($sql1);
            //ALTERAR BITACORA______________________
    
            if($resultado){
                return true;
            }else{
                return false;
            }
        }

        public function eliminar($tabla, $condicion){
            try{
                $consulta="delete from ".$tabla." where ".$condicion;
                $resultado=$this->db->query($consulta);
                if ($resultado) {
                    return true;
                }
            }catch(Exception $e){
                return false;
            }
        }

        public function eliminarCAI($id)
        {
            $this->db = getConexion();
            $this->setNames();
            // $sql = "DELETE FROM tbl_contacto_proveedor WHERE ID_PROVEEDOR = '$id'";
            // $resultado = $this->db->query($sql);
            $sql = "DELETE FROM tbl_cai WHERE id = '$id'";
            $resultado = $this->db->query($sql);
            //ALTERAR BITACORA______________________
            date_default_timezone_set('America/Mexico_City');
            $fecha = date("Y-m-d-H:i:s");
            $IDUSUARIO = $_SESSION['id_usuario'];
        

            $sql1 = "INSERT INTO tbl_bitacora(id, FECHA, id_usuario, id_objeto, accion, descripcion)
            VALUES(null,'$fecha','$IDUSUARIO',22,'ELIMINAR', 'SE ELIMINO UN REGISTRO CAI')";
            $this->db->query($sql1);
            //ALTERAR BITACORA______________________


            if($resultado){
                return true;
            }else{
                return false;
            }
        }

    }


?>

