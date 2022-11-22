<?php

include_once '../modelos/modelo_principal.php';



class Controlador
{
    public $ventas;
    public  $matriz;
    
   

    public function __construct()
    {
        $this->ventas = new ModeloPrincipal();
    }


    
      
 //funcion para mostrar
    static public function mostrar($id)
    {

        $ventas = new ModeloPrincipal();
        $matriz = $ventas->mostrargeneral("select tdc.*,tp.descripcion  from tbl_detalle_factura tdc inner join tbl_producto tp on tdc.codproducto = tp.codproducto where tdc.id_factura = $id");
$i=1;
    foreach ($matriz as $key => $value) {
            foreach ($value as $registro) {
                
                
                echo "<tr>";
                echo "<th>" . $i . "</th>";
                echo "<th>" . $registro['descripcion'] . "</th>";
                echo "<th>" . $registro['cantidad'] . "</th>";
                echo "<th>" . $registro['precio'] . "</th>";
                echo "</tr>";
             $i++;   
            }
            // Inicio vista en bitacora al mostrar empleados Joel Montoya
        $modeloPrincipal = new ModeloPrincipal();
        $fecha=date("Y-m-d-H:i:s");
        $IDUS=$_SESSION['id_usuario'];
        
        $sql="INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
        VALUES(null,'$fecha','$IDUS',3,'INGRESO','EL USUARIO INGRESA A TABLA DETALLE VENTA')";
        $modeloPrincipal->insertargeneral($sql);
    // FIN vista en bitacora al mostrar empleados Joel Montoya
        
    }
    
    } 



 
}

 
