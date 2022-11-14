<?php include_once "../Login/header.php";
require "../config/conexion.php";
?>

            <!-- Empieza lo de cliente-->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                    Modificar Cliente
                            </div>
                            <div class="card-body">
                                    <form class="" action="" method="post">
                                        
                                        <input type="hidden" name="id" value="<?php echo $idcliente; ?>">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" placeholder="Ingrese Nombre" name="nombre" class="form-control" id="nombre" value="nombre">
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            <input type="number" placeholder="Ingrese Teléfono" name="telefono" class="form-control" id="telefono" value="telefono">
                                        </div>
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <input type="text" placeholder="Ingrese Direccion" name="direccion" class="form-control" id="direccion" value="direccion">
                                        </div>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Editar Cliente</button>
                                        <a href="clientes.php" class="btn btn-danger">Atras</a>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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