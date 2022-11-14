<?php include_once "../Login/header.php";
require "../config/conexion.php";
?>
            <h1 class=" text-center" id="letra"> Estado Factura  </h1>
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
            
         <div class="row">
                <div style="width: 150px;">
                  <div class="dataTables_length" id="sampleTable_length"><label><button class="btn btn-danger" type="button">Exportar a PDF  <i class="fa fa-file-pdf" ></i> </button>
                      </select> </label>
                  </div><br>
                </div>
              </div>
            <!---Final de boton Exportar factura--> 
        <thead class="thead-dark">
            <th>#</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acción</th>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Aprobada</td>
                <td>Factura con validez</td>
                <td> 
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalScrollablesl">Editar <i class='fas fa-edit'></i></button> <br><br>

                <!--- Creacion de modal de boton editar -->
                <div class="modal fade"  id="exampleModalScrollablesl" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header bg-success text-white" >
                        <h5 class="modal-title"  id="exampleModalScrollableTitle">Editar Estado de Factura</h5>
                        <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form>
                        <div class="form-group">
                            <label class="control-label">Nombre</label>
                            <input class="form-control" type="text" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Descripción</label>
                            <input class="form-control" type="text" placeholder="">
                        </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Agregar</button>
                    </div>
                    </div>
                </div>
                </div>

            </div>
                                
            <!--Final de modal de editar-->
                </td>
                
            </tr>
            <tr>
                <td>2</td>
                <td>Cancelada</td>
                <td>Factura sin validez</td>
                <td> 
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalScrollablesl">Editar <i class='fas fa-edit'></i></button> <br><br>

                <!--- Creacion de modal de boton editar -->
                <div class="modal fade"  id="exampleModalScrollablesl" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header bg-success text-white" >
                        <h5 class="modal-title"  id="exampleModalScrollableTitle">Editar Estado de Factura</h5>
                        <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form>
                        <div class="form-group">
                            <label class="control-label">Nombre</label>
                            <input class="form-control" type="text" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Descripción</label>
                            <input class="form-control" type="text" placeholder="">
                        </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Aceptar</button>
                    </div>
                    </div>
                </div>
                </div>

            </div>
                                
            <!--Final de modal de editar-->
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