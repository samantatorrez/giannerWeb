-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2017 a las 11:19:39
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gianner_web_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Mochilas'),
(2, 'Billeteras'),
(3, 'Morrales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` int(11) NOT NULL,
  `medidas` varchar(100) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `imagen_dir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `medidas`, `id_categoria`, `imagen_dir`) VALUES
(1, 'Katrina Black', 'Cuero napón liso bordeaux mate.\r\nDetalles en charol importado italiano bordeaux.\r\nTela gobelino estampado con motivos florales, fondo negro.\r\nHerrajes baño oro.\r\nTexturado de tapa (referencia a caja toráxica humana)\r\nCerradura de aperture por rotación.\r\nBolsillo interno con cierre, abertura 18 cm.\r\nApertura y cierre mediante ojales a tornillo de alta calidad y cordón de cuero con regulador de tensión.\r\nTapones dorados pirámide en base.\r\nCorreas regulables con hebillas.\r\n', 1950, '30 x 29 x 19 cm', 1, 'images/mochilaCatrina.jpg'),
(2, 'Isabella', 'Cuero napón liso bordeaux mate.\r\nDetalles en charol importado italiano bordeaux.\r\nTela gobelino estampado con motivos florales, fondo negro.\r\nHerrajes baño oro.\r\nTexturado de tapa (referencia a columna vertebral)\r\nCerradura de aperture por rotación.\r\nBolsillo delantero con vivo de cuero.\r\nTapones dorados pirámide en base.\r\nCorrea superior de agarre con detalle de remache piramide dirado.\r\nLlavero extraible en cuero liso bordeaux y charol italiano con logo Gianner.', 1500, '32 x 25 x 7 cm', 3, 'images/morralPeque.jpg'),
(3, 'Lolita', 'Cuero exterior grabado ¨caviar¨ rosa tropic.\r\nGobelino floreado.\r\nLogo Gianner con baño oro.\r\nCierre de bronce negro.\r\nDeslizador con capuchón dorado con rosa de cuero.\r\nTarjetero interno con 12 compartimientos.\r\nMonedero interno con cierre y deslizador.\r\nInterior en shantung negro bordado.', 840, '21 x 12 cm', 2, 'images/billeteraLolita.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`, `role`) VALUES
(1, 'user', '1234', 0),
(2, 'admin', '4321', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
