<?php

include_once('../Login/header.php');
require_once '../controladores/controlador_CAI.php';
$id = $_GET['id'];
if (!empty($_GET)) {

    //$id = base64_decode($_GET['id']);
    //$row = obtenerUnCliente($id);
    $row = obtenerCAI($id);
}

if (!empty($_POST)) {
    $rango_inicial = $_POST['txtrango_inicial'];
    $rango_final = $_POST['txtrango_final'];
    $rango_actual = $_POST['txtrango_actual'];
    $numero_CAI= $_POST['txtnumero_CAI'];
    $fecha_vencimiento = $_POST['txtfecha_vencimiento']; 

    $resultado = EditarCAI($id, $rango_inicial,$rango_final,$rango_actual,$numero_CAI,$fecha_vencimiento);

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
                location.href ='../src/CAI.php';
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
                        <h3 class="text-center font-weight-light my-4">Editar Registro CAI #<?= $row['id']  ?></h3>
                    </div>
                    <div class="card-body">

                    <form class="needs-validation" method="POST">
                            <div class="row mb-3">
                                <input name="id" hidden type="text" value="<?= $row['id']  ?>">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" value="<?= $row['rango_inicial'] ?>"  name="txtrango_inicial" id="txtrango_inicial" type="text" placeholder="Rango Incial" autocomplete="nope" size="25" required />
                                        <label for="inputFirstName"><i class=""></i>&nbsp;Rango Inicial</label>
                                        <div class="valid-feedback">
                                            Campo Válido!
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor complete el campo, solo puede ingresar letras.
                                        </div>
                                    </div>
                                </div>
                            

                            <div class="col-md-6">                          
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="txtrango_final" id="txtrango_final" type="text" value="<?= $row['rango_final'] ?>" placeholder="Rango Final" autocomplete="nope" size="25" required/>
                                    <label for="inputFirstName"><i class=""></i>&nbsp;Rango final</label>
                                    <div class="valid-feedback">
                                        Campo Válido!
                                    </div>
                                    <div class="invalid-tooltip">
                                                    Solo Debe Ingresar Letras Mayusculas 
                                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                <div class="form-floating mb-3">
                                <input class="form-control" name="txtrango_actual" id="txtrango_actual" type="text" value="<?= $row['rango_actual'] ?>" placeholder="Rango Actual" autocomplete="nope" size="25" />
                                <label for="inputFirstName"><i class=""></i>&nbsp;Rango Actual</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">
                                Por favor complete el campo, solo puede ingresar numeros.
                              </div>
                            </div>
                                </div>

                            <div class="row mb-3">
                                <div class="col-md-15">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" value="<?= $row['numero_CAI'] ?>"  name="txtnumero_CAI" id="txtnumero_CAI" type="text" placeholder="Enter your first name" autocomplete="nope" size="50" />
                                        <label for="inputFirstName"><i class="fas fa-user icon"></i>&nbsp;Numero CAI</label>
                                        <div class="valid-feedback">
                                            Campo Válido!
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor complete el campo, solo puede ingresar letras.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <?php
                                $fecha_vencimiento = date('Y-m-d', strtotime($row['fecha_vencimiento']));
                                ?>
                                <input class="form-control" value="<?= $fecha_vencimiento ?>" id="txtfecha_vencimiento" name="txtfecha_vencimiento" type="date" required />

                                <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;Fecha de vencimiento</label>
                                <span id="fechamensaje"></span>

                            </div>
                        </div>

                            
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="submit-btn" class="btn btn-info" style="background-color:rgba(46, 182, 210, 0.8)" value="Actualizar" />
                            
                             
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><input type="button" onclick="window.location.href='../src/CAI.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />

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

const fechaInput = document.getElementById('txtfecha_vencimiento');
fechaInput.addEventListener('input', validarFecha);

function validarFecha() {

  const hoy = new Date();
  hoy.setHours(0, 0, 0, 0); 


  const fechaIngresada = new Date(fechaInput.value);

  
  if (fechaIngresada < hoy) {
    fechaInput.style.borderColor = "red";
    fechaInput.style.boxShadow = "0 0 10px red";
    fechaInput.classList.add('is-invalid');
    $("#fechamensaje").text("La fecha no puede ser menor a la actual.").css("color", "red");

    fechaInput.value = null;
  } else {

 
    document.getElementById('fechamensaje').textContent = '';
    fechaInput.style.borderColor = "green";
    fechaInput.style.boxShadow = "0 0 10px green";
    fechaInput.classList.remove('is-invalid');
    $("#fechamensaje").text("Campo Válido.").css("color", "green");
  }
}
                        // Seleccionar el elemento del input del rango_inicial
                        var rangoInicialInput = document.getElementById("txtrango_inicial");
                        var rangoFinalInput = document.getElementById("txtrango_final");
                        var rangoActualInput = document.getElementById("txtrango_actual");

                        // Crear la máscara personalizada
                        var rangoActualInput = IMask(rangoActualInput, {
                            mask: '000-000-00-00000000'
                            
                           });
                        var rangoInicialMask = IMask(rangoInicialInput, {
                            mask: '000-000-00-00000000'
                            
                           });

                           var rangoFinalMask = IMask(rangoFinalInput, {
                            mask: '000-000-00-00000000'
                            
                           });

                        // Seleccionar el elemento del input
                        var numeroCAIInput = document.getElementById("txtnumero_CAI");

                        numeroCAIInput.addEventListener("input", function() {
                                // Eliminar caracteres que no sean letras mayúsculas o números
                        var valor = numeroCAIInput.value.replace(/[^A-Z0-9]/g, "");
                        numeroCAIInput.value = valor;
                    });
                                                // Seleccionar el elemento del input
                        var numeroCAIInput = document.getElementById("txtnumero_CAI");

                        // Crear la máscara personalizada utilizando imask.js
                        var numeroCAIMask = IMask(numeroCAIInput, {
                            mask: 'SSSSSS-SSSSSS-SSSSSS-SSSSSS-SSSSSS-SS',
                            blocks: {
                                S: {
                                    mask: /^[A-Z0-9]$/
                                },
                                N: {
                                    mask: /^[A-Z0-9]{2}$/
                                }
                            }
                        });

                      // Función para que cuando se envie el formulario no se vayan con los guiones 
                      document.getElementById("submit-btn").addEventListener("click", function() {
                        var numeroCAIInput = document.getElementById("txtrango_inicial");
                        numeroCAIInput.value = numeroCAIInput.value.replace(/-/g, "");
                        var FINALCAIInput = document.getElementById("txtrango_final");
                        FINALCAIInput.value = FINALCAIInput.value.replace(/-/g, "");
                        var ACTUALCAIInput = document.getElementById("txtrango_actual");
                        ACTUALCAIInput.value = ACTUALCAIInput.value.replace(/-/g, "");
                    });

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
include_once('../Login/footer.php');
?>