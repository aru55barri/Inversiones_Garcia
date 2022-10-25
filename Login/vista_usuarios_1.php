<?php include_once "./header.php";
include '../config/conn.php';


  
?>

<h1 class=" text-center" id="letra"> Usuarios </h1>
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
        <!-- Modal para nuevo producto  -->
        <div class="modal fade"  class="card-header bg-primary text-white"  id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white" >
                <h5 class="modal-title"  id="exampleModalScrollableTitle">Nuevo Usuario</h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form>
                  <div class="form-group">
                    <label class="control-label">Nombre </label>
                    <input class="form-control" type="text" placeholder="">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Correo</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Usuario</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Clave</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Confirmar clave</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Rol</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Estado</label>

                    <div class="form-group">

                      <select class="form-control" id="exampleSelect1">

                        <option>Activo</option>
                        <option>inactivo</option>

                      </select>
                    </div>
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

    </div> <!--AQUI TERMINA CODIGO DE MODAL BOTON NUEVO-->

            <!--colocacion de codigo-->

            <div class="container" style="margin-top: 10px;padding: 5px">
             <!--boton Exportar factura--->
            
             <div class="row">
                <div style="width: 150px;">
                  <div class="dataTables_length" id="sampleTable_length"><label><button class="btn btn-danger" type="button">Exportar a PDF  <i class="fa fa-file-pdf" ></i> </button>
                      </select> </label>
                  </div><br>
                </div>
              </div>
            <!---Final de boton Exportar factura-->  
                <table id="tablax" class="table table-striped table-bordered" style="width:100%">
                    <thead class="thead-dark">
                        <th>Id </th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Usuario</th>
                        <th>Clave</th>
                        <th>Rol</th>
                        <th>fecha ultima conexión</th>
                        <th>Preguntas contestadas</th>
                        <th>primer ingreso</th>
                        <th>fecha vencimiento</th>
                        <th>Estado</th>
                        <th>Accion</th>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Id</td>
                        <td>Nombre</td>
                        <td>Correo</td>
                        <td>Usuario</td>
                        <td>Clave</td>
                        <td>Rol</td>
                        <td>fecha ultima conexión</td>
                        <td>Preguntas contestadas</td>
                        <td>primer ingreso</td>
                        <td>fecha vencimiento</td>
                        <td>Estado</td>
                        <td>
                        <!--Correcion de botones--->    
                        <button type="button" class="btn btn-warning"   data-toggle="modal" data-target="#exampleModalScrollables"> Agregar <i class='fas fa-edit'></i></button> <br><br>

        <!---Comienzo de modal de boton agregar--->

       <!--AQUI EMPIEZA CODIGO DE MODAL-->
        <!-- Modal para nuevo cliente  -->
        <div class="modal fade"  id="exampleModalScrollables" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
          <div class="modal-dialog " role="document">
            <div class="modal-content">
              <div class="modal-header bg-warning text-white" >
                <h5 class="modal-title"  id="exampleModalScrollableTitle">Agregar Usuario</h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form>
                  
                  <div class="form-group">
                    <label class="control-label">Nombre</label>
                    <input class="form-control" type="number" placeholder="">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Correo</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Usuario</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Rol</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>
                  
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary">Agregar</button>
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
                <h5 class="modal-title"  id="exampleModalScrollableTitle">Editar Usuario</h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form>
                <div class="form-group">
                    <label class="control-label">nombre</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Correo</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Usuario</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>

                


                  <div class="form-group">
                    <label class="control-label">Rol</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Estado</label>

                    <div class="form-group">

                      <select class="form-control" id="exampleSelect1">

                        <option>Activo</option>
                        <option>inactivo</option>

                      </select>
                    </div>
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


            <!--Creacion de Modal-->




            <!--Final de Modal-->

<?php include_once "./footer.php"; ?>