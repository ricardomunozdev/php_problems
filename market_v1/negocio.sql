-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2020 a las 18:20:50
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `negocio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `idcaja` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `importecaja` decimal(9,2) NOT NULL,
  `fechacaja` date NOT NULL,
  `horacaja` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`idcaja`, `idusuario`, `importecaja`, `fechacaja`, `horacaja`) VALUES
(30, 17, '600.00', '2020-11-22', '13:55:23'),
(31, 17, '1500.00', '2020-11-21', '11:10:56'),
(32, 17, '6000.00', '2020-11-23', '11:22:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `iddetalleventa` int(11) NOT NULL,
  `idfactura` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidadventa` int(11) NOT NULL,
  `precio` decimal(9,2) NOT NULL,
  `subtotal` decimal(9,0) NOT NULL,
  `idregistrarme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`iddetalleventa`, `idfactura`, `idproducto`, `cantidadventa`, `precio`, `subtotal`, `idregistrarme`) VALUES
(59, 1, 1, 1, '130.00', '130', 17),
(60, 1, 2, 1, '100.00', '100', 17),
(61, 2, 1, 1, '130.00', '130', 17),
(62, 3, 1, 1, '130.00', '130', 17),
(63, 3, 2, 1, '100.00', '100', 17),
(64, 4, 1, 1, '130.00', '130', 17),
(65, 4, 1, 1, '130.00', '130', 17),
(66, 5, 5, 1, '130.00', '130', 17),
(67, 5, 5, 1, '130.00', '130', 17),
(71, 7, 8, 1, '350.00', '350', 17),
(72, 7, 8, 1, '350.00', '350', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `idfactura` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idvendedor` int(11) NOT NULL,
  `totalventa` decimal(9,2) NOT NULL,
  `condicionventa` int(3) NOT NULL,
  `comprobantetarjeta` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fechaventa` datetime NOT NULL,
  `idregistrarme` int(11) NOT NULL,
  `estado` varchar(2) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`idfactura`, `idcliente`, `idvendedor`, `totalventa`, `condicionventa`, `comprobantetarjeta`, `fechaventa`, `idregistrarme`, `estado`) VALUES
(1, 0, 0, '0.00', 0, '', '2020-07-13 09:52:20', 0, '1'),
(2, 18, 20, '130.00', 1, '500', '2020-11-22 13:55:05', 17, '2'),
(3, 19, 20, '230.00', 1, '300', '2020-11-22 14:03:10', 17, '2'),
(4, 19, 20, '260.00', 1, '600', '2020-11-21 14:20:58', 17, '2'),
(5, 21, 20, '260.00', 1, '90', '2020-11-22 21:27:13', 17, '2'),
(6, 23, 24, '240.00', 1, '980', '2020-11-22 22:56:06', 17, '2'),
(7, 23, 24, '700.00', 1, '950950', '2020-11-23 11:39:42', 17, '2'),
(8, 0, 0, '0.00', 0, '0', '2020-11-23 11:49:09', 0, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `idgastos` int(11) NOT NULL,
  `detalle` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `totalgastos` decimal(9,2) NOT NULL,
  `fechagastos` date NOT NULL,
  `horagastos` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`idgastos`, `detalle`, `totalgastos`, `fechagastos`, `horagastos`) VALUES
(3, 'Limpieza General', '200.00', '2020-11-22', '14:06:45'),
(5, 'Mantenimiento del Local', '900.00', '2020-11-21', '14:05:01'),
(6, 'Instalaciones de Aire Acondicionado', '3000.00', '2020-11-23', '11:40:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombreproducto` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `codigo` int(50) NOT NULL,
  `stock` int(100) NOT NULL,
  `preciocompra` decimal(9,2) NOT NULL,
  `precioventa` decimal(9,2) NOT NULL,
  `fechaproducto` date NOT NULL,
  `idrubro` int(50) NOT NULL,
  `idusuario` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombreproducto`, `descripcion`, `codigo`, `stock`, `preciocompra`, `precioventa`, `fechaproducto`, `idrubro`, `idusuario`) VALUES
(1, 'Seven Up', 'Descartable 2LTS', 202, 80, '90.00', '140.00', '2020-11-22', 2, 17),
(2, 'SEVEN UP 2.5 LTS', 'Retornable 2.5 Lts', 201, 4, '80.00', '100.00', '2020-11-22', 2, 17),
(5, 'Fanta Naranja', '2Lts Retornable', 204, 50, '90.00', '130.00', '2020-11-22', 2, 17),
(8, 'Natura 5Lts', 'Aceite de Girasol', 300, 48, '300.00', '350.00', '2020-11-22', 1, 17),
(9, 'Aceite Cocinero 5 Lts', 'Cocinero Girasol', 303, 0, '350.00', '400.00', '2020-11-23', 1, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idproveedor` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `actividad` text NOT NULL,
  `debe` decimal(9,2) NOT NULL,
  `haber` decimal(9,2) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idproveedor`, `idusuario`, `actividad`, `debe`, `haber`, `fecha`) VALUES
(25, 18, 'Baja Gaseosa Fanta 20u 1,5Lts', '1800.00', '0.00', '2020-11-23 13:09:39'),
(26, 18, 'Pago Boleta Anterior', '0.00', '1500.00', '2020-11-23 13:18:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubros`
--

CREATE TABLE `rubros` (
  `idrubro` int(11) NOT NULL,
  `nombrerubros` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `rubros`
--

INSERT INTO `rubros` (`idrubro`, `nombrerubros`) VALUES
(1, 'Aceites'),
(2, 'Bebidas'),
(3, 'Art. de Limpiza'),
(4, 'Comestibles'),
(5, 'Golosinas'),
(6, 'Lacteos'),
(8, 'Articulos Varios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `dni` int(10) NOT NULL,
  `nacimiento` date NOT NULL,
  `provincia` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `localidad` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(13) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `sexo` varchar(1) COLLATE utf8mb4_spanish_ci NOT NULL,
  `privilegio` int(1) NOT NULL,
  `idregistrarme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `usuario`, `password`, `nombre`, `apellido`, `dni`, `nacimiento`, `provincia`, `localidad`, `direccion`, `telefono`, `email`, `sexo`, `privilegio`, `idregistrarme`) VALUES
(17, 'EnzoDaniel', '1234', 'Enzo ', 'Juarez', 36231145, '1992-04-25', 'Tucuman', 'San Miguel de Tucuman', 'Av. Eudoro Araoz 247', '3816240707', 'enzodanielj@gmail.com', 'M', 1, 0),
(18, 'EstebanJuarez', '1234', 'Esteban', 'Juarez', 36200555, '1999-04-25', 'Tucuman', 'Yerba Buena', 'Solano Vera 22', '5', 'estebanquito@gmail.com', 'M', 5, 0),
(19, 'MaxiMontenegro', '1234', 'Maximiliano', 'Montenegro', 25400800, '1992-05-19', 'Tucuman', 'Trancas', 'Tranqueña 800', '381145541', 'maxi@montenegro', 'M', 3, 0),
(20, 'CesarUrueña', '1234', 'Cesar', 'Urueña', 36222111, '1993-10-10', 'Tucuman', 'San Andres', 'ruta provincial 304', '3815400600', 'cesar@uruaña.com', 'M', 4, 0),
(21, 'NahuelB', '1234', 'Nahuel', 'Benitez', 37800900, '1993-06-14', 'Tucuman', 'San Miguel de Tucuman', 'Eugenio Mendez 150', '3815555666', 'nahueljorgebenitez@gmail.com', 'M', 3, 0),
(23, 'FabianEsteban', '1234', 'Fabian', 'Juarez', 30900100, '1984-03-24', 'Tucuman', 'Tafi Del Valle', 'El Rodeo', '3814321123', 'fabian@gmail.com', 'M', 3, 0),
(24, 'Dai', '1234', 'Daiana', 'Heredia', 38154562, '1991-10-10', 'Tucuman', 'Famailla', 'Aguas Dulces', '3814908070', 'daiana@heredia.com', 'F', 4, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`idcaja`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`iddetalleventa`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`idfactura`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`idgastos`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `rubros`
--
ALTER TABLE `rubros`
  ADD PRIMARY KEY (`idrubro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `idcaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `idgastos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `idrubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
