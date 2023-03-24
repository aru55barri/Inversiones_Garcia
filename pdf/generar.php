<?php
require_once '../config/conexion.php';
require_once 'fpdf/fpdf.php';
$pdf = new FPDF('P', 'mm', 'letter');
$pdf->AddPage();
$pdf->SetMargins(10, 10, 10);
$pdf->SetTitle("Ventas");
$pdf->SetFont('Arial', 'B', 12);
$id = $_GET['id'];
$idcliente = $_GET['cliente'];
$CAI = $_GET['CAI'];

date_default_timezone_set('America/Mexico_City');
$fechaActual = date('d/m/y h:i:s');
//$config = mysqli_query($conexion, "SELECT * FROM configuracion"); -------- DATOS DE CONFIGURACION DEL PDF
//$datos = mysqli_fetch_assoc($config);
$clientes = mysqli_query($conexion, "SELECT * FROM tbl_cliente WHERE idcliente = $idcliente");
$datosC = mysqli_fetch_assoc($clientes);

$consulta = "SELECT * FROM tbl_cai WHERE id = $CAI";
$resultado = mysqli_query($conexion, $consulta);
$MCAI = mysqli_fetch_assoc($resultado);

$Rinicial = $MCAI ['rango_inicial'];  
$Rfinal = $MCAI ['rango_final'];  
$Ractual = $MCAI ['rango_actual'];  
$NumCAI = $MCAI ['numero_CAI'];  
$fecha = $MCAI ['fecha_vencimiento'];  

mysqli_query($conexion, "UPDATE tbl_factura SET Num_CAI = '$NumCAI', Num_Factura = '$Ractual' WHERE id_factura = '$id'");



if ($Ractual+1 > $Rfinal) {
    $Ractual = 00000000000;

    mysqli_query($conn, "UPDATE tbl_factura SET Num_CAI = '$NumCAI', Num_Factura = '$Ractual' WHERE id_factura = '$id'");

  }

$ventas = mysqli_query($conexion, "SELECT d.*, p.codproducto, p.descripcion FROM tbl_detalle_factura d INNER JOIN tbl_producto p ON d.codproducto = p.codproducto WHERE d.id_factura = $id");
$Apagar = mysqli_query($conexion, "SELECT * from tbl_factura WHERE id_factura = $id");
$pdf->Cell(195, 5, 'INVERSIONES GARCIA', 0, 1, 'C');
$pdf->Image("../dist/assets/img/Logo.jpeg", 180, 10, 30, 30, 'jpeg');
$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(20, 5, utf8_decode("Teléfono: "), 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(20, 5, '94993448', 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode("Dirección: "), 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(20, 5, 'Adea La Centilla, Calle Principal, Tela, Atlantida', 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 5, "Correo: ", 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(20, 5, 'garciainversiones.ig2022@gmail.com', 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(195, 5, 'Fecha emision de factura', 0, 1, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(195, 5, $fechaActual , 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(195, 5, 'Numero CAI', 0, 1, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(195, 5, $NumCAI , 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(195, 5, 'Numero de factura', 0, 1, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(195, 5, $Ractual , 0, 1, 'C');


$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(0, 0, 0);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(196, 5, "Datos del cliente", 1, 1, 'C', 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(90, 5, utf8_decode('Nombre'), 0, 0, 'L');
$pdf->Cell(50, 5, utf8_decode('Teléfono'), 0, 0, 'L');
$pdf->Cell(56, 5, utf8_decode('Dirección'), 0, 1, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(90, 5, utf8_decode($datosC['nombre']), 0, 0, 'L');
$pdf->Cell(50, 5, utf8_decode($datosC['telefono']), 0, 0, 'L');
$pdf->Cell(56, 5, utf8_decode($datosC['direccion']), 0, 1, 'L');
$pdf->Ln(3);
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(196, 5, "Detalle de Producto", 1, 1, 'C', 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(14, 5, utf8_decode('N°'), 0, 0, 'L');
$pdf->Cell(90, 5, utf8_decode('Descripción'), 0, 0, 'L');
$pdf->Cell(22, 5, 'Cantidad', 0, 0, 'L');
$pdf->Cell(25, 5, 'Precio', 0, 0, 'L');
$pdf->Cell(27, 5, 'Isv', 0, 0, 'L');
$pdf->Cell(32, 5, 'Sub Total', 0, 1, 'L');
$pdf->SetFont('Arial', '', 10);
$contador = 1;


while ($row = mysqli_fetch_assoc($ventas)) {
    $pdf->Cell(14, 5, $contador, 0, 0, 'L');
    $pdf->Cell(90, 5, $row['descripcion'], 0, 0, 'L');
    $pdf->Cell(22, 5, $row['cantidad'], 0, 0, 'L');
    $pdf->Cell(25, 5, $row['precio'], 0, 0, 'L');
    $pdf->Cell(27, 5, $row['isv'], 0, 0, 'L');
    $pdf->Cell(32, 5, number_format($row['cantidad'] * $row['precio'], 2, '.', ','), 0, 1, 'L');
    $contador++;
}

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(14, 5, utf8_decode(''), 0, 0, 'L');
$pdf->Cell(90, 5, utf8_decode(''), 0, 0, 'L');
$pdf->Cell(25, 5, 'Sub total', 0, 0, 'L');
$pdf->Cell(27, 5, 'Impuesto', 0, 0, 'L');
$pdf->Cell(32, 5, 'Total a pagar', 0, 1, 'L');
$pdf->SetFont('Arial', '', 10);
while ($raw = mysqli_fetch_assoc($Apagar)) {
    $pdf->Cell(14, 5, utf8_decode(''), 0, 0, 'L');
$pdf->Cell(90, 5, utf8_decode(''), 0, 0, 'L');
    $pdf->Cell(25, 5, $raw['Sub_Total'], 0, 0, 'L');
    $pdf->Cell(27, 5, $raw['ISV'], 0, 0, 'L');
    $pdf->Cell(32, 5, $raw['Total'], 0, 0, 'L');
}




$pdf->Output("Factura'$id'.pdf", "I");

?>
