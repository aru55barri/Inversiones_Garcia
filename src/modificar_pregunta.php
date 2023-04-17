<?php
include_once "../Login/header.php";
require_once '../controladores/controlador_preguntas.php';

if (!empty($_GET)) {

    $id = base64_decode($_GET["id"]);
    $DatosPregunta = get_pregunta_ID($id);
}

if (!empty($_POST)) {
    $id_pregunta = $_POST['txtIDpregunta'];
    $pregunta = $_POST['txtpregunta'];

    $resultado = editar_pregunta($id_pregunta, $pregunta);

    if ($resultado == true) {

        //redirigir a la pagina principal con javascript
        echo "<script>
      window.location.href='../src/preguntas.php';
      </script>";
        //guardar en session que se edita correctamente
        $_SESSION['EditarPregunta'] = "Listo";
    } else {
    }
}

?>


<main>
    <div class="container" style="margin-top: -200px; margin-bottom: 140px;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header" style="background-color: rgb(171, 237, 230);">
                        <h3 class="text-center font-weight-light my-4">Editar Pregunta #<?php echo $DatosPregunta['id_pregunta'] ?></h3>
                    </div>
                    <div class="card-body">


                        <form id="form-register" class="needs-validation" method="POST" novalidate>



                            <div class="form-floating mb-3 mb-md-3">
                                <input class="form-control " name="txtIDpregunta" id="inputIDpregunta" type="text" value="<?php if (!empty($_GET)) {
                                                                                                                                echo base64_decode($_GET['id']);
                                                                                                                            } ?>" readonly required />
                                <label for="inputIDpregunta"><i class="fas fa-user icon"></i>&nbsp;ID Pregunta</label>
                            </div>


                            <div class="form-floating mb-3">
                                <input class="form-control" name="txtpregunta" onblur="validarPregunta(this)" id="inputpregunta" type="text" onpaste="return false" onkeypress="return sololetrasMa(event)" autocomplete="nope" maxlength="60" value="<?php if (!empty($_GET)) {echo $DatosPregunta['pregunta'];} ?>" required />
                                <label for="inputpregunta"><i class="fas fa-user icon"></i>&nbsp;Pregunta</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div id="mensaje"></div>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="button" class="btn btn-info " style="background-color:rgba(46, 182, 210, 0.8);" value="Actualizar" />
                                </div>
                                <br>
                                <div class="d-grid"><input type="button" onclick="window.location.href='../src/preguntas.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!-- VALIDACIONES DE SOLO INGRESO DE LETRAS MAYUSCULAS-->
            <script>
                function sololetrasMa(e) {
                    var pregunta = document.getElementById('inputpregunta');
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
                    var pregunta = document.getElementById('inputpregunta');

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

            <script>
                //Funcion que al iniciar el boton aparezca bloqueado
                document.getElementById("button").disabled = true;

                var Pregunta = document.getElementById("inputpregunta");

                //al detectar un cambio en el imput se habilita el boton  EVENTO CHANGE
                Pregunta.addEventListener("change", function() {
                    if (Pregunta.value != "") {
                        document.getElementById("button").disabled = false;
                    }
                });
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
                                    if (document.getElementById('inputpregunta').value != '') {
                                        document.getElementById('inputpregunta').style.borderColor = "green";
                                        document.getElementById('mensaje').style.color = "green";
                                        document.getElementById('inputpregunta').style.boxShadow = "0 0 10px green";
                                        document.getElementById('mensaje').innerHTML = "<i class='fas fa-check-circle'></i>Pregunta Disponible";
                                        document.getElementById('button').disabled = false;
                                    }

                                } else {
                                    document.getElementById('inputpregunta').style.borderColor = "red";
                                    document.getElementById('mensaje').style.color = "red";
                                    document.getElementById('inputpregunta').style.boxShadow = "0 0 10px red";
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