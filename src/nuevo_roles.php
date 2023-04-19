
<?php
include_once "../Login/header.php";
include '../config/conn.php';
require_once '../controladores/controlador_roles.php';


if (!empty($_POST)) {

    $ROL = $_POST['txtrol'];
    $DESCRIPCION = $_POST['txtDescripcionrol'];
    $resultado = insert_rol($ROL, $DESCRIPCION);

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
                 location.href ='../src/Mantenimiento_roles.php';
             }
         })    
     </script>";
     $_SESSION['registrarRol'] = 'Registra';
    } else {
        echo "<script>Notiflix.Notify.failure('Error al registrar el Rol');</script>";
    }
}

?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<br><br><br><br><br><br><br><br><br>
<main>
    <div class="container" style="margin-top: -200px; margin-bottom: 20px;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header" style="background-color: rgb(171, 237, 230);">
                        <h3 class="text-center font-weight-light my-4">Registrar Rol</h3>
                    </div>
                    <div class="card-body">


                        <form id="form-register" class="needs-validation" method="POST" novalidate>

                            <div class="form-floating mb-3">
                            <input class="form-control" name="txtrol" id="inputrol" onblur="validarRol(this)" type="text" maxlength="30" onpaste="return false" onkeypress="return sololetrasMa(event)" autocomplete="nope" placeholder="Rol" required />
                                <label for="inputrol">Rol</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div id="mensaje"></div>
                            </div>

                            <div class="form-floating mb-3">
                            <input class="form-control" name="txtDescripcionrol" id="inputDescripcionrol" type="text" maxlength="50" onpaste="return false" onkeypress="return sololetrasDesc(event)" autocomplete="nope" placeholder="Descripcion rol" required />
                                <label for="inputDescripcionrol">Descripcion</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <span id="Descmensaje"></span>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="button" class="btn btn-info " style="background-color:rgba(0, 177, 33, 0.91);" value="Registrar" />
        
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
                    ajax.open("GET", "../src/vereficar_roles.php?rol=" + NombreRol.value, true); //DIRECCION DE LA PETICION
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
                    $("#mensaje").text("Campo valido!").css("color", "green");
                    document.querySelector('#button').disabled = false;
                    rol.style.borderColor = "green";
                    rol.style.boxShadow = "0 0 10px green";

                }
            }

            function sololetrasDesc(e) {
                var descripcion = document.getElementById('inputDescripcionrol');
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
                    $("#Descmensaje").text("Campo valido!").css("color", "green");
                    document.querySelector('#button').disabled = false;
                    if (bandera == true) {
                       
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
                var Descripcionrol = document.getElementById('inputDescripcionrol');

                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (rol.value.trim() == '') {
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
                                        if (Descripcionrol.value == "") { //AGREGAR
                                            Descripcionrol.style.borderColor = "red";
                                            Descripcionrol.style.boxShadow = "0 0 10px red";
                                        }
                                        document.getElementById('mensaje').innerHTML = ""; //agregar a los otros
                                    }
                                })
                                .catch((err) => {

                                });
                        } else if (Descripcionrol.value.trim() == '') {
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
                                        if (rol.value == "") { //AGREGAR
                                            rol.style.borderColor = "red";
                                            rol.style.boxShadow = "0 0 10px red";
                                        }
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

        <!--FUNCION DE NO COPIAR Y PEGAR-->
        <script>
            window.onload = function() {
                var rol = document.getElementById('inputrol');
                var descripcion = document.getElementById('inputDescripcionrol');
                rol.onpaste = function(e) {
                    e.preventDefault();
                }

                rol.oncopy = function(e) {
                    e.preventDefault();
                }

                descripcion.onpaste = function(e) {
                    e.preventDefault();
                }

                descripcion.oncopy = function(e) {
                    e.preventDefault();
                }
            }
        </script>
        <!--_______________________________________________________________________________________________________-->
    </div>
</main>
<?php
include_once('../Login/footer.php');
?>