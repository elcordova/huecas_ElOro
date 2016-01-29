-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-01-2016 a las 14:37:37
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
-- Estructura de tabla para la tabla `hueca`
--

CREATE TABLE IF NOT EXISTS `hueca` (
  `hue_id` int(11) NOT NULL AUTO_INCREMENT,
  `hue_nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hue_descripcion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `hue_direccion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hue_telefono` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hue_horario` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hue_logo` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hue_banner` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hue_menu` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hue_video` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hue_abre` time DEFAULT NULL,
  `hue_cierra` time DEFAULT NULL,
  `dias` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `latitud` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `longitud` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`hue_id`),
  KEY `fk_hueca_categoria_idx` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `hueca`
--

INSERT INTO `hueca` (`hue_id`, `hue_nombre`, `hue_descripcion`, `hue_direccion`, `hue_telefono`, `hue_horario`, `hue_logo`, `hue_banner`, `hue_menu`, `hue_video`, `hue_abre`, `hue_cierra`, `dias`, `latitud`, `longitud`, `cat_id`) VALUES
(1, 'El Bollo que Arde', 'El mejor bollo de Machala', 'Guayas y Boyaca', '', '07:00 - 14:00', 'logoBollo.png', 'BannerBollo.png', 'Menubollo.png', NULL, '07:00:00', '13:00:00', '1-7', '-3.2558962', '-79.957277', 5),
(2, 'Don Hugo', 'Ceviches - Guatita', 'Calle Colon frente a la Bahía', '', '07:00 - 14:30', 'logo-DonHugo.png', 'Banner Cevicheria.png', 'menudonhugo.png', NULL, '07:00:00', '13:30:00', '1-7', '', '', 1),
(3, 'El Diamante Dorado', 'Ceviche Camaron y Pescado - Casuelas', 'Urdesa Este Cuba e/ 7ma y 8va', '', '08:00 - 13:00', 'LogoCevicheria-dorado.png', 'banner_diamante_dorado.png', 'menu_diamante_dorado.png', NULL, '08:00:00', '13:00:00', '1-7', '-3,265336', '-79,935703', 1),
(4, 'Hornado al Paso', 'El mejor hornado de Machala', 'Guayas e/ Bolívar y Pichincha', '', '08:00 - 15:00', 'Fritada.png', 'Banner-HP2.png', NULL, NULL, '08:00:00', '15:00:00', '1-7', '-3.259855', '-79.960888', 5),
(5, 'Las Delicias de Miss', 'La mejor comida típica ', 'Municipalidad e/ Bolívar y Av. Azuay', '', '15:00 - 00:00', 'LOGOya.png', 'bannerDeliciasMiss.png', 'MenuMiss.png', NULL, '15:00:00', '23:00:00', '1-6', '-3.328222', '-79.807272', 5),
(6, 'El Sorbetazo', 'Bocadillos que quitan el estrés.', '9 de Octubre y Bolívar (Esquina) ', '', '09:00 - 20:00', 'logoSorbetazo.png', 'bannerSorbetazo.png', 'MENUSorbetazo.png', NULL, '09:00:00', '20:00:00', '1-6', '-3.326343', '-79.805877', 4),
(7, 'El Sabor de Carrillo', 'Caldo de Tubo - Fritada', 'Machala e/ Pichincha y Buenavista', '', '09:00 - 12:00', 'logoCarrillo.png', 'bannerCarrillo.png', 'menuCarrillo.png', NULL, '09:00:00', '12:00:00', '1-7', '-3.262029', '-79.959825', 5),
(8, 'Sabrosito', 'Batidos - Tostadas', 'Colon y Bolívar ', '', '07:00 - 19:00', 'logoSabrosito.png', 'bannerSabrosito.png', 'menuSabrosito.png', NULL, '07:00:00', '19:00:00', '1-7', '-3.2628553', '-79.9571722', 4),
(9, 'Parrilladas Melanie', 'Carne - Pollo - Chuleta - Ternera - Mixta', 'Parque Lineal - Circunvalación Sur', '', '19:00 - 00:00', 'logo-asado.png', 'banner-asados.png', 'menu-asados.png', NULL, '19:00:00', '23:00:00', '1-7', '-3.266058', '-79.974268', 6),
(10, 'El Rico Yapingacho', 'Yapingacho - Hornado - Chuleta', 'Parque Lineal', '', '19:00 - 23:00', 'logo-hornado.png', 'banner-hornado.png', 'menu-hornado.png', NULL, '19:00:00', '23:00:00', '1-7', '-3.263770', '-79.272112', 5),
(11, 'Frutas Tropicales', 'Batidos - Jugos - Ensaladas', 'Parque Lineal', '', '08:00 - 12:00', 'logoFT.png', 'BannerFT.png', 'MenuFT.png', NULL, '08:00:00', '12:00:00', '1-7', '-3.264745', '-79.973190', 4),
(12, 'Shola''o', 'Granizados - Hamburguesas', 'Parque Lineal', '', '16:00 - 22:00', 'logoSholaoF.png', 'bannerSh.png', 'menus.png', NULL, '16:00:00', '21:00:00', '1-7', '-3.264745', '-79.973190', 7),
(13, 'Risto Pizza', 'Pizza - Lasagna', 'Arizaga y 10ma Este', '', '05:00 - 23:00', 'LogoPizzaRisto.png', 'BaneRisto.png', 'menuRisto.png', NULL, '05:00:00', '22:00:00', '1-7', '-3.269792', '-79.952536', 3),
(14, 'Frutilandia', 'Buffete de Frutas', 'Babahoyo y 25 de Junio', '', '10:00 - 22:00', 'logoFrutilandia.png', 'banerFrutilandia.png', 'menuFrutilandia2.png', NULL, '10:00:00', '21:00:00', '1-7', '-3.269792', '-79.952536', 4),
(15, 'Caldo de Tubo Luisin', 'Caldo de Tubo', 'Ayacuho e/ Kleber Franco y Guabo (Frente a Wa', '', '08:00 - 13:00', 'logoCerdo.png', 'bannercorregido.png', 'menuCaldoTubo.png', NULL, '08:00:00', '12:00:00', '1-7', '-3.254160', '-79.957389', 5),
(16, 'El Buen Sabor', 'Ceviche Blanco - Rojo - Mixto', 'Boyaca e/ Guayas y 9 de Mayo', '', '09:00 - 00:00', 'logotipo_elbuensabor.png', 'banner_elbuensabor.png', 'menubuensabor.png', NULL, '09:00:00', '23:00:00', '1-7', '-3.256426', '-79.957440', 1),
(17, 'Parrilladas 3 de Oro', 'Las mejores carnes', 'Tarqui y Klever Franco', '', '17:00 - 22:00', 'parrillada_logo.png', 'bannerr3.png', 'menu3.png', NULL, '17:00:00', '22:00:00', '1-7', '-3.15276 ', '-79.57103', 6),
(18, 'La Proa', 'Ceviche - Encebollados', 'Guabo e/ Tarqui y Junín', '0995787332', '07:00 - 17:00', 'laproa.png', 'BANNERLAPROA.png', 'MENULAPROA.png', NULL, '07:00:00', '17:00:00', '1-7', '-3.258077', '-79.954198', 1),
(19, 'Empanadas La Gordita', 'Empanadas', 'Bolívar e/ Tarqui y Colon (Parque del Tanque ', '0984417291', '16:00 - 20:00', 'logoLG.png', 'bannerLG.png', 'menulagorda.png', NULL, '16:00:00', '20:00:00', '1-5', '-3.262566', '-79.957494', 5),
(20, 'Picantería Caribe', 'Arroz - Ceviches - Melosos', 'Puerto Jelí  - Roberto Sorrosa', '0981179226', '07:00 - 18:30', 'logo-Picanteria.png', 'BANNERPICANTERIA.png', 'MENUPICANTERIAA.png', NULL, '07:00:00', '17:00:00', '1-7', '', '', 1),
(21, 'La Takiza', 'Tacos - Hot Dogs - Hamburguesas', '25 de Junio e/ Ave. Las Palmeras y Vela', NULL, '17:00 - 00:00', 'Logotipo.png', 'banner-takiza.png', NULL, NULL, '17:00:00', '23:00:00', '1-6', '-3.25598', '-79.96216', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hueca`
--
ALTER TABLE `hueca`
  ADD CONSTRAINT `fk_hueca_categoria` FOREIGN KEY (`cat_id`) REFERENCES `categoria` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
