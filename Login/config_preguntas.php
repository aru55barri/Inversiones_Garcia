<?php

include_once('../controladores/controladorLogin.php');
include_once('../config/conn.php');

session_start();

$preguntas = obtenerPreguntass();


if (!isset($_SESSION['user'])) {
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
    <title>Cambio contraseña</title>
    <link rel="icon" href="../dist/assets/img-2/Logo-IG.ico">
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../dist/css/styles.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">

       
    <?php
    
    if (isset($_POST['guardar'])) {
        $pregunta = $_POST['pregunta'];
        $respuesta = $_POST['respuesta'];
        $id = $_SESSION['user']['id_usuario'];

        $num = mysqli_query($conn, "SELECT * from tbl_preguntas_usuario where id_usuario = '$id'");
        $num = mysqli_num_rows($num);
        
            $prgu = mysqli_query($conn, "SELECT * from tbl_preguntas_usuario where id_pregunta = '$pregunta' AND id_usuario='$id'");
            if (mysqli_num_rows($prgu) > 0) {
             echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Uoops...',
                text: 'Esta pregunta ya fue registrada!'
            })
            </script>";
            } else {
                InsertarPreguntas($pregunta, $respuesta, $id);  
                $mas=$_SESSION['maxpreguntas']-1;
                //condicion para saber si ya configuro todas las preguntas
                if ($mas == $num){
                       //CONDICION PARA SABER SI  VIENE DE AUTOREGISTRO
                       $es= $_SESSION['user']['id_estado'];
                       if($es==5){
                           unset($_SESSION['user']);
                           //CAMBIO DE ESTADO Y DE PRIMER INGRESO A 1
                           $prgu = mysqli_query($conn, "UPDATE tbl_usuario SET primer_ingreso=1 WHERE id_usuario='$id'");
                           $prg = mysqli_query($conn, "UPDATE tbl_usuario SET id_estado=1 WHERE id_usuario='$id'");
                           //header('Location: ./login.php');
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
                       }else{
                        echo("<script>location.href = './cambio_pass.php';</script>");
                       } 
                }              
           }
    }
    
    
    ?>
    
    <div id="layoutAuthentication" style="margin-top: -20px;">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container" style="margin-top: 100px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-3 rounded-lg mt-5">
                                <div class="card-header" style="background-color: ;">
                                    <h3 class="text-center font-weight-light my-4">Configuración preguntas seguridad</h3>
                                    <style>
                                        h3{
                                            font-family: Vladimir Script;
                                            font-size: 40px;
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

                                    // Procesar la respuesta del usuario y actualizar el número de pregunta actual si corresponde
                                    if (isset($_POST['respuesta'])) {
                                    // ... procesar la respuesta del usuario ...
                                    $num_pregunta_actual++; // Agregar 1 al valor actual de $num_pregunta_actual
                                    }

                                    // Mostrar el número de pregunta actual y el número total de preguntas a contestar en la página HTML
                                    ?>
                                    <div>
                                    <p><?php echo "Pregunta $num_pregunta_actual de $num_preguntas"; ?></p>
                                </div>
                                <div class="card-body">
                                    <form method="POST" class="needs-validation" novalidate>


                                        <div class="form-floating d-flex  align-items-center justify-content-between mt-4 mb-0">
                                            <select name="pregunta" id="" class="form-control" required>
                                                <option value="">Seleccione una pregunta</option>
                                                <?php while ($rowt = $preguntas->fetch()) { ?>
                                                    <option value="<?php echo $rowt['id_pregunta']; ?>"><?php echo $rowt['pregunta']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <label for="inputpassword">Pregunta</label>
                                        </div>


                                        <div class="form-floating d-flex  align-items-center justify-content-between mt-4 mb-0">
                                            <input class="form-control" style="width: 440px" id="inputPassword" name="respuesta" type="text" maxlength="256" required />
                                            <label for="inputpassword">Respuesta</label>

                                            <div class="valid-tooltip">
                                                Campo Valido!
                                            </div>
                                            <br>
                                            <div class="invalid-tooltip">
                                                Por favor complete el campo!
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                            <button class="button2" type="submit" name="guardar">Guardar</button>
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
    
</script>
</body>

</html>