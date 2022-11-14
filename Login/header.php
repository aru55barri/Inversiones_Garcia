<?php
session_start();

if (!empty($_SESSION)) {
    $nombre = $_SESSION['nombre'];
    $Rol = $_SESSION['Tipo_Usuario'];
}
else
{
    header('Location: ../Login/login.php?loggeado=false');
}

if(!empty($_GET))
{
    if(isset($_GET['cerrarSesion']))
    {
        if($_GET['cerrarSesion'] == true)
        {
            session_destroy();
            echo "<script>window.location.href='../Login/login.php';</script>";
        }
    }
}

require_once './../controladores/controladorLogin.php';
include './../config/conn.php';
?>

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
        <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

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

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="../dist/css/contenedor.css" rel="stylesheet" />

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" id="titulo_menu" href="../dist/home.php">  Inversiones García  </a>
            
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
                        <li><a class="dropdown-item" onclick="cerrarSesion()">Cerrar Sesion</a></li>
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
                                <a class="nav-link" href="../src/factura.php">Factura    </a>
                                <a class="nav-link" href="../src/detalle_factura.php">Detalle Factura</a>
                                <a class="nav-link" href="../src/estado_factura.php">Estado Factura</a>
                                <a class="nav-link" href="../src/Promociones.php">Promociones</a>
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
                                <a class="nav-link" href="../src/Inventario_materia.php">Compra de Materia prima</a>
                                </nav>
                            </div>

                            <a class="nav-link" href="../Login/vista_cliente.php">
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
                                <a class="nav-link" href="../Login/bitacora.php">Bitacora</a>
                                <a class="nav-link" href="../Login/vista_usuarios.php">Usuarios</a>
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
                                <a class="nav-link" href="../src/CAI.php">CAI</a>
                                <a class="nav-link" href="../src/tipo_producto.php">Tipos de Producto</a>
                                <a class="nav-link" href="../src/categoria.php">Categoria</a>
                                <a class="nav-link" href="../src/tipo_categoria.php">Tipo de Categoria</a>    
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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function cerrarSesion() {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, cerrar sesión!'
        }).then((result) => {
            if (result.value) {
                window.location.href = "../Login/header.php?cerrarSesion=true";
            }
        })
    }
</script>