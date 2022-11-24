<?php 
include '../config/conn.php';


if (isset($_GET['stock'])) {
    $id = $_GET['stock'];
    $sql = "SELECT * FROM tbl_inventario WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    foreach ($result as $i) {
        $matrizProductos[] = [
           'stock' => $i['cantidad']
        ];
    }

   echo json_encode($matrizProductos);
}