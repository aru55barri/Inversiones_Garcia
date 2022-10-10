<?php

include_once('../controladores/controladorLogin.php');
include_once('../config/conn.php');
session_start();

if(!isset($_SESSION['user'])){
    header('Location: ../login/login.php');
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
    <title>Cambio contraseña - Servicio & Color</title>
    <link href="css/styles.css" rel="stylesheet" />
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <?php
    if (isset($_POST['guardar'])) {
        $contra_actu=$_POST['ante_contra'];
        $contra1 = $_POST['contra1'];
        $contra2 = $_POST['contra2'];
        $user = $_SESSION['user']['USUARIO'];
        $id = $_SESSION['user']['ID_USUARIO'];
        $contra_actual= $_SESSION['user']['CONTRASEÑA'];
        if ($contra1 == $contra2 && $contra_actual == $contra_actu ) {
            unset($_SESSION['user']);
            $prgu = mysqli_query($conn, "UPDATE tbl_usuarios SET PRIMER_INGRESO=1 WHERE ID_USUARIO='$id'");
            cambiarpass($user,$contra1);   
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'EXCELENTE!',
                    text: 'HAS TERMINADO LAS CONFIGURACIONES PENDIENTES',
                    confirmButtonText: 'Aceptar',
                    position:'center',
                    allowOutsideClick:false,
                    padding:'1rem'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href ='./login.php';
                     }
                })    
             </script>";
        } else {
            
            echo "<script>
                Swal.fire({
                icon: 'error',
                title: 'Uoops...',
                text: 'Las contraseñas esta no coinciden !'      
                })
            </script>";
            
            
            
        }
           
    }
    ?>

    <img src="../Imagenes/LOGO.PNG" style="width: 200px; height: 200px; padding: 20px;" />
    <div id="layoutAuthentication" style="margin-top: -200px;">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container" style="margin-top: 100px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-3 rounded-lg mt-5">
                                <div class="card-header" style="background-color: rgb(171, 237, 230);">
                                    <h3 class="text-center font-weight-light my-4"><img src="../Imagenes/pngwing.com.png" height="35px" padding="25px">Cambio contraseña</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" class="needs-validation" novalidate>

                                        <div class="form-floating d-flex  align-items-center justify-content-between mt-4 mb-0">
                                            <input class="form-control" style="width: 440px" id="inputPassword" name="ante_contra" type="password" onpaste="return false" placeholder="Contraseña Actual" maxlength="256" required />
                                            <label for="inputpassword">Contraseña Actual</label>
                                            <button class="btn btn-primary" type="button" onclick="mostrarPassword()"><span class="fa-solid fa-lock"></span></button>
                                            <div class="valid-tooltip">
                                                Campo Valido!
                                            </div>
                                            <br>
                                            <div class="invalid-tooltip">
                                                Por favor complete el campo!
                                            </div>
                                        </div>

                                        <div class="form-floating d-flex  align-items-center justify-content-between mt-4 mb-0">
                                            <input class="form-control" style="width: 440px" id="ncontraseña" name="contra1" type="password" onpaste="return false" placeholder="Nueva Contraseña" maxlength="256" required />
                                            <label for="ncontraseña">Nueva Contraseña</label>
                                            <button class="btn btn-primary" type="button" onclick="mostrarPasswordN()"><span class="fa-solid fa-lock"></span></button>
                                             
                                        </div>
                                        <span id="contramensaje"></span> 
                                           
                                        <div class="form-floating d-flex  align-items-center justify-content-between mt-4 mb-0">
                                            <input class="form-control" style="width: 440px" id="cncontraseña" name="contra2" type="password" onpaste="return false" placeholder="Confirmar Nueva Contraseña" maxlength="256" required />
                                            <label for="cncontraseña">Confirmar Nueva Contraseña </label>
                                            <button class="btn btn-primary" type="button" onclick="mostrarPasswordC()"><span class="fa-solid fa-lock"></span></button>
                                            <div class="valid-tooltip">
                                                Campo Valido!
                                            </div>
                                            <br>
                                            <div class="invalid-tooltip">
                                                Por favor complete el campo!
                                            </div>
                                        </div>
                                        <div class="Validaciones" id="val">
                                            <ul>
                                                <li id="mayus">Mayúsculas</li>
                                                <li id="special">Caractér Especial</li>
                                                <li id="numbers">Numero</li>
                                                <li id="lower">Minúsculas</li>
                                                <li id="len">Mínimo 4 caractéres</li>                                  
                                            </ul>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                            <button class="btn btn-primary" id="button" type="submit" name="guardar">Guardar</button>
                                           
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
    <script src="./js/function.js" type="text/javascript"></script>
    <script src="./js/lock.js" type="text/javascript"></script>
    <script src="./js/nnueva.js" type="text/javascript"></script>
    <script src="./js/cnueva.js" type="text/javascript"></script>
    <script src="./js/jquery.js" type="text/javascript"></script>
    <script src="./js/validarcontra.js" type="text/javascript"></script>
    
    

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
</body>

</html>