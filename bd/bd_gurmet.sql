-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2017 a las 17:28:20
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_gurmet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `ID_area` int(11) NOT NULL,
  `nombre_area` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`ID_area`, `nombre_area`) VALUES
(1, 'Tutismo'),
(2, 'Gastronomia'),
(3, 'Diversion'),
(4, 'Entretenimiento'),
(5, 'Provincias'),
(6, 'Cine'),
(7, 'Viajes'),
(8, 'Cultura'),
(9, 'heladerias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `navegacion`
--

CREATE TABLE `navegacion` (
  `ID_area` int(11) NOT NULL,
  `area` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `navegacion`
--

INSERT INTO `navegacion` (`ID_area`, `area`) VALUES
(1, 'user'),
(2, 'oferta'),
(3, 'sector'),
(4, 'area');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `ID_oferta` int(11) NOT NULL,
  `caracterisitca` text,
  `icono` varchar(100) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `direccion` text,
  `tel_cel` int(11) DEFAULT NULL,
  `correo` varchar(200) NOT NULL,
  `calificacion` varchar(100) DEFAULT NULL,
  `descripcion_empresa` text,
  `mapa_google` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`ID_oferta`, `caracterisitca`, `icono`, `titulo`, `direccion`, `tel_cel`, `correo`, `calificacion`, `descripcion_empresa`, `mapa_google`) VALUES
(5, 'Empresa de desarrollo tecnologico        ', 'Meeting.png', 'Solufelx', '   Av juana surdui padilla #234       ', 77902356, 'soluflex@yahoo.com', '5', '   es una buena empresa       ', ' <iframe src=\"https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d379.70304997731427!2d-3.7041421!3d40.4171708!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2ses!4v1505259338963\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>  '),
(6, ' Empresa Lider  ', '003-social-1.png', 'Lider DJ', ' Av. Pagador y c/ maria nela velazques #232  ', 77889435, 'ariel@gmail.com', '3', ' Es una empresa de musica divertida  ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d379.70304997731427!2d-3.7041421!3d40.4171708!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2ses!4v1505259338963\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>'),
(7, 'Caribian es una empresa de comercio electronico', 'produowner.png', 'Caribian', 'Av. juan de la cruz #2343', 778493433, 'caribian@gmail.com', '3', 'Esuna empresa de venta y copra de artefactos', 'aslkajskljaskd'),
(8, 'Beso loco es una empresa de entretenimiento de tipo karaoke', '003-social-1.png', 'Beso Loco', 'Empresa de karaoke', 23123123, 'besoloco@gmail.com', '3', 'es una empesa de entretenimeinto', 'adsadsadad'),
(9, 'Ronicas LTA', 'DevelopIcon_Meeting_400w.png', 'Rokias', 'asasdsdfdfsdf sdfsdfsd sdfsdf', 2147483647, 'dsdfsdfsdf', '3', 'fdfsdfsdfsdffd', 'fdsfsdfsdfsfd'),
(11, 'sdfsdfsdf', '003-social-1.png', 'asssdfsdfsdf', 'sdfsdfsdsdfsdf', 1313212312, 'fdsfsdfsdffsd', '3', 'dfsdfsdf', 'sdfssdfsdfdsf'),
(12, 'sdfsdfsdfdf', '004-social.png', 'fsdfsfs', 'sdfsdsdfsdf', 2147483647, 'ariel@gmail.com', '3', 'sdfsfdsdsfd', 'sdfsdsfdsdffds');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion`
--

CREATE TABLE `relacion` (
  `ID_relacion` int(11) NOT NULL,
  `correo_empresa` varchar(100) NOT NULL,
  `ID_relacionados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `relacion`
--

INSERT INTO `relacion` (`ID_relacion`, `correo_empresa`, `ID_relacionados`) VALUES
(27, 'arielbra@gmail.com', 8),
(28, 'arielbra@gmail.com', 6),
(29, 'ariel@gmail.com', 7),
(35, 'besoloco@gmail.com', 8),
(38, 'arielbra@gmail.com', 9),
(39, 'arielbra@gmail.com', 7),
(40, 'ariel@gmail.com', 7),
(41, 'soluflex@yahoo.com', 6),
(42, 'soluflex@yahoo.com', 6),
(43, 'soluflex@yahoo.com', 9),
(44, 'soluflex@yahoo.com', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `ID_sector` int(11) NOT NULL,
  `nombre_area` varchar(100) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `ID_empresa` int(11) NOT NULL,
  `ID_area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`ID_sector`, `nombre_area`, `empresa`, `ID_empresa`, `ID_area`) VALUES
(2, '2', '8', 0, 2),
(3, '1', '7', 7, 1),
(4, '2', '8', 8, 2),
(5, '4', '6', 6, 4),
(6, '1', '5', 5, 1),
(7, '1', '6', 6, 1),
(8, '1', '7', 7, 1),
(9, '1', '8', 8, 1),
(10, '2', '9', 9, 2),
(11, '2', '9', 9, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `ID_user` int(11) NOT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `permiso` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`ID_area`);

--
-- Indices de la tabla `navegacion`
--
ALTER TABLE `navegacion`
  ADD PRIMARY KEY (`ID_area`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`ID_oferta`);

--
-- Indices de la tabla `relacion`
--
ALTER TABLE `relacion`
  ADD PRIMARY KEY (`ID_relacion`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`ID_sector`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `ID_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `navegacion`
--
ALTER TABLE `navegacion`
  MODIFY `ID_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `ID_oferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `relacion`
--
ALTER TABLE `relacion`
  MODIFY `ID_relacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `ID_sector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
