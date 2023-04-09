<?php
session_start();
include_once '../controladores/controladorLogin.php';


require "../config/conexion.php";

$sql1 = mysqli_query($conexion, "SELECT * FROM tbl_config_empresa where id = 1");
$rom = mysqli_fetch_array($sql1);
$intentos = obtenerIntentosFallidos();


    



if (!empty($_GET)) {
    
    if(isset($_GET['operacion']))
    {
        if ($_GET['operacion'] == 2) {
            session_destroy();
        } elseif ($_GET['operacion'] == 3) {
            /*
            $x = bin2hex(openssl_random_pseudo_bytes(16));
            $actual = date('Y-m-d H:i:s');
            $vigencia = obtenerHorasVigencia();
            $vigenciafecha = date('Y-m-d H:i:s', strtotime($actual . ' + ' . $vigencia . ' hours'));
            echo '<div class="alert alert-danger">
            <strong>Error!</strong> El token generado es: '.$x.'y su longitud es de: '.strlen($x).'y la hora actual es: '.$actual.' y las horas de vigencia son: '.obtenerHorasVigencia().' el token vence el: '.$vigenciafecha.'
            </div>';*/
    
            //Mensaje de error de token
            echo '<div class="alert alert-danger">
            <strong>Error!</strong> El token ha Expirado.
            </div>';
        }
    }

}

if (!isset($_COOKIE['intentos_fallidos'])) {
    if (!empty($_POST)) {
        if (empty($_POST['usuario']) || empty($_POST['clave'])) {
            $alert = '<div class="alert alert-danger">
                        Debe llenar todos los campos.
                      </div>';
        } else {
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['clave'];
            // Utilizar preg_replace para reemplazar la cadena peligrosa
            $contrasena = preg_replace("/['\"]|or\s*\d+=\d+|--\s*$/i", "", $contrasena);
            $usuarios = iniciarSesion($usuario, $contrasena);
           
           

            if (validarTodoMayuscula($usuario) == false) {
                $alert = '<div class="alert alert-danger">
                        Solo debe ingresar letras MAYUSCULAS en el campo usuario.
                      </div>';
            } elseif (sizeof($usuarios) > 0) {
                $_SESSION['nombre'] = obtenerNombre($usuario);
                $_SESSION['Tipo_Usuario'] = obtenerTipoUsuario($usuario);
                $_SESSION['id_usuario'] =  obtenerIdUsuario($usuario);
                $_SESSION['rol'] = obtenerRol($usuario);
                //condicion que identifica si es primer ingreso 
                var_dump($usuarios[0]['primer_ingreso']);
                if ($usuarios[0]['primer_ingreso'] == 0) {
                    $_SESSION['user'] = $usuarios[0];
                    echo("<script>location.href = './config_preguntas.php';</script>");
                } else {
                    //Actualizar conexion
                    actualizarUltimaConexion($_SESSION['id_usuario']);
                    echo("<script>location.href = '../dist/home.php';</script>");
                }
            } else {
                setcookie('intentos_fallidos', 1, time() + (60 * 60 * 24 * 365));
                $alert = '<div class="alert alert-danger">
                        <strong>Error!</strong> Usuario o contraseña incorrectos.
                        </div>';
            }
        }
    }
} else {
    if ($_COOKIE['intentos_fallidos'] == $intentos[0]['valor']) {
        $ID = obtenerIdUsuario($_POST['usuario']);
        bloquearUsuario($ID);
        $alert ='<div class="alert alert-danger">
                <strong>¡Error!</strong> Demasiados intentos fallidos. Usuario bloqueado.
                </div>';
    } else {
        if (!empty($_POST)) {
            if (empty($_POST['usuario']) || empty($_POST['clave'])) {
                $alert = '<div class="alert alert-danger">
                        Debe llenar todos los campos.
                      </div>';
            } else {
                $usuario = $_POST['usuario'];
                $contrasena = $_POST['clave'];
                // Utilizar preg_replace para reemplazar la cadena peligrosa
                $contrasena = preg_replace("/['\"]|or\s*\d+=\d+|--\s*$/i", "", $contrasena);
                $usuarios = iniciarSesion($usuario, $contrasena);

                if (validarTodoMayuscula($usuario) == false) {
                    $alert = '<div class="alert alert-danger">
                            Solo debe ingresar letras MAYUSCULAS en el campo usuario.
                          </div>';
                } elseif (sizeof($usuarios) > 0) {
                    $_SESSION['nombre'] = obtenerNombre($usuario);
                    $_SESSION['id_usuario'] =  obtenerIdUsuario($usuario);
                    $_SESSION['Tipo_Usuario'] = obtenerTipoUsuario($usuario);
                    $_SESSION['rol'] = obtenerRol($usuario);
                    //condicion que identifica si es primer ingreso
                    var_dump($usuarios[0]['primer_ingreso']);
                    if ($usuarios[0]['primer_ingreso'] == 0) {

                        $_SESSION['user'] = $usuarios[0];
                        //header('Location: ./config_preguntas.php');
                        echo("<script>location.href = './config_preguntas.php';</script>");                    } else {
                        //Actualizar Ultima conexion
                        actualizarUltimaConexion($_SESSION['id_usuario']);
                        //header('Location: ../dist/home.php');
                        echo("<script>location.href = '../dist/home.php';</script>");

                    }
                } else {
                    setcookie('intentos_fallidos', $_COOKIE['intentos_fallidos'] + 1, time() + (60 * 1));
                    $alert ='<div class="alert alert-danger">
                            <strong>Error!</strong> Usuario o contraseña incorrectos.
                            </div>';
                }
            }
        }
    }
}


?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Inicio de Sesión - Inversiones Garcia</title>
        <link rel="icon" href="../dist/assets/img-2/Logo-IG.ico">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
        <link rel="stylesheet" href="../dist/css/login.css">
        <link href="css/styles.css" rel="stylesheet" />
        
    </head>
  
    <body class="bg-primary" >
    <img  src="data:image;base64,<?php echo base64_encode($rom['logo']);  ?>" style="width: 200px; height: 200px; padding: 20px; margin-left: 80%;" />
        <div id="layoutAuthentication"  style="margin-top: -200px;">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container" style="margin-top: 10px;">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-3 rounded-lg mt-5">
                                    <div class="row justify-content-center mt-15">
                                        <div class="col-md-3 d-lg-block col-md-12 col-sm-10" >
                                            <div  class="card card-outline card-primary">
                                                <div class="card-header bg-white ">
                                                    <h3 class=" text-center" id="letra"> Login  </h3>
                                                    <style>
                                                        h3{
                                                            font-family: Vladimir Script;
                                                            font-size: 70px;
                                                        }
                                                    </style>
                                                    </div>
                                                    <div class="card-body">
                                                    <form method="POST" class="needs-validation" novalidate>
                                                        <!--Codigo comienzo-->
                                                        <div class="input-contenedor d-flex">                      
                                                            <i class="fas fa-user icon" style="margin-top: 15px"></i>   
                                                            <input class="form-control" id="usuario" name="usuario" type="text" placeholder="Usuario" autocomplete="nope" maxlength="25" style="width: 325px" required pattern="[A-Z]{3,25}" />
                                                            
                                                            <div class="valid-feedback">
                                                                Campo Valido!
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                Solo Debe Ingresar Letras Mayusculas en Usuario.
                                                            </div>
                                                        </div>
                                            
                                                        <div class="input-contenedor form-floating d-flex">
                                                            <i class="fas fa-key icon" style="margin-top: 15px"></i>
                                                            <input type="password" id="clave" name="clave" placeholder="Contraseña" style="width: 395px">
                                                            
                                                            <button class="btn btn-primary" type="button" onclick="mostrarPassword()"><span class="fa fa-eye"></span></button>
                                                            <div class="valid-tooltip">
                                                                Campo Valido!
                                                            </div>
                                                            <div class="invalid-tooltip">
                                                                La contraseña debe tener al menos una letra mayúscula, una minúscula, un símbolo y un mínimo de 8 caracteres.
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="alert alert-danger text-center d-none" id="alerta" role="alert">

                                                        </div>
                                                        <?php echo isset($alert) ? $alert : ''; ?>

                                                        <center><button type="submit" class="button">Iniciar sesión</button></center> <br>
                                                        </div>
                                                            <p> <a href="modo_recuperacion.php" class="link" >¿Olvidaste tu usuario y/o contraseña?</a> </p>
                                                            <p>¿No tienes una cuenta? <a class="link" href="Registro.php">Regístrate </a></p>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <footer class="footer-copyright" style="margin-top: -69px;">
                <div  class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted" style="margin-left: 620px;">Copyright &copy; Digital Solution - UNAH 2022</div>
                        </div>
                    </div>
                </div>
            </footer> 
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="./js/function.js" type="text/javascript"></script>
        <script src="./js/lock.js" type="text/javascript"></script>
        <script src="./js/jquery.js" type="text/javascript"></script>
        
       <!--VALIDACIONES EN TIEMPO REAL-->
         <script>
            var usuario = document.getElementById('usuario');
            var contra = document.getElementById('inputPassword');

            usuario.addEventListener('keypress', function(e) {
                if (e.keyCode < 65 || e.keyCode > 90 || e.keyCode == 165) {
                    e.preventDefault();
                    //efecto de sombra color rojo en el borde
                    usuario.style.borderColor = "red";
                    usuario.style.boxShadow = "0 0 10px red";
                    usuario.classList.add("is-invalid");
                    usuario.classList.remove("is-valid");
                } else {
                    //efecto de sombra color verde en el borde
                    usuario.style.borderColor = "green";
                    usuario.style.boxShadow = "0 0 10px green";
                    usuario.classList.add("is-valid");
                    usuario.classList.remove("is-invalid");
                }
            });

            contra.addEventListener('keypress', function(e) {
                if (e.keyCode == 32) {
                    e.preventDefault();
                    //efecto de sombra color rojo en el borde
                    contra.style.borderColor = "red";
                    contra.style.boxShadow = "0 0 10px red";
                } else {
                    //efecto de sombra color verde en el borde
                    contra.style.borderColor = "green";
                    contra.style.boxShadow = "0 0 10px green";
                }
            });
        </script>
        <script>
            var clave = document.getElementById('clave');
            clave.addEventListener('keypress', function(e) {
                if (e.keyCode === 32) {
                    e.preventDefault();
                }
            });
        </script>

        <script>
            var password = document.getElementById('clave');
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
        </script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <?php 

if(isset($_GET['registro']))
{
    if($_GET['registro'] == 1)
    {
        echo '<script> Swal.fire({
            icon: "success",
            title: "Felicidades!",
            text: "Usuario registrado correctamente!",
            showConfirmButton: true
        })
        .then (() => {
            window.location.href = "../Login/login.php";
        });
        </script>';
    }
}
        
?>
        <?php 
        if(isset($_GET['loggeado']))
        {
            echo '<script> Swal.fire({
                icon: "error",
                title: "¡ERROR!",
                text: "Debe Iniciar Sesion!",
                showConfirmButton: true
            })
            .then (() => {
                window.location.href = "../Login/login.php";
            });
            </script>';
        }
        ?>
        <?php


            if(isset($_GET['operacion']))
            {
                if($_GET['operacion'] == 1)
                {
                    echo '<script> Swal.fire({
                        icon: "success",
                        title: "Felicidades!",
                        text: "La Contraseña ha sido cambiada!",
                        showConfirmButton: true
                    })
                    .then (() => {
                        window.location.href = "../Login/login.php";
                    });
                    </script>';
                }
            }

        ?>
    </body>
</html>