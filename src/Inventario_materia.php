<?php 
include_once('../Login/header.php'); 

include '../config/conn.php';

$id = $_SESSION['rol'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_permisos where ID_OBJETO = 11 and ID_ROL = '$id'");
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
            <h1 class=" text-center" id="letra"> Ingreso de Producto </h1>
            <style>
            h1{
                font-family: Vladimir Script;
                font-size: 80px;
            }
            </style>
 
         <div class="title_right">
             <div class="col-md-3 col-sm-3 form-group row pull-right top_search">
             <?php if ($insertar == 1) { ?>
                 <button  onclick="window.location.href='nuevo_ingreso_prod.php';" class="btn  btn-round btn-success"><i class="fa-solid fa-circle-plus"></i> Nuevo Ingreso Produto</button>
             <?php } ?>
                 <!-- <button class="btn  btn-round btn-info"><i class="fa-solid fa-file-pdf"></i> PDF</button> 
                 <a target="black" href="../reportes/reporte_compra.php" class="btn btn-round btn-info"><i class="fa-solid fa-file-pdf"></i>PDF</a>-->
             </div>
         </div>
    </div>
    <?php
    if (isset($_SESSION['cancelado'])) {
        echo "<script>Notiflix.Notify.success('Cancelado correctamente');</script>";
        unset($_SESSION['cancelado']);
    }
    if(isset($_SESSION['registro'])){
        echo "<script>Notiflix.Notify.success('Registrado correctamente');</script>";
        unset($_SESSION['registro']);
    }
    ?>

        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table">
                    <thead class="thead-dark">
                        <tr>
                        <th>#</th>
                            <th>FECHA INGRESO</th>
                            <th>SUBTOTAL</th>
                            <th>ISV</th>
                            <th>TOTAL</th>
                            <th>LOTE</th>
                            <th>USUARIO</th>
                            <th>ESTADO</th>
                            <th>DETALLE</th>
                        <?php if ($eliminar == 1) { ?>
                            <th>ELIMINAR</th>
                        <?php } ?>  
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    
                    include_once '../controladores/controlador_ingreso_Prod.php'; 
                    CompraContralador::mostrarIngproducto();

                     
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
        'Desea Cancelar la Compra?',
        'Si',
        'No',
        () => {
            window.location.href = "../controladores/controlador_ingreso_Prod.php?cancelar="+id;
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
              text: 'Reporte de Ingreso de Productos',
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
            columns: [0, 1, 2, 3, 4, 5, 6, 7,],
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
<?php
include_once('../Login/Footer.php');  

?>  