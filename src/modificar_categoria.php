<?php

require_once '../controladores/controlador_categoria.php';
$id = $_GET['id'];
if (!empty($_GET)) {

    //$id = base64_decode($_GET['id']);
    $row = obtenerUnCliente($id);
}

if (!empty($_POST)) {
    $tipo = $_POST['txttipo'];
    $descripcion= $_POST['txtdescripcion'];
   

    $resultado = EditarCategoria($tipo,$descripcion);

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
                location.href ='../src/categoria.php';
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
                        <h3 class="text-center font-weight-light my-4">Editar Categoria #<?= $row['id']  ?></h3>
                    </div>
                    <div class="card-body">

                    <form class="needs-validation" method="POST">
                            <div class="row mb-3">
                                <input name="id" hidden type="text" value="<?= $row['id']  ?>">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" value="<?= $row['id'] ?>"  name="txtid" id="txtid" type="number" placeholder="Enter your first name" autocomplete="nope" size="25" required />
                                        <label for="inputFirstName"><i class=""></i>&nbsp;id</label>
                                        <div class="valid-feedback">
                                            Campo Válido!
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor complete el campo, solo puede ingresar letras.
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row mb-3">
                                <div class="col-md-6">
                                <div class="form-floating mb-3">
                                <input class="form-control" name="txttipo" id="txttipo" type="number" value="<?= $row['id_tipo_categ'] ?>" placeholder="name@Enter your first name" autocomplete="nope" size="25" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,25}" />
                                <label for="inputFirstName"><i class=""></i>&nbsp;Tipo</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">
                                Por favor complete el campo, solo puede ingresar Numero
                              </div>
                            </div>
                                </div>


                            <div class="row mb-3">
                                <div class="col-md-6">
                                <div class="form-floating mb-3">
                                <input class="form-control" name="txtdescripcion" id="txtdescripcion" type="text" value="<?= $row['descripcion'] ?>" placeholder="name@Enter your first name" autocomplete="nope" size="25" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,25}" />
                                <label for="inputFirstName"><i class=""></i>&nbsp;Descripcion</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">
                                Por favor complete el campo, solo puede ingresar Letras Mayusculas
                              </div>
                            </div>
                                </div>

                            

                            
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="button" class="btn btn-info" style="background-color:rgba(46, 182, 210, 0.8)" value="Actualizar" />
                            
                             
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><input type="button" onclick="window.location.href='../src/categoria.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />

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
        var dni = document.getElementById('txtdni');
        var telefono = document.getElementById('txttelefono');
        var rtn = document.getElementById('txtrtn');
        var direccion = document.getElementById('txtdireccion');

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
        });
        direccion.addEventListener('keypress', function(e) {
            if ( e.keyCode > 90 ) {
                e.preventDefault();
                //efecto de sombra color rojo en el borde
                direccion.style.borderColor = "red";
                direccion.style.boxShadow = "0 0 10px red";
                direccion.classList.add("is-invalid");
                direccion.classList.remove("is-valid");
            } else {
                //efecto de sombra color verde en el borde
                direccion.style.borderColor = "green";
                direccion.style.boxShadow = "0 0 10px green";
                direccion.classList.add("is-valid");
                direccion.classList.remove("is-invalid");
            }
        });
   
        
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</script>
<?php
include_once('../login/footer.php');
?>