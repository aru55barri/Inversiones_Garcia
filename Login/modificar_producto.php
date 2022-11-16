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
    $existencia = $_POST['existencia'];
    $cant_minima = $_POST['cant_minima'];
    $cant_maxima = $_POST['cant_maxima'];
    $precio = $_POST['precio'];
    $estado = 1;


    ProductoContralador::InsertarUpdateProducto($id, $descripcion, $categ, $tipo, $existencia, $precio, $cant_minima, $cant_maxima, $estado);

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
                                <input class="form-control" name="descripcion" value="<?= $producto[0]['descripcion'] ?>" id="inputLastName" type="text" placeholder="Enter your last name" autocomplete="nope" required />
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
                                <input class="form-control" value="<?= $producto[0]['precio_venta'] ?>" name="precio" id="inputEmail" type="text" placeholder="name@example.com" required />
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
                                <input class="form-control" value="<?= $producto[0]['existencia'] ?>" name="existencia" id="inputEmail" type="imagen" placeholder="name@example.com" />

                                <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;<IMG>EXISTENCIA</IMG></label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor complete el campo, debe contener @ y un dominio.
                                </div>
                            </div>
               
                            <div class="form-floating mb-3">
                                <input class="form-control" value="<?= $producto[0]['cantidad_minima'] ?>" name="cant_minima" id="inputEmail" type="imagen" placeholder="name@example.com" />
                                <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;<IMG>CANTIDAD MINIMA</IMG></label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor complete el campo, debe contener @ y un dominio.
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" value="<?= $producto[0]['cantidad_maxima'] ?>" name="cant_maxima" id="inputEmail" type="imagen" placeholder="name@example.com" />
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
                                    <div class="d-grid"><input type="button" onclick="window.location.href='../vistas/vista_productos.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />
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


<?php

include_once('../Login/Footer.php');
?>