<?php

require_once '../controladores/controlador_preguntas_usuario.php';
$id = $_GET['id'];
if (!empty($_GET)) {

    //$id = base64_decode($_GET['id']);
    $row = obtenerUnCliente($id);
}

if (!empty($_POST)) {
    $nombre = $_POST['txtnombre'];
 

    $resultado = EditarCliente($id, $nombre);

    if ($resultado == true) {
        //REDIRIGIR A LA PAGINA PRINCIPAL CON JAVASCRIPT
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'EXCELENTE!',
            text: 'Editado con Exito!',
            confirmButtonText: 'Aceptar',
            position:'center',
            allowOutsideClick:false,
            padding:'1rem'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href ='../src/preguntas_usuario.php';
            }
        })    
    </script>";

        //Guardar en una SESSION de que se edito correctamente
        $_SESSION['EditarProveedor'] = 'Editado';
    } else {
    }
}

?>
<br><br><br><br><br><br><br>
<main>
    <div class="container" style="margin-top: -200px; margin-bottom: 20px;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header" style="background-color: rgb(171, 237, 230);">
                        <h3 class="text-center font-weight-light my-4">Editar Pregunta Usuario #<?= $row['id_pregunta']  ?></h3>
                    </div>
                    <div class="card-body">

                    <form class="needs-validation" method="POST">
                            <div class="row mb-3">
                                <input name="id" hidden type="text" value="<?= $row['id_pregunta']  ?>">
                                    <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="txtnombre" id="txtnombre" type="text" value="<?= $row['id_usuario'] ?>" placeholder="name@Enter your first name" autocomplete="nope" size="50" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required/>
                                <label for="inputFirstName"><i class=""></i>&nbsp;Usuario</label>
                                        <div class="valid-feedback">
                                            Campo Válido!
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor complete el campo, solo puede ingresar letras.
                                        </div>
                                    </div>
                                </div>
                            
                            <div class="row mb-3">
                                <input name="id" hidden type="text" value="<?= $row['id_pregunta']  ?>">
                                    <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="txtnombre" id="txtnombre" type="text" value="<?= $row['respuesta'] ?>" placeholder="name@Enter your first name" autocomplete="nope" size="50" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required/>
                                <label for="inputFirstName"><i class=""></i>&nbsp;Pregunta</label>
                                        <div class="valid-feedback">
                                            Campo Válido!
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor complete el campo, solo puede ingresar letras.
                                        </div>
                                    </div>
                                </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="button" class="btn btn-info" style="background-color:rgba(46, 182, 210, 0.8)" value="Actualizar" />
                            
                             
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><input type="button" onclick="window.location.href='../src/preguntas_usuarios.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />

                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
</main>
<script src="js/scripts.js"></script>
<script src="./js/lock.js"></script>

<!--VALIDACIONES EN TIEMPO REAL-->
    <script>
        var nombre = document.getElementById('txtnombre');

        nombre.addEventListener('keypress', function(e) {
            if (e.keyCode > 90 ) {
                e.preventDefault();
                //efecto de sombra color rojo en el borde
                nombre.style.borderColor = "red";
                nombre.style.boxShadow = "0 0 10px red";
                nombre.classList.add("is-invalid");
                nombre.classList.remove("is-valid");
            } else {
                //efecto de sombra color verde en el borde
                nombre.style.borderColor = "green";
                nombre.style.boxShadow = "0 0 10px green";
                nombre.classList.add("is-valid");
                nombre.classList.remove("is-invalid");
            }
   
        
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</script>
<?php
include_once('../Login/footer.php');
?>