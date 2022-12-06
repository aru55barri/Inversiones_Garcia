<?php 
include '../config/conn.php';
if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $sql = "select * from tbl_producto where codproducto = '$id'";
     $result = mysqli_query($conn, $sql);
     foreach ($result as $i) {
         $matrizProductos[] = [
            'ID_PRODUCTO' => $i['codproducto'],
            'DESCRIPCION_PRODUCTO' => $i['descripcion'],
            'PRECIO' => $i['precio_venta']
         ];
     }

    echo json_encode($matrizProductos);
}



if (isset($_GET['stock'])) {
    $id = $_GET['stock'];
    $sql = "select * from tbl_inventario where cod_producto = '$id'";
    $result = mysqli_query($conn, $sql);
    foreach ($result as $i) {
        $matrizProductos[] = [
           'stock' => $i['cantidad']
        ];
    }

   echo json_encode($matrizProductos);
}



