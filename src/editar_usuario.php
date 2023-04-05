<?php include_once "../Login/header.php";
require "../config/conexion.php";
?>
                
                <!--  aqui empieza lo de ususario  -->
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Modificar Usuario
                            </div>
                            <div class="card-body">
                                <form class="" action="" method="post">
                                    <input type="hidden" name="id" value="idusuario">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" placeholder="Ingrese nombre" class="form-control" name="nombre" id="nombre" value="nombre">

                                    </div>
                                    <div class="form-group">
                                        <label for="correo">Correo</label>
                                        <input type="text" placeholder="Ingrese correo" class="form-control" name="correo" id="correo" value="correo">

                                    </div>
                                    <div class="form-group">
                                        <label for="usuario">Usuario</label>
                                        <input type="text" placeholder="Ingrese usuario" class="form-control" name="usuario" id="usuario" value="usuario">

                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i></button>
                                    <a href="usuarios.php" class="btn btn-danger">Atras</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                 
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