<?php 

require_once '../controladores/controlador_preguntas.php';

$pregunta = $_REQUEST['pregunta'];
$preguntas = obtenerPreguntaExistente($pregunta);

if($preguntas == null)
{
    echo "Pregunta Disponible";
    
}
else
{
    echo "Pregunta No Disponible";
}

?>