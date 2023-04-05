<?php

include_once '../modelos/modelo_principal.php';
include_once "../Login/header.php";
include '../config/conn.php';
include_once '../controladores/controlador_roles.php';

$id = $_SESSION['rol'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_permisos where ID_OBJETO = 17 and ID_ROL = '$id'");
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
<div class="container-fluid">

<div class="page-title">
    <div class="title_left">
    <h1 class=" text-center" id="letra"> Roles </h1>
<style>
h1{
font-family: Tempus Sans ITC;
font-size: 80px;
}
</style>
</div>

        <div class="title_right">
            <div class="col-md-3 col-sm-3 form-group row pull-right top_search">
            <?php
            if ($insertar == 1) { ?>
                <button onclick="window.location.href='../src/nuevo_roles.php'" class="btn  btn-round btn-success"><i class="fa-solid fa-circle-plus"></i> Nuevo Rol</button>
                <?php } ?>
                <!-- <button class="btn  btn-round btn-info"><i class="fa-solid fa-file-pdf"></i> PDF</button> -->
            </div>
        </div>
    </div>
    <?php
    if (isset($_SESSION['registrarRol'])) {
        echo "<script>Notiflix.Notify.success('Rol registrado correctamente');</script>";
        unset($_SESSION['registrarRol']);
    }

    if (isset($_SESSION['EditarRol'])) {
        echo "<script>Notiflix.Notify.success('Rol Editado correctamente');</script>";
        unset($_SESSION['EditarRol']);
    }
    if (isset($_SESSION['eliminarRol'])) {
        if ($_SESSION['eliminarRol'] == 'Si') {
            echo "<script>Notiflix.Notify.failure('Rol Eliminado Correctamente');</script>";
          } else {
            echo "<script>Notiflix.Notify.warning('No se pudo eliminar el Rol porque esta asociado a un Usuario');</script>";
          }
      
          unset($_SESSION['eliminarRol']);
    }
    ?>


    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table">

                    <thead class="thead-dark">
                        <tr>

                            <th>ID</th>
                            <th>ROL</th>
                            <th>DESCRIPCION</th>
                            <?php if ($modificar == 1) { ?>
                            <th>EDITAR</th>
                            <?php } ?>
                            <?php if ($eliminar == 1) { ?>
                            <th>ELIMINAR</th>
                            <?php } ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $resultado = mostrarRoles();
                        $ii = 0;

                        foreach ($resultado as $rol) {
                          $ii = $ii + 1;
                          echo "<tr>";
                          echo "<td>" . $ii . "</td>";
                            echo "<td>" . $rol['rol'] . "</td>";
                            echo "<td>" . $rol['descripcion'] . "</td>";
                            //CAMBIOS
                            if ($modificar == 1) { 
                              echo "<th><a href='../src/editar_roles.php?id=" . base64_encode($rol['id_rol']) . "'> <i class='btn btn-round btn-info'><i class='fa-solid fa-pen-to-square'></i></a></th>";
                            }

                            //CAMBIOS
                            if ($eliminar == 1) {
                            //echo "<th><button onclick=eliminar(" . $rol['ID_ROL'] . ")' class='btn btn-round btn-danger' type='submit'><i class='fas fa-trash-alt'></i></button></th>";
                            echo "<td><button class ='btn btn-round btn-danger' onclick='eliminar(" . $rol['id_rol'] . ")'><i class='fas fa-trash-alt'></i></button></td>";
                            }
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
                        VALUES(null,'$fecha','$IDUS',17, 'INGRESO','$Usuarioo INGRESÓ A LA TABLA ROLES')";
                        $modeloPrincipal->insertargeneral($sql);

                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <script>
        function eliminar(id) {

            swal.fire({
                title: 'ADVERTENCIA',
                text: "¿Desea Eliminar el Registro?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d35',
                confirmButtonText: '¡Si, Eliminado!',

            }).then((result) => {
                if (result.value) {
                    window.location.href = '../Login/eliminarAuxiliar.php?id=' + id + '&tabla=rol';
                }
            })

        }
    </script>
</div>


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
       /* {
          extend: 'copy',
          text: '<button class="btn btn-secondary" style="margin-top: -11px; margin-bottom: -8px; margin-left: -15px; margin-right: -15px; border-radius: 0px;">Copiar <i class="fas fa-copy"></i></button>',

        },*/
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
              text: 'Reporte de Roles',
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
            columns: [0, 1, 2],
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
