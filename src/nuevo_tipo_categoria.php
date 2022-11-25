<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

include_once('../Login/header.php');
require_once '../controladores/controlador_tipo_categoria.php';


if (!empty($_POST)) {

    $nombre = $_POST['txtnombre'];

    $resultado = InsertarCliente($nombre);

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
                location.href ='../src/tipo_categoria.php';
            }
        })    
    </script>";
    $_SESSION['registrarPro'] = 'Registra';
    } else {
        echo "<script>Notiflix.Notify.Failure('Error al registrar tipo categoria');</script>";
    }
}


?>


<br><br><br><br><br><br><br><br><br>
<main>
    <div class="container" style="margin-top: -200px; margin-bottom: 20px;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header" style="background-color: rgb(171, 237, 230);">
                        <b>
                            <h3 class="text-center font-weight-light my-4">Registrar Tipo Categoria</h3>
                        </b>
                    </div>
                    <div class="card-body">

                        <form id="form-register" class="needs-validation" method="POST" >

                            <div class="form-floating mb-3">
                                <input class="form-control" name="txtnombre" id="txtnombre"  type="text" required/>
                                <label for="inputEmail"><i class="fas fa-user icon"></i>&nbsp;Categoria</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-tooltip">
                                                Solo Debe Ingresar Letras Mayusculas 
                                            </div>
                                <div id="mensaje"></div>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="button" class="btn btn-info" style="background-color:rgba(0, 177, 33, 0.91);" value="Registrar" />

                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><input type="button" onclick="window.location.href='../src/tipo_categoria.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- VALIDACIONES DE SOLO INGRESO DE LETRAS MAYUSCULAS-->
        

    </div>
</main>
<script src="js/scripts.js"></script>
<script src="./js/lock.js"></script>

<!--VALIDACIONES EN TIEMPO REAL-->
    <script>
        var nombre = document.getElementById('txtnombre');
   

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
   
        
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include_once('../Login/footer.php');
?>