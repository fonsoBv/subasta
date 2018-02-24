-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-02-2018 a las 00:57:52
-- Versión del servidor: 5.7.11
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsubasta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbanimal`
--

CREATE TABLE `tbanimal` (
  `animalnumero` int(11) NOT NULL,
  `animaldonador` varchar(100) NOT NULL,
  `animallugarprocedencia` varchar(300) NOT NULL,
  `animaltipo` int(11) NOT NULL,
  `animalraza` int(11) NOT NULL,
  `animaldescripcion` varchar(400) NOT NULL,
  `animalestado` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbanimal`
--

INSERT INTO `tbanimal` (`animalnumero`, `animaldonador`, `animallugarprocedencia`, `animaltipo`, `animalraza`, `animaldescripcion`, `animalestado`) VALUES
(1, 'Donador Animal 1', 'Turrialba', 4, 2, 'Cafe con negro', 'subasta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcomprador`
--

CREATE TABLE `tbcomprador` (
  `compradorcodigo` int(11) NOT NULL,
  `compradornumeroidentificacion` varchar(100) NOT NULL,
  `compradornombrecompleto` varchar(100) NOT NULL,
  `compradortelefono` varchar(15) NOT NULL,
  `compradordireccion` varchar(200) NOT NULL,
  `compradorrecomendador` varchar(100) NOT NULL,
  `compradortipopago` varchar(50) NOT NULL,
  `compradornumeropagare` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcomprador`
--

INSERT INTO `tbcomprador` (`compradorcodigo`, `compradornumeroidentificacion`, `compradornombrecompleto`, `compradortelefono`, `compradordireccion`, `compradorrecomendador`, `compradortipopago`, `compradornumeropagare`) VALUES
(1, '304980175', 'Silvia Calderon Fernandez', '88888888', 'Tayutic, Turrialba', 'Recomendación', 'Credito', 100),
(2, '303070134', 'Hilda Fernandez Gonzalez', '45645', 'Tayutic, Turrialba', 'Recomendación', 'Contado', 0),
(3, '305260318', 'Maureen Calderon Fernandez', '787', 'Tayutic, Turrialba', 'Recomendación', 'Contado', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbraza`
--

CREATE TABLE `tbraza` (
  `razaid` int(11) NOT NULL,
  `razanombre` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbraza`
--

INSERT INTO `tbraza` (`razaid`, `razanombre`) VALUES
(1, 'Cebú con cruce europeo de carne'),
(2, 'Angus\r\n'),
(3, 'Hereford\r\n'),
(4, 'Shorthorn\r\n'),
(5, 'Red Poll\r\n'),
(6, 'Charoláis\r\n'),
(7, 'Gelbvieh\r\n'),
(8, 'Maine\r\n'),
(9, 'Simmental\r\n'),
(10, 'Romagnola\r\n'),
(11, 'Chianina\r\n'),
(12, 'Limousine\r\n'),
(13, 'Blonde d\'aquitaine\r\n'),
(14, 'Pardo suizo\r\n'),
(15, 'Inra 95\r\n'),
(16, 'Cebú con cruce lechero\r\n'),
(17, 'Guzerat\r\n'),
(18, 'Brahaman\r\n'),
(19, 'Gyr\r\n'),
(20, 'Nelore\r\n'),
(21, 'Sardo negro\r\n'),
(22, 'Sahiwal\r\n'),
(23, 'Girolando\r\n'),
(24, 'Indubrasil\r\n'),
(25, 'Cruces europeos lecheros\r\n'),
(26, 'Santa Gertrudis\r\n'),
(27, 'Simbrah\r\n'),
(28, 'Charbray\r\n'),
(29, 'Braford\r\n'),
(30, 'Brangus\r\n'),
(31, 'Beefmaster\r\n'),
(32, 'Belga azul\r\n'),
(33, 'Jersey\r\n'),
(34, 'Ayshire\r\n'),
(35, 'Holstein\r\n'),
(36, 'Guernsey\r\n'),
(37, 'Chumeca\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbresubasta`
--

CREATE TABLE `tbresubasta` (
  `resubastaid` int(11) NOT NULL,
  `resubastaanimal` int(11) NOT NULL,
  `resubastacomprador` int(11) NOT NULL,
  `resubastaprecio` double NOT NULL,
  `resubastaestado` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipoanimal`
--

CREATE TABLE `tbtipoanimal` (
  `tipoanimalid` int(11) NOT NULL,
  `tipoanimalnombre` varchar(100) NOT NULL,
  `tipoanimalcategoria` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtipoanimal`
--

INSERT INTO `tbtipoanimal` (`tipoanimalid`, `tipoanimalnombre`, `tipoanimalcategoria`) VALUES
(11, 'Otro', 2),
(3, 'novillo', 1),
(4, 'novilla', 1),
(5, 'vaca', 1),
(6, 'toro', 1),
(7, 'ovino', 2),
(8, 'caprino', 2),
(9, 'canino', 2),
(10, 'avicola', 2),
(2, 'ternera', 1),
(1, 'ternero', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbventa`
--

CREATE TABLE `tbventa` (
  `ventaid` int(11) NOT NULL,
  `ventaanimal` int(11) NOT NULL,
  `ventacomprador` int(11) NOT NULL,
  `ventaprecio` double NOT NULL,
  `ventaestado` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbventa`
--
ALTER TABLE `tbventa`
  ADD PRIMARY KEY (`ventaid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbventa`
--
ALTER TABLE `tbventa`
  MODIFY `ventaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
