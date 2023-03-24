<?php

include_once('../Login/header.php');
require_once '../controladores/controlador_cliente.php';
 
if (!empty($_POST)) {

    $nombre = $_POST['txtnombre'];
    $DNI = $_POST['txtdni'];
    $telefono = $_POST['txttelefono'];
    $rtn = $_POST['txtrtn'];
    $direccion = $_POST['txtdireccion']; 

    $resultado = InsertarCliente($nombre,$DNI,$telefono,$rtn,$direccion);

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
                location.href ='../src/vista_cliente.php';
            }
        })    
    </script>";
    $_SESSION['registrarPro'] = 'Registra';
    } else {
        echo "<script>Notiflix.Notify.Failure('Error al registrar el cliente');</script>";
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
                        <b>
                            <h3 class="text-center font-weight-light my-4">Registrar Cliente</h3>
                        </b>
                    </div>
                    <div class="card-body">

                        <form id="form-register" class="needs-validation" method="POST" >

                            <div class="form-floating mb-3">
                                <input class="form-control" name="txtnombre" id="txtnombre"  type="text" required/>
                                <label for="inputEmail"><i class="fas fa-user icon"></i>&nbsp;Nombre Cliente</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-tooltip">
                                                Solo Debe Ingresar Letras Mayusculas 
                                            </div>
                                <div id="mensaje"></div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="txtdni" id="txtdni" type="number" onkeypress="return solonumeros(event)" autocomplete="nope" placeholder="Ingrese el nombre del proveedor" required maxlength="8" />
                                <label for="inputEmail"><i class="fa-solid fa-mobile-screen"></i>&nbsp;DNI</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor complete el campo, Solo Debe Ingresar Números.
                                </div>
                                <div id="mensaje2"></div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="txttelefono" id="txttelefono" type="number" onkeypress="return solonumeros2(event)" autocomplete="nope" placeholder="Ingrese el nombre del proveedor" required maxlength="8" />
                                <label for="inputEmail"><i class="fa-solid fa-phone"></i>&nbsp;Contacto Telefono</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor complete el campo, Solo Debe Ingresar Números.
                                </div>
                                <div id="mensaje3"></div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="txtrtn" id="txtrtn" autocomplete="nope" placeholder="Ingrese el nombre del proveedor"  maxlength="50" />
                                <label for="inputEmail"><i class=""></i>&nbsp;RTN</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor complete el campo, Solo Debe Ingresar Números.
                                </div>
                                <div id="mensaje4"></div>
                            </div>


                            <div class="form-floating mb-3">
                                <input class="form-control" name="txtdireccion" id="txtdireccion" autocomplete="nope" placeholder="Ingrese el nombre del proveedor" required maxlength="200" />
                                <label for="inputEmail"><i class="fa-brands fa-facebook"></i>&nbsp;Direccion</label>
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
<!-- V -->
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><input type="button" onclick="window.location.href='../src/vista_cliente.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />
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
        var dni = document.getElementById('txtdni');
        var telefono = document.getElementById('txttelefono');
        var rtn = document.getElementById('txtrtn');
        var direccion = document.getElementById('txtdireccion');

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
        direccion.addEventListener('keypress', function(e) {
            if ( e.keyCode > 90 ) {
                e.preventDefault();
                //efecto de sombra color rojo en el borde
                direccion.style.borderColor = "red";
                direccion.style.boxShadow = "0 0 10px red";
                direccion.classList.add("is-invalid");
                direccion.classList.remove("is-valid");
            } else {
                //efecto de sombra color verde en el borde
                direccion.style.borderColor = "green";
                direccion.style.boxShadow = "0 0 10px green";
                direccion.classList.add("is-valid");
                direccion.classList.remove("is-invalid");
            }
        });
   
        
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include_once('../Login/footer.php');
?>