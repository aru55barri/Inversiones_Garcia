<?php 

include_once('../Login/header.php'); 

include '../Config/conn.php';


$id = $_SESSION['rol'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_permisos where id_objeto = 2 and id_rol = '$id'");
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
         <h1 class=" text-center" id="letra"> Facturas </h1>
 <style>
   h1{
   font-family: Tempus Sans ITC;
   font-size: 80px;
   }
 </style>
         </div>

        <div class="title_right">
            <div class="col-md-3 col-sm-3 form-group row pull-right top_search">
                <?php if ($insertar == 1) { ?>
                <button  onclick="window.location.href='NuevaVenta.php';" class="btn  btn-round btn-success"><i class="fa-solid fa-circle-plus"></i> Nueva Venta</button>
                <?php } ?>
                <!-- <button class="btn  btn-round btn-info"><i class="fa-solid fa-file-pdf"></i> PDF</button> -->
            </div>
        </div>
    </div>

    <?php
    if (isset($_SESSION['cancelado'])) {
        echo "<script>Notiflix.Notify.success('Cancelado correctamente');</script>";
        unset($_SESSION['cancelado']);
    }
    if(isset($_SESSION['registro']))
    {
      $rs = mysqli_query($conn, "SELECT MAX(id_factura) as id FROM tbl_factura");
      $row = mysqli_fetch_array($rs);
      $id = $row['id'];
      
      $client = mysqli_query($conn, "SELECT idcliente from tbl_factura WHERE id_factura = $id");
      $raw = mysqli_fetch_array($client);
      $cliente = $raw['idcliente'];


      $consulta = "SELECT * FROM tbl_cai WHERE fecha_vencimiento > NOW()";
      $resultado = mysqli_query($conn, $consulta);
      $cai = mysqli_fetch_assoc($resultado);

      $CAI = $cai['id'];  

      $consulta = "SELECT * FROM tbl_cai WHERE id = $CAI";
      $resultado = mysqli_query($conn, $consulta);
      $MCAI = mysqli_fetch_assoc($resultado);

      $Rinicial = $MCAI ['rango_inicial'];  
      $Rfinal = $MCAI ['rango_final'];  
      $Ractual = $MCAI ['rango_actual'];  
      $NumCAI = $MCAI ['numero_CAI'];  
      $fecha = $MCAI ['fecha_vencimiento'];  


      if ($Ractual+1 >= $Rinicial+1 && $Ractual+1 <= $Rfinal) {
        $siguienteNumero = str_pad($Ractual+1, 16, '0', STR_PAD_LEFT);
        $sql1 = "UPDATE tbl_cai SET rango_actual = '$siguienteNumero' WHERE id = '$CAI'";
        mysqli_query($conn, $sql1);
    
        if ($fecha = 0) {
            echo "<script>Notiflix.Notify.failure('Error la fecha no es valida');</script>";
        }
        try {
            if ($Ractual+1 >= $Rfinal) {
                echo "<script>Notiflix.Notify.failure('Favor verificar la configuracion CAI. No se encuentran numeros vigentes');</script>";
            }
        } catch (Exception $e) {
            return false;
        }
    }
    
      echo "<script> imprimir($id, $cliente, $CAI);</script>";
      unset($_SESSION['registro']);
    }
    if(isset($_SESSION['limpiar']))
    {
        echo "<script>Notiflix.Notify.success('Venta Registrada correctamente');</script>";
        unset($_SESSION['cancelado']);
    }
    ?>
    
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table">
                    <thead class="thead-dark">
                        <tr>
                        <th>ID</th>
                            <th>FECHA VENTA</th>
                            <th>SUBTOTAL</th>
                            <th>ISV</th>
                            <th>TOTAL</th>
                            <th>CLIENTE</th>
                            <th>TIPO PAGO</th>
                            <th>USUARIO</th>
                            <th>ESTADO</th>
                            <th>DETALLE</th>
                            <th>PDF</th>
                            <?php if ($eliminar == 1) { ?>
                             <th>ELIMINAR</th>
                            <?php } ?>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    
                    include_once '../controladores/controlador_ventas.php'; 
                     Contralador::mostrar();

                     
                 ?>    
                 

                    </tbody>

                </table>
            </div>
            </div>
        </div>
 </div>


 <script>
    function eliminar(id){
        Swal.fire({
            title: '¿Está seguro?',
            text: "¿Desea cancelar la factura?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, Cancelar!'
        }).then((result)=> {
            if(result.value){
                window.location.href = "../controladores/controlador_ventas.php?cancelar="+id;            }
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
      /*  {
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
              text: 'Reporte de Ventas',
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
            columns: [0, 1, 2, 3, 4, 5, 6, 7],
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
include_once('../Login/footer.php');  

?>  
