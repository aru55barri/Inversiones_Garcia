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


    }
?>

