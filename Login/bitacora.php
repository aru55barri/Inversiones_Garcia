<?php
include_once "../Login/header.php";
include '../config/conn.php';
include_once '../controladores/controlador_bitacora.php';

$id = $_SESSION['rol'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_permisos where ID_OBJETO = 35 and ID_ROL = '$id'");
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
        <h1 class=" text-center" id="letra"> Bitácora </h1>
<style>
  h1{
  font-family: Vladimir Script;
  font-size: 80px;
  }
</style>
</div>

<!-- <div class="title_right">
     <div class="col-md-3 col-sm-3 form-group row pull-right top_search">
         <button onclick="window.location.href='../Paginas/Registrar_parametros.php'" class="btn  btn-round btn-success"><i class="fa-solid fa-circle-plus"></i>Parámetro</button>
        
     </div>
 </div>-->
</div>
    <?php
    if (isset($_SESSION['registro'])) {
        echo "<script>Notiflix.Notify.success('Registrado correctamente');</script>";
        unset($_SESSION['registro']);
    }

    if (isset($_SESSION['EditarParametro'])) {
        echo "<script>Notiflix.Notify.success('Editado correctamente');</script>";
        unset($_SESSION['EditarParametro']);
    }
    if (isset($_SESSION['eliminarParametros'])) {
        echo "<script>Notiflix.Notify.failure('Eliminado correctamente');</script>";
        unset($_SESSION['eliminarParametros']);
    }
    ?>


    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table">

                    <thead class="thead-dark">
                        <tr>

                            <th>#</th>
                            <th>FECHA</th>
                            <th>USUARIO</th>
                            <th>OBJETO</th>
                            <th>ACCION</th>
                            <th>DESCRIPCIÓN BITACORA</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $resultado = traerBitacora();
                        $ii = 0;
                        foreach ($resultado as $Bitacora) {
                             $ii = $ii + 1;
                            echo "<tr>";
                            echo "<td>" . $ii . "</td>";
                            echo "<td>" . $Bitacora['fecha'] . "</td>";
                            echo "<td>" . $Bitacora['id_usuario'] . "</td>";
                            echo "<td>" . $Bitacora['id_objeto'] . "</td>";
                            echo "<td>" . $Bitacora['accion'] . "</td>";
                            echo "<td>" . $Bitacora['descripcion'] . "</td>";
                            //echo "<td><a href=http://localhost/servicio&color/Pagina/Paginas/Editar_parametro.php?id=" . base64_encode($Bitacora['ID_PARAMETRO']) . " <i class='btn btn-round btn-info'><i class='fa-solid fa-pen-to-square'></i></a></td>";
                           // echo "<th><button onclick=eliminar(" . $Bitacora['ID_PARAMETRO'] . ")' class='btn btn-round btn-danger' type='submit'><i class='fas fa-trash-alt'></i></button></th>";
                           // echo "<td><button class ='btn btn-round btn-danger' onclick='eliminar(" . $Bitacora['ID_PARAMETRO'] . ")'><i class='fas fa-trash-alt'></i></button></td>";
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
                        VALUES(null,'$fecha','$IDUS',15, 'INGRESO','$Usuarioo INGRESÓ A TABLA BITÁCORA')";
                        $modeloPrincipal->insertargeneral($sql);
                        ?>
                        


                    </tbody>

                </table>
            </div>
        </div>
    </div>
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
          [10, 25, 50, "Todos"]
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
              text: 'Reporte de Bitacora',
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
            columns: [0, 1, 2, 3, 4, 5],
            modifier: {
              page: 'current'
            },
          }
        },

      ],
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "Todos"]
      ]

    });
  });
}
</script>
<?php include_once "../Login/footer.php"; ?>