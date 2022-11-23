<?php
    class ModeloInventario{
        private $Modelo;
        private $db;
        private $datos;
        private $usuario;

        public function __construct(){
            require_once '../config/conex.php';         
            $this->db = getConexion();
            $this->Modelo = array();
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
        //insertar datos de una tabla
        public function insertargeneral($sql){
            
           $this->db = getConexion();
           $resultado=$this->db->query($sql);
           if ($resultado) {
               return true;
           }else {
               return false;
           }
       }

        //mostrar datos de una tabla
        public function mostrar($tabla,$condicion){
            $consul="select * from ".$tabla." where ".$condicion.";";
            $resu=$this->db->query($consul);
            while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
                $this->datos[]=$filas;
            }
            return $this->datos;
        }

        //mostrar datos de una tabla general Cesia Nelson
        public function mostrargeneral($consulta){
            $resu=$this->db->query($consulta);
            while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
                $this->datos[]=$filas;
            }
            return $this->datos;
        }

        //actualizar datos de una tabla
        public function actualizar($tabla, $data, $condicion){       
            $consulta="update ".$tabla." set ". $data ." where ".$condicion;
            $resultado=$this->db->query($consulta);
            if ($resultado) {
                return true;
            }else {
                return false;
            }
        }
        //actualizar empleados nelson
        public function InsertarUpdateInventario($id, $cantidad,$descripcion, $produ,$producto){
            $this->db = getConexion();
            $sql = "UPDATE tbl_inventario
            SET CAN_EXISTENCIA='$cantidad', DESCRIPCION_INVENTARIO='$descripcion', INV_PRODUCCION='$produ', ID_PRODUCTO='$producto' WHERE ID_INVENTARIO='$id'";
             $this->db->query($sql);
             $this->db=null;
        }
        
        //eliminar datos de una tabla cesia Nelson
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

        public function obtenerInventario($id)
        {
            
            $this->db = getConexion();
           
            $stm = $this->db->query("SELECT * FROM tbl_inventario WHERE ID_INVENTARIO = '$id'");
            foreach ($stm as $re) {
                $this->usuario[] = $re;
            }
    
            return $this->usuario;
            $this->db = null;
        }

            //funcion obtener proveedores, nuevo_editar compra  
        public function obtenerProducto()
        {
            $this->db = getConexion();
           
            $sql = "SELECT *  from tbl_producto";
            $empleados = $this->db->query($sql);
            return $empleados;
            $this->db = null;
        }
   
        
    }
?>