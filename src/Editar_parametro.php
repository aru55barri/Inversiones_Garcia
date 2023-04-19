<?php
include_once('../Login/header.php');
require_once '../controladores/controlador_parametro.php';

if (!empty($_GET)) {

    $id = base64_decode($_GET["id"]);
    $DatosParametros = get_parametro_ID($id);
}

if (!empty($_POST)) {

    $id = $_POST['txtIDparametro'];
    $parametro = $_POST['txtparametro'];
    $valor = $_POST['txtvalor'];
    $fecha_creacion = $_POST['txtfechacreacion'];
    $fecha_modificacion = $_POST['txtfechamodificacion'];

    $resultado = editar_parametro($id, $parametro, $valor, $fecha_creacion, $fecha_modificacion);

    if ($resultado == true) {

        //redirigir a la pagina principal con javascript
        echo "<script>
      window.location.href='../src/parametro.php';
      </script>";
        //guardar en session que se edita correctamente
        $_SESSION['EditarParametro'] = "Listo";
    } else {
    }
}

//$DateAndTime = date('Y-m-d H:i:s a', time());
//echo "<script>alert('asdfdsfadsfa are $dateAndTime');</script>";

?>

<br><br><br><br><br><br><br><br><br><br><br>
<main>
    <div class="container" style="margin-top: -200px; margin-bottom: 20px;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header" style="background-color: rgb(171, 237, 230);">
                        <h3 class="text-center font-weight-light my-4">Editar Parametro #<?php echo $DatosParametros['id'] ?></h3>
                    </div>
                    <div class="card-body">


                        <form id="form-register" class="needs-validation" method="POST" novalidate>



                            <div class="form-floating mb-3 mb-md-3">
                                <input class="form-control " name="txtIDparametro" id="inputIDparametro" type="text" value="<?php if (!empty($_GET)) { echo base64_decode($_GET['id']);} ?>" readonly required />
                                <label for="inputIDparametro"><i class="fas fa-user icon"></i>&nbsp;ID Parametro</label>
                            
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control"  name="txtparametro" id="inputparametro" onpaste="return false" onkeypress="return sololetrasMa(event)" autocomplete="nope" value="<?php if (!empty($_GET)) { echo $DatosParametros['parametro']; } ?>" type="text" readonly required />
                                <label for="inputparametro"><i class="fas fa-user icon"></i>&nbsp;Parametro</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div id="mensaje"></div>
                            </div>

                            <div class="form-floating mb-3">
                            <input class="form-control" name="txtvalor" id="inputvalor" type="text" maxlength="10" onpaste="return false" onkeypress="return sololetrasynumerosValor(event)" autocomplete="nope" value="<?php if (!empty($_GET)) {echo $DatosParametros['valor'];} ?>" required />
                                <label for="inputvalor"><i class="fas fa-user icon"></i>&nbsp;Valor</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <span id="valormensaje"></span>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" type="timestamp" readonly name="txtfechacreacion" id="dtpfechacreacion" value="<?php if (!empty($_GET)) { echo $DatosParametros['fecha_creacion']; } ?>" placeholder="Fecha inicio" readonly required />
                                <label for="inputfechacreacion">Fecha Creacion</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <span id="correomensaje"></span>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" type="date" readonly name="txtfechamodificacion" id="dtpfechamodificacion" value="<?php if (!empty($_GET)) { echo obtenerFechaActual(); } ?>" placeholder="Fecha inicio" required />
                                <label for="inputfechamodificacion">Fecha Modificacion</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <span id="correomensaje"></span>
                            </div>

                            <div class="form-floating mb-3 mb-md-3">
                                <input class="form-control " name="txtIDusuario" id="inputIDusuario" type="text" value="<?php if (!empty($_GET)) {
                                                                                                                            echo $DatosParametros['id'];
                                                                                                                        } ?>" readonly required />
                                <label for="inputIDusuario"><i class="fas fa-user icon"></i>&nbsp;ID Usuario</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <span id="mensaje"></span>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="button" class="btn btn-info " style="background-color:rgba(46, 182, 210, 0.8);" value="Actualizar" />
                                </div>
                                <br>
                                <div class="d-grid"><input type="button" onclick="window.location.href='../src/parametro.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- VALIDACIONES DE SOLO INGRESO DE LETRAS MAYUSCULAS-->
        <script>
           /* function sololetrasMa(e) {
                var parametro = document.getElementById('inputparametro');
                key = e.keyCode || e.which;
                teclado = String.fromCharCode(key);
                
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
            }*/

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
                    $("#valormensaje").text("").css("color", "green");
                    //document.querySelector('#button').disabled = false;
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
                                        document.getElementById('mensaje').innerHTML = "";
                                    }
                                })
                                .catch((err) => {

                                });
                        } else if (valor.value.trim() == '') {
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
                                        if (parametro.value == "") {//AGREGAR
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

        <script>
            //Funcion que al iniciar el boton aparezca bloqueado
            document.getElementById("button").disabled = true;

            var nombreParametro = document.getElementById("inputparametro");
            var valorParametro = document.getElementById("inputvalor");

            //al detectar un cambio en el imput se habilita el boton  EVENTO CHANGE
            nombreParametro.addEventListener("change", function() {
                if (nombreParametro.value != "") {
                    document.getElementById("button").disabled = false;
                }
            });

            valorParametro.addEventListener("change", function() {
                if (valorParametro.value != "") {
                    document.getElementById("button").disabled = false;
                }
            });
        </script>

        <script type="text/javascript">
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
        </script>
        <!--_______________________________________________________________________________________________________-->
    </div>
</main>