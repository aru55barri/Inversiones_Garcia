<?php
include_once('../Login/header.php');
include_once('../controladores/controlador_permisos.php');
include_once('../modelos/modelo_principal.php');
$id = $_GET['id'];
$model = new ModeloPrincipal();
$permisos = new Contralador();
$roles = $permisos->obtenerRoles(); 
$objeto = $permisos->obtenerObjetos();

$sql = $permisos->mostrarid($id);


if ($_POST) {
    $insertar = $_POST['insertar'];
    $eliminar = $_POST['eliminar'];
    $modificar = $_POST['modificar'];
    $consultar = $_POST['consultar'];
    $PDF = $_POST['pdf'];
    $rol = $_POST['rol'];
    $objeto = $_POST['objeto'];
    $model->UpdatePermisos($insertar, $eliminar, $modificar, $consultar, $PDF, $rol, $objeto, $id);
    echo "<script> 
    location.href ='../src/permisos.php';
    </script>";
}
?>


<br><br><br><br><br><br><br><br>
<main>
    <div class="container" style="margin-top: -200px; margin-bottom: 20px;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header" style="background-color: rgb(171, 237, 230);">
                        <h3 class="text-center font-weight-light my-4">Actualizar permisos</h3>
                    </div>

                    <div class="card-body">
                        <form class="needs-validation" id="form-register" method="POST">
                            <div class="form-floating mb-3">
                                <select name="insertar" class="form-control">
                                    <option value="" selected disabled>--Seleccione una opción--</option>
                                    <option value="1" <?php if ($sql[0][0]['permiso_insercion'] == 1) echo 'selected="selected"'; ?>>SI</option>
                                    <option value="0" <?php if ($sql[0][0]['permiso_insercion'] == 0) echo 'selected="selected"'; ?>>NO</option>
                                </select>
                                <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;Insertar</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <select name="eliminar" class="form-control">
                                    <option value="" selected disabled>--Seleccione una opción--</option>
                                    <option value="1" <?php if ($sql[0][0]['permiso_eliminacion'] == 1) echo 'selected="selected"'; ?>>SI</option>
                                    <option value="0" <?php if ($sql[0][0]['permiso_eliminacion'] == 0) echo 'selected="selected"'; ?>>NO</option>
                                </select>
                                <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;Eliminar</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <select name="modificar" class="form-control">
                                    <option value="" selected disabled>--Seleccione una opción--</option>
                                    <option value="1" <?php if ($sql[0][0]['permiso_modificar'] == 1) echo 'selected="selected"'; ?>>SI</option>
                                    <option value="0" <?php if ($sql[0][0]['permiso_modificar'] == 0) echo 'selected="selected"'; ?>>NO</option>
                                </select>
                                <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;Modificar</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <select name="consultar" class="form-control">
                                    <option value="" selected disabled>--Seleccione una opción--</option>
                                    <option value="1" <?php if ($sql[0][0]['permiso_consultar'] == 1) echo 'selected="selected"'; ?>>SI</option>
                                    <option value="0" <?php if ($sql[0][0]['permiso_consultar'] == 0) echo 'selected="selected"'; ?>>NO</option>
                                </select>
                                <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;Consultar</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <select name="pdf" class="form-control">
                                    <option value="" selected disabled>--Seleccione una opción--</option>
                                    <option value="1" <?php if ($sql[0][0]['pdf'] == 1) echo 'selected="selected"'; ?>>SI</option>
                                    <option value="0" <?php if ($sql[0][0]['pdf'] == 0) echo 'selected="selected"'; ?>>NO</option>
                                </select>
                                <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;PDF</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                            </div>

                            <div class="form-floating mb-3 mb-md-0">
                                <select name="rol" required="true" class="form-control">
                                    <option value="" selected disabled>--Seleccione una opción--</option>
                                    <?php while ($rowt = $roles->fetch()) { ?>
                                        <option value="<?php echo $rowt['id_rol']; ?>" <?= $sql[0][0]['id_rol'] == $rowt['id_rol'] ? 'selected' : '' ?>><?php echo $rowt['rol']; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="txtID"><i class="fa-regular fa-id-badge"></i>&nbsp;Rol</label>
                            </div>
                            <br>

                            <div class="form-floating mb-3">
                                <select name="objeto" class="form-control">
                                    <option value="">--Seleccione una opción--</option>
                                    <?php while ($rowt = $objeto->fetch()) { ?>
                                        <option value="<?php echo $rowt['id_objeto']; ?>" <?= $sql[0][0]['id_objeto'] == $rowt['id_objeto'] ? 'selected' : '' ?>><?php echo $rowt['Objeto']; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;Objeto</label>
                            </div>

                            
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="button" class="btn btn-info" style="background-color:rgba(0, 177, 33, 0.91);" value="Actualizar" />
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid"><input type="button" onclick="window.location.href='../src/permisos.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <script src="./js/validar.js" type="text/javascript"></script>
                <script src="./js/moment.js"></script>
                <script src="./js/jquery.js" type="text/javascript"></script>

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

                /**AGREGADO POR DENIA */
                //validar DNI
                document.getElementById("txtID").addEventListener("change", validarDNI);

                function validarDNI() {
                    const formData = new FormData(document.getElementById('form-register'));
                    formData.append('_action', 'validarDNI');
                    fetch('../controladores/controladorLogin.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(result => {
                            console.log(result.error);
                            if (result.error != '') {
                                document.querySelector('#button').disabled = true;
                                $("#2mensaje").text("Identidad ya a sido Registrada Anteriormente").css("color", "red");
                            } else {
                                //  eliminar el ensaje de error del DOM
                                $("#2mensaje").text("").css("color", "red");
                                document.querySelector('#button').disabled = false;
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Ha ocurrido un error');
                        });
                }

                //validar Fecha
                document.getElementById("naci").addEventListener("change", validarFecha);

                function validarFecha() {
                    var nacimiento = moment(document.getElementById("naci").value);
                    var hoy = moment();
                    var anios = hoy.diff(nacimiento, "years");
                    var fecha = document.getElementById("dtpfechaNacimiento");

                    //ANIOS PERMITIDO
                    if (anios < 18) {
                        document.querySelector('#button').disabled = true;
                        $("#fechamensaje").text("La persona debe tener al menos 18 años").css("color", "red");
                        fecha.style.borderColor = "red";
                        fecha.style.boxShadow = "0 0 10px red";
                    } else {
                        $("#fechamensaje").text("").css("color", "red");
                        document.querySelector('#button').disabled = false;
                        fecha.style.borderColor = "green";
                        fecha.style.boxShadow = "0 0 10px green";
                    }
                }
            })()
        </script>
    </div>
</main>




<?php
include_once('../Login/footer.php');
?>