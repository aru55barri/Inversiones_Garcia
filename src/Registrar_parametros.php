<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

require_once '../controladores/controlador_parametro.php';


if (!empty($_POST)) {

    $parametro = $_POST['txtparametro'];
    $valor = $_POST['txtvalor'];
    $fecha_creacion = $_POST['txtfechacreacion'];
    $fecha_modificacion = $_POST['txtfechamodificacion'];
    $resultado = insert_paramtros($parametro, $valor, $fecha_creacion, $fecha_modificacion);

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
                location.href ='../src/parametro.php';
            }
        })    
    </script>";
    $_SESSION['registrarParametros'] = 'Registra';
    } else {
        echo "<script>Notiflix.Notify.failure('Error al registrar el parametro');</script>";
    }
}

?>

<br><br><br><br><br><br><br><br><br><br>
<main>
    <div class="container" style="margin-top: -200px; margin-bottom: 20px;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header" style="background-color: rgb(171, 237, 230);">
                        <h3 class="text-center font-weight-light my-4">Registrar Parametro</h3>
                    </div>
                    <div class="card-body">
                        <form id="form-register" class="needs-validation" method="POST" novalidate>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="txtparametro" onblur=" validarParametro(this)" id="inputparametro" type="text" onpaste="return false" onkeypress="return sololetrasMa(event)" autocomplete="nope" placeholder="Parametro" required />
                                <label for="Inputparametro">Parametro</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div id="mensaje"></div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="txtvalor" id="inputvalor" type="text" onpaste="return false" onkeypress="return sololetrasynumerosValor(event)" autocomplete="nope" placeholder="Valor" required />
                                <label for="inputvalor">Valor</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <span id="valormensaje"></span>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" type="date" name="txtfechacreacion" id="dtpfechacreacion" value="<?php echo obtenerFechaActual(); ?>" placeholder="Fecha de creacion" readonly required />
                                <label for="inputfechacreacion">Fecha creacion</label>
                                <div class="valid-feedback" id="fechaCreacionMensaje">
                                    Campo Válido!
                                </div>
                                <span id="correomensaje"></span>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" type="date" name="txtfechamodificacion" id="dtpfechaNacimiento" value="<?php echo obtenerFechaActual(); ?>" placeholder="Fecha de modificacion" readonly required />
                                <label for="inputfechamodificacion">fecha modificacion</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <span id="correomensaje"></span>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="button" class="btn btn-info " style="background-color:rgba(0, 177, 33, 0.91);" value="Registrar" />
                                </div>
                                <br>
                                <div class="d-grid"><input type="button" onclick="window.location.href='../Paginas/vista_parametros.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- <script>
            // VALIDACIONES DE SOLO INGRESO DE LETRAS MAYUSCULAS
            function sololetrasMa(e) {
                var parametro = document.getElementById('inputparametro');
                key = e.keyCode || e.which;
                teclado = String.fromCharCode(key);
                /*letras="abcdefghijklmnopqrstuvwxyz";.toLowerCase()*/
                letras = " ABCDEFGHIJKLMNOPQRSTUVWXYZ_";
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
                    parametro.style.borderColor = "red";
                    parametro.style.boxShadow = "0 0 10px red";
                    return false;
                } else {
                    $("#mensaje").text("").css("color", "red");
                    document.querySelector('#button').disabled = false;
                    parametro.style.borderColor = "green";
                    parametro.style.boxShadow = "0 0 10px green";

                }
            }

            function sololetrasynumerosValor(e) {
                var valor = document.getElementById('inputvalor');
                key = e.keyCode || e.which;
                teclado = String.fromCharCode(key);
                /*letras="abcdefghijklmnopqrstuvwxyz";.toLowerCase()*/
                letras = " ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
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
                    $("#valormensaje").text("Por favor solo puede ingrese letras Mayusculas y Numeros").css("color", "red");
                    valor.style.borderColor = "red";
                    valor.style.boxShadow = "0 0 10px red";
                    return false;
                } else {
                    $("#valormensaje").text("").css("color", "red");
                    //document.querySelector('#button').disabled = false; //COMENTAR LINEA
                    valor.style.borderColor = "green";
                    valor.style.boxShadow = "0 0 10px green";

                }
              
            }
        </script>-->

        <script>
            var bandera = false;

            function validarParametro(NombreParametro) {
                ajax = new XMLHttpRequest();
                if (NombreParametro.value.trim() != '') {
                    ajax.open("GET", "../vistas/vereficaParametro.php?parametro=" + NombreParametro.value, true);
                    ajax.send();
                    ajax.onreadystatechange = function() {
                        if (ajax.readyState == 4 && ajax.status == 200) {
                            respuesta = ajax.responseText;

                            if (respuesta == 'Nombre de Parametro Disponible') {
                                document.getElementById('mensaje').style.color = "green";
                                document.getElementById('mensaje').innerHTML = "<i class='fas fa-check-circle'></i> Nombre de Parametro Disponible";
                                document.getElementById('button').disabled = false;
                                bandera = true;
                            } else {
                                document.getElementById('inputparametro').style.borderColor = "red";
                                document.getElementById('mensaje').style.color = "red";
                                document.getElementById('inputparametro').style.boxShadow = "0 0 10px red";
                                document.getElementById('mensaje').innerHTML = "<i class='fas fa-times-circle'></i> Nombre de Parametro No Disponible";
                                document.getElementById('button').disabled = true;
                                bandera = false;
                            }

                        }
                    }
                }
            }

            function sololetrasMa(e) {
                var parametro = document.getElementById('inputparametro');
                key = e.keyCode || e.which;
                teclado = String.fromCharCode(key);
                /*letras="abcdefghijklmnopqrstuvwxyz";.toLowerCase()*/
                letras = " ABCDEFGHIJKLMNOPQRSTUVWXYZ_";
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
                    parametro.style.borderColor = "red";
                    parametro.style.boxShadow = "0 0 10px red";
                    return false;
                } else {
                    $("#mensaje").text("Campo valido!").css("color", "green");
                    document.querySelector('#button').disabled = false;
                    parametro.style.borderColor = "green";
                    parametro.style.boxShadow = "0 0 10px green";

                }
            }

            function sololetrasynumerosValor(e) {
                var valor = document.getElementById('inputvalor');
                key = e.keyCode || e.which;
                teclado = String.fromCharCode(key);
                /*letras="abcdefghijklmnopqrstuvwxyz";.toLowerCase()*/
                letras = " ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
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
                    $("#valormensaje").text("Por favor solo puede ingrese letras Mayusculas y Numeros").css("color", "red");
                    valor.style.borderColor = "red";
                    valor.style.boxShadow = "0 0 10px red";
                    return false;
                } else {
                    $("#valormensaje").text("Campo valido!").css("color", "green");
                    if (bandera == true) {
                        document.querySelector('#button').disabled = false;
                    }
                    valor.style.borderColor = "green";
                    valor.style.boxShadow = "0 0 10px green";

                }
            }
        </script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            //validar que no se envie el formulario si lleva un campo con espacios en blanco
            (() => {
                'use strict'

                const forms = document.querySelectorAll('.needs-validation')
                var parametro = document.getElementById('inputparametro');
                var valor = document.getElementById('inputvalor');

                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (parametro.value.trim() == '') {
                            event.preventDefault()
                            event.stopPropagation()

                            swal.fire({
                                    title: 'Error',
                                    text: "No puede dejar el campo Parametro en blanco",
                                    type: 'error',
                                    icon: 'error',
                                    confirmButtonText: '¡ok!',
                                }).then((result) => {
                                    if (result.value) {
                                        parametro.focus();
                                        parametro.value = "";
                                        parametro.style.borderColor = "red";
                                        parametro.style.boxShadow = "0 0 10px red";
                                        if (valor.value == "") { //AGREGAR
                                            valor.style.borderColor = "red";
                                            valor.style.boxShadow = "0 0 10px red";
                                        }
                                        document.getElementById('mensaje').innerHTML = ""; //agregar a los otros
                                    }
                                })
                                .catch((err) => {

                                });
                        } else if (valor.value.trim() == '') { //QUITARLE UN IGUAL
                            event.preventDefault()
                            event.stopPropagation()

                            swal.fire({
                                    title: 'Error',
                                    text: "No puede dejar el campo Valor en blanco",
                                    type: 'error',
                                    icon: 'error',
                                    confirmButtonText: '¡ok!',
                                }).then((result) => {
                                    if (result.value) {
                                        valor.focus();
                                        valor.value = "";
                                        valor.style.borderColor = "red";
                                        valor.style.boxShadow = "0 0 10px red";
                                        if (parametro.value == "") { //AGREGAR
                                            parametro.style.borderColor = "red";
                                            parametro.style.boxShadow = "0 0 10px red";
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

        <!-- <script type="text/javascript">
            //VALIDAR QUE EL PARAMETRO NO SE REPITA
            function validarParametro(NombreParametro) {
                ajax = new XMLHttpRequest();

                if (NombreParametro.value.trim() != '') {
                    //ajax = new XMLHttpRequest(); //PARA HACER UNA PETICION DE DIRECCION DE UNA API
                    ajax.open("GET", "../vistas/vereficaParametro.php?parametro=" + NombreParametro.value, true); //DIRECCION DE LA PETICION
                    ajax.send();
                    ajax.onreadystatechange = function() {
                        if (ajax.readyState == 4 && ajax.status == 200) {
                            respuesta = ajax.responseText;

                            if (respuesta == 'Nombre de Parametro Disponible') {
                                if (document.getElementById('inputparametro').value != '') {
                                    document.getElementById('inputparametro').style.borderColor = "green";
                                    document.getElementById('mensaje').style.color = "green";
                                    document.getElementById('inputparametro').style.boxShadow = "0 0 10px green";
                                    document.getElementById('mensaje').innerHTML = "<i class='fas fa-check-circle'></i>Nombre de Parametro Disponible";
                                    document.getElementById('button').disabled = false;
                                }

                            } else {
                                document.getElementById('inputparametro').style.borderColor = "red";
                                document.getElementById('mensaje').style.color = "red";
                                document.getElementById('inputparametro').style.boxShadow = "0 0 10px red";
                                document.getElementById('mensaje').innerHTML = "<i class='fas fa-times-circle'></i>Nombre de Parametro No Disponible";
                                document.getElementById('button').disabled = true;
                            }

                        }
                    }
                }
            }
        </script>-->
        <!--FUNCION DE NO COPIAR Y PEGAR-->
        <script>
            window.onload = function() {
                var parametro = document.getElementById('inputparametro');
                var valor = document.getElementById('inputvalor');
                parametro.onpaste = function(e) {
                    e.preventDefault();
                }

                parametro.oncopy = function(e) {
                    e.preventDefault();
                }

                valor.onpaste = function(e) {
                    e.preventDefault();
                }

                valor.oncopy = function(e) {
                    e.preventDefault();
                }
            }
        </script>

        <!--_______________________________________________________________________________________________________-->
    </div>
</main>