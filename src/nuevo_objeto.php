<?php include_once "../Login/header.php";
require "../config/conexion.php";
?>
                
                <!--  aqui empieza lo de ususario  -->
                
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="my-modal-title">Nuevo Objeto</h5>
                                <button class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" autocomplete="off">
                                    <div class="form-group">
                                        <label for="nombre">Objeto</label>
                                        <input type="text" class="form-control" placeholder="Ingrese objeto" name="objeto" id="objeto">
                                    </div>
                                    <div class="form-group">
                                        <label for="correo">Descripción</label>
                                        <input type="email" class="form-control" placeholder="Ingrese descripción" name="descripción" id="descripción">
                                    </div>
                                    <div class="form-group">
                                        <label for="correo">Tipo de objeto</label>
                                        <input type="email" class="form-control" placeholder="Ingrese Tipo de objeto" name="Tipo de objeto" id="Tipo de objeto">
                                    </div>
                                    <input type="submit" value="Registrar" class="btn btn-primary">
                                </form>
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