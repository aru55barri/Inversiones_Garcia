-- Respaldo de la base de datos Inversiones Garcia
-- Fecha: 2022-11-15 11:24:46
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
  `accion` varchar(20) NOT NULL,
  `descripcion` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_objeto` (`id_objeto`),
  KEY `id_usuario_2` (`id_usuario`),
  CONSTRAINT `tbl_bitacora_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_bitacora`
--
INSERT INTO `tbl_bitacora` VALUES('1','2022-11-14 18:22:18','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('2','2022-11-14 18:23:33','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('3','2022-11-14 18:23:46','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('4','2022-11-14 18:23:50','1','4','ELIMINAR','USUARIO ELIMINADO DE LA TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('5','2022-11-14 18:23:51','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('6','2022-11-14 18:24:33','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('7','2022-11-14 18:27:46','1','3','NUEVO','SE CREA NUEVO REGISTRO EN EMPLEADOS');
INSERT INTO `tbl_bitacora` VALUES('8','2022-11-14 18:27:58','1','3','NUEVO','SE CREA NUEVO REGISTRO EN EMPLEADOS');
INSERT INTO `tbl_bitacora` VALUES('9','2022-11-14 18:27:59','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('10','2022-11-14 18:28:06','1','4','ELIMINAR','USUARIO ELIMINADO DE LA TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('11','2022-11-14 18:28:08','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('12','2022-11-14 18:31:13','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('13','2022-11-14 18:31:18','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('14','2022-11-14 18:32:28','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('15','2022-11-14 18:38:05','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('16','2022-11-14 18:38:45','7','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('17','2022-11-14 18:38:53','7','2','INGRESAR PREGUNTAS','EL USUARIO INGRESA PREGUNTAS DE SEGURIDAD');
INSERT INTO `tbl_bitacora` VALUES('18','2022-11-14 18:39:01','7','2','INGRESAR PREGUNTAS','EL USUARIO INGRESA PREGUNTAS DE SEGURIDAD');
INSERT INTO `tbl_bitacora` VALUES('19','2022-11-14 18:39:30','7','2','ACTUALIZAR','EL USUARIO ACTUALIZA LA CONTRASEÑA');
INSERT INTO `tbl_bitacora` VALUES('20','2022-11-14 18:39:30','7','2','ACTUALIZAR','EL USUARIO ACTUALIZA LA CONTRASEÑA');
INSERT INTO `tbl_bitacora` VALUES('21','2022-11-14 18:39:55','7','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('22','2022-11-14 18:40:07','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('23','2022-11-14 18:40:10','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('24','2022-11-14 18:40:27','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('25','2022-11-14 18:41:44','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('26','2022-11-14 18:41:54','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('27','2022-11-14 18:42:03','1','5','INACTIVO','USUARIO NO SE PUEDE ELIMINAR PASA A QUEDAR INACTIVO');
INSERT INTO `tbl_bitacora` VALUES('28','2022-11-14 18:42:05','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('29','2022-11-15 10:17:41','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('30','2022-11-15 10:19:45','1','33','REGISTRO','SE CREO UN NUEVO REGISTRO EN CLIENTES');
INSERT INTO `tbl_bitacora` VALUES('31','2022-11-15 10:24:00','1','2','INGRESO','EL USUARIO INGRESA A TABLA USUARIOS');
INSERT INTO `tbl_bitacora` VALUES('32','2022-11-15 10:35:29','1','33','REGISTRO','SE EDITO UN CLIENTE');
INSERT INTO `tbl_bitacora` VALUES('33','2022-11-15 10:38:59','1','33','REGISTRO','SE ELIMINO UN CLIENTE');
INSERT INTO `tbl_bitacora` VALUES('34','2022-11-15 10:40:48','1','33','REGISTRO','SE ELIMINO UN CLIENTE');
INSERT INTO `tbl_bitacora` VALUES('35','2022-11-15 10:41:40','1','33','REGISTRO','SE CREO UN NUEVO REGISTRO EN CLIENTES');
INSERT INTO `tbl_bitacora` VALUES('36','2022-11-15 10:41:50','1','33','REGISTRO','SE ELIMINO UN CLIENTE');
INSERT INTO `tbl_bitacora` VALUES('37','2022-11-15 10:44:51','1','33','REGISTRO','SE CREO UN NUEVO REGISTRO EN CLIENTES');
INSERT INTO `tbl_bitacora` VALUES('38','2022-11-15 10:44:59','1','33','REGISTRO','SE ELIMINO UN CLIENTE');
INSERT INTO `tbl_bitacora` VALUES('39','2022-11-15 10:46:52','1','33','REGISTRO','SE CREO UN NUEVO REGISTRO EN CLIENTES');
INSERT INTO `tbl_bitacora` VALUES('40','2022-11-15 10:47:22','1','33','REGISTRO','SE ELIMINO UN CLIENTE');
INSERT INTO `tbl_bitacora` VALUES('41','2022-11-15 10:49:08','1','1','INGRESO','EL USUARIO INICIA SESION');
INSERT INTO `tbl_bitacora` VALUES('42','2022-11-15 10:49:39','1','33','REGISTRO','SE CREO UN NUEVO REGISTRO EN CLIENTES');
INSERT INTO `tbl_bitacora` VALUES('43','2022-11-15 10:49:47','1','33','REGISTRO','SE ELIMINO UN CLIENTE');

--
-- Estructura de la tabla `tbl_cai`
--
DROP TABLE IF EXISTS tbl_cai;
CREATE TABLE `tbl_cai` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rango_inicial` int NOT NULL,
  `rango_final` int NOT NULL,
  `rango_actual` int NOT NULL,
  `numero_CAI` int NOT NULL,
  `fecha_vencimiento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_cai`
--

--
-- Estructura de la tabla `tbl_cargos`
--
DROP TABLE IF EXISTS tbl_cargos;
CREATE TABLE `tbl_cargos` (
  `ID_CARGO` int NOT NULL AUTO_INCREMENT,
  `DESCRIPCION_CARGO` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_CARGO`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `descripcion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo_categ` (`id_tipo_categ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_categoria`
--

--
-- Estructura de la tabla `tbl_cliente`
--
DROP TABLE IF EXISTS tbl_cliente;
CREATE TABLE `tbl_cliente` (
  `idcliente` int NOT NULL AUTO_INCREMENT,
  `DNI` varchar(18) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `RTN` varchar(14) DEFAULT NULL,
  `direccion` varchar(200) NOT NULL,
  `usuario_id` int NOT NULL,
  PRIMARY KEY (`idcliente`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_cliente`
--
INSERT INTO `tbl_cliente` VALUES('3','0801198906578','MARIA BARRI','32557614','08011989065784','COL KENNEDY, CALLE ','1');

--
-- Estructura de la tabla `tbl_descuento`
--
DROP TABLE IF EXISTS tbl_descuento;
CREATE TABLE `tbl_descuento` (
  `id_Descuento` int NOT NULL AUTO_INCREMENT,
  `nombre_descuento` varchar(50) NOT NULL,
  `descripcion_descuento` varchar(50) NOT NULL,
  `procentaje_descuento` double(9,2) NOT NULL,
  PRIMARY KEY (`id_Descuento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `Cantidad` int NOT NULL,
  `precio` int NOT NULL,
  PRIMARY KEY (`id_detalleFac`),
  KEY `id_producto` (`codproducto`,`id_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_detalle_factura`
--

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
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ingreso` (`id_ingreso`),
  KEY `id_producto` (`codproducto`),
  KEY `codproducto` (`codproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_detalle_ingreso_producto`
--

--
-- Estructura de la tabla `tbl_empleados`
--
DROP TABLE IF EXISTS tbl_empleados;
CREATE TABLE `tbl_empleados` (
  `ID_EMPLEADO` int NOT NULL AUTO_INCREMENT,
  `NOMBRE_EMPLEADO` varchar(30) NOT NULL,
  `APELLIDO_EMPLEADO` varchar(30) NOT NULL,
  `ID_CARGO` int NOT NULL,
  PRIMARY KEY (`ID_EMPLEADO`),
  KEY `FKIDCARGO` (`ID_CARGO`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

--
-- Estructura de la tabla `tbl_estado`
--
DROP TABLE IF EXISTS tbl_estado;
CREATE TABLE `tbl_estado` (
  `id_estado` int NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  `id_factura` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_factura` (`id_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_estado_factura`
--

--
-- Estructura de la tabla `tbl_factura`
--
DROP TABLE IF EXISTS tbl_factura;
CREATE TABLE `tbl_factura` (
  `id_factura` int NOT NULL AUTO_INCREMENT,
  `Nombre_Cliente` varchar(50) DEFAULT NULL,
  `Telefono` int NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `RTN` varchar(100) NOT NULL,
  `SubTotal` double(9,2) NOT NULL,
  `ISV` double(9,2) NOT NULL,
  `porcentaje_ISV` double(9,2) NOT NULL,
  `Total` double(9,2) NOT NULL,
  `idcliente` int NOT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `idcliente` (`idcliente`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_factura`
--

--
-- Estructura de la tabla `tbl_hist_contrasenha`
--
DROP TABLE IF EXISTS tbl_hist_contrasenha;
CREATE TABLE `tbl_hist_contrasenha` (
  `id_hist` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `contraseña` varchar(15) NOT NULL,
  PRIMARY KEY (`id_hist`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_lote` (`id_lote`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_ingreso_producto`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_inventario`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_kardex`
--

--
-- Estructura de la tabla `tbl_lote`
--
DROP TABLE IF EXISTS tbl_lote;
CREATE TABLE `tbl_lote` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) DEFAULT NULL,
  `cantidad` int NOT NULL,
  `id_tipo_producto` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo_producto` (`id_tipo_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_lote`
--

--
-- Estructura de la tabla `tbl_modulos`
--
DROP TABLE IF EXISTS tbl_modulos;
CREATE TABLE `tbl_modulos` (
  `id_objeto` int NOT NULL AUTO_INCREMENT,
  `Objeto` varchar(50) NOT NULL,
  `descripcion_objeto` varchar(30) NOT NULL,
  `id_padre` int NOT NULL,
  `URL` varchar(100) NOT NULL,
  PRIMARY KEY (`id_objeto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_modulos`
--

--
-- Estructura de la tabla `tbl_movimiento`
--
DROP TABLE IF EXISTS tbl_movimiento;
CREATE TABLE `tbl_movimiento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_movimiento` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_movimiento`
--

--
-- Estructura de la tabla `tbl_parametros`
--
DROP TABLE IF EXISTS tbl_parametros;
CREATE TABLE `tbl_parametros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parametro` varchar(50) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `id_usuario` int NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Modificado_por` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
INSERT INTO `tbl_permisos` VALUES('84','9','1','1','1','1','12','1');
INSERT INTO `tbl_permisos` VALUES('85','9','1','1','1','1','16','1');

--
-- Estructura de la tabla `tbl_preguntas`
--
DROP TABLE IF EXISTS tbl_preguntas;
CREATE TABLE `tbl_preguntas` (
  `id_pregunta` int NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(80) NOT NULL,
  PRIMARY KEY (`id_pregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `respuesta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `descripcion` varchar(200) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `existencia` int NOT NULL,
  `cantidad_minima` int NOT NULL,
  `cantidad_maxima` int NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`codproducto`),
  KEY `id_categoria` (`id_categoria`,`id_tipo_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_producto`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_promocion_factura`
--

--
-- Estructura de la tabla `tbl_promociones`
--
DROP TABLE IF EXISTS tbl_promociones;
CREATE TABLE `tbl_promociones` (
  `id_promociones` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `precio` int NOT NULL,
  `Fecha Inicio` datetime NOT NULL,
  `Fecha Final` datetime NOT NULL,
  PRIMARY KEY (`id_promociones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_promociones`
--

--
-- Estructura de la tabla `tbl_roles`
--
DROP TABLE IF EXISTS tbl_roles;
CREATE TABLE `tbl_roles` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `rol` text NOT NULL,
  `descripcion` text,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_roles`
--
INSERT INTO `tbl_roles` VALUES('1','super usuario','Es el usuario mayor','0');
INSERT INTO `tbl_roles` VALUES('2','administrador','Es el usuario administrador del sistema','0');
INSERT INTO `tbl_roles` VALUES('3','Cajero','Es el usuario de ventas','0');
INSERT INTO `tbl_roles` VALUES('4','Sin asignar','Usuario sin un rol','0');

--
-- Estructura de la tabla `tbl_roles_objetos`
--
DROP TABLE IF EXISTS tbl_roles_objetos;
CREATE TABLE `tbl_roles_objetos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_rol` int NOT NULL,
  `id_objeto` int NOT NULL,
  `permiso_insercion` varchar(20) NOT NULL,
  `permiso_eliminacion` varchar(20) NOT NULL,
  `permiso_actualizacion` varchar(20) NOT NULL,
  `fecha_cracion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(25) NOT NULL,
  `fecha_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modificado_por` varchar(25) NOT NULL,
  `permiso_consultar` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_roles_objetos`
--

--
-- Estructura de la tabla `tbl_tokens`
--
DROP TABLE IF EXISTS tbl_tokens;
CREATE TABLE `tbl_tokens` (
  `ID_TOKEN` int NOT NULL AUTO_INCREMENT,
  `TOKEN` varchar(45) NOT NULL,
  `FECHA_INICIO` datetime DEFAULT NULL,
  `FECHA_FINALIZACION` datetime DEFAULT NULL,
  `ID_USUARIO` int DEFAULT NULL,
  PRIMARY KEY (`ID_TOKEN`),
  KEY `ID_USUARIO_TOKEN_idx` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(50) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tbl_usuario`
--
INSERT INTO `tbl_usuario` VALUES('1','ADMIN','inversionesgarcia@tusarticulosdemadera.com','ADMIN','admin321','2','2022-11-15 00:00:00','2','1','2022-10-13','1','1');
INSERT INTO `tbl_usuario` VALUES('3','aru bar','fran5barri@hotmail.es','ARU','Tupapiariel@@77','1','2022-10-13 00:00:00','0','1','2022-09-23','1','1');
INSERT INTO `tbl_usuario` VALUES('7','ana cruz','ar@hotmeil.es','ana','anacruz@@1994','2','2022-11-14 18:42:03','0','1','2022-09-24','2','51');
INSERT INTO `tbl_usuario` VALUES('9','Say valle','fra@hot.es','SAYRTA','456','3','2022-11-14 18:40:24','2','1','2022-09-25','1','12');
INSERT INTO `tbl_usuario` VALUES('26','INFORMATICA','fran5barri@yahoo.es','INFORMATICA','Informatica@@66','2','2022-11-04 00:00:00','2','1','2023-12-02','3','53');

--
-- Estructura de la tabla `tipo_categoria`
--
DROP TABLE IF EXISTS tipo_categoria;
CREATE TABLE `tipo_categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tipo_categoria`
--

--
-- Estructura de la tabla `tipo_producto`
--
DROP TABLE IF EXISTS tipo_producto;
CREATE TABLE `tipo_producto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Registros de la tabla `tipo_producto`
--

-- --------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 1;

-- --------------------------------------------------------
