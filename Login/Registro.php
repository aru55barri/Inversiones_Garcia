<?php
    require_once "../config/conexion.php";
    require_once "../config/conn.php";

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
                
                $query1 = mysqli_query($conn, "SELECT * FROM tbl_usuario where usuario = '$usuario'");
                $result1 = mysqli_fetch_array($query1);
    
                if ($result1 > 0) {
                    $alert = '<div class="alert alert-warning" role="alert">
                                El usuario ya existe
                            </div>';
                        } else {


                $insertarUsuario=insertarUsuarioEmpleado($nombre, $apellido, $correo, $usuario, $password);

                if($insertarUsuario > 0){
                    $alert = '<div class="alert alert-danger" role="alert">
                    Error al registrar
                    </div>';
                } else {
                   $_SESSION['registroU'] = 'ok';
                
                    echo "<script> 
                   location.href ='../Login/login.php?registro=1';
                   </script>";   
                }

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
    <main>
        <section>
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
                                        <i class="fas fa-user-circle icon"></i>
                                        <input name="usuario" id="usuario" type="text" placeholder="Usuario" maxlength="20" autocomplete="nope" value="<?php echo isset($_POST['usuario']) ? $_POST['usuario'] : ''; ?>" required pattern="[A-Z]{1,}" title="Ingrese su nombre de usuario en letras mayúsculas sin espacios">
                                        <div class="valid-feedback">
                                            Campo Valido!
                                        </div>
                                        <div class="invalid-feedback">
                                            Solo Debe Ingresar Letras Mayusculas en Usuario.
                                        </div>
                                    </div>

                                    <div class="input-contenedor">
                                        <i class="fas fa-user icon"></i>
                                        <input name="nombre" id="nombre" maxlength="50" type="text" placeholder="Nombre y Apellido" value="<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?>" required pattern="[A-Z]{1,}">
                                        <div class="valid-feedback">
                                            Campo Valido!
                                        </div>
                                        <div class="invalid-feedback">
                                            No se permiten numeros ni caracteres especiales en Nombre y Apellido.
                                        </div>
                                    </div>
                                    
                                    <div class="input-contenedor">
                                        <i class="fas fa-envelope icon"></i>
                                        <input type="text" name="correo" maxlength="45" placeholder="Correo electronico" value="<?php echo isset($_POST['correo']) ? $_POST['correo'] : ''; ?>" required>
                                        <div class="valid-feedback">
                                            Campo Valido!
                                        </div>
                                        <div class="invalid-feedback">
                                        Por favor ingrese un correo electrónico válido.
                                        </div>
                                    
                                    </div>

                                    <div class="input-contenedor form-floating d-flex">
                                        <i class="fas fa-key icon" style="margin-top: 20px"></i>
                                        <input type="password" id="ncontrasena" name="clave" maxlength="20" placeholder="Contraseña" style="width: 395px" title="La contraseña debe tener al menos una letra mayúscula, una minúscula, un símbolo y un mínimo de 8 caracteres." required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,30}" />
                                        <button class="btn btn-primary" type="button" onclick="mostrarPasswordN()"><span class="fa fa-eye"></span></button>
                                        <div class="valid-feedback">
                                            Campo Valido!
                                        </div>
                                        <div class="invalid-feedback">
                                            La contraseña debe tener al menos una letra mayúscula, una minúscula, un símbolo y un mínimo de 8 caracteres.
                                        </div>
                                    
                                    </div>
                                    
                                    
                                    <div class="input-contenedor form-floating d-flex">
                                        <i class="fas fa-key icon" style="margin-top: 20px"></i>
                                        <input type="password" id="cncontrasena" name="clave2" maxlength="50" placeholder="Confirmar contraseña" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,30}" />
                                        <button class="btn btn-primary" type="button" onclick="mostrarPasswordC()"><span class="fa fa-eye"></span></button>
                                    </div>

                                    <?php echo isset($alert) ? $alert : ''; ?>           

                                    <button type="submit" name="Registro" id="Registro" value="Registrate" class="button">Registrar</a>

                                </div>
                                <div>
                                    <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
                                    <p>¿Ya tienes una cuenta?<a class="link" href="../index.php">Iniciar Sesion</a></p>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
                
    </main>       
    <br>
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

        
    </script>
    <script>
        var nombre = document.getElementsByName('nombre')[0];
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
        var correo = document.getElementsByName('correo')[0];
        var botonRegistro = document.getElementById('Registro');

        correo.addEventListener('blur', function() {
            var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!regex.test(correo.value)) {
                // Efecto de sombra color rojo en el borde
                correo.style.borderColor = "red";
                correo.style.boxShadow = "0 0 10px red";
                correo.classList.add("is-invalid");
                correo.classList.remove("is-valid");

                botonRegistro.disabled = true; // deshabilitar el botón
                
            } else {
                // Efecto de sombra color verde en el borde
                correo.style.borderColor = "green";
                correo.style.boxShadow = "0 0 10px green";
                correo.classList.add("is-valid");
                correo.classList.remove("is-invalid");

                botonRegistro.disabled = false; // habilitar el botón
                
            }
        });
    </script>

<script>
    var password = document.getElementById('ncontrasena');
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
    
</body>
</html>
