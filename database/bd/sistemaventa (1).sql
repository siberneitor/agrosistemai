-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2019 a las 22:33:53
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaventa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` bigint(10) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `domicilio` varchar(100) DEFAULT NULL,
  `localidad` varchar(100) DEFAULT NULL,
  `telefono` int(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fechadealta` date DEFAULT NULL,
  `credito_actual` varchar(3) DEFAULT NULL,
  `nodecreditos` bigint(3) DEFAULT NULL,
  `estatus_credito_actual` varchar(30) DEFAULT NULL,
  `id_credito` bigint(10) DEFAULT NULL,
  `campo1` varchar(10) DEFAULT NULL,
  `campo2` bigint(10) DEFAULT NULL,
  `campo3` bigint(10) DEFAULT NULL,
  `campo4` varchar(30) DEFAULT NULL,
  `campo5` varchar(30) DEFAULT NULL,
  `campo6` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `domicilio`, `localidad`, `telefono`, `email`, `fechadealta`, `credito_actual`, `nodecreditos`, `estatus_credito_actual`, `id_credito`, `campo1`, `campo2`, `campo3`, `campo4`, `campo5`, `campo6`) VALUES
(1, 'n2', 'ap2', 'dir2', 'loc2', 22222, 'email2', '2019-02-14', '222', 0, 'p', 0, '', 0, 0, '', '', ''),
(2, 'n3', 'ap3', 'd3', 'l3', 333333, 'em3', '2019-02-14', '333', 0, 'p', 0, '', 0, 0, '', '', ''),
(3, 'nombre3', 'apellido3', 'direccion3', 'localidad3', 33333333, 'email3', '2019-02-14', '333', 1, 'p', 0, '', 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credito`
--

CREATE TABLE `credito` (
  `id_credito` bigint(10) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `dias_plazo` bigint(3) DEFAULT NULL,
  `interes` float DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `monto_prestado` float DEFAULT NULL,
  `monto_a_pagar` float DEFAULT NULL,
  `pagos_realizados` bigint(4) DEFAULT NULL,
  `pagos_restantes` bigint(4) DEFAULT NULL,
  `id_cliente` bigint(10) DEFAULT NULL,
  `campo1` varchar(10) DEFAULT NULL,
  `campo2` bigint(10) DEFAULT NULL,
  `campo3` bigint(10) DEFAULT NULL,
  `campo4` varchar(30) DEFAULT NULL,
  `campo5` varchar(30) DEFAULT NULL,
  `campo6` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` bigint(10) NOT NULL,
  `fechapago` date DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `recargo` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `id_credito` bigint(10) DEFAULT NULL,
  `campo1` varchar(10) DEFAULT NULL,
  `campo2` bigint(10) DEFAULT NULL,
  `campo3` bigint(10) DEFAULT NULL,
  `campo4` varchar(30) DEFAULT NULL,
  `campo5` varchar(30) DEFAULT NULL,
  `campo6` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` bigint(10) NOT NULL,
  `codigo` bigint(30) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  `costo` float DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `proveedor` varchar(50) DEFAULT NULL,
  `fecha_caducidad` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `codigo`, `descripcion`, `costo`, `precio`, `proveedor`, `fecha_caducidad`) VALUES
(0, 2, 'huevo pieza', 2, 2, '', '0000-00-00'),
(0, 75005443, 'aceite 123 500ml', 13, 16, '', '0000-00-00'),
(0, 7501000112845, 'rebanadas bimbo 55g', 4, 5, 'bimbo', '2019-02-12'),
(0, 7501000912803, 'nescafe fco 42g', 19, 21, '', '0000-00-00'),
(0, 7501003336125, 'mermelada mc cormic 270g', 14, 16, 'mc cormic', '2020-06-30'),
(0, 7501003340115, 'mayonesa 105g', 9, 12, 'mc cormic', '2019-11-30'),
(0, 7501008703441, 'galletas mexicanas ', 6, 8, '', '0000-00-00'),
(0, 7501017006007, 'chiles serranos 105g', 8, 10, 'la costeÃ±a', '2020-01-01'),
(0, 7501017006014, 'chiles rajas 105g', 6, 8, 'la costeÃ±a', '0000-00-00'),
(0, 7501020540666, 'nutrileche 1ltr', 13, 15, '', '0000-00-00'),
(0, 7501082730913, 'desodorante nuvel mujer', 9, 11, 'nuvel', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntoventa`
--

CREATE TABLE `puntoventa` (
  `id_venta` bigint(10) NOT NULL,
  `codigo` bigint(30) DEFAULT NULL,
  `cantidad` bigint(5) DEFAULT NULL,
  `producto` varchar(100) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `totalcompra` float DEFAULT NULL,
  `id_cliente` bigint(6) DEFAULT NULL,
  `campo1` bigint(10) DEFAULT NULL,
  `campo2` bigint(10) DEFAULT NULL,
  `campo3` bigint(10) DEFAULT NULL,
  `campo4` varchar(30) DEFAULT NULL,
  `campo5` varchar(30) DEFAULT NULL,
  `campo6` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id_stock` bigint(10) DEFAULT NULL,
  `codigo` bigint(30) NOT NULL,
  `cantidad` bigint(10) DEFAULT NULL,
  `costo` float DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `proveedor` varchar(50) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL
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

--
-- Volcado de datos para la tabla `tabla1`
--

INSERT INTO `tabla1` (`campo1`, `campo2`, `campo3`) VALUES
('1', '2', '3'),
('4', '5', '6'),
('7', '8', '9'),
('10', '11', '12'),
('13', '14', '15'),
('16', '17', '18'),
('19', '20', '21'),
('22', '23', '24'),
('', '', '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla2`
--

CREATE TABLE `tabla2` (
  `campo4` varchar(50) DEFAULT NULL,
  `campo5` varchar(50) DEFAULT NULL,
  `campo6` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporal`
--

CREATE TABLE `temporal` (
  `campo1` varchar(50) DEFAULT NULL,
  `campo2` varchar(50) DEFAULT NULL,
  `campo3` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `temporal`
--

INSERT INTO `temporal` (`campo1`, `campo2`, `campo3`) VALUES
('7501003340115', 'mayonesa 105g', '12'),
('7501003340115', 'mayonesa 105g', '12'),
('7501003340115', 'mayonesa 105g', '12');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `puntoventa`
--
ALTER TABLE `puntoventa`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigo` (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `puntoventa`
--
ALTER TABLE `puntoventa`
  MODIFY `id_venta` bigint(10) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `credito`
--
ALTER TABLE `credito`
  ADD CONSTRAINT `credito_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `puntoventa`
--
ALTER TABLE `puntoventa`
  ADD CONSTRAINT `puntoventa_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `producto` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
