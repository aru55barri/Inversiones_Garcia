<?php include_once "../Login/header.php";
    require("../config/conexion.php");

?>

            <h1 class=" text-center" id="letra">  Bitacora  </h1>
                       <style>
                        h1{
                            font-family: Vladimir Script;
                            font-size: 80px;
                        }
                       </style>
       
        <!--Comienzo de modal (Boton Nuevo)-->
        
            <!--colocacion de codigo-->

            <!--AQUI EMPIEZA CODIGO DE MODAL-->
        <!--AQUI TERMINA CODIGO DE MODAL BOTON NUEVO-->

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
                        <th>Fecha</th>
                        <th>Usuario</th>
                        <th>Objeto</th>
                        <th>Acción</th>
                        <th>Descripción</th>
                    
                    </thead>
                    <tbody>
                        <tr>
                        <td>id</td>
                        <td>fecha</td>
                        <td>usuario</td>
                        <td>objeto</td>
                        <td>accion</td>
                        <td>descripcion</td>
                        
                        <!--Correcion de botones--->    
                        
       <!--AQUI EMPIEZA CODIGO DE MODAL-->
        
                                
                                
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

<?php include_once "../Login/footer.php"; ?>