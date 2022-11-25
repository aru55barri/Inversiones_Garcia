<?php
include_once('../login/header.php');
include_once('../controladores/controlador_roles.php');
include_once('../modelos/modelo_principal.php');


$id = $_GET['id'];
$model = new ModeloPrincipal();

$roles = new Contralador();
$row = $roles->mostrarid($id);

if ($_POST) {
    $id = $_POST['id'];
    $rol = $_POST['rol'];
    $descripcion = $_POST['descripcion'];
    $model->UpdateRoles($id, $rol, $descripcion);
    echo "<script> 
    location.href ='../src/Mantenimiento_roles.php';
    </script>"; 
}

?>

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header" style="background-color: rgb(171, 237, 230);">
                <h3 class="text-center font-weight-light my-4">Actualizar rol</h3>
            </div>
            <div class="card-body">
                <form class="needs-validation" id="form-register" method="POST">
                    <input name="id" hidden type="text" value="<?= $row[0][0]['id_rol'] ?>">
                    <div class="form-floating">
                        <input class="form-control" value="<?= $row[0][0]['rol'] ?>" name="rol" id="inputLastName" type="text" onpaste="return false" onkeypress="return sololetrasMa(event)" placeholder="Rol" autocomplete="nope" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,25}" />
                        <label for="inputLastName"><i class="fa-solid fa-user-group"></i>&nbsp;Rol</label>
                        <div class="valid-feedback">
                            Campo Válido.
                        </div>
                        <span id="mensaje"></span>
                    </div>
                    <br>
                    <div class="form-floating mb-3">
                        <input class="form-control" value="<?= $row[0][0]['descripcion'] ?>" name="descripcion" id="inputEmail" type="text" onpaste="return false" onkeypress="return sololetrasAp(event)" placeholder="Descripcion" required />
                        <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;Descripcion</label>
                        <div class="valid-feedback">
                            Campo Válido!
                        </div>
                        <span id="1mensaje"></span>
                    </div>
            </div>
            <div class="mt-4 mb-0">
                <div class="d-grid"><input type="submit" id="button" class="btn btn-primary btn-block" value="Actualizar" />
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





<?php
include_once('../login/Footer.php');
?>