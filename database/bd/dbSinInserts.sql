-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2022 a las 22:31:59
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
-- Base de datos: `sistemaventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono`
--

create database sistemaventas2;
use sistemaventas2;

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
                                                                                                                                                                                                                  (16, 'Ian Fernando', 'Lira', 'Mosso', 'matamoros 103', 'huitzuco', 7331080000, 'ferliramosso@gmail.com', '2022-06-07 21:54:51', NULL, NULL, NULL);

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

--
-- Volcado de datos para la tabla `credito`
--



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

--
-- Volcado de datos para la tabla `gastos`
--

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
                                                                 (32, 'septima marca', NULL);

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



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
                            `id_producto` int not null AUTO_INCREMENT,
                            `codigo` bigint(30)   NOT NULL primary key,
                            `descripcion` varchar(300) DEFAULT NULL,
                            `costo` decimal(9,2) DEFAULT NULL,
                            `precio` decimal(9,2) DEFAULT NULL,
                            `fecha_caducidad` date DEFAULT NULL,
                            `id_marca` int(11) DEFAULT NULL,
                            `id_categoria` int(11) DEFAULT NULL,
                            `id_proov` int(11) DEFAULT NULL,
                            constraint uqProd unique (id_producto)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--



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
                                                                                                             (7, '', 'cobo 52 santa barbara iztapalapa CDMX', 7333363368, 'mccormic@gmail.com', 'mario castaÃ±eda lopez'),
                                                                                                             (8, 'moderna', 'calle roble 22 tlalpan cdmx', 5544883298, 'moderna@gmail.com', 'luis estrada ordoÃ±ez'),
                                                                                                             (9, 'BIMBO', 'catalina pastrana s/n col industrial iguala gro', 73324754389, 'bimbo@gmail.com', 'marco serrano mota'),
                                                                                                             (10, 'cocacola', '', 0, '', ''),
                                                                                                             (11, 'pepsi co', '', 0, '', ''),
                                                                                                             (12, 'pionner', 'domicilio5', 44444, 'piooner@gmail.com', 'valdemar gomez oropeza'),
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
                                                                                                             (23, 'proveedor 40', 'domicilio 40', 4040404040, 'email40@gmail.com', 'resposanble40'),
                                                                                                             (24, 'ultimo proveedor', 'utlimo domicilio', 4546474849, 'ultimoproveedor@gmail.com', 'responsable ultimo proveedor'),
                                                                                                             (25, 'proveedor nuevo', 'domicilio nuevo', 5555555546, 'proveedornuevo@gmail.com', 'resposablenuevo');

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

--
-- Volcado de datos para la tabla `tabla1`
--



-- --------------------------------------------------------

--
--



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

--
-- Volcado de datos para la tabla `temporal`
--



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `temporalcreditos`
--


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
--   ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`),
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
    MODIFY `id_abono` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
    MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
    MODIFY `id_cliente` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
    MODIFY `id_detalle_credito` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
    MODIFY `id_detalle` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;

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
    MODIFY `id_update` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `historial_pago_creditos`
--
ALTER TABLE `historial_pago_creditos`
    MODIFY `id_pago_credito` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
    MODIFY `id_ingreso` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
    MODIFY `id_inv` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `inventariotempxprod`
--
ALTER TABLE `inventariotempxprod`
    MODIFY `id_inv_x_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=738;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
    MODIFY `id_marca` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
    MODIFY `idMovimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
    MODIFY `id_proov` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `temporal`
--
ALTER TABLE `temporal`
    MODIFY `id_autoin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT de la tabla `temporal2`
--
ALTER TABLE `temporal2`
    MODIFY `id_autoin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1151;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
    MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
    MODIFY `id_venta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

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
