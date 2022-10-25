<?php 

require_once '../controladores/controladorLogin.php';

$token = $_GET["token"];
$fechaActual = date('Y-m-d H:i:s');
$datos = obtenerFechaFinalizacion($token);
$fechaFinal = $datos[0]["FECHA_FINALIZACION"];
$idusuario = $datos[0]["ID_USUARIO"];
$username = obtenerNombreUser($idusuario);

if($fechaActual < $fechaFinal)
{
    //redireccionamiento a Cambio de Contraseña
    //header("Location: ./n.contraseña.php");
    echo '';
}
else
{
    //Redireccionar a Pagina de Inicio de Sesion
    header("Location: ./login.php?operacion=3");
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
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    
    <body class="bg-primary">
        <div id="layoutAuthentication" style="margin-top: 8px;">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container" style="margin-top: 100px;">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-3 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Verificacion de Token</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="../Login/nueva_contrasena.php">
                                            <div class="alert alert-success">
                                                <strong>Excelente!</strong> El Token ha sido Verificado.
                                            </div>
                                            <input type="hidden" name="username" value="<?php echo $username; ?>">
                                            </div>
                                            <div class="card-footer text-center py-3">
                                            <button class="btn btn-primary" type="submit">Cambiar Contraseña</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="./js/function.js" type="text/javascript"></script>
        </body>
    </html>

