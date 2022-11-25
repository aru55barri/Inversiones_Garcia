<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include_once "../Login/header.php";
include '../config/conn.php';
require_once '../controladores/controlador_preguntas.php';

if (!empty($_POST)) {

    $PREGUNTA = $_POST['txtPregunta'];
    $resultado = insert_pregunta($PREGUNTA);

    if ($resultado == true) {

        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'EXCELENTE!',
            text: 'Registro con Exito!',
            confirmButtonText: 'Aceptar',
            position:'center',
            allowOutsideClick:false,
            padding:'1rem'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href ='../src/preguntas.php';
            }
        })    
    </script>";
    $_SESSION['registrarPregunta'] = 'Registra';
    } else {
        echo "<script>Notiflix.Notify.failure('Error al registrar la Pregunta');</script>";
    }
}

?>


<br><br><br><br><br><br><br><br><br><br><br><br><br>
<main>
    <div class="container" style="margin-top: -200px; margin-bottom: 20px;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header" style="background-color: rgb(171, 237, 230);">
                        <h3 class="text-center font-weight-light my-4">Registrar Pregunta</h3>
                    </div>
                    <div class="card-body">


                        <form id="form-register" class="needs-validation" method="POST" novalidate>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="txtPregunta" onblur=" validarPregunta(this)" id="inputPregunta" type="text" onpaste="return false" onkeypress="return sololetrasMa(event)" autocomplete="nope" placeholder="Pregunta" required />
                                <label for="inputDescripcionPago">Pregunta</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div id="mensaje"></div>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="button" class="btn btn-info " style="background-color:rgba(0, 177, 33, 0.91);" value="Registrar" />
                                </div>
                                <br>
                                <div class="d-grid"><input type="button" onclick="window.location.href='../Paginas/vista_pregunta.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- VALIDACIONES DE SOLO INGRESO DE LETRAS MAYUSCULAS-->
        <script>
            function sololetrasMa(e) {
                var pregunta = document.getElementById('inputPregunta');
                key = e.keyCode || e.which;
                teclado = String.fromCharCode(key);
                /*letras="abcdefghijklmnopqrstuvwxyz";.toLowerCase()*/
                letras = " ABCDEFGHIJKLMNOPQRSTUVWXYZ¿?";
                especiales = "8-37-38-46-164";
                teclado_especial = false;

                for (var i in especiales) {
                    if (key == especiales[i]) {

                        teclado_especial = true;
                        break;

                    }
                }
                if (letras.indexOf(teclado) == -1 && !teclado_especial) {
                    document.querySelector('#button').disabled = true;
                    $("#mensaje").text("Por favor solo ingrese letras Mayusculas y Signos de Interrogación").css("color", "red");
                    pregunta.style.borderColor = "red";
                    pregunta.style.boxShadow = "0 0 10px red";
                    return false;
                } else {
                    $("#mensaje").text("Campo Valido!").css("color", "green");
                    document.querySelector('#button').disabled = false;
                    pregunta.style.borderColor = "green";
                    pregunta.style.boxShadow = "0 0 10px green";

                }
            }
        </script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            //validar que no se envie el formulario si lleva un campo con espacios en blanco
            (() => {
                'use strict'

                const forms = document.querySelectorAll('.needs-validation')
                var pregunta = document.getElementById('inputPregunta');

                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {

                        if (pregunta.value.trim() == '') {
                            event.preventDefault()
                            event.stopPropagation()

                            swal.fire({
                                    title: 'Error',
                                    text: "No puede dejar el campo Pregunta en blanco",
                                    type: 'error',
                                    icon: 'error',
                                    confirmButtonText: '¡ok!',
                                }).then((result) => {
                                    if (result.value) {
                                        pregunta.focus();
                                        pregunta.value = "";
                                        pregunta.style.borderColor = "red";
                                        pregunta.style.boxShadow = "0 0 10px red";
                                        document.getElementById('mensaje').innerHTML = "";
                                    }
                                })
                                .catch((err) => {

                                });
                        }

                       // form.classList.add('was-validated')
                    }, false)
                })
            })()
        </script>

        <script type="text/javascript">
            //VALIDAR QUE EL PARAMETRO NO SE REPITA
            function validarPregunta(NombrePregunta) {
                ajax = new XMLHttpRequest();

                if (NombrePregunta.value.trim() != '') {
                    //ajax = new XMLHttpRequest(); //PARA HACER UNA PETICION DE DIRECCION DE UNA API
                    ajax.open("GET", "../vistas/vereficar_pregunta.php?pregunta=" + NombrePregunta.value, true); //DIRECCION DE LA PETICION
                    ajax.send();
                    ajax.onreadystatechange = function() {
                        if (ajax.readyState == 4 && ajax.status == 200) {
                            respuesta = ajax.responseText;

                            if (respuesta == 'Pregunta Disponible') {
                                if (document.getElementById('inputPregunta').value != '') {
                                    document.getElementById('inputPregunta').style.borderColor = "green";
                                    document.getElementById('mensaje').style.color = "green";
                                    document.getElementById('inputPregunta').style.boxShadow = "0 0 10px green";
                                    document.getElementById('mensaje').innerHTML = "<i class='fas fa-check-circle'></i>Pregunta Disponible";
                                    document.getElementById('button').disabled = false;
                                }

                            } else {
                                document.getElementById('inputPregunta').style.borderColor = "red";
                                document.getElementById('mensaje').style.color = "red";
                                document.getElementById('inputPregunta').style.boxShadow = "0 0 10px red";
                                document.getElementById('mensaje').innerHTML = "<i class='fas fa-times-circle'></i>Pregunta No Disponible";
                                document.getElementById('button').disabled = true;
                            }

                        }
                    }
                }
            }
        </script>
        <!--_______________________________________________________________________________________________________-->
    </div>
</main>