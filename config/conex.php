<?php 

    $db;

    function __construct()
    {
       
    }

     function getConexion()
    {
        //$db = new PDO('mysql:host=database-servicioycolor.czrjcihyornw.us-east-2.rds.amazonaws.com:3306;dbname=servicio_color', 'admin', 'ServicioyColor2022');
        //$db = new PDO('mysql:host=82.180.174.205:3306;dbname=u327975140_servicio_color', 'u327975140_admin', 'ServicioyColor2022');
        
        $db = new PDO('mysql:host=localhost:3306;dbname=bd_inversiones_garcia-v1', 'root', 'X3p0-x');
        return $db;
    }
    //$conn = mysqli_connect('database-servicioycolor.czrjcihyornw.us-east-2.rds.amazonaws.com:','admin','ServicioyColor2022','servicio_color');
    //$conn = mysqli_connect('82.180.174.205','u327975140_admin','ServicioyColor2022','u327975140_servicio_color');
    $conn = mysqli_connect('localhost','root','X3p0-x','bd_inversiones_garcia-v1');
?>