<?php

    require_once '../config/conexion.php';

    class CAI{

        private $db;

    public function __construct(){
        $this->CAI = array();
        
    }

    private function setNames(){
        return $this->db->query("SET NAMES 'utf8'");
    }

    

}
