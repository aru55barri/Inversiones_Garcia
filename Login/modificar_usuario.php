<?php
include_once('./header.php');
require_once '../config/conex.php';
include_once '../modelos/modelo_login.php';
include_once('../controladores/controladorLogin.php');
$id = $_GET['id'];
$usuario = new Usuario();
$row = $usuario->obtenerUsuarios($id);
$roles = $usuario->obtenerRoles();
$estados = $usuario->obtenerEstados();
$empleados = $usuario->obtenerEmpleados();
$db = getConexion();

if (!empty($_POST)) {
    $id = $_POST['id'];
    $usuario = $_POST['usuario'];
    //$nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $estado = $_POST['estado'];
    $empleado = $_POST['empleado'];
    $rol = $_POST['rol'];


    InsertarUpdateUsuarios($id, $usuario,  $correo, $rol, $empleado, $estado);
}
?>
<br><br><br><br><br><br><br>
<main>
    <div class="container" style="margin-top: -200px; margin-bottom: 20px;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header" style="background-color: rgb(171, 237, 230);">
                        <h3 class="text-center font-weight-light my-4">Editar usuario #<?= $row[0]['id_usuario']  ?></h3>
                    </div>
                    <div class="card-body">

                        <form class="needs-validation" method="POST">
                            <div class="row mb-3">
                                <input name="id" hidden type="text" value="<?= $row[0]['id_usuario']  ?>">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" value="<?= $row[0]['usuario'] ?>" name="usuario" id="inputFirstName" type="text" placeholder="Enter your first name" autocomplete="nope" size="25" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,25}" />
                                        <label for="inputFirstName"><i class="fas fa-user icon"></i>&nbsp;Usuario</label>
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
                                <input class="form-control" name="correo" id="inputEmail" type="email" value="<?= $row[0]['correo'] ?>" placeholder="name@example.com" required pattern="[a-zA-Z0-9!#$%&'_+-]([\.]?[a-zA-Z0-9!#$%&'_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?" />
                                <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;Correo electrónico</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor complete el campo, debe contener @ y un dominio.
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <select name="rol" required="true" class="form-control">
                                            <option value="" selected disabled>-- Seleccione un rol --</option>
                                            <?php while ($rowt = $roles->fetch()) { ?>
                                                <option value="<?php echo $rowt['id_rol']; ?>" <?= $row[0]['id_rol'] == $rowt['id_rol'] ? 'selected' : '' ?>><?php echo $rowt['rol']; ?></option>
                                            <?php } ?>
                                        </select>

                                        <label for="txtID"><i class="fa-regular fa-id-badge"></i>&nbsp;Roles</label>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        
                                        <select name="empleado" class="form-control" required="true">
                                            <option value="" selected disabled>-- Seleccione un nombre --</option>
                                            <?php while ($rowt = $empleados->fetch()) { ?>
                                                <option value="<?php echo $rowt['ID_EMPLEADO']; ?>" <?= $row[0]['id_empleado'] == $rowt['ID_EMPLEADO'] ? 'selected' : '' ?>><?php echo $rowt['NOMBRE_EMPLEADO']; ?></option>
                                            <?php } ?>
                                        </select>

                                        <label for="txtID"><i class="fa-regular fa-id-badge"></i>&nbsp;Nombre</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mb-3 mb-md-0">
                                <select name="estado" class="form-control" required="true">
                                    <option value="" selected disabled>-- Seleccione un estado --</option>
                                    <?php while ($rowt = $estados->fetch()) { ?>
                                        <option value="<?php echo $rowt['id_estado']; ?>" <?= $row[0]['id_estado'] == $rowt['id_estado'] ? 'selected' : '' ?>><?php echo $rowt['nombre_estado']; ?></option>
                                    <?php } ?>
                                </select>

                                <label for="txtID"><i class="fa-regular fa-id-badge"></i>&nbsp;Estados</label>
                            </div>
                            <br>
                            <div class="form-floating mb-3 mb-md-0">
                                <div class="form-floating mb-3">
                                    <input class="form-control" value="<?php echo $row[0]['fecha_vencimiento'] ?>" disabled name="fecha" type="date" required />

                                    <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;Fecha de vencimiento</label>
                                    <div class="valid-feedback">
                                        Campo Válido!
                                    </div>
                                    <div class="invalid-feedback">
                                        Por favor complete el campo.
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="button" class="btn btn-info" style="background-color:rgba(46, 182, 210, 0.8)" value="Actualizar" />

                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><input type="button" onclick="window.location.href='../Login/vista_usuarios.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />

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