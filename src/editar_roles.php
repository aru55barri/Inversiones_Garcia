<?php
include_once "../Login/header.php";
require_once '../controladores/controlador_roles.php';

if (!empty($_GET)) {

    $id = base64_decode($_GET["id"]);
    $DatosRol = get_rol_ID($id);
}

if (!empty($_POST)) {
    $id_rol = $_POST['txtIDrol'];
    $rol = $_POST['txtrol'];
    $descRol = $_POST['txtDescRol'];

    $resultado = editar_rol($id_rol, $rol, $descRol);

    if ($resultado == true) {

        //redirigir a la pagina principal con javascript
        echo "<script>
      window.location.href='../src/Mantenimiento_Roles.php';
      </script>";
        //guardar en session que se edita correctamente
        $_SESSION['EditarRol'] = "Listo";
    } else {
    }
}

?>

<br><br><br><br><br><br><br><br><br><br><br>
<main>
    <div class="container" style="margin-top: -200px; margin-bottom: 20px;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header" style="background-color: rgb(171, 237, 230);">
                        <h3 class="text-center font-weight-light my-4">Editar Rol #<?php echo $DatosRol['id_rol'] ?></h3>
                    </div>
                    <div class="card-body">


                        <form id="form-register" class="needs-validation" method="POST" novalidate>

                            <div class="form-floating mb-3 mb-md-3">
                                <input class="form-control " name="txtIDrol" id="inputIDrol" type="text" value="<?php if (!empty($_GET)) {
                                                                                                                    echo base64_decode($_GET['id']);
                                                                                                                } ?>" readonly required />
                                <label for="inputIDrol"><i class="fas fa-user icon"></i>&nbsp;ID Rol </label>
                            </div>


                            <div class="form-floating mb-3">
                                <input class="form-control" name="txtrol" id="inputrol" onblur="validarRol(this)" type="text" onpaste="return false" onkeypress="return sololetrasMa(event)" autocomplete="nope" value="<?php if (!empty($_GET)) { echo $DatosRol['rol']; } ?>" required />
                                <label for="inputrol"><i class="fas fa-user icon"></i>&nbsp;Rol</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div id="mensaje"></div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="txtDescRol" id="inputDescRol" type="text" onpaste="return false" onkeypress="return sololetrasDesc(event)" autocomplete="nope" value="<?php if (!empty($_GET)) { echo $DatosRol['descripcion']; } ?>" required />
                                <label for="inputDescRol"><i class="fas fa-user icon"></i>&nbsp;Descripción</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <span id="Descmensaje"></span>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="button" class="btn btn-info " style="background-color:rgba(46, 182, 210, 0.8);" value="Actualizar" />
                                </div>
                                <br>
                                <div class="d-grid"><input type="button" onclick="window.location.href='../src/Mantenimiento_Roles.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- VALIDACIONES DE SOLO INGRESO DE LETRAS MAYUSCULAS-->
        <script>
            var bandera = false;

            function validarRol(NombreRol) {
                ajax = new XMLHttpRequest();

                if (NombreRol.value.trim() != '') {
                    //ajax = new XMLHttpRequest(); //PARA HACER UNA PETICION DE DIRECCION DE UNA API
                    ajax.open("GET", "../src/verefica_roles.php?rol=" + NombreRol.value, true); //DIRECCION DE LA PETICION
                    ajax.send();
                    ajax.onreadystatechange = function() {
                        if (ajax.readyState == 4 && ajax.status == 200) {
                            respuesta = ajax.responseText;

                            if (respuesta == 'Rol Disponible') {
                                if (document.getElementById('inputrol').value != '') {
                                    document.getElementById('inputrol').style.borderColor = "green";
                                    document.getElementById('mensaje').style.color = "green";
                                    document.getElementById('inputrol').style.boxShadow = "0 0 10px green";
                                    document.getElementById('mensaje').innerHTML = "<i class='fas fa-check-circle'></i>Rol Disponible";
                                    document.getElementById('button').disabled = false;
                                    bandera = true;
                                }

                            } else {
                                document.getElementById('inputrol').style.borderColor = "red";
                                document.getElementById('mensaje').style.color = "red";
                                document.getElementById('inputrol').style.boxShadow = "0 0 10px red";
                                document.getElementById('mensaje').innerHTML = "<i class='fas fa-times-circle'></i>Rol No Disponible";
                                document.getElementById('button').disabled = true;
                                bandera = false;
                            }

                        }
                    }
                }
            }

            function sololetrasMa(e) {
                var rol = document.getElementById('inputrol');
                key = e.keyCode || e.which;
                teclado = String.fromCharCode(key);
                /*letras="abcdefghijklmnopqrstuvwxyz";.toLowerCase()*/
                letras = " ABCDEFGHIJKLMNOPQRSTUVWXYZ";
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
                    $("#mensaje").text("Por favor solo ingrese letras Mayusculas").css("color", "red");
                    rol.style.borderColor = "red";
                    rol.style.boxShadow = "0 0 10px red";
                    return false;
                } else {
                    $("#mensaje").text("").css("color", "green");
                    document.querySelector('#button').disabled = false;
                    rol.style.borderColor = "green";
                    rol.style.boxShadow = "0 0 10px green";

                }
            }

            function sololetrasDesc(e) {
                var descripcion = document.getElementById('inputDescRol');
                key = e.keyCode || e.which;
                teclado = String.fromCharCode(key);
                /*letras="abcdefghijklmnopqrstuvwxyz";.toLowerCase()*/
                letras = " ABCDEFGHIJKLMNOPQRSTUVWXYZ";
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
                    $("#Descmensaje").text("Por favor solo ingrese letras Mayusculas").css("color", "red");
                    descripcion.style.borderColor = "red";
                    descripcion.style.boxShadow = "0 0 10px red";
                    return false;
                } else {
                    $("#Descmensaje").text("").css("color", "green");
                    if (bandera == true) {
                        document.querySelector('#button').disabled = false;
                    }
                    descripcion.style.borderColor = "green";
                    descripcion.style.boxShadow = "0 0 10px green";

                }
            }
        </script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            //validar que no se envie el formulario si lleva un campo con espacios en blanco
            (() => {
                'use strict'

                const forms = document.querySelectorAll('.needs-validation')
                var rol = document.getElementById('inputrol');
                var Descripcionrol = document.getElementById('inputDescRol');

                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (rol.value.trim() === '') {
                            event.preventDefault()
                            event.stopPropagation()

                            swal.fire({
                                    title: 'Error',
                                    text: "No puede dejar el campo rol en blanco",
                                    type: 'error',
                                    icon: 'error',
                                    confirmButtonText: '¡ok!',
                                }).then((result) => {
                                    if (result.value) {
                                        rol.focus();
                                        rol.value = "";
                                        rol.style.borderColor = "red";
                                        rol.style.boxShadow = "0 0 10px red";
                                    }
                                })
                                .catch((err) => {

                                });
                        } else if (Descripcionrol.value.trim() === '') {
                            event.preventDefault()
                            event.stopPropagation()

                            swal.fire({
                                    title: 'Error',
                                    text: "No puede dejar el campo Descripcion rol en blanco",
                                    type: 'error',
                                    icon: 'error',
                                    confirmButtonText: '¡ok!',
                                }).then((result) => {
                                    if (result.value) {
                                        Descripcionrol.focus();
                                        Descripcionrol.value = "";
                                        Descripcionrol.style.borderColor = "red";
                                        Descripcionrol.style.boxShadow = "0 0 10px red";
                                    }
                                })
                                .catch((err) => {

                                });
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
            })()
        </script>

        <script>
            //Funcion que al iniciar el boton aparezca bloqueado
            document.getElementById("button").disabled = true;

            var rol = document.getElementById("inputrol");
            var Descripcion = document.getElementById("inputDescRol");

            //al detectar un cambio en el imput se habilita el boton  EVENTO CHANGE
            rol.addEventListener("change", function() {
                if (rol.value != "") {
                    document.getElementById("button").disabled = false;
                }
            });

            Descripcion.addEventListener("change", function() {
                if (Descripcion.value != "") {
                    document.getElementById("button").disabled = false;
                }
            });
        </script>

        <!--_______________________________________________________________________________________________________-->
    </div>
</main>