<?php
include_once "../Login/header.php";
require_once '../controladores/controlador_tipo_producto.php';

if (!empty($_GET)) {

    $id = base64_decode($_GET["id"]);
    $DatosTipoProducto = get_tipo_producto_ID($id);
}

if (!empty($_POST)) {
    $id_tip_producto = $_POST['txtIDtipoproducto'];
    $desctipo_tip_producto = $_POST['txtDesctipoproducto'];

    $resultado = editar_tipo_producto($id_tip_producto, $desctipo_tip_producto);

    if ($resultado == true) {

        //redirigir a la pagina principal con javascript
        echo "<script>
      window.location.href='../src/tipo_producto.php';
      </script>";
        //guardar en session que se edita correctamente
        $_SESSION['EditarTipoProducto'] = "Listo";
    } else {
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
                        <h3 class="text-center font-weight-light my-4">Editar Tipo Producto #<?php echo $DatosTipoProducto['id'] ?></h3>
                    </div>
                    <div class="card-body">


                        <form id="form-register" class="needs-validation" method="POST" novalidate>



                            <div class="form-floating mb-3 mb-md-3">
                                <input class="form-control " name="txtIDtipoproducto" id="inputIDtiproducto" type="text" value="<?php if (!empty($_GET)) { echo base64_decode($_GET['id']); } ?>" readonly required />
                                <label for="inputIDtipoproducto"><i class="fas fa-user icon"></i>&nbsp;ID Tipo Producto</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="txtDesctipoproducto" id="inputDesctipoproducto" type="text" onpaste="return false" onkeypress="return sololetrasMa(event)" autocomplete="nope" value="<?php if (!empty($_GET)) { echo $DatosTipoProducto['descripcion']; } ?>" required />
                                <label for="inputDesctipoproducto"><i class="fas fa-user icon"></i>&nbsp;Descripcion Tipo Producto</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <span id="mensaje"></span>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="button" class="btn btn-info " style="background-color:rgba(46, 182, 210, 0.8);" value="Actualizar" />
                                </div>
                                <br>
                                <div class="d-grid"><input type="button" onclick="window.location.href='../src/tipo_producto.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />

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
                var tipoProducto = document.getElementById('inputDesctipoproducto');
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
                    tipoProducto.style.borderColor = "red";
                    tipoProducto.style.boxShadow = "0 0 10px red";
                    return false;
                } else {
                    $("#mensaje").text("Campo valido!").css("color", "green");
                    document.querySelector('#button').disabled = false;
                    tipoProducto.style.borderColor = "green";
                    tipoProducto.style.boxShadow = "0 0 10px green";

                }
            }
        </script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            //validar que no se envie el formulario si lleva un campo con espacios en blanco
            (() => {
                'use strict'

                const forms = document.querySelectorAll('.needs-validation')
                var Producto = document.getElementById('inputDesctipoproducto');

                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (Producto.value.trim() === '') {
                            event.preventDefault()
                            event.stopPropagation()

                            swal.fire({
                                    title: 'Error',
                                    text: "No puede dejar el campo Producto en blanco",
                                    type: 'error',
                                    icon: 'error',
                                    confirmButtonText: '¡ok!',
                                }).then((result) => {
                                    if (result.value) {
                                        Producto.focus();
                                        Producto.value = "";
                                        Producto.style.borderColor = "red";
                                        Producto.style.boxShadow = "0 0 10px red";
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

            var Producto = document.getElementById("inputDesctipoproducto");

            //al detectar un cambio en el imput se habilita el boton  EVENTO CHANGE
            Producto.addEventListener("change", function() {
                if (Producto.value != "") {
                    document.getElementById("button").disabled = false;
                }
            });
        </script>

        <!--_______________________________________________________________________________________________________-->
    </div>
</main>