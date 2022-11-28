<?php 

require_once '../controladores/controlador_roles.php';

$rol = $_REQUEST['rol'];
$roles = obtenerRolExistente($rol);

if($roles == null)
{
    echo "Rol Disponible";
    
}
else
{
    echo "Rol No Disponible";
}

?>