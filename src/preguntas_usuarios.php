<?php include_once "../Login/header.php";
include '../config/conn.php';
include_once '../controladores/controlador_preguntas_usuario.php';

$id = $_SESSION['rol'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_permisos where ID_OBJETO = 2 and ID_ROL = '$id'");
$row = mysqli_fetch_array($sql);

$insertar = $row['permiso_insercion'];
$modificar = $row['permiso_modificar'];
$consultar = $row['permiso_consultar'];
$eliminar = $row['permiso_eliminacion'];
$PDF = $row['pdf'];
  /////////////////////////////////////////////////////////////////////////////////
$sql1 = mysqli_query($conn, "SELECT * FROM tbl_config_empresa where id = 1");
$rom = mysqli_fetch_array($sql1);

$nombre = $rom['nombre'];
$tel = $rom['tel'];
$direccion = $rom['direccion'];
/////////////////////////////////////////////////////////////////////////////////
?>

<h1 class=" text-center" id="letra"> Preguntas Usuario </h1>
<style>
  h1{
  font-family: Vladimir Script;
  font-size: 80px;
  }
</style>
<div class="container-fluid">
    <?php
    if (isset($_SESSION['registro'])) {
        echo "<script>Notiflix.Notify.success('Registrado correctamente');</script>";
        unset($_SESSION['registro']);
    }

    if (isset($_SESSION['edicion'])) {
        echo "<script>Notiflix.Notify.success('Editado correctamente');</script>";
        unset($_SESSION['edicion']);
    }
    if (isset($_SESSION['eliminacion'])) {
        echo "<script>Notiflix.Notify.failure('Eliminado correctamente');</script>";
        unset($_SESSION['eliminacion']);
    }
    if (isset($_SESSION['empleado'])) {
        echo "<script>Notiflix.Notify.failure('El empleado ya cuenta con un usuario');</script>";
        unset($_SESSION['empleado']);
    }
    if (isset($_SESSION['correo'])) {
        echo "<script>Notiflix.Notify.failure('El correo ya existe');</script>";
        unset($_SESSION['correo']);
    }
    if(isset($_SESSION['erroruser'])){
        echo "<script>Notiflix.Notify.failure('El usuario no puede eliminarse');</script>";
       unset($_SESSION['erroruser']);
    
 }
    ?>


    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table">
                <thead class="thead-dark">
                        <tr>

                            <th>RESPUESTA</th>
                            <th>PREGUNTA</th>
                            <th>USUARIO</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $resultado = ListarPregunta();

                        foreach ($resultado as $Pregunta) {
                            echo "<tr>";
                            echo "<td>" . $Pregunta['RESPUESTA'] . "</td>";
                            echo "<td>" . $Pregunta['PREGUNTA'] . "</td>";
                            echo "<td>" . $Pregunta['USUARIO'] . "</td>";
                            //echo "<td><a href=http://localhost/servicio&color/Pagina/Paginas/Editar_parametro.php?id=" . base64_encode($Pregunta['ID_PARAMETRO']) . " <i class='btn btn-round btn-info'><i class='fa-solid fa-pen-to-square'></i></a></td>";
                           // echo "<th><button onclick=eliminar(" . $Pregunta['ID_PARAMETRO'] . ")' class='btn btn-round btn-danger' type='submit'><i class='fas fa-trash-alt'></i></button></th>";
                           // echo "<td><button class ='btn btn-round btn-danger' onclick='eliminar(" . $Pregunta['ID_PARAMETRO'] . ")'><i class='fas fa-trash-alt'></i></button></td>";
                            echo "</tr>";
                        }

                        $modeloPrincipal = new ModeloPrincipal();

                        date_default_timezone_set('America/Mexico_City');
                        $fecha = date("Y-m-d-H:i:s");
                        $IDUS = $_SESSION['id_usuario'];
        
                        include '../Config/conn.php';
        
                        $rs = mysqli_query($conn, "SELECT * FROM tbl_usuario where id_usuario = $IDUS");
                        $row = mysqli_fetch_array($rs);
                        $Usuarioo = $row['usuario'];
        
                        $sql = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
                        VALUES(null,'$fecha','$IDUS',28, 'INGRESO','$Usuarioo INGRESÓ A TABLA PREGUNTAS  USUARIOS')";
                        $modeloPrincipal->insertargeneral($sql);
                        ?>


                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<!--LIBRERIA DE SWEET ALERT-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--FUNCION DE ELIMINAR REGISTRO CON JAVASCRIPT-->
<script>
    function eliminar(id){
        Swal.fire({
            title: '¿Está seguro?',
            text: "¡No podrá revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminarlo!'
        }).then((result)=> {
            if(result.value){
                window.location.href = '../Login/eliminarAuxiliar.php?id=' + id + '&tabla=pregunta';
            }
        } )
    }
</script>
<!--PARA EL REGISTRO DE REPORTES-->
<script src="../Login/js/jquery.dataTables.min.js"></script>
<script src="../Login/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script type="text/javascript">
  
  let PDF = '<?= $PDF ?>';
  console.log(PDF)
  if (PDF == 0) {
    console.log("entro")

  jQuery(document).ready(function() {
    jQuery('#table').DataTable({
      rowReorder: {
        selector: 'td:nth-child(2)'
      },
      responsive: true,
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
      },
      "paging": true,
      "processing": true,
      //dom: 'lBfrtip',

      "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ]

      });
    });
  } else {
    jQuery(document).ready(function() {
      jQuery('#table').DataTable({
        rowReorder: {
          selector: 'td:nth-child(2)'
        },
        responsive: true,
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "paging": true,
        "processing": true,
        dom: 'lBfrtip',


      buttons: [
        {
          extend: 'excel',
          text: '<button class="btn btn-success" style="margin-top: -11px; margin-bottom: -8px; margin-left: -15px; margin-right: -15px; border-radius: 0px;">Excel <i class="fas fa-file-excel"></i></button>',
        },
        {
          extend: 'pdfHtml5',
          text: '<button class="btn btn-danger" style="margin-top: -11px; margin-bottom: -8px; margin-left: -15px; margin-right: -15px; border-radius: 0px;">PDF <i class="fas fa-file-pdf"></i></button>',
          orientation: 'portrait',
          pageSize: 'LETTER',
          customize: function(doc) {
            doc.content.splice(0, 1);
            var now = new Date();
            var date = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
            var horas = now.getHours() + ':' + now.getMinutes() + ':' + now.getSeconds();
            //colocar encabezado del documento
            doc.content.unshift({
              margin: [0, 0, 0, 0],
              alignment: 'center',
              text: '<?= $rom['nombre'] ?>',
              fontSize: 20,
              bold: true,
              color: '#063970',
              margin: [0, 0, 0, 20]
            },{
              margin: [0, 0, 0, 0],
              alignment: 'center',
              text: 'Reporte de Preguntas Usuarios',
              fontSize: 20,
              bold: true
            },
            {
              margin: [0, -20, 0, 20],
              alignment: 'left',
              text: 'Fecha: ' + date + '\nHora: ' + horas,
              fontSize: 10,
              bold: true
            },
            {
              margin: [0, -60, 0, 20],
              alignment: 'right',
              image: 'data:image/jpeg;base64,<?php echo base64_encode($rom['logo']);  ?> ',
              width: 70,
              height: 70,
            }
            );
            doc["footer"] = function (currentPage, pageCount) {
              return {
                margin: 10,
                columns: [
                  {
                    fontSize: 10,
                    text: [
                      {
                        text:
                          "Página " +
                          currentPage.toString() +
                          " de " +
                          pageCount,
                        alignment: "center",
                        bold: true
                      },
                    ],
                    alignment: "center",
                  },
                ],
              };
            };
          },
          exportOptions: {
            columns: [0, 1],
            modifier: {
              page: 'current'
            },
          }
        },
        {
          extend: 'print',
          text: '<button class="btn btn-info" style="margin-top: -11px; margin-bottom: -8px; margin-left: -15px; margin-right: -15px; border-radius: 0px;">Imprimir <i class="fas fa-print"></i></button>',
        } 
      ],
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ]

    });
  });
}
</script>
<?php include_once "../Login/footer.php"; ?>