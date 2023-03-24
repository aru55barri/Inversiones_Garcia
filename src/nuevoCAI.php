<?php
include_once('../Login/header.php');
require_once '../config/conexion.php';
include_once '../modelos/modelo_CAI.php';
include_once('../controladores/controlador_CAI.php');

$usuario = new CAI();
//$estado = $usuario->obtenerEstado();

$db = getConexion();

if ($_POST) {
    $rango_inicial = $_POST['rango_inicial'];
    $rango_final = $_POST['rango_final'];
    $rango_actual = $rango_inicial;
    $numero_CAI = $_POST['numero_CAI'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $usuario = 1;

    $resultado = CAIContralador::InsertarCAI($rango_inicial, $rango_final, $rango_actual, $numero_CAI, $fecha_vencimiento, $usuario);
  
}
?>





<br><br><br><br><br><br><br><br>
<main>
<script src="./js/validar.js" type="text/javascript"></script>
    <div class="container" style="margin-top: -200px; margin-bottom: 20px;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header" style="background-color: rgb(171, 237, 230);">
                        <h3 class="text-center font-weight-light my-4">Nuevo Registro CAI</h3>
                    </div>
                    <div class="card-body">

                        <form class="needs-validation" id="form-register" method="POST">

                            <div class="form-floating">
                                <input class="form-control" name="rango_inicial" id="rango_inicial" type="text" placeholder="Enter your last name" autocomplete="nope" required />
                                <label for="rango_inicial"><i class="fa-solid fa-user-group"></i>&nbsp;RANGO INICIAL</label>
                                <div class="valid-feedback">
                                    Campo Válido.
                                </div>
                                <span id="mensaje"></span>
                            </div>
                            <br>
                            <div class="form-floating">
                                <input class="form-control" name="rango_final" id="rango_final" type="text" placeholder="Enter your last name" autocomplete="nope" required />
                                <label for="rango_final"><i class="fa-solid fa-user-group"></i>&nbsp;RANGO FINAL</label>
                                <div class="valid-feedback">
                                    Campo Válido.
                                </div>
                                <span id="mensaje"></span>
                            </div>
                            
                            <br>
                            <!--
                            <div class="form-floating">
                                <input class="form-control" name="descripcion" id="descripcion" type="text" onkeypress="return sololetrasMa(event)" onpaste="return false" placeholder="Enter your last name" autocomplete="nope" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,25}" />
                                <label for="inputLastName"><i class="fa-solid fa-user-group"></i>&nbsp;RANGO ACTUAL</label>
                                <div class="valid-feedback">
                                    Campo Válido.
                                </div>
                                <span id="mensaje"></span>
                            </div>
                            
                            <br>
                            -->
                            <div class="form-floating">
                                <input class="form-control" name="numero_CAI" id="numero_CAI" type="text" placeholder="Enter your last name" autocomplete="nope" required  />
                                <label for="numero_CAI"><i class="fa-solid fa-user-group"></i>&nbsp;NUMERO CAI</label>
                                <div class="valid-feedback">
                                    Campo Válido.
                                </div>
                                <span id="mensaje"></span>
                            </div>
                            
                            <br>

                            <div class="form-floating mb-3 mb-md-0">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" type="date" required />
                                    <label for="fecha_vencimiento"><i class="fas fa-envelope icon"></i>&nbsp;Fecha de vencimiento</label>
                                    <span id="fechamensaje"></span>
                                </div>
                            </div>
                            <br>
                            

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="button" class="btn btn-info" style="background-color:rgba(0, 177, 33, 0.91);" value="Registrar" />
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid"><input type="button" onclick="window.location.href='../src/CAI.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="./js/validar.js" type="text/javascript"></script>
        <script src="./js/moment.js"></script>
        <script src="./js/jquery.js" type="text/javascript"></script>

        <script>
            (() => {
                'use strict'

                const forms = document.querySelectorAll('.needs-validation')

                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })

                /**AGREGADO POR DENIA */
                //validar DNI
                var nombre = document.getElementById('descripcion');

                nombre.addEventListener('keypress', function(e) {
            if (e.keyCode > 90 ) {
                e.preventDefault();
                //efecto de sombra color rojo en el borde
                nombre.style.borderColor = "red";
                nombre.style.boxShadow = "0 0 10px red";
                nombre.classList.add("is-invalid");
                nombre.classList.remove("is-valid");
            } else {
                //efecto de sombra color verde en el borde
                nombre.style.borderColor = "green";
                nombre.style.boxShadow = "0 0 10px green";
                nombre.classList.add("is-valid");
                nombre.classList.remove("is-invalid");
            }
        });


                //validar Fecha
                document.getElementById("naci").addEventListener("change", validarFecha);

            })()
        </script>


    </div>
</main>





<?php
include_once('../Login/footer.php');
?>