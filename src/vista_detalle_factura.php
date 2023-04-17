<?php

include_once('../login/header.php');

$ID_VENTA = $_GET['id'];

?>

<div class="container-fluid">

    <div class="page-title">
        <div class="title_left">
            <h3>Detalle factura</h3>
        </div>

        <div class="title_right">
            <div class="col-md-3 col-sm-3 form-group row pull-right top_search">
                <button onclick="window.location.href='factura.php';" class="btn btn-primary"></i> Regresar</button>
                <!-- <button class="btn  btn-round btn-info"><i class="fa-solid fa-file-pdf"></i> PDF</button> -->
            </div>
        </div>
    </div>

  

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table">
                    <thead class="thead-dark">
                        <tr>
                        <th>ID</th>
                            <th>PRODUCTO</th>
                            <th>CANTIDAD</th>
                            <th>PRECIO</th>
                            <th>ISV</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

include_once '../controladores/controlador_detalle_factura.php';
Controlador::mostrar($ID_VENTA);


                        ?>


                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>



<script>
    function eliminar(id) {

        console.log(id);
        Notiflix.Confirm.show(
            'Confirmar',
            'Desea eliminar?',
            'Si',
            'No',
            () => {
                window.location.href = "../controladores/controlador_compra.php?id=" + id;
            },
            () => {
                Notiflix.Report.warning('Cancelado', 'Hiciste clic en el botón "No"');
            }, {});
    }
</script>
<?php
include_once('../login/Footer.php');

?>