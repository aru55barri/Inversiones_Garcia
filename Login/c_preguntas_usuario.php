<?php

include_once '../controladores/controladorLogin.php';

if (!empty($_POST)) {
    if (empty($_POST['answer'])) {
        echo '<div class="alert alert-danger">
                <strong>Error!</strong> Debe Insertar la Respuesta a su Pregunta.
                </div>';
    } elseif (intval($_POST['cmbpregunta']) == 0) {
        echo '<div class="alert alert-danger">
                <strong>Error!</strong> Debe Seleccionar una pregunta.
                </div>';
    } else {
        $usuario = $_GET['user'];
        $respuesta = $_POST['answer'];
        $pregunta = $_POST['cmbpregunta'];

        $usuarios = verificarUsuariosPreguntas($usuario, $pregunta, $respuesta);
        if (sizeof($usuarios) > 0) {
            header('Location: ./nueva_contrasena_p.php?user=' . $usuario);
        } else {
            echo '<div class="alert alert-danger">
                <strong>Error!</strong> Usuario NO verificado Intente de Nuevo.
              </div>';
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
                                <div>
                                <?php
                                    // Obtener el valor de num_preguntas para el usuario actual desde la base de datos
                                    
                                    $query = "SELECT valor FROM tbl_parametros WHERE parametro='num_preguntas'";
                                    $result = $conn->query($query);
                                    $num_preguntas = $result->fetch_assoc()['valor'];

                                    // Obtener el número de pregunta actual a partir del parámetro "pregunta" en la URL
                                    $num_pregunta_actual = isset($_GET['pregunta']) ? $_GET['pregunta'] : 1;

                                    // Mostrar el número de pregunta actual y el número total de preguntas a contestar en la página HTML
                                    
                                    ?>
                                    <p><?php echo "Pregunta $num_pregunta_actual de $num_preguntas"; ?></p>                                   
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" method="post" novalidate>
                                        <select class="form-select" name="cmbpregunta" required>
                                            <option selected value="" disabled>--Seleccione una pregunta--</option>
                                            <!-- LLAMAR LA FUNCION OBTENER PREGUNTAS-->
                                            <?php
                                            $pregunta = obtenerPreguntas();
                                            foreach ($pregunta as $row) {
                                                echo '<option value="' . $row['id_pregunta'] . '">' . $row['pregunta'] . '</option>';
                                            }
                                            ?>
                                            <!--*****************************-->
                                        </select>
                                        <div class="valid-feedback">
                                            Campo Válido!
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor Seleccione una opción!
                                        </div>

                                        <br>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputAnswer" name="answer" type="Answer" placeholder="Ans" maxlength="30" autocomplete="nope" required pattern="{3,20}" />
                                            <label for="inputAnswer">Respuesta</label>
                                            <div class="valid-tooltip">
                                                Campo Valido!
                                            </div>
                                            <div class="invalid-tooltip">
                                                Complete este campo.
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="button2" href="./login.php">Cancelar</a>
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
        <div id="layoutAuthentication_footer">
           
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
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

<!--VALIDACIONES EN TIEMPO REAL-->
<script>
    var nombre = document.getElementsByName('answer')[0];
    nombre.addEventListener('keypress', function(e) {
        var regex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/;
        var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (!regex.test(key)) {
            e.preventDefault();
            // Efecto de sombra color rojo en el borde
            nombre.style.borderColor = "red";
            nombre.style.boxShadow = "0 0 10px red";
            nombre.classList.add("is-invalid");
            nombre.classList.remove("is-valid");
        } else {
            // Efecto de sombra color verde en el borde
            nombre.style.borderColor = "green";
            nombre.style.boxShadow = "0 0 10px green";
            nombre.classList.add("is-valid");
            nombre.classList.remove("is-invalid");
        }
    });
</script>
<script>
       /* var respuesta = document.getElementById('inputAnswer');

        respuesta.addEventListener('keypress', function(e) {
            if (e.keyCode ==32 ) {
                e.preventDefault();
                //efecto de sombra color rojo en el borde
                respuesta.style.borderColor = "red";
                respuesta.style.boxShadow = "0 0 10px red";
                respuesta.classList.add("is-invalid");
                respuesta.classList.remove("is-valid");
            } else {
                //efecto de sombra color verde en el borde
                respuesta.style.borderColor = "green";
                respuesta.style.boxShadow = "0 0 10px green";
                respuesta.classList.add("is-valid");
                respuesta.classList.remove("is-invalid");
            }
        });*/
    </script>

</html>