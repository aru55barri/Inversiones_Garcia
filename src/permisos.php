<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inversiones Garcia</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../dist/css/styles.css" rel="stylesheet" />

    <!--Link de Modal--->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css"> <!-- ESTE-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"><!-- ESTE-->
    <!------>


    <!--Link para el modal-->
    <script src="assets/js/jquery-3.3.1.min.js"></script><!-- ESTE-->
    <script src="assets/js/popper.min.js"></script><!-- ESTE-->
    <script src="assets/js/bootstrap.min.js"></script><!-- ESTE-->
    <script src="assets/js/main.js"></script><!-- ESTE-->
    
    <!-- The javascript plugin to display page loading on top (modal)--> 
    <script src="assets/js/plugins/pace.min.js"></script>

    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <!---Link para el modal-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><!-- ESTE-->
</head>

<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../dist/index.php">Inversiones Garcia</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../src/Mi_perfil.php">Mi perfil</a></li>
                        <li><a class="dropdown-item" href="../login.php">Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Modulos</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-cart-plus"></i></div>
                                Gestion venta
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../src/factura.php">Factura</a>
                                <a class="nav-link" href="../src/detalle_factura.php">Detalle Factura</a>
                                <a class="nav-link" href="../src/estado_factura.php">Estado Factura</a>
                                <a class="nav-link" href="../src/CAI.php">CAI</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Secundario" aria-expanded="false" aria-controls="Secundario">
                                <div class="sb-nav-link-icon"><i class="fa fa-shopping-cart"></i></div>
                                Gestion Producto
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="Secundario" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../src/producto.php">Producto</a>
                                <a class="nav-link" href="../src/tipo_producto.php">Tipos de Producto</a>
                                <a class="nav-link" href="../src/categoria.php">Categoria</a>
                                <a class="nav-link" href="../src/tipo_categoria.php">Tipo de Categoria</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Tercero" aria-expanded="false" aria-controls="Tercero">
                                <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
                                Gestion Inventario
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="Tercero" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../src/Inventario.php">Inventario</a>
                                <a class="nav-link" href="../src/Inventario_materia.php">Materia prima</a>
                                </nav>
                            </div>

                            <a class="nav-link" href="../src/clientes.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-user-plus"></i></div>
                                Cliente
                            </a>

                            <div class="sb-sidenav-menu-heading">Configuración</div>
     
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Cuarto" aria-expanded="false" aria-controls="Cuarto">
                                <div class="sb-nav-link-icon"><i class="fa fa-lock"></i></div>
                                Seguridad
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="Cuarto" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../src/bitacora.php">Bitacora</a>
                                <a class="nav-link" href="../src/Usuarios.php">Usuarios</a>
                                <a class="nav-link" href="../src/Mantenimiento_Roles.php">Roles</a>
                                <a class="nav-link" href="../src/Mantenimiento_Roles_objetos.php">Roles Objetos</a>
                                <a class="nav-link" href="../src/parametro.php">Parametros</a>
                                <a class="nav-link" href="../src/permisos.php">Permisos</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Quinto" aria-expanded="false" aria-controls="Quinto">
                                <div class="sb-nav-link-icon"><i class="fa fa-wrench"></i></div>
                                Mantenimiento
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="Quinto" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../src/objetos.php">Objetos</a>
                                <a class="nav-link" href="../src/preguntas.php">Preguntas</a>
                                <a class="nav-link" href="../src/preguntas_usuarios.php">Preguntas Usuario</a>
                                </nav>
                            </div>
                           
                            <div class="sb-sidenav-menu-heading">Respaldo</div>
                             
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Sexto" aria-expanded="false" aria-controls="Sexto">
                                <div class="sb-nav-link-icon"><i class="fa fa-key"></i></div>
                                Administracion
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="Sexto" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../src/hist_password.php">Historial Contraseña</a>
                                </nav>
                            </div>
                            
                            <a class="nav-link" href="../src/Backup.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-folder-open"></i></div>
                                Backup
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                    <div class="small">Realizado por:</div>
                        Digital Solution
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content"> <br>


            <h1 class=" text-center" id="letra"> Permisos </h1>
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
          <div class="modal-dialog " role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white" >
                <h5 class="modal-title"  id="exampleModalScrollableTitle">Nuevo Permiso</h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form>
                  <div class="form-group">
                    <label class="control-label">Usuario </label>
                    <input class="form-control" type="text" placeholder="">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Permiso</label>
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
                        <th>Usuario</th>
                        <th>Permiso</th>
                      
            
                        <th>Accion</th>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Id</td>
                        <td>Usuario</td>
                        <td>Permiso</td>
                      

                        <td>
                        <!--Correcion de botones--->    
                        <!--AQUI TERMINA CODIGO DE MODAL BOTON agregar-->
    <!--Final de modal editar-->

          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalScrollablesl">Editar <i class='fas fa-edit'></i></button> <br><br>

          <!--- Creacion de modal de boton editar -->
          <div class="modal fade"  id="exampleModalScrollablesl" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
          <div class="modal-dialog " role="document">
            <div class="modal-content">
              <div class="modal-header bg-success text-white" >
                <h5 class="modal-title"  id="exampleModalScrollableTitle">Editar Permiso</h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form>
                <div class="form-group">
                    <label class="control-label">Usuario</label>
                    <input class="form-control" type="text" placeholder="">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Permiso</label>
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


            <!--Creacion de Modal-->




            <!--Final de Modal-->

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