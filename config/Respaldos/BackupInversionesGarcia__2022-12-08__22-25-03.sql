-- Respaldo de la base de datos Inversiones Garcia
-- Fecha: 2022-12-08 22:25:03
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
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4;

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
INSERT INTO `tbl_bitacora` VALUES('26','2022-12-08 19:36:40','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('27','2022-12-08 19:37:13','1','3','NUEVO','SE CREA NUEVO REGISTRO EN EMPLEADOS');
INSERT INTO `tbl_bitacora` VALUES('28','2022-12-08 19:37:17','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('29','2022-12-08 19:37:45','2','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('30','2022-12-08 19:37:51','2','2','INGRESAR PREGUNTAS','EL USUARIO INGRESA PREGUNTAS DE SEGURIDAD');
INSERT INTO `tbl_bitacora` VALUES('31','2022-12-08 19:37:56','2','2','INGRESAR PREGUNTAS','EL USUARIO INGRESA PREGUNTAS DE SEGURIDAD');
INSERT INTO `tbl_bitacora` VALUES('32','2022-12-08 19:38:15','2','2','ACTUALIZAR','EL USUARIO ACTUALIZA LA CONTRASEÑA');
INSERT INTO `tbl_bitacora` VALUES('33','2022-12-08 19:38:15','2','2','ACTUALIZAR','EL USUARIO ACTUALIZA LA CONTRASEÑA');
INSERT INTO `tbl_bitacora` VALUES('34','2022-12-08 19:38:26','2','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('35','2022-12-08 19:38:30','2','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('36','2022-12-08 19:38:49','2','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('37','2022-12-08 19:40:24','2','2','ACTUALIZAR','EL USUARIO ACTUALIZA LA CONTRASEÑA');
INSERT INTO `tbl_bitacora` VALUES('38','2022-12-08 19:40:39','2','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('39','2022-12-08 19:41:03','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('40','2022-12-08 19:41:35','2','2','ACTUALIZAR','EL USUARIO ACTUALIZA LA CONTRASEÑA');
INSERT INTO `tbl_bitacora` VALUES('41','2022-12-08 19:41:52','2','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('42','2022-12-08 19:43:47','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('43','2022-12-08 20:47:45','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('44','2022-12-08 20:48:12','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('45','2022-12-08 20:51:07','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('46','2022-12-08 20:51:16','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('47','2022-12-08 20:51:36','1','33','REGISTRO','SE EDITO UN CAI');
INSERT INTO `tbl_bitacora` VALUES('48','2022-12-08 20:51:39','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('49','2022-12-08 20:51:52','1','2','INGRESO','EL USUARIO INGRESA A TABLA PERMISOS');
INSERT INTO `tbl_bitacora` VALUES('50','2022-12-08 20:52:30','1','2','INGRESO','EL USUARIO INGRESA A TABLA PERMISOS');
INSERT INTO `tbl_bitacora` VALUES('51','2022-12-08 20:53:48','1','2','INGRESO','EL USUARIO INGRESA A TABLA PERMISOS');
INSERT INTO `tbl_bitacora` VALUES('52','2022-12-08 20:54:21','1','2','INGRESO','EL USUARIO INGRESA A TABLA PERMISOS');
INSERT INTO `tbl_bitacora` VALUES('53','2022-12-08 20:55:26','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('54','2022-12-08 21:00:42','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('55','2022-12-08 21:01:24','1','28','REGISTRO','SE CREO UN NUEVO REGISTRO EN ROLES');
INSERT INTO `tbl_bitacora` VALUES('56','2022-12-08 21:01:36','1','28','EDITAR','SE EDITO UN NUEVO REGISTRO EN PREGUNTAS');
INSERT INTO `tbl_bitacora` VALUES('57','2022-12-08 21:06:18','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('58','2022-12-08 21:06:45','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('59','2022-12-08 21:07:40','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('60','2022-12-08 21:07:51','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('61','2022-12-08 21:07:56','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('62','2022-12-08 21:09:24','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('63','2022-12-08 21:09:31','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('64','2022-12-08 21:09:38','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('65','2022-12-08 21:09:47','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('66','2022-12-08 21:15:07','1','28','REGISTRO','SE CREO UN NUEVO REGISTRO EN PREGUNTAS');
INSERT INTO `tbl_bitacora` VALUES('67','2022-12-08 21:15:21','1','28','EDITAR','SE EDITO UN NUEVO REGISTRO EN PREGUNTAS');
INSERT INTO `tbl_bitacora` VALUES('68','2022-12-08 21:16:05','1','28','REGISTRO','SE CREO UN NUEVO REGISTRO EN TIPO CATEGORIA');
INSERT INTO `tbl_bitacora` VALUES('69','2022-12-08 21:16:16','1','28','EDITAR','SE EDITO UN NUEVO REGISTRO EN TIPO CATEGORIA');
INSERT INTO `tbl_bitacora` VALUES('70','2022-12-08 21:17:44','1','28','REGISTRO','SE CREO UN NUEVO REGISTRO EN TIPO PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('71','2022-12-08 21:17:53','1','28','EDITAR','SE EDITO UN NUEVO REGISTRO EN TIPO PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('72','2022-12-08 21:19:20','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('73','2022-12-08 21:19:31','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('74','2022-12-08 21:21:01','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('75','2022-12-08 21:21:11','1','33','REGISTRO','SE EDITO UN CAI');
INSERT INTO `tbl_bitacora` VALUES('76','2022-12-08 21:21:13','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('77','2022-12-08 21:22:27','1','2','INGRESO','EL USUARIO INGRESA A TABLA PERMISOS');
INSERT INTO `tbl_bitacora` VALUES('78','2022-12-08 21:22:41','1','2','INGRESO','EL USUARIO INGRESA A TABLA PERMISOS');
INSERT INTO `tbl_bitacora` VALUES('79','2022-12-08 21:23:21','1','28','REGISTRO','SE CREO UN NUEVO REGISTRO EN ROLES');
INSERT INTO `tbl_bitacora` VALUES('80','2022-12-08 21:23:37','1','28','EDITAR','SE EDITO UN NUEVO REGISTRO EN PREGUNTAS');
INSERT INTO `tbl_bitacora` VALUES('81','2022-12-08 21:23:48','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('82','2022-12-08 21:24:21','1','33','REGISTRO','SE EDITO UN CLIENTE');
INSERT INTO `tbl_bitacora` VALUES('83','2022-12-08 21:24:38','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('84','2022-12-08 21:25:01','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('85','2022-12-08 21:25:41','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('86','2022-12-08 21:27:47','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('87','2022-12-08 21:28:15','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('88','2022-12-08 21:28:22','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('89','2022-12-08 21:31:32','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('90','2022-12-08 21:31:41','1','3','INGRESO','EL USUARIO INGRESA A TABLA INVENTARIO');
INSERT INTO `tbl_bitacora` VALUES('91','2022-12-08 21:31:54','1','3','INGRESO','EL USUARIO INGRESA A TABLA INVENTARIO');
INSERT INTO `tbl_bitacora` VALUES('92','2022-12-08 21:31:57','1','2','INGRESO','EL USUARIO INGRESA A TABLA OBJETOS');
INSERT INTO `tbl_bitacora` VALUES('93','2022-12-08 21:32:25','1','2','INGRESO','EL USUARIO INGRESA A TABLA OBJETOS');
INSERT INTO `tbl_bitacora` VALUES('94','2022-12-08 21:32:28','1','3','INGRESO','EL USUARIO INGRESA A TABLA INVENTARIO');
INSERT INTO `tbl_bitacora` VALUES('95','2022-12-08 21:32:33','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('96','2022-12-08 21:32:50','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('97','2022-12-08 21:32:56','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('98','2022-12-08 21:32:57','1','3','INGRESO','EL USUARIO INGRESA A TABLA DETALLE INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('99','2022-12-08 21:32:59','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('100','2022-12-08 21:33:07','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('101','2022-12-08 21:33:35','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('102','2022-12-08 21:34:17','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('103','2022-12-08 21:34:24','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('104','2022-12-08 21:34:39','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('105','2022-12-08 21:34:46','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('106','2022-12-08 21:34:51','1','3','INGRESO','EL USUARIO INGRESA A TABLA INVENTARIO');
INSERT INTO `tbl_bitacora` VALUES('107','2022-12-08 21:34:55','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('108','2022-12-08 21:35:15','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('109','2022-12-08 21:35:21','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('110','2022-12-08 21:41:04','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('111','2022-12-08 21:41:12','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('112','2022-12-08 21:41:16','1','3','INGRESO','EL USUARIO INGRESA A TABLA DETALLE VENTA');
INSERT INTO `tbl_bitacora` VALUES('113','2022-12-08 21:41:18','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('114','2022-12-08 21:42:23','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('115','2022-12-08 21:42:27','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('116','2022-12-08 21:43:56','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('117','2022-12-08 21:44:32','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('118','2022-12-08 21:48:10','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('119','2022-12-08 21:50:48','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('120','2022-12-08 21:51:06','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('121','2022-12-08 21:51:18','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('122','2022-12-08 21:54:22','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('123','2022-12-08 21:54:31','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('124','2022-12-08 21:56:17','1','3','INGRESO','EL USUARIO INGRESA A TABLA DETALLE VENTA');
INSERT INTO `tbl_bitacora` VALUES('125','2022-12-08 21:56:19','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('126','2022-12-08 21:56:42','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('127','2022-12-08 21:56:53','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('128','2022-12-08 21:56:55','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('129','2022-12-08 21:56:59','1','3','INGRESO','EL USUARIO INGRESA A TABLA DETALLE VENTA');
INSERT INTO `tbl_bitacora` VALUES('130','2022-12-08 21:57:05','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('131','2022-12-08 21:57:07','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('132','2022-12-08 21:59:23','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('133','2022-12-08 22:00:38','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('134','2022-12-08 22:00:54','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('135','2022-12-08 22:02:39','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('136','2022-12-08 22:02:51','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('137','2022-12-08 22:03:21','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('138','2022-12-08 22:03:32','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('139','2022-12-08 22:05:11','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('140','2022-12-08 22:05:51','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('141','2022-12-08 22:05:56','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('142','2022-12-08 22:07:05','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('143','2022-12-08 22:15:33','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('144','2022-12-08 22:17:10','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('145','2022-12-08 22:17:17','1','1','INGRESO','EL USUARIO INICIA SESION');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_cai`
--
INSERT INTO `tbl_cai` VALUES('1','000-001-01-00000001','000-001-01-00000050','000-001-01-00000025','38701E-E0FB79-B14F87-6AF16B-DEE6D5-0A','2022-11-23','1');
INSERT INTO `tbl_cai` VALUES('2','0000010100000051','0000010100000099','10100000083','38701A-E0FB79-B14F87-6AF16B-DEE6D5-0B','2023-02-02','1');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_categoria`
--
INSERT INTO `tbl_categoria` VALUES('1','1','prueba');
INSERT INTO `tbl_categoria` VALUES('3','0','ACHOTE');
INSERT INTO `tbl_categoria` VALUES('10','1','VINO TROPICAL');
INSERT INTO `tbl_categoria` VALUES('12','1','VINO AZUL');
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
) ENGINE=InnoDB AUTO_INCREMENT=402 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_detalle_factura`
--
INSERT INTO `tbl_detalle_factura` VALUES('389','223','4','5','110.00','82.50');
INSERT INTO `tbl_detalle_factura` VALUES('390','224','1','7','120.00','126.00');
INSERT INTO `tbl_detalle_factura` VALUES('391','225','5','8','21.67','26.00');
INSERT INTO `tbl_detalle_factura` VALUES('399','220','10','1','80.00','12.00');
INSERT INTO `tbl_detalle_factura` VALUES('400','230','10','2','80.00','24.00');
INSERT INTO `tbl_detalle_factura` VALUES('401','230','10','5','80.00','60.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

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
INSERT INTO `tbl_detalle_ingreso_producto` VALUES('11','10','6','30','20.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_empleados`
--
INSERT INTO `tbl_empleados` VALUES('1','ADMINISTRADOR','ADMINISTRADOR','1');
INSERT INTO `tbl_empleados` VALUES('2','INFORMATICA','INFORMATICA','1');

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
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_factura`
--
INSERT INTO `tbl_factura` VALUES('220','2022-12-01 13:57:46','960.00','144.00','1104.00','17','1','1','38701A-E0FB79-B14F87-6AF16B-DEE6D5-0B','10100000081','');
INSERT INTO `tbl_factura` VALUES('230','2022-12-08 15:49:46','410.32','12.00','420.32','3','1','1','38701A-E0FB79-B14F87-6AF16B-DEE6D5-0B','10100000083','');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_ingreso_producto`
--
INSERT INTO `tbl_ingreso_producto` VALUES('1','1','1','600.00','0.20','720.00','2022-11-23 16:11:56','');
INSERT INTO `tbl_ingreso_producto` VALUES('6','1','1','600.00','0.15','690.00','2022-12-08 21:31:31','');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_inventario`
--
INSERT INTO `tbl_inventario` VALUES('1','1','-239');
INSERT INTO `tbl_inventario` VALUES('10','10','6');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_kardex`
--
INSERT INTO `tbl_kardex` VALUES('1','1','10','30','1','2022-12-08 21:31:31');
INSERT INTO `tbl_kardex` VALUES('2','2','10','5','1','2022-12-08 21:33:35');
INSERT INTO `tbl_kardex` VALUES('3','2','10','3','1','2022-12-08 21:35:15');
INSERT INTO `tbl_kardex` VALUES('4','2','10','8','1','2022-12-08 21:43:55');
INSERT INTO `tbl_kardex` VALUES('5','2','10','1','1','2022-12-08 21:48:09');
INSERT INTO `tbl_kardex` VALUES('6','2','10','2','1','2022-12-08 21:51:05');
INSERT INTO `tbl_kardex` VALUES('7','2','10','5','1','2022-12-08 21:56:42');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_lote`
--
INSERT INTO `tbl_lote` VALUES('1','VINO','8','1');
INSERT INTO `tbl_lote` VALUES('2','FRUTOS SECOS','10','2');
INSERT INTO `tbl_lote` VALUES('3','OTROS','10','3');

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
INSERT INTO `tbl_modulos` VALUES('9','Inventario','inventario','8','../src/Inventario.php');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

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
INSERT INTO `tbl_preguntas_usuario` VALUES('1','1','ADMIN');
INSERT INTO `tbl_preguntas_usuario` VALUES('3','1','ADMIN');
INSERT INTO `tbl_preguntas_usuario` VALUES('1','1','ADMIN');
INSERT INTO `tbl_preguntas_usuario` VALUES('3','1','ADMIN');
INSERT INTO `tbl_preguntas_usuario` VALUES('1','2','informatica');
INSERT INTO `tbl_preguntas_usuario` VALUES('2','2','informatica');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_producto`
--
INSERT INTO `tbl_producto` VALUES('2','1','1','VINO BLANCO','75.00','5','70','700','1');
INSERT INTO `tbl_producto` VALUES('10','12','1','VINO AZUL','80.00','6','5','20','1');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_tokens`
--
INSERT INTO `tbl_tokens` VALUES('24','d822d4646518777bed1ecbc12e14c3f0','2022-10-13 21:18:12','2022-10-14 21:18:12','28');
INSERT INTO `tbl_tokens` VALUES('35','e90b8647ec708c4710c6a9c94a929d9c','2022-12-08 19:39:18','2022-12-09 19:39:18','2');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tbl_usuario`
--
INSERT INTO `tbl_usuario` VALUES('1','ADMIN','garciainversiones.ig2022@gmail.com','ADMIN','admin321@','2','2022-12-08 00:00:00','2','1','2022-10-13','1','1');
INSERT INTO `tbl_usuario` VALUES('2','INFORMATICA','fran5barri@yahoo.es','INFORMATICA','Informatica@@33','9','2022-12-08 00:00:00','2','1','2023-12-30','1','2');

--
-- Estructura de la tabla `tipo_categoria`
--
DROP TABLE IF EXISTS tipo_categoria;
CREATE TABLE `tipo_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Registros de la tabla `tipo_producto`
--
INSERT INTO `tipo_producto` VALUES('1','VINO');
INSERT INTO `tipo_producto` VALUES('2','FRUTOS SECOS');
INSERT INTO `tipo_producto` VALUES('3','OTROS');

-- --------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 1;

-- --------------------------------------------------------
