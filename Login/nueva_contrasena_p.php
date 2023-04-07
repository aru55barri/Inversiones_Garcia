<?php

require_once '../controladores/controladorLogin.php';

if (!empty($_GET)) {
    $username = $_GET['user'];
}
$mensajeError = "";
$maximoContra = obtenerMaximoContra();

if (!empty($_POST['user'])) {
    $username = $_POST['user'];
} elseif (!empty($_POST['username'])) {
    $username = $_POST['username'];
}


if (!empty($_POST) && empty($_POST['username'])) {
    if (empty($_POST['txtContra']) && empty($_POST["txtConfirmarContra"])) {
        echo '<div class="alert alert-danger">
        <strong>Error!</strong> Debe llenar todos los campos.
        </div>';
    } else if (empty($_POST['txtContra'])) {
        echo '<div class="alert alert-danger">
        <strong>Error!</strong> Debe llenar el campo de contraseña.
        </div>';
    } else if (empty($_POST['txtConfirmarContra'])) {
        echo '<div class="alert alert-danger">
        <strong>Error!</strong> Debe llenar el campo de confirmar contraseña.
        </div>';
    } else if ($_POST['txtContra'] != $_POST['txtConfirmarContra']) {
        echo '<div class="alert alert-danger">
        <strong>Error!</strong> Las contraseñas no coinciden.
        </div>';
    } else if (validarContra($_POST['txtContra']) == false) {
        echo '<div class="alert alert-danger">
        <strong>Error!</strong> La contraseña debe tener entre 5 a ' . $maximoContra . ' caracteres y al menos una letra mayuscula, una minuscula, un numero y un caracter especial y no puede contener espacios en blanco.
        </div>';
    } else if (verificarContraAnterior($_POST['txtContra'], $username) == true) {
        echo '<div class="alert alert-danger">
        <strong>Error!</strong> La contraseña anterior no puede ser la misma que la nueva contraseña.
        </div>';
    } else {
        cambiarContra($username, $_POST['txtContra']);
        $ID = obtenerIdUsuario($_POST['user']);
        desbloquearUsuario($ID);
        header('location: ./login.php?operacion=1');
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link rel="icon" href="../dist/assets/img-2/Logo-IG.ico">
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../dist/css/styles.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication" style="margin-top: -20px;">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container" style="margin-top: 100px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-3 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Recuperar contraseña</h3>
                                    <style>
                                        h3{
                                            font-family: Vladimir Script;
                                            font-size: 50px;
                                        }
                                    </style>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" method="POST" novalidate>

                                        <div class="form-floating d-flex  align-items-center justify-content-between mt-4 mb-0">
                                            <input class="form-control" style="width: 440px" id="txtContra" name="txtContra" type="password" placeholder="Nueva Contraseña" maxlength="25" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,30}" />
                                            <label for="txtContra"><i class="fas fa-key icon"></i>&nbsp;Nueva contraseña</label>
                                            <button class="btn btn-primary" type="button" onclick="mostrarContra()"><span class="fa fa-eye"></span></button>

                                            <div class="valid-tooltip">
                                                Campo Válido!
                                            </div>
                                            <div class="invalid-tooltip">
                                        La contraseña debe tener al menos una letra mayúscula, una minúscula, un símbolo y un mínimo de 8 caracteres.
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-floating d-flex  align-items-center justify-content-between mt-4 mb-0">
                                            <input class="form-control" style="width: 440px" id="txtConfirmarContra" name="txtConfirmarContra" type="password" placeholder="Confirmar la nueva contraseña" class="form-control mx-sm-3" maxlength="25" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,30}" />
                                            <label for="txtConfirmarContra"><i class="fas fa-key icon"></i>&nbsp;Confirmar la nueva contraseña</label>
                                            <button class="btn btn-primary" type="button" onclick="mostrarContrasena()"><span class="fa fa-eye"></span></button>
                                            <div class="valid-tooltip">
                                                Campo Válido!
                                            </div>
                                            <div class="invalid-tooltip">
                                                Por favor complete el campo, las contraseñas no coinciden.
                                            </div>
                                        </div>

                                        <input type="hidden" name="user" value="<?php echo $username; ?>" />
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="button2" href="login.php">Cancelar</a>
                                            <input type="submit" class="button3"  value="Cambiar Contraseña">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
           
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="./js/lock.js" type="text/javascript"></script>

</body>
<script>
    (() => {
        'use strict'

        const forms = document.querySelectorAll('.needs-validation')

        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

<script>
    var password, password2;

    password = document.getElementById('txtContra');
    password2 = document.getElementById('txtConfirmarContra');

    /*password.onchange = password2.onkeyup = passwordMatch;

    function passwordMatch() {
        if (password.value !== password2.value)
            password2.setCustomValidity('Las contraseñas no coinciden.');
        else
            password2.setCustomValidity('');
    }*/

    password2.addEventListener('keyup', function(e) {

        if (password.value !== password2.value) {
            password2.style.boxShadow = "0 0 10px red";
            password2.classList.add("is-invalid");
            password2.classList.remove("is-valid");
        } else {
            if(e.keyCode !== 32)
            {
                password2.style.boxShadow = "0 0 10px green";
                password2.style.boxShadow = "0 0 10px green";
                password2.classList.remove("is-invalid");
                password2.classList.add("is-valid");
            }
        }

    })
</script>


<!--FUNCION DE NO COPIAR Y PEGAR-->
<script>
    window.onload = function() {
        var contrasena2 = document.getElementById('txtConfirmarContra');
        var contra = document.getElementById('txtContra');
        contrasena2.onpaste = function(e) {
            e.preventDefault();
        }

        contrasena2.oncopy = function(e) {
            e.preventDefault();
        }
        contra.onpaste = function(e) {
            e.preventDefault();
        }
        contra.oncopy = function(e) {
            e.preventDefault();
        }
    }
</script>
<script>

</script>
<script>
    //--------------VALIDACIONES EN TIEMPO REAL----------
  
    var confirContra = document.getElementById('txtConfirmarContra');
    var expresionRegular = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{7,16}$/;
    var errormensaje = document.getElementById('errorcontra');
    var password = document.getElementById('txtContra');
    password.addEventListener('keyup', function(e) {
        var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d\s:])([^\s]){8,}$/;
        var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (!regex.test(password.value)) {
            e.preventDefault();
            // Efecto de sombra color rojo en el borde
            password.style.borderColor = "red";
            password.style.boxShadow = "0 0 10px red";
            password.classList.add("is-invalid");
            password.classList.remove("is-valid");
        } else {
            // Efecto de sombra color verde en el borde
            password.style.borderColor = "green";
            password.style.boxShadow = "0 0 10px green";
            password.classList.add("is-valid");
            password.classList.remove("is-invalid");
        }
    });
        /*if (!expresionRegular.test(contra.value)) {
            contra.style.borderColor = "red";
            contra.style.boxShadow = "0 0 10px red";
            errormensaje.textContent = "Por favor complete el campo,La contraseña debe tener entre 8 a 25 caracteres y al menos una letra mayuscula, una minuscula, un numero y un caracter especial y no puede contener espacios en blanco.";
            contra.classList.add("is-invalid");
            contra.classList.remove("is-valid");
        } else {
            contra.style.borderColor = "green";
            contra.style.boxShadow = "0 0 10px green";
            contra.classList.add("is-valid");
            errormensaje.textContent = "Por favor complete el campo,La contraseña debe tener entre 8 a 25 caracteres y al menos una letra mayuscula, una minuscula, un numero y un caracter especial y no puede contener espacios en blanco.";
            contra.classList.remove("is-invalid");
        }

    });*/

    


    confirContra.addEventListener('keypress', function(e) {
        if (e.keyCode == 32) {
            e.preventDefault();
            //efecto de sombra color rojo en el borde
            confirContra.style.borderColor = "red";
            confirContra.style.boxShadow = "0 0 10px red";
            confirContra.classList.add("is-invalid");
            confirContra.classList.remove("is-valid");
        } else {
            //efecto de sombra color verde en el borde
            confirContracontra.style.borderColor = "green";
            confirContra.style.boxShadow = "0 0 10px green";
            confirContra.classList.add("is-valid");
            confirContra.classList.remove("is-invalid");
        }
    });
</script>

</html>