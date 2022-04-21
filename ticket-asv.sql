-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2021 a las 15:33:25
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ticket-asv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resp_zona`
--

CREATE TABLE `resp_zona` (
  `ID` int(11) NOT NULL,
  `ZONA` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `RESPONSABLE` varchar(75) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `TEL` varchar(25) NOT NULL,
  `CORREO` varchar(75) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `DIRECCION` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resp_zona`
--

INSERT INTO `resp_zona` (`ID`, `ZONA`, `RESPONSABLE`, `TEL`, `CORREO`, `DIRECCION`) VALUES
(1, 'MERIDA', 'Obed castillo medina', '9991601734', 'obed.castillo@cfe.mx', 'Calle 22 No. 360 por 31-A Col. Lopez Mateos CP. 97159 Merida Yucatan\r\n'),
(2, 'CANCUN', 'Guillermo Centeno Rodriguez', '9981955234', 'guillermo.centeno@cfe.mx', 'Region 96 Manzanas 59 y 60 CP. 77535 Cancun Quintana Roo'),
(3, 'TICUL', 'Luis Fernando Morales Rodriguez', '9971114736', 'luis.moralesro@cfe.mx', 'Km. 1.5 Carretera Ticul-Dzan CP. 97860 Ticul Yucat?n\r'),
(4, 'CAMPECHE', 'Roberto Castillo Miranda', '9811134938', 'rodrigo.castillo@cfe.mx', 'Av. Resurgimiento # 61 Col. Prado C.P. 24040 Campeche Campeche'),
(5, 'CARMEN', 'Alejandro Munoz Ramirez', '9381047102', 'alejandro.munozr@cfe.mx', 'Calle 47 No. 1 Col. Pallas CP. 24140 Ciudad del Carmen Campeche'),
(6, 'TIZIMIN', 'Geronimo Perez Avilez', '9858085277', 'geronimo.perez@cfe.mx', 'Calle 38 por 59 y 61 Num. 417 Col Santa Cruz CP 97700  Tizimin Yucatan\r\n'),
(7, 'CHETUMAL', 'Victor Zapata Matos', '9831379534', 'victor.zapatam@cfe.mx', 'Av.  Aaron Merino Fernandez No 919 Esquina Av. Insurgentes CP 77029 Chetumal Quintana Roo'),
(8, 'MOTUL', 'Mauro de la Cruz Herrera', '9911079108', 'mauro.delacruz@cfe.mx', 'Tablaje Catastral CP 12724 Col. Ampliacion CD. Industrial Felipe Carrillo Puerto por Anillo Periferi'),
(9, 'RIVIERA MAYA', 'Victor Emanuel Valencia Diaz', '9841518757', 'victor.valenciad@cfe.mx', 'AV. PENTEMPICH SM 72 M 2 Colonia ARCO VIAL CP 77725 Playa del Carmen Quintana Roo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(20) NOT NULL,
  `servicios` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `servicios`) VALUES
(1, 'Aplicacion de pintura blanco y naranja para torre arriostrada segun normatividad de la SCT'),
(2, 'Aplicacion de pintura blanca y naranja para torre autosoportada segun normatividad de la SCT'),
(3, 'Aplicacion de pintura blanco y naranja  para poste troncoconico segun normatividad de la SCT'),
(4, 'Aplicacion de pintura primario contra oxido para poste troncoconico'),
(5, 'Aplicacion de pintura primario contra oxido torre arriostrada'),
(6, 'Aplicacion de pintura primario contra oxido torre autosoportada'),
(7, 'Desmontar torre arriostrada en el rango de 15 a 60 metros de altura'),
(8, 'Desmontar antena para torre arriostrada autosoportada o poste troncoconico'),
(9, 'Desmontar bajante para torre arriostrada autosoportada o poste troncoconico en el rango de 15 a 60 metros de altura'),
(10, 'Inspeccion y diagnostico en sitio de las condiciones de la torre. Se debe entregar un reporte del estado y requerimientos de mantto'),
(11, 'Instalacion o cambio de luces para poste troncoconico'),
(12, 'Instalacion o cambio de luces para torres arriostradas'),
(13, 'Instalacion o cambio de luces o cambio de luces para torre autosoportada'),
(14, 'Instalacion o cambio Antena en Torre arriostrada autosoportada o poste troncoconico'),
(15, 'Instalacion o cambio de brazo o soporte de antena para torre arriostrada en el rango de 15 a 60 metros de altura'),
(16, 'Instalacion o cambio de brida para torre arriostrada en el rango de 15 a 60 metros de altura'),
(17, 'Instalacion o cambio de nudos para torre arriostrada en el rango de 15 a 60 metros de altura'),
(18, 'Instalacion o cambio de rozadoras o guardacabos para torre arriostradas en el rango de 15 a 60 metros de altura'),
(19, 'Instalacion o cambio de tornilleria para torre arriostrada en el rango de 15 a 60 metros de altura'),
(20, 'Instalacion o cambio retenida para torre arriostrada en el rango de 15 a 60 metros de altura'),
(21, 'Instalar bajante para torre arriostrada autosoportada o poste troncoconico en el rango de 15 a 60 metros de altura'),
(22, 'Instalar torre arriostrada en el rango de 15 a 60 metros de altura'),
(23, 'Mantenimiento de la tierra fisica del pararrayos para poste troncoconico'),
(24, 'Mantenimiento de la tierra fisica del pararrayos para torres arriostrada'),
(25, 'Mantenimiento de la tierra fisica del pararrayos para torre autosoportada'),
(26, 'Mantenimiento de las barras de cobre de tierra fisica para poste troncoconico'),
(27, 'Mantenimiento de las barras de cobre de tierra fisica para torre autosoportadas'),
(28, 'Mantenimiento de las barras de cobre de tierra fisica para torres arriostrada'),
(29, 'Mantenimiento de sistema pararrayos para poste troncoconico'),
(30, 'Mantenimiento del sistema pararrayos para torre arriostrada en el rango de 15 a 60 metros de altura'),
(31, 'Mantenimiento del sistema pararrayos para torre autosoportada en el rango de 15 a 60 metros de altura'),
(32, 'Peinado o fijacion de los bajantes de la escalerilla para poste troncoconico'),
(33, 'Peinado o fijacion de los bajantes de la escalerilla para torre autosoportada en el rango de 15 a 60 metros de altura. Servicio por metro '),
(34, 'Raspado o cepillado para torre arriostrada en el rango  '),
(35, 'Raspado o cepillado de la torre para poste troncoconico '),
(36, 'Raspado o cepillado de la torre para torre autosoportada  '),
(37, 'Reapretado de tornilleria para poste troncoconico '),
(38, 'Reapretado de tornilleria para torres arriostrada 15 a 60 metros de altura '),
(39, 'Reapriete de tornilleria para torre autosoportada en el rango de 15 a 60 metros de altura '),
(40, 'Reapriete o cambio de arnes de las antenas par torres arriostradas autosoportadas o poste troncoconico'),
(41, 'Reapriete o cambio de arnes de las antenas para torre autosoportada en el rango de 15 a 60 metros de altura '),
(42, 'Sellado de Conectores incluye el suministro e instalacion de materiales descritos en ANEXO D'),
(43, 'Abrazadera sin fin diametro 1-9/16 a 2-1/2 ancho 1/2 de acero inoxidable'),
(44, 'Abrazadera sin fin diametro 3/4 a 1 1/2 ancho 1/2 de acero inoxidable '),
(45, 'Adaptador para sujetadores tipo mariposa para instalacion en angulo con espesor de hasta 0.63. Paquete 10 piezas '),
(46, 'Adaptador para sujetadores tipo mariposa. instalacion en tubo con diametro 0.75a 1.5paquete de 10 piezas '),
(47, 'Base para torre de 30 cm de ancho Placa base acero 1/4 con niple de acero 3/4Galvanizada por inmersion en caliente '),
(48, 'Base para torre de 35 cm de ancho. Placa base acero 1/4 con niple de acero 3/4Galvanizada por inmersion en caliente '),
(49, 'Base para torre de 45 cm de ancho. Placa base acero 1/4 con niple de acero 3/4Galvanizada por inmersion en caliente '),
(50, 'Base para torre de 60 cm de ancho. Placa base acero 1/2 con niple de acero 3/4Galvanizada por inmersion en caliente '),
(51, 'Base para torre de 90 cm de ancho. Placa base acero 3/4 con niple de acero 3/4Galvanizada por inmersion en caliente '),
(52, 'Brida para sujecion de Retenida para torre de 30 cm de ancho por inmersion en caliente tipo Delta con punto de apoyo al centro. '),
(53, 'Brida para sujecion de Retenida para torre de 35 cm de ancho por inmersion en caliente tipo Delta con punto de apoyo al centro. '),
(54, 'Brida para sujecion de Retenida para torre de 45 cm de ancho por inmersion en caliente tipo Delta con punto de apoyo al centro. '),
(55, 'Brida para sujecion de Retenida para torre de 60 cm de ancho por inmersion en caliente tipo Delta con punto de apoyo al centro. '),
(56, 'Brida para sujecion de Retenida para torre de 90 cm de ancho por inmersion en caliente tipo Delta con punto de apoyo al centro. '),
(57, 'Cable de Cobre Recubierto THW-LS Calibre 2/0 AWG 19 Hilos color negro. '),
(58, 'Cable de retenida 7 Hilos Resistencia 1293 Kg. Diametro 3/16. Acero galvanizado para alta resistencia contra corrosion clase A'),
(59, 'Cable de retenida 7 Hilos Resistencia 2154 Kg. Diametro 1/4. Acero galvanizado para alta resistencia contra corrosion clase A'),
(60, 'Cable de retenida 7 Hilos Resistencia 3632 kg. Diametro de 5/16. Acero galvanizado para alta resistencia contra corrosion clase A'),
(61, 'Cable de retenida 7 Hilos Resistencia 4903 Kg. Diametro 3/8. De Acero galvanizado para alta resistencia contra corrosion clase A'),
(62, 'Cable Heliax 7/8 corrugado Descrito ANEXO D'),
(63, 'Copete de torre de 30 cm de ancho. con opresor para pararrayo galvanizado por inmersion en caliente'),
(64, 'Copete de torre de 35 cm de ancho. con opresor para pararrayo galvanizado por inmersion en caliente'),
(65, 'Copete de torre de 45 cm de ancho. con opresor para pararrayo galvanizado por inmersion en caliente'),
(66, 'Copete de torre de 60 cm de ancho. con opresor para pararrayo galvanizado por inmersion en caliente'),
(67, 'Copete de torre de 90 cm de ancho. con opresor para pararrayo galvanizado por inmersion en caliente'),
(68, 'Guardacabo para retenida de 3/8 galvanizado'),
(69, 'Guardacabo para retenida de 5/16 galvanizado'),
(70, 'Guardacabo para retenida de 1/4 galvanizado'),
(71, 'Guardacabo para retenida de 3/16 galvanizado'),
(72, 'Kit de Pararrayo para Torre o Poste tipo Dipolo Corona con Electrodo y Accesorios de instalacion Incluye lo descrito en ANEXO D'),
(73, 'Lampara de Obstruccion Autonoma con Led Color Rojo con Panel Solar configurable con Luz Fija o Estroboscopica '),
(74, 'Mastil de aluminio natural de 2de diametro calibre 18 3 mt de altura.  '),
(75, 'Montaje para lampara tipo obstruccion tipo eigslse. Para torre arriostrada  '),
(76, 'Montaje para lampara tipo obstruccion tipo eigslse. Para torre autosoportada '),
(77, 'Nudo o abrazadera tipo perro galvanizado para retenida de 1/4 de hierro maleable para sujecion de cable de retenida de 1/4'),
(78, 'Nudo o abrazadera tipo perro galvanizado para retenida de 3/16 de hierro maleable'),
(79, 'Nudo o abrazadera tipo perro galvanizado para retenida de 3/8 de hierro maleable para cable de acero'),
(80, 'Nudo o abrazadera tipo perro galvanizado para retenida de 5/16 de hierro maleable para cable de acero'),
(81, 'Paquete de 6 tornillos y tuercas de acero inoxidable 1/2x3 1/2 para ambientes corrosivos y zonas de alta humedad'),
(82, 'Paquete de 6 tornillos y tuercas de acero inoxidable 1/4x1 1/4 para ambientes corrosivos y zonas de alta humedad'),
(83, 'Paquete de 6 tornillos y tuercas de acero inoxidable 3/4x4 para ambientes corrosivos y zonas de alta humedad'),
(84, 'Paquete de 6 tornillos y tuercas de acero inoxidable 3/8x2 para ambientes corrosivos y zonas de alta humedad '),
(85, 'Pintura a base de agua blanca para torre. Esmalte alquidalico anticorrosivo a base de agua de alta durabilidad'),
(86, 'Pintura a base de agua naranja para torre. Esmalte alquidalico anticorrosivo a base de agua de alta durabilidad.'),
(87, 'Pintura esmalte anticorrosivo blanco. Esmalte alquidalico anticorrosivo libre de plomo'),
(88, 'Pintura esmalte anticorrosivo naranja. Esmalte alquidalico anticorrosivo libre de plomo'),
(89, 'Pintura primaria anticorrosiva. Esmalte alquidalico anticorrosivo libre de plomo'),
(90, 'Placas igualadoras con tornilleria y separadores para 5 retenidas. Galvanizado en inmersion de 20x20x50 cm '),
(91, 'Punta pararrayo tipo dipolo corona con angulo proteccion de 72   '),
(92, 'Sujetador tipo mariposa para cable de 1/2y 3/8. Paquete de 10 PZAS. '),
(93, 'Tensor de acero forjado 5/8x9 tipo ojo gancho galvanizado'),
(94, 'Tensor tipo ude doble tuerca con dos tuercas de rosca o con arandela de presion'),
(95, 'Tramo de torre arriostrada de 3 metros de 30 cm de ancho de cara galvanizado por inmersion en caliente para zona humedas '),
(96, 'Tramo de torre arriostrada de 3 metros de 35 cm de ancho de cara galvanizado por inmersion en caliente para zona humedas '),
(97, 'Tramo de torre arriostrada de 3 metros de 45 cm de ancho de cara galvanizado por inmersion en caliente para zona humedas '),
(98, 'Tramo de torre arriostrada de 3 metros de 60 cm de ancho de cara galvanizado por inmersion en caliente para zona humedas '),
(99, 'Tramo de torre arriostrada de 3 metros de 90 cm de ancho de cara galvanizado por inmersion en caliente para zona humedas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id_tickets` int(90) NOT NULL,
  `id_usuario` int(75) NOT NULL,
  `zona` int(75) NOT NULL,
  `titular` varchar(150) NOT NULL,
  `ciudad` varchar(75) NOT NULL,
  `tipo` varchar(75) NOT NULL,
  `altura` varchar(35) NOT NULL,
  `ubicacion` varchar(90) NOT NULL,
  `solicitante` varchar(100) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `licencia` varchar(100) NOT NULL,
  `fch_ini` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fch_fin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`id_tickets`, `id_usuario`, `zona`, `titular`, `ciudad`, `tipo`, `altura`, `ubicacion`, `solicitante`, `celular`, `correo`, `descripcion`, `licencia`, `fch_ini`, `fch_fin`, `estado`) VALUES
(1, 0, 2, '1', '2', 'Arriostrada', '', '', 'issac', '9991298212', 'iskansa@saks.com', '	prueba	', 'llalallal', '2021-08-06 17:56:41', '0000-00-00 00:00:00', 3),
(2, 0, 4, '4', '', 'Arriostrada', '21', '81', 'mariana', '9991609559', 'isaacpacheco.go@gmail.com', 'Mensaje de prueba', 'CFE-0001-0023', '2021-08-07 23:06:48', '0000-00-00 00:00:00', 1),
(3, 0, 4, '4', '', 'Arriostrada', '21', '81', 'mariana', '9991609559', 'isaacpacheco.go@gmail.com', 'Mensaje de prueba', 'CFE-0001-0023', '2021-08-07 23:07:11', '0000-00-00 00:00:00', 2),
(4, 0, 4, '4', '', '45', 'Arriostrada', '71', 'karla', '9991609559', 'isaacpacheco.go@gmail.com', 'HOLA MUNDO', 'CFE-0001-0024', '2021-08-08 03:37:00', '0000-00-00 00:00:00', 1),
(5, 0, 1, '1', '', 'Arriostrada', '12', '2', 'yy', '9991609559', 'uuu@ss', 'adadad', 'CFE-0001-0025', '2021-08-08 05:29:59', '0000-00-00 00:00:00', 1),
(6, 0, 1, '1', '1', 'Autosoportada', '70', '20.966783,-89.614361', 'maria', '9991609560', 'prueba@gmail.com', 'iahsoias', 'CFE-0001-0026', '2021-08-08 05:35:58', '0000-00-00 00:00:00', 1),
(7, 0, 1, '1', '', '36', 'Arriostrada', '16', 'Karla Leticia Coyoc Morales', '9993266970', 'karla@asv.com.mx', 'srgtdrg', 'rerew', '2021-08-08 20:11:13', '0000-00-00 00:00:00', 1),
(8, 4, 1, '1', '', '42', 'Poste Troncoconico', '13', 'karla', '9993266970', 'karla@asv.com.mx', 'adsjhkasj', '523452', '2021-08-08 20:26:02', '0000-00-00 00:00:00', 1),
(9, 4, 3, '3', '', '30', 'ARRIOSTRADA', '49', 'mario', '9991609559', 'karla@prueba.com.mx', 'askudgais', 'CFE-00023-FE11', '2021-08-08 20:30:55', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_usuario`
--

CREATE TABLE `tip_usuario` (
  `ID` int(11) NOT NULL,
  `TIP_USUARIO` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tip_usuario`
--

INSERT INTO `tip_usuario` (`ID`, `TIP_USUARIO`) VALUES
(1, 'admin'),
(2, 'usuario'),
(3, 'soporte'),
(4, 'tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id_trabajo` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id_trabajo`, `id_ticket`, `id_servicio`, `foto1`, `foto2`) VALUES
(1, 1, 44, 'prueba.jpg', 'prueba2.jpg'),
(2, 1, 5, 'prueba3.jpg', 'prueba4.jpg'),
(3, 2, 48, 'prueba5.jpg', 'prueba6.jpg'),
(4, 2, 4, '', ''),
(5, 2, 4, '', ''),
(6, 4, 4, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciones`
--

CREATE TABLE `ubicaciones` (
  `ID_UB` int(15) NOT NULL,
  `ZON` int(25) NOT NULL,
  `NOM_SITIO` varchar(150) NOT NULL,
  `TIPO` varchar(75) NOT NULL,
  `ALTURA` int(20) NOT NULL,
  `LAT` varchar(150) NOT NULL,
  `LON` varchar(150) NOT NULL,
  `LATITUD` varchar(200) NOT NULL,
  `LONGITUD` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ubicaciones`
--

INSERT INTO `ubicaciones` (`ID_UB`, `ZON`, `NOM_SITIO`, `TIPO`, `ALTURA`, `LAT`, `LON`, `LATITUD`, `LONGITUD`) VALUES
(1, 1, 'S.E. Centro', 'Autosoportada', 70, '20? 58\' 00.41\'\'', '89? 36\' 51.69', '20.966783', '-89.614361'),
(2, 1, 'S.E. Progreso', 'Arriostrada', 12, '21? 16\' 38.73\'\'', ' 89? 39\' 34.44', '21.277425', '-89.659567'),
(3, 1, 'S.E. Alom', 'Autosoportada', 45, '20? 58\' 12.24\'\'', ' 89? 40\' 7.10', '20.970067', '-89.668639'),
(4, 1, 'S.E. Hunucma 115 Kv', 'Autosoportada', 43, '21? 01\' 31.47\'\'', ' 89? 50\' 56.18', '21.025411', '-89.848939'),
(5, 1, 'S.E. Cholul', 'Arriostrada', 15, '21? 01\' 21.11\'\'', ' 89? 33\' 38.13', '21.022531', '-89.560592'),
(6, 1, 'S.E. San Ignacio', 'Arriostrada', 30, '21? 13\' 5.81\'\'', ' 89? 39\' 19.00', '21.218283', '-89.655278'),
(7, 1, 'S.E. Itzaes', 'Arriostrada', 21, '20? 57\' 24.09\'\'', ' 89? 38\' 49.74', '20.956694', '-89.64715'),
(8, 1, 'S.E. Merida Oriente', 'Arriostrada', 27, '20? 56\' 48.66\'\'', ' 89? 33\' 53.57', '20.94685', '-89.564883'),
(9, 1, 'S.E. Metropolitana', 'Autosoportada', 45, '20? 53\' 48.23\'\'', '89? 39\' 28.06', '20.896733', '-89.657797'),
(10, 1, 'S.E. Uman', 'Arriostrada', 21, '20? 51\' 16.30\'\'', '89? 44\' 41.75', '20.854528', '-89.744931'),
(11, 1, 'S.E. Chuburna', 'Arriostrada', 21, '21? 01\' 19.52\'\'', '89? 38\' 56.95', '21.02209', '-89.649154'),
(12, 1, 'S.E. Crucero', 'Arriostrada', 36, '20? 51\' 34.03\'\'', '90? 11\' 24.12', '20.859453', '-90.190036'),
(13, 1, 'CCD Merida', 'Poste Troncoconico', 42, '21? 01\' 20.48\'\'', '89? 38\' 56.51', '21.022358', '-89.649031'),
(14, 1, 'Agencia Uman', 'Arriostrada', 36, '20? 52\' 57.30\'\'', '89? 45\' 0.87', '20.882584', '-89.750244'),
(15, 1, 'Agencia Acanceh', 'Arriostrada', 33, '20? 48\' 41.83\'\'', '89? 27\' 9.58', '20.81162', '-89.452662'),
(16, 1, 'Agencia Progreso', 'Arriostrada', 36, '21? 17\' 00.71\'\'', '89? 39\' 13.15', '21.283531', '-89.653654'),
(17, 1, 'Agencia Conkal', 'Arriostrada', 15, '21? 04\' 16.06\'\'', '89? 31\' 16.65', '21.071129', '-89.521294'),
(18, 1, 'Agencia Hunucma', 'Arriostrada', 21, '21? 01\' 21.69\'\'', '89? 51\' 50.94', '21.022693', '-89.86415'),
(19, 1, 'Centro Dist Poniente', 'Arriostrada', 45, '20? 59\' 34.72\'\'', '89? 40\' 34.61', '20.992978', '-89.676282'),
(20, 1, 'Centro Dist Poniente', 'Arriostrada', 12, '20? 59\' 33.86\'\'', '89? 40\' 33.05', '20.992741', '-89.675849'),
(21, 1, 'Centro Dist Poniente', 'Arriostrada', 15, '20? 59\' 34.90\'\'', '89? 40\' 33.21', '20.99303', '-89.675892'),
(22, 1, 'CCD Merida', 'Arriostrada', 18, '21? 01\' 20.48\'\'', '89? 38\' 56.51', '21.022358', '-89.649031'),
(23, 1, 'Edificio Divisional', 'Arriostrada', 42, ' 20?59\'41.27', '89?37\'5.17 ', '20.994797', '-89.618269'),
(24, 2, 'REGION 96', 'ARRIOSTRADA', 40, '21?8\'36.7', '86?52\'14.4', '21.14352778', '86.87066667'),
(25, 2, 'S.E. KABAH', 'ARRIOSTRADA', 21, '21?6\'16', '86?45\'50.7', '21.10444444', '86.76408333'),
(26, 2, 'S.E. KUKULKAN', 'ARRIOSTRADA', 18, '21?6\'18.8', '86?45\'51', '21.10522222', '86.76416667'),
(27, 2, 'S.E. NICTE-HA', 'ARRIOSTRADA', 27, '21?1\'53.9', '86?48\'33.7', '21.02330556', '86.80936111'),
(28, 2, 'S.E. ISLA', 'ARRIOSTRADA', 18, '21?15\'28.2', '86?45\'60.5', '21.25783333', '86.76666639'),
(29, 2, 'S.E. PUERTO JUAREZ', 'AUTOSOPORTADA', 50, '21?10\'27.1', '86?50\'46.8', '21.17419444', '86.84633333'),
(30, 2, 'S.E. PUERTO MORELOS', 'AUTOSOPORTADA', 24, '21?51\'22', '86?54\'25.9', '21.85611111', '86.90719444'),
(31, 2, 'S.E. CHAAC', 'ARRIOSTRADA', 24, '21?3\'33.9', '86?46\'97.8', '21.05941667', '86.78333331'),
(32, 2, 'S.E. HUNAB-KU', 'ARRIOSTRADA', 24, '21?5\'28.5', '86?46\'32.3', '21.09125', '86.77563889'),
(33, 2, 'S.E. POK TA POK', 'ARRIOSTRADA', 30, '21?8\'18.34', '86?44\'78.3', '21.30944444', '86.74999972'),
(34, 2, 'S.E. NICHUPTE', 'AUTOSOPORTADA', 24, '21?8\'60.1', '86?47\'32.2', '21.14999972', '86.79227778'),
(35, 2, 'S.E. BONAMPAK', 'ARRIOSTRADA', 27, '21?9\'47.6', '86?49\'17', '21.16322222', '86.82138889'),
(36, 2, 'S.E. YAXCHE', 'ARRIOSTRADA', 15, '21?9\'60', '86?54\'14.7', '21.16666664', '86.90408333'),
(37, 2, 'S.E. CANEK', 'AUTOSOPORTADA', 40, '21?8\'62.6', '86?52\'23.8', '21.14999997', '86.87327778'),
(38, 2, 'S.E. PLAYA MUJERES', 'AUTOSOPORTADA', 36, '21?14\'3.34', '86?48\'25.03', '21.23426111', '86.80695278'),
(39, 2, 'S.E. MOON PALACE', 'AUTOSOPORTADA', 36, '20?59\'5.62', '86?52\'57.46', '20.98489444', '86.88262778'),
(40, 2, 'S.E. PUNTASAM', 'AUTOSOPORTADA', 24, '21?11\'45.14', '86?49\'39.73', '21.19375', '86.82770278'),
(41, 2, 'S.E. BONFIL', 'AUTOSOPORTADA', 24, '21?6\'0.1', '86?51\'49.22', '21.10002778', '86.86367222'),
(42, 2, 'S.E. KEKEN', 'AUTOSOPORTADA', 24, '21?11\'37.5', '86?52\'35.31', '21.19375', '86.876475'),
(43, 2, 'S.E. KOHUNLICH', 'AUTOSOPORTADA', 24, '21?8\'7.89', '86?54\'47.15', '21.135525', '86.91309722'),
(44, 2, 'S.E. IXCHEL', 'AUTOSOPORTADA', 24, '21?16\'51.23', '86?49\'23.12', '21.28089722', '86.82308889'),
(45, 3, 'OFICINAS ZONA TICUL', 'ARRIOSTRADA', 60, '20?23\'49.61', '89?31\'13.29', '20.39711389', '89.52035833'),
(46, 3, 'CCC ZONATICUL', 'ARRIOSTRADA', 60, '20?23\'49.62', '89?31\'13.30', '20.39711667', '89.52036111'),
(47, 3, 'AG TICUL', 'ARRIOSTRADA', 30, ' 20?23\'54.45N', ' 89?32\'11.63O', '20.39845833', '89.53656389'),
(48, 3, 'AG MAXCANU', 'ARRIOSTRADA', 60, '20?35\'1.83', '90?00\'3.97O', '20.58384167', '90.00110278'),
(49, 3, 'S.E. TICUL', 'ARRIOSTRADA', 30, ' 20?23\'48.33N', ' 89?33\'22.23O', '20.39675833', '89.556175'),
(50, 3, 'S.E. TKD', 'ARRIOSTRADA', 30, ' 20?13\'18.06N', ' 89?18\'27.98O', '20.22168333', '89.30777222'),
(51, 3, 'AG. PETO', 'ARRIOSTRADA', 30, ' 20? 7\'6.80N', '88?55\'23.90O', '20.11855556', '88.92330556'),
(52, 3, 'SE TIXMEHUAC', 'AUTOSOPORTADA', 60, ' 20?14\'0.79N', ' 89?06\'2.96O', '20.23355278', '89.10082222'),
(53, 3, 'S.E. MUNA', 'ARRIOSTRADA', 60, ' 20?28\'41.20N', ' 89?42\'52.40O', '20.47811111', '89.71455556'),
(54, 3, 'REPETIDOR TEKAX', 'AUTOSOPORTADA', 60, ' 20?12\'19.70N', ' 89?18\'47.20O', '20.20547222', '89.31311111'),
(55, 3, 'REPETIDOR CALCETOK', 'AUTOSOPORTADA', 60, '', '', '', ''),
(56, 3, 'REPETIDOR TEKAX', 'AUTOSOPORTADA', 60, ' 20?12\'19.70N', ' 89?18\'47.20O', '20.20547222', '89.31311111'),
(57, 3, 'SE UXMAL', 'ARRIOSTRADA', 60, '20?24\'13.17N', ' 89?45\'51.16O', '20.40365833', '89.76421111'),
(58, 3, 'SE HALACHO', 'ARRIOSTRADA', 60, ' 20?30\'23.31N', ' 90? 4\'18.07O', '20.506475', '90.07168611'),
(59, 3, 'SE OPICHEN', 'ARRIOSTRADA', 60, ' 20?33\'1.41N', ' 89?51\'48.85O', '20.55039167', '89.86356944'),
(60, 3, 'SE TABI', 'ARRIOSTRADA', 60, ' 20?14\'58.73N', ' 89?32\'31.62O', '20.24964722', '89.54211667'),
(61, 3, 'SE TEKIT', 'ARRIOSTRADA', 60, ' 20?31\'25.28N', ' 89?20\'22.47O', '20.52368889', '89.339575'),
(62, 3, 'SE DZAN', 'ARRIOSTRADA', 60, ' 20?23\'25.67N', ' 89?28\'46.50O', '20.39046389', '89.47958333'),
(63, 3, 'SE TABI', 'ARRIOSTRADA', 60, ' 20?14\'58.73N', ' 89?32\'31.62O', '20.24964722', '89.54211667'),
(64, 3, 'SE OXKUTZCAB', 'ARRIOSTRADA', 60, ' 20?17\'42.40N', ' 89?23\'55.97O', '20.29511111', '89.39888056'),
(65, 3, 'SE TEKAX II', 'ARRIOSTRADA', 60, ' 20?13\'18.06N', ' 89?18\'27.98O', '20.22168333', '89.30777222'),
(66, 3, 'SE TEKA I', 'ARRIOSTRADA', 60, ' 20?12\'29.09N', ' 89?18\'0.87O', '20.20808056', '89.30024167'),
(67, 3, 'SE TZUCACAB', 'ARRIOSTRADA', 60, ' 20? 4\'2.17N', ' 89? 2\'23.72O', '20.06726944', '89.03992222'),
(68, 3, 'SE PETO', 'ARRIOSTRADA', 60, ' 20? 5\'59.73N', ' 88?55\'2.75O', '20.099925', '88.91743056'),
(69, 4, 'ZONA CAMPECHE', 'Arriostrada', 60, '19? 50\' 4.9488', '-90? 33\' 10.9404', ' 19.834708?', '-90.553039?'),
(70, 4, 'S.E. SAMULA I', 'Autosoportada', 40, '19? 49\' 16.9356', '-90? 32\' 33.0972', ' 19.821371?', '-90.542527?'),
(71, 4, 'S.E. SAMULA I', 'Arriostrada', 45, '19? 49\' 16.9356', '-90? 32\' 33.0972', ' 19.821371?', '-90.542527?'),
(72, 4, 'S.E. SAMULA II', 'Arriostrada', 21, '19? 48\' 33.2064', ' -90? 30\' 23.1912', ' 19.809224?', '-90.506442?'),
(73, 4, 'S.E. KALA', 'Arriostrada', 39, '19? 51\' 3.3768', ' -90? 28\' 39.3888', ' 19.850938?', '-90.477608?'),
(74, 4, 'S.E. AH KIM PECH', 'Autosoportada', 48, '19? 51\' 49.6044', '-90? 30\' 20.9484', ' 19.863779?', '-90.505819?'),
(75, 4, 'S.E. CAYAL', 'Arriostrada', 51, '19? 43\' 39.2808', '-90? 10\' 30.2016', ' 19.727578?', '-90.175056?'),
(76, 4, 'S.E. CAYAL', 'Arriostrada', 19, '19? 43\' 39.2808', '-90? 10\' 30.2016', ' 19.727578?', '-90.175056?'),
(77, 4, 'S.E. HOPELCHEN 115', 'Arriostrada', 51, '19? 44\' 41.0316', '-89? 50\' 53.5884', ' 19.744731?', '-89.848219?'),
(78, 4, 'S.E. HELCELCHAKAN', 'Arriostrada', 21, '20? 11\' 17.0232', '-90? 7\' 6.5172', ' 20.188062?', '-90.118477?'),
(79, 4, 'TORRE S.E. CALKINI', 'Arriostrada', 25, '20? 22\' 37.2396', '-90? 3\' 46.9692', ' 20.377011?', '-90.063047?'),
(80, 4, 'REPETIDOR AG. CALKINI', 'Arriostrada', 45, '20? 22\' 3.2916', '-90? 2\' 38.7312', ' 20.367581?', '-90.044092?'),
(81, 4, 'REPETIDOR ESPERANZA', 'Arriostrada', 21, '19? 19\' 56.3304', '-90? 43\' 22.1988', ' 19.332314?', '-90.722833?'),
(82, 4, 'AGENCIA CHAMPOTON', 'Arriostrada', 25, '19? 20\' 20.5872', '-90? 43\' 35.148', ' 19.339052?', '-90.726430?'),
(83, 4, 'S.E. CHICBUL', 'Arriostrada', 45, '18? 45\' 5.8572', '-90? 57\' 9.4392', ' 18.751627?', '-90.952622?'),
(84, 4, 'TRONCOCONICO AG ESCARCEGA', 'Troncoconico', 30, '18? 36\' 10.0224', '-90? 43\' 51.9492', ' 18.602784?', '-90.731097?'),
(85, 4, 'S.E. X-PUJIL', 'Autosoportada', 30, '18? 31\' 57.8568', '-89? 24\' 3.7836', ' 18.532738?', '-89.401051?'),
(86, 4, 'S.E. CANDELARIA', 'Arriostrada', 35, '18? 11\' 20.4468', '-91? 2\' 41.4672', ' 18.189013?', '-91.044852?'),
(87, 4, 'TORRE AG CANDELARIA', 'Arriostrada', 45, '18? 11\' 20.4468', '-91? 2\' 41.4672', ' 18.189013?', '-91.044852?'),
(88, 4, 'TRONCOCONICO SIHOCHAC', 'Troncoconico', 45, '19? 29\' 59.838', '-90? 35\' 39.084', ' 19.499955?', '-90.594190?'),
(89, 5, 'S.E. Palmar', 'Autosoportada', 42, ' 18?47\'34.27N', ' 91?29\'22.97O', '18.79285278', '91.48971389'),
(90, 5, 'Nuevo Progreso', 'Arriostrada', 19, '18?37\'19.70', '92?17\'33.37', '18.62213889', '18.64416389'),
(91, 5, 'S.E. Concordia', 'Arriostrada', 19, ' 18?38\'4.43N', ' 91?49\'26.64O', '18.63456389', '91.82406667'),
(92, 5, 'S.E. Laguna de Terminos', 'Autosoportada', 42, ' 18?38\'55.00N', ' 91?49\'1.27O', '18.64861111', '91.81701944'),
(93, 5, 'S.E. Carmen', 'Arriostrada', 19, ' 18?39\'28.27N', ' 91?47\'45.32O', '18.65785278', '91.79592222'),
(94, 5, 'Zona Carmen', 'Arriostrada', 42, '18?38\'38.99', '91?50\'34.17', '18.64416389', '91.842825'),
(95, 7, 'Agencia Morelos', 'Arriostrada', 45, '19? 44\' 50.3412', '-88? 42\' 39.5892', ' 19.747317?', '-88.710997?'),
(96, 7, 'Agencia Felipe Carrillo P.', 'Arriostrada', 60, '19? 34\' 43.3632', '-88? 2\' 33.9972', ' 19.578712?', '-88.042777?'),
(97, 7, 'S.E. Mahahual', 'Arriostrada', 45, '18? 45\' 5.1444', '-87? 43\' 0.588', ' 18.751429?', '-87.716830?'),
(98, 7, 'S.E. Mahahual', 'Arriostrada', 9, '18? 45\' 6.93', '-87? 43\' 2.4852', ' 18.751925?', '-87.717357?'),
(99, 7, 'Agencia Bacalar', 'Arriostrada', 21, '18? 40\' 16.2372', '-88? 23\' 33.6372', ' 18.671177?', '-88.392677?'),
(100, 7, 'S.E. Chetumal Norte', 'Arriostrada', 12, '18? 31\' 56.7696', '-88? 17\' 48.7572', ' 18.532436?', '-88.296877?'),
(101, 7, 'S.E. Ucum', 'Arriostrada', 21, '18? 30\' 25.7328', '-88? 30\' 48.6972', ' 18.507148?', '-88.513527?'),
(102, 7, 'Francisco Villa', 'Autosoportada', 21, '18? 28\' 41.1564', '-88? 50\' 5.244', ' 18.478099?', '-88.834790?'),
(103, 7, 'S.E. Insurgentes', 'Autosoportada', 50, '18? 31\' 7.788', '-88? 19\' 51.5244', ' 18.518830?', '-88.330979?'),
(104, 7, 'S.E. Lazaro Cardenaz', 'Autosoportada', 50, '18? 57\' 16.5276', '-88? 11\' 37.2084', ' 18.954591?', '-88.193669?'),
(105, 7, 'ISC Zona Chetumal', 'Arriostrada', 45, '18? 31\' 9.5664', '-88? 19\' 48.3528', ' 18.519324?', '-88.330098?'),
(106, 6, 'SUBESTACION VALLADOLID', 'Autosoportada', 45, '20.70651667', '88.20373611', '20?42\'23.46\'\'N', '88?12\'13.45\'\'W'),
(107, 6, 'REPETIDOR POPOLNAH', 'Autosoportada', 50, '20.98645', '87.50362222', '20?59\'11.22\'\'N', '87?30\'13.04\'\'W'),
(108, 6, 'REPETIDOR SAN PEDRO', 'Autosoportada', 45, '20.364575', '87.26518333', '20?21\'52.47\'\'N', '88?15\'54.66\'\'W'),
(109, 6, 'REPETIDOR DZITAS', 'Autosoportada', 45, '20.832825', '87.53808056', '20?49\'58.17\'\'N', '88?32\'17.09\'\'W'),
(110, 6, 'REPETIDOR LOCHE', 'Autosoportada', 50, '21.386275', '88.14327778', '21?23\'10.59N', '88?8\'35.80W'),
(111, 6, 'REPETIDOR VALLADOLID', 'Arriostrada', 90, '20.68532222', '88.18030278', '20?41\'7.16\'\'N', '88?10\'49.09\'\'W'),
(112, 6, 'REPETIDOR PISTE', 'Autosoportada', 70, '20.69499444', '88.58325833', '20?41\'41.98N', '88?34\'59.73W'),
(113, 6, 'REPETIDOR KANTUNILKIN', 'Arriostrada', 60, '21.08770278', '87.48712778', '21?5\'15.73N', '87?29\'13.66W'),
(114, 6, 'REPETIDOR MOCTEZUMA', 'Arriostrada', 21, '21.42959722', '88.14327778', '21?25\'46.55N', '88?8\'35.80W'),
(115, 6, 'AGENCIA VALLADOLID', 'Arriostrada', 18, '20.69316667', '88.19488889', '20?41\'35.4N', '88?11\'41.6W'),
(116, 6, 'SUBESTACION CHEMAX', 'Autosoportada', 45, '20.66322222', '87.92666667', '20?39\'47.6N', '87?55\'36.0W'),
(117, 6, 'AGENCIA KANTUNILKIN', 'Arriostrada', 21, '21.10025', '87.48736111', '21?06\'00.9N', '87?29\'14.5W'),
(118, 6, 'SUBESTACION SUCILA', 'Arriostrada', 30, '21.15694444', '88.34930556', '21?09\'25.0N', '88?20\'57.5W'),
(119, 6, 'ZONA N0', 'Arriostrada', 18, '21.13661111', '88.14469444', '21?08\'11.8N', '88?08\'40.9W'),
(120, 6, 'AGENCIA PISTE', 'Arriostrada', 12, '20.69499444', '88.58325833', '20?41\'41.98N', '88?34\'59.73W'),
(121, 8, 'CCC ZONA MOTUL', 'Arriostrada', 46, ' 21? 6\'53.40N', ' 89?17\'3.00O', '21.11483333', '89.28416667'),
(122, 8, 'Agencia HOCTUN', 'Arriostrada', 40, ' 20?51\'49.68N', ' 89?12\'26.23O', '20.8638', '89.20728611'),
(123, 8, 'Agencia CANSAHCAB', 'Arriostrada', 34, ' 21? 9\'26.58N', ' 89? 6\'22.21O', '21.15738333', '89.10616944'),
(124, 8, 'S.E. TIXKOKOB', 'Arriostrada', 16, ' 21? 0\'14.70N', ' 89?24\'17.00O', '21.00408333', '89.40472222'),
(125, 8, 'REPETIDOR SOTUTA ', 'Autosoportada', 70, ' 20?36\'21.26N', ' 89? 0\'15.48O', '20.60590556', '89.0043'),
(126, 8, 'Agencia IZAMAL', 'Arriostrada', 30, ' 20?55\'41.68N', ' 89? 1\'29.53O', '20.92824444', '89.02486944'),
(127, 8, 'Agencia TIXKOKOB', 'Arriostrada', 17, ' 21? 0\'5.98N', ' 89?23\'9.86O', '21.00166111', '89.38607222'),
(128, 8, 'S.E. IZAMAL', 'Arriostrada', 15, ' 20?56\'34.90N', ' 89? 1\'21.51O', '20.94302778', '89.02264167'),
(129, 8, 'REPETIDOR TEMAX', 'Arriostrada', 60, ' 21? 9\'5.35N', ' 88?57\'13.69O', '21.15148611', '88.95380278'),
(130, 8, 'REPETIDOR TUNKAS', 'Arriostrada', 70, ' 20?54\'8.48N', ' 88?45\'7.72O', '20.90235556', '88.75214444'),
(131, 8, 'REP. IZAMAL 115 KV', 'Autosoportada', 70, ' 20?55\'10.26N', ' 89? 0\'44.03O', '20.91951667', '89.01223056'),
(132, 8, 'S.E. KOPTE', 'Autosoportada', 70, ' 21? 4\'26.78N', ' 89?17\'4.85O', '21.07410556', '89.28468056'),
(133, 9, 'S.E. Xcalacoco', 'Autosoportada', 45, ' 20?46\'33.42N', ' 86?57\'56.63W', '20.77595', '86.96573056'),
(134, 9, 'S.E Mayakoba', 'Autosoportada', 45, ' 20?41\'47.09N', ' 87? 1\'57.45W', '20.69641389', '87.032625'),
(135, 9, 'S.E. ZacNicte', 'Autosoportada', 45, ' 20?40\'4.87N', ' 87? 4\'14.97W', '20.66801944', '87.070825'),
(136, 9, 'S.E Playacar Caseta Control', 'Arriostrada', 25, ' 20?37\'2.71N', ' 87? 5\'35.39W', '20.61741944', '87.09316389'),
(137, 9, 'S.E. Playacar Subestacion', 'Arriostrada', 45, ' 20?37\'3.58N', ' 20?37\'3.58N', '20.61766111', '87.61766111'),
(138, 9, 'S.E Aktunchen ', 'Autosoportada', 45, ' 20?30\'31.59N', ' 87?13\'43.62W', '20.508775', '87.22878333'),
(139, 9, 'S.E Akumal II', 'Autosoportada', 45, ' 20?27\'15.08N', ' 87?17\'1.26W', '20.45418889', '87.28368333'),
(140, 9, 'S.E Tulum ', 'Autosoportada', 45, ' 20?15\'32.71N', ' 87?28\'15.03W', '20.25908611', '87.47084167'),
(141, 9, 'S.E. Chankanaab II', 'Autosoportada', 45, ' 20?29\'25.08N', ' 86?57\'37.58W', '20.4903', '86.96043889'),
(142, 9, 'S.E Cozumel', 'Autosoportada', 45, ' 20?30\'15.63N', ' 86?57\'20.12W', '20.50434167', '86.95558889'),
(143, 9, 'S.E Chankanaab ', 'Autosoportada', 45, ' 20?28\'32.09N', ' 86?57\'25.61W', '20.47558056', '86.95711389'),
(144, 9, 'Estacion Chemuyil ', 'Arriostrada', 45, ' 20?20\'46.59N', ' 87?20\'56.87W', '20.346275', '87.34913056'),
(145, 9, 'Estacion UTEC', 'Arriostrada', 30, ' 20?37\'34.75N', ' 87? 4\'30.85W', '20.62631944', '87.07523611'),
(146, 9, 'Estacion Ag. Playa d C', 'Arriostrada', 45, ' 20?38\'5.23N', ' 87? 4\'33.30W', '20.63478611', '87.07591667'),
(147, 9, 'Estacion Ag. Tulum ', 'Arriostrada', 20, ' 20?12\'46.43N', ' 87?27\'34.66W', '20.21289722', '87.45962778'),
(148, 9, 'Estacion CEDIP ', 'Arriostrada', 20, ' 20?40\'1.79N', ' 87? 4\'9.92W', '20.66716389', '87.06942222'),
(149, 9, 'Estacion COBA', 'Arriostrada', 30, ' 20?29\'43.17N', ' 87?44\'5.37W', '20.495325', '87.734825'),
(150, 9, 'Estacion MUYIL ', 'Arriostrada', 20, ' 20? 4\'29.89N', ' 87?36\'59.22W', '20.07496944', '87.61645');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `usuario` varchar(75) NOT NULL,
  `password` varchar(75) NOT NULL,
  `tip_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `usuario`, `password`, `tip_usuario`) VALUES
(1, 'admin', 'admin', 1),
(3, 'karla@asv.com.mx', '@sv12345', 1),
(4, 'karla', '11111', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `resp_zona`
--
ALTER TABLE `resp_zona`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_tickets`);

--
-- Indices de la tabla `tip_usuario`
--
ALTER TABLE `tip_usuario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id_trabajo`),
  ADD KEY `ticket-trabajo` (`id_ticket`),
  ADD KEY `servicio-trabajo` (`id_servicio`);

--
-- Indices de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  ADD PRIMARY KEY (`ID_UB`),
  ADD KEY `resp-ubica` (`ZON`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `tip_usu` (`tip_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `resp_zona`
--
ALTER TABLE `resp_zona`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id_tickets` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tip_usuario`
--
ALTER TABLE `tip_usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id_trabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  MODIFY `ID_UB` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD CONSTRAINT `servicio-trabajo` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id`),
  ADD CONSTRAINT `ticket-trabajo` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id_tickets`);

--
-- Filtros para la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  ADD CONSTRAINT `resp-ubica` FOREIGN KEY (`ZON`) REFERENCES `resp_zona` (`ID`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `tip_usu` FOREIGN KEY (`tip_usuario`) REFERENCES `tip_usuario` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
