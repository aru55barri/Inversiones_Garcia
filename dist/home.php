<?php require_once '../Login/header.php';
require "../config/conexion.php";


/////////////////////////////// PARA LA GRAFICA 
$query1 = "SELECT c.nombre, SUM(f.Total) AS total_gastado 
FROM tbl_factura AS f 
INNER JOIN tbl_cliente AS c ON f.idCliente = c.idcliente 
WHERE f.estado = 'Activo' AND c.nombre <> 'CONSUMIDOR FINAL'
GROUP BY c.nombre 
ORDER BY total_gastado DESC 
LIMIT 10;";
$result = mysqli_query($conexion, $query1);

// Crear un array con los datos
$data1 = array();
while ($row = mysqli_fetch_assoc($result)) {
  $data1[] = $row;
}
/////////////////////////////// PARA LA GRAFICA 
$query = "SELECT descripcion, existencia FROM tbl_producto ORDER BY existencia DESC LIMIT 5";
$result = mysqli_query($conexion, $query);

// Crear un array con los datos
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
  $data[] = $row;
}

// Cerrar la conexión a la base de datos

/////////////////////////////
$sql1 = mysqli_query($conexion, "SELECT * FROM tbl_config_empresa where id = 1");
$rom = mysqli_fetch_array($sql1);

$nombre = $rom['nombre'];
$tel = $rom['tel'];
$direccion = $rom['direccion'];

$sql2 = mysqli_query($conexion, "SELECT COUNT(id_usuario) as contador FROM tbl_usuario");
$rod = mysqli_fetch_array($sql2);

$usarios = $rod['contador'];

$sql2 = mysqli_query($conexion, "SELECT COUNT(idcliente) as contador FROM tbl_cliente");
$rod = mysqli_fetch_array($sql2);

$clientes = $rod['contador'];

$sql2 = mysqli_query($conexion, "SELECT COUNT(codproducto) as contador FROM tbl_producto");
$rod = mysqli_fetch_array($sql2);

$productos = $rod['contador'];

date_default_timezone_set('America/Mexico_City');
$fechaActual = date('y-m-d');

//SELECT SUM(total) as suma FROM tbl_factura WHERE estado = 'Activo'
$sql2 = mysqli_query($conexion, "SELECT SUM(total) as suma FROM tbl_factura WHERE Fecha_fac LIKE '%$fechaActual%' and estado = 'Activo'");
$rod = mysqli_fetch_array($sql2);

$ventas = $rod['suma'];

?>

<main>


        <div class="container-fluid px-4">
        <Center><h1 class="mt-4"><?= $rom['nombre'] ?> <img src="data:image;base64,<?php echo base64_encode($rom['logo']);  ?>" width="150px" class="img-thumbnail" > </h1></Center>

            <style>
            h1{
                font-family: Vladimir Script;
                font-size: 80px;
            }

            .logo{
                width:250px;
            }
            </style>
            <br>
 




            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body" id="letra"> <strong> <i> Nueva Venta </i></strong> <i id="icono" class="fa fa-cart-plus"></i></div>

                        <style>
                            #icono{
                                font-size: 50px;
                            }

                            #letra{
                                font-size: 25px;
                            }
   

                        </style>
                        <div class="card-footer card bg-white  ">
                            
                        <?php
                            if($_SESSION['Tipo_Usuario']=="administrador" || $_SESSION['Tipo_Usuario'] == "Ventas"){
                                echo '<a class="small text-black stretched-link" href="../src/NuevaVenta.php">Realizar Nueva Venta <i class="fas fa-angle-right small text-black"  id="flecha"></i></a>';
                            }
                        ?>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body" id="letra"><strong> <i> Ventas hoy </i></strong> <i id="icono" class="far fa-money-bill-alt"></i></div>
                        <div id="letra"> <Center> <strong>  <i> L <?php echo number_format($ventas, 2); ?></i></strong> </Center>
                        
                        </div>
                        <div class="card-footer card-footer card bg-white ">

                            <?php
                                if($_SESSION['Tipo_Usuario']=="administrador" || $_SESSION['Tipo_Usuario'] == "Ventas"){
                                    echo '<a class="small text-black stretched-link" href="../src/Factura.php">Visualizar facturas totales  <i class="fas fa-angle-right"></i></a>';
                                 
                                }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body" id="letra"> <strong> <i> Productos  </i></strong> <i id="icono" class="fa fa-book"></i></div>
                        <div id="letra"> <Center><strong> <i> <?php  echo number_format($productos); ?></i></strong> </Center>
                        
                        </div>
                        <div class="card-footer card bg-white">
                            
                            <?php
                                if($_SESSION['Tipo_Usuario']=="administrador"){
                                    echo '<a class="small text-black stretched-link" href="../src/producto.php">Visualizar productos  <i class="fas fa-angle-right"></i></a>';
                                }
                            ?>
                           
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body" id="letra"> <strong> <i> Usuarios  </i></strong> <i id="icono" class="fa fa-users"></i></div>
                        <div id="letra"> <Center><strong> <i> <?php  echo number_format($usarios); ?></i></strong> </Center>
                        </div>
                        <div class="card-footer card bg-white">
                       
                            <?php
                                if($_SESSION['Tipo_Usuario']=="administrador"){
                                    echo '<a class="small text-black stretched-link" href="../Login/vista_usuarios.php">Visualizar Usuarios 
                                    <i class="fas fa-angle-right"></i></a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>

      
  <div class="col-md-6 text-start">
    <canvas id="myChart" width="60%" height="35"></canvas>
  </div>
  <div class="col-md-6 text-end">
    <canvas id="myChart1" width="53%" height="35"></canvas>
  </div>
</div>

<br>    
<br>
            <div class="col-xl-3 col-md-6">
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div  class="modal-header bg-secondary text-white" id="letra">  
                            
                        <strong> <i>  Misión  </i></strong>
                        </div>
                        <p>Elaborar y comercializar vinos de alta calidad, con el propósito 
                            de ofrecer a nuestros clientes la posibilidad de disfrutar un nuevo 
                            concepto en vinos ofreciendo diversas alternativas de sabor para 
                                satisfacer a las necesidades y expectativas de los gustos más exigentes. 
                            </p>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="modal-header bg-secondary text-white" id="letra">
                        <strong> <i>  Visión  </i></strong>
                            
                        </div>
                        <p>Ser una empresa líder en la industria de los vinos, reconocida a nivel 
                            nacional por su calidad e innovación en la elaboración de productos con 
                            identidad hondureña, y procurando la satisfacción de nuestros clientes 
                            y posicionarnos como la mejor opción al momento de elegir una bebida.
                            </p>

                    </div>
                </div>
            </div>
        </div>
            

    

    <script>
var ctx = document.getElementById('myChart').getContext('2d');

// Crear un array con los nombres y cantidades
var labels = [];
var values = [];
<?php foreach ($data as $item): ?>
  labels.push('<?php echo $item['descripcion']; ?>');
  values.push(<?php echo $item['existencia']; ?>);
<?php endforeach; ?>

// Definir los colores
var colors = ['rgba(54, 162, 235)', 'rgba(255, 99, 132)', 'rgba(255, 206, 86)', 'rgba(75, 192, 192)', 'rgba(153, 102, 255)'];

// Configurar la gráfica
var config = {
  type: 'bar',
  data: {
    labels: labels,
    datasets: [{
      label: 'Cantidad',
      data: values,
      backgroundColor: colors,
      borderColor: colors,
      borderWidth: 1
    }]
  },
  options: {
    plugins: {
      title: {
        display: true,
        text: 'Los 5 productos con mayor existencia',
        font: {
          size: 18
        }
      }
    },
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
};

// Crear la gráfica
var myChart = new Chart(ctx, config);

var ctx = document.getElementById('myChart1').getContext('2d');

// Crear un array con los nombres y cantidades
var labels = [];
var values = [];
<?php foreach ($data1 as $item): ?>
  labels.push('<?php echo $item['nombre']; ?>');
  values.push(<?php echo $item['total_gastado']; ?>);
<?php endforeach; ?>

// Definir los colores
var colors = ['rgba(255, 0, 255)', 'rgba(128, 128, 128)', 'rgba(255, 215, 0)', 'rgba(54, 162, 235)', 'rgba(255, 99, 132)', 'rgba(75, 192, 192)', 'rgba(153, 102, 255)', 'rgba(255, 159, 64)', 'rgba(255, 206, 86)', 'rgba(0, 255, 255)'];

// Configurar la gráfica
var config = {
  type: 'bar',
  data: {
    labels: labels,
    datasets: [{
      label: 'Lempiras (L)',
      data: values,
      backgroundColor: colors,
      borderColor: colors,
      borderWidth: 1
    }]
  },
  options: {
    plugins: {
      title: {
        display: true,
        text: 'Los 10 clientes mas frecuentes',
        font: {
          size: 18
        }
      }
    },
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }],
      xAxes: [{
        ticks: {
          fontSize: 10
        }
      }]
    }
  }
};

// Crear la gráfica
var myChart1 = new Chart(ctx, config);



</script>
</main>
<?php include_once "../Login/footer.php"; ?>

