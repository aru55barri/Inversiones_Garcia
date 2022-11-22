<?php

require_once '../controladores/controladorLogin.php';

if (!empty($_POST)) {


    $metodo = $_POST['cmbmetodo'];
    $usuario = $_POST['txtUsuario'];

    if (empty($usuario)) {
        echo '<div class="alert alert-danger">
        <strong>Error!</strong> Debe Ingresar el nombre de Usuario.
        </div>';
    } else {
        if ($metodo == 0) {
            echo '<div class="alert alert-danger">
            <strong>Error!</strong> Debe seleccionar un metodo de recuperación.
            </div>';
        } elseif (validarTodoMayuscula($usuario) == false) {
            echo '<div class="alert alert-danger">
            <strong>Error!</strong> Solo debe ingresar letras MAYUSCULAS en el nombre de Usuario.
            </div>';
        } elseif (validarUsuarioExistente($usuario) == false) {
            echo '<div class="alert alert-danger">
            <strong>Error!</strong> El usuario no existe.
            </div>';
        } elseif ($metodo == 1) {
            header('Location: ./recuperacion_correo.php?user=' . $usuario);
        } elseif ($metodo == 2) {
            header('Location: ./c_preguntas_usuario.php?user=' . $usuario);
        }
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
    <link href="./css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../dist/css/styles.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication" style="margin-top: -200px;">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container" style="margin-top: 300px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-3 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class=" text-center"> Restablecer la Contrase&ntilde;a </h3>
                                    <style>
                                        h3{
                                            font-family: Vladimir Script;
                                            font-size: 50px;
                                        }
                                    </style>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" method="POST" novalidate>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputAnswer" name="txtUsuario" type="text" placeholder="Ans" maxlength="25" autocomplete="nope" required pattern="[A-Z]{3,25}" />
                                            <label for="inputAnswer"><i class="fas fa-user icon"></i>&nbsp;Usuario</label>
                                            <div class="valid-feedback">
                                                Campo Válido!
                                            </div>
                                            <div class="invalid-feedback">
                                                Por favor complete el campo, Solo Debe Ingresar Letras Mayusculas.
                                            </div>
                                        </div>

                                        <select class="form-select" name="cmbmetodo" required >
                                            <option selected value="" disabled >--Seleccione el método de recuperación--</option>
                                            <option value="1">Recuperar mediante correo eléctronico</option>
                                            <option value="2">Recuperar mediante preguntas de seguridad</option>
                                        </select>
                                        <div class="valid-feedback">
                                            Campo Válido!
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor seleccione una opción.
                                        </div>

                                        <br>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="button2" href="../index.php">Cancelar</a>
                                            <input type="submit" class="button2" value="Continuar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="./js/scripts.js"></script>

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



 <!--VALIDACIONES EN TIEMPO REAL-->
 <script>
        var usuario1 = document.getElementById('inputAnswer');

        usuario1.addEventListener('keypress', function(e) {
            if (e.keyCode < 65 || e.keyCode > 90 || e.keyCode == 32) {
                e.preventDefault();
                //efecto de sombra color rojo en el borde
                usuario1.style.borderColor = "red";
                usuario1.style.boxShadow = "0 0 10px red";
                usuario1.classList.add("is-invalid");
                usuario1.classList.remove("is-valid");
            } else {
                //efecto de sombra color verde en el borde
                usuario1.style.borderColor = "green";
                usuario1.style.boxShadow = "0 0 10px green";
                usuario1.classList.add("is-valid");
                usuario1.classList.remove("is-invalid");
            }
        });
    </script>

</body>

</html>