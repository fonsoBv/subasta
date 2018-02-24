-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2018 at 07:03 p.m.
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsubasta`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbanimal`
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
-- Dumping data for table `tbanimal`
--

INSERT INTO `tbanimal` (`animalnumero`, `animaldonador`, `animallugarprocedencia`, `animaltipo`, `animalraza`, `animaldescripcion`, `animalestado`) VALUES
(1, 'Donador Animal 1', 'Turrialba', 4, 2, 'Cafe con negro', 'subasta'),
(2, 'Doandor animal 2', 'turrilaba', 3, 2, 'no se ', 'subasta'),
(4, 'Johan', 'Juan Viñas', 5, 33, 'Blanca', 'subasta'),
(3, 'donador 3', 'turrialba', 4, 5, 'no se descripcion', 'subasta'),
(12, 'Alfonso', 'Sauce', 1, 5, 'para toro', 'subasta');

-- --------------------------------------------------------

--
-- Table structure for table `tbcomprador`
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
-- Dumping data for table `tbcomprador`
--

INSERT INTO `tbcomprador` (`compradorcodigo`, `compradornumeroidentificacion`, `compradornombrecompleto`, `compradortelefono`, `compradordireccion`, `compradorrecomendador`, `compradortipopago`, `compradornumeropagare`) VALUES
(1, '304980175', 'Silvia Calderon Fernandez', '88888888', 'Tayutic, Turrialba', 'Recomendación', 'Credito', 100),
(2, '303070134', 'Hilda Fernandez Gonzalez', '45645', 'Tayutic, Turrialba', 'Recomendación', 'Contado', 0),
(3, '305260318', 'Maureen Calderon Fernandez', '787', 'Tayutic, Turrialba', 'Recomendación', 'Contado', 0),
(4, '303250487', 'Johan Agüero', '6489-7452', 'Juan Viñas', 'NO se', 'Contado', 0),
(5, '4444415', 'Estiben', '1234-5678', 'Turri', 'Johan', 'Contado', 0),
(6, '0987654321', 'Silvia Calderon', '1234-5678', 'Turrialba', '', 'Contado', 0),
(7, '3503808', 'Alfonso Brenes', '8555-2542', 'Sauce', 'Johan', 'Contado', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbraza`
--

CREATE TABLE `tbraza` (
  `razaid` int(11) NOT NULL,
  `razanombre` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbraza`
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
(13, 'Blonde d''aquitaine\r\n'),
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
(37, 'Chumeca\r\n'),
(0, 'Otro\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbresubasta`
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
-- Table structure for table `tbsubasta`
--

CREATE TABLE `tbsubasta` (
  `id` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL,
  `id_comprador` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbtipoanimal`
--

CREATE TABLE `tbtipoanimal` (
  `tipoanimalid` int(11) NOT NULL,
  `tipoanimalnombre` varchar(100) NOT NULL,
  `tipoanimalcategoria` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtipoanimal`
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
-- Table structure for table `tbventa`
--

CREATE TABLE `tbventa` (
  `ventaid` int(11) NOT NULL,
  `ventaanimal` int(11) NOT NULL,
  `ventacomprador` int(11) NOT NULL,
  `ventaprecio` double NOT NULL,
  `ventaestado` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbsubasta`
--
ALTER TABLE `tbsubasta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbventa`
--
ALTER TABLE `tbventa`
  ADD PRIMARY KEY (`ventaid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbsubasta`
--
ALTER TABLE `tbsubasta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbventa`
--
ALTER TABLE `tbventa`
  MODIFY `ventaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
