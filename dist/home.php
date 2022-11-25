<?php include_once "../Login/header.php";
require "../config/conexion.php";
?>

<main>
        <div class="container-fluid px-4">
            <Center><h1 class="mt-4">Inversiones García  <img src="../dist/assets/img/Logo.jpeg" class="logo" > </h1></Center>

            <style>
            h1{
                font-family: Vladimir Script;
                font-size: 80px;
            }

            .logo{
                width:250px;
            }
            </style>
            <br>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body" id="letra"> <strong> <i> Nueva Venta </i></strong> <i id="icono" class="fa fa-cart-plus"></i></div>

                        <style>
                            #icono{
                                font-size: 50px;
                            }

                            #letra{
                                font-size: 25px;
                            }
                        </style>
                        <div class="card-footer card bg-white  ">
                            
                        <?php
                            if($_SESSION['Tipo_Usuario']=="administrador" || $_SESSION['Tipo_Usuario'] == "Ventas"){
                                echo '<a class="small text-black stretched-link" href="../src/NuevaVenta.php">Realizar Nueva Venta <i class="fas fa-angle-right small text-black"  id="flecha"></i></a>';
                            }
                        ?>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body" id="letra"><strong> <i> Factura   </i></strong> <i id="icono" class="fa fa-calculator"></i></div>
                        <div class="card-footer card-footer card bg-white ">

                            <?php
                                if($_SESSION['Tipo_Usuario']=="administrador" || $_SESSION['Tipo_Usuario'] == "Ventas"){
                                    echo '<a class="small text-black stretched-link" href="../src/Factura.php">Visaulizar facturas   <i class="fas fa-angle-right"></i></a>';
                                }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body" id="letra"> <strong> <i> Inventario  </i></strong> <i id="icono" class="fa fa-book"></i></div>
                        <div class="card-footer card bg-white">
                            
                            <?php
                                if($_SESSION['Tipo_Usuario']=="administrador"){
                                    echo '<a class="small text-black stretched-link" href="../src/inventario.php">Visualizacion del inventario  <i class="fas fa-angle-right"></i></a>';
                                }
                            ?>
                           
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body" id="letra"> <strong> <i> Usuarios  </i></strong> <i id="icono" class="fa fa-users"></i></div>
                        <div class="card-footer card bg-white">
                            
                            <?php
                                if($_SESSION['Tipo_Usuario']=="administrador"){
                                    echo '<a class="small text-black stretched-link" href="../Login/vista_usuarios.php">Visualizar Usuarios  <i class="fas fa-angle-right"></i></a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            
            <br>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div  class="modal-header bg-secondary text-white" id="letra">  
                            
                        <strong> <i>  Misión  </i></strong>
                        </div>
                        <p>Elaborar y comercializar vinos de alta calidad, con el propósito 
                            de ofrecer a nuestros clientes la posibilidad de disfrutar un nuevo 
                            concepto en vinos ofreciendo diversas alternativas de sabor para 
                                satisfacer a las necesidades y expectativas de los gustos más exigentes. 
                            </p>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="modal-header bg-secondary text-white" id="letra">
                        <strong> <i>  Visión  </i></strong>
                            
                        </div>
                        <p>Ser una empresa líder en la industria de los vinos, reconocida a nivel 
                            nacional por su calidad e innovación en la elaboración de productos con 
                            identidad hondureña, y procurando la satisfacción de nuestros clientes 
                            y posicionarnos como la mejor opción al momento de elegir una bebida.
                            </p>

                    </div>
                </div>
            </div>

            <center><h1>Nuestros Productos</h1>
            <!--Contenido-->
                <main>
                    <div class="containert">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <!--Producto 1-->
                            <div class="col">
                            <div class="card shadow-sm">
                                <img src="../dist/assets/img/3.jpeg" >
                            <div class="card-body">
                            <h5 class="card-title">Variedad de:</h5>
                        <p class="card-text">  vinos y frutos deshidratados</p>
                        </div>
                        </div>
                    </div>

                    <!--Producto 2-->
                    <div class="col">
                            <div class="card shadow-sm">
                            <img src="../dist/assets/img/1.jpeg" >
                            <div class="card-body">
                            <h5 class="card-title">Elixir Tropical Rambután</h5>
                        <p class="card-text"> <strong> Lps. 300.00</strong></p>
                        </div>
                        </div>
                    </div>

                    <!--Producto 3-->
                    <div class="col">
                            <div class="card shadow-sm">
                            <img src="../dist/assets/img/6.jpeg" >
                            <div class="card-body">
                            <h5 class="card-title">Elixir Tropical Garcinia</h5>
                        <p class="card-text"> <strong> Lps. 300.00</strong></p>
                        </div>
                        </div>
                    </div>



                    <!--Producto 4-->
                    <div class="col">
                            <div class="card shadow-sm">
                            <img src="../dist/assets/img/7.jpeg" >
                            <div class="card-body">
                            <h5 class="card-title">Elixir Tropical Lovi Lovi</h5>
                        <p class="card-text"> <strong> Lps. 300.00</strong></p>
                        </div>
                        </div>
                    </div>


                    <!--Producto 5-->
                    <div class="col">
                            <div class="card shadow-sm">
                            <img src="../dist/assets/img/8.jpeg" >
                            <div class="card-body">
                            <h5 class="card-title">Elixir Tropical Mangusteen</h5>
                        <p class="card-text"> <strong> Lps. 500.00</strong></p>
                        </div>
                        </div>
                    </div>

                    <!--Producto 6-->
                    <div class="col">
                            <div class="card shadow-sm">
                            <img src="../dist/assets/img/11.jpeg" >
                            <div class="card-body">
                            <h5 class="card-title">Elixir Tropical Maracuyá</h5>
                        <p class="card-text"> <strong> Lps. 300.00</strong></p>
                        </div>
                        </div>
                    </div>

                    <!--Producto 7-->
                    <div class="col">
                            <div class="card shadow-sm">
                            <img src="../dist/assets/img/2.jpeg" >
                            <div class="card-body">
                            <h5 class="card-title">Frutas Deshidratada</h5>
                        <p class="card-text">Piña, Papaya, Melon, Mango, Jackfruit </p>
                        </div>
                        </div>
                    </div>


                    <!--Producto 8-->
                    <div class="col">
                            <div class="card shadow-sm">
                            <img src="../dist/assets/img/4.jpeg" >
                            <div class="card-body">
                            <h5 class="card-title">Frutas Deshidratada</h5>
                            <p class="card-text"> <strong> Lps. 50.00</strong></p>
                        </div>
                        </div>
                    </div>


                    <!--Producto 9-->
                    <div class="col">
                            <div class="card shadow-sm">
                            <img src="../dist/assets/img/9.jpeg" >
                            <div class="card-body">
                            <h5 class="card-title">Vinos</h5>
                            <p class="card-text"> <strong> de 300.00 Lps hasta 500.00 Lps  c/u</strong></p>
                        </div>
                        </div>
                    </div>

                </div>
                </div>
            </main>

    </div>
</main>
<?php include_once "../Login/footer.php"; ?>