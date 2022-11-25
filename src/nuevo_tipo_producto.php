<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include_once "../Login/header.php";
include '../config/conn.php';

require_once '../controladores/controlador_tipo_producto.php';

if (!empty($_POST)) {

    $descripcion = $_POST['txtDescripciontipoProducto'];
    $resultado = insert_producto($descripcion);

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
                location.href ='../Paginas/vista_tipo_producto.php';
            }
        })    
    </script>";
    $_SESSION['registrartipo'] = 'Registra';
    } else {
        echo "<script>Notiflix.Notify.failure('Error al registrar el Tipo producto');</script>";
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
                        <h3 class="text-center font-weight-light my-4">Registrar Tipo Producto</h3>
                    </div>
                    <div class="card-body">


                        <form id="form-register" class="needs-validation" method="POST" novalidate>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="txtDescripciontipoProducto" id="inputDescripciontipoProdcto" type="text" onpaste="return false" onkeypress="return sololetrasMa(event)" autocomplete="nope" placeholder="Descripcion tipo producto" required="true" />
                                <label for="inputDescripciontipoProducto">Descripcion tipo producto</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <span id="mensaje"></span>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="button" class="btn btn-info " style="background-color:rgba(0, 177, 33, 0.91);" value="Registrar" />
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
                var tipoProducto = document.getElementById('inputDescripciontipoProdcto');
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
                var Descripcion = document.getElementById('inputDescripciontipoProdcto');

                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {

                        if (Descripcion.value.trim() === '') {
                            event.preventDefault()
                            event.stopPropagation()

                            swal.fire({
                                    title: 'Error',
                                    text: "No puede dejar el campo Descripcion en blanco",
                                    type: 'error',
                                    icon: 'error',
                                    confirmButtonText: '¡ok!',
                                }).then((result) => {
                                    if (result.value) {
                                        Descripcion.focus();
                                        Descripcion.value = "";
                                        Descripcion.style.borderColor = "red";
                                        Descripcion.style.boxShadow = "0 0 10px red";
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

        <!--_______________________________________________________________________________________________________-->
    </div>
</main>