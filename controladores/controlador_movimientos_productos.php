<?php
include_once('../Login/header.php');
include_once '../modelos/modelo_principal.php';

if (isset($_GET['idusuario']) && isset($_GET['idempleado'])) {
    UsuariosContralador::eliminarUsuario($_GET['idusuario'], $_GET['idempleado']);
}

if (isset($_GET['buscar'])) {
    echo json_encode([
        'usuario' => 'juan'
    ]);
}

class Contralador
{
    public $data;
    public  $matriz;

    public function __construct()
    {
        $this->data = new ModeloPrincipal();
    }

    //funcion para mostrar
    static public function mostrar($id)
    {

        $data = new ModeloPrincipal();
        $matriz = $data->mostrargeneral("select tk.*,ttk.nombre_movimiento,tp.descripcion,tu.nombre  from tbl_kardex tk inner join tbl_movimiento ttk on tk.id_movimiento = ttk.id inner join tbl_producto tp on tk.id_producto = tp.codproducto inner join tbl_usuario tu on tk.ID_USUARIO = tu.ID_USUARIO where tk.ID_PRODUCTO = '$id'" , "1");
        foreach ($matriz as $key => $value) {
            foreach ($value as $registro) {  ?>
                <tr>
                <td><?= $registro['id'] ?></td>
                <td><span class="<?=$registro['nombre_movimiento'] == 'ENTRADAS' ? 'badge badge-primary' : 'badge badge-warning'?> badge badge-primary"><?=$registro['nombre_movimiento']?></span></td>
                <td><?=$registro['cantidad']?></td>
                <td><?=$registro['descripcion']?></td>
                <td><?=$registro['nombre']?></td>
                <td><?=$registro['fecha']?></td>
                </tr>
          <?php  }
            // Inicio vista en bitacora al mostrar usuarios Joel Montoya
            $modeloPrincipal = new ModeloPrincipal();
            $fecha = date("Y-m-d-H:i:s");
            $IDUS = $_SESSION['id_usuario'];

            $sql = "INSERT INTO tbl_bitacora(ID, FECHA, ACCION, DESCRIPCION, ID_USUARIO, ID_OBJETO)
         VALUES(null,'$fecha','INGRESO','EL USUARIO INGRESA A TABLA OBJETOS','$IDUS',2)";
            $modeloPrincipal->insertargeneral($sql);
            // FIN vista en bitacora al mostrar usuarios Joel Montoya
        }
    }

 

}
