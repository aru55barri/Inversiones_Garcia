-- Respaldo de la base de datos Inversiones Garcia
-- Fecha: 2022-11-28 11:00:12
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
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_bitacora`
--
INSERT INTO `tbl_bitacora` VALUES('1','2022-11-24 18:01:15','1','3','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('2','2022-11-24 18:02:07','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('3','2022-11-24 18:02:23','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('4','2022-11-24 18:04:21','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('5','2022-11-24 18:12:23','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('6','2022-11-24 18:15:18','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('7','2022-11-24 18:18:14','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('8','2022-11-24 18:23:16','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('9','2022-11-24 18:24:21','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('10','2022-11-24 18:26:50','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('11','2022-11-24 18:52:27','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('12','2022-11-24 21:51:32','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('13','2022-11-24 21:51:41','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('14','2022-11-24 22:01:21','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('15','2022-11-24 22:10:15','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('16','2022-11-24 22:21:57','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('17','2022-11-24 22:24:04','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('18','2022-11-24 22:24:16','1','3','INGRESO','EL USUARIO INGRESA A TABLA DETALLE VENTA');
INSERT INTO `tbl_bitacora` VALUES('19','2022-11-24 22:24:22','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('20','2022-11-24 22:49:59','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('21','2022-11-24 22:50:17','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('22','2022-11-24 22:51:12','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('23','2022-11-24 22:52:20','1','7','ELIMINAR','SE ELIMINO UN PRODUCTO ');
INSERT INTO `tbl_bitacora` VALUES('24','2022-11-24 22:52:21','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('25','2022-11-24 22:58:57','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('26','2022-11-24 23:00:14','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('27','2022-11-24 23:00:33','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('28','2022-11-24 23:00:45','1','3','INGRESO','EL USUARIO INGRESA A TABLA INVENTARIO');
INSERT INTO `tbl_bitacora` VALUES('29','2022-11-24 23:00:55','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('30','2022-11-24 23:02:23','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('31','2022-11-24 23:03:35','1','3','INGRESO','EL USUARIO INGRESA A TABLA DETALLE INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('32','2022-11-24 23:03:45','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('33','2022-11-24 23:03:53','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('34','2022-11-24 23:04:38','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('35','2022-11-24 23:05:08','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('36','2022-11-24 23:05:13','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('37','2022-11-24 23:05:25','1','3','INGRESO','EL USUARIO INGRESA A TABLA INVENTARIO');
INSERT INTO `tbl_bitacora` VALUES('38','2022-11-24 23:06:09','1','2','INGRESO','EL USUARIO INGRESA A TABLA OBJETOS');
INSERT INTO `tbl_bitacora` VALUES('39','2022-11-24 23:06:15','1','3','INGRESO','EL USUARIO INGRESA A TABLA INVENTARIO');
INSERT INTO `tbl_bitacora` VALUES('40','2022-11-24 23:06:44','1','3','INGRESO','EL USUARIO INGRESA A TABLA INVENTARIO');
INSERT INTO `tbl_bitacora` VALUES('41','2022-11-24 23:09:36','1','3','INGRESO','EL USUARIO INGRESA A TABLA INVENTARIO');
INSERT INTO `tbl_bitacora` VALUES('42','2022-11-24 23:09:45','1','2','INGRESO','EL USUARIO INGRESA A TABLA OBJETOS');
INSERT INTO `tbl_bitacora` VALUES('43','2022-11-24 23:10:01','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('44','2022-11-24 23:10:08','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('45','2022-11-24 23:10:45','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('46','2022-11-24 23:10:58','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('47','2022-11-24 23:11:09','1','3','INGRESO','EL USUARIO INGRESA A TABLA INVENTARIO');
INSERT INTO `tbl_bitacora` VALUES('48','2022-11-24 23:11:15','1','2','INGRESO','EL USUARIO INGRESA A TABLA OBJETOS');
INSERT INTO `tbl_bitacora` VALUES('49','2022-11-24 23:11:27','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('50','2022-11-24 23:11:36','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('51','2022-11-24 23:12:20','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('52','2022-11-24 23:13:16','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('53','2022-11-24 23:13:41','1','7','ELIMINAR','SE ELIMINO UN PRODUCTO ');
INSERT INTO `tbl_bitacora` VALUES('54','2022-11-24 23:13:45','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('55','2022-11-24 23:13:59','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('56','2022-11-24 23:24:19','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('57','2022-11-24 23:24:49','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('58','2022-11-24 23:25:10','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('59','2022-11-24 23:25:50','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('60','2022-11-24 23:26:12','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('61','2022-11-24 23:40:05','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('62','2022-11-25 10:22:01','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('63','2022-11-25 10:36:51','1','27','REGISTRO','SE CREO UN NUEVO REGISTRO EN PARAMETROS');
INSERT INTO `tbl_bitacora` VALUES('64','2022-11-25 10:40:02','1','33','REGISTRO','SE CREO UN NUEVO REGISTRO EN PARAMETROS');
INSERT INTO `tbl_bitacora` VALUES('65','2022-11-25 10:40:08','1','33','REGISTRO','SE ELIMINO UN PARAMETRO');
INSERT INTO `tbl_bitacora` VALUES('66','2022-11-25 11:01:02','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('67','2022-11-25 11:01:58','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('68','2022-11-25 11:02:02','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('69','2022-11-25 11:04:02','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('70','2022-11-25 11:04:45','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('71','2022-11-25 11:06:14','1','3','INGRESO','EL USUARIO INGRESA A TABLA INVENTARIO');
INSERT INTO `tbl_bitacora` VALUES('72','2022-11-25 11:09:06','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('73','2022-11-25 11:09:34','1','3','INGRESO','EL USUARIO INGRESA A TABLA INVENTARIO');
INSERT INTO `tbl_bitacora` VALUES('74','2022-11-25 11:13:00','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('75','2022-11-25 11:14:25','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('76','2022-11-25 11:34:16','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('77','2022-11-25 11:34:56','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('78','2022-11-25 11:35:53','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('79','2022-11-25 11:36:38','1','3','INGRESO','EL USUARIO INGRESA A TABLA INVENTARIO');
INSERT INTO `tbl_bitacora` VALUES('80','2022-11-25 11:36:56','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('81','2022-11-25 11:37:36','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('82','2022-11-25 11:40:40','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('83','2022-11-25 11:40:55','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('84','2022-11-25 11:42:41','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('85','2022-11-25 11:43:38','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('86','2022-11-25 11:43:43','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('87','2022-11-25 11:43:47','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('88','2022-11-25 11:44:36','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('89','2022-11-25 11:49:49','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('90','2022-11-25 11:50:00','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('91','2022-11-25 11:50:03','1','3','INGRESO','EL USUARIO INGRESA A TABLA DETALLE INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('92','2022-11-25 11:50:06','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('93','2022-11-25 11:50:12','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('94','2022-11-25 11:50:16','1','3','INGRESO','EL USUARIO INGRESA A TABLA DETALLE INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('95','2022-11-25 11:50:43','1','3','INGRESO','EL USUARIO INGRESA A TABLA DETALLE INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('96','2022-11-25 11:50:46','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('97','2022-11-25 11:51:20','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('98','2022-11-25 11:51:26','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('99','2022-11-25 11:52:18','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('100','2022-11-25 11:52:27','1','3','INGRESO','EL USUARIO INGRESA A TABLA DETALLE INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('101','2022-11-25 11:52:30','1','3','INGRESO','EL USUARIO INGRESA A TABLA INGRESO PRODUCTOS');
INSERT INTO `tbl_bitacora` VALUES('102','2022-11-25 14:39:52','1','22','INGRESO','EL USUARIO INGRESA A TABLA CAI');
INSERT INTO `tbl_bitacora` VALUES('103','2022-11-25 15:02:04','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('104','2022-11-25 15:02:19','1','2','INGRESO','EL USUARIO INGRESA A TABLA CLIENTES');
INSERT INTO `tbl_bitacora` VALUES('105','2022-11-25 15:11:46','1','2','INGRESO','EL USUARIO INGRESA A TABLA CLIENTES');
INSERT INTO `tbl_bitacora` VALUES('106','2022-11-25 15:12:53','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('107','2022-11-25 15:32:01','1','29','REGISTRO','SE CREO UN NUEVO REGISTRO ROL');
INSERT INTO `tbl_bitacora` VALUES('108','2022-11-25 15:45:02','1','2','INGRESO','EL USUARIO INGRESA A TABLA CLIENTES');
INSERT INTO `tbl_bitacora` VALUES('109','2022-11-25 15:45:09','1','2','INGRESO','EL USUARIO INGRESA A TABLA CLIENTES');
INSERT INTO `tbl_bitacora` VALUES('110','2022-11-25 15:45:13','1','2','INGRESO','EL USUARIO INGRESA A TABLA CLIENTES');
INSERT INTO `tbl_bitacora` VALUES('111','2022-11-25 15:45:13','1','2','INGRESO','EL USUARIO INGRESA A TABLA CLIENTES');
INSERT INTO `tbl_bitacora` VALUES('112','2022-11-25 15:47:08','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('113','2022-11-25 16:56:46','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('114','2022-11-26 20:59:31','1','2','INGRESO','EL USUARIO INGRESA A TABLA OBJETOS');
INSERT INTO `tbl_bitacora` VALUES('115','2022-11-26 20:59:42','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('116','2022-11-26 21:00:27','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('117','2022-11-26 21:00:33','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('118','2022-11-26 21:00:55','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('119','2022-11-27 20:48:41','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('120','2022-11-27 20:49:29','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('121','2022-11-27 20:51:03','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('122','2022-11-27 20:51:35','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('123','2022-11-28 10:28:51','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('124','2022-11-28 10:29:57','1','2','INGRESO','EL USUARIO INGRESA A TABLA CLIENTES');
INSERT INTO `tbl_bitacora` VALUES('125','2022-11-28 10:30:25','1','2','INGRESO','EL USUARIO INGRESA A TABLA CLIENTES');
INSERT INTO `tbl_bitacora` VALUES('126','2022-11-28 10:36:21','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('127','2022-11-28 10:36:38','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('128','2022-11-28 10:36:45','1','3','INGRESO','EL USUARIO INGRESA A TABLA PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('129','2022-11-28 10:37:50','1','28','EDITAR','SE EDITO UN NUEVO REGISTRO EN PREGUNTAS');
INSERT INTO `tbl_bitacora` VALUES('130','2022-11-28 10:43:21','1','28','REGISTRO','SE CREO UN NUEVO REGISTRO EN ROLES');
INSERT INTO `tbl_bitacora` VALUES('131','2022-11-28 10:43:42','1','28','REGISTRO','SE CREO UN NUEVO REGISTRO EN ROLES');
INSERT INTO `tbl_bitacora` VALUES('132','2022-11-28 10:44:57','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('133','2022-11-28 10:46:55','1','28','REGISTRO','SE CREO UN NUEVO REGISTRO EN PREGUNTAS');
INSERT INTO `tbl_bitacora` VALUES('134','2022-11-28 10:47:13','1','28','EDITAR','SE EDITO UN NUEVO REGISTRO EN PREGUNTAS');
INSERT INTO `tbl_bitacora` VALUES('135','2022-11-28 10:47:20','1','28','ELIMINAR','SE ELIMINO UN NUEVO REGISTRO EN PREGUNTAS');
INSERT INTO `tbl_bitacora` VALUES('136','2022-11-28 10:48:05','1','28','EDITAR','SE EDITO UN NUEVO REGISTRO EN TIPO CATEGORIA');
INSERT INTO `tbl_bitacora` VALUES('137','2022-11-28 10:48:16','1','28','EDITAR','SE EDITO UN NUEVO REGISTRO EN TIPO CATEGORIA');
INSERT INTO `tbl_bitacora` VALUES('138','2022-11-28 10:48:43','1','28','REGISTRO','SE CREO UN NUEVO REGISTRO EN TIPO CATEGORIA');
INSERT INTO `tbl_bitacora` VALUES('139','2022-11-28 10:48:52','1','28','EDITAR','SE EDITO UN NUEVO REGISTRO EN TIPO CATEGORIA');
INSERT INTO `tbl_bitacora` VALUES('140','2022-11-28 10:49:53','1','28','EDITAR','SE EDITO UN NUEVO REGISTRO EN TIPO PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('141','2022-11-28 10:50:01','1','28','EDITAR','SE EDITO UN NUEVO REGISTRO EN TIPO PRODUCTO');
INSERT INTO `tbl_bitacora` VALUES('142','2022-11-28 10:56:42','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');
INSERT INTO `tbl_bitacora` VALUES('143','2022-11-28 10:59:32','1','3','INGRESO','EL USUARIO INGRESA A TABLA VENTAS');

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
  `fecha_vencimiento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_cai`
--
INSERT INTO `tbl_cai` VALUES('1','000-001-01-00000001','000-001-01-00000050','000-001-01-00000025','38701E-E0FB79-B14F87-6AF16B-DEE6D5-0A','2022-11-20 01:05:39','1');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_categoria`
--
INSERT INTO `tbl_categoria` VALUES('1','1','Hogar');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_cliente`
--
INSERT INTO `tbl_cliente` VALUES('3','0','CONSUMIDOR FINAL','0','0','N/A','1');
INSERT INTO `tbl_cliente` VALUES('16','88998','ANNER ISCOA HERNANDEZ','78542','wwedwe','LAS TORRES','1');
INSERT INTO `tbl_cliente` VALUES('17','2354','MANUEL ','963','7777777777777','LAS VENIDERAS','1');
INSERT INTO `tbl_cliente` VALUES('19','6666','YUNI SALAS','6666','6666','MOJIMAN, YORO','1');
INSERT INTO `tbl_cliente` VALUES('23','88998','WALTER SALAMANCA','88888888','99999999999999','MIGUEL JOSUE DE LAS TORRES','1');

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
  PRIMARY KEY (`id_detalleFac`),
  KEY `id_producto` (`codproducto`,`id_factura`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_detalle_factura`
--
INSERT INTO `tbl_detalle_factura` VALUES('2','3','106','8','0.00');
INSERT INTO `tbl_detalle_factura` VALUES('12','2','5','7','22.00');
INSERT INTO `tbl_detalle_factura` VALUES('13','2','3','7','105.87');
INSERT INTO `tbl_detalle_factura` VALUES('14','2','2','4','75.00');
INSERT INTO `tbl_detalle_factura` VALUES('15','13','1','1','120.00');
INSERT INTO `tbl_detalle_factura` VALUES('16','13','3','4','105.87');
INSERT INTO `tbl_detalle_factura` VALUES('47','12','6','4','210.00');
INSERT INTO `tbl_detalle_factura` VALUES('48','13','6','76','210.00');
INSERT INTO `tbl_detalle_factura` VALUES('49','14','6','2','210.00');
INSERT INTO `tbl_detalle_factura` VALUES('50','15','3','7','105.87');
INSERT INTO `tbl_detalle_factura` VALUES('51','16','2','1','75.00');
INSERT INTO `tbl_detalle_factura` VALUES('52','17','4','3','110.00');
INSERT INTO `tbl_detalle_factura` VALUES('53','21','3','2','105.87');
INSERT INTO `tbl_detalle_factura` VALUES('54','22','6','13','210.00');
INSERT INTO `tbl_detalle_factura` VALUES('55','25','6','3','210.00');
INSERT INTO `tbl_detalle_factura` VALUES('56','27','6','3','210.00');
INSERT INTO `tbl_detalle_factura` VALUES('57','28','4','1','110.00');
INSERT INTO `tbl_detalle_factura` VALUES('58','29','8','10','80.00');
INSERT INTO `tbl_detalle_factura` VALUES('59','30','4','2','110.00');
INSERT INTO `tbl_detalle_factura` VALUES('60','31','2','2','75.00');
INSERT INTO `tbl_detalle_factura` VALUES('61','32','3','2','105.87');
INSERT INTO `tbl_detalle_factura` VALUES('62','32','4','2','110.00');
INSERT INTO `tbl_detalle_factura` VALUES('63','33','2','2','75.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_detalle_ingreso_producto`
--
INSERT INTO `tbl_detalle_ingreso_producto` VALUES('1','2','2','6','50.00');
INSERT INTO `tbl_detalle_ingreso_producto` VALUES('2','3','2','2','57.00');
INSERT INTO `tbl_detalle_ingreso_producto` VALUES('3','4','2','5','30.00');
INSERT INTO `tbl_detalle_ingreso_producto` VALUES('4','8','3','100','80.00');
INSERT INTO `tbl_detalle_ingreso_producto` VALUES('5','2','4','30','80.00');
INSERT INTO `tbl_detalle_ingreso_producto` VALUES('6','5','4','5','50.00');

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
  `id_CAI` int DEFAULT NULL,
  `estado` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `idcliente` (`idcliente`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_Tpago` (`id_Tpago`),
  CONSTRAINT `tbl_factura_ibfk_1` FOREIGN KEY (`id_Tpago`) REFERENCES `tbl_tipo_pago` (`id_Tpago`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_factura_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_factura_ibfk_4` FOREIGN KEY (`idcliente`) REFERENCES `tbl_cliente` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_factura`
--
INSERT INTO `tbl_factura` VALUES('2','2022-11-20 01:11:31','140.00','0.15','160.00','3','1','1','1','Cancelado');
INSERT INTO `tbl_factura` VALUES('13','2022-11-21 14:35:27','15960.00','0.15','18354.00','23','1','1','1','Cancelado');
INSERT INTO `tbl_factura` VALUES('16','2022-11-21 14:49:20','75.00','0.15','86.25','3','1','1','1','Cancelado');
INSERT INTO `tbl_factura` VALUES('17','2022-11-21 14:49:42','330.00','0.15','379.50','19','1','3','1','');
INSERT INTO `tbl_factura` VALUES('21','2022-11-21 16:52:46','211.74','0.15','242.76','16','1','1','1','');
INSERT INTO `tbl_factura` VALUES('22','2022-11-21 16:53:51','2730.00','0.15','3139.50','3','1','1','1','');
INSERT INTO `tbl_factura` VALUES('25','2022-11-21 17:50:57','630.00','0.15','724.50','16','1','1','1','Cancelado');
INSERT INTO `tbl_factura` VALUES('27','2022-11-21 18:05:39','630.00','0.15','724.50','3','1','1','1','Cancelado');
INSERT INTO `tbl_factura` VALUES('28','2022-11-21 18:23:57','110.00','0.15','126.50','16','1','2','1','Cancelado');
INSERT INTO `tbl_factura` VALUES('29','2022-11-24 23:10:45','800.00','0.15','920.00','3','1','1','1','');
INSERT INTO `tbl_factura` VALUES('30','2022-11-24 23:40:04','220.00','0.15','253.00','3','1','1','1','');
INSERT INTO `tbl_factura` VALUES('33','2022-11-28 10:59:31','150.00','0.15','172.50','3','1','1','1','');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_ingreso_producto`
--
INSERT INTO `tbl_ingreso_producto` VALUES('1','1','1','600.00','0.20','720.00','2022-11-23 17:11:56','');
INSERT INTO `tbl_ingreso_producto` VALUES('2','1','1','564.00','0.15','676.80','2022-11-24 23:02:19','');
INSERT INTO `tbl_ingreso_producto` VALUES('3','1','1','8000.00','0.15','9600.00','2022-11-24 23:05:07','');
INSERT INTO `tbl_ingreso_producto` VALUES('4','1','1','2650.00','0.15','3180.00','2022-11-25 11:52:17','');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_inventario`
--
INSERT INTO `tbl_inventario` VALUES('1','1','87');
INSERT INTO `tbl_inventario` VALUES('2','2','42');
INSERT INTO `tbl_inventario` VALUES('3','3','34');
INSERT INTO `tbl_inventario` VALUES('4','4','19');
INSERT INTO `tbl_inventario` VALUES('5','5','76');
INSERT INTO `tbl_inventario` VALUES('6','6','64');
INSERT INTO `tbl_inventario` VALUES('7','7','0');
INSERT INTO `tbl_inventario` VALUES('8','8','90');

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
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
INSERT INTO `tbl_kardex` VALUES('73','2','4','2','1','2022-11-24 23:40:04');
INSERT INTO `tbl_kardex` VALUES('74','1','5','7','1','2022-11-25 11:34:55');
INSERT INTO `tbl_kardex` VALUES('75','1','2','30','1','2022-11-25 11:52:17');
INSERT INTO `tbl_kardex` VALUES('76','1','5','5','1','2022-11-25 11:52:17');
INSERT INTO `tbl_kardex` VALUES('77','2','2','2','1','2022-11-26 21:00:54');
INSERT INTO `tbl_kardex` VALUES('78','2','3','2','1','2022-11-27 20:51:03');
INSERT INTO `tbl_kardex` VALUES('79','2','4','2','1','2022-11-27 20:51:03');
INSERT INTO `tbl_kardex` VALUES('80','2','2','2','1','2022-11-28 10:59:31');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_lote`
--
INSERT INTO `tbl_lote` VALUES('1','VINO','8','1');
INSERT INTO `tbl_lote` VALUES('2','FRUTOS','8','2');

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
INSERT INTO `tbl_modulos` VALUES('10','Ingreso de Producto','inventario','8','../src/Inventario_materia.php');
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
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_parametros`
--
INSERT INTO `tbl_parametros` VALUES('1','nombre','Inversiones Garcia','1','2022-10-02','2022-10-02');
INSERT INTO `tbl_parametros` VALUES('2','correo','inversionesgarcia@gmail.com','1','2022-10-02','2022-10-02');
INSERT INTO `tbl_parametros` VALUES('5','intentos_fallidos','2','1','2022-10-02','2022-10-02');
INSERT INTO `tbl_parametros` VALUES('6','max_contrasena','25','1','2022-10-02','2022-10-02');
INSERT INTO `tbl_parametros` VALUES('7','num_preguntas','2','1','2022-10-02','2022-10-02');
INSERT INTO `tbl_parametros` VALUES('8','horas_vigencia_correo','24','1','2022-10-12','2022-10-12');
INSERT INTO `tbl_parametros` VALUES('9','fecha_de_vencimiento','6','1','2022-10-17','2022-10-17');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_producto`
--
INSERT INTO `tbl_producto` VALUES('1','1','1','PALA MD','120.00','87','1','6','1');
INSERT INTO `tbl_producto` VALUES('2','1','1','VINO BLANCO','75.00','42','2','4','1');
INSERT INTO `tbl_producto` VALUES('3','1','1','VINO ROJO','105.87','34','1','4','1');
INSERT INTO `tbl_producto` VALUES('4','1','1','VINO DE UVA','110.00','19','1','4','1');
INSERT INTO `tbl_producto` VALUES('5','1','1','VINO DE CAFE','21.67','76','1','9','1');

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
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tbl_roles`
--
INSERT INTO `tbl_roles` VALUES('1','super usuario','Es el usuario mayor');
INSERT INTO `tbl_roles` VALUES('2','administrador','Es el usuario administrador del sistema');
INSERT INTO `tbl_roles` VALUES('3','Cajero','Es el usuario de ventas');
INSERT INTO `tbl_roles` VALUES('4','Sin asignar','Usuario sin un rol');
INSERT INTO `tbl_roles` VALUES('9','Ventas','Usuario de ventas');
INSERT INTO `tbl_roles` VALUES('13','ASEADORA','ASEO');

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
INSERT INTO `tbl_tokens` VALUES('31','c2a6f54d3b29ea7781b4a2c1636787a4','2022-11-27 21:10:44','2022-11-28 21:10:44','3');
INSERT INTO `tbl_tokens` VALUES('32','a1aecb0c487a7e87fd70bbe49177c5ec','2022-11-27 21:16:54','2022-11-28 21:16:54','3');

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
INSERT INTO `tbl_usuario` VALUES('1','ADMIN','inversionesgarcia2022@gmail.com','ADMIN','admin321','2','2022-11-28 00:00:00','2','1','2022-10-13','1','1');
INSERT INTO `tbl_usuario` VALUES('3','aru bar','fran5barri@hotmail.es','ARU','Tupapiariel@@77','1','2022-10-13 00:00:00','0','1','2022-09-23','1','1');
INSERT INTO `tbl_usuario` VALUES('7','ana cruz','ar@hotmeil.es','ana','anacruz@@1994','2','2022-11-14 18:42:03','0','1','2022-09-24','2','51');
INSERT INTO `tbl_usuario` VALUES('9','Say valle','fra@hot.es','SAYRTA','Sayojole@@33','9','2022-11-24 00:00:00','2','1','2022-09-25','1','12');

--
-- Estructura de la tabla `tipo_categoria`
--
DROP TABLE IF EXISTS tipo_categoria;
CREATE TABLE `tipo_categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Registros de la tabla `tipo_categoria`
--
INSERT INTO `tipo_categoria` VALUES('1','VINO');
INSERT INTO `tipo_categoria` VALUES('2','FRUTOS SECOS');
INSERT INTO `tipo_categoria` VALUES('3','JABON DE FRUTA');

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
INSERT INTO `tipo_producto` VALUES('1','');
INSERT INTO `tipo_producto` VALUES('2','cajas');

-- --------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 1;

-- --------------------------------------------------------
