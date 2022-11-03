<?php include_once "./header.php";
include '../config/conn.php';

$id = $_SESSION['rol'];
$sql = mysqli_query($conn, "SELECT * FROM tbl_permisos where ID_OBJETO = 2 and ID_ROL = '$id'");
$row = mysqli_fetch_array($sql);

$insertar = $row['permiso_insercion'];
$modificar = $row['permiso_modificar'];
$consultar = $row['permiso_consultar'];
$eliminar = $row['permiso_eliminacion'];
$PDF = $row['pdf'];
  
?>

<h1 class=" text-center" id="letra"> Bitácora </h1>
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
                            <th>ID</th>
                             <!-- <th>NOMBRE</th>  -->
                            <th>FECHA</th>
                            <th>USUARIO</th>
                            <th>ACCIÓN</th>
                            <th>DESCRIPCIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

$sql1 = "select u.*,r.USUARIO from tbl_bitacora u inner join tbl_usuario r on u.id_usuario = r.id_usuario ";
$productos = mysqli_query($conn, $sql1);
if($productos -> num_rows > 0){
foreach($productos as $key => $row ){
?>
<!--funcion y estilos para celdas en error-->

<!-- empieza la tabla-->
<tr>
<td <?php echo  'class="'.$row['USUARIO'] .'"'; ?>><?php echo $row['id']; ?></td>
<td><?php echo $row['fecha']; ?></td>
<td><?php echo $row['USUARIO']; ?></td>
<td><?php echo $row['accion']; ?></td>
<td><?php echo $row['descripcion']; ?></td>
</tr>


<?php
}
}else{

    ?>
    <tr class="text-center">
    <td colspan="4">No existe registros</td>
    </tr>

    <?php
}?>
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
          text: '<button class="btn btn-danger" style="margin-top: -11px; margin-bottom: -8px; margin-left: -15px; margin-right: -15px; border-radius: 0px;">Exportar a PDF <i class="fas fa-file-pdf"></i></button>',
          orientation: 'landscape',
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
              text: 'Fracisco Javier',
              fontSize: 20,
              bold: true,
              color: '#063970',
              margin: [0, 0, 0, 20]
            },{
              margin: [0, 0, 0, 0],
              alignment: 'center',
              text: 'Reporte de Usuarios',
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
           /* {
              margin: [0, -60, 0, 20],
              alignment: 'right',
               width: 70,
              height: 70,
            } */
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
            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8,],
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
        [10, 25, 50, -3],
        [10, 25, 50, "All"]
      ]

    });
  });
}
</script>
<?php include_once "./footer.php"; ?>