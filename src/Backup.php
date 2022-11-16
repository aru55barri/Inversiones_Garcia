<?php include_once "../Login/header.php";
require "../config/conexion.php";
?>
 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

require_once '../controladores/controlador_ajustes.php';

if (isset($_POST['btnBackup'])) {
  crearRespaldoBD();
  echo "<script>
         Swal.fire({
             icon: 'success',
             title: 'EXCELENTE!',
             text: 'Su respaldo fue realizado con Éxito, este sera alojado en la carpeta, config/Respaldos!',
             confirmButtonText: 'Aceptar',
             position:'center',
             allowOutsideClick:false,
             padding:'1rem'
         }).then((result) => {
             if (result.isConfirmed) {
                 location.href ='../src/backup.php';
             }
         })    
     </script>";
}

if (isset($_POST['btnRestaurar'])) {
  $nombreArchivo = $_POST['cmbArchivos'];
  restaurarBD($nombreArchivo);
  $_SESSION['mensaje'] = 'Se ha restaurada la Base de Datos con Éxito!';
}

?>

<main>
  <!-- Content Wrapper. Contains page content -- Div Principal -->
  <div class="content-wrapper">
    <!-- Content Header (Sección de Encabezado) -->
    <section class="content-header">
      <div class="container-fluid">
        <!-- Div Container-Fluid -->
        <div class="row mb-2">
          <!-- Div row y margen abajo de 2-->
          <div class="col-sm-6 d-flex">
            <!-- Div 6 columnas derecha-->
            <!--Titulo-->
            <h1><i class="fa-solid fa-database"></i> Respaldo Y Recuperación </h1>

          </div><!-- / termina Div 6 columnas derecha-->
          <div class="col-sm-6">
            <!-- Div 6 columnas Izquierda-->
            <ol class="breadcrumb float-sm-right">
              <!--Icono Casa-->

            </ol>
          </div><!-- Termina Div 6 columnas Izquierda-->
        </div><!-- termina Div row y margen abajo de 2-->
      </div><!-- /. Termina container-fluid -->
    </section><!-- / Content Header (/. Sección de Encabezado) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- div 12 -->
            <div class="card">
              <!-- div card -->
              <!-- Encabezado -->
              <div class="card-header">
                <h2 class="card-title">Mantenimiento de la base de datos</h2>
              </div>
              <!-- /.card-body -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 ">
                    <div class="card">
                      <div class="card-header">
                        <h3>Respaldo Manual de la BD</h3>
                      </div>
                      <div class="card-body">
                        <div>
                          <p>Los respaldos son de suma importancia en el sistema. Es por ello que se recomienda realizar respaldo periódicamente, dependiedo de tus necesidades.</p>
                        </div>
                        <hr>
                        <div class="text-right">
                          <form action="" method="POST">
                            <div class="d-grid"> <input type="submit" class="btn btn-success" name="btnBackup" id="idUtilidad" value="Respaldar"></input>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-header">
                        <h3>Restauración Manual de la BD</h3>
                      </div>
                      <div class="card-body">

                        <label>Selecciona un punto de restauración</label><br>
                        <hr>
                        <div class="custom-file">
                          <form id="formBD" method="POST" name="formBD" class="form-horizontal">
                            <div class="mb-2">
                              <!-- <label>Selecciona un punto de restauración</label><br> -->
                              <select name="cmbArchivos" id="fileBD" onchange="cambio()" class="form-control selectpicker" data-live-search="true">
                                <option value="" disabled="" selected="">Selecciona un punto de restauración</option>
                                <?php
                                $nombresArchivos = obtenerNombresdeArchivosRespaldo();
                                foreach ($nombresArchivos as $nombreArchivo) {
                                  echo "<option value='$nombreArchivo'>$nombreArchivo</option>";
                                }
                                ?>
                              </select>
                            </div>

                            <div class="text-right">
                              <input type="submit" class="btn btn-success" name="btnRestaurar" id="btnrespaldo" value="Restaurar"></input>&nbsp;&nbsp;&nbsp;
                            </div>

                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- termina Tabla -->
                </div>
                <!-- /.termina card-body -->
              </div>
              <!-- /.termina card -->
            </div>
            <!-- /.termina col -->
          </div>
          <!-- /. termina ow -->
        </div>
        <!-- /. termina container-fluid -->
    </section>
    <!-- /. termina content -->
  </div>
  <!-- /.content-wrapper / Div Principal -->

</main>

<!-- <form action="" method="POST">
<div class="d-grid"> <input type="submit" class="btn btn-success" name="btnBackup" id="idUtilidad" value="Respaldar"></input>
</div>
</form> -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 

if(isset($_SESSION['mensaje']))
{
  echo "<script>
  Swal.fire({
      title: 'EXCELENTE!',
      text: '$_SESSION[mensaje]',
      confirmButtonText: 'Aceptar',
      position:'center',
      icon: 'success',
      allowOutsideClick:false,
      padding:'1rem'
  });
  </script>";
  unset($_SESSION['mensaje']);
}

?>

<script>
  /*let fileValue;
    document.addEventListener(
        "DOMContentLoaded",
        function() {
            if (document.querySelector("#formBD")) {
                let formData = document.querySelector("#formBD");
                formData.onsubmit = function(e) {
                    e.preventDefault();
                    console.log(formData)
                    fileValue = document.querySelector("#fileBD").value;

                    if (fileValue == "") {
                        swal.fire(
                            "Atención",
                            "Selecciona un archivo para la restauración",
                            "error"
                        );
                        return false;
                    }
                    swal.fire({
                            title: "¿Restaurar Base de datos?",
                            text: "¿Realmente quiere Restaurar la Base de datos?",
                            icon: "warning",
                            showClass: {
                                popup: "animate_animated animate_fadeInDown",
                            },
                            hideClass: {
                                popup: "animate_animated animate_fadeOutUp",
                            },
                            showCancelButton: true,
                            confirmButtonText: "Si, Restaurar!",
                            cancelButtonText: "No, Cancelar!",
                            closeOnConfirm: false,
                            closeOnCancel: true,
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                formData.submit();
                            }
                        });

                };
            }
        },
        false
    );*/

  var form = document.getElementById('formBD');
  var backup = document.getElementById('fileBD');

  form.addEventListener('submit', event => {
    if (backup.value == "") {
      event.preventDefault()
      event.stopPropagation()
      Swal.fire("Atención",
        "Selecciona un archivo para la restauración",
        "error");
    }
  });
</script>
<?php include_once "../login/footer.php"; ?>
