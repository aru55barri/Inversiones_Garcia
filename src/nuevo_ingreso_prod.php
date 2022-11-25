<?php
include_once('../Login/header.php');
require_once '../Config/conexion.php';
include '../Config/conn.php';
include_once('../controladores/controlador_ingreso_Prod.php');
$compra = new CompraContralador();
// $sql = consultas("SELECT * FROM tbl_objetos");
$productos = $compra->mostrarProductos();
$proveedores = $compra->mostrarLotes();
//$pago = $compra->mostrartipoPago();
$IDUS = $_SESSION['id_usuario'];
if (isset($_POST['registrar'])) {


    $total = 0;
    $items = $_SESSION['new_compra']['items'];
    $tienda;
    $transaccion;
    $proveedor;
    $subtotal = 0;
    $impuesto = 0;
    $totalfinal = 0;
    // disminuir en la tabla existencia
    foreach ($items as $i) {
        $existencia = mysqli_query($conn, "SELECT * from tbl_inventario where cod_producto = '" . $i['producto'] . "'");
        if (mysqli_num_rows($existencia) > 0) {
            $row = mysqli_fetch_array($existencia);
            $cantidad = $row['cantidad'];
            $cantidad = ($cantidad + $i['cantidad']);
            $sql = "UPDATE tbl_inventario SET cantidad = '$cantidad' WHERE cod_producto = '" . $i['producto'] . "'";
            mysqli_query($conn, $sql);

            $sql1 = "UPDATE tbl_producto SET existencia = '$cantidad' WHERE codproducto = '" . $i['producto'] . "'";
            mysqli_query($conn, $sql1);
        } else {
            $sql = "INSERT INTO tbl_inventario (cantidad, cod_producto ) VALUES ('" . $i['cantidad'] . ',' . $i['producto'] . "')";
            mysqli_query($conn, $sql);
        }

        // $row = mysqli_fetch_array($existencia);
        // $stok = $row['CANTIDAD_UNITARIA'];
        // $total = ($stok + $i['cantidad']);
        // $updateexistencia = mysqli_query($conn, "UPDATE tbl_productos set CANTIDAD_UNITARIA = '$total' where COD_PRODUCTO = '" . $i['producto'] . "'");
        $totalfinal = ($totalfinal + $i['totalfinal']); //sustituir total por totalfinal y cambiarlo en la consulta
        $proveedor = $i['proveedor'];
        $subtotal = ($subtotal + $i['totalbruto']);
    } 
  

    mysqli_query($conn, "INSERT INTO tbl_ingreso_producto
    (fecha, sub_total, isv, total, 	id_lote, id_usuario)
    VALUES(now(), '$subtotal', 0.15, '$totalfinal', '$proveedor', '$IDUS')");
    $rs = mysqli_query($conn, "SELECT MAX(id) as id FROM tbl_ingreso_producto");
    $row = mysqli_fetch_array($rs);
    $id = $row['id'];

    $sql = "INSERT INTO tbl_detalle_ingreso_producto (id_ingreso,codproducto,precio,cantidad) VALUES ";
    foreach ($items as $i) {
        $sql  .= "('$id','" . $i['producto'] . "','" . $i['costo'] . "','" . $i['cantidad'] . "'),";
        mysqli_query($conn, "INSERT INTO tbl_kardex(id_movimiento,id_producto,fecha,id_usuario,cantidad)VALUES(1,'" . $i['producto'] . "',now(), '$IDUS','" . $i['cantidad'] . "')");

        // mysqli_query($conn, "INSERT into tbl_movimientos(TIPO_MOVIMIENTO,CANTIDAD,PRODUCTO,FECHA_HORA) values ('Entradas','" . $i['cantidad'] . "','" . $i['producto'] . "',now())");
    }

    $sql = rtrim($sql, ",");
    mysqli_query($conn, $sql);

    unset($_SESSION['new_compra']['items']);
    unset($_SESSION['tiendacompra']);
    unset($_SESSION['proveedorcompra']);
    unset($_SESSION['transaccioncompra']);

    $_SESSION['registro'] = 'ok';
        echo "<script> 
        location.href ='../src/Inventario_materia.php';
        </script>";

    echo "<script> 
    location.href ='../src/Inventario_materia.php';
    </script>";
}

if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $items = $_SESSION['new_compra']['items'];
    // Si no hay items
    if (empty($items)) {
        return false;
    }

    // Si hay items iteramos
    foreach ($items as $i => $item) {
        // Validar si existe con el mismo id pasado
        if ($item['id'] == $id) {
            unset($_SESSION['new_compra']['items'][$i]);
?>
            <script>
                Notiflix.Notify.failure('Eliminado correctamente');
            </script>
        <?php
        }
    }
}

////////////////////////////////////////// INICIA LIMPIAR  //////////////////////////////////////////
if (isset($_GET['limpiar'])) {

    unset($_SESSION['new_compra']['items']);
    unset($_SESSION['proveedorcompra']);
    echo "<script> 
    location.href ='../src/Inventario_materia.php';
    </script>";
}
////////////////////////////////////////// TERMINA LIMPIAR //////////////////////////////////////////

if (isset($_POST['agregar'])) {
    $alert = "";
    if (
        empty($_POST['costo']) ||
        empty($_POST['cantidad']) ||
        empty($_POST['totalbruto']) ||
        empty($_POST['totalfinal']) ||
        empty($_POST['producto'])

    ) {
        ?>
        <script>
            Notiflix.Notify.failure('Registrado incorrectamente');
        </script>
        <?php

    } else {

        if (isset($_SESSION['proveedorcompra'])) {
            $proveedor = $_SESSION['proveedorcompra'];
        } else {
            $_SESSION['proveedorcompra'] = $_POST['proveedor'];
            $proveedor = $_POST['proveedor'];
        }

        $costo = $_POST['costo'];
        $cantidad = $_POST['cantidad'];
        $totalbruto = $_POST['totalbruto'];
        $totalfinal = $_POST['totalfinal'];
        $productoo = $_POST['producto'];
 

        function get_items()
        {
            $items = [];

            // Si no existe la cotización y obviamente está vacio el array
            if (!isset($_SESSION['new_compra']['items'])) {
                return $items;
            }

            // La cotización existe, se asigna el valor
            $items = $_SESSION['new_compra']['items'];
            return $items;
        }

        function get_item($id)
        {
            $items = get_items();

            // Si no hay items
            if (empty($items)) {
                return false;
            }

            foreach ($items as $item) {
                if ($item['id'] === $id) {
                    return $item;
                }
            }
            return false;
        }

        function add_item($item)
        {
            $items = get_items();

            if (get_item($item['id']) !== false) {
                foreach ($items as $i => $e_item) {
                    if ($item['id'] === $e_item['id']) {
                        $_SESSION['new_compra']['items'][$i] = $item;
                        return true;
                    }
                }
            }
            $_SESSION['new_compra']['items'][] = $item;
            return true;
        }



        // Agregar concepto
        function hook_add_to_quote()
        {

            global $conn;
            global $costo;
            global $cantidad;
            global $totalbruto;
            global $totalfinal;
            global  $productoo;
            global $proveedor;
             //si existe la sesion buscamos en la session	
            if (isset($_SESSION['new_compra']['items'])) {
                $idproducto = array_column($_SESSION['new_compra']['items'], 'producto');
                //validamms que el producto no este registrado

                if (in_array($productoo, $idproducto)) { ?>
                    <script>
                        Notiflix.Notify.failure('Este producto ya fue agregado');
                    </script>
                <?php
                } else {

                    $productos = mysqli_query($conn, "SELECT * FROM tbl_producto where codproducto  = '$productoo'");
                    $p = mysqli_fetch_array($productos);

                    $item =
                        [
                            'id'       => rand(1111, 9999),
                            'productotext' => $p['descripcion'],
                            'costo'    => $costo,
                            'cantidad' => $cantidad,
                            'totalbruto' => $totalbruto,
                            'totalfinal' => $totalfinal,
                            'producto' => $productoo,
                            'proveedor' => $proveedor,
                         ];

                    if (!add_item($item)) {
                    }

                    get_item($item['id']);
                ?>
                    <script>
                        Notiflix.Notify.successs('Agregado correctamente');
                    </script>
                <?php
                }
            } else {
                //creamos 


                $productos = mysqli_query($conn, "SELECT * FROM tbl_producto where codproducto = '$productoo'");
                $p = mysqli_fetch_array($productos);


                $item =
                    [
                        'id' => rand(1111, 9999),
                        'productotext' => $p['descripcion'],
                        'costo'    => $costo,
                        'cantidad' => $cantidad,
                        'totalbruto' => $totalbruto,
                        'totalfinal' => $totalfinal,
                        'producto' => $productoo,
                        'proveedor' => $proveedor,
 
                    ];

                if (!add_item($item)) {
                }

                get_item($item['id']);
                ?>
                <script>
                    Notiflix.Notify.successs('Agregado correctamente');
                </script>
<?php
            }
        }
        hook_add_to_quote();
    }
}



?>



<!-- Begin Page Content -->
<div class="content p-2">

    <div class="page-title">
        <div class="title_left">
            <h3>Compras</h3>
        </div>

        <div class="title_right">
            <div class="col-md-4 col-sm-4 form-group row pull-right top_search">
                <button onclick="window.location.href='Inventario_materia.php';" class="btn  btn-round btn-success">Compras realizadas</button>
            </div>
        </div>
    </div>


    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card-header bg-primary text-white">
                Datos de compra
            </div>
            <div class="card p-2">
                <form action="" method="post" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="utienda">Productos</label>
                                <select name="producto" id="producto" class="form-control" required="required" onchange="products()">
                                    <option value="">Seleccione un producto</option>
                                    <?php while ($row = $productos->fetch()) { ?>
                                        <option value="<?php echo $row['codproducto'] ?>"><?php echo $row['descripcion'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <?php if (!isset($_SESSION['proveedorcompra'])) { ?>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="utienda">Lote</label>
                                    <select name="proveedor" id="proveedor" class="form-control" required="required">
                                        <option value="">Seleccione un lote</option>
                                        <?php while ($row = $proveedores->fetch()) { ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['descripcion'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            

                        <?php } ?>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="dni">Costo unitario</label>
                                <input type="text" placeholder="" name="costo" id="costo" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="dni">Cantidad</label>
                                <input type="text" placeholder="" required name="cantidad" id="cantidad" onKeyUp="pierdeFoco(this)" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="dni">Isv</label>
                                <input type="text" value="0.20" class="form-control" id="isv" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="dni">Total bruto</label>
                                <input type="text" name="totalbruto" id="totalbruto" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="dni">Total final</label>
                                <input type="text" name="totalfinal" id="totalfinal" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <button type="submit" name="agregar" class="btn btn-success">Agregar producto</button>
                                <div id="div_registro_cliente" style="display: none;">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">

            <div class="card-header bg-primary text-white">
                Productos Agregados
            </div>
            <div class="card">
                <div class="card-body">
                    <?php if (isset($_SESSION['new_compra']['items'])) { ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">

                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                        <th>Eliminar</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ii = 0;
                                    $total = 0;
                                    foreach ($_SESSION['new_compra']['items'] as $i) {
                                    ?>
                                        <tr>
                                            <th><?php echo $ii = $ii + 1 ?></th>
                                            <th><?php echo $i['productotext'] ?></th>
                                            <th><?php echo $i['costo'] ?></th>
                                            <th><?php echo $i['cantidad'] ?></th>
                                            <th><?php echo $i['totalfinal'] ?></th>
                                            <th>
                                                <button class="btn btn-danger" onclick="eliminar(<?= $i['id']; ?>)" name="eliminar"><i class='fas fa-trash-alt'></i></button>
                                            </th>

                                        </tr>
                                    <?php
                                        $total = $total + $i['totalfinal'];
                                    }
                                    ?>

                                    <tr>
                                        <td colspan="4" align="right">
                                            <h3>Total</h3>
                                        </td>
                                        <td align="right">
                                            <h3><?php echo number_format($total, 2); ?></h3>
                                        </td>
                                        <td></td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>

                    <?php } else { ?>
                        <div class="alert alert-danger" role="alert">
                            No existen productos en el carrito
                        </div>
                    <?php } ?>

                    <div class="row">
                        <div class="col-lg-2">
                            <form action="" method="post">
                                <button class="btn btn-success" name="registrar" type="submit">Terminar
                                    compra</button>
                            </form>
                        </div>

                        <div class="col-lg-8"></div>
                        <div class="col-lg-2">

          
                                <button class="btn btn-danger" submu onclick="limpiar()" name="limpiar" type="submit">Cancelar compra</button>
                        
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>

</div>
<?php include_once('../Login/Footer.php');
?>


<script>
    function eliminar(id) {
        Notiflix.Confirm.show(
            'Confirmar',
            'Desea eliminar?',
            'Si',
            'No',
            () => {
                window.location.href = "nuevo_ingreso_prod.php?eliminar=" + id;
            },
            () => {
                Notiflix.Report.warning('Cancelado', 'Hiciste clic en el botón "No"');
            }, {});
    }

    function limpiar() {
        Notiflix.Confirm.show(
            'Confirmar',
            'Desea Cancelar la compra?',
            'Si',
            'No',
            () => {
                window.location.href = "nuevo_ingreso_prod.php?limpiar";
            },
            () => {
                Notiflix.Report.warning('Cancelado', 'Hiciste clic en el botón "No"');
            }, {});
    }
</script>


<script>
    let stck = 0;

    function pierdeFoco(e) {
        var valor = e.value.replace(/^0*/, '');
        e.value = valor;
    }

    let producto;
    let productotext;

    function products() {
        let idproducto = document.getElementById('producto').value;
        console.log(idproducto);
        fetch('../controladores/Inventario_materia.php?id=' + idproducto)
            .then(response => response.json())
            .then((data) => {
                console.log(data);
                costo.value = data[0].PRECIO;
                cantidad.value = '';
                console.log(data[0].PRECIO);
                console.log(data[0]);
                stck = data[0].CANTIDAD_UNITARIA;
            })
    }

    function myFunctionpp() {


        // fetch('http://localhost/icv/sistema/obtenerprecio.php?producto=' + productotext + '&talla=' + tallas)
        //     .then(response => response.json())
        //     .then(data => {
        //         costo.value = data[0].PRECIO_COMPRA;
        //     })
    }
    cantidad.oninput = function() {
        // if (parseInt(cantidad.value) > stck) {
        //     Notiflix.Notify.failure('La cantidad no puede ser mayor a la existencia');
        //     cantidad.value = '';
        // } else {
        totalbruto.value = costo.value * cantidad.value;
        let subtotal = totalbruto.value * isv.value;
        totalfinal.value = subtotal + parseInt(totalbruto.value);
        // }


    };
</script>