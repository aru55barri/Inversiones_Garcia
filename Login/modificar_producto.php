<?php
include_once('../Login/header.php');
require_once '../Config/Conexion.php';
include_once '../modelos/modelo_login.php';
include_once('../controladores/controlador_producto.php');


$id = $_GET['id'];

$usuario = new ModeloProducto();
$producto = $usuario->obtenerProducto($id);
$tipo = $usuario->obtenerTipo();
$categ = $usuario->obtenerCateg();
//$estado = $usuario->obtenerEstado();


$db = getConexion();
if ($_POST) {
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    
    $categ = $_POST['combo_categoria'];
    $tipo = $_POST['combo_tipo'];
   // $existencia = $_POST['existencia'];
    $cant_minima = $_POST['cant_minima'];
    $cant_maxima = $_POST['cant_maxima'];
    $precio = $_POST['precio'];
    $estado = 1;


    ProductoContralador::InsertarUpdateProducto($id, $descripcion, $categ, $tipo, $precio, $cant_minima, $cant_maxima, $estado);

}
?>

<br><br><br><br><br><br><br><br>
<main>
    <div class="container" style="margin-top: -200px; margin-bottom: 20px;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header" style="background-color: rgb(171, 237, 230);">
                        <h3 class="text-center font-weight-light my-4">Editar Producto #<?= $producto[0]['codproducto'] ?></h3>
                    </div>
                    
                    <div class="card-body">
                        <form class="needs-validation" method="POST">

                            <input name="id" hidden type="text" value="<?= $producto[0]['codproducto']  ?>">

                            <div class="form-floating">
                            <input class="form-control" name="descripcion" id="descripcion" value="<?= $producto[0]['descripcion'] ?>"  type="text" maxlength="50" onkeypress="return sololetrasMa(event)" onpaste="return false" placeholder="Enter your last name" autocomplete="nope" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,25}" />
                                <label for="inputLastName"><i class="fa-solid fa-user-group"></i>&nbsp;DESCRIPCION PRODUCTO</label>
                                <div class="valid-feedback">
                                    Campo Válido.
                                </div>
                                <div class="invalid-feedback">
                                    Por favor complete el campo, solo puede ingresar letras.
                                </div>
                            </div>
                            <br>
                            <div class="form-floating mb-3">
                            <input class="form-control" value="<?= $producto[0]['precio_venta'] ?>" name="precio" id="precio" type="text" maxlength="11" onkeypress="return solonumeros(event)" onpaste="return false" required  />
                                <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;PRECIO</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor complete el campo, debe contener @ y un dominio.
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <select name="combo_categoria" class="form-control" required>
                                    <option value="" selected disabled>-- Seleccione --</option>
                                    <?php while ($rowt = $categ->fetch()) { ?>
                                        <option value="<?php echo $rowt['id']; ?>" <?= $producto[0]['id_categoria'] == $rowt['id'] ? 'selected' : '' ?>><?php echo $rowt['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;TIPO CATEGORIA</label>
                                <div class="valid-feedback">
                                    Campo Válido!s
                                </div>
                                <div class="invalid-feedback">
                                    Por favor complete el campo, debe contener @ y un dominio.
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <select name="combo_tipo" class="form-control" required>
                                            <option value="" selected disabled>-- Seleccione --</option>
                                            <?php while ($rowt = $tipo->fetch()) { ?>
                                                <option value="<?php echo $rowt['id']; ?>" <?= $producto[0]['id_tipo_producto'] == $rowt['id'] ? 'selected' : '' ?>><?php echo $rowt['descripcion']; ?></option>

                                            <?php } ?>
                                        </select>

                                        <label for="txtID"><i class="fa-regular fa-id-badge"></i>&nbsp;TIPO PRODUCTO</label>
                                    </div>
                                </div>

                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" value="<?= $producto[0]['existencia'] ?>" disabled name="existencia" id="inputEmail" type="imagen" placeholder="name@example.com"/>

                                <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;<IMG>EXISTENCIA</IMG></label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor complete el campo, debe contener @ y un dominio.
                                </div>
                            </div>
               
                            <div class="form-floating mb-3">
                                <input class="form-control" value="<?= $producto[0]['cantidad_minima'] ?>" name="cant_minima" id="cant_minima"type="number" onKeyUp="pierdeFoco(this)" onpaste="return false" min = 0 required  />
                                <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;<IMG>CANTIDAD MINIMA</IMG></label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor complete el campo, debe contener @ y un dominio.
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" value="<?= $producto[0]['cantidad_maxima'] ?>" name="cant_maxima" id="cant_maxima" type="number" onKeyUp="pierdeFoco(this)" onpaste="return false" min = 0 required  />
                                <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;<IMG>CANTIDAD MAXIMA</IMG></label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor complete el campo, debe contener @ y un dominio.
                                </div>
                            </div>


                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="button" class="btn btn-info" style="background-color:rgba(46, 182, 210, 0.8)" value="Actualizar" />
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><input type="button" onclick="window.location.href='../src/producto.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
   var nombre = document.getElementById('descripcion');
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

var nombre = document.getElementsByName('descripcion')[0];
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


var precio = document.getElementById('precio');

precio.addEventListener('input', function() {
  // Eliminar todo lo que no sea un número o un punto
  this.value = this.value.replace(/[^0-9\.]/g, '');

  // Asegurarse de que solo hay un punto decimal
  if (this.value.indexOf('.') !== -1) {
    if (this.value.indexOf('.') !== this.value.lastIndexOf('.')) {
      this.value = this.value.slice(0, -1);
    }
  }
});



 function pierdeFoco(e) {
        var valor = e.value.replace(/^0*/, '');
        e.value = valor;
    }

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

            })()
        </script>
<?php

include_once('../Login/footer.php');

?>