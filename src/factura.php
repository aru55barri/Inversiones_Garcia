<?php include_once "../Login/header.php";
require "../config/conexion.php";
?>
            <h1 class=" text-center" id="letra">  Factura  </h1>
                       <style>
                        h1{
                            font-family: Vladimir Script;
                            font-size: 80px;
                        }
                       </style>

                      
            
           <!--Boton de nueva factura-->

           <div class="container">

                <div class="row">
                    <div class="col-lg-12">            
                        <a href="../src/NuevaVenta.php" class="btn btn-primary">Factura <i class="fa fa-plus"></i></a> </div>    
                    </div>    
            </div><br>  
            <!--colocacion de codigo-->

           
                 
         <div class="container" style="margin-top: 10px;padding: 5px">
         
        <table id="tablax" class="table table-striped table-bordered" style="width:100%">
        <!--boton Exportar factura--->
            
        <div class="row" style="width:500px">
                <div style="width: 150px;">
                  <div class="dataTables_length" id="sampleTable_length"><label><button class="btn btn-danger" type="button">Exportar a PDF  <i class="fa fa-file-pdf" ></i> </button>
                      </select> </label>
                  </div><br>
                </div>
              </div>
              
            <!---Final de boton Exportar factura-->   
        <thead class="thead-dark">
            <th>No. Factura</th>
            <th>Nombre del cliente</th>
            <th>RTN</th>
            <th>Direccion</th>
            <th>Cantidad</th>
            <th>Productos</th>
            <th>Valor unitario</th>
            <th>Total</th>
            <th>ISV</th>
            <th>Total a pagar</th>
            <th>Estado de la factura</th>
            <th>Accion</th>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Josue</td>
                <td>RTN123456</td>
                <td>COl. alameda</td>
                <td>2</td>
                <td>Vino de Uva</td>
                <td>250</td>
                <td>500</td>
                <td>75</td>
                <td>575</td>
                <td>En espera</td>
                <td> 
                <a href="../src/factura.pdf" target="_blank" class="btn btn-success">Aprobar <i class="fa fa-thumbs-up"></i> </a><br><br>
                <form action="" method="post" class="confirmar d-inline">
                <button class="btn btn-danger" type="submit">Cancelar <i class="fa fa-thumbs-down"></i> </button>
                </form>
                </td>
                
            </tr>
            
        </tbody>
    </table>
</div>


    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
        </script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
    </script>
    <script>
        $(document).ready(function () {
            $('#tablax').DataTable({
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Agrupar de _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                    }
                },
                
            });
        });

        </script>
           

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; UNAH 2022</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>