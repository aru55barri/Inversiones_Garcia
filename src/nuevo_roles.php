<?php
include_once "../Login/header.php";
include '../config/conn.php';
include_once '../controladores/controlador_roles.php';
$usuario = new Contralador();
$db = getConexion();
if ($_POST) {
    $rol = $_POST['rol'];
    $descripcion = $_POST['descripcion'];
    $usuario->Insertar($rol, $descripcion);
}
?>
<br><br><br><br><br><br><br><br><br><br><br>
<main>
    <div class="container" style="margin-top: -200px; margin-bottom: 20px;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header" style="background-color: rgb(171, 237, 230);">
                        <b>
                            <h3 class="text-center font-weight-light my-4">Registrar rol</h3>
                        </b>
                    </div>
                    <div class="card-body">

                        <form class="needs-validation" id="form-register" method="POST" novalidate>

                            <div class="form-floating">
                                <input class="form-control" name="rol" id="inputLastName" type="text" onpaste="return false" onkeypress="return sololetrasMa(event)" placeholder="Rol" autocomplete="nope" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,25}" />
                                <label for="inputLastName"><i class="fa-solid fa-user-group"></i>&nbsp;Rol</label>
                                <div class="valid-feedback">
                                    Campo Válido.
                                </div>
                                <span id="mensaje"></span>
                            </div>
                            <br>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="descripcion" id="inputEmail" type="text" onpaste="return false" onkeypress="return sololetrasAp(event)" placeholder="Descripcion" required />
                                <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;Descripcion</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <span id="1mensaje"></span>
                            </div>


                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="button" class="btn btn-info" style="background-color:rgba(0, 177, 33, 0.91);" value="Registrar" />

                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><input type="button" onclick="window.location.href='../src/Mantenimiento_roles.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />

                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <script src="./js/validar.js" type="text/javascript"></script>
            <script src="./js/moment.js"></script>
            <script src="./js/jquery.js" type="text/javascript"></script>

            <!-- VALIDACION QUE EL FORMULARIO NO SE VAYA EN EN BLANCO-->
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>
                (() => {
                    'use strict'

                    const forms = document.querySelectorAll('.needs-validation')
                    var nombreCargo = document.getElementById('inputLastName');
                    var descripcion = document.getElementById('inputEmail');
                    Array.from(forms).forEach(form => {
                        form.addEventListener('submit', event => {
                            if (nombreCargo.value.trim() == '') {
                                event.preventDefault()
                                event.stopPropagation()
                                Swal.fire({
                                        title: 'Error',
                                        text: 'No puede dejar el campo Rol en blanco',
                                        type: 'error',
                                        icon: 'error',
                                        confirmButtonText: 'Ok'
                                    }).then((result) => {
                                        if (result.value) {
                                            nombreCargo.focus();
                                            nombreCargo.value = "";
                                            nombreCargo.style.borderColor = "red";
                                            nombreCargo.style.boxShadow = "0 0 10px red";
                                            document.getElementById('mensaje').innerHTML = "";
                                        }
                                    })
                                    .catch((err) => {

                                    });
                            }

                            //form.classList.add('was-validated')
                        }, false)
                    })
                })()
            </script>

        </div>
</main>



<?php
include_once('../Login/Footer.php');
?>