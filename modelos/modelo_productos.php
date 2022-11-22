<?php
    class ModeloProducto{
        private $Modelo;
        private $db;
        private $datos;
        private $usuario;

        public function __construct(){
            require_once '../Config/Conexion.php';         
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

        //validacion para eliminar cesia
        public function mostrartipo($id){
            $consul="select * from tbl_usuarios where ID_USUARIO = '$id'";
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
        public function Updateproducto($id, $descripcion, $categ, $tipo, $precio, $cant_minima, $cant_maxima, $estado){
            $this->db = getConexion();
            $sql = "UPDATE tbl_producto
            SET id_categoria ='$categ', id_tipo_producto ='$tipo', descripcion='$descripcion', precio_venta='$precio', cantidad_minima='$cant_minima', cantidad_maxima='$cant_maxima', estado='$estado' WHERE codproducto='$id'";
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

            //MOSTRAR USUARIOS ACTIVOS
        public function UsuarioMantenimiento($tabla,$condicion){
            $consul="select * from ".$tabla." where ".$condicion.";";
            $resu=$this->db->query($consul);
            while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
                $this->datos[]=$filas;
            }
            return $this->datos;

        }

        // $eli="delete from ".$tabla." where ".$condicion;
        // $res=$this->db->query($eli);
        // if ($res) {
        //     return true; 
        // }else {
        //     return false;
        // }

        public function obtenerProducto($id)
        {
            
            $this->db = getConexion();
           
            $stm = $this->db->query("SELECT * FROM tbl_producto WHERE codproducto = '$id'");
            foreach ($stm as $re) {
                $this->usuario[] = $re;
            }
    
            return $this->usuario;
            $this->db = null;
        }

        
        public function eliminarProducto($id)
    {
        $this->db = getConexion();
       
        $sql = "DELETE FROM tbl_producto WHERE codproducto = '$id'";
       
        try {
            $this->db->query($sql);
            //ALTERAR BITACORA______________________
            $fecha = date("Y-m-d-H:i:s");
            $IDUSUARIO = $_SESSION['id_usuario'];
            $sql1 = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
            VALUES(null,'$fecha','$IDUSUARIO',7,'ELIMINAR','SE ELIMINO UN PRODUCTO ')";
            $this->db->query($sql1);
            //ALTERAR BITACORA______________________
            return true;
        } catch (Exception $e) {
            return false;
        }
    }


            //funcion obtener proveedores, nuevo_editar compra  
        public function obtenerTipo()
        {
            $this->db = getConexion();
           
            $sql = "SELECT *  from tipo_producto";
            $empleados = $this->db->query($sql);
            return $empleados;
            $this->db = null;
        }
        public function obtenerCateg()
        {
            $this->db = getConexion();
           
            $sql = "SELECT *  from tbl_categoria";
            $empleados = $this->db->query($sql);
            return $empleados;
            $this->db = null;
        }
       /* public function obtenerEstado()
        {
            $this->db = getConexion();
            
            $sql = "SELECT *  from tbl_estado_producto";
            $usuario = $this->db->query($sql);
            return $usuario;
            $this->db = null;
        }*/
   
        
    }
?>