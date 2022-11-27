<?php

require_once '../config/conex.php';

class ajustes
{
    private $db;

    public function __construct()
    {
        $this->db = getConexion();
    }

    private function setNames()
    {
        return $this->db->query("SET NAMES 'utf8'");
    }

    public function generarRespaldoBD2()
    {
        $this->db = getConexion();
        self::setNames();
        $tablasRespaldar = [];
        $tablas = $this->db->query("SHOW TABLES");
        foreach($tablas as $tabla){
            $tablasRespaldar[] = $tabla[0];
        }

        $nombreRespaldo = "BackupInversionesGarcia__" . date("Y-m-d__H-i-s") .".sql";
        $contenido = "";
        $contenido .= "-- Respaldo de la base de datos Inversiones Garcia\n";
        $contenido .= "-- Fecha: " . date("Y-m-d H:i:s") . "\n";
        $contenido .= "-- Inversiones Garcia\n\n";
        $contenido .= "-- --------------------------------------------------------\n";
        $contenido .= "-- --------------------------------------------------------\n\n";
        $contenido .= "CREATE DATABASE IF NOT EXISTS bd_inversiones_garcia DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;\n\n";
        $contenido .= "USE bd_inversiones_garcia;\n\nSET FOREIGN_KEY_CHECKS = 0;\n\n";
        $contenido .= "-- --------------------------------------------------------\n";
        $contenido .= "-- --------------------------------------------------------\n\n";

        foreach($tablasRespaldar as $tabla)
        {
            $contenido .= "--\n";
            $contenido .= "-- Estructura de la tabla `$tabla`\n";
            $contenido .= "--\n";
            $contenido .= "DROP TABLE IF EXISTS $tabla;\n";
            $consulta = $this->db->query("SHOW CREATE TABLE `$tabla`");
            $contenido .= $consulta->fetch(PDO::FETCH_NUM)[1] . ";\n\n";
            $contenido .= "--\n";
            $contenido .= "-- Registros de la tabla `$tabla`\n";
            $contenido .= "--\n";
            $consulta = $this->db->query("SELECT * FROM `$tabla`");
            foreach($consulta as $registro)
            {
                $contenido .= "INSERT INTO `$tabla` VALUES(";
                for($i = 0; $i < count($registro)/2; $i++)
                {
                    $contenido .= "'" . $registro[$i] . "',";
                }
                $contenido = substr($contenido, 0, -1);
                $contenido .= ");\n";
            }
            $contenido .= "\n";
        }
        $contenido .= "-- --------------------------------------------------------\n\nSET FOREIGN_KEY_CHECKS = 1;\n\n";
        $contenido .= "-- --------------------------------------------------------\n";
        $contenido = str_replace("ã±", "ñ", $contenido);
        $contenido = str_replace("Ã", "Ñ", $contenido);
        $archivo = fopen($nombreRespaldo, "w");
        fwrite($archivo, $contenido);
        fclose($archivo);

        $ubicacionActual = "../src/";
        $nuevaUbicacion = "../config/Respaldos/";

        rename($ubicacionActual . $nombreRespaldo, $nuevaUbicacion . $nombreRespaldo);
    }




    public function generarRespaldoBD()
    {
        date_default_timezone_set('America/Tegucigalpa');
        $this->db = getConexion();

        $db_host = "localhost"; //Host del Servidor MySQL
        $db_name = "bd_inversiones_garcia"; //Nombre de la Base de datos
        $db_user = "root"; //Usuario de MySQL
        $db_pass = "X3p0-x"; //Password de Usuario MySQL

        $fecha = date("Y-m-d_His"); //Obtenemos la fecha y hora para identificar el respaldo

        $salida_sql = "BackupInversionesGarcia_".date("Y-m-d_His").".sql";
        
        
        $dump = 'C:\xampp\mysql\bin\mysqldump '. $db_name .' -u '. $db_user .' -p'.$db_pass.' > '. $salida_sql;

        exec($dump); //Ejecutamos el comando para respaldo


         //local 
        $to="../src/".$salida_sql;
        $destino ='../config/Respaldos/'.$salida_sql;   
        rename($to,$destino);
       
    }
    public function restaurarBD($nombreRespaldo)
    {
        $this->db = getConexion();
        self::setNames();
        $contenido = file_get_contents("../config/Respaldos/" . $nombreRespaldo);
        $contenido = explode(";", $contenido);
        foreach ($contenido as $consulta) {
            $this->db->query($consulta);
        }

    }

    public function obtenerNombresArchivosRespaldo()
    {
        $this->db = getConexion();
        self::setNames();
        $nombresArchivos = [];
        $directorio = opendir("../config/Respaldos/");
        while ($archivo = readdir($directorio)) {
            if ($archivo != "." && $archivo != "..") {
                $nombresArchivos[] = $archivo;
            }
        }
        closedir($directorio);
        return $nombresArchivos;
    }

    public function obtenerNombresArchivosRespaldoUltimo()
    {
        $this->db = getConexion();
        self::setNames();
        $nombresArchivos = [];
        $directorio = opendir("../config/Respaldos/");
        while ($archivo = readdir($directorio)) {
            if ($archivo != "." && $archivo != "..") {
                $nombresArchivos[0] = $archivo;
            }
        }
        closedir($directorio);
        return $nombresArchivos;
    }
    
}

?>