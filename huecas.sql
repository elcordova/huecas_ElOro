-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2016 a las 06:19:59
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `huecas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nombre` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cat_descripcion` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cat_id`, `cat_nombre`, `cat_descripcion`) VALUES
(1, 'Comida de Mar', 'los mejores mariscos de EL Oro para tu paladar'),
(2, 'Piqueo', 'Tacos, Hamburguesas, Hot Dog, Papas Fritas, etc'),
(3, 'Pizza', 'La mejor pizza de El Oro'),
(4, 'Frutas', 'Los mejores jugos'),
(5, 'Comida Tipica', 'La mejor comida tipica ecuatoriana'),
(6, 'Parrilladas', 'Las mejores parrilladas'),
(7, 'Helados', 'Los mejores helados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cli_cedula` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `cli_nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cli_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cli_direccion` varchar(90) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cli_telefono` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cli_correo` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cli_contrasena` varchar(40) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`cli_cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE IF NOT EXISTS `detallepedido` (
  `pla_id` int(11) NOT NULL,
  `ped_id` int(11) NOT NULL,
  `det_cantidad` int(11) NOT NULL,
  PRIMARY KEY (`pla_id`,`ped_id`),
  KEY `fk_plato_has_pedido_pedido1_idx` (`ped_id`),
  KEY `fk_plato_has_pedido_plato1_idx` (`pla_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
  `gal_id` int(11) NOT NULL AUTO_INCREMENT,
  `gal_foto` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `gal_tipo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hue_id` int(11) NOT NULL,
  PRIMARY KEY (`gal_id`,`hue_id`),
  KEY `fk_galeria_hueca1_idx` (`hue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hueca`
--

CREATE TABLE IF NOT EXISTS `hueca` (
  `hue_id` int(11) NOT NULL AUTO_INCREMENT,
  `hue_nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hue_descripcion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `hue_direccion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hue_horario` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hue_logo` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hue_banner` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hue_menu` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hue_video` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hue_abre` time DEFAULT NULL,
  `hue_cierra` time DEFAULT NULL,
  `dias` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`hue_id`),
  KEY `fk_hueca_categoria_idx` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `hueca`
--

INSERT INTO `hueca` (`hue_id`, `hue_nombre`, `hue_descripcion`, `hue_direccion`, `hue_horario`, `hue_logo`, `hue_banner`, `hue_menu`, `hue_video`, `hue_abre`, `hue_cierra`, `dias`, `cat_id`) VALUES
(1, 'El Buen Sabor', '', 'palmeras y cir. sur', '08:00 - 20:00', 'logotipo_elbuensabor.png', NULL, NULL, NULL, '08:00:00', '20:00:00', '1-6', 1),
(2, 'Don Hugo', '', 'Calle Colon frente a la Bahía', '07:00 - 14:30', 'logo-DonHugo.png', 'Banner Cevicheria.png', NULL, NULL, '07:00:00', '14:30:00', '', 1),
(3, 'El Diamante Dorado', '', 'Urdesa Este Cuba e/ 7ma y 8va', '08:00 - 13:00', 'LogoCevicheria-dorado.png', 'banner_diamante_dorado.png', NULL, NULL, '08:00:00', '13:00:00', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `ped_id` int(11) NOT NULL AUTO_INCREMENT,
  `ped_preciot` decimal(10,0) DEFAULT NULL,
  `ped_subt` decimal(10,0) DEFAULT NULL,
  `ped_fecha` date DEFAULT NULL,
  `cli_cedula` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`ped_id`,`cli_cedula`),
  KEY `fk_pedido_cliente1_idx` (`cli_cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE IF NOT EXISTS `plato` (
  `pla_id` int(11) NOT NULL AUTO_INCREMENT,
  `pla_nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pla_precio` decimal(2,0) DEFAULT NULL,
  `pla_foto` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hue_id` int(11) NOT NULL,
  PRIMARY KEY (`pla_id`,`hue_id`),
  KEY `fk_plato_hueca1_idx` (`hue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `fk_plato_has_pedido_pedido1` FOREIGN KEY (`ped_id`) REFERENCES `pedido` (`ped_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_plato_has_pedido_plato1` FOREIGN KEY (`pla_id`) REFERENCES `plato` (`pla_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `fk_galeria_hueca1` FOREIGN KEY (`hue_id`) REFERENCES `hueca` (`hue_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `hueca`
--
ALTER TABLE `hueca`
  ADD CONSTRAINT `fk_hueca_categoria` FOREIGN KEY (`cat_id`) REFERENCES `categoria` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_cliente1` FOREIGN KEY (`cli_cedula`) REFERENCES `cliente` (`cli_cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `plato`
--
ALTER TABLE `plato`
  ADD CONSTRAINT `fk_plato_hueca1` FOREIGN KEY (`hue_id`) REFERENCES `hueca` (`hue_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
