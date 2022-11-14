<?php include_once "../Login/header.php";
require "../config/conexion.php";
?>
            <h1 class=" text-center" id="letra">  CAI  </h1>
                       <style>
                        h1{
                            font-family: Vladimir Script;
                            font-size: 80px;
                        }
                       </style>
       
        <!--Comienzo de modal (Boton Nuevo)-->
        <div>

        <!-- Button trigger modal -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">            
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                        Nuevo <i class="fa fa-plus"></i>
                        </button>
                    </div>    
                </div>    
        </div>  
            <!--colocacion de codigo-->

            <!--AQUI EMPIEZA CODIGO DE MODAL-->
        <!-- Modal para nuevo cliente  -->
        <div class="modal fade"  class="card-header bg-primary text-white"  id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
          <div class="modal-dialog " role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white" >
                <h5 class="modal-title"  id="exampleModalScrollableTitle">Nuevo Registro CAI</h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form>
                  <div class="form-group">
                    <label class="control-label">Rango Inicial</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Rango Final</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Número CAI</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Fecha Limite de Emisión</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Usuario</label>
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

    </div> <!--AQUI TERMINA CODIGO DE MODAL BOTON NUEVO-->

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
                <th>Id</th>
                <th>Rango Inicial</th>
                <th>Rango Final</th>
                <th>rango Actual</th>
                <th>Número CAI</th>
                <th>Fecha</th>
                <th>Id Usuario</th>
                <th>Acción</th>
            </thead>
            <tbody>
                <tr>
                <td>1</td>
                <td>000-001-01-00000001</td>
                <td>000-001-01-00000050</td>
                <td>000-001-01-00000025</td>
                <td>38701E-E0FB79-B14F87-6AF16B-DEE6D5-0A</td>
                <td>29/JUNIO/2023</td>
                <td>1</td>
                <td>
                <!--Correcion de botones--->    
                <button type="button" class="btn btn-warning"   data-toggle="modal" data-target="#exampleModalScrollables"> Agregar <i class='fas fa-edit'></i></button> <br><br>

                <!---Comienzo de modal de boton agregar--->

                <!--AQUI EMPIEZA CODIGO DE MODAL-->
                <!-- Modal para Agregar CAI  -->
                <div class="modal fade"  id="exampleModalScrollables" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-warning text-white" >
                        <h5 class="modal-title"  id="exampleModalScrollableTitle">Agregar Registro CAI</h5>
                        <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                      <form>
                        
                        <div class="form-group">
                          <label class="control-label">Rango Actual</label>
                          <input class="form-control" type="number" placeholder="">
                        </div>

                        <div class="form-group">
                          <label class="control-label">Fecha límite de emisión</label>
                          <input class="form-control" type="text" placeholder="">
                        </div>
                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Aceptar</button>
                        </div>
                        
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div>

        

          </div> <!--AQUI TERMINA CODIGO DE MODAL BOTON agregar-->
          <!--Final de modal editar-->

          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalScrollablesl">Editar <i class='fas fa-edit'></i></button> <br><br>

          <!--- Creacion de modal de boton editar -->
          <div class="modal fade"  id="exampleModalScrollablesl" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
          <div class="modal-dialog " role="document">
            <div class="modal-content">
              <div class="modal-header bg-success text-white" >
                <h5 class="modal-title"  id="exampleModalScrollableTitle">Editar Registro CAI</h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form>
                <div class="form-group">
                    <label class="control-label">Rango Inicial</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Rango Final</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Número CAI</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Fecha límite de emisión</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Usuario</label>
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
          
                                <form action="" method="post" class="confirmar d-inline">
                                    <button class="btn btn-danger" type="submit">Eliminar <i class='fas fa-trash-alt'></i> </button>
                                </form>
                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>


            <!-- JQUERY -->
            <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
            </script>
            <!-- DATATABLES -->
            <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
            </script>
            <!-- BOOTSTRAP -->
            <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
            </script>
            <script>
                $(document).ready(function() {
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

            <!--  fin de codigo  -->
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