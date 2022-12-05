-- Respaldo de la base de datos Inversiones Garcia
-- Fecha: 2022-12-05 20:30:17
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
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int NOT NULL,
  `id_objeto` int NOT NULL,
  `accion` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_objeto` (`id_objeto`),
  KEY `id_usuario_2` (`id_usuario`),
  CONSTRAINT `tbl_bitacora_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_bitacora`
--
INSERT INTO `tbl_bitacora` VALUES('1','2022-12-05 20:00:12','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('2','2022-12-05 20:01:17','1','28','EDITAR','SE EDITO UN NUEVO REGISTRO EN TIPO PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('3','2022-12-05 20:01:29','1','28','EDITAR','SE EDITO UN NUEVO REGISTRO EN TIPO PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('4','2022-12-05 20:02:59','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('5','2022-12-05 20:03:19','1','2','INGRESO','EL USUARIO INGRESA A TABLA PERMISOS');
INSERT INTO `tbl_bitacora` VALUES('6','2022-12-05 20:03:46','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('7','2022-12-05 20:15:47','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('8','2022-12-05 20:16:26','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('9','2022-12-05 20:17:48','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('10','2022-12-05 20:17:55','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('11','2022-12-05 20:18:51','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('12','2022-12-05 20:25:13','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');

--
-- Estructura de la tabla `tbl_cai`
--
DROP TABLE IF EXISTS tbl_cai;
CREATE TABLE `tbl_cai` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rango_inicial` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rango_final` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rango_actual` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `numero_CAI` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_cai`
--
INSERT INTO `tbl_cai` VALUES('1','000-001-01-00000001','000-001-01-00000050','000-001-01-00000025','38701E-E0FB79-B14F87-6AF16B-DEE6D5-0A','2022-11-23','1');
INSERT INTO `tbl_cai` VALUES('2','0000010100000051','0000010100000099','10100000081','38701A-E0FB79-B14F87-6AF16B-DEE6D5-0B','2023-02-02','1');

--
-- Estructura de la tabla `tbl_cargos`
--
DROP TABLE IF EXISTS tbl_cargos;
CREATE TABLE `tbl_cargos` (
  `ID_CARGO` int NOT NULL AUTO_INCREMENT,
  `DESCRIPCION_CARGO` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_CARGO`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id` int NOT NULL AUTO_INCREMENT,
  `id_tipo_categ` int NOT NULL,
  `descripcion` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo_categ` (`id_tipo_categ`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_categoria`
--
INSERT INTO `tbl_categoria` VALUES('1','1','prueba');
INSERT INTO `tbl_categoria` VALUES('3','0','ACHOTE');
INSERT INTO `tbl_categoria` VALUES('10','2','MELASA');
INSERT INTO `tbl_categoria` VALUES('12','1','VINO DUERTO');
INSERT INTO `tbl_categoria` VALUES('14','2','NUECES');
INSERT INTO `tbl_categoria` VALUES('15','1','VINO CALIDO');

--
-- Estructura de la tabla `tbl_cliente`
--
DROP TABLE IF EXISTS tbl_cliente;
CREATE TABLE `tbl_cliente` (
  `idcliente` int NOT NULL AUTO_INCREMENT,
  `DNI` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `RTN` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuario_id` int NOT NULL,
  PRIMARY KEY (`idcliente`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id_Descuento` int NOT NULL AUTO_INCREMENT,
  `nombre_descuento` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion_descuento` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `procentaje_descuento` double(9,2) NOT NULL,
  PRIMARY KEY (`id_Descuento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_descuento`
--

--
-- Estructura de la tabla `tbl_descuento_factura`
--
DROP TABLE IF EXISTS tbl_descuento_factura;
CREATE TABLE `tbl_descuento_factura` (
  `id_descuento_Factura+` int NOT NULL,
  `id_factura` int NOT NULL,
  `id_descuento` int NOT NULL,
  `Total_Descontado` double(9,2) NOT NULL,
  `porcentaje_Descontar` double(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_descuento_factura`
--

--
-- Estructura de la tabla `tbl_detalle_factura`
--
DROP TABLE IF EXISTS tbl_detalle_factura;
CREATE TABLE `tbl_detalle_factura` (
  `id_detalleFac` int NOT NULL AUTO_INCREMENT,
  `id_factura` int NOT NULL,
  `codproducto` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `isv` double(9,2) DEFAULT NULL,
  PRIMARY KEY (`id_detalleFac`),
  KEY `id_producto` (`codproducto`,`id_factura`)
) ENGINE=InnoDB AUTO_INCREMENT=396 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id` int NOT NULL AUTO_INCREMENT,
  `codproducto` int NOT NULL,
  `id_ingreso` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ingreso` (`id_ingreso`),
  KEY `id_producto` (`codproducto`),
  KEY `codproducto` (`codproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `ID_EMPLEADO` int NOT NULL AUTO_INCREMENT,
  `NOMBRE_EMPLEADO` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `APELLIDO_EMPLEADO` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ID_CARGO` int NOT NULL,
  PRIMARY KEY (`ID_EMPLEADO`),
  KEY `FKIDCARGO` (`ID_CARGO`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_empleados`
--
INSERT INTO `tbl_empleados` VALUES('1','ADMINISTRADOR','ADMINISTRADOR','1');
INSERT INTO `tbl_empleados` VALUES('12','SAY','SAY','8');
INSERT INTO `tbl_empleados` VALUES('23','jorge are','jorge are','8');
INSERT INTO `tbl_empleados` VALUES('24','axel bar','axel bar','8');
INSERT INTO `tbl_empleados` VALUES('30','Jorge Medina','Jorge Medina','8');
INSERT INTO `tbl_empleados` VALUES('51','Ana Cruz','Ana Cruz','1');
INSERT INTO `tbl_empleados` VALUES('53','AXEL BAR','AXEL BAR','1');
INSERT INTO `tbl_empleados` VALUES('54','informatica','informatica','8');
INSERT INTO `tbl_empleados` VALUES('55','informatica','informatica','8');
INSERT INTO `tbl_empleados` VALUES('56','Auner DXasdn','Auner DXasdn','8');
INSERT INTO `tbl_empleados` VALUES('57','ANNER','ANNER','8');

--
-- Estructura de la tabla `tbl_estado`
--
DROP TABLE IF EXISTS tbl_estado;
CREATE TABLE `tbl_estado` (
  `id_estado` int NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_factura` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_factura` (`id_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_estado_factura`
--

--
-- Estructura de la tabla `tbl_factura`
--
DROP TABLE IF EXISTS tbl_factura;
CREATE TABLE `tbl_factura` (
  `id_factura` int NOT NULL AUTO_INCREMENT,
  `Fecha_fac` datetime NOT NULL,
  `Sub_Total` double(9,2) NOT NULL,
  `ISV` double(9,2) NOT NULL,
  `Total` double(9,2) NOT NULL,
  `idcliente` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_Tpago` int DEFAULT NULL,
  `Num_CAI` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Num_Factura` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `idcliente` (`idcliente`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_Tpago` (`id_Tpago`),
  CONSTRAINT `tbl_factura_ibfk_1` FOREIGN KEY (`id_Tpago`) REFERENCES `tbl_tipo_pago` (`id_Tpago`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_factura_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_factura_ibfk_4` FOREIGN KEY (`idcliente`) REFERENCES `tbl_cliente` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=230 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_factura`
--
INSERT INTO `tbl_factura` VALUES('220','2022-12-01 13:57:46','960.00','144.00','1104.00','17','1','1','38701A-E0FB79-B14F87-6AF16B-DEE6D5-0B','10100000077','');
INSERT INTO `tbl_factura` VALUES('221','2022-12-01 13:58:15','330.00','49.50','379.50','16','1','1','38701A-E0FB79-B14F87-6AF16B-DEE6D5-0B','10100000078','');
INSERT INTO `tbl_factura` VALUES('222','2022-12-01 13:59:58','108.35','16.25','124.25','19','1','2','38701A-E0FB79-B14F87-6AF16B-DEE6D5-0B','10100000079','');
INSERT INTO `tbl_factura` VALUES('224','2022-12-01 15:32:43','840.00','126.00','966.00','23','1','1','38701A-E0FB79-B14F87-6AF16B-DEE6D5-0B','10100000080','');
INSERT INTO `tbl_factura` VALUES('229','2022-12-04 12:13:45','525.00','78.75','603.75','17','1','1','38701A-E0FB79-B14F87-6AF16B-DEE6D5-0B','10100000081','');

--
-- Estructura de la tabla `tbl_hist_contrasenha`
--
DROP TABLE IF EXISTS tbl_hist_contrasenha;
CREATE TABLE `tbl_hist_contrasenha` (
  `id_hist` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `contraseña` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_hist`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_hist_contrasenha`
--

--
-- Estructura de la tabla `tbl_ingreso_producto`
--
DROP TABLE IF EXISTS tbl_ingreso_producto;
CREATE TABLE `tbl_ingreso_producto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_lote` int NOT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `isv` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_lote` (`id_lote`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_ingreso_producto`
--
INSERT INTO `tbl_ingreso_producto` VALUES('1','1','1','600.00','0.20','720.00','2022-11-23 17:11:56','');
INSERT INTO `tbl_ingreso_producto` VALUES('2','1','1','564.00','0.15','676.80','2022-11-24 23:02:19','');
INSERT INTO `tbl_ingreso_producto` VALUES('3','1','1','8000.00','0.15','9600.00','2022-11-24 23:05:07','');
INSERT INTO `tbl_ingreso_producto` VALUES('4','1','1','427827.00','0.15','513392.40','2022-11-26 18:43:20','');
INSERT INTO `tbl_ingreso_producto` VALUES('5','1','0','0.00','0.15','0.00','2022-11-29 05:12:00','');

--
-- Estructura de la tabla `tbl_inventario`
--
DROP TABLE IF EXISTS tbl_inventario;
CREATE TABLE `tbl_inventario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cod_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cod_producto` (`cod_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_inventario`
--
INSERT INTO `tbl_inventario` VALUES('1','1','581');
INSERT INTO `tbl_inventario` VALUES('2','2','5');
INSERT INTO `tbl_inventario` VALUES('3','3','0');
INSERT INTO `tbl_inventario` VALUES('4','4','367');
INSERT INTO `tbl_inventario` VALUES('5','5','352');
INSERT INTO `tbl_inventario` VALUES('6','6','77');
INSERT INTO `tbl_inventario` VALUES('7','7','0');
INSERT INTO `tbl_inventario` VALUES('8','8','100');
INSERT INTO `tbl_inventario` VALUES('9','9','576');

--
-- Estructura de la tabla `tbl_kardex`
--
DROP TABLE IF EXISTS tbl_kardex;
CREATE TABLE `tbl_kardex` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_movimiento` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `id_usuario` int NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_movimiento` (`id_movimiento`),
  KEY `id_producto` (`id_producto`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=468 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_kardex`
--
INSERT INTO `tbl_kardex` VALUES('1','1','1','3','1','2022-11-19 23:12:08');
INSERT INTO `tbl_kardex` VALUES('2','1','2','2','1','2022-11-19 23:11:48');
INSERT INTO `tbl_kardex` VALUES('3','1','2','1','1','2022-11-20 18:41:45');
INSERT INTO `tbl_kardex` VALUES('4','1','3','2','1','2022-11-20 18:42:56');
INSERT INTO `tbl_kardex` VALUES('5','1','4','1','1','2022-11-20 18:44:38');
INSERT INTO `tbl_kardex` VALUES('6','1','2','19','1','2022-11-20 18:59:27');
INSERT INTO `tbl_kardex` VALUES('7','1','4','21','1','2022-11-20 19:00:41');
INSERT INTO `tbl_kardex` VALUES('8','1','4','3','1','2022-11-20 19:04:25');
INSERT INTO `tbl_kardex` VALUES('9','1','2','3','1','2022-11-20 19:20:46');
INSERT INTO `tbl_kardex` VALUES('10','1','4','7','1','2022-11-20 19:21:48');
INSERT INTO `tbl_kardex` VALUES('11','1','2','3','1','2022-11-20 19:45:48');
INSERT INTO `tbl_kardex` VALUES('12','1','5','7','1','2022-11-20 21:46:24');
INSERT INTO `tbl_kardex` VALUES('13','1','3','7','1','2022-11-20 21:50:21');
INSERT INTO `tbl_kardex` VALUES('14','1','2','4','1','2022-11-20 21:55:34');
INSERT INTO `tbl_kardex` VALUES('15','1','1','1','1','2022-11-20 21:57:36');
INSERT INTO `tbl_kardex` VALUES('16','1','3','4','1','2022-11-20 21:58:01');
INSERT INTO `tbl_kardex` VALUES('17','1','4','1','1','2022-11-20 21:58:24');
INSERT INTO `tbl_kardex` VALUES('18','1','4','2','1','2022-11-20 21:58:43');
INSERT INTO `tbl_kardex` VALUES('19','1','5','3','1','2022-11-20 21:59:00');
INSERT INTO `tbl_kardex` VALUES('20','1','6','1','1','2022-11-20 21:59:19');
INSERT INTO `tbl_kardex` VALUES('21','1','6','3','1','2022-11-20 22:00:31');
INSERT INTO `tbl_kardex` VALUES('22','1','2','2','1','2022-11-20 22:02:42');
INSERT INTO `tbl_kardex` VALUES('23','1','2','1','1','2022-11-20 22:05:54');
INSERT INTO `tbl_kardex` VALUES('24','1','2','1','1','2022-11-20 23:21:21');
INSERT INTO `tbl_kardex` VALUES('25','1','5','3','1','2022-11-20 23:26:43');
INSERT INTO `tbl_kardex` VALUES('26','1','4','1','1','2022-11-20 23:27:33');
INSERT INTO `tbl_kardex` VALUES('27','1','6','2','1','2022-11-20 23:46:37');
INSERT INTO `tbl_kardex` VALUES('28','1','1','15','1','2022-11-20 23:47:46');
INSERT INTO `tbl_kardex` VALUES('29','1','1','3','1','2022-11-20 23:49:00');
INSERT INTO `tbl_kardex` VALUES('30','1','3','1','1','2022-11-20 23:52:40');
INSERT INTO `tbl_kardex` VALUES('31','1','16','1','1','2022-11-20 23:57:37');
INSERT INTO `tbl_kardex` VALUES('32','1','2','1','1','2022-11-21 00:18:20');
INSERT INTO `tbl_kardex` VALUES('33','1','2','1','1','2022-11-21 00:37:13');
INSERT INTO `tbl_kardex` VALUES('34','1','2','1','1','2022-11-21 01:29:02');
INSERT INTO `tbl_kardex` VALUES('35','1','2','1','1','2022-11-21 01:31:46');
INSERT INTO `tbl_kardex` VALUES('36','1','2','1','1','2022-11-21 01:32:54');
INSERT INTO `tbl_kardex` VALUES('37','1','4','1','1','2022-11-21 01:49:07');
INSERT INTO `tbl_kardex` VALUES('38','1','2','1','1','2022-11-21 01:49:51');
INSERT INTO `tbl_kardex` VALUES('39','1','2','1','1','2022-11-21 02:02:30');
INSERT INTO `tbl_kardex` VALUES('40','1','2','1','1','2022-11-21 02:16:33');
INSERT INTO `tbl_kardex` VALUES('41','1','2','1','1','2022-11-21 02:19:12');
INSERT INTO `tbl_kardex` VALUES('42','1','2','1','1','2022-11-21 02:42:45');
INSERT INTO `tbl_kardex` VALUES('43','1','2','7','1','2022-11-21 03:37:00');
INSERT INTO `tbl_kardex` VALUES('44','1','1','7','1','2022-11-21 03:38:31');
INSERT INTO `tbl_kardex` VALUES('45','1','5','1','1','2022-11-21 03:49:16');
INSERT INTO `tbl_kardex` VALUES('46','1','2','2','1','2022-11-21 03:56:50');
INSERT INTO `tbl_kardex` VALUES('47','1','2','2','1','2022-11-21 04:08:33');
INSERT INTO `tbl_kardex` VALUES('48','1','3','2','1','2022-11-21 04:14:13');
INSERT INTO `tbl_kardex` VALUES('49','1','2','1','1','2022-11-21 21:17:06');
INSERT INTO `tbl_kardex` VALUES('50','1','6','4','1','2022-11-21 21:32:07');
INSERT INTO `tbl_kardex` VALUES('51','1','6','76','1','2022-11-21 21:35:27');
INSERT INTO `tbl_kardex` VALUES('52','1','6','76','1','2022-11-21 21:35:47');
INSERT INTO `tbl_kardex` VALUES('53','1','6','2','1','2022-11-21 21:48:35');
INSERT INTO `tbl_kardex` VALUES('54','1','3','7','1','2022-11-21 21:48:57');
INSERT INTO `tbl_kardex` VALUES('55','1','2','1','1','2022-11-21 21:49:20');
INSERT INTO `tbl_kardex` VALUES('56','1','4','3','1','2022-11-21 21:49:42');
INSERT INTO `tbl_kardex` VALUES('57','1','6','2','1','2022-11-21 21:50:42');
INSERT INTO `tbl_kardex` VALUES('58','1','3','7','1','2022-11-21 21:51:11');
INSERT INTO `tbl_kardex` VALUES('59','1','2','1','1','2022-11-21 22:44:08');
INSERT INTO `tbl_kardex` VALUES('60','1','3','2','1','2022-11-21 23:52:46');
INSERT INTO `tbl_kardex` VALUES('61','1','6','13','1','2022-11-21 23:53:51');
INSERT INTO `tbl_kardex` VALUES('62','1','6','3','1','2022-11-22 00:50:57');
INSERT INTO `tbl_kardex` VALUES('63','1','6','3','1','2022-11-22 00:51:57');
INSERT INTO `tbl_kardex` VALUES('64','1','6','3','1','2022-11-22 01:05:39');
INSERT INTO `tbl_kardex` VALUES('65','1','6','3','1','2022-11-22 01:06:32');
INSERT INTO `tbl_kardex` VALUES('66','1','4','1','1','2022-11-22 01:23:57');
INSERT INTO `tbl_kardex` VALUES('67','1','4','1','1','2022-11-22 01:25:39');
INSERT INTO `tbl_kardex` VALUES('68','1','2','6','1','2022-11-24 23:02:19');
INSERT INTO `tbl_kardex` VALUES('69','1','3','2','1','2022-11-24 23:02:20');
INSERT INTO `tbl_kardex` VALUES('70','1','4','5','1','2022-11-24 23:02:20');
INSERT INTO `tbl_kardex` VALUES('71','1','8','100','1','2022-11-24 23:05:08');
INSERT INTO `tbl_kardex` VALUES('72','2','8','10','1','2022-11-24 23:10:45');
INSERT INTO `tbl_kardex` VALUES('73','2','5','13','1','2022-11-25 14:37:09');
INSERT INTO `tbl_kardex` VALUES('74','2','1','7','1','2022-11-26 18:11:56');
INSERT INTO `tbl_kardex` VALUES('75','2','5','3','1','2022-11-26 18:14:04');
INSERT INTO `tbl_kardex` VALUES('76','2','2','3','1','2022-11-26 18:17:47');
INSERT INTO `tbl_kardex` VALUES('77','2','3','11','1','2022-11-26 18:18:41');
INSERT INTO `tbl_kardex` VALUES('78','2','2','1','1','2022-11-26 18:19:17');
INSERT INTO `tbl_kardex` VALUES('79','2','1','12','1','2022-11-26 18:19:17');
INSERT INTO `tbl_kardex` VALUES('80','2','5','7','1','2022-11-26 18:19:17');
INSERT INTO `tbl_kardex` VALUES('81','1','5','7','1','2022-11-26 18:19:48');
INSERT INTO `tbl_kardex` VALUES('82','1','3','2','1','2022-11-26 18:19:53');
INSERT INTO `tbl_kardex` VALUES('83','1','6','13','1','2022-11-26 18:19:56');
INSERT INTO `tbl_kardex` VALUES('84','1','8','10','1','2022-11-26 18:20:00');
INSERT INTO `tbl_kardex` VALUES('85','1','5','13','1','2022-11-26 18:20:03');
INSERT INTO `tbl_kardex` VALUES('86','1','1','7','1','2022-11-26 18:20:07');
INSERT INTO `tbl_kardex` VALUES('87','1','4','3','1','2022-11-26 18:21:11');
INSERT INTO `tbl_kardex` VALUES('88','1','3','11','1','2022-11-26 18:21:14');
INSERT INTO `tbl_kardex` VALUES('89','1','5','3','1','2022-11-26 18:21:16');
INSERT INTO `tbl_kardex` VALUES('90','1','2','3','1','2022-11-26 18:21:19');
INSERT INTO `tbl_kardex` VALUES('91','2','2','3','1','2022-11-26 18:22:21');
INSERT INTO `tbl_kardex` VALUES('92','2','5','12','1','2022-11-26 18:22:21');
INSERT INTO `tbl_kardex` VALUES('93','2','3','12','1','2022-11-26 18:22:21');
INSERT INTO `tbl_kardex` VALUES('94','2','1','13','1','2022-11-26 18:22:21');
INSERT INTO `tbl_kardex` VALUES('95','2','1','12','1','2022-11-26 18:24:07');
INSERT INTO `tbl_kardex` VALUES('96','2','4','3','1','2022-11-26 18:24:07');
INSERT INTO `tbl_kardex` VALUES('97','2','5','11','1','2022-11-26 18:24:07');
INSERT INTO `tbl_kardex` VALUES('98','2','1','1','1','2022-11-26 18:25:35');
INSERT INTO `tbl_kardex` VALUES('99','2','4','1','1','2022-11-26 18:26:12');
INSERT INTO `tbl_kardex` VALUES('100','2','2','2','1','2022-11-26 18:26:12');
INSERT INTO `tbl_kardex` VALUES('101','2','5','1','1','2022-11-26 18:26:12');
INSERT INTO `tbl_kardex` VALUES('102','1','2','3','1','2022-11-26 18:28:13');
INSERT INTO `tbl_kardex` VALUES('103','1','1','1','1','2022-11-26 18:28:15');
INSERT INTO `tbl_kardex` VALUES('104','2','5','1','1','2022-11-26 18:30:47');
INSERT INTO `tbl_kardex` VALUES('105','2','4','2','1','2022-11-26 18:32:57');
INSERT INTO `tbl_kardex` VALUES('106','2','1','1','1','2022-11-26 18:33:53');
INSERT INTO `tbl_kardex` VALUES('107','2','2','1','1','2022-11-26 18:34:46');
INSERT INTO `tbl_kardex` VALUES('108','2','1','3','1','2022-11-26 18:35:28');
INSERT INTO `tbl_kardex` VALUES('109','2','1','1','1','2022-11-26 18:38:44');
INSERT INTO `tbl_kardex` VALUES('110','2','2','1','1','2022-11-26 18:38:44');
INSERT INTO `tbl_kardex` VALUES('111','2','5','3','1','2022-11-26 18:38:44');
INSERT INTO `tbl_kardex` VALUES('112','2','4','2','1','2022-11-26 18:39:30');
INSERT INTO `tbl_kardex` VALUES('113','2','5','3','1','2022-11-26 18:39:30');
INSERT INTO `tbl_kardex` VALUES('114','2','2','1','1','2022-11-26 18:40:49');
INSERT INTO `tbl_kardex` VALUES('115','2','4','1','1','2022-11-26 18:40:49');
INSERT INTO `tbl_kardex` VALUES('116','2','3','1','1','2022-11-26 18:40:49');
INSERT INTO `tbl_kardex` VALUES('117','1','2','1','1','2022-11-26 18:41:15');
INSERT INTO `tbl_kardex` VALUES('118','1','2','1','1','2022-11-26 18:41:17');
INSERT INTO `tbl_kardex` VALUES('119','1','1','1','1','2022-11-26 18:41:20');
INSERT INTO `tbl_kardex` VALUES('120','1','1','3','1','2022-11-26 18:41:23');
INSERT INTO `tbl_kardex` VALUES('121','1','4','2','1','2022-11-26 18:41:25');
INSERT INTO `tbl_kardex` VALUES('122','1','1','820','1','2022-11-26 18:43:20');
INSERT INTO `tbl_kardex` VALUES('123','1','2','670','1','2022-11-26 18:43:20');
INSERT INTO `tbl_kardex` VALUES('124','1','3','679','1','2022-11-26 18:43:20');
INSERT INTO `tbl_kardex` VALUES('125','1','5','890','1','2022-11-26 18:43:20');
INSERT INTO `tbl_kardex` VALUES('126','1','9','1245','1','2022-11-26 18:43:20');
INSERT INTO `tbl_kardex` VALUES('127','1','4','754','1','2022-11-26 18:43:20');
INSERT INTO `tbl_kardex` VALUES('128','2','1','13','1','2022-11-26 18:43:55');
INSERT INTO `tbl_kardex` VALUES('129','2','3','12','1','2022-11-26 18:43:55');
INSERT INTO `tbl_kardex` VALUES('130','2','2','3','1','2022-11-26 18:43:55');
INSERT INTO `tbl_kardex` VALUES('131','2','9','31','1','2022-11-26 18:43:55');
INSERT INTO `tbl_kardex` VALUES('132','2','1','1','1','2022-11-26 18:44:34');
INSERT INTO `tbl_kardex` VALUES('133','2','2','31','1','2022-11-26 18:44:34');
INSERT INTO `tbl_kardex` VALUES('134','2','5','31','1','2022-11-26 18:44:34');
INSERT INTO `tbl_kardex` VALUES('135','2','2','12','1','2022-11-26 18:45:30');
INSERT INTO `tbl_kardex` VALUES('136','2','5','31','1','2022-11-26 18:45:30');
INSERT INTO `tbl_kardex` VALUES('137','2','9','123','1','2022-11-26 18:45:30');
INSERT INTO `tbl_kardex` VALUES('138','2','1','7','1','2022-11-26 18:47:21');
INSERT INTO `tbl_kardex` VALUES('139','2','2','74','1','2022-11-26 18:47:21');
INSERT INTO `tbl_kardex` VALUES('140','2','9','5','1','2022-11-26 18:47:21');
INSERT INTO `tbl_kardex` VALUES('141','2','5','12','1','2022-11-26 18:47:21');
INSERT INTO `tbl_kardex` VALUES('142','2','3','7','1','2022-11-26 18:49:14');
INSERT INTO `tbl_kardex` VALUES('143','2','4','6','1','2022-11-26 18:49:14');
INSERT INTO `tbl_kardex` VALUES('144','2','5','3','1','2022-11-26 18:49:14');
INSERT INTO `tbl_kardex` VALUES('145','2','4','4','1','2022-11-26 18:59:54');
INSERT INTO `tbl_kardex` VALUES('146','2','3','7','1','2022-11-26 18:59:54');
INSERT INTO `tbl_kardex` VALUES('147','2','2','3','1','2022-11-26 19:11:34');
INSERT INTO `tbl_kardex` VALUES('148','2','4','7','1','2022-11-26 19:11:34');
INSERT INTO `tbl_kardex` VALUES('149','2','9','120','1','2022-11-26 19:11:34');
INSERT INTO `tbl_kardex` VALUES('150','1','2','3','1','2022-11-26 19:11:40');
INSERT INTO `tbl_kardex` VALUES('151','1','1','1','1','2022-11-26 19:11:43');
INSERT INTO `tbl_kardex` VALUES('152','1','1','13','1','2022-11-26 19:11:45');
INSERT INTO `tbl_kardex` VALUES('153','2','1','13','1','2022-11-26 19:12:44');
INSERT INTO `tbl_kardex` VALUES('154','2','5','5','1','2022-11-26 19:12:44');
INSERT INTO `tbl_kardex` VALUES('155','2','2','23','1','2022-11-26 19:13:32');
INSERT INTO `tbl_kardex` VALUES('156','2','5','45','1','2022-11-26 19:13:32');
INSERT INTO `tbl_kardex` VALUES('157','2','4','23','1','2022-11-26 19:13:32');
INSERT INTO `tbl_kardex` VALUES('158','2','4','4','1','2022-11-26 19:15:45');
INSERT INTO `tbl_kardex` VALUES('159','2','2','32','1','2022-11-26 19:16:17');
INSERT INTO `tbl_kardex` VALUES('160','2','5','12','1','2022-11-26 19:16:17');
INSERT INTO `tbl_kardex` VALUES('161','2','2','12','1','2022-11-26 19:18:40');
INSERT INTO `tbl_kardex` VALUES('162','2','2','32','1','2022-11-26 19:20:43');
INSERT INTO `tbl_kardex` VALUES('163','2','2','45','1','2022-11-26 19:24:50');
INSERT INTO `tbl_kardex` VALUES('164','2','2','4','1','2022-11-26 19:30:17');
INSERT INTO `tbl_kardex` VALUES('165','2','3','6','1','2022-11-26 19:30:17');
INSERT INTO `tbl_kardex` VALUES('166','2','2','7','1','2022-11-26 19:32:11');
INSERT INTO `tbl_kardex` VALUES('167','2','5','9','1','2022-11-26 19:32:11');
INSERT INTO `tbl_kardex` VALUES('168','2','2','9','1','2022-11-26 19:32:53');
INSERT INTO `tbl_kardex` VALUES('169','2','4','7','1','2022-11-26 19:32:53');
INSERT INTO `tbl_kardex` VALUES('170','2','3','7','1','2022-11-26 19:32:53');
INSERT INTO `tbl_kardex` VALUES('171','2','2','5','1','2022-11-26 21:59:57');
INSERT INTO `tbl_kardex` VALUES('172','2','3','4','1','2022-11-26 21:59:57');
INSERT INTO `tbl_kardex` VALUES('173','2','9','7','1','2022-11-26 21:59:57');
INSERT INTO `tbl_kardex` VALUES('174','2','2','8','1','2022-11-26 22:00:40');
INSERT INTO `tbl_kardex` VALUES('175','2','1','7','1','2022-11-26 22:00:40');
INSERT INTO `tbl_kardex` VALUES('176','2','9','7','1','2022-11-26 22:00:40');
INSERT INTO `tbl_kardex` VALUES('177','1','2','5','1','2022-11-26 22:01:00');
INSERT INTO `tbl_kardex` VALUES('178','1','2','5','1','2022-11-26 22:01:03');
INSERT INTO `tbl_kardex` VALUES('179','1','2','7','1','2022-11-26 22:01:06');
INSERT INTO `tbl_kardex` VALUES('180','1','2','4','1','2022-11-26 22:01:09');
INSERT INTO `tbl_kardex` VALUES('181','2','1','43','1','2022-11-26 22:17:52');
INSERT INTO `tbl_kardex` VALUES('182','2','3','13','1','2022-11-26 22:17:52');
INSERT INTO `tbl_kardex` VALUES('183','2','9','13','1','2022-11-26 22:17:52');
INSERT INTO `tbl_kardex` VALUES('184','2','3','7','1','2022-11-26 22:20:06');
INSERT INTO `tbl_kardex` VALUES('185','2','4','7','1','2022-11-26 22:20:06');
INSERT INTO `tbl_kardex` VALUES('186','2','3','3','1','2022-11-26 22:23:57');
INSERT INTO `tbl_kardex` VALUES('187','2','1','13','1','2022-11-26 22:23:57');
INSERT INTO `tbl_kardex` VALUES('188','2','3','6','1','2022-11-26 22:30:43');
INSERT INTO `tbl_kardex` VALUES('189','2','4','7','1','2022-11-26 22:30:43');
INSERT INTO `tbl_kardex` VALUES('190','2','9','6','1','2022-11-26 22:30:43');
INSERT INTO `tbl_kardex` VALUES('191','2','5','4','1','2022-11-26 22:32:49');
INSERT INTO `tbl_kardex` VALUES('192','1','3','7','1','2022-11-26 22:33:06');
INSERT INTO `tbl_kardex` VALUES('193','2','5','31','1','2022-11-26 22:34:05');
INSERT INTO `tbl_kardex` VALUES('194','2','3','12','1','2022-11-26 22:38:09');
INSERT INTO `tbl_kardex` VALUES('195','2','1','12','1','2022-11-26 22:38:09');
INSERT INTO `tbl_kardex` VALUES('196','2','5','11','1','2022-11-26 22:38:09');
INSERT INTO `tbl_kardex` VALUES('197','2','2','3','1','2022-11-26 22:40:01');
INSERT INTO `tbl_kardex` VALUES('198','2','9','13','1','2022-11-26 22:40:01');
INSERT INTO `tbl_kardex` VALUES('199','2','5','17','1','2022-11-26 22:40:01');
INSERT INTO `tbl_kardex` VALUES('200','2','3','3','1','2022-11-26 22:45:34');
INSERT INTO `tbl_kardex` VALUES('201','2','4','12','1','2022-11-26 22:49:50');
INSERT INTO `tbl_kardex` VALUES('202','2','9','11','1','2022-11-26 22:49:50');
INSERT INTO `tbl_kardex` VALUES('203','1','3','3','1','2022-11-26 22:49:56');
INSERT INTO `tbl_kardex` VALUES('204','1','5','31','1','2022-11-26 22:49:59');
INSERT INTO `tbl_kardex` VALUES('205','1','5','4','1','2022-11-26 22:50:03');
INSERT INTO `tbl_kardex` VALUES('206','2','2','1','1','2022-11-26 22:50:39');
INSERT INTO `tbl_kardex` VALUES('207','2','4','2','1','2022-11-26 22:50:39');
INSERT INTO `tbl_kardex` VALUES('208','2','1','21','1','2022-11-26 22:50:39');
INSERT INTO `tbl_kardex` VALUES('209','2','2','7','1','2022-11-26 22:53:32');
INSERT INTO `tbl_kardex` VALUES('210','2','4','8','1','2022-11-26 22:53:32');
INSERT INTO `tbl_kardex` VALUES('211','2','9','31','1','2022-11-26 22:53:32');
INSERT INTO `tbl_kardex` VALUES('212','2','5','31','1','2022-11-26 22:54:20');
INSERT INTO `tbl_kardex` VALUES('213','2','1','9','1','2022-11-26 22:54:20');
INSERT INTO `tbl_kardex` VALUES('214','2','3','21','1','2022-11-26 22:55:33');
INSERT INTO `tbl_kardex` VALUES('215','2','9','1','1','2022-11-26 22:55:33');
INSERT INTO `tbl_kardex` VALUES('216','2','2','12','1','2022-11-26 22:57:51');
INSERT INTO `tbl_kardex` VALUES('217','2','5','2','1','2022-11-26 22:57:51');
INSERT INTO `tbl_kardex` VALUES('218','2','9','7','1','2022-11-26 22:57:51');
INSERT INTO `tbl_kardex` VALUES('219','2','4','5','1','2022-11-26 22:58:41');
INSERT INTO `tbl_kardex` VALUES('220','2','3','5','1','2022-11-26 22:58:41');
INSERT INTO `tbl_kardex` VALUES('221','2','2','3','1','2022-11-26 23:01:13');
INSERT INTO `tbl_kardex` VALUES('222','2','4','3','1','2022-11-26 23:05:53');
INSERT INTO `tbl_kardex` VALUES('223','2','9','2','1','2022-11-26 23:05:53');
INSERT INTO `tbl_kardex` VALUES('224','2','5','2','1','2022-11-26 23:07:48');
INSERT INTO `tbl_kardex` VALUES('225','2','2','7','1','2022-11-27 01:30:24');
INSERT INTO `tbl_kardex` VALUES('226','2','9','31','1','2022-11-27 01:30:24');
INSERT INTO `tbl_kardex` VALUES('227','2','1','11','1','2022-11-27 01:30:24');
INSERT INTO `tbl_kardex` VALUES('228','2','5','2','1','2022-11-27 01:42:04');
INSERT INTO `tbl_kardex` VALUES('229','2','2','12','1','2022-11-27 01:42:04');
INSERT INTO `tbl_kardex` VALUES('230','2','1','7','1','2022-11-27 01:42:43');
INSERT INTO `tbl_kardex` VALUES('231','2','9','13','1','2022-11-27 01:42:43');
INSERT INTO `tbl_kardex` VALUES('232','2','4','7','1','2022-11-27 01:42:43');
INSERT INTO `tbl_kardex` VALUES('233','2','9','14','1','2022-11-27 01:56:21');
INSERT INTO `tbl_kardex` VALUES('234','2','3','78','1','2022-11-27 01:56:21');
INSERT INTO `tbl_kardex` VALUES('235','2','5','7','1','2022-11-27 01:56:21');
INSERT INTO `tbl_kardex` VALUES('236','2','2','13','1','2022-11-27 02:21:36');
INSERT INTO `tbl_kardex` VALUES('237','2','1','3','1','2022-11-27 02:21:36');
INSERT INTO `tbl_kardex` VALUES('238','2','9','3','1','2022-11-27 02:21:36');
INSERT INTO `tbl_kardex` VALUES('239','2','3','3','1','2022-11-27 02:23:24');
INSERT INTO `tbl_kardex` VALUES('240','2','9','1','1','2022-11-27 02:23:24');
INSERT INTO `tbl_kardex` VALUES('241','2','5','6','1','2022-11-27 02:23:24');
INSERT INTO `tbl_kardex` VALUES('242','2','2','23','1','2022-11-27 02:24:41');
INSERT INTO `tbl_kardex` VALUES('243','2','4','4','1','2022-11-27 02:24:41');
INSERT INTO `tbl_kardex` VALUES('244','1','2','7','1','2022-11-27 02:24:51');
INSERT INTO `tbl_kardex` VALUES('245','2','4','4','1','2022-11-27 02:26:14');
INSERT INTO `tbl_kardex` VALUES('246','2','5','6','1','2022-11-27 02:26:14');
INSERT INTO `tbl_kardex` VALUES('247','2','4','7','1','2022-11-27 02:29:34');
INSERT INTO `tbl_kardex` VALUES('248','2','5','4','1','2022-11-27 02:29:34');
INSERT INTO `tbl_kardex` VALUES('249','2','2','7','1','2022-11-27 02:39:09');
INSERT INTO `tbl_kardex` VALUES('250','2','9','9','1','2022-11-27 02:39:09');
INSERT INTO `tbl_kardex` VALUES('251','2','5','12','1','2022-11-27 02:40:05');
INSERT INTO `tbl_kardex` VALUES('252','2','1','1','1','2022-11-27 02:40:05');
INSERT INTO `tbl_kardex` VALUES('253','2','2','13','1','2022-11-27 02:40:05');
INSERT INTO `tbl_kardex` VALUES('254','2','4','4','1','2022-11-27 02:40:05');
INSERT INTO `tbl_kardex` VALUES('255','2','3','13','1','2022-11-27 02:40:05');
INSERT INTO `tbl_kardex` VALUES('256','2','2','7','1','2022-11-27 03:46:59');
INSERT INTO `tbl_kardex` VALUES('257','2','5','7','1','2022-11-27 03:46:59');
INSERT INTO `tbl_kardex` VALUES('258','2','4','13','1','2022-11-27 04:01:21');
INSERT INTO `tbl_kardex` VALUES('259','2','2','13','1','2022-11-27 04:01:21');
INSERT INTO `tbl_kardex` VALUES('260','1','2','7','1','2022-11-27 04:01:51');
INSERT INTO `tbl_kardex` VALUES('261','2','3','12','1','2022-11-27 04:02:10');
INSERT INTO `tbl_kardex` VALUES('262','2','5','14','1','2022-11-27 04:02:10');
INSERT INTO `tbl_kardex` VALUES('263','2','3','11','1','2022-11-27 05:54:34');
INSERT INTO `tbl_kardex` VALUES('264','2','5','11','1','2022-11-27 05:54:34');
INSERT INTO `tbl_kardex` VALUES('265','2','4','7','1','2022-11-27 15:13:33');
INSERT INTO `tbl_kardex` VALUES('266','2','3','4','1','2022-11-27 15:15:39');
INSERT INTO `tbl_kardex` VALUES('267','2','5','7','1','2022-11-27 15:15:39');
INSERT INTO `tbl_kardex` VALUES('268','1','3','4','1','2022-11-27 15:16:13');
INSERT INTO `tbl_kardex` VALUES('269','1','4','13','1','2022-11-27 15:16:17');
INSERT INTO `tbl_kardex` VALUES('270','1','5','12','1','2022-11-27 15:16:21');
INSERT INTO `tbl_kardex` VALUES('271','1','2','7','1','2022-11-27 15:16:23');
INSERT INTO `tbl_kardex` VALUES('272','1','4','7','1','2022-11-27 15:16:27');
INSERT INTO `tbl_kardex` VALUES('273','1','3','11','1','2022-11-27 15:16:31');
INSERT INTO `tbl_kardex` VALUES('274','1','3','12','1','2022-11-27 15:16:34');
INSERT INTO `tbl_kardex` VALUES('275','1','4','7','1','2022-11-27 15:16:44');
INSERT INTO `tbl_kardex` VALUES('276','2','3','1','1','2022-11-27 15:17:39');
INSERT INTO `tbl_kardex` VALUES('277','2','5','7','1','2022-11-27 15:17:39');
INSERT INTO `tbl_kardex` VALUES('278','2','2','7','1','2022-11-27 15:20:31');
INSERT INTO `tbl_kardex` VALUES('279','2','9','3','1','2022-11-27 15:20:31');
INSERT INTO `tbl_kardex` VALUES('280','2','2','7','1','2022-11-27 15:21:19');
INSERT INTO `tbl_kardex` VALUES('281','2','4','11','1','2022-11-27 15:21:19');
INSERT INTO `tbl_kardex` VALUES('282','2','4','7','1','2022-11-27 15:22:32');
INSERT INTO `tbl_kardex` VALUES('283','2','9','74','1','2022-11-27 15:22:32');
INSERT INTO `tbl_kardex` VALUES('284','2','1','12','1','2022-11-27 15:22:32');
INSERT INTO `tbl_kardex` VALUES('285','2','3','9','1','2022-11-27 15:22:32');
INSERT INTO `tbl_kardex` VALUES('286','2','2','13','1','2022-11-27 15:22:32');
INSERT INTO `tbl_kardex` VALUES('287','2','3','12','1','2022-11-27 15:28:30');
INSERT INTO `tbl_kardex` VALUES('288','2','1','3','1','2022-11-27 15:29:13');
INSERT INTO `tbl_kardex` VALUES('289','2','2','7','1','2022-11-27 15:29:13');
INSERT INTO `tbl_kardex` VALUES('290','2','4','7','1','2022-11-27 15:41:32');
INSERT INTO `tbl_kardex` VALUES('291','2','9','7','1','2022-11-27 15:41:32');
INSERT INTO `tbl_kardex` VALUES('292','2','3','7','1','2022-11-27 15:43:37');
INSERT INTO `tbl_kardex` VALUES('293','2','2','6','1','2022-11-27 15:45:18');
INSERT INTO `tbl_kardex` VALUES('294','2','5','3','1','2022-11-27 15:45:18');
INSERT INTO `tbl_kardex` VALUES('295','2','4','3','1','2022-11-27 15:51:16');
INSERT INTO `tbl_kardex` VALUES('296','2','2','3','1','2022-11-27 15:51:16');
INSERT INTO `tbl_kardex` VALUES('297','2','2','11','1','2022-11-27 15:54:02');
INSERT INTO `tbl_kardex` VALUES('298','2','4','7','1','2022-11-27 15:54:02');
INSERT INTO `tbl_kardex` VALUES('299','2','4','5','1','2022-11-27 15:55:20');
INSERT INTO `tbl_kardex` VALUES('300','2','2','11','1','2022-11-27 15:55:20');
INSERT INTO `tbl_kardex` VALUES('301','2','9','7','1','2022-11-27 15:55:20');
INSERT INTO `tbl_kardex` VALUES('302','2','3','13','1','2022-11-27 15:55:20');
INSERT INTO `tbl_kardex` VALUES('303','2','1','7','1','2022-11-27 15:55:20');
INSERT INTO `tbl_kardex` VALUES('304','2','2','5','1','2022-11-27 15:56:30');
INSERT INTO `tbl_kardex` VALUES('305','2','2','3','1','2022-11-27 15:58:50');
INSERT INTO `tbl_kardex` VALUES('306','2','4','4','1','2022-11-27 16:01:51');
INSERT INTO `tbl_kardex` VALUES('307','2','2','11','1','2022-11-27 16:02:46');
INSERT INTO `tbl_kardex` VALUES('308','2','3','4','1','2022-11-27 16:05:38');
INSERT INTO `tbl_kardex` VALUES('309','2','5','31','1','2022-11-27 16:05:38');
INSERT INTO `tbl_kardex` VALUES('310','2','5','6','1','2022-11-27 16:07:39');
INSERT INTO `tbl_kardex` VALUES('311','2','2','5','1','2022-11-27 16:07:39');
INSERT INTO `tbl_kardex` VALUES('312','2','3','13','1','2022-11-27 16:08:01');
INSERT INTO `tbl_kardex` VALUES('313','2','4','7','1','2022-11-27 16:20:45');
INSERT INTO `tbl_kardex` VALUES('314','2','5','7','1','2022-11-27 16:23:12');
INSERT INTO `tbl_kardex` VALUES('315','2','2','3','1','2022-11-27 16:23:12');
INSERT INTO `tbl_kardex` VALUES('316','2','3','1','1','2022-11-27 19:28:20');
INSERT INTO `tbl_kardex` VALUES('317','2','3','7','1','2022-11-27 19:28:36');
INSERT INTO `tbl_kardex` VALUES('318','2','3','7','1','2022-11-27 19:37:13');
INSERT INTO `tbl_kardex` VALUES('319','2','5','4','1','2022-11-27 19:37:13');
INSERT INTO `tbl_kardex` VALUES('320','2','3','14','1','2022-11-27 19:39:27');
INSERT INTO `tbl_kardex` VALUES('321','2','9','17','1','2022-11-27 19:39:27');
INSERT INTO `tbl_kardex` VALUES('322','2','4','7','1','2022-11-27 19:39:27');
INSERT INTO `tbl_kardex` VALUES('323','2','3','11','1','2022-11-27 19:40:00');
INSERT INTO `tbl_kardex` VALUES('324','2','5','13','1','2022-11-27 19:40:00');
INSERT INTO `tbl_kardex` VALUES('325','2','2','4','1','2022-11-27 19:54:11');
INSERT INTO `tbl_kardex` VALUES('326','2','3','4','1','2022-11-27 19:54:11');
INSERT INTO `tbl_kardex` VALUES('327','2','5','4','1','2022-11-28 01:34:09');
INSERT INTO `tbl_kardex` VALUES('328','2','4','7','1','2022-11-28 01:34:36');
INSERT INTO `tbl_kardex` VALUES('329','2','3','4','1','2022-11-28 01:34:36');
INSERT INTO `tbl_kardex` VALUES('330','2','4','5','1','2022-11-28 01:41:36');
INSERT INTO `tbl_kardex` VALUES('331','2','4','3','1','2022-11-28 01:46:29');
INSERT INTO `tbl_kardex` VALUES('332','2','9','3','1','2022-11-28 01:48:26');
INSERT INTO `tbl_kardex` VALUES('333','2','9','3','1','2022-11-28 01:53:03');
INSERT INTO `tbl_kardex` VALUES('334','2','3','6','1','2022-11-28 01:53:03');
INSERT INTO `tbl_kardex` VALUES('335','2','5','9','1','2022-11-28 01:53:51');
INSERT INTO `tbl_kardex` VALUES('336','2','3','9','1','2022-11-28 01:53:51');
INSERT INTO `tbl_kardex` VALUES('337','2','9','7','1','2022-11-28 01:53:51');
INSERT INTO `tbl_kardex` VALUES('338','2','4','5','1','2022-11-28 01:55:15');
INSERT INTO `tbl_kardex` VALUES('339','2','5','9','1','2022-11-28 01:55:15');
INSERT INTO `tbl_kardex` VALUES('340','2','3','7','1','2022-11-28 01:59:27');
INSERT INTO `tbl_kardex` VALUES('341','2','2','13','1','2022-11-28 01:59:27');
INSERT INTO `tbl_kardex` VALUES('342','2','2','7','1','2022-11-28 02:04:46');
INSERT INTO `tbl_kardex` VALUES('343','2','2','7','1','2022-11-28 02:06:33');
INSERT INTO `tbl_kardex` VALUES('344','2','2','4','1','2022-11-28 02:06:55');
INSERT INTO `tbl_kardex` VALUES('345','2','3','9','1','2022-11-28 02:08:30');
INSERT INTO `tbl_kardex` VALUES('346','2','3','7','1','2022-11-28 02:09:11');
INSERT INTO `tbl_kardex` VALUES('347','2','3','6','1','2022-11-28 02:10:24');
INSERT INTO `tbl_kardex` VALUES('348','2','3','7','1','2022-11-28 02:11:15');
INSERT INTO `tbl_kardex` VALUES('349','2','3','7','1','2022-11-28 02:16:37');
INSERT INTO `tbl_kardex` VALUES('350','2','4','9','1','2022-11-28 02:16:55');
INSERT INTO `tbl_kardex` VALUES('351','2','4','8','1','2022-11-28 02:18:32');
INSERT INTO `tbl_kardex` VALUES('352','2','5','12','1','2022-11-28 02:22:41');
INSERT INTO `tbl_kardex` VALUES('353','2','3','11','1','2022-11-28 02:24:01');
INSERT INTO `tbl_kardex` VALUES('354','2','1','7','1','2022-11-28 02:24:01');
INSERT INTO `tbl_kardex` VALUES('355','2','2','5','1','2022-11-28 02:25:07');
INSERT INTO `tbl_kardex` VALUES('356','2','2','9','1','2022-11-28 02:26:41');
INSERT INTO `tbl_kardex` VALUES('357','2','1','9','1','2022-11-28 02:27:21');
INSERT INTO `tbl_kardex` VALUES('358','2','2','7','1','2022-11-28 02:29:16');
INSERT INTO `tbl_kardex` VALUES('359','2','5','7','1','2022-11-28 02:29:41');
INSERT INTO `tbl_kardex` VALUES('360','2','3','9','1','2022-11-28 02:30:11');
INSERT INTO `tbl_kardex` VALUES('361','2','3','7','1','2022-11-28 02:30:47');
INSERT INTO `tbl_kardex` VALUES('362','2','2','8','1','2022-11-28 02:33:00');
INSERT INTO `tbl_kardex` VALUES('363','2','4','4','1','2022-11-28 02:33:22');
INSERT INTO `tbl_kardex` VALUES('364','2','2','7','1','2022-11-28 02:34:50');
INSERT INTO `tbl_kardex` VALUES('365','2','3','4','1','2022-11-28 02:36:11');
INSERT INTO `tbl_kardex` VALUES('366','2','2','6','1','2022-11-28 02:37:24');
INSERT INTO `tbl_kardex` VALUES('367','2','3','4','1','2022-11-28 02:37:53');
INSERT INTO `tbl_kardex` VALUES('368','2','3','6','1','2022-11-28 02:42:22');
INSERT INTO `tbl_kardex` VALUES('369','2','3','9','1','2022-11-28 02:43:20');
INSERT INTO `tbl_kardex` VALUES('370','2','2','7','1','2022-11-28 02:43:49');
INSERT INTO `tbl_kardex` VALUES('371','2','3','6','1','2022-11-28 02:44:50');
INSERT INTO `tbl_kardex` VALUES('372','2','3','6','1','2022-11-28 02:45:27');
INSERT INTO `tbl_kardex` VALUES('373','2','2','6','1','2022-11-28 02:46:04');
INSERT INTO `tbl_kardex` VALUES('374','2','3','8','1','2022-11-28 02:47:01');
INSERT INTO `tbl_kardex` VALUES('375','2','5','17','1','2022-11-28 02:48:06');
INSERT INTO `tbl_kardex` VALUES('376','2','3','14','1','2022-11-28 02:49:06');
INSERT INTO `tbl_kardex` VALUES('377','2','4','9','1','2022-11-28 02:51:21');
INSERT INTO `tbl_kardex` VALUES('378','2','2','7','1','2022-11-28 02:52:46');
INSERT INTO `tbl_kardex` VALUES('379','2','5','11','1','2022-11-28 02:54:16');
INSERT INTO `tbl_kardex` VALUES('380','2','1','17','1','2022-11-28 02:54:16');
INSERT INTO `tbl_kardex` VALUES('381','2','9','7','1','2022-11-28 02:54:16');
INSERT INTO `tbl_kardex` VALUES('382','2','4','31','1','2022-11-28 02:54:16');
INSERT INTO `tbl_kardex` VALUES('383','2','3','9','1','2022-11-28 02:54:16');
INSERT INTO `tbl_kardex` VALUES('384','2','5','17','1','2022-11-28 03:00:37');
INSERT INTO `tbl_kardex` VALUES('385','2','9','11','1','2022-11-28 03:25:33');
INSERT INTO `tbl_kardex` VALUES('386','2','2','57','1','2022-11-28 03:25:33');
INSERT INTO `tbl_kardex` VALUES('387','2','1','2','1','2022-11-28 03:30:53');
INSERT INTO `tbl_kardex` VALUES('388','2','9','5','1','2022-11-28 03:30:53');
INSERT INTO `tbl_kardex` VALUES('389','2','1','12','1','2022-11-28 03:50:31');
INSERT INTO `tbl_kardex` VALUES('390','2','9','6','1','2022-11-28 03:50:31');
INSERT INTO `tbl_kardex` VALUES('391','2','4','3','1','2022-11-28 03:50:31');
INSERT INTO `tbl_kardex` VALUES('392','2','3','6','1','2022-11-28 03:50:31');
INSERT INTO `tbl_kardex` VALUES('393','2','2','6','1','2022-11-28 03:50:31');
INSERT INTO `tbl_kardex` VALUES('394','2','3','8','1','2022-11-28 03:57:56');
INSERT INTO `tbl_kardex` VALUES('395','2','2','2','1','2022-11-28 03:57:56');
INSERT INTO `tbl_kardex` VALUES('396','2','3','8','1','2022-11-28 04:03:43');
INSERT INTO `tbl_kardex` VALUES('397','2','5','11','1','2022-11-28 04:03:43');
INSERT INTO `tbl_kardex` VALUES('398','2','2','4','1','2022-11-28 04:04:35');
INSERT INTO `tbl_kardex` VALUES('399','2','5','14','1','2022-11-28 04:04:35');
INSERT INTO `tbl_kardex` VALUES('400','2','3','14','1','2022-11-28 05:08:11');
INSERT INTO `tbl_kardex` VALUES('401','2','9','12','1','2022-11-28 05:08:11');
INSERT INTO `tbl_kardex` VALUES('402','2','9','17','1','2022-11-28 05:21:51');
INSERT INTO `tbl_kardex` VALUES('403','2','9','7','1','2022-11-28 05:44:16');
INSERT INTO `tbl_kardex` VALUES('404','2','5','4','1','2022-11-28 05:44:16');
INSERT INTO `tbl_kardex` VALUES('405','2','4','11','1','2022-11-28 05:44:16');
INSERT INTO `tbl_kardex` VALUES('406','2','3','8','1','2022-11-28 05:44:16');
INSERT INTO `tbl_kardex` VALUES('407','2','2','7','1','2022-11-28 05:44:16');
INSERT INTO `tbl_kardex` VALUES('408','2','1','21','1','2022-11-28 05:44:16');
INSERT INTO `tbl_kardex` VALUES('409','2','4','4','1','2022-11-28 05:53:40');
INSERT INTO `tbl_kardex` VALUES('410','2','1','4','1','2022-11-29 03:37:19');
INSERT INTO `tbl_kardex` VALUES('411','2','2','4','1','2022-11-29 03:37:19');
INSERT INTO `tbl_kardex` VALUES('412','2','3','7','1','2022-11-29 03:44:35');
INSERT INTO `tbl_kardex` VALUES('413','2','5','8','1','2022-11-29 03:44:35');
INSERT INTO `tbl_kardex` VALUES('414','2','3','8','1','2022-11-29 03:46:22');
INSERT INTO `tbl_kardex` VALUES('415','2','5','8','1','2022-11-29 03:46:22');
INSERT INTO `tbl_kardex` VALUES('416','2','4','8','1','2022-11-29 03:55:44');
INSERT INTO `tbl_kardex` VALUES('417','2','5','9','1','2022-11-29 03:55:44');
INSERT INTO `tbl_kardex` VALUES('418','2','9','3','1','2022-11-29 03:55:44');
INSERT INTO `tbl_kardex` VALUES('419','2','2','8','1','2022-11-29 04:00:23');
INSERT INTO `tbl_kardex` VALUES('420','2','4','8','1','2022-11-29 04:00:23');
INSERT INTO `tbl_kardex` VALUES('421','2','2','8','1','2022-11-29 04:04:02');
INSERT INTO `tbl_kardex` VALUES('422','2','3','5','1','2022-11-29 04:04:02');
INSERT INTO `tbl_kardex` VALUES('423','2','4','8','1','2022-11-29 04:28:01');
INSERT INTO `tbl_kardex` VALUES('424','2','5','7','1','2022-11-29 04:28:01');
INSERT INTO `tbl_kardex` VALUES('425','2','4','10','1','2022-11-29 04:31:10');
INSERT INTO `tbl_kardex` VALUES('426','2','4','10','1','2022-11-29 04:31:55');
INSERT INTO `tbl_kardex` VALUES('427','2','3','11','1','2022-11-29 04:41:17');
INSERT INTO `tbl_kardex` VALUES('428','2','5','11','1','2022-11-29 04:41:17');
INSERT INTO `tbl_kardex` VALUES('429','2','5','7','1','2022-11-29 05:30:58');
INSERT INTO `tbl_kardex` VALUES('430','2','9','5','1','2022-11-29 05:30:58');
INSERT INTO `tbl_kardex` VALUES('431','2','4','41','1','2022-11-29 05:30:58');
INSERT INTO `tbl_kardex` VALUES('432','2','3','4','1','2022-11-30 15:13:04');
INSERT INTO `tbl_kardex` VALUES('433','2','2','4','1','2022-12-01 18:52:16');
INSERT INTO `tbl_kardex` VALUES('434','2','5','7','1','2022-12-01 18:52:16');
INSERT INTO `tbl_kardex` VALUES('435','2','4','6','1','2022-12-01 19:49:37');
INSERT INTO `tbl_kardex` VALUES('436','2','3','8','1','2022-12-01 20:28:54');
INSERT INTO `tbl_kardex` VALUES('437','2','3','78','1','2022-12-01 20:31:13');
INSERT INTO `tbl_kardex` VALUES('438','2','4','17','1','2022-12-01 20:31:13');
INSERT INTO `tbl_kardex` VALUES('439','2','5','7','1','2022-12-01 20:31:53');
INSERT INTO `tbl_kardex` VALUES('440','2','5','7','1','2022-12-01 20:36:29');
INSERT INTO `tbl_kardex` VALUES('441','2','5','5','1','2022-12-01 20:37:05');
INSERT INTO `tbl_kardex` VALUES('442','2','2','7','1','2022-12-01 20:38:20');
INSERT INTO `tbl_kardex` VALUES('443','2','4','5','1','2022-12-01 20:41:20');
INSERT INTO `tbl_kardex` VALUES('444','2','4','3','1','2022-12-01 20:42:19');
INSERT INTO `tbl_kardex` VALUES('445','2','4','1','1','2022-12-01 20:46:21');
INSERT INTO `tbl_kardex` VALUES('446','2','5','5','1','2022-12-01 20:47:55');
INSERT INTO `tbl_kardex` VALUES('447','2','3','6','1','2022-12-01 20:48:18');
INSERT INTO `tbl_kardex` VALUES('448','2','4','3','1','2022-12-01 20:49:19');
INSERT INTO `tbl_kardex` VALUES('449','2','4','7','1','2022-12-01 20:54:32');
INSERT INTO `tbl_kardex` VALUES('450','2','5','9','1','2022-12-01 20:54:50');
INSERT INTO `tbl_kardex` VALUES('451','2','9','5','1','2022-12-01 20:55:16');
INSERT INTO `tbl_kardex` VALUES('452','2','1','12','1','2022-12-01 20:56:43');
INSERT INTO `tbl_kardex` VALUES('453','2','1','11','1','2022-12-01 20:57:09');
INSERT INTO `tbl_kardex` VALUES('454','2','9','8','1','2022-12-01 20:57:46');
INSERT INTO `tbl_kardex` VALUES('455','2','4','3','1','2022-12-01 20:58:15');
INSERT INTO `tbl_kardex` VALUES('456','2','5','5','1','2022-12-01 20:59:58');
INSERT INTO `tbl_kardex` VALUES('457','2','4','5','1','2022-12-01 21:02:04');
INSERT INTO `tbl_kardex` VALUES('458','2','1','7','1','2022-12-01 22:32:43');
INSERT INTO `tbl_kardex` VALUES('459','2','5','8','1','2022-12-01 22:33:52');
INSERT INTO `tbl_kardex` VALUES('460','2','2','1','1','2022-12-01 22:34:28');
INSERT INTO `tbl_kardex` VALUES('461','2','1','4','1','2022-12-01 22:34:57');
INSERT INTO `tbl_kardex` VALUES('462','2','1','17','1','2022-12-02 03:51:00');
INSERT INTO `tbl_kardex` VALUES('463','1','1','4','1','2022-12-04 04:44:01');
INSERT INTO `tbl_kardex` VALUES('464','1','2','1','1','2022-12-04 04:44:07');
INSERT INTO `tbl_kardex` VALUES('465','1','2','1','1','2022-12-04 04:44:14');
INSERT INTO `tbl_kardex` VALUES('466','1','2','1','1','2022-12-04 04:44:19');
INSERT INTO `tbl_kardex` VALUES('467','2','2','7','1','2022-12-04 19:13:45');

--
-- Estructura de la tabla `tbl_lote`
--
DROP TABLE IF EXISTS tbl_lote;
CREATE TABLE `tbl_lote` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cantidad` int NOT NULL,
  `id_tipo_producto` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo_producto` (`id_tipo_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_lote`
--
INSERT INTO `tbl_lote` VALUES('1','VINO ROSA','8','1');

--
-- Estructura de la tabla `tbl_modulos`
--
DROP TABLE IF EXISTS tbl_modulos;
CREATE TABLE `tbl_modulos` (
  `id_objeto` int NOT NULL AUTO_INCREMENT,
  `Objeto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion_objeto` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_padre` int NOT NULL,
  `URL` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_objeto`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_modulos`
--
INSERT INTO `tbl_modulos` VALUES('1','<i class="fa fa-cart-plus"></i>Gestion Venta','modulo seguridad','0','');
INSERT INTO `tbl_modulos` VALUES('2','Factura','seguridad','1','../src/factura.php');
INSERT INTO `tbl_modulos` VALUES('4','Estado Factura','seguridad','1','../src/estado_factura.php');
INSERT INTO `tbl_modulos` VALUES('5','Promociones','seguridad','1','../src/promociones.php');
INSERT INTO `tbl_modulos` VALUES('6','<i class="fa fa-shopping-cart"></i>Gestion Producto','modulo producto','0','');
INSERT INTO `tbl_modulos` VALUES('7','Productos','producto','6','../src/producto.php');
INSERT INTO `tbl_modulos` VALUES('8','<i class="fa fa-book"></i>Gestion Inventario','modulo inventario','0','');
INSERT INTO `tbl_modulos` VALUES('9','Inventario','inventario','8','../src/inventario.php');
INSERT INTO `tbl_modulos` VALUES('10','Compra de Materia Prima','inventario','8','../src/Inventario_materia.php');
INSERT INTO `tbl_modulos` VALUES('11','<i class="fa fa-user-plus "></i> Gestion Clientes','modulo clientes','0','');
INSERT INTO `tbl_modulos` VALUES('12','Clientes','clientes','11','../src/vista_cliente.php');
INSERT INTO `tbl_modulos` VALUES('13','<div class="sb-sidenav-menu-heading">Configuración</div>','Configuración','0','');
INSERT INTO `tbl_modulos` VALUES('14','<i class="fa fa-lock"></i>Seguridad','modulo seguridad','0','');
INSERT INTO `tbl_modulos` VALUES('15','Bitacora','seguridad','14','../Login/bitacora.php');
INSERT INTO `tbl_modulos` VALUES('16','Usuarios','seguridad','14','../Login/vista_usuarios.php');
INSERT INTO `tbl_modulos` VALUES('17','Roles','seguridad','14','../src/Mantenimiento_Roles.php');
INSERT INTO `tbl_modulos` VALUES('18','Roles objetos','seguridad','14','../src/Mantenimiento_Roles_objetos.php');
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
INSERT INTO `tbl_modulos` VALUES('30','<i class="fa fa-key"></i>Administración','modulo administracion','0','');
INSERT INTO `tbl_modulos` VALUES('31','Historial de Contraseñas','administracion','30','../src/hist_password.php');
INSERT INTO `tbl_modulos` VALUES('32','<i class="fa fa-folder-open"></i>Backup','modulo backup','0','');
INSERT INTO `tbl_modulos` VALUES('33','Backup','backup','32','../src/Backup.php');

--
-- Estructura de la tabla `tbl_movimiento`
--
DROP TABLE IF EXISTS tbl_movimiento;
CREATE TABLE `tbl_movimiento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_movimiento` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id` int NOT NULL AUTO_INCREMENT,
  `parametro` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `valor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_usuario` int NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Modificado_por` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_parametros`
--
INSERT INTO `tbl_parametros` VALUES('1','nombre','Inversiones Garcia','1','2022-10-02 12:44:43','2022-10-02 12:44:43','1');
INSERT INTO `tbl_parametros` VALUES('2','correo','inversionesgarcia@gmail.com','1','2022-10-02 12:47:33','2022-10-02 12:47:33','1');
INSERT INTO `tbl_parametros` VALUES('5','intentos_fallidos','2','1','2022-10-02 12:47:33','2022-10-02 12:47:33','1');
INSERT INTO `tbl_parametros` VALUES('6','max_contrasena','25','1','2022-10-02 12:49:38','2022-10-02 12:49:38','1');
INSERT INTO `tbl_parametros` VALUES('7','num_preguntas','2','1','2022-10-02 12:49:38','2022-10-02 12:49:38','1');
INSERT INTO `tbl_parametros` VALUES('8','horas_vigencia_correo','24','1','2022-10-12 19:37:43','2022-10-12 19:37:43','1');
INSERT INTO `tbl_parametros` VALUES('9','fecha_de_vencimiento','6','1','2022-10-17 15:32:07','2022-10-17 15:32:07','1');
INSERT INTO `tbl_parametros` VALUES('10','Impuesto sobre venta','0.15','1','0000-00-00 00:00:00','2022-11-29 07:00:00','1');

--
-- Estructura de la tabla `tbl_permisos`
--
DROP TABLE IF EXISTS tbl_permisos;
CREATE TABLE `tbl_permisos` (
  `id_permiso` int NOT NULL AUTO_INCREMENT,
  `id_rol` int NOT NULL,
  `permiso_insercion` int NOT NULL,
  `permiso_eliminacion` int NOT NULL,
  `permiso_modificar` int NOT NULL,
  `permiso_consultar` int NOT NULL,
  `id_objeto` int NOT NULL,
  `pdf` int NOT NULL,
  PRIMARY KEY (`id_permiso`),
  KEY `id_objeto` (`id_objeto`),
  KEY `id_rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Estructura de la tabla `tbl_preguntas`
--
DROP TABLE IF EXISTS tbl_preguntas;
CREATE TABLE `tbl_preguntas` (
  `id_pregunta` int NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_pregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id_pregunta` int NOT NULL,
  `id_usuario` int NOT NULL,
  `respuesta` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_preguntas_usuario`
--
INSERT INTO `tbl_preguntas_usuario` VALUES('1','1','chichi');
INSERT INTO `tbl_preguntas_usuario` VALUES('3','1','gangster');
INSERT INTO `tbl_preguntas_usuario` VALUES('1','3','muñeca');
INSERT INTO `tbl_preguntas_usuario` VALUES('3','3','cejon');
INSERT INTO `tbl_preguntas_usuario` VALUES('1','9','febrero');
INSERT INTO `tbl_preguntas_usuario` VALUES('2','9','febrero');
INSERT INTO `tbl_preguntas_usuario` VALUES('1','26','informatica');
INSERT INTO `tbl_preguntas_usuario` VALUES('2','26','informatica');
INSERT INTO `tbl_preguntas_usuario` VALUES('1','7','holis');
INSERT INTO `tbl_preguntas_usuario` VALUES('2','7','holis');
INSERT INTO `tbl_preguntas_usuario` VALUES('1','1','chichi');
INSERT INTO `tbl_preguntas_usuario` VALUES('3','1','gangster');
INSERT INTO `tbl_preguntas_usuario` VALUES('1','3','muñeca');
INSERT INTO `tbl_preguntas_usuario` VALUES('3','3','cejon');
INSERT INTO `tbl_preguntas_usuario` VALUES('1','9','febrero');
INSERT INTO `tbl_preguntas_usuario` VALUES('2','9','febrero');
INSERT INTO `tbl_preguntas_usuario` VALUES('1','26','informatica');
INSERT INTO `tbl_preguntas_usuario` VALUES('2','26','informatica');
INSERT INTO `tbl_preguntas_usuario` VALUES('1','7','holis');
INSERT INTO `tbl_preguntas_usuario` VALUES('2','7','holis');

--
-- Estructura de la tabla `tbl_producto`
--
DROP TABLE IF EXISTS tbl_producto;
CREATE TABLE `tbl_producto` (
  `codproducto` int NOT NULL AUTO_INCREMENT,
  `id_categoria` int NOT NULL,
  `id_tipo_producto` int NOT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `existencia` int NOT NULL,
  `cantidad_minima` int NOT NULL,
  `cantidad_maxima` int NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`codproducto`),
  KEY `id_categoria` (`id_categoria`,`id_tipo_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_producto`
--
INSERT INTO `tbl_producto` VALUES('1','1','1','PALA MD','120.00','581','20','190','1');
INSERT INTO `tbl_producto` VALUES('2','1','1','VINO BLANCO','75.00','5','70','700','1');
INSERT INTO `tbl_producto` VALUES('3','1','1','VINO ROJO','105.87','0','40','100','1');
INSERT INTO `tbl_producto` VALUES('4','1','1','VINO DE UVA','110.00','367','1','4','1');
INSERT INTO `tbl_producto` VALUES('5','1','1','VINO DE CAFE','21.67','352','1','9','1');
INSERT INTO `tbl_producto` VALUES('9','1','1','VINO DE CACAO','120.00','576','12','360','1');

--
-- Estructura de la tabla `tbl_promocion_factura`
--
DROP TABLE IF EXISTS tbl_promocion_factura;
CREATE TABLE `tbl_promocion_factura` (
  `id_promFac` int NOT NULL AUTO_INCREMENT,
  `id_Factura` int NOT NULL,
  `id_promocion` int NOT NULL,
  `valor` int NOT NULL,
  PRIMARY KEY (`id_promFac`),
  KEY `id_Factura` (`id_Factura`,`id_promocion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_promocion_factura`
--

--
-- Estructura de la tabla `tbl_promociones`
--
DROP TABLE IF EXISTS tbl_promociones;
CREATE TABLE `tbl_promociones` (
  `id_promociones` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `precio` int NOT NULL,
  `Fecha Inicio` datetime NOT NULL,
  `Fecha Final` datetime NOT NULL,
  PRIMARY KEY (`id_promociones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_promociones`
--

--
-- Estructura de la tabla `tbl_roles`
--
DROP TABLE IF EXISTS tbl_roles;
CREATE TABLE `tbl_roles` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `rol` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_roles`
--
INSERT INTO `tbl_roles` VALUES('1','super usuario','Es el usuario mayor','0');
INSERT INTO `tbl_roles` VALUES('2','administrador','Es el usuario administrador del sistema','0');
INSERT INTO `tbl_roles` VALUES('4','Sin asignar','Usuario sin un rol','0');
INSERT INTO `tbl_roles` VALUES('9','Ventas','Usuario de ventas','0');

--
-- Estructura de la tabla `tbl_roles_objetos`
--
DROP TABLE IF EXISTS tbl_roles_objetos;
CREATE TABLE `tbl_roles_objetos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_rol` int NOT NULL,
  `id_objeto` int NOT NULL,
  `permiso_insercion` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `permiso_eliminacion` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `permiso_actualizacion` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_cracion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `permiso_consultar` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_roles_objetos`
--

--
-- Estructura de la tabla `tbl_tipo_pago`
--
DROP TABLE IF EXISTS tbl_tipo_pago;
CREATE TABLE `tbl_tipo_pago` (
  `id_Tpago` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_Tpago`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `ID_TOKEN` int NOT NULL AUTO_INCREMENT,
  `TOKEN` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `FECHA_INICIO` datetime DEFAULT NULL,
  `FECHA_FINALIZACION` datetime DEFAULT NULL,
  `ID_USUARIO` int DEFAULT NULL,
  PRIMARY KEY (`ID_TOKEN`),
  KEY `ID_USUARIO_TOKEN_idx` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_tokens`
--
INSERT INTO `tbl_tokens` VALUES('1','fb0bb62bc3b5b4d677a66324ef462071','2022-08-16 11:05:35','2022-08-17 11:05:35','6');
INSERT INTO `tbl_tokens` VALUES('2','56dbc696943ee28252a522b7225ae809','2022-08-19 00:56:19','2022-08-20 00:56:19','11');
INSERT INTO `tbl_tokens` VALUES('3','f8894a6e16fb99c720fc93233d46d6dd','2022-08-19 01:00:29','2022-08-20 01:00:29','6');
INSERT INTO `tbl_tokens` VALUES('4','a3904d95272f4024d90482991759f307','2022-08-19 01:32:32','2022-08-20 01:32:32','12');
INSERT INTO `tbl_tokens` VALUES('20','a7793532984f1afd1151cb5ec9ced11d','2022-10-13 18:11:17','2022-10-14 18:11:17','27');
INSERT INTO `tbl_tokens` VALUES('21','294b92ddd74c4b50785981fae0480d8a','2022-10-13 18:18:00','2022-10-14 18:18:00','27');
INSERT INTO `tbl_tokens` VALUES('22','e86380c255a43ba8fddd979775e47d54','2022-10-13 18:24:15','2022-10-14 18:24:15','27');
INSERT INTO `tbl_tokens` VALUES('23','331758815619d2a4095662e4bfc02fd5','2022-10-13 19:44:53','2022-10-14 19:44:53','27');
INSERT INTO `tbl_tokens` VALUES('24','d822d4646518777bed1ecbc12e14c3f0','2022-10-13 21:18:12','2022-10-14 21:18:12','28');
INSERT INTO `tbl_tokens` VALUES('25','50ff06b36b2b77876135d014bd9979fc','2022-10-13 21:43:31','2022-10-14 21:43:31','29');
INSERT INTO `tbl_tokens` VALUES('26','507a9dba75bcc1f5f8cbeb969e0de3f8','2022-10-19 00:21:03','2022-10-20 00:21:03','14');
INSERT INTO `tbl_tokens` VALUES('27','71c9e004c372e17642aad635b209bd08','2022-10-19 00:24:58','2022-10-20 00:24:58','14');
INSERT INTO `tbl_tokens` VALUES('30','fc4243aa3f40971768bb1e0defabcbbf','2022-10-21 18:39:54','2022-10-22 18:39:54','22');

--
-- Estructura de la tabla `tbl_usuario`
--
DROP TABLE IF EXISTS tbl_usuario;
CREATE TABLE `tbl_usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `clave` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_rol` int NOT NULL,
  `fecha_ultima_conexion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `preguntas_contestadas` int NOT NULL,
  `primer_ingreso` int NOT NULL,
  `fecha_vencimiento` date NOT NULL DEFAULT '0000-00-00',
  `id_estado` int NOT NULL,
  `id_empleado` int NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`),
  KEY `estado` (`id_estado`),
  KEY `id_empleado` (`id_empleado`),
  CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `tbl_estado` (`id_estado`),
  CONSTRAINT `tbl_usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `tbl_roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_usuario`
--
INSERT INTO `tbl_usuario` VALUES('1','ADMIN','inversionesgarcia2022@gmail.com','ADMIN','admin321','2','2022-12-04 07:00:00','2','1','2022-10-13','1','1');
INSERT INTO `tbl_usuario` VALUES('3','aru bar','fran5barri@hotmail.es','ARU','Tupapiariel@@77','1','2022-10-13 00:00:00','0','1','2022-09-23','1','1');
INSERT INTO `tbl_usuario` VALUES('7','ana cruz','ar@hotmeil.es','ana','anacruz@@1994','2','2022-11-14 18:42:03','0','1','2022-09-24','2','51');
INSERT INTO `tbl_usuario` VALUES('9','Say valle','fra@hot.es','SAYRTA','Sayojole@@33','4','2022-12-04 01:16:43','2','1','2022-09-25','1','12');

--
-- Estructura de la tabla `tipo_categoria`
--
DROP TABLE IF EXISTS tipo_categoria;
CREATE TABLE `tipo_categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tipo_categoria`
--
INSERT INTO `tipo_categoria` VALUES('1','Vino');
INSERT INTO `tipo_categoria` VALUES('2','Frutos secos');

--
-- Estructura de la tabla `tipo_producto`
--
DROP TABLE IF EXISTS tipo_producto;
CREATE TABLE `tipo_producto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tipo_producto`
--
INSERT INTO `tipo_producto` VALUES('1','VINO');
INSERT INTO `tipo_producto` VALUES('2','FRUTOS SECOS');

-- --------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 1;

-- --------------------------------------------------------
