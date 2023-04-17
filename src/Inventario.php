<?php 
include_once('../Login/header.php');   
include '../config/conn.php';

$id = $_SESSION['rol'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_permisos where id_objeto = 9 and id_rol = '$id'");
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
    <h1 class=" text-center" id="letra"> Inventario </h1>
<style>
h1{
font-family: Vladimir Script;
font-size: 80px;
}
</style>
</div>
            <div class="title_right">
            <div class="col-md-3 col-sm-3 form-group row pull-right top_search">
                <!-- <button onclick="window.location.href='nuevo_inventario.php';" class="btn  btn-round btn-success"><i class="fa-solid fa-circle-plus"></i> inventario</button> -->
                <!-- <a target="black" href="../reportes/reporte_inventario_productos.php" class="btn btn-round btn-info"><i class="fa-solid fa-file-pdf"></i>PDF</a>-->

            </div>
        </div>
    </div>
    <?php
    if(isset($_SESSION['registro'])){
        echo "<script>Notiflix.Notify.success('Registrado correctamente');</script>";
        unset($_SESSION['registro']);
    }

    if(isset($_SESSION['edicion'])){
         echo "<script>Notiflix.Notify.warning('Editado correctamente');</script>";
        unset($_SESSION['edicion']);
    }
    if(isset($_SESSION['eliminacion'])){
        echo "<script>Notiflix.Notify.failure('Eliminado correctamente');</script>";
       unset($_SESSION['eliminacion']);
   }
    ?>
  
    
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table">
                    <thead class="thead-dark">
                        <tr>
                        <th>#</th>
                                <th>CANTIDAD EXISTENCIA</th>  
                                <!-- <th>PRODUCCION</th> -->
                                <th>PRODUCTO</th>
                                <th>DETALLE</th>
                               
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    include_once '../controladores/controlador_inventario.php';
                    
                    InventarioContralador::mostrarInventario();
                 ?> 
                     

                        

                    </tbody>

                </table>
            </div>
            </div>
        </div>
  

 </div>

 <script>
    function eliminar(id){
        
        console.log(id);
        Notiflix.Confirm.show(
        'Confirmar',
        'Desea eliminar?',
        'Si',
        'No',
        () => {
            window.location.href = "../controladores/controlador_inventario.php?id="+id;
        },
        () => {
            Notiflix.Report.warning('Cancelado','Hiciste clic en el botón "No"');
        },{});
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
        /*{
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
              text: 'Reporte de Inventario Productos',
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
            columns: [0, 1, 2,],
            modifier: {
              page: 'current'
            },
          }
        }, 

      ],
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ]
    });
  });
}
</script>
<?php
include_once('../Login/footer.php');  

?>  