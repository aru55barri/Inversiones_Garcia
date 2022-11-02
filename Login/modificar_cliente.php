<?php
include_once('./header.php');
require_once '../config/conexion.php';
include_once '../modelos/modelo_login.php';
include_once('../controladores/controladorLogin.php');
$id = $_GET['id'];
$consulta = "select * from tbl_cliente where idcliente = $id";
$resultado = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_assoc($resultado);


?>
<br><br><br><br><br><br><br>
<main>
    <div class="container" style="margin-top: -200px; margin-bottom: 20px;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header" style="background-color: rgb(171, 237, 230);">
                        <h3 class="text-center font-weight-light my-4">Editar Cliente #<?= $row['idcliente']  ?></h3>
                    </div>
                    <div class="card-body">

                    <form class="needs-validation" method="POST">
                            <div class="row mb-3">
                                <input name="id" hidden type="text" value="<?= $row['idcliente']  ?>">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" value="<?= $row['DNI'] ?>"  name="dni" id="inputFirstName" type="text" placeholder="Enter your first name" autocomplete="nope" size="25" required />
                                        <label for="inputFirstName"><i class=""></i>&nbsp;DNI</label>
                                        <div class="valid-feedback">
                                            Campo Válido!
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor complete el campo, solo puede ingresar letras.
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="form-floating mb-3">
                                <input class="form-control" name="nombre" id="inputFirstName" type="text" value="<?= $row['nombre'] ?>" placeholder="name@Enter your first name" autocomplete="nope" size="50" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required/>
                                <label for="inputFirstName"><i class=""></i>&nbsp;Nombre</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">
                                Por favor complete el campo, solo puede ingresar letras.
                              </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                <div class="form-floating mb-3">
                                <input class="form-control" name="telefono" id="inputFirstName" type="number" value="<?= $row['telefono'] ?>" placeholder="name@Enter your first name" autocomplete="nope" size="25" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,25}" />
                                <label for="inputFirstName"><i class=""></i>&nbsp;Numero celular</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">
                                Por favor complete el campo, solo puede ingresar numeros.
                              </div>
                            </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" value="<?= $row['RTN'] ?>"  name="nombre" id="inputFirstName" type="text" placeholder="Enter your first name" autocomplete="nope" size="15" required  />
                                        <label for="inputFirstName"><i class="fas fa-user icon"></i>&nbsp;RTN</label>
                                        <div class="valid-feedback">
                                            Campo Válido!
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor complete el campo, solo puede ingresar letras.
                                        </div>
                                    </div>
                                </div>

                            
                                <div class="form-floating mb-3">
                                <input class="form-control" name="nombre" id="inputFirstName" type="text" value="<?= $row['direccion'] ?>" placeholder="name@Enter your first name" autocomplete="nope" size="150" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required/>
                                <label for="inputFirstName"><i class=""></i>&nbsp;Dirección</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">
                                Por favor complete el campo, solo puede ingresar letras.
                              </div>
                            </div>

                            
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="button" class="btn btn-info" style="background-color:rgba(46, 182, 210, 0.8)" value="Actualizar" />
                            
                             
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><input type="button" onclick="window.location.href='../Login/vista_cliente.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />

                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
</main>

<?php
include_once('Footer.php');
?>