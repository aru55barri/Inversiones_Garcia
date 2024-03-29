<?php
include_once '../modelos/modelo_principal.php';

include '../config/conn.php';

session_start();

if (!empty($_SESSION)) {
    $nombre = $_SESSION['nombre'];
    $Rol = $_SESSION['Tipo_Usuario'];
}
else
{
    header('Location: ../Login/login.php?loggeado=false');
    //echo("<script>location.href = '../Login/login.php?loggeado=false';</script>");
}

if(!empty($_GET))
{
    if(isset($_GET['cerrarSesion']))
    {
        if($_GET['cerrarSesion'] == true)
        {
            $modeloPrincipal = new ModeloPrincipal();

            date_default_timezone_set('America/Mexico_City');
            $fecha = date("Y-m-d-H:i:s");
            $IDUS = $_SESSION['id_usuario'];

            include '../config/conn.php';


            $rs = mysqli_query($conn, "SELECT * FROM tbl_usuario where id_usuario = $IDUS");
            $row = mysqli_fetch_array($rs);
            $Usuarioo = $row['usuario'];

            $sql = "INSERT INTO tbl_bitacora(id, fecha, id_usuario, id_objeto, accion, descripcion)
            VALUES(null,'$fecha','$IDUS',1, 'CERRAR','$Usuarioo CERRÓ SESIÓN')";
            $modeloPrincipal->insertargeneral($sql);

            session_destroy();
            echo "<script>window.location.href='../Login/login.php';</script>";

          
        }
    }
}

require_once '../controladores/controladorLogin.php';
include '../config/conn.php';

$sql1 = mysqli_query($conn, "SELECT * FROM tbl_config_empresa where id = 1");
$rom = mysqli_fetch_array($sql1);

$nombre2 = $rom['nombre'];
$tel = $rom['tel'];
$direccion = $rom['direccion'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $rom['nombre'] ?></title>
        <link rel="icon" href="../dist/assets/img-2/Logo-IG.ico">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../dist/css/styles.css" rel="stylesheet" />
        <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../Login/vendors/x/dist/notiflix-3.2.5.min.css" />
        <script src="../Login/vendors/notiflix/dist/notiflix-3.2.5.min.js"></script>
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
        <!--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> ESTE PARA LAS GRAFICAS-->
        <!--<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.1/dist/chart.min.js"></script>-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>





        
        <!-- The javascript plugin to display page loading on top (modal)--> 
        <script src="assets/js/plugins/pace.min.js"></script>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="../dist/css/contenedor.css" rel="stylesheet" />

        <!--<link href="../Login/build/css/custom.min.css" rel="stylesheet">-->
        <link href="../Login/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../Login/vendors/notiflix/dist/notiflix-3.2.5.min.css" />
        <!--botones-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" />
        <!--Libreria para imask-->
        <script src="https://unpkg.com/imask"></script>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" id="titulo_menu" href="../dist/home.php"> <?= $rom['nombre'] ?> </a>
            
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $nombre ?> <i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                     <!--<li><a class="dropdown-item" href="../src/Mi_perfil.php">Mi perfil</a></li>-->
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

                            <?php
                     
                            $rol = $_SESSION['rol'];
                            
                            $result = mysqli_query($conn, "select * from tbl_modulos tm inner join tbl_permisos tp ON tm.ID_OBJETO = tp.ID_OBJETO where tm.ID_PADRE = 0 and tp.permiso_consultar = 1 and tp.ID_ROL = '$rol'"); ?>
                            <?php foreach ($result as $i) : ?>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapsePersonas<?= $i['id_objeto'] ?>" aria-expanded="false" aria-controls="pagesCollapseError">
                                    &nbsp;&nbsp;<?= $i['Objeto'] ?>
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <?php
                                $id = $i['id_objeto'];
                                $res = mysqli_query($conn, "select * from tbl_modulos tm inner join tbl_permisos tp ON tm.ID_OBJETO = tp.ID_OBJETO where tm.ID_PADRE = '$id' and tp.permiso_consultar = 1 and tp.ID_ROL = '$rol'");
                                ?>
                                <div class="collapse" id="pagesCollapsePersonas<?= $i['id_objeto'] ?>" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                    <?php foreach($res as $j): ?> 
                                        <a class="nav-link" href="<?=$j['URL'] ?>"><?= $j['Objeto'] ?></a>
                                    <?php endforeach; ?>
                                        <!-- <a class="nav-link" href="../vistas/vista_empleados.php">Empleados</a>
                                        <a class="nav-link" href="500.html">Clientes</a> -->
                                    </nav>
                                </div>
                            <?php endforeach; ?>

                            <!--
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

                            <a class="nav-link" href="../src/vista_cliente.php">
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
                    -->
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Realizado por:</div>
                        Digital Solution
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content"> <br>
            <?php



?>

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
    function imprimir(id, cliente, cai) {
        Swal.fire({
            title: 'FACTURA',
            text: "¿Desea imprimir la factura?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, Imprimir!'
        }).then((result)=> {
            if(result.value){
                window.location.href = "../pdf/generar.php?id=" + id +"&cliente=" + cliente +"&CAI="+ cai;
              
          }
        } )
    }
 
</script>