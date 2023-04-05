<?php
include_once "../Login/header.php";
require_once '../config/conex.php';
include_once '../modelos/modelo_login.php';
include_once('../controladores/controladorLogin.php');

require_once '../controladores/controlador_categoria.php';

include_once '../modelos/modelo_categoria.php';
require_once '../config/conexion.php';

include_once '../modelos/modelo_principal.php';


$usuario = new Usuario();

$consulta = "SELECT * FROM tbl_config_empresa WHERE id = 1";
$resultado = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_assoc($resultado);

$nombre = $row ['nombre'];  
$eslogan = $row ['eslogan'];  
$rtn = $row ['rtn'];  
$tel = $row ['tel'];  
$correo = $row ['correo'];  
$direccion = $row ['direccion'];  
 
$id = 1;

//$empleados = $usuario->obtenerEmpleados();
$db = getConexion();

if (!empty($_POST)) {
    $tel = $_POST['telefono'];
    $eslogan = $_POST['eslogan'];
    $nombre = $_POST['Nombre'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $rtn = $_POST['rtn'];

    $desprendible = $_FILES["imagen1"]["tmp_name"];

    if(empty($desprendible)){

        $sql1= $conexion->query("UPDATE tbl_config_empresa SET nombre ='$nombre', eslogan='$eslogan', rtn='$rtn', tel='$tel', correo='$correo', direccion='$direccion' WHERE id='$id'");
       
       
        if($sql1==1){
                        
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'EXCELENTE!',
                text: 'CONFIGURACIÓN EDITADA CON EXITO',
                confirmButtonText: 'Aceptar',
                position:'center',
                allowOutsideClick:false,
                padding:'1rem'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href ='../dist/home.php';
                 }
            })    
         </script>";
         
         
        $modeloPrincipal = new ModeloPrincipal();

        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d-H:i:s");
        $IDUS = $_SESSION['id_usuario'];

        include '../Config/conn.php';

        $rs = mysqli_query($conn, "SELECT * FROM tbl_usuario where id_usuario = $IDUS");
        $row = mysqli_fetch_array($rs);
        $Usuarioo = $row['usuario'];

        $sql = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
        VALUES(null,'$fecha','$IDUS',18, 'EDITAR','$Usuarioo EDITÓ CONFIGURACIÓN DE LA EMPRESA')";
        $modeloPrincipal->insertargeneral($sql);
            }
            else {

                echo "<script>Notiflix.Notify.failure('Error al configurar información');</script>";
           
              }         
}
   else if($_FILES["imagen1"]["type"] != "image/png"){

        echo "<script>Notiflix.Notify.failure('No se permiten imagenes con formatos distintos a PNG');</script>";

    }else{
    $imagen1 = addslashes(file_get_contents($_FILES["imagen1"]["tmp_name"])); 

    InsertarUpdateEmpresa($id, $tel, $eslogan, $nombre, $correo, $direccion, $rtn, $imagen1);
}
}
?>
<br><br><br><br><br><br><br>
<main>
    <div class="container" style="margin-top: -200px; margin-bottom: 20px;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header" style="background-color: rgb(171, 237, 230);">
                        <h3 class="text-center font-weight-light my-4">Configuración de la empresa</h3>
                    </div>
                    <div class="card-body">

                    <form class="needs-validation" method="POST" enctype = "multipart/form-data">
                            <div class="row mb-3">
                                 
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" value="<?= $nombre ?>" required name="Nombre" id="inputFirstName" type="text" />
                                        <label for="inputFirstName"><i class="fas fa-user icon"></i>&nbsp;Nombre de la empresa</label>
                                        <div class="valid-feedback">
                                            Campo Válido!
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor complete el campo, solo puede ingresar letras.
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="form-floating mb-3">
                                <input class="form-control" name="correo" id="inputEmail" type="email" value="<?= $correo ?>" placeholder="name@example.com" required pattern="[a-zA-Z0-9!#$%&'_+-]([\.]?[a-zA-Z0-9!#$%&'_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?" />
                                <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;Correo electrónico</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor complete el campo, debe contener @ y un dominio.
                                </div>
                            </div>

                            
                            <div class="form-floating mb-3">
                                <input class="form-control" name="eslogan" id="text" type="text" value="<?= $eslogan ?>" placeholder="name@example.com" required  />
                                <label for="text"><i class=" "></i>&nbsp;Eslogan</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">

                                 </div>
                            </div>

                            <div class="row mb-3">
                            <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" value="<?= $tel ?>" required name="telefono" id="inputFirstName" type="number" placeholder="Enter your first name"  />
                                        <label for="inputFirstName"><i class=" "></i>&nbsp;Telefono</label>
                                        <div class="valid-feedback">
                                            Campo Válido!
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor complete el campo, solo puede ingresar letras.
                                        </div>
                                    </div>
                                </div>
                                </div>
 

                                <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" value="<?= $rtn ?>" name="rtn" id="inputFirstName" type="text"  />
                                        <label for="inputFirstName"><i class=""></i>&nbsp;RTN</label>
                                        <div class="valid-feedback">
                                            Campo Válido!
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor complete el campo, solo puede ingresar letras.
                                        </div>
                                    </div>
                                </div>
 </div>
                             

                                <div class="form-floating mb-3">
                                <input class="form-control" name="direccion" required id="text" type="text" value="<?= $direccion ?>"  />
                                <label for="text"><i class=""></i>&nbsp;Dirección</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">

                                 </div>
                            </div>

                        <!-- ENTRADA PARA SUBIR FOTO -->

                <div class="mb-3">
              
              <div class="panel">SUBIR FOTO</div>
            
              <input type="file"  id="imagen1" name="imagen1">
              <p class="help-block">Peso máximo de la foto 2MB. Solo imagenes con formato PNG</p>
              <div class="input-group mb-3">

              
        

              <img  src="data:image;base64,<?php echo base64_encode($row['logo']);  ?>" class="img-thumbnail previsualizarEditar" width="150px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

          </div>

 

                                <div class="row mb-3">
                                </div>

                         


                            
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="button" class="btn btn-info" style="background-color:rgba(46, 182, 210, 0.8)" value="Actualizar" />

                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><input type="button" onclick="window.location.href='../dist/home.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />

                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
</main>
<?php

$modeloPrincipal = new ModeloPrincipal();

date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d-H:i:s");
$IDUS = $_SESSION['id_usuario'];

include '../Config/conn.php';

$rs = mysqli_query($conn, "SELECT * FROM tbl_usuario where id_usuario = $IDUS");
$row = mysqli_fetch_array($rs);
$Usuarioo = $row['usuario'];

$sql = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
VALUES(null,'$fecha','$IDUS',18, 'INGRESO','$Usuarioo INGRESÓ A CONFIGURACIÓN DE LA EMPRESA')";
$modeloPrincipal->insertargeneral($sql);
?>
<?php
include_once('../Login/footer.php');
?>