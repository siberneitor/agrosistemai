-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2022 a las 19:51:42
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaventas2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono`
--

CREATE TABLE `abono` (
  `id_abono` bigint(10) NOT NULL,
  `fechaAbono` datetime DEFAULT NULL,
  `cantidad` decimal(9,2) DEFAULT NULL,
  `recargo` decimal(9,2) DEFAULT NULL,
  `total` decimal(9,2) DEFAULT NULL,
  `id_detalle_credito` bigint(10) DEFAULT NULL,
  `id_cliente` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `abono`
--

INSERT INTO `abono` (`id_abono`, `fechaAbono`, `cantidad`, `recargo`, `total`, `id_detalle_credito`, `id_cliente`) VALUES
(70, '2022-09-11 17:54:27', '15.00', NULL, '15.00', 110, 16),
(71, '2022-09-12 17:42:33', '50.00', NULL, '50.00', 111, 2),
(72, '2022-11-20 17:59:15', '80.00', NULL, '80.00', 123, 2),
(73, '2022-11-20 18:16:54', '50.00', NULL, '50.00', 111, 2),
(74, '2022-11-20 18:20:14', '30.00', NULL, '30.00', 125, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(10) NOT NULL,
  `nombre_categoria` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'primer categoria'),
(2, 'segunda categoria'),
(3, 'tercer categoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` bigint(20) NOT NULL,
  `nombre` varchar(300) DEFAULT NULL,
  `apellido_paterno` varchar(300) DEFAULT NULL,
  `apellido_materno` varchar(300) DEFAULT NULL,
  `domicilio` varchar(300) DEFAULT NULL,
  `localidad` varchar(300) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `credito_actual` varchar(3) DEFAULT NULL,
  `estatus_credito_actual` varchar(30) DEFAULT NULL,
  `id_credito` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido_paterno`, `apellido_materno`, `domicilio`, `localidad`, `telefono`, `email`, `fecha_alta`, `credito_actual`, `estatus_credito_actual`, `id_credito`) VALUES
(1, 'sinCliente', '', '', '', '', 0, '', NULL, NULL, NULL, NULL),
(2, 'azucena', 'mosso', 'guzman', 'cedros 22 el mirador', 'iztapalapa cdmx', 5556322534, 'azucenamata@gmail.com', NULL, NULL, NULL, NULL),
(3, 'Alfonso', 'Lira', 'Zavaleta', 'Nicolas Bravo', 'Guerrero', 7774398670, 'xboy_@hotmail.com', '2020-07-21 00:00:00', NULL, NULL, NULL),
(4, 'pedro', 'torres', 'guajardo', 'matamoros 22', 'alvaro obregon cdmx', 5546832400, 'pedrotorres@gmail.com', '2020-08-11 20:36:25', NULL, NULL, NULL),
(5, 'alejandra', 'gutierrez', 'dias', 'Vicente Guerrero 34 las villas', 'PUEBLA', 2221649287, 'alejandrabecerra@gmail.com', '2020-08-11 20:43:37', NULL, NULL, NULL),
(7, 'navocodonosor', 'espiricueta', 'rodriguez', 'calle las palmas no 22 colonia lindavista', 'chalco', 5543227890, 'navurodri@gmail.com', '2020-08-12 21:02:42', NULL, NULL, NULL),
(9, 'alfredo', 'palacios', 'gomez', '', '', 0, '', '2020-08-16 15:08:12', NULL, NULL, NULL),
(10, 'angel', 'guzman', 'sevilla', 'san miguel 32', 'cuernavaca', 77765432277, 'angel@gmail.com', '2020-08-19 00:46:49', NULL, NULL, NULL),
(11, 'sergio', 'corona', 'tellez', 'libertad 72', 'iztacalco', 5556324522, 'sergiocorona@gmail.com', '2020-08-19 01:11:09', NULL, NULL, NULL),
(12, 'pedro', 'mota', 'perez', 'domicilio conocido', 'localidad conocida', 73333445172, 'pedrom@gmail.com', '2020-08-19 01:19:21', NULL, NULL, NULL),
(13, 'enrique', 'davis', 'guzman', 'domicilio enrique', 'localidad enrique', 4564564567, 'emailEnrique@gmail.com', '2022-05-24 07:38:05', NULL, NULL, NULL),
(14, 'yumicela', 'perez', 'hernandez', 'domicilio yumicela', 'localidad yumicela', 7657657657, 'email@yumicela.com', '2022-05-24 07:41:13', NULL, NULL, NULL),
(15, 'jose', 'albarran', 'bazquez', 'domiciliuo jose', 'localidad jose', 3453453457, 'emailjose@gmail.com', '2022-05-24 07:44:56', NULL, NULL, NULL),
(16, 'Ian Fernando', 'Lira', 'Mosso', 'matamoros 103', 'huitzuco', 7331080000, 'ferliramosso@gmail.com', '2022-06-07 21:54:51', NULL, NULL, NULL),
(17, 'nobmre890', 'apellido pat 89', 'apellido mat 89', 'domicilio 890', 'localidad 89', 8989898989, 'email89@gmail.com', '2022-09-12 00:43:02', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credito`
--

CREATE TABLE `credito` (
  `id_credito` bigint(20) NOT NULL,
  `montoTotalPrestado` decimal(9,2) DEFAULT NULL,
  `monto_a_pagar` decimal(9,2) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `estatus_credito` int(11) DEFAULT NULL,
  `id_cliente` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credito_old`
--

CREATE TABLE `credito_old` (
  `id_credito` bigint(20) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `dias_plazo` bigint(3) DEFAULT NULL,
  `interes` float DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `monto_prestado` float DEFAULT NULL,
  `monto_total` float DEFAULT NULL,
  `cantidad_abonada` bigint(4) DEFAULT NULL,
  `cantidad_por_pagar` bigint(4) DEFAULT NULL,
  `id_cliente` bigint(20) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `estatus_credito` int(11) DEFAULT NULL,
  `id_venta` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_credito`
--

CREATE TABLE `detalle_credito` (
  `id_detalle_credito` bigint(20) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `dias_plazo` bigint(10) DEFAULT NULL,
  `interes` float DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `monto_prestado` decimal(9,2) DEFAULT NULL,
  `monto_total` decimal(9,2) DEFAULT NULL,
  `cantidad_abonada` decimal(9,2) DEFAULT NULL,
  `cantidad_por_pagar` decimal(9,2) DEFAULT NULL,
  `id_cliente` bigint(20) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `estatus_credito` int(11) DEFAULT NULL,
  `id_venta` bigint(20) DEFAULT NULL,
  `id_credito` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_credito`
--

INSERT INTO `detalle_credito` (`id_detalle_credito`, `fecha_inicio`, `dias_plazo`, `interes`, `fecha_vencimiento`, `monto_prestado`, `monto_total`, `cantidad_abonada`, `cantidad_por_pagar`, `id_cliente`, `fecha_registro`, `estatus_credito`, `id_venta`, `id_credito`) VALUES
(110, '2022-09-12', 140, 0.0712, '2023-01-30', '72.00', '70.00', '2.00', '70.00', 16, '2022-09-12 00:51:17', 1, 201, NULL),
(111, '2022-09-13', 139, 0.0712, '2023-01-30', '209.00', '200.00', '9.00', '200.00', 2, '2022-09-13 00:40:46', 1, 205, NULL),
(112, '2022-10-08', 114, 0.0712, '2023-01-30', '81.00', '80.00', '1.00', '80.00', 13, '2022-10-08 21:07:10', 1, 207, NULL),
(113, '2022-10-08', 114, 0.0712, '2023-01-30', '4.00', '2.00', '2.00', '2.00', 3, '2022-10-08 21:21:09', 1, 209, NULL),
(114, '2022-10-08', 114, 0.0712, '2023-01-30', '98.00', '95.00', '3.00', '95.00', 10, '2022-10-08 21:26:39', 1, 210, NULL),
(115, '2022-11-20', 71, 0.0712, '2023-01-30', '128.00', '100.00', '28.00', '100.00', 10, '2022-11-20 02:03:27', 1, 212, NULL),
(116, '2022-11-20', 71, 0.0712, '2023-01-30', '119.00', '100.00', '19.00', '100.00', 14, '2022-11-20 03:38:52', 1, 213, NULL),
(117, '2022-11-20', 71, 0.0712, '2023-01-30', '141.00', '100.00', '41.00', '100.00', 16, '2022-11-20 04:00:46', 1, 214, NULL),
(118, '2022-11-20', 71, 0.0712, '2023-01-30', '38.00', '30.00', '8.00', '30.00', 7, '2022-11-20 04:09:27', 1, 215, NULL),
(119, '2022-11-20', 71, 0.0712, '2023-01-30', '128.00', '100.00', '28.00', '100.00', 10, '2022-11-20 04:14:57', 1, 216, NULL),
(120, '2022-11-20', 71, 0.0712, '2023-01-30', '264.00', '200.00', '64.00', '200.00', 12, '2022-11-20 04:29:46', 1, 217, NULL),
(121, '2022-11-20', 71, 0.0712, '2023-01-30', '81.00', '80.00', '1.00', '80.00', 16, '2022-11-20 22:37:39', 1, 218, NULL),
(122, '2022-11-20', 71, 0.0712, '2023-01-30', '111.00', '100.00', '11.00', '100.00', 11, '2022-11-20 22:49:28', 1, 219, NULL),
(123, '2022-11-20', 71, 0.0712, '2023-01-30', '85.00', '80.00', '5.00', '80.00', 2, '2022-11-20 22:52:31', 0, 220, NULL),
(124, '2022-11-20', 71, 0.0712, '2023-01-30', '675.00', '600.00', '75.00', '600.00', 10, '2022-11-20 23:05:48', 1, 221, NULL),
(125, '2022-11-20', 71, 0.0712, '2023-01-30', '81.00', '80.00', '1.00', '80.00', 2, '2022-11-20 23:22:06', 1, 222, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detalle` bigint(20) NOT NULL,
  `id_venta` bigint(20) DEFAULT NULL,
  `codigo` bigint(20) DEFAULT NULL,
  `unidades_x_producto` bigint(20) DEFAULT NULL,
  `total_x_producto` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detalle`, `id_venta`, `codigo`, `unidades_x_producto`, `total_x_producto`) VALUES
(327, 200, 1, 1, '30.00'),
(328, 201, 1, 2, '60.00'),
(329, 201, 3, 3, '12.00'),
(330, 202, 1, 1, '30.00'),
(331, 203, 2, 1, '47.00'),
(332, 204, 3, 1, '4.00'),
(333, 205, 1, 2, '60.00'),
(334, 205, 2, 3, '141.00'),
(335, 205, 3, 2, '8.00'),
(336, 206, 1, 1, '30.00'),
(337, 207, 1, 1, '30.00'),
(338, 207, 2, 1, '47.00'),
(339, 207, 3, 1, '4.00'),
(340, 208, 1, 1, '30.00'),
(341, 209, 3, 1, '4.00'),
(342, 210, 2, 2, '94.00'),
(343, 210, 3, 1, '4.00'),
(344, 211, 1, 1, '30.00'),
(345, 212, 1, 1, '30.00'),
(346, 212, 2, 2, '94.00'),
(347, 212, 3, 1, '4.00'),
(348, 213, 1, 2, '60.00'),
(349, 213, 2, 1, '47.00'),
(350, 213, 3, 3, '12.00'),
(351, 214, 2, 3, '141.00'),
(352, 215, 1, 1, '30.00'),
(353, 215, 3, 2, '8.00'),
(354, 216, 1, 4, '120.00'),
(355, 216, 3, 2, '8.00'),
(356, 217, 1, 2, '60.00'),
(357, 217, 2, 4, '188.00'),
(358, 217, 3, 4, '16.00'),
(359, 218, 1, 1, '30.00'),
(360, 218, 2, 1, '47.00'),
(361, 218, 3, 1, '4.00'),
(362, 219, 1, 2, '60.00'),
(363, 219, 2, 1, '47.00'),
(364, 219, 3, 1, '4.00'),
(365, 220, 1, 1, '30.00'),
(366, 220, 2, 1, '47.00'),
(367, 220, 3, 2, '8.00'),
(368, 221, 1, 2, '60.00'),
(369, 221, 2, 13, '611.00'),
(370, 221, 3, 1, '4.00'),
(371, 222, 1, 1, '30.00'),
(372, 222, 2, 1, '47.00'),
(373, 222, 3, 1, '4.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id_gasto` bigint(20) NOT NULL,
  `id_nota_compra` bigint(20) DEFAULT NULL,
  `id_proov` int(10) DEFAULT NULL,
  `total` decimal(9,2) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_credito`
--

CREATE TABLE `historial_credito` (
  `id_historial` bigint(20) NOT NULL,
  `id_abono` bigint(20) DEFAULT NULL,
  `cantidad_por_pagar` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_inventario`
--

CREATE TABLE `historial_inventario` (
  `id_update` bigint(20) NOT NULL,
  `codigo` bigint(20) DEFAULT NULL,
  `new_unidades` bigint(20) DEFAULT NULL,
  `new_costo` decimal(9,2) DEFAULT NULL,
  `new_precio` decimal(9,2) DEFAULT NULL,
  `new_fecha_cad` date DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `new_id_gasto` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial_inventario`
--

INSERT INTO `historial_inventario` (`id_update`, `codigo`, `new_unidades`, `new_costo`, `new_precio`, `new_fecha_cad`, `fecha_ingreso`, `new_id_gasto`) VALUES
(49, 1, 400, '20.00', '30.00', NULL, '2022-09-12', NULL),
(50, 1, 400, '20.00', '30.00', NULL, '2022-09-12', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_pago_creditos`
--

CREATE TABLE `historial_pago_creditos` (
  `id_pago_credito` bigint(20) NOT NULL,
  `id_abono` bigint(20) DEFAULT NULL,
  `id_detalle_credito` bigint(20) DEFAULT NULL,
  `monto_por_pagar` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial_pago_creditos`
--

INSERT INTO `historial_pago_creditos` (`id_pago_credito`, `id_abono`, `id_detalle_credito`, `monto_por_pagar`) VALUES
(66, 70, 110, '55.00'),
(67, 71, 111, '150.00'),
(68, 72, 123, '0.00'),
(69, 73, 111, '100.00'),
(70, 74, 125, '50.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id_ingreso` bigint(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad_inicial` decimal(9,2) DEFAULT NULL,
  `ingresos_del_dia` decimal(9,2) DEFAULT NULL,
  `cantidad_final` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_inv` bigint(10) NOT NULL,
  `codigo` bigint(30) NOT NULL,
  `unidades` bigint(10) DEFAULT NULL,
  `costo` decimal(9,2) DEFAULT NULL,
  `precio` decimal(9,2) DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  `fecha_caducidad` date DEFAULT NULL,
  `id_gasto` bigint(20) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inv`, `codigo`, `unidades`, `costo`, `precio`, `fecha_ingreso`, `fecha_caducidad`, `id_gasto`, `estatus`) VALUES
(44, 1, 373, '20.00', '30.00', '2022-09-11 00:00:00', NULL, NULL, 1),
(45, 3, 23, '3.00', '4.00', '2022-09-12 00:00:00', NULL, NULL, 1),
(46, 2, 26, '45.00', '47.00', '2022-09-12 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventariotempxprod`
--

CREATE TABLE `inventariotempxprod` (
  `id_inv_x_prod` int(11) NOT NULL,
  `codigo` bigint(20) NOT NULL,
  `unidades_temp_inv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(10) NOT NULL,
  `nombre_marca` varchar(200) DEFAULT NULL,
  `id_proov` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre_marca`, `id_proov`) VALUES
(26, 'primer marca', NULL),
(27, 'segunda marca', NULL),
(28, 'tercer marca', NULL),
(29, 'cuarta marca', NULL),
(30, 'quinta marca', NULL),
(31, 'sexta marca', NULL),
(32, 'septima marca', NULL),
(33, 'octava marca', NULL),
(34, 'novena marca', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `idMovimiento` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `tipoMovimiento` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `id_detalle_credito` int(11) DEFAULT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `id_abono` int(11) DEFAULT NULL,
  `interes` float DEFAULT NULL,
  `deuda` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`idMovimiento`, `id_cliente`, `fecha`, `tipoMovimiento`, `cantidad`, `id_detalle_credito`, `id_venta`, `id_abono`, `interes`, `deuda`, `status`) VALUES
(42, 16, '2022-09-12 00:00:00', '1', 72, 110, 201, NULL, NULL, 72, NULL),
(43, 16, '2022-09-12 00:00:00', '2', 2, 110, 201, 0, NULL, 70, NULL),
(44, 16, '2022-09-11 00:00:00', '2', 15, 110, NULL, 70, NULL, 55, NULL),
(45, 2, '2022-09-13 00:00:00', '1', 209, 111, 205, NULL, NULL, 209, NULL),
(46, 2, '2022-09-13 00:00:00', '2', 9, 111, 205, 0, NULL, 200, NULL),
(47, 2, '2022-09-12 00:00:00', '2', 50, 111, NULL, 71, NULL, 150, NULL),
(48, 13, '2022-10-08 00:00:00', '1', 81, 112, 207, NULL, NULL, 81, NULL),
(49, 13, '2022-10-08 00:00:00', '2', 1, 112, 207, 0, NULL, 80, NULL),
(50, 3, '2022-10-08 00:00:00', '1', 4, 113, 209, NULL, NULL, 4, NULL),
(51, 3, '2022-10-08 00:00:00', '2', 2, 113, 209, 0, NULL, 2, NULL),
(52, 10, '2022-10-08 00:00:00', '1', 98, 114, 210, NULL, NULL, 98, NULL),
(53, 10, '2022-10-08 00:00:00', '2', 3, 114, 210, 0, NULL, 95, NULL),
(54, 10, '2022-11-20 00:00:00', '1', 128, 115, 212, NULL, NULL, 223, NULL),
(55, 10, '2022-11-20 00:00:00', '2', 28, 115, 212, 0, NULL, 195, NULL),
(56, 14, '2022-11-20 00:00:00', '1', 119, 116, 213, NULL, NULL, 119, NULL),
(57, 14, '2022-11-20 00:00:00', '2', 19, 116, 213, 0, NULL, 100, NULL),
(58, 16, '2022-11-20 00:00:00', '1', 141, 117, 214, NULL, NULL, 196, NULL),
(59, 16, '2022-11-20 00:00:00', '2', 41, 117, 214, 0, NULL, 155, NULL),
(60, 7, '2022-11-20 00:00:00', '1', 38, 118, 215, NULL, NULL, 38, NULL),
(61, 7, '2022-11-20 00:00:00', '2', 8, 118, 215, 0, NULL, 30, NULL),
(62, 10, '2022-11-20 00:00:00', '1', 128, 119, 216, NULL, NULL, 323, NULL),
(63, 10, '2022-11-20 00:00:00', '2', 28, 119, 216, 0, NULL, 295, NULL),
(64, 12, '2022-11-20 00:00:00', '1', 264, 120, 217, NULL, NULL, 264, NULL),
(65, 12, '2022-11-20 00:00:00', '2', 64, 120, 217, 0, NULL, 200, NULL),
(66, 16, '2022-11-20 00:00:00', '1', 81, 121, 218, NULL, NULL, 236, NULL),
(67, 16, '2022-11-20 00:00:00', '2', 1, 121, 218, 0, NULL, 235, NULL),
(68, 11, '2022-11-20 00:00:00', '1', 111, 122, 219, NULL, NULL, 111, NULL),
(69, 11, '2022-11-20 00:00:00', '2', 11, 122, 219, 0, NULL, 100, NULL),
(70, 2, '2022-11-20 00:00:00', '1', 85, 123, 220, NULL, NULL, 235, NULL),
(71, 2, '2022-11-20 00:00:00', '2', 5, 123, 220, 0, NULL, 230, NULL),
(72, 10, '2022-11-20 00:00:00', '1', 675, 124, 221, NULL, NULL, 970, NULL),
(73, 10, '2022-11-20 00:00:00', '2', 75, 124, 221, 0, NULL, 895, NULL),
(74, 2, '2022-11-20 00:00:00', '1', 81, 125, 222, NULL, NULL, 311, NULL),
(75, 2, '2022-11-20 00:00:00', '2', 1, 125, 222, 0, NULL, 310, NULL),
(76, 2, '2022-11-20 00:00:00', '2', 80, 123, NULL, 72, NULL, 230, NULL),
(77, 2, '2022-11-20 00:00:00', '2', 50, 111, NULL, 73, NULL, 180, NULL),
(78, 2, '2022-11-20 18:20:14', '2', 30, 125, NULL, 74, NULL, 150, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `codigo` bigint(30) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `costo` decimal(9,2) DEFAULT NULL,
  `precio` decimal(9,2) DEFAULT NULL,
  `fecha_caducidad` date DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_proov` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `codigo`, `descripcion`, `costo`, `precio`, `fecha_caducidad`, `id_marca`, `id_categoria`, `id_proov`) VALUES
(1, 1, 'articulo 1', NULL, NULL, NULL, 27, 2, 10),
(3, 2, 'articulo 2', NULL, NULL, NULL, 29, 1, 12),
(2, 3, 'articulo 3', NULL, NULL, NULL, 30, 2, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proov` int(10) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `nombre_responsable` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proov`, `nombre`, `direccion`, `telefono`, `email`, `nombre_responsable`) VALUES
(1, 'proveedor1', 'direccion1', 3341189, NULL, 'responsable1'),
(2, 'proveedor4', 'direccion2', 3341182, NULL, 'responsable2'),
(3, 'proveedor3', 'direccion3', 3341183, NULL, 'responsable3'),
(4, 'proveedor3', 'domicilio4', 44444, 'email4', ''),
(5, 'proveedor5', 'domicilio5', 55555, 'email5', 'responsable5'),
(6, 'nombreprov', 'domicilio proov', 4534, 'gamesa@gmail.com', 'resposable algo'),
(7, 'laa costena', 'cobo 52 santa barbara iztapalapa CDMX', 7333363368, 'mccormic@gmail.com', 'mario castaÃ±eda lopez'),
(8, 'moderna', 'calle roble 22 tlalpan cdmx', 5544883298, 'moderna@gmail.com', 'luis estrada ordoÃ±ez'),
(9, 'BIMBO', 'catalina pastrana s/n col industrial iguala gro', 73324754389, 'bimbo@gmail.com', 'marco serrano mota'),
(10, 'sello rojo', '', 0, '', ''),
(11, 'pepsi co', '', 0, '', ''),
(12, '', 'domicilio5', 44444, 'piooner@gmail.com', 'valdemar gomez oropeza'),
(13, 'knor', 'jose maria morelos 133', 456245645, 'knor@gmail.com', 'alberto rosas vazquez'),
(14, 'bachoco', 'libertad 73 colonia nopalera cdmx', 5556324467, 'bachoco@gmail.com', 'javier lara fernandez'),
(15, 'zorro', 'altamirano 74 col el capire', 5532452611, 'zorro@gmail.com', ''),
(16, 'reza', 'hayuntamiento 307', 7271003246, 'reza@gmail.com', 'regina reza oropeza'),
(17, 'reza', 'hayuntamiento 307', 77232456680, 'reza@gmail.com', 'regina reza oropeza'),
(18, 'alpura', 'carretera mexico cuernavaca no. 772 milpa alta', 5544883298, 'alpura@gmail.com', 'alfredo romero castillo'),
(19, 'nombre97', 'domicilio 97', 9797979797, 'email97@gmail.com', 'respopnsable97'),
(20, 'nombre95', 'domicilio95', 9595959595, 'email95@gmail.ccom', 'respoanble95'),
(21, 'proveedor91', 'domicilio91', 9191919191, 'email91@gmail.com', 'responasble91'),
(22, 'NOMBRE49', 'DOMICILIO49', 4949494949, 'EMAil49@gmail.com', 'responsable 49'),
(23, 'giro', 'domicilio 40', 4040404040, 'email40@gmail.com', 'resposanble40'),
(24, 'ultimo proveedor', 'utlimo domicilio', 4546474849, 'ultimoproveedor@gmail.com', 'responsable ultimo proveedor'),
(25, 'proveedor nuevo', 'domicilio nuevo', 5555555546, 'proveedornuevo@gmail.com', 'resposablenuevo'),
(26, 'proveedor 9', 'domicilio 9', 9999999999, 'prov9@gmail.com', 'responsable9'),
(27, 'prov 10', 'domicilio 10', 1010101010, 'email10@gmaail.com', 'resposnable 10'),
(28, 'proveedor 11', 'domicilio 11', 1111111111, 'email11@gmail.com', 'resposnble11 '),
(29, 'proveedor doce', 'domicilio 12', 1212121212, 'email12@gmail.com', 'responsabnle12'),
(30, 'proveedor trece', 'domicilio 13', 1313131313, 'email13@gmail.com', 'responsablwe 13'),
(31, 'proveedor catorce', 'domicilio 14', 1414141414, 'email14@gmail.com', 'resposanble14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_detalle_x_prod`
--

CREATE TABLE `rel_detalle_x_prod` (
  `id_detalle_x_prod` bigint(20) NOT NULL,
  `id_venta` bigint(20) DEFAULT NULL,
  `id_detalle` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla1`
--

CREATE TABLE `tabla1` (
  `campo1` varchar(50) DEFAULT NULL,
  `campo2` varchar(50) DEFAULT NULL,
  `campo3` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporal`
--

CREATE TABLE `temporal` (
  `id_autoin` int(11) NOT NULL,
  `campo1` varchar(300) DEFAULT NULL,
  `campo2` varchar(300) DEFAULT NULL,
  `campo3` varchar(300) DEFAULT NULL,
  `unidades` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporal2`
--

CREATE TABLE `temporal2` (
  `id_autoin` int(11) NOT NULL,
  `codigo` bigint(20) NOT NULL,
  `nombre_producto` varchar(300) DEFAULT NULL,
  `precioBD` decimal(9,2) DEFAULT NULL,
  `unidadesInput` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporalcreditos`
--

CREATE TABLE `temporalcreditos` (
  `idCliente` bigint(20) NOT NULL DEFAULT 0,
  `nombreCliente` text CHARACTER SET latin1 DEFAULT NULL,
  `creditosActivos` bigint(21) DEFAULT NULL,
  `cantidadPrestada` decimal(31,2) DEFAULT NULL,
  `idDetalleCredito` bigint(20) NOT NULL DEFAULT 0,
  `cantidad_por_pagar` decimal(9,2) DEFAULT NULL,
  `diasTranscurridos` bigint(21) DEFAULT NULL,
  `interesEnPorcentaje` decimal(25,4) DEFAULT NULL,
  `interessEndinero` decimal(30,2) DEFAULT NULL,
  `cantidadDebe` decimal(31,2) DEFAULT NULL,
  `abono` decimal(31,2) DEFAULT NULL,
  `deudaPresente` decimal(32,2) DEFAULT NULL,
  `primerFechaVenc` date DEFAULT NULL,
  `ultimoAbono` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `temporalcreditos`
--

INSERT INTO `temporalcreditos` (`idCliente`, `nombreCliente`, `creditosActivos`, `cantidadPrestada`, `idDetalleCredito`, `cantidad_por_pagar`, `diasTranscurridos`, `interesEnPorcentaje`, `interessEndinero`, `cantidadDebe`, `abono`, `deudaPresente`, `primerFechaVenc`, `ultimoAbono`) VALUES
(11, 'corona tellez sergio', 1, '100.00', 122, '100.00', 0, '0.0000', '0.00', '100.00', '0.00', '100.00', '2023-01-30', NULL),
(13, 'davis guzman enrique', 1, '80.00', 112, '80.00', 43, '3.0616', '2.44', '82.44', '0.00', '82.44', '2023-01-30', NULL),
(7, 'espiricueta rodriguez navocodonosor', 1, '30.00', 118, '30.00', 0, '0.0000', '0.00', '30.00', '0.00', '30.00', '2023-01-30', NULL),
(10, 'guzman sevilla angel', 4, '895.00', 114, '95.00', 43, '3.0616', '2.90', '97.90', '0.00', '97.90', '2023-01-30', NULL),
(10, 'guzman sevilla angel', 4, '895.00', 115, '100.00', 0, '0.0000', '0.00', '100.00', '0.00', '100.00', '2023-01-30', NULL),
(10, 'guzman sevilla angel', 4, '895.00', 119, '100.00', 0, '0.0000', '0.00', '100.00', '0.00', '100.00', '2023-01-30', NULL),
(10, 'guzman sevilla angel', 4, '895.00', 124, '600.00', 0, '0.0000', '0.00', '600.00', '0.00', '600.00', '2023-01-30', NULL),
(16, 'Lira Mosso Ian Fernando', 3, '250.00', 110, '70.00', 69, '4.9128', '3.43', '73.43', '15.00', '58.43', '2023-01-30', '2022-09-11 17:54:27'),
(3, 'Lira Zavaleta Alfonso', 1, '2.00', 113, '2.00', 43, '3.0616', '0.06', '2.06', '0.00', '2.06', '2023-01-30', NULL),
(16, 'Lira Mosso Ian Fernando', 3, '250.00', 117, '100.00', 0, '0.0000', '0.00', '100.00', '0.00', '100.00', '2023-01-30', '2022-09-11 17:54:27'),
(16, 'Lira Mosso Ian Fernando', 3, '250.00', 121, '80.00', 0, '0.0000', '0.00', '80.00', '0.00', '80.00', '2023-01-30', '2022-09-11 17:54:27'),
(2, 'mosso guzman azucena', 2, '280.00', 111, '200.00', 68, '4.8416', '9.68', '209.68', '100.00', '109.68', '2023-01-30', '2022-11-20 18:20:14'),
(2, 'mosso guzman azucena', 2, '280.00', 125, '80.00', 0, '0.0000', '0.00', '80.00', '30.00', '50.00', '2023-01-30', '2022-11-20 18:20:14'),
(12, 'mota perez pedro', 1, '200.00', 120, '200.00', 0, '0.0000', '0.00', '200.00', '0.00', '200.00', '2023-01-30', NULL),
(14, 'perez hernandez yumicela', 1, '100.00', 116, '100.00', 0, '0.0000', '0.00', '100.00', '0.00', '100.00', '2023-01-30', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `nombre` varchar(300) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `estatus_usuario` int(11) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `password`, `nombre`, `fecha_alta`, `estatus_usuario`, `tipo_usuario`) VALUES
(1, 'admin', 'aG9sYW11bmRv', 'Alfonso Emmanuel Lira Zavaleta', '2020-08-19 17:10:11', 1, 1),
(2, 'usuario1', 'bWV4aWNv', 'nombre de usuario1', '2020-08-19 17:10:11', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` bigint(20) NOT NULL,
  `total_unidades` bigint(20) DEFAULT NULL,
  `totalVenta` decimal(9,2) DEFAULT NULL,
  `cantidad_pagada` decimal(9,2) DEFAULT NULL,
  `cambio` decimal(9,2) DEFAULT NULL,
  `id_cliente` bigint(20) DEFAULT NULL,
  `fecha_venta` date DEFAULT NULL,
  `hora_venta` time DEFAULT NULL,
  `tipo_venta` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `total_unidades`, `totalVenta`, `cantidad_pagada`, `cambio`, `id_cliente`, `fecha_venta`, `hora_venta`, `tipo_venta`) VALUES
(200, 1, '30.00', '31.00', '1.00', 1, '2022-09-11', '17:48:46', 1),
(201, 5, '72.00', '0.00', '0.00', 16, '2022-09-11', '17:51:17', 0),
(202, 1, '30.00', '30.00', '0.00', 1, '2022-09-12', '16:13:11', 1),
(203, 1, '47.00', '50.00', '3.00', 1, '2022-09-12', '16:15:12', 1),
(204, 1, '4.00', '5.00', '1.00', 1, '2022-09-12', '17:38:45', 1),
(205, 7, '209.00', '0.00', '0.00', 2, '2022-09-12', '17:40:46', 0),
(206, 1, '30.00', '30.00', '0.00', 1, '2022-10-08', '14:06:14', 1),
(207, 3, '81.00', '0.00', '0.00', 13, '2022-10-08', '14:07:10', 0),
(208, 1, '30.00', '31.00', '1.00', 1, '2022-10-08', '14:20:46', 1),
(209, 1, '4.00', '0.00', '0.00', 3, '2022-10-08', '14:21:09', 0),
(210, 3, '98.00', '0.00', '0.00', 10, '2022-10-08', '14:26:39', 0),
(211, 1, '30.00', '50.00', '20.00', 1, '2022-11-19', '19:02:23', 1),
(212, 4, '128.00', '0.00', '0.00', 10, '2022-11-19', '19:03:27', 0),
(213, 6, '119.00', '0.00', '0.00', 14, '2022-11-19', '20:38:52', 0),
(214, 3, '141.00', '0.00', '0.00', 16, '2022-11-19', '21:00:46', 0),
(215, 3, '38.00', '0.00', '0.00', 7, '2022-11-19', '21:09:27', 0),
(216, 6, '128.00', '0.00', '0.00', 10, '2022-11-19', '21:14:57', 0),
(217, 10, '264.00', '0.00', '0.00', 12, '2022-11-19', '21:29:46', 0),
(218, 3, '81.00', '0.00', '0.00', 16, '2022-11-20', '15:37:39', 0),
(219, 4, '111.00', '0.00', '0.00', 11, '2022-11-20', '15:49:28', 0),
(220, 4, '85.00', '0.00', '0.00', 2, '2022-11-20', '15:52:31', 0),
(221, 16, '675.00', '0.00', '0.00', 10, '2022-11-20', '16:05:48', 0),
(222, 3, '81.00', '0.00', '0.00', 2, '2022-11-20', '16:22:06', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abono`
--
ALTER TABLE `abono`
  ADD PRIMARY KEY (`id_abono`),
  ADD KEY `id_credito` (`id_detalle_credito`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `credito`
--
ALTER TABLE `credito`
  ADD PRIMARY KEY (`id_credito`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `credito_old`
--
ALTER TABLE `credito_old`
  ADD PRIMARY KEY (`id_credito`);

--
-- Indices de la tabla `detalle_credito`
--
ALTER TABLE `detalle_credito`
  ADD PRIMARY KEY (`id_detalle_credito`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id_gasto`),
  ADD KEY `id_proov` (`id_proov`);

--
-- Indices de la tabla `historial_credito`
--
ALTER TABLE `historial_credito`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_abono` (`id_abono`);

--
-- Indices de la tabla `historial_inventario`
--
ALTER TABLE `historial_inventario`
  ADD PRIMARY KEY (`id_update`),
  ADD KEY `codigo` (`codigo`);

--
-- Indices de la tabla `historial_pago_creditos`
--
ALTER TABLE `historial_pago_creditos`
  ADD PRIMARY KEY (`id_pago_credito`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id_ingreso`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inv`,`codigo`),
  ADD KEY `codigo` (`codigo`),
  ADD KEY `id_gasto` (`id_gasto`);

--
-- Indices de la tabla `inventariotempxprod`
--
ALTER TABLE `inventariotempxprod`
  ADD PRIMARY KEY (`id_inv_x_prod`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`idMovimiento`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `uqProd` (`id_producto`),
  ADD KEY `fk_relacion` (`id_proov`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proov`);

--
-- Indices de la tabla `rel_detalle_x_prod`
--
ALTER TABLE `rel_detalle_x_prod`
  ADD PRIMARY KEY (`id_detalle_x_prod`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_detalle` (`id_detalle`);

--
-- Indices de la tabla `temporal`
--
ALTER TABLE `temporal`
  ADD UNIQUE KEY `id_autoin` (`id_autoin`);

--
-- Indices de la tabla `temporal2`
--
ALTER TABLE `temporal2`
  ADD PRIMARY KEY (`id_autoin`,`codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abono`
--
ALTER TABLE `abono`
  MODIFY `id_abono` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `credito`
--
ALTER TABLE `credito`
  MODIFY `id_credito` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `credito_old`
--
ALTER TABLE `credito_old`
  MODIFY `id_credito` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_credito`
--
ALTER TABLE `detalle_credito`
  MODIFY `id_detalle_credito` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=374;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id_gasto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `historial_credito`
--
ALTER TABLE `historial_credito`
  MODIFY `id_historial` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial_inventario`
--
ALTER TABLE `historial_inventario`
  MODIFY `id_update` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `historial_pago_creditos`
--
ALTER TABLE `historial_pago_creditos`
  MODIFY `id_pago_credito` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id_ingreso` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_inv` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `inventariotempxprod`
--
ALTER TABLE `inventariotempxprod`
  MODIFY `id_inv_x_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=789;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `idMovimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proov` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `temporal`
--
ALTER TABLE `temporal`
  MODIFY `id_autoin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT de la tabla `temporal2`
--
ALTER TABLE `temporal2`
  MODIFY `id_autoin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1232;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abono`
--
ALTER TABLE `abono`
  ADD CONSTRAINT `id_credito` FOREIGN KEY (`id_detalle_credito`) REFERENCES `detalle_credito` (`id_detalle_credito`);

--
-- Filtros para la tabla `credito`
--
ALTER TABLE `credito`
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `detalle_credito`
--
ALTER TABLE `detalle_credito`
  ADD CONSTRAINT `detalle_credito_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `id_venta` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`);

--
-- Filtros para la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `gastos_ibfk_1` FOREIGN KEY (`id_proov`) REFERENCES `proveedores` (`id_proov`);

--
-- Filtros para la tabla `historial_credito`
--
ALTER TABLE `historial_credito`
  ADD CONSTRAINT `id_abono` FOREIGN KEY (`id_abono`) REFERENCES `abono` (`id_abono`);

--
-- Filtros para la tabla `historial_inventario`
--
ALTER TABLE `historial_inventario`
  ADD CONSTRAINT `historial_inventario_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `inventario` (`codigo`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `id_gasto` FOREIGN KEY (`id_gasto`) REFERENCES `gastos` (`id_gasto`),
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `producto` (`codigo`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_relacion` FOREIGN KEY (`id_proov`) REFERENCES `proveedores` (`id_proov`);

--
-- Filtros para la tabla `rel_detalle_x_prod`
--
ALTER TABLE `rel_detalle_x_prod`
  ADD CONSTRAINT `id_detalle` FOREIGN KEY (`id_detalle`) REFERENCES `detalle_venta` (`id_detalle`),
  ADD CONSTRAINT `rel_detalle_x_prod_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `puntoventa_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
