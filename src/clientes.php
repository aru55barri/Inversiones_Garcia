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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    
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
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <a class="nav-link" href="../src/nueva_venta.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Nueva Venta
                            </a>
                            <div class="sb-sidenav-menu-heading">Modulos</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Gestion venta
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Factura</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Producto</a>
                                </nav>
                            </div>

                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Inventario
                            </a>

                            <a class="nav-link" href="../src/clientes.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Cliente
                            </a>

                            <div class="sb-sidenav-menu-heading">Configuración</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Seguridad
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Mantenimiento
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Mantenimiento Permiso</a>
                                            <a class="nav-link" href="register.html">Mantenimiento Roles</a>
                                            <a class="nav-link" href="password.html">Mantenimiento Objetos</a>

                                            <!----->
                                        </nav>
                                    </div>
                                    <a class="nav-link" href="../src/usuarios.php">
                                   <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Usuario
                                   </a>

                                   <a class="nav-link" href="index.php">
                                   <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Permisos
                                   </a>
     
                            </div>
                            <div class="sb-sidenav-menu-heading">Respaldo</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Backup
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Admnistración
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                
                <!--  aqui empieza lo de cliente  -->
                <!--Boton de nuevo cliente-->
                <center> <form action="" method="post" class="confirmar d-inline">
                <a href="../src/nuevo_cliente.php" class="btn btn-primary">Nuevo<i ></i></a>
                </form> </center>

        
                <div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="my-modal-title">Nuevo Usuario</h5>
                                <button class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" autocomplete="off">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" placeholder="Ingrese Nombre" name="nombre" id="nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="correo">Correo</label>
                                        <input type="email" class="form-control" placeholder="Ingrese Correo Electrónico" name="correo" id="correo">
                                    </div>
                                    <div class="form-group">
                                        <label for="usuario">Usuario</label>
                                        <input type="text" class="form-control" placeholder="Ingrese Usuario" name="usuario" id="usuario">
                                    </div>
                                    <div class="form-group">
                                        <label for="clave">Contraseña</label>
                                        <input type="password" class="form-control" placeholder="Ingrese Contraseña" name="clave" id="clave">
                                    </div>
                                    <input type="submit" value="Registrar" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="tablax" class="table table-hover table-striped table-bordered mt-2" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id Cliente</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>Id usuario</th>
                                <th>Estado</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>idcliente</td>
                                <td>nombre</td>
                                <td>telefono</td>
                                <td>direccion</td>
                                <td>ususario id</td>
                                <td>Estado</td>
                                <td>
                                    <a href="" class="btn btn-warning">Agregar<i class=''></i></a>
                                    <a href="../src/editar_cliente.php" class="btn btn-success">Editar<i class=''></i></a>
                                    <form action="" method="post" class="confirmar d-inline">
                                        <button class="btn btn-danger" type="submit">Eliminar<i class=''></i> </button>
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
                            scrollY: 400,
                            lengthMenu: [ [10, 25, -1], [10, 25, "All"] ],
                        });
                    });
                </script>
                <!--  aqui termina lo de ususario  -->

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; UNAH 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
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