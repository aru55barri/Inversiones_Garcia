-- Respaldo de la base de datos Inversiones Garcia
-- Fecha: 2022-12-08 19:32:27
-- Inversiones Garcia

-- --------------------------------------------------------
-- --------------------------------------------------------

CREATE DATABASE IF NOT EXISTS bd_inversiones_garcia DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE bd_inversiones_garcia;

SET FOREIGN_KEY_CHECKS = 0;

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Estructura de la tabla `tbl_bitacora`
--
DROP TABLE IF EXISTS tbl_bitacora;
CREATE TABLE `tbl_bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_usuario` int(11) NOT NULL,
  `id_objeto` int(11) NOT NULL,
  `accion` varchar(20) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_objeto` (`id_objeto`),
  KEY `id_usuario_2` (`id_usuario`),
  CONSTRAINT `tbl_bitacora_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_bitacora`
--
INSERT INTO `tbl_bitacora` VALUES('1','2022-12-08 19:02:12','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('2','2022-12-08 19:03:11','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('3','2022-12-08 19:03:42','1','3','NUEVO','SE CREA NUEVO REGISTRO EN EMPLEADOS');
INSERT INTO `tbl_bitacora` VALUES('4','2022-12-08 19:03:45','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('14','2022-12-08 19:11:01','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('20','2022-12-08 19:13:03','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('21','2022-12-08 19:14:17','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('22','2022-12-08 19:24:57','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('23','2022-12-08 19:25:17','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('25','2022-12-08 19:32:05','1','1','INGRESO','EL USUARIO INICIA SESION');

--
-- Estructura de la tabla `tbl_cai`
--
DROP TABLE IF EXISTS tbl_cai;
CREATE TABLE `tbl_cai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rango_inicial` varchar(30) NOT NULL,
  `rango_final` varchar(30) NOT NULL,
  `rango_actual` varchar(30) NOT NULL,
  `numero_CAI` varchar(100) NOT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_cai`
--
INSERT INTO `tbl_cai` VALUES('1','000-001-01-00000001','000-001-01-00000050','000-001-01-00000025','38701E-E0FB79-B14F87-6AF16B-DEE6D5-0A','2022-11-23','1');
INSERT INTO `tbl_cai` VALUES('2','0000010100000051','0000010100000099','10100000078','38701A-E0FB79-B14F87-6AF16B-DEE6D5-0B','2023-02-02','1');

--
-- Estructura de la tabla `tbl_cargos`
--
DROP TABLE IF EXISTS tbl_cargos;
CREATE TABLE `tbl_cargos` (
  `ID_CARGO` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION_CARGO` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_CARGO`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_cargos`
--
INSERT INTO `tbl_cargos` VALUES('1','ADMINISTRADOR');
INSERT INTO `tbl_cargos` VALUES('8','OTRO / SIN ASIGNAR');

--
-- Estructura de la tabla `tbl_categoria`
--
DROP TABLE IF EXISTS tbl_categoria;
CREATE TABLE `tbl_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_categ` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo_categ` (`id_tipo_categ`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_categoria`
--
INSERT INTO `tbl_categoria` VALUES('1','1','prueba');
INSERT INTO `tbl_categoria` VALUES('3','0','ACHOTE');
INSERT INTO `tbl_categoria` VALUES('10','2','MELASA');
INSERT INTO `tbl_categoria` VALUES('12','1','VINO DUERTO');
INSERT INTO `tbl_categoria` VALUES('14','2','NUECES');

--
-- Estructura de la tabla `tbl_cliente`
--
DROP TABLE IF EXISTS tbl_cliente;
CREATE TABLE `tbl_cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `DNI` varchar(18) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `RTN` varchar(14) DEFAULT NULL,
  `direccion` varchar(200) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idcliente`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_cliente`
--
INSERT INTO `tbl_cliente` VALUES('3','0','CONSUMIDOR FINAL','0','0','N/A','1');
INSERT INTO `tbl_cliente` VALUES('16','88998','ANNER ISCOA HERNANDEZ','78542','wwedwe','LAS TORRES','1');
INSERT INTO `tbl_cliente` VALUES('17','2354','MANUEL ','963','7777777777777','LAS VENIDERAS','1');
INSERT INTO `tbl_cliente` VALUES('19','6666','YUNI SALAS','6666','6666','MOJIMAN, YORO','1');
INSERT INTO `tbl_cliente` VALUES('23','88998','WALTER SALAMANCA','88888888','99999999999999','MIGUEL JOSUE DE LAS TORRES','1');
INSERT INTO `tbl_cliente` VALUES('24','88998','MASTER','77777777','77777777','mmmmmm','1');

--
-- Estructura de la tabla `tbl_descuento`
--
DROP TABLE IF EXISTS tbl_descuento;
CREATE TABLE `tbl_descuento` (
  `id_Descuento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_descuento` varchar(50) NOT NULL,
  `descripcion_descuento` varchar(50) NOT NULL,
  `procentaje_descuento` double(9,2) NOT NULL,
  PRIMARY KEY (`id_Descuento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_descuento`
--

--
-- Estructura de la tabla `tbl_descuento_factura`
--
DROP TABLE IF EXISTS tbl_descuento_factura;
CREATE TABLE `tbl_descuento_factura` (
  `id_descuento_Factura+` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_descuento` int(11) NOT NULL,
  `Total_Descontado` double(9,2) NOT NULL,
  `porcentaje_Descontar` double(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_descuento_factura`
--

--
-- Estructura de la tabla `tbl_detalle_factura`
--
DROP TABLE IF EXISTS tbl_detalle_factura;
CREATE TABLE `tbl_detalle_factura` (
  `id_detalleFac` int(11) NOT NULL AUTO_INCREMENT,
  `id_factura` int(11) NOT NULL,
  `codproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `isv` double(9,2) DEFAULT NULL,
  PRIMARY KEY (`id_detalleFac`),
  KEY `id_producto` (`codproducto`,`id_factura`)
) ENGINE=InnoDB AUTO_INCREMENT=396 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_detalle_factura`
--
INSERT INTO `tbl_detalle_factura` VALUES('352','192','9','7','21.67','168.11');
INSERT INTO `tbl_detalle_factura` VALUES('353','194','2','8','75.00','90.00');
INSERT INTO `tbl_detalle_factura` VALUES('354','194','3','5','105.87','79.40');
INSERT INTO `tbl_detalle_factura` VALUES('355','195','4','8','110.00','132.00');
INSERT INTO `tbl_detalle_factura` VALUES('356','195','5','7','21.67','22.75');
INSERT INTO `tbl_detalle_factura` VALUES('357','196','4','10','110.00','165.00');
INSERT INTO `tbl_detalle_factura` VALUES('358','197','4','10','110.00','220.00');
INSERT INTO `tbl_detalle_factura` VALUES('359','198','3','11','105.87','232.91');
INSERT INTO `tbl_detalle_factura` VALUES('360','198','5','11','21.67','47.67');
INSERT INTO `tbl_detalle_factura` VALUES('361','199','5','7','21.67','30.34');
INSERT INTO `tbl_detalle_factura` VALUES('362','199','9','5','120.00','120.00');
INSERT INTO `tbl_detalle_factura` VALUES('363','199','4','41','110.00','902.00');
INSERT INTO `tbl_detalle_factura` VALUES('364','200','3','4','105.87','63.52');
INSERT INTO `tbl_detalle_factura` VALUES('365','201','2','4','75.00','45.00');
INSERT INTO `tbl_detalle_factura` VALUES('366','201','5','7','21.67','22.75');
INSERT INTO `tbl_detalle_factura` VALUES('367','202','4','6','110.00','99.00');
INSERT INTO `tbl_detalle_factura` VALUES('368','203','3','8','105.87','127.04');
INSERT INTO `tbl_detalle_factura` VALUES('369','204','3','78','105.87','1238.68');
INSERT INTO `tbl_detalle_factura` VALUES('370','204','4','17','110.00','280.50');
INSERT INTO `tbl_detalle_factura` VALUES('371','205','5','7','21.67','22.75');
INSERT INTO `tbl_detalle_factura` VALUES('372','206','5','7','21.67','22.75');
INSERT INTO `tbl_detalle_factura` VALUES('373','207','5','5','21.67','16.25');
INSERT INTO `tbl_detalle_factura` VALUES('374','208','2','7','75.00','78.75');
INSERT INTO `tbl_detalle_factura` VALUES('375','209','4','5','110.00','82.50');
INSERT INTO `tbl_detalle_factura` VALUES('376','210','4','3','110.00','49.50');
INSERT INTO `tbl_detalle_factura` VALUES('377','211','4','1','110.00','16.50');
INSERT INTO `tbl_detalle_factura` VALUES('378','212','5','5','21.67','16.25');
INSERT INTO `tbl_detalle_factura` VALUES('379','213','3','6','105.87','95.28');
INSERT INTO `tbl_detalle_factura` VALUES('380','214','4','3','110.00','49.50');
INSERT INTO `tbl_detalle_factura` VALUES('381','215','4','7','110.00','115.50');
INSERT INTO `tbl_detalle_factura` VALUES('382','216','5','9','21.67','29.25');
INSERT INTO `tbl_detalle_factura` VALUES('383','217','9','5','120.00','90.00');
INSERT INTO `tbl_detalle_factura` VALUES('384','218','1','12','120.00','216.00');
INSERT INTO `tbl_detalle_factura` VALUES('385','219','1','11','120.00','198.00');
INSERT INTO `tbl_detalle_factura` VALUES('386','220','9','8','120.00','144.00');
INSERT INTO `tbl_detalle_factura` VALUES('387','221','4','3','110.00','49.50');
INSERT INTO `tbl_detalle_factura` VALUES('388','222','5','5','21.67','16.25');
INSERT INTO `tbl_detalle_factura` VALUES('389','223','4','5','110.00','82.50');
INSERT INTO `tbl_detalle_factura` VALUES('390','224','1','7','120.00','126.00');
INSERT INTO `tbl_detalle_factura` VALUES('391','225','5','8','21.67','26.00');
INSERT INTO `tbl_detalle_factura` VALUES('392','226','2','1','75.00','11.25');
INSERT INTO `tbl_detalle_factura` VALUES('393','227','1','4','120.00','72.00');
INSERT INTO `tbl_detalle_factura` VALUES('394','228','1','17','120.00','306.00');
INSERT INTO `tbl_detalle_factura` VALUES('395','229','2','7','75.00','78.75');

--
-- Estructura de la tabla `tbl_detalle_ingreso_producto`
--
DROP TABLE IF EXISTS tbl_detalle_ingreso_producto;
CREATE TABLE `tbl_detalle_ingreso_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codproducto` int(11) NOT NULL,
  `id_ingreso` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ingreso` (`id_ingreso`),
  KEY `id_producto` (`codproducto`),
  KEY `codproducto` (`codproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_detalle_ingreso_producto`
--
INSERT INTO `tbl_detalle_ingreso_producto` VALUES('1','2','2','6','50.00');
INSERT INTO `tbl_detalle_ingreso_producto` VALUES('2','3','2','2','57.00');
INSERT INTO `tbl_detalle_ingreso_producto` VALUES('3','4','2','5','30.00');
INSERT INTO `tbl_detalle_ingreso_producto` VALUES('4','8','3','100','80.00');
INSERT INTO `tbl_detalle_ingreso_producto` VALUES('5','1','4','820','12.00');
INSERT INTO `tbl_detalle_ingreso_producto` VALUES('6','2','4','670','12.00');
INSERT INTO `tbl_detalle_ingreso_producto` VALUES('7','3','4','679','190.00');
INSERT INTO `tbl_detalle_ingreso_producto` VALUES('8','5','4','890','31.00');
INSERT INTO `tbl_detalle_ingreso_producto` VALUES('9','9','4','1245','129.00');
INSERT INTO `tbl_detalle_ingreso_producto` VALUES('10','4','4','754','123.00');

--
-- Estructura de la tabla `tbl_empleados`
--
DROP TABLE IF EXISTS tbl_empleados;
CREATE TABLE `tbl_empleados` (
  `ID_EMPLEADO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_EMPLEADO` varchar(30) NOT NULL,
  `APELLIDO_EMPLEADO` varchar(30) NOT NULL,
  `ID_CARGO` int(11) NOT NULL,
  PRIMARY KEY (`ID_EMPLEADO`),
  KEY `FKIDCARGO` (`ID_CARGO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_empleados`
--
INSERT INTO `tbl_empleados` VALUES('1','ADMINISTRADOR','ADMINISTRADOR','1');

--
-- Estructura de la tabla `tbl_estado`
--
DROP TABLE IF EXISTS tbl_estado;
CREATE TABLE `tbl_estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_estado`
--
INSERT INTO `tbl_estado` VALUES('1','ACTIVO','ESTE USUARIO ESTARA ACTIVO');
INSERT INTO `tbl_estado` VALUES('2','INACTIVO','ESTE USUARIO ESTARA INACTIVO');
INSERT INTO `tbl_estado` VALUES('3','BLOQUEADO','ESTE USUARIO ESTA BLOQUEADO');
INSERT INTO `tbl_estado` VALUES('4','MANTENIMIENTO','ESTARA EN MANTENIMIENTO');
INSERT INTO `tbl_estado` VALUES('5','NUEVO','SERA UN USUARIO NUEVO');

--
-- Estructura de la tabla `tbl_estado_factura`
--
DROP TABLE IF EXISTS tbl_estado_factura;
CREATE TABLE `tbl_estado_factura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  `id_factura` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_factura` (`id_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_estado_factura`
--

--
-- Estructura de la tabla `tbl_factura`
--
DROP TABLE IF EXISTS tbl_factura;
CREATE TABLE `tbl_factura` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha_fac` datetime NOT NULL,
  `Sub_Total` double(9,2) NOT NULL,
  `ISV` double(9,2) NOT NULL,
  `Total` double(9,2) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_Tpago` int(11) DEFAULT NULL,
  `Num_CAI` varchar(100) DEFAULT NULL,
  `Num_Factura` varchar(100) NOT NULL,
  `estado` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `idcliente` (`idcliente`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_Tpago` (`id_Tpago`),
  CONSTRAINT `tbl_factura_ibfk_1` FOREIGN KEY (`id_Tpago`) REFERENCES `tbl_tipo_pago` (`id_Tpago`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_factura_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_factura_ibfk_4` FOREIGN KEY (`idcliente`) REFERENCES `tbl_cliente` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=230 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_factura`
--
INSERT INTO `tbl_factura` VALUES('220','2022-12-01 13:57:46','960.00','144.00','1104.00','17','1','1','38701A-E0FB79-B14F87-6AF16B-DEE6D5-0B','10100000077','');

--
-- Estructura de la tabla `tbl_hist_contrasenha`
--
DROP TABLE IF EXISTS tbl_hist_contrasenha;
CREATE TABLE `tbl_hist_contrasenha` (
  `id_hist` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `contraseña` varchar(15) NOT NULL,
  PRIMARY KEY (`id_hist`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_hist_contrasenha`
--

--
-- Estructura de la tabla `tbl_ingreso_producto`
--
DROP TABLE IF EXISTS tbl_ingreso_producto;
CREATE TABLE `tbl_ingreso_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_lote` int(11) NOT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `isv` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_lote` (`id_lote`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_ingreso_producto`
--
INSERT INTO `tbl_ingreso_producto` VALUES('1','1','1','600.00','0.20','720.00','2022-11-23 16:11:56','');

--
-- Estructura de la tabla `tbl_inventario`
--
DROP TABLE IF EXISTS tbl_inventario;
CREATE TABLE `tbl_inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cod_producto` (`cod_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_inventario`
--
INSERT INTO `tbl_inventario` VALUES('1','1','-239');

--
-- Estructura de la tabla `tbl_kardex`
--
DROP TABLE IF EXISTS tbl_kardex;
CREATE TABLE `tbl_kardex` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_movimiento` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_movimiento` (`id_movimiento`),
  KEY `id_producto` (`id_producto`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_kardex`
--

--
-- Estructura de la tabla `tbl_lote`
--
DROP TABLE IF EXISTS tbl_lote;
CREATE TABLE `tbl_lote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `id_tipo_producto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo_producto` (`id_tipo_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_lote`
--
INSERT INTO `tbl_lote` VALUES('1','VINO ROSA','8','1');

--
-- Estructura de la tabla `tbl_modulos`
--
DROP TABLE IF EXISTS tbl_modulos;
CREATE TABLE `tbl_modulos` (
  `id_objeto` int(11) NOT NULL AUTO_INCREMENT,
  `Objeto` varchar(100) NOT NULL,
  `descripcion_objeto` varchar(30) NOT NULL,
  `id_padre` int(11) NOT NULL,
  `URL` varchar(100) NOT NULL,
  PRIMARY KEY (`id_objeto`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_modulos`
--
INSERT INTO `tbl_modulos` VALUES('1','<i class="fa fa-cart-plus"></i>Gestion Venta','modulo seguridad','0','');
INSERT INTO `tbl_modulos` VALUES('2','Factura','seguridad','1','../src/factura.php');
INSERT INTO `tbl_modulos` VALUES('6','<i class="fa fa-shopping-cart"></i>Gestion Producto','modulo producto','0','');
INSERT INTO `tbl_modulos` VALUES('7','Productos','producto','6','../src/producto.php');
INSERT INTO `tbl_modulos` VALUES('8','<i class="fa fa-book"></i>Gestion Inventario','modulo inventario','0','');
INSERT INTO `tbl_modulos` VALUES('9','Inventario','inventario','8','../src/inventario.php');
INSERT INTO `tbl_modulos` VALUES('10','Ingreso de Productos','inventario','8','../src/Inventario_materia.php');
INSERT INTO `tbl_modulos` VALUES('11','<i class="fa fa-user-plus "></i> Gestion Clientes','modulo clientes','0','');
INSERT INTO `tbl_modulos` VALUES('12','Clientes','clientes','11','../src/vista_cliente.php');
INSERT INTO `tbl_modulos` VALUES('13','<div class="sb-sidenav-menu-heading">Configuración</div>','Configuración','0','');
INSERT INTO `tbl_modulos` VALUES('14','<i class="fa fa-lock"></i>Seguridad','modulo seguridad','0','');
INSERT INTO `tbl_modulos` VALUES('15','Bitacora','seguridad','14','../Login/bitacora.php');
INSERT INTO `tbl_modulos` VALUES('16','Usuarios','seguridad','14','../Login/vista_usuarios.php');
INSERT INTO `tbl_modulos` VALUES('17','Roles','seguridad','14','../src/Mantenimiento_Roles.php');
INSERT INTO `tbl_modulos` VALUES('19','Parametros','seguridad','14','../src/parametro.php');
INSERT INTO `tbl_modulos` VALUES('20','Permisos','seguridad','14','../src/permisos.php');
INSERT INTO `tbl_modulos` VALUES('21','<i class="fa fa-wrench"></i>Mantenimiento','modulo mantenimiento','0','');
INSERT INTO `tbl_modulos` VALUES('22','CAI','mantenimiento','21','../src/CAI.php');
INSERT INTO `tbl_modulos` VALUES('23','Tipos Producto','mantenimiento','21','../src/tipo_producto.php');
INSERT INTO `tbl_modulos` VALUES('24','Categoría','mantenimiento','21','../src/categoria.php');
INSERT INTO `tbl_modulos` VALUES('25','Tipo categoría','mantenimiento','21','../src/tipo_categoria.php');
INSERT INTO `tbl_modulos` VALUES('26','Objetos','mantenimiento','21','../src/objetos.php');
INSERT INTO `tbl_modulos` VALUES('27','Preguntas','mantenimiento','21','../src/preguntas.php');
INSERT INTO `tbl_modulos` VALUES('28','Preguntas Usuarios','mantenimiento','21','../src/preguntas_usuarios.php');
INSERT INTO `tbl_modulos` VALUES('29','<div class="sb-sidenav-menu-heading">Respaldo</div>','Respaldo','0','');
INSERT INTO `tbl_modulos` VALUES('32','<i class="fa fa-folder-open"></i>Backup','modulo backup','0','');
INSERT INTO `tbl_modulos` VALUES('33','Backup','backup','32','../src/Backup.php');

--
-- Estructura de la tabla `tbl_movimiento`
--
DROP TABLE IF EXISTS tbl_movimiento;
CREATE TABLE `tbl_movimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_movimiento` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_movimiento`
--
INSERT INTO `tbl_movimiento` VALUES('1','ENTRADA');
INSERT INTO `tbl_movimiento` VALUES('2','SALIDA');

--
-- Estructura de la tabla `tbl_parametros`
--
DROP TABLE IF EXISTS tbl_parametros;
CREATE TABLE `tbl_parametros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parametro` varchar(50) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `Modificado_por` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_parametros`
--
INSERT INTO `tbl_parametros` VALUES('1','nombre','Inversiones Garcia','1','2022-10-02 10:44:43','2022-10-02 10:44:43','1');
INSERT INTO `tbl_parametros` VALUES('2','correo','garciainversiones.ig2022@gmail.com','1','2022-10-02 10:47:33','2022-10-02 10:47:33','1');
INSERT INTO `tbl_parametros` VALUES('5','intentos_fallidos','2','1','2022-10-02 10:47:33','2022-10-02 10:47:33','1');
INSERT INTO `tbl_parametros` VALUES('6','max_contrasena','25','1','2022-10-02 10:49:38','2022-10-02 10:49:38','1');
INSERT INTO `tbl_parametros` VALUES('7','num_preguntas','2','1','2022-10-02 10:49:38','2022-10-02 10:49:38','1');
INSERT INTO `tbl_parametros` VALUES('8','horas_vigencia_correo','24','1','2022-10-12 17:37:43','2022-10-12 17:37:43','1');
INSERT INTO `tbl_parametros` VALUES('9','fecha_de_vencimiento','6','1','2022-10-17 13:32:07','2022-10-17 13:32:07','1');
INSERT INTO `tbl_parametros` VALUES('10','Impuesto sobre venta','0.15','1','0000-00-00 00:00:00','2022-11-29 06:00:00','1');

--
-- Estructura de la tabla `tbl_permisos`
--
DROP TABLE IF EXISTS tbl_permisos;
CREATE TABLE `tbl_permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `permiso_insercion` int(11) NOT NULL,
  `permiso_eliminacion` int(11) NOT NULL,
  `permiso_modificar` int(11) NOT NULL,
  `permiso_consultar` int(11) NOT NULL,
  `id_objeto` int(11) NOT NULL,
  `pdf` int(11) NOT NULL,
  PRIMARY KEY (`id_permiso`),
  KEY `id_objeto` (`id_objeto`),
  KEY `id_rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_permisos`
--
INSERT INTO `tbl_permisos` VALUES('37','2','1','1','1','1','1','1');
INSERT INTO `tbl_permisos` VALUES('38','2','1','1','1','1','2','1');
INSERT INTO `tbl_permisos` VALUES('39','2','1','1','1','1','3','1');
INSERT INTO `tbl_permisos` VALUES('40','2','1','1','1','1','4','1');
INSERT INTO `tbl_permisos` VALUES('41','2','0','1','1','1','5','1');
INSERT INTO `tbl_permisos` VALUES('42','2','1','1','1','1','6','1');
INSERT INTO `tbl_permisos` VALUES('43','2','1','1','1','1','7','1');
INSERT INTO `tbl_permisos` VALUES('44','2','1','1','1','1','8','1');
INSERT INTO `tbl_permisos` VALUES('45','2','1','1','1','1','9','1');
INSERT INTO `tbl_permisos` VALUES('46','2','1','1','1','1','10','1');
INSERT INTO `tbl_permisos` VALUES('47','2','1','1','1','1','11','1');
INSERT INTO `tbl_permisos` VALUES('48','2','1','1','1','1','12','1');
INSERT INTO `tbl_permisos` VALUES('49','2','1','1','1','1','13','1');
INSERT INTO `tbl_permisos` VALUES('50','2','1','1','1','1','14','1');
INSERT INTO `tbl_permisos` VALUES('51','2','1','1','1','1','15','1');
INSERT INTO `tbl_permisos` VALUES('52','2','1','1','1','1','16','1');
INSERT INTO `tbl_permisos` VALUES('53','2','1','1','1','1','17','1');
INSERT INTO `tbl_permisos` VALUES('54','2','1','1','1','1','18','1');
INSERT INTO `tbl_permisos` VALUES('55','2','1','1','1','1','19','1');
INSERT INTO `tbl_permisos` VALUES('56','2','1','1','1','1','20','1');
INSERT INTO `tbl_permisos` VALUES('57','2','1','1','1','1','21','1');
INSERT INTO `tbl_permisos` VALUES('58','2','1','1','1','1','22','1');
INSERT INTO `tbl_permisos` VALUES('59','2','1','1','1','1','23','1');
INSERT INTO `tbl_permisos` VALUES('60','2','1','1','1','1','24','1');
INSERT INTO `tbl_permisos` VALUES('61','2','1','1','1','1','25','1');
INSERT INTO `tbl_permisos` VALUES('63','2','1','1','1','1','27','1');
INSERT INTO `tbl_permisos` VALUES('64','2','1','1','1','1','28','1');
INSERT INTO `tbl_permisos` VALUES('66','2','1','1','1','1','30','1');
INSERT INTO `tbl_permisos` VALUES('67','2','1','1','1','1','31','1');
INSERT INTO `tbl_permisos` VALUES('69','2','1','1','1','1','33','1');
INSERT INTO `tbl_permisos` VALUES('70','2','1','1','1','1','34','1');
INSERT INTO `tbl_permisos` VALUES('71','2','1','1','1','1','35','1');
INSERT INTO `tbl_permisos` VALUES('72','2','1','1','1','1','36','1');
INSERT INTO `tbl_permisos` VALUES('73','2','1','1','1','1','37','1');
INSERT INTO `tbl_permisos` VALUES('74','2','1','1','1','1','38','1');
INSERT INTO `tbl_permisos` VALUES('75','2','1','1','1','1','39','1');
INSERT INTO `tbl_permisos` VALUES('76','2','1','1','1','1','40','1');
INSERT INTO `tbl_permisos` VALUES('84','9','1','1','1','1','1','1');
INSERT INTO `tbl_permisos` VALUES('85','9','1','1','1','1','2','1');
INSERT INTO `tbl_permisos` VALUES('86','2','1','1','1','1','29','1');
INSERT INTO `tbl_permisos` VALUES('87','2','1','1','1','1','32','1');
INSERT INTO `tbl_permisos` VALUES('88','10','1','1','1','1','9','1');
INSERT INTO `tbl_permisos` VALUES('89','10','1','1','1','1','8','1');

--
-- Estructura de la tabla `tbl_preguntas`
--
DROP TABLE IF EXISTS tbl_preguntas;
CREATE TABLE `tbl_preguntas` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(80) NOT NULL,
  PRIMARY KEY (`id_pregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_preguntas`
--
INSERT INTO `tbl_preguntas` VALUES('1','¿Cuál es nombre de tu primer mascota?');
INSERT INTO `tbl_preguntas` VALUES('2','¿Cómo se llama la primera escuela a la que asististe?');
INSERT INTO `tbl_preguntas` VALUES('3','¿Cuál era tu apodo de infancia?');

--
-- Estructura de la tabla `tbl_preguntas_usuario`
--
DROP TABLE IF EXISTS tbl_preguntas_usuario;
CREATE TABLE `tbl_preguntas_usuario` (
  `id_pregunta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `respuesta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_preguntas_usuario`
--
INSERT INTO `tbl_preguntas_usuario` VALUES('1','1','chichi');
INSERT INTO `tbl_preguntas_usuario` VALUES('3','1','gangster');
INSERT INTO `tbl_preguntas_usuario` VALUES('1','1','chichi');
INSERT INTO `tbl_preguntas_usuario` VALUES('3','1','gangster');

--
-- Estructura de la tabla `tbl_producto`
--
DROP TABLE IF EXISTS tbl_producto;
CREATE TABLE `tbl_producto` (
  `codproducto` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `id_tipo_producto` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `existencia` int(11) NOT NULL,
  `cantidad_minima` int(11) NOT NULL,
  `cantidad_maxima` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`codproducto`),
  KEY `id_categoria` (`id_categoria`,`id_tipo_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_producto`
--
INSERT INTO `tbl_producto` VALUES('2','1','1','VINO BLANCO','75.00','5','70','700','1');

--
-- Estructura de la tabla `tbl_promocion_factura`
--
DROP TABLE IF EXISTS tbl_promocion_factura;
CREATE TABLE `tbl_promocion_factura` (
  `id_promFac` int(11) NOT NULL AUTO_INCREMENT,
  `id_Factura` int(11) NOT NULL,
  `id_promocion` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`id_promFac`),
  KEY `id_Factura` (`id_Factura`,`id_promocion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_promocion_factura`
--

--
-- Estructura de la tabla `tbl_promociones`
--
DROP TABLE IF EXISTS tbl_promociones;
CREATE TABLE `tbl_promociones` (
  `id_promociones` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `Fecha Inicio` datetime NOT NULL,
  `Fecha Final` datetime NOT NULL,
  PRIMARY KEY (`id_promociones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_promociones`
--

--
-- Estructura de la tabla `tbl_roles`
--
DROP TABLE IF EXISTS tbl_roles;
CREATE TABLE `tbl_roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` text NOT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_roles`
--
INSERT INTO `tbl_roles` VALUES('1','super usuario','Es el usuario mayor');
INSERT INTO `tbl_roles` VALUES('2','administrador','Es el usuario administrador del sistema');
INSERT INTO `tbl_roles` VALUES('4','Sin asignar','Usuario sin un rol');
INSERT INTO `tbl_roles` VALUES('9','Ventas','Usuario de ventas');

--
-- Estructura de la tabla `tbl_roles_objetos`
--
DROP TABLE IF EXISTS tbl_roles_objetos;
CREATE TABLE `tbl_roles_objetos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `id_objeto` int(11) NOT NULL,
  `permiso_insercion` varchar(20) NOT NULL,
  `permiso_eliminacion` varchar(20) NOT NULL,
  `permiso_actualizacion` varchar(20) NOT NULL,
  `fecha_cracion` timestamp NOT NULL DEFAULT current_timestamp(),
  `creado_por` varchar(25) NOT NULL,
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modificado_por` varchar(25) NOT NULL,
  `permiso_consultar` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_roles_objetos`
--

--
-- Estructura de la tabla `tbl_tipo_pago`
--
DROP TABLE IF EXISTS tbl_tipo_pago;
CREATE TABLE `tbl_tipo_pago` (
  `id_Tpago` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_Tpago`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_tipo_pago`
--
INSERT INTO `tbl_tipo_pago` VALUES('1','EFECTIVO');
INSERT INTO `tbl_tipo_pago` VALUES('2','TARJETA DE CREDITO');
INSERT INTO `tbl_tipo_pago` VALUES('3','TRANSFERENCIA BANCARIA');

--
-- Estructura de la tabla `tbl_tokens`
--
DROP TABLE IF EXISTS tbl_tokens;
CREATE TABLE `tbl_tokens` (
  `ID_TOKEN` int(11) NOT NULL AUTO_INCREMENT,
  `TOKEN` varchar(45) NOT NULL,
  `FECHA_INICIO` datetime DEFAULT NULL,
  `FECHA_FINALIZACION` datetime DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_TOKEN`),
  KEY `ID_USUARIO_TOKEN_idx` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_tokens`
--
INSERT INTO `tbl_tokens` VALUES('24','d822d4646518777bed1ecbc12e14c3f0','2022-10-13 21:18:12','2022-10-14 21:18:12','28');

--
-- Estructura de la tabla `tbl_usuario`
--
DROP TABLE IF EXISTS tbl_usuario;
CREATE TABLE `tbl_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fecha_ultima_conexion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `preguntas_contestadas` int(11) NOT NULL,
  `primer_ingreso` int(11) NOT NULL,
  `fecha_vencimiento` date NOT NULL DEFAULT '0000-00-00',
  `id_estado` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`),
  KEY `estado` (`id_estado`),
  KEY `id_empleado` (`id_empleado`),
  CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `tbl_estado` (`id_estado`),
  CONSTRAINT `tbl_usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `tbl_roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_usuario`
--
INSERT INTO `tbl_usuario` VALUES('1','ADMIN','garciainversiones.ig2022@gmail.com','ADMIN','admin321@','2','2022-12-08 00:00:00','2','1','2022-10-13','1','1');

--
-- Estructura de la tabla `tipo_categoria`
--
DROP TABLE IF EXISTS tipo_categoria;
CREATE TABLE `tipo_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tipo_categoria`
--
INSERT INTO `tipo_categoria` VALUES('1','Vino');
INSERT INTO `tipo_categoria` VALUES('2','Frutos secos');
INSERT INTO `tipo_categoria` VALUES('3','OTROS');

--
-- Estructura de la tabla `tipo_producto`
--
DROP TABLE IF EXISTS tipo_producto;
CREATE TABLE `tipo_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tipo_producto`
--
INSERT INTO `tipo_producto` VALUES('1','VINO');
INSERT INTO `tipo_producto` VALUES('2','FRUTOS SECOS');
INSERT INTO `tipo_producto` VALUES('3','OTROS');

-- --------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 1;

-- --------------------------------------------------------
