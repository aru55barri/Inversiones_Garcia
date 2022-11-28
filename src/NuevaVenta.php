<?php
include_once('../Login/header.php');
require_once '../Config/conexion.php';
include '../Config/conn.php';
include_once('../controladores/controlador_ventas.php');
$clientes = new Contralador();
// $sql = consultas("SELECT * FROM tbl_objetos");
$pago = $clientes->mostrarPago();
$productos = $clientes->mostrarProductos();
$clientes = $clientes->mostrarClientes();


$cambio = 0;
$recibido = 12;
$apagar = 4;
$IDUS=$_SESSION['id_usuario'];
if (isset($_POST['registrar'])) {
    $total = 0;
    $items = $_SESSION['new_venta']['items'];
    $tienda;
    $transaccion;
    $cliente;
    $subtotal = 0;
    $impuesto = 0;
    $totalfinal = 0;
  
    // disminuir en la tabla existencia
    foreach ($items as $i) {
        $existencia = mysqli_query($conn, "SELECT * from tbl_inventario where cod_producto = '" . $i['producto'] . "'");
        if (mysqli_num_rows($existencia) > 0) {
            $row = mysqli_fetch_array($existencia);
            $cantidad = $row['cantidad'];
            $cantidad = ($cantidad - $i['cantidad']);
            $sql = "UPDATE tbl_inventario SET cantidad = '$cantidad' WHERE cod_producto = '" . $i['producto'] . "'";
            mysqli_query($conn, $sql);
            
            $sql1 = "UPDATE tbl_producto SET existencia = '$cantidad' WHERE codproducto = '" . $i['producto'] . "'";
            mysqli_query($conn, $sql1);
        }
        $totalfinal = ($totalfinal + $i['totalfinal']); //sustituir total por totalfinal y cambiarlo en la consulta
        $cliente = $i['cliente'];
        $subtotal = ($subtotal + $i['totalbruto']);
    }

    mysqli_query($conn, "INSERT INTO tbl_factura
    (id_factura, Fecha_fac, Sub_Total, ISV, Total,idcliente,id_usuario, id_Tpago, id_CAI)
    VALUES(null,now(),'$subtotal', 0.15, '$totalfinal', '$cliente', '$IDUS','" . $i['pago'] . "', '1')");

    $rs = mysqli_query($conn, "SELECT MAX(id_factura) as id FROM tbl_factura");
    $row = mysqli_fetch_array($rs);
    $id = $row['id'];

    $sql = "INSERT INTO tbl_detalle_factura (id_detalleFac, id_factura,codproducto,cantidad,precio) VALUES";
    foreach ($items as $i) {
        $sql  .= "(null, '$id','" . $i['producto'] . "','" . $i['cantidad'] .  "','" . $i['costo'] . "'),";
        mysqli_query($conn, "INSERT INTO tbl_kardex(id_movimiento,id_producto,fecha,id_usuario,cantidad)VALUES(2,'" . $i['producto'] . "',now(), '$IDUS','" . $i['cantidad'] . "')");
    }

    $sql = rtrim($sql, ",");
    mysqli_query($conn, $sql);

    unset($_SESSION['new_venta']['items']);
    unset($_SESSION['tiendacompra']);
    unset($_SESSION['clientecompra']);
    unset($_SESSION['pagocompra']);
    unset($_SESSION['transaccioncompra']);

    $_SESSION['registro'] = 'ok';
    echo "<script> 
        location.href ='../src/factura.php';
        </script>";

        echo "<script> 
        location.href ='../src/factura.php';
        </script>";
}

if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $items = $_SESSION['new_venta']['items'];
    // Si no hay items
    if (empty($items)) {
        return false;
    }

    // Si hay items iteramos
    foreach ($items as $i => $item) {
        // Validar si existe con el mismo id pasado
        if ($item['id'] == $id) {
            unset($_SESSION['new_venta']['items'][$i]);
            
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

    unset($_SESSION['new_venta']['items']);
    unset($_SESSION['clientecompra']);
    unset($_SESSION['pagocompra']);
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
            Notiflix.Notify.failure('Registrado correctamente');
        </script>
        <?php

    } else {

        if (isset($_SESSION['clientecompra'])) {
            $cliente = $_SESSION['clientecompra'];
        } else {
            $_SESSION['clientecompra'] = $_POST['cliente'];
            $cliente = $_POST['cliente'];

        }
        if (isset($_SESSION['pagocompra'])) {
            $pago = $_SESSION['pagocompra'];
             
        } else {
            $_SESSION['pagocompra'] = $_POST['pago'];
            $pago = $_POST['pago'];
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
            if (!isset($_SESSION['new_venta']['items'])) {
                return $items;
            }

            // La cotización existe, se asigna el valor
            $items = $_SESSION['new_venta']['items'];
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
                        $_SESSION['new_venta']['items'][$i] = $item;
                        return true;
                    }
                }
            }
            $_SESSION['new_venta']['items'][] = $item;
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
            global $productoo;
            global $cliente;
            global $pago;
            //si existe la sesion buscamos en la session	
            if (isset($_SESSION['new_venta']['items'])) {
                $idproducto = array_column($_SESSION['new_venta']['items'], 'producto');
                //validamms que el producto no este registrado

                if (in_array($productoo, $idproducto)) { ?>
                    <script>
                        Notiflix.Notify.failure('Este producto ya fue agregado');
                    </script>
                <?php
                } else {

                    $productos = mysqli_query($conn, "SELECT * FROM tbl_producto where codproducto = '$productoo'");
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
                            'cliente' => $cliente,
                            'pago' => $pago
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
                        'cliente' => $cliente,
                        'pago' => $pago
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
            <h3>Ventas</h3>
        </div>

        <div class="title_right">
            <div class="col-md-4 col-sm-4 form-group row pull-right top_search">
                <button onclick="window.location.href='factura.php';" class="btn  btn-round btn-success">Todas las facturas</button>
            </div>
        </div>
    </div>


    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card-header bg-primary text-white">
                Datos de ventas
            </div>
            <div class="card p-2">
                <form action="" method="post" class="needs-validation" autocomplete="off" >
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="utienda">Productos</label>
                                <select name="producto" id="producto" class="form-control" required="true" onchange="products()">
                                    <option value="">Seleccione un producto</option>
                                    <?php while ($row = $productos->fetch()) { ?>
                                        <option value="<?php echo $row['codproducto'] ?>"><?php echo $row['descripcion'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <?php if (!isset($_SESSION['clientecompra'])) { ?>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="utienda">Cliente</label>
                                    <select name="cliente" id="cliente" class="form-control" required="true">
                                        <option value="">Seleccione un cliente</option>
                                        <?php while ($row = $clientes->fetch()) { ?>
                                            <option value="<?php echo $row['idcliente'] ?>"><?php echo $row['nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if (!isset($_SESSION['pagocompra'])) { ?>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="utienda">Tipo Pago</label>
                                    <select name="pago" id="pago" class="form-control" >
                                         <?php while ($row = $pago->fetch()) { ?>
                                            <option value="<?php echo $row['id_Tpago'] ?>"><?php echo $row['descripcion'] ?></option>
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
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="dni">Stock</label>
                                <input type="text" placeholder="" disabled name="stok" id="stock" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="dni">Isv</label>
                                <input type="text" value="0.15" class="form-control" id="isv" readonly>
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
                    <?php if (isset($_SESSION['new_venta']['items'])) { ?>
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
                                    foreach ($_SESSION['new_venta']['items'] as $i) {
                                    ?>
                                        <tr>
                                            <th><?php echo $ii = $ii + 1 ?></th>
                                            <th><?php echo $i['productotext'] ?></th>
                                            <th><?php echo $i['costo'] ?></th>
                                            <th><?php echo $i['cantidad'] ?></th>
                                            <th><?php echo $i['totalfinal'] ?></th>
                                            <th><button class="btn btn-danger" onclick="eliminar(<?= $i['id'] ?>)" name="eliminar" type="submit"><i class='fas fa-trash-alt'></i></button></th>
                                        </tr>
                                    <?php       
                                    $total = $total + $i['totalfinal'];  
                                    //$impu = $total * 0.15; 
                                    //$total = $total + $impu;                 
                                    }
                     
                                    ?>
                                   
                                     
                                        <td colspan="4" align="right">
                                            <h3>Total a pagar</h3>
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

                          <button type="button" id="cobrar" name="cobrar" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Cobrar</button>
 
                        </div>

                        <div class="col-lg-8"></div>
                        <div class="col-lg-2">


                            <button class="btn btn-danger" onclick="limpiar()" name="limpiar" type="submit">Cancelar venta</button>

                        </div>
                       
                    </div>

                </div>
            </div>



        </div>
    </div>

</div>
<script>
  function pierdeFocos(e) {
        var valor = e.value.replace(/^0*/, '');
        e.value = valor;
    }
    recibido.oninput = function() {
        if (parseInt(cantidad.value) < 0) {
            Notiflix.Notify.failure('La cantidad no puede ser mayor a la existencia');
            recibido.value = '';
        } else {
            $cambio.value =  $recibido.value-$apagar.value;

        }
    };

</script>
<?php
   /*$cambio = $_POST['cambio'];
   $recibido = $_POST['recibido'];
   $apagar = $_POST['apagar'];*/
   
  if (isset($_POST['cobrar'])) {
    $alert = "";

}  
        if (isset($_POST['calcular'])) {
            $alert = "";       
            
            $cambio =  $recibido-$apagar;

    }

  
        ?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Facturar venta </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">A pagar:</label>
            <input type="text" class="form-control"  value="<?php echo number_format($total, 2); ?>" id="apagar"  name= "apagar">
          </div>
        
          <div class="form-group">
            <label for="recipient-name"  class="col-form-label">Recibido:</label>
            <input type="text" class="form-control" id="recibido" name ="recibido">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Cambio:</label>
            <input type="text" class="form-control"  value ="<?php echo number_format($cambio, 2); ?>" id="cambio" name ="cambio">
          </div>
       
        </form>
      </div>
             
      <div class="modal-footer">
        <button type="button" name = "close" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
           <button type="submit" id="calcular" name = "calcular" class="btn btn-secondary" >Calcular</button>
 
        <form action="" method="post">
        <button class="btn btn-success" name="registrar" id="terminar" type="submit" >Terminar venta <i class='far fa-file-alt' style="color: white;"></i></button>
        </form>      
        </div>
    </div>
  </div>
</div>
<?php include_once('../Login/footer.php');
?>
<script>
    function eliminar(id){
        Swal.fire({
            title: '¿Está seguro?',
            text: "¿Desea eliminar el producto de la lista?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!'
        }).then((result)=> {
            if(result.value){
                window.location.href = "NuevaVenta.php?eliminar=" + id;
          }
        } )
    }


    
    function limpiar() {
        Swal.fire({
            title: '¿Está seguro?',
            text: "¿Desea cancelar la venta?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, cancelar!'
        }).then((result)=> {
            if(result.value){
                window.location.href = "factura.php?limpiar";
          }
        } )
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
        fetch('../controladores/ventas.php?id=' + idproducto)
            .then(response => response.json())
            .then((data) => {
                console.log(data);
                costo.value = data[0].PRECIO;
                cantidad.value = '';

                fetch('../controladores/ventas.php?stock=' + idproducto)
                    .then(response => response.json())
                    .then((data) => {
                        stck = data[0].stock;
                        stock.value = data[0].stock;
                    })
                    
            })
    }

    cantidad.oninput = function() {
        if (parseInt(cantidad.value) > stck) {
            Notiflix.Notify.failure('La cantidad no puede ser mayor a la existencia');
            cantidad.value = '';
        } else {
            totalbruto.value = costo.value * cantidad.value;
            let subtotal = totalbruto.value * isv.value;
            totalfinal.value = subtotal + parseInt(totalbruto.value);
            $cambio =  $recibido-$apagar;

        }
    };

</script>