<?php
session_start();
include_once '../controladores/controladorLogin.php';

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
                //condicion que identifica si es primer ingreso o no FERNANDO
                var_dump($usuarios[0]['primer_ingreso']);
                if ($usuarios[0]['primer_ingreso'] == 0) {
                    $_SESSION['user'] = $usuarios[0];
                    header('Location: ./config_preguntas.php');
                } else {
                    //Actualizar conexion
                    actualizarUltimaConexion($_SESSION['id_usuario']);
                    header('Location: ../dist/home.php');
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
                    //condicion que identifica si es primer ingreso o no FERNANDO
                    var_dump($usuarios[0]['primer_ingreso']);
                    if ($usuarios[0]['primer_ingreso'] == 0) {

                        $_SESSION['user'] = $usuarios[0];
                        header('Location: ./config_preguntas.php');
                    } else {
                        //Actualizar Ultima conexion
                        actualizarUltimaConexion($_SESSION['id_usuario']);
                        header('Location: ../dist/home.php');
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
        <link rel="stylesheet" href="../dist/css/login.css">
        <title>Inicio de Sesión</title>
    </head>
  
    <body class="login-page" _c_t_common="1" >
        <main>
            <form action="" method="post" class="px-4 py-3">
                <div class="container-fluid">
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-3 d-lg-block col-md-5  col-sm-8  col-xl-3 " >
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
                                    <!--Codigo comienzo-->
                                    <div class="input-contenedor">                      
                                        <i class="fas fa-user icon">
                                            <input type="text" name="usuario" placeholder="usuario">
                                        </i>
                                    </div>
                        
                                    <div class="input-contenedor form-floating d-flex">
                                        <i class="fas fa-key icon">
                                            <input type="password" id="clave" name="clave" placeholder="Contraseña" >
                                        </i>
                                        <button class="btn btn-primary" type="button" onclick="mostrarPassword()"><span class="fa fa-eye"></span></button>
                                    </div><br>
                                    
                                    <div class="alert alert-danger text-center d-none" id="alerta" role="alert">

                                    </div>
                                    <?php echo isset($alert) ? $alert : ''; ?>

                                    <center><button type="submit" class="button">Iniciar sesión</button></center> <br>
                                    </div>
                                        <p> <a href="modo_recuperacion.php" class="link" >¿Olvidaste tu usuario y/o contraseña?</a> </p>
                                        <p>¿No tienes una cuenta? <a class="link" href="Registro.php">Registrate </a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
        </main>
        <footer class="footer-copyright">
            <div  class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted" style="margin-left: 620px;">Copyright &copy; Digital Solution - UNAH 2022</div>
                    </div>
                </div>
            </div>
        </footer> 
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="./js/lock.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    
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