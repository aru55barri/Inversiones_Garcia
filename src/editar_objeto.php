<?php include_once "../Login/header.php";
require "../config/conexion.php";
?>
                
                <!--  aqui empieza lo de ususario  -->
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Modificar Permiso
                            </div>
                            <div class="card-body">
                                <form class="" action="" method="post">
                                    <input type="hidden" name="id" value="idpermiso">
                                    <div class="form-group">
                                        <label for="Rol">Objeto</label>
                                        <input type="text" placeholder="Ingrese objeto" class="form-control" name="objeto" id="objeto" value="objeto">

                                    </div>
                                    <div class="form-group">
                                        <label for="descripción">Descripción</label>
                                        <input type="text" placeholder="Ingrese descripción" class="form-control" name="descripción" id="descripción" value="descripción">

                                    </div>
                                    <div class="form-group">
                                        <label for="Tipo de objeto">Tipo de objeto</label>
                                        <input type="text" placeholder="Ingrese Tipo de objeto" class="form-control" name="Tipo de objeto" id="Tipo de objeto" value="Tipo de objeto">

                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i></button>
                                    <a href="mantenimiento_objetos.php" class="btn btn-danger">Atras</a>
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