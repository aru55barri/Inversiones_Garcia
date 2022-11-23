<?php
    require_once "../config/conexion.php";

    require_once '../config/conex.php';
    include_once('../controladores/controladorLogin.php');
    include_once '../modelos/modelo_login.php';
    
    if (!empty($_POST["Registro"])){
        $alert = '';
        if (empty($_POST["usuario"]) || empty($_POST["nombre"]) || empty($_POST["correo"]) || empty($_POST["clave"])){
            $alert = '<div class="alert alert-danger" role="alert">
                uno de los campos esta vacío
                </div>';
        } else if ($_POST['clave'] == $_POST['clave2'] ){
            /*
            $usuario=$_POST["usuario"];
            $nombre=$_POST["nombre"];
            $correo=$_POST["correo"];
           // $clave=md5($_POST["clave"]);
            $clave=($_POST["clave"]);
            */
            
            $nombre = $_POST['nombre'];
            $apellido = $_POST['nombre'];
            $correo = $_POST['correo'];
            $usuario = $_POST['usuario'];
            $password = $_POST['clave'];
            $query = mysqli_query($conn, "SELECT * FROM tbl_usuario where correo = '$correo'");
            $result = mysqli_fetch_array($query);
            if ($result > 0) {
                $alert = '<div class="alert alert-warning" role="alert">
                            El correo ya existe
                        </div>';
            } else {
                /*
                $sql=$conexion->query("insert into tbl_usuario(nombre, correo, usuario, clave, id_rol, fecha_ultima_conexion, preguntas_contestadas, primer_ingreso, fecha_vencimiento, id_estado)
                values ('$nombre','$correo','$usuario','$clave', 1, CURRENT_TIMESTAMP, '0', '0', CURRENT_TIMESTAMP, 5)");
                //recordar que se le asignara de rol id=4 ya que es el sin asignar
                $sql=$conexion->query("insert into tbl_emp(nombre, correo, usuario, clave, id_rol, fecha_ultima_conexion, preguntas_contestadas, primer_ingreso, fecha_vencimiento, id_estado)
                values ('$nombre','$correo','$usuario','$clave', 1, CURRENT_TIMESTAMP, '0', '0', CURRENT_TIMESTAMP, 5)");
                */
                
                $insertarUsuario=insertarUsuarioEmpleado($nombre, $apellido, $correo, $usuario, $password);

                if($insertarUsuario > 0){
                    $alert = '<div class="alert alert-danger" role="alert">
                    Error al registrar
                    </div>';
                } else {
                    $alert = '<div class="alert alert-primary" role="alert">
                    Usuario registrado correctamente
                    </div>';
                }
            }
        } else {
               
            $alert = '<div class="alert alert-danger" role="alert">
                las contraseñas no coinciden
                </div>';
        
        }

    }

    $usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
    <link href="../dist/css/login.css" rel="stylesheet" /> 
    <title>Registro</title>
    <link rel="icon" href="../dist/assets/img-2/Logo-IG.ico">
    <script src="./js/validar.js" type="text/javascript"></script>
</head>  
<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container" style="margin-top: 10px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <form class="formulario" action="Registro.php" method="post" id="form-register" class="needs-validation" novalidate>
                                
                                <h1>Regístrate</h1>
                                <style>
                                h1{
                                    font-family: Vladimir Script;
                                    font-size: 70px;
                                    }
                                </style>

                                    <div class="contenedor">
                                    
                                        <div class="input-contenedor">
                                            <i class="fas fa-user icon"></i>
                                            <input name="usuario" id="usuario" name="usuario" type="text" placeholder="Usuario" autocomplete="nope" required/>
                                            <div class="valid-tooltip">
                                                Campo Valido!
                                            </div>
                                            <div class="invalid-tooltip">
                                                Solo Debe Ingresar Letras Mayusculas en Usuario.
                                            </div>
                                        </div>

                                        <div class="input-contenedor">
                                            <i class="fas fa-user icon"></i>
                                            <input type="text" name="nombre" placeholder="Nombre y Apellido">
                                        </div>
                                        
                                        <div class="input-contenedor">
                                            <i class="fas fa-envelope icon"></i>
                                            <input type="text" name="correo" placeholder="Correo electronico">
                                        </div>

                                        <div class="input-contenedor form-floating d-flex">
                                            <i class="fas fa-key icon" style="margin-top: 20px"></i>
                                            <input type="password" id="ncontrasena" name="clave" placeholder="Contraseña">
                                            <button class="btn btn-primary" type="button" onclick="mostrarPasswordN()"><span class="fa fa-eye"></span></button>
                                        </div>
                                        
                                        <div class="input-contenedor form-floating d-flex">
                                            <i class="fas fa-key icon" style="margin-top: 20px"></i>
                                            <input type="password" id="cncontrasena" name="clave2" placeholder="Confirmar contraseña">
                                            <button class="btn btn-primary" type="button" onclick="mostrarPasswordC()"><span class="fa fa-eye"></span></button>
                                        </div>

                                        <?php echo isset($alert) ? $alert : ''; ?>           

                                        <input type="submit" name="Registro" id="Registro" value="Registrate" class="button">
                                    </div>
                                    <div>
                                        <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
                                        <p>¿Ya tienes una cuenta?<a class="link" href="../index.php">Iniciar Sesion</a></p>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>       
    </div> <br>
    <footer class="footer-copyright">
        <div  class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted" style="margin-left: 620px;">Copyright &copy; Digital Solution - UNAH 2022</div>
                </div>
            </div>
        </div>
    </footer> 

<script src="js/scripts.js"></script>
<script src="./js/lock.js"></script>

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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>
</html>
