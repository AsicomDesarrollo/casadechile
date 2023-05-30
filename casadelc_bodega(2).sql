-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 02:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casadelc_bodega`
--

-- --------------------------------------------------------

--
-- Table structure for table `abono_clientes`
--

CREATE TABLE `abono_clientes` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `monto` mediumtext NOT NULL,
  `metodo` mediumtext NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `abono_entradas`
--

CREATE TABLE `abono_entradas` (
  `id` int(11) NOT NULL,
  `id_entrada` int(11) NOT NULL,
  `monto` mediumtext NOT NULL,
  `metodo` mediumtext NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` mediumtext NOT NULL,
  `paterno` mediumtext NOT NULL,
  `materno` mediumtext NOT NULL,
  `email` mediumtext NOT NULL,
  `password` mediumtext NOT NULL,
  `fecha` datetime NOT NULL,
  `rol` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `paterno`, `materno`, `email`, `password`, `fecha`, `rol`) VALUES
(1, 'Ruben', 'Zuñiga', 'Ortiz', 'admin@admin.com', 'erickleonel', '2021-01-21 17:46:05', 1),
(2, 'erick', 'malagon', '', 'erick.leo.malagon@gmail.com', 'erickleonel', '0000-00-00 00:00:00', 1),
(3, 'elena', 'sandoval', 'santana', 'desarrolloSoft@asicomsystems.com.mx', '08552376086', '2023-02-15 18:22:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` mediumtext NOT NULL,
  `estatus` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `estatus`, `fecha`) VALUES
(1, 'Chiles secos', 1, '2021-01-19 02:05:35'),
(2, 'Especias', 1, '2021-01-19 02:05:35'),
(3, 'Semillas', 1, '2021-01-19 02:05:35'),
(4, 'Pescados y mariscos', 1, '2021-01-19 02:05:35'),
(5, 'Frutos secos', 1, '2021-01-19 02:05:35'),
(6, 'Molidos', 1, '2021-01-19 02:05:35'),
(7, 'Moles', 1, '2021-01-19 02:05:35'),
(8, 'Varios', 1, '2021-01-19 02:07:16'),
(13, 'Miscelaneos', 2, '2021-01-30 00:15:50'),
(14, 'lacteos modificada', 2, '2021-01-30 00:35:30'),
(15, 'Fruta ', 2, '2021-02-09 22:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `cierres_caja`
--

CREATE TABLE `cierres_caja` (
  `id` int(11) NOT NULL,
  `inicio` mediumtext NOT NULL,
  `fin` mediumtext NOT NULL,
  `cuenta` mediumtext NOT NULL,
  `diferencia` mediumtext NOT NULL,
  `fecha` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` mediumtext NOT NULL,
  `adeuda` mediumtext NOT NULL,
  `limite` mediumtext NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `adeuda`, `limite`, `fecha`) VALUES
(1, 'AGUILA BORREGO', '0', '10000', '2021-02-10 15:29:13'),
(2, 'Rogelio Aguilar ', '20', '10000', '2023-02-24 18:21:15'),
(3, 'Hilario ', '0', 'O', '2021-02-23 07:53:37'),
(4, 'Chema', '0', '0', '2021-02-23 08:21:42'),
(5, 'Daniela', '0', '0', '2021-02-23 08:23:03'),
(6, 'Jacobo', '0', '0', '2021-02-23 08:23:19'),
(7, 'Igor', '0', '0', '2021-02-23 08:23:37'),
(8, 'ADRIANA FRANCISCA', '15780', '20000', '2021-03-09 08:48:47'),
(9, 'ACASIO', '2523', '5000', '2021-03-09 08:50:16'),
(10, 'RAFAEL AGUILA', '17564', '25000', '2021-03-09 08:51:19'),
(11, 'ALBINO', '690', '1000', '2021-03-09 08:52:45'),
(12, 'CERILLOS', '240', '250', '2021-03-09 08:53:28'),
(13, 'CERVANTES', '1026', '0', '2021-03-09 08:56:57'),
(14, 'CHELITO CHAVEZ', '822', '2000', '2021-03-09 08:58:23'),
(15, 'DOÑA CHUY Y PATY ', '5243', '20000', '2021-03-09 09:02:30'),
(16, 'CHINO AZUL', '514', '5000', '2021-03-09 09:03:25'),
(17, 'DAVID PESTAÑON', '5565', '10000', '2021-03-09 09:04:16'),
(18, 'EFRAÍN ÁGUILA Y ALICIA', '7161', '10000', '2021-03-09 09:05:06'),
(19, 'EPIFANIO', '5155', '10000', '2021-03-09 09:05:52'),
(20, 'EFRAÍN COMPADRE', '33615', '80000', '2021-03-09 09:06:41'),
(21, 'EUSEBIO', '3275', '10000', '2021-03-09 09:07:18'),
(22, 'GUSTAVO GUZMÁN', '42959', '80000', '2021-03-09 09:10:14'),
(23, 'GLORIA', '420', '5000', '2021-03-09 09:11:07'),
(24, 'JOSE', '337', '1000', '2021-03-09 09:14:02'),
(25, 'JOSÉ LUIS', '27366', '28000', '2021-03-09 09:14:50'),
(26, 'JULIO NACHOTAS', '7378', '40000', '2021-03-09 09:15:39'),
(27, 'LOBO', '', '', '2021-03-09 09:15:52'),
(28, 'DOÑA MARY  ', '0', '', '2021-04-05 09:48:09'),
(29, 'MANUEL YONI', '', '', '2021-03-09 09:16:34'),
(30, 'MARIO', '', '', '2021-03-09 09:16:44'),
(31, 'MARCO NAUCALPAN', '12271', 'O', '2021-03-09 09:17:25'),
(32, 'MATA', '', '', '2021-03-09 09:17:37'),
(33, 'MIGUEL JR', '', '', '2021-03-09 09:17:51'),
(34, 'MOXCA/GABRIEL', '', '', '2021-03-09 09:18:19'),
(35, ' MARTIN', '', '', '2021-03-09 09:19:16'),
(36, 'NACHOTAS IGNACIO ', '23', '', '2023-02-24 18:20:54'),
(37, 'NANYELI', '3956', '0', '2021-03-09 09:20:17'),
(38, 'NOE', '', '', '2021-03-09 09:20:33'),
(39, 'OMAR GARCÍA', '', '', '2021-03-09 09:22:22'),
(40, 'OCTAVIO FÉLIX', '', '', '2021-03-09 09:22:43'),
(41, 'PANCHO', '', '', '2021-03-09 09:22:55'),
(42, 'PANCHITA', '', '', '2021-03-09 09:23:08'),
(43, 'PAISANA YADIRA', '', '', '2021-03-09 09:23:30'),
(44, 'RICARDO SUETER', '', '', '2021-03-09 09:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_venta` mediumtext NOT NULL,
  `cliente` mediumtext NOT NULL,
  `cliente_id` varchar(30) NOT NULL,
  `producto` int(11) NOT NULL,
  `title` varchar(90) NOT NULL,
  `peso` mediumtext NOT NULL,
  `precio` double NOT NULL,
  `estatus` mediumtext NOT NULL,
  `banco` mediumtext DEFAULT NULL,
  `cuenta` mediumtext DEFAULT NULL,
  `vencimiento` date DEFAULT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `compras`
--

INSERT INTO `compras` (`id`, `id_venta`, `cliente`, `cliente_id`, `producto`, `title`, `peso`, `precio`, `estatus`, `banco`, `cuenta`, `vencimiento`, `fecha`) VALUES
(1, '1640022551', 'Venta General', '0', 86, 'JAMAICA SUDAN ', '1', 90, 'pagado', NULL, NULL, NULL, '2021-12-20 11:49:11'),
(2, '1640022551', 'Venta General', '0', 71, 'CHILE TROMPO ', '1', 105, 'pagado', NULL, NULL, NULL, '2021-12-20 11:49:11'),
(3, '1640022551', 'Venta General', '0', 139, 'PAPRICA PERUANA', '1', 90, 'pagado', NULL, NULL, NULL, '2021-12-20 11:49:11'),
(4, '1640022551', 'Venta General', '0', 9, 'AJO #9 ', '3', 66, 'pagado', NULL, NULL, NULL, '2021-12-20 11:49:11'),
(5, '1640022575', 'Venta General', '0', 164, 'Anís Estrella', '1', 300, 'pagado', NULL, NULL, NULL, '2021-12-20 11:49:35'),
(6, '1640022586', 'Venta General', '0', 53, 'CHILE GUAJILLO  ', '5', 90, 'diferido', NULL, NULL, NULL, '2021-12-20 11:49:46'),
(7, '1640022601', 'EFRAÍN ÁGUILA Y ALICIA', '18', 69, 'CHILE TABAQUERO ', '3', 450, 'pagado', NULL, NULL, NULL, '2021-12-20 11:50:01'),
(8, '1640114715', 'RICARDO SUETER', '44', 44, 'CHILE ANCHO GRANDE ', '2', 125, 'pagado', NULL, NULL, NULL, '2021-12-21 13:25:15'),
(9, '1640114715', 'RICARDO SUETER', '44', 44, 'DESCUENTO:CHILE ANCHO GRANDE ', '2', -3, 'pagado', NULL, NULL, NULL, '2021-12-21 13:25:15'),
(10, '1640114715', 'RICARDO SUETER', '44', 158, 'TAMARINDO   ', '2', 25, 'pagado', NULL, NULL, NULL, '2021-12-21 13:25:15'),
(11, '1640114715', 'RICARDO SUETER', '44', 36, 'CANELA MOLIDA ', '5', 25, 'pagado', NULL, NULL, NULL, '2021-12-21 13:25:15'),
(12, '1640114715', 'RICARDO SUETER', '44', 36, 'DESCUENTO:CANELA MOLIDA ', '5', -2, 'pagado', NULL, NULL, NULL, '2021-12-21 13:25:15'),
(13, '1640114726', 'DOÑA CHUY Y PATY ', '15', 48, 'CHILE ARBOL SIN PATA ', '5', 130, 'pagado', NULL, NULL, NULL, '2021-12-21 13:25:26'),
(14, '1640114757', 'DOÑA MARY  ', '28', 63, 'CHILE PASILLA GRANDE 1A    ', '5', 130, 'pagado', NULL, NULL, NULL, '2021-12-21 13:25:57'),
(15, '1640114777', 'JOSÉ LUIS', '25', 21, 'CACAHUATE TOSTADO  ', '10', 37, 'diferido', NULL, NULL, NULL, '2021-12-21 13:26:17'),
(16, '1640125252', 'Daniela', '5', 42, 'CHILE  CASCABEL       ', '1', 500, 'credito', NULL, NULL, NULL, '2021-12-21 16:20:52'),
(17, '1640126448', 'Venta General', '0', 51, 'CHILE CHIPOTLE', '2', 110, 'credito', NULL, NULL, NULL, '2021-12-21 16:40:48'),
(18, '1640794361', 'Venta General', '0', 47, 'CHILE ARBOL MOLIDO', '4', 35, 'credito', NULL, NULL, NULL, '2021-12-29 10:12:41'),
(19, '1640794372', 'Venta General', '0', 47, 'CHILE ARBOL MOLIDO', '8', 35, 'pagado', NULL, NULL, NULL, '2021-12-29 10:12:52'),
(20, '1640796334', 'Rogelio Aguilar', '2', 3, 'ACHIOTE MERIDA CHICO', '1', 490, 'diferido', NULL, NULL, NULL, '2021-12-29 10:45:34'),
(21, '1640796334', 'Rogelio Aguilar', '2', 71, 'CHILE TROMPO ', '4', 105, 'diferido', NULL, NULL, NULL, '2021-12-29 10:45:34'),
(22, '1640796335', 'Venta General', '', 42, '', '1', 500, 'Pendiente', NULL, NULL, NULL, '2022-04-18 16:27:37'),
(23, '1640796335', 'Venta General', '', 55, '', '55', 12, 'Pendiente', NULL, NULL, NULL, '2022-04-18 16:27:37'),
(24, '1640796335', 'Venta General', '', 55, '', '55', -3, 'Pendiente', NULL, NULL, NULL, '2022-04-18 16:27:37'),
(25, '1650317306', 'ALBINO', '11', 34, 'CANELA 5 CEROS ESPECIAL', '2', 460, 'pagado', NULL, NULL, NULL, '2022-04-18 16:28:26'),
(26, '1650317306', 'ALBINO', '11', 9, 'AJO #9 ', '5', 66, 'pagado', NULL, NULL, NULL, '2022-04-18 16:28:26'),
(27, '1650317352', 'Venta General', '0', 12, 'AJO#7', '2', 55, 'pagado', NULL, NULL, NULL, '2022-04-18 16:29:12'),
(28, '1650317352', 'Venta General', '0', 46, 'CHILE ARBOL CON PATA ', '3', 110, 'pagado', NULL, NULL, NULL, '2022-04-18 16:29:12'),
(29, '1650317352', 'Venta General', '0', 46, 'DESCUENTO:CHILE ARBOL CON PATA ', '3', -11, 'pagado', NULL, NULL, NULL, '2022-04-18 16:29:12'),
(30, '1650409851', 'Rogelio Aguilar', '2', 54, 'CHILE GUAJILLO 2A ', '5', 49, 'pagado', NULL, NULL, NULL, '2022-04-19 18:10:51'),
(31, '1650409851', 'Rogelio Aguilar', '2', 54, 'DESCUENTO:CHILE GUAJILLO 2A ', '5', -1, 'pagado', NULL, NULL, NULL, '2022-04-19 18:10:51'),
(32, '1650409851', 'Rogelio Aguilar', '2', 52, 'CHILE COSTEÑO  ', '3', 215, 'pagado', NULL, NULL, NULL, '2022-04-19 18:10:51'),
(33, '1650409851', 'Rogelio Aguilar', '2', 73, 'CIRUELA SIN HUESO ', '2', 110, 'pagado', NULL, NULL, NULL, '2022-04-19 18:10:51'),
(34, '1650409882', 'Chema', '4', 52, 'CHILE COSTEÑO  ', '4', 215, 'pagado', NULL, NULL, NULL, '2022-04-19 18:11:22'),
(35, '1650409851', 'Rogelio Aguilar', '2', 7, 'AJO #10', '1', 68, 'pagado', NULL, NULL, NULL, '2022-04-19 18:11:42'),
(36, '1650410071', 'PANCHO', '41', 43, 'CHILE ANCHO FLOR ', '5', 135, 'pagado', NULL, NULL, NULL, '2022-04-19 18:14:31'),
(37, '1650410071', 'PANCHO', '41', 68, 'CHILE PULLA  ', '5', 80, 'pagado', NULL, NULL, NULL, '2022-04-19 18:14:31'),
(38, '1650410121', 'Hilario ', '3', 7, 'AJO #10', '5', 68, 'diferido', NULL, NULL, NULL, '2022-04-19 18:15:21'),
(39, '1650410733', 'Venta General', '0', 42, 'CHILE  CASCABEL       ', '6', 500, 'pagado', NULL, NULL, NULL, '2022-04-19 18:25:33'),
(40, '1650410744', 'PANCHITA', '42', 43, 'CHILE ANCHO FLOR ', '6', 135, 'credito', NULL, NULL, NULL, '2022-04-19 18:25:44'),
(41, '1651847885', 'Venta General', '0', 43, 'CHILE ANCHO FLOR ', '4', 135, 'pagado', NULL, NULL, NULL, '2022-05-06 09:38:05'),
(42, '1651847885', 'Venta General', '0', 35, 'CANELA EXTRA ESPECIAL', '1', 600, 'pagado', NULL, NULL, NULL, '2022-05-06 10:15:49'),
(43, '1651847885', 'Venta General', '0', 137, 'PAN MOLIDO ', '10', 20, 'pagado', NULL, NULL, NULL, '2022-05-06 10:15:49'),
(44, '1651850345', 'Venta General', '0', 150, 'PINGUICA', '3', 100, 'pagado', NULL, NULL, NULL, '2022-05-06 10:19:05'),
(45, '1651850346', 'Venta General', '', 43, '', '55', 135, 'Pendiente', NULL, NULL, NULL, '2022-05-06 10:21:08'),
(46, '1651850886', 'Rogelio Aguilar', '2', 53, 'CHILE GUAJILLO  ', '4', 130, 'pagado', NULL, NULL, NULL, '2022-05-06 10:28:06'),
(47, '1651850886', 'Rogelio Aguilar', '2', 53, 'DESCUENTO:CHILE GUAJILLO  ', '4', -2, 'pagado', NULL, NULL, NULL, '2022-05-06 10:28:06'),
(48, '1651851076', 'Venta General', '0', 7, 'AJO #10', '2', 75, 'pagado', NULL, NULL, NULL, '2022-05-06 10:31:16'),
(49, '1651851454', 'Venta General', '0', 53, 'CHILE GUAJILLO  ', '1', 130, 'credito', NULL, NULL, NULL, '2022-05-06 10:37:34'),
(50, '1651851454', 'Venta General', '0', 64, 'CHILE PASILLA MEDIANO  ', '1', 130, 'credito', NULL, NULL, NULL, '2022-05-06 10:37:34'),
(51, '1651851454', 'Venta General', '0', 64, 'DESCUENTO:CHILE PASILLA MEDIANO  ', '1', -40, 'credito', NULL, NULL, NULL, '2022-05-06 10:37:34'),
(52, '1651851454', 'Venta General', '0', 134, 'NUEZ MITAD    ', '1', 270, 'credito', NULL, NULL, NULL, '2022-05-06 10:37:34'),
(53, '1651851955', 'Venta General', '0', 21, 'CACAHUATE TOSTADO  ', '2', 48, 'abierto', NULL, NULL, NULL, '2022-05-06 10:45:55'),
(54, '1651851955', 'Venta General', '0', 18, 'ARANDANO ', '1', 120, 'abierto', NULL, NULL, NULL, '2022-05-06 10:45:55'),
(55, '1651851955', 'Venta General', '0', 34, 'CANELA 5 CEROS ESPECIAL', '0', 480, 'abierto', NULL, NULL, NULL, '2022-05-06 10:45:55'),
(56, '1651851955', 'Venta General', '0', 83, 'JAMAICA GUERRERO ', '2', 190, 'abierto', NULL, NULL, NULL, '2022-05-06 10:45:55'),
(57, '1651851955', 'Venta General', '0', 70, 'CHILE TEJA ', '2', 130, 'abierto', NULL, NULL, NULL, '2022-05-06 10:45:55'),
(58, '1651851955', 'Venta General', '0', 63, 'CHILE PASILLA GRANDE 1A    ', '1', 130, 'abierto', NULL, NULL, NULL, '2022-05-06 10:45:55'),
(59, '1651851955', 'Venta General', '0', 45, 'CHILE ANCHO MEDIANO  ', '1', 130, 'abierto', NULL, NULL, NULL, '2022-05-06 10:45:55'),
(60, '1651851955', 'Venta General', '0', 136, 'OREGANO MOLIDO', '1', 80, 'abierto', NULL, NULL, NULL, '2022-05-06 10:45:55'),
(61, '1651851955', 'Venta General', '0', 50, 'CHILE CATARINA ', '1', 250, 'abierto', NULL, NULL, NULL, '2022-05-06 10:45:55'),
(62, '1651851955', 'Venta General', '0', 137, 'PAN MOLIDO ', '10', 20, 'abierto', NULL, NULL, NULL, '2022-05-06 10:45:55'),
(63, '1651851955', 'Venta General', '0', 53, 'CHILE GUAJILLO  ', '4', 130, 'abierto', NULL, NULL, NULL, '2022-05-06 10:45:55'),
(64, '1651851956', 'Venta General', '', 42, '', '1', 500, 'Pendiente', NULL, NULL, NULL, '2023-01-26 17:08:35'),
(65, '1651851956', 'Venta General', '', 47, '', '1', 35, 'Pendiente', NULL, NULL, NULL, '2023-01-26 17:08:35'),
(66, '1651851956', 'Venta General', '', 7, '', '7', 68, 'Pendiente', NULL, NULL, NULL, '2023-01-26 17:08:35'),
(67, '1651851957', 'Venta General', '', 23, '', '54', 678, 'Pendiente', NULL, NULL, NULL, '2023-01-26 17:42:20'),
(68, '1651851957', 'Venta General', '', 43, '', '20', 135, 'Pendiente', NULL, NULL, NULL, '2023-01-26 17:42:20'),
(69, '1651851957', 'Venta General', '', 43, '', '34', 400, 'Pendiente', NULL, NULL, NULL, '2023-01-26 17:42:20'),
(70, '1651851957', 'Venta General', '', 47, '', '345', 35, 'Pendiente', NULL, NULL, NULL, '2023-01-26 17:42:20'),
(71, '1651851957', 'Venta General', '', 42, '', '34', 500, 'Pendiente', NULL, NULL, NULL, '2023-01-26 17:42:20'),
(72, '1674854914', 'Venta General', '0', 41, 'CHIA ', '1', 80, 'abierto', NULL, NULL, NULL, '2023-01-27 15:28:34'),
(73, '1674854914', 'Venta General', '0', 53, 'CHILE GUAJILLO  ', '1', 115, 'abierto', NULL, NULL, NULL, '2023-01-27 15:28:34'),
(74, '1674854914', 'Venta General', '0', 62, 'CHILE PASILLA FLOR ', '0', 140, 'abierto', NULL, NULL, NULL, '2023-01-27 15:28:34'),
(75, '1674854915', 'Venta General', '', 41, '', '1', 80, 'Pendiente', NULL, NULL, NULL, '2023-01-27 15:32:10'),
(76, '1674854915', 'Venta General', '', 53, '', '1', 115, 'Pendiente', NULL, NULL, NULL, '2023-01-27 15:32:10'),
(77, '1674854915', 'Venta General', '', 62, '', '.5', 140, 'Pendiente', NULL, NULL, NULL, '2023-01-27 15:32:10'),
(78, '1674854916', 'Venta General', '', 0, '', '1', 80, 'Pendiente', NULL, NULL, NULL, '2023-01-27 15:34:44'),
(79, '1674854916', 'Venta General', '', 0, '', '1', 115, 'Pendiente', NULL, NULL, NULL, '2023-01-27 15:34:44');

--
-- Triggers `compras`
--
DELIMITER $$
CREATE TRIGGER `editar_compra` BEFORE UPDATE ON `compras` FOR EACH ROW BEGIN

DECLARE clienteT VARCHAR(50);

if new.cliente_id <> 0 THEN
  set clienteT = (select nombre from clientes where id = new.cliente_id);
else 
  set clienteT = 'Venta General';
end if;

set new.cliente = clienteT;

end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `nueva_compra` BEFORE INSERT ON `compras` FOR EACH ROW BEGIN

DECLARE clienteT VARCHAR(50);

if new.cliente_id <> 0 THEN
  set clienteT = (select nombre from clientes where id = new.cliente_id);
else 
  set clienteT = 'Venta General';
end if;

set new.cliente = clienteT;

end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `objetivo` mediumtext NOT NULL,
  `inicio` mediumtext NOT NULL,
  `final` mediumtext NOT NULL,
  `diferencia` mediumtext NOT NULL,
  `password` mediumtext NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `configuracion`
--

INSERT INTO `configuracion` (`id`, `objetivo`, `inicio`, `final`, `diferencia`, `password`, `fecha`) VALUES
(1, '20000', '1500', '0', '0', '123', '2021-02-02 18:10:56');

-- --------------------------------------------------------

--
-- Table structure for table `corte_caja`
--

CREATE TABLE `corte_caja` (
  `id` int(11) NOT NULL,
  `fecha_corte` datetime NOT NULL COMMENT 'fecha en que se realiza el corte de caja',
  `fecha_inicio` datetime NOT NULL COMMENT 'primer tiket del corte',
  `fecha_fin` datetime NOT NULL COMMENT 'ultimo tiket del corte',
  `folio_unico_inicial` varchar(30) NOT NULL,
  `folio_unico_final` varchar(30) NOT NULL,
  `monto_efectivo` double NOT NULL,
  `monto_tarjeta` double NOT NULL,
  `monto_transferencia` double NOT NULL,
  `monto_credito` double NOT NULL,
  `monto_abonos` double NOT NULL COMMENT 'abonos a creditos',
  `monto_abono_efectivo` double NOT NULL COMMENT 'cantidad de abono de credito en efectivo',
  `monto_abono_transfer` double NOT NULL COMMENT 'cantidad de abono de credito en trasnferencia',
  `monto_abono_tarjeta` double NOT NULL COMMENT 'cantidad de abono de credito en tarjeta',
  `monto_efectivo_al_corte` double NOT NULL COMMENT 'el efectivo ingresado al realizar corte',
  `diferencia_efectivo` double NOT NULL COMMENT 'Es la diferencia entre el efectivo que debe tener en caja vs el efectivo que tiene realmente',
  `venta_total` double NOT NULL,
  `inicio_caja` double NOT NULL,
  `gastos_totales` double NOT NULL,
  `gastos_proveedores` double NOT NULL,
  `gastos_dia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `corte_caja`
--

INSERT INTO `corte_caja` (`id`, `fecha_corte`, `fecha_inicio`, `fecha_fin`, `folio_unico_inicial`, `folio_unico_final`, `monto_efectivo`, `monto_tarjeta`, `monto_transferencia`, `monto_credito`, `monto_abonos`, `monto_abono_efectivo`, `monto_abono_transfer`, `monto_abono_tarjeta`, `monto_efectivo_al_corte`, `diferencia_efectivo`, `venta_total`, `inicio_caja`, `gastos_totales`, `gastos_proveedores`, `gastos_dia`) VALUES
(1, '2021-12-21 10:51:57', '2021-12-20 11:51:35', '2021-12-20 11:53:37', '1640022551', '1640022601', 335, 883, 1385, 0, 0, 0, 0, 0, 3335, -500, 2603, 2500, 0, 0, 0),
(2, '2021-12-21 11:16:12', '2021-12-20 11:51:35', '2021-12-20 11:53:37', '1640022551', '1640022601', 335, 883, 1385, 0, 0, 0, 0, 0, 3335, -3000, 2603, 0, 0, 0, 0),
(3, '2021-12-21 13:00:01', '2021-12-20 11:51:35', '2021-12-20 11:53:37', '1640022551', '1640022601', 335, 883, 1385, 0, 0, 0, 0, 0, 2835, 0, 2603, 2500, 0, 0, 0),
(4, '2021-12-21 13:00:43', '2021-12-20 11:51:35', '2021-12-20 11:53:37', '1640022551', '1640022601', 335, 883, 1385, 0, 0, 0, 0, 0, 2835, 0, 2603, 2500, 0, 0, 0),
(5, '2021-12-21 13:02:03', '2021-12-20 11:51:35', '2021-12-20 11:53:37', '1640022551', '1640022601', 335, 883, 1385, 0, 0, 0, 0, 0, 2835, 0, 2603, 2500, 0, 0, 0),
(6, '2021-12-21 13:12:37', '2021-12-20 11:51:35', '2021-12-20 11:53:37', '1640022551', '1640022601', 335, 883, 1385, 0, 0, 0, 0, 0, 2835, 0, 2603, 2500, 0, 0, 0),
(7, '2021-12-21 13:15:35', '2021-12-20 11:51:35', '2021-12-20 11:53:37', '1640022551', '1640022601', 335, 883, 1385, 0, 0, 0, 0, 0, 4050, -1215, 2603, 2500, 0, 0, 0),
(8, '2021-12-21 16:23:06', '2021-12-21 13:31:34', '2021-12-21 13:32:13', '1640114715', '1640114777', 1003, 416, 660, 500, 0, 0, 0, 0, 4503, 0, 2079, 3500, 0, 0, 0),
(9, '2021-12-29 10:54:06', '2021-12-29 10:53:43', '2021-12-29 10:53:43', '1640796334', '1640796334', 500, 500, 0, 1270, 0, 0, 0, 0, 2300, 0, 1000, 1800, 0, 0, 0),
(10, '2022-04-18 17:17:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 420, 0, 0, 1270, 0, 0, 0, 0, 3920, 0, 420, 3500, 0, 0, 0),
(11, '2022-04-19 18:04:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1250, 407, 0, 1270, 0, 0, 0, 0, 3250, 0, 1657, 2000, 0, 0, 0),
(12, '2022-04-19 18:50:50', '2022-04-19 18:31:24', '2022-04-19 18:36:00', '1650409851', '1650410733', 2440, 2625, 2193, 1270, 1110, 560, 0, 550, 4940, 0, 7258, 2500, 0, 0, 0),
(13, '2022-05-06 09:53:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0, 0, 0, 1270, 0, 0, 0, 0, 1500, 0, 0, 1500, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `nombre` mediumtext NOT NULL,
  `paterno` varchar(100) NOT NULL,
  `materno` varchar(100) DEFAULT NULL,
  `nacimiento` date NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `sueldo` mediumtext NOT NULL,
  `email` varchar(100) NOT NULL COMMENT 'acceso',
  `pass` varchar(100) NOT NULL COMMENT 'acceso',
  `estatus` mediumtext NOT NULL,
  `rol` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`id`, `fecha_creacion`, `nombre`, `paterno`, `materno`, `nacimiento`, `fecha_ingreso`, `sueldo`, `email`, `pass`, `estatus`, `rol`) VALUES
(1, '2021-02-12 22:02:25', 'Ruben', '1Zuñiga', 'Ortizu1', '2021-02-02', '2021-06-06', '115000', 'rubenZ@gmail.com', '$2y$12$JkVmhiYxQLvleUqgDQrNXO6u9Vwz.OkfoFSYSyrN/GjTOB5pnm.b.', '1', 0),
(2, '2021-02-12 22:02:35', 'Rosa  ', 'Lopez', 'Lopez', '2021-09-07', '2021-03-01', '12999', 'rosa@gmail.com', '$2y$12$JkVmhiYxQLvleUqgDQrNXO6u9Vwz.OkfoFSYSyrN/GjTOB5pnm.b.', '0', 2),
(3, '2021-02-12 21:42:27', 'enrique', 'Rosas', 'Perez', '2021-02-16', '2021-03-01', '8000', 'enrrique@gmail.com', '$2y$12$JkVmhiYxQLvleUqgDQrNXO6u9Vwz.OkfoFSYSyrN/GjTOB5pnm.b.', '0', 3),
(4, '0000-00-00 00:00:00', 'leo', 'malagon', 'malagon', '1988-06-13', '2021-09-08', '20000', 'erick.leo.malagon@gmail.com', '$2y$12$JkVmhiYxQLvleUqgDQrNXO6u9Vwz.OkfoFSYSyrN/GjTOB5pnm.b.', '1', 0),
(5, '0000-00-00 00:00:00', 'Demostenes', 'Don Gato', 'Su Pandilla', '1988-06-13', '2021-09-08', '50000', 'erick..leo.malagon@gmail.com', '$2y$12$JkVmhiYxQLvleUqgDQrNXO6u9Vwz.OkfoFSYSyrN/GjTOB5pnm.b.', '', 0),
(6, '2021-09-08 22:16:29', 'Erick', 'Malagon', 'Mariano', '1988-06-13', '2021-06-15', '20000', 'leo@gmail.com', '$2y$12$uS/BVx7qhB2hNjk2KgMwzO7UixG33sOAhkhdNBnZlFyg50Eg/gQHS', '1', 0),
(7, '2021-09-17 17:33:38', 'Ana', 'Esquivel', 'Montes', '2000-09-01', '2021-09-17', '8000', 'ana@gmail.com', '$2y$12$JYFUvzATao9x0FwWtDNRdOzEEkAWp5bXWesCcjLB8nLZTpZtZG2Oq', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `entradas`
--

CREATE TABLE `entradas` (
  `id` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `peso` mediumtext NOT NULL,
  `precio` mediumtext NOT NULL,
  `proveedor` int(11) NOT NULL,
  `estatus` mediumtext NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `entradas`
--

INSERT INTO `entradas` (`id`, `producto`, `peso`, `precio`, `proveedor`, `estatus`, `fecha`) VALUES
(1, 42, '40', '500', 2, 'efectivo', '2021-09-01 11:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `gastos`
--

CREATE TABLE `gastos` (
  `id` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `descripcion` text NOT NULL,
  `monto` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inicio_caja`
--

CREATE TABLE `inicio_caja` (
  `id` int(11) NOT NULL,
  `monto` double NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `corte_caja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `inicio_caja`
--

INSERT INTO `inicio_caja` (`id`, `monto`, `fecha_inicio`, `fecha_fin`, `corte_caja`) VALUES
(2, 2500, '2021-12-21 12:43:21', '2021-12-21 12:43:21', 7),
(4, 3500, '2021-12-21 13:29:52', '2021-12-21 13:29:52', 8),
(5, 1800, '2021-12-21 16:23:23', '2021-12-21 16:23:23', 9),
(6, 3500, '2021-12-29 11:45:21', '2021-12-29 11:45:21', 10),
(7, 2000, '2022-04-18 17:18:05', '2022-04-18 17:18:05', 11),
(8, 2500, '2022-04-19 18:04:50', '2022-04-19 18:04:50', 12),
(9, 1500, '2022-04-19 18:59:02', '2022-04-19 18:59:02', 13),
(10, 100367, '2022-05-06 09:54:43', '2022-05-06 09:54:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` mediumtext NOT NULL,
  `precio` mediumtext NOT NULL,
  `minimo` mediumtext NOT NULL,
  `maximo` mediumtext NOT NULL,
  `imagen` mediumtext NOT NULL,
  `categoria` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `minimo`, `maximo`, `imagen`, `categoria`, `fecha`) VALUES
(1, 'ACHIOTE ANITA CHICO  ', '95', '90', '', '', 2, '2021-05-05 12:32:39'),
(2, 'ACHIOTE ANITA GRANDE ', '70', '68', '', '', 2, '2021-04-05 10:40:18'),
(3, 'ACHIOTE MERIDA CHICO', '115', '490', '', '', 2, '2021-02-22 00:23:57'),
(4, 'ACHIOTE MERIDA GRANDE', '70', '68', '', '', 2, '2021-02-22 00:23:57'),
(5, 'ACHIOTE YUCATECO CHICO', '100', '98', '', '', 2, '2021-02-22 00:23:57'),
(6, 'ACHIOTE YUCATECO GRANDE', '65', '64', '', '', 2, '2021-02-22 00:23:57'),
(7, 'AJO #10', '70', '68', '', '', 2, '2021-05-05 12:33:39'),
(8, 'AJO #8', '0', '0', '', '', 2, '2021-02-22 00:23:57'),
(9, 'AJO #9 ', '70', '66', '', '', 2, '2021-05-05 12:33:19'),
(10, 'AJO MOLIDO', '26', '25', '', '', 6, '2021-02-22 00:23:57'),
(11, 'AJO#10   ', '70', '68', '', '', 2, '2021-05-05 12:34:07'),
(12, 'AJO#7', '0', '0', '', '', 2, '2021-02-22 00:23:57'),
(13, 'AJONJOLI BLANCO', '60', '45', '', '', 3, '2021-02-22 00:23:57'),
(14, 'AJONJOLI MORENO  ', '55', '35', '', '', 3, '2021-04-22 08:47:48'),
(15, 'ALMENDRA   ', '160', '120', '', '', 5, '2021-04-23 08:02:46'),
(16, 'ALMENDRA FILETADA ', '180', '158', '', '', 5, '2021-05-05 12:35:42'),
(17, 'ANIS ', '80', '70', '', '', 2, '2021-05-05 12:36:17'),
(18, 'ARANDANO ', '100', '95', '', '', 5, '2021-05-05 12:36:37'),
(19, 'BACALAO 10/12', '0', '0', '', '', 4, '2021-02-22 00:23:57'),
(20, 'BACALAO 7/9', '0', '0', '', '', 4, '2021-02-22 00:23:57'),
(21, 'CACAHUATE TOSTADO  ', '46', '37', '', '', 3, '2021-05-05 12:37:02'),
(22, 'CAMARON ESQUI CHICO CABEZA', '0', '0', '', '', 4, '2021-02-22 00:23:57'),
(23, 'CAMARON ESQUI GRANDE CABEZA', '0', '0', '', '', 4, '2021-02-22 00:23:57'),
(24, 'CAMARON ESQUI GRANDE S/C', '0', '0', '', '', 4, '2021-02-22 00:23:57'),
(25, 'CAMARON ESQUI MEDIANO  CABEZA ', '380', '360', '', '', 4, '2021-05-05 12:38:15'),
(26, 'CAMARON ESQUI MEDIANO S/C ', '400', '380', '', '', 4, '2021-05-05 12:38:42'),
(27, 'CAMARON MATAMOROS CHICO CABEZA', '0', '0', '', '', 4, '2021-02-22 00:23:57'),
(28, 'CAMARON MATAMOROS CHICO S/C', '0', '0', '', '', 4, '2021-02-22 00:23:57'),
(29, 'CAMARON MATAMOROS GRANDE S/C', '0', '0', '', '', 4, '2021-02-22 00:23:57'),
(30, 'CAMARON MATAMOROS MEDIANO CABEZA', '0', '0', '', '', 4, '2021-02-22 00:23:57'),
(31, 'CAMARON MATAMOROS MEDIANO S/C', '0', '0', '', '', 4, '2021-02-22 00:23:57'),
(32, 'CAMARON SIN CABEZA CAMPECHE', '0', '0', '', '', 4, '2021-02-22 00:23:57'),
(33, 'CANELA 5 CEROS  ', '460', '440', '', '', 2, '2021-05-07 08:48:08'),
(34, 'CANELA 5 CEROS ESPECIAL', '480', '460', '', '', 2, '2021-02-22 00:23:57'),
(35, 'CANELA EXTRA ESPECIAL', '600', '580', '', '', 2, '2021-02-22 00:23:57'),
(36, 'CANELA MOLIDA ', '25', '22', '', '', 2, '2021-05-05 12:39:46'),
(37, 'CARBONATO', '18', '17', '', '', 8, '2021-02-22 00:23:57'),
(38, 'CHARAL CHAPALA SIN SAL   ', '220', '200', '220', '', 4, '2021-05-05 12:40:18'),
(39, 'CHARAL PLATEADO ', '70', '53', '', '', 4, '2021-03-20 14:13:44'),
(40, 'CHARAL SARDINA ', '65', '60', '', '', 4, '2021-05-05 12:40:38'),
(41, 'CHIA ', '80', '70', '', '', 2, '2021-05-05 12:41:07'),
(42, 'CHILE  CASCABEL       ', '180', '500', '', '', 1, '2021-05-05 12:41:34'),
(43, 'CHILE ANCHO FLOR ', '145', '135', '', '', 1, '2021-05-05 12:41:56'),
(44, 'CHILE ANCHO GRANDE ', '130', '120', '', '', 1, '2021-05-05 12:42:47'),
(45, 'CHILE ANCHO MEDIANO  ', '120', '110', '', '', 1, '2021-05-07 09:46:46'),
(46, 'CHILE ARBOL CON PATA ', '120', '110', '', '', 1, '2021-05-05 12:43:26'),
(47, 'CHILE ARBOL MOLIDO', '35', '35', '', '', 1, '2021-02-22 00:23:57'),
(48, 'CHILE ARBOL SIN PATA ', '140', '130', '', '', 1, '2021-05-05 12:44:17'),
(49, 'CHILE CANICA', '0', '0', '', '', 1, '2021-02-22 00:23:57'),
(50, 'CHILE CATARINA ', '200', '175', '', '', 1, '2021-05-05 12:44:51'),
(51, 'CHILE CHIPOTLE', '120', '110', '', '', 1, '2021-02-22 00:23:57'),
(52, 'CHILE COSTEÑO  ', '240', '215', '', '', 1, '2021-05-05 12:45:18'),
(53, 'CHILE GUAJILLO  ', '100', '90', '', '', 1, '2021-05-05 12:45:46'),
(54, 'CHILE GUAJILLO 2A ', '55', '49', '', '', 1, '2021-05-05 12:46:08'),
(55, 'CHILE JAPONES', '0', '0', '', '', 1, '2021-02-22 00:23:57'),
(56, 'CHILE MARTAJADO MOLIDO', '35', '35', '', '', 1, '2021-02-22 00:23:57'),
(57, 'CHILE MORA  ', '75', '57', '', '', 1, '2021-05-05 12:46:28'),
(58, 'CHILE MORA S/P ', '85', '67', '', '', 1, '2021-05-05 12:46:47'),
(59, 'CHILE MORITA', '65', '50', '', '', 1, '2021-02-22 00:23:57'),
(60, 'CHILE MULATO FLOR ', '160', '145', '', '', 1, '2021-05-05 12:48:50'),
(61, 'CHILE MULATO MEDIANO ', '130', '83', '', '', 1, '2021-05-05 12:49:19'),
(62, 'CHILE PASILLA FLOR ', '140', '130', '', '', 1, '2021-05-05 12:49:45'),
(63, 'CHILE PASILLA GRANDE 1A    ', '130', '130', '', '', 1, '2021-05-05 12:51:17'),
(64, 'CHILE PASILLA MEDIANO  ', '120', '110', '', '', 1, '2021-05-05 12:51:45'),
(65, 'CHILE PICO DE PAJARO', '0', '0', '', '', 1, '2021-02-22 00:23:57'),
(66, 'CHILE PIQUIN CON LIMON', '20', '20', '', '', 1, '2021-02-22 00:23:57'),
(67, 'CHILE PIQUIN ENTERO ', '480', '430', '', '', 1, '2021-05-05 12:52:09'),
(68, 'CHILE PULLA  ', '95', '80', '', '', 1, '2021-05-07 07:50:59'),
(69, 'CHILE TABAQUERO ', '480', '450', '', '', 1, '2021-05-05 12:53:11'),
(70, 'CHILE TEJA ', '130', '117', '', '', 1, '2021-05-05 12:31:30'),
(71, 'CHILE TROMPO ', '120', '105', '', '', 1, '2021-05-05 12:53:33'),
(72, 'CIRUELA 40/50  ', '95', '70', '', '', 5, '2021-05-07 07:39:45'),
(73, 'CIRUELA SIN HUESO ', '120', '110', '', '', 5, '2021-05-05 12:54:10'),
(74, 'CLAVO', '200', '180', '', '', 2, '2021-02-22 00:23:57'),
(75, 'CLAVO MOLIDO', '200', '200', '', '', 6, '2021-02-22 00:23:57'),
(76, 'COMINO', '70', '65', '', '', 2, '2021-02-22 00:23:57'),
(77, 'COMINO MOLIDO', '60', '60', '', '', 6, '2021-02-22 00:23:57'),
(78, ' ', '', '', '', '', 6, '2021-05-05 13:02:42'),
(79, 'CONSOME EXTRA', '30', '30', '', '', 2, '2021-02-22 00:23:57'),
(80, 'FRUTA MIXTA', '0', '0', '', '', 5, '2021-02-22 00:23:57'),
(81, 'GUAJONES', '0', '0', '', '', 1, '2021-02-22 00:23:57'),
(82, 'JAMAICA CHINA ', '115', '97', '', '', 8, '2021-05-05 12:58:02'),
(83, 'JAMAICA GUERRERO ', '150', '135', '', '', 8, '2021-05-05 12:56:22'),
(84, 'JAMAICA NIGERIA', '0', '0', '', '', 8, '2021-02-22 00:23:57'),
(85, 'JAMAICA OAXACA  ', '160', '150', '', '', 8, '2021-05-05 12:55:59'),
(86, 'JAMAICA SUDAN ', '110', '90', '', '', 8, '2021-05-05 12:55:35'),
(87, 'MOLE ADOBO PASTA 1/5 kg ', '525', '110.8', '', '', 7, '2021-04-22 08:42:08'),
(88, 'MOLE ADOBO PASTA 1/10 kg', '1050', '1045', '', '', 0, '2021-02-22 00:23:57'),
(89, 'MOLE ADOBO POLVO 1/5 kg', '525', '11241', '', '', 7, '2021-02-22 00:23:57'),
(90, 'MOLE ADOBO POLVO 1/10 kg', '1050', '1045', '', '', 0, '2021-02-22 00:23:57'),
(91, 'MOLE ATOCPAN PASTA 1/5 kg', '420', '415', '', '', 7, '2021-02-22 00:23:57'),
(92, 'MOLE ATOCPAN PASTA 1/10 kg', '840', '835', '', '', 0, '2021-02-22 00:23:57'),
(93, 'MOLE ATOCPAN POLVO 1/5 kg ', '420', '88', '', '', 7, '2021-05-07 07:56:07'),
(94, 'MOLE ATOCPAN POLVO 1/10 kg', '840', '835', '', '', 0, '2021-02-22 00:23:57'),
(95, 'MOLE DEL PUEBLO PASTA 1/5 kg', '0', '0', '', '', 7, '2021-02-22 00:23:57'),
(96, 'MOLE DEL PUEBLO PASTA 1/10 kg', '0', '0', '', '', 0, '2021-02-22 00:23:57'),
(97, 'MOLE DEL PUEBLO POLVO 1/5 kg', '0', '53', '', '', 7, '2021-02-22 00:23:57'),
(98, 'MOLE DEL PUEBLO POLVO 1/10 kg', '0', '0', '', '', 0, '2021-02-22 00:23:57'),
(99, 'MOLE DULCE PASTA 1/5 kg', '535', '112.35', '', '', 7, '2021-02-22 00:23:57'),
(100, 'MOLE DULCE PASTA 1/10 kg', '1070', '1065', '', '', 0, '2021-02-22 00:23:57'),
(101, 'MOLE DULCE POLVO 1/5 kg', '535', '112.4', '', '', 7, '2021-02-22 00:23:57'),
(102, 'MOLE DULCE POLVO 1/10 kg', '1070', '1065', '', '', 0, '2021-02-22 00:23:57'),
(103, 'MOLE ESPECIAL PASTA 1/5 kg', '680', '145.4', '', '', 7, '2021-02-22 00:23:57'),
(104, 'MOLE ESPECIAL PASTA 1/10 kg', '1360', '1355', '', '', 0, '2021-02-22 00:23:57'),
(105, 'MOLE ESPECIAL PASTA C/A 1/5 kg', '680', '675', '', '', 7, '2021-02-22 00:23:57'),
(106, 'MOLE ESPECIAL PASTA C/A 1/10 kg', '1360', '1355', '', '', 0, '2021-02-22 00:23:57'),
(107, 'MOLE PICOSO PASTA C/C 1/5 kg', '715', '710', '', '', 7, '2021-02-22 00:23:57'),
(108, 'MOLE PICOSO PASTA C/C 1/10 kg', '1430', '1425', '', '', 0, '2021-02-22 00:23:57'),
(109, 'MOLE ESPECIAL POLVO 1/5 kg', '680', '145.5', '', '', 7, '2021-02-22 00:23:57'),
(110, 'MOLE ESPECIAL POLVO 1/10 kg', '1360', '1355', '', '', 0, '2021-02-22 00:23:57'),
(111, 'MOLE JOYA ATOCPAN 1/10 ', '650', '640', '', '', 7, '2021-05-05 13:05:28'),
(112, 'MOLE JOYA ESPECIAL 1/10', '870', '828', '', '', 7, '2021-02-22 00:23:57'),
(113, 'MOLE JOYA GRANULADO 1/10 ', '610', '11600', '', '', 7, '2021-03-20 13:59:40'),
(114, 'MOLE JOYA POLVO 1/10 ', '600', '11400', '', '', 7, '2021-03-20 14:00:39'),
(115, 'MOLE OAXAQUEÑO PASTA 1/5 kg', '0', '0', '', '', 7, '2021-02-22 00:23:57'),
(116, 'MOLE OAXAQUEÑO PASTA 1/10 kg', '0', '0', '', '', 0, '2021-02-22 00:23:57'),
(117, 'MOLE PICOSO PASTA 1/5 kg', '545', '114.45', '', '', 7, '2021-02-22 00:23:57'),
(118, 'MOLE PICOSO PASTA 1/10 kg', '1090', '1085', '', '', 0, '2021-02-22 00:23:57'),
(119, 'MOLE PICOSO PASTA C/A 1/5 kg', '545', '114.45', '', '', 7, '2021-02-22 00:23:57'),
(120, 'MOLE PICOSO PASTA C/A 1/10 kg', '1090', '1085', '', '', 0, '2021-02-22 00:23:57'),
(121, 'MOLE PICOSO POLVO 1/5 kg', '545', '114.45', '', '', 7, '2021-02-22 00:23:57'),
(122, 'MOLE PICOSO POLVO 1/10 kg', '1090', '1085', '', '', 0, '2021-02-22 00:23:57'),
(123, 'MOLE PIPIAN PASTA 1/5 kg', '430', '90.8', '', '', 7, '2021-02-22 00:23:57'),
(124, 'MOLE PIPIAN PASTA 1/10 kg', '860', '855', '', '', 0, '2021-02-22 00:23:57'),
(125, 'MOLE PIPIAN POLVO 1/5 kg', '430', '90.8', '', '', 7, '2021-02-22 00:23:57'),
(126, 'MOLE PIPIAN POLVO 1/10 kg', '860', '855', '', '', 0, '2021-02-22 00:23:57'),
(127, 'MOLE SAN FRANCISCO 1/5 kg', '230', '45', '', '', 7, '2021-02-22 00:23:57'),
(128, 'MOLE SAN FRANCISCO 1/10 kg', '460', '455', '', '', 0, '2021-02-22 00:23:57'),
(129, 'MOLE VERDE ALMENDRA POLVO 1/5 kg', '485', '459', '', '', 7, '2021-02-22 00:23:57'),
(130, 'MOLE VERDE ALMENDRA POLVO 1/10 kg ', '970', '965', '', '', 7, '2021-03-09 08:45:49'),
(131, 'MOLE VERDE ALMENDRADO PASTA 1/4 kg', '390', '385', '', '', 7, '2021-02-22 00:23:57'),
(132, 'MOLE VERDE SIMPLE POLVO 1/5 kg', '0', '86', '', '', 7, '2021-02-22 00:23:57'),
(133, 'MOLE VERDE SIMPLE POLVO 1/10 kg', '0', '0', '', '', 0, '2021-02-22 00:23:57'),
(134, 'NUEZ MITAD    ', '210', '180', '', '', 5, '2021-05-05 16:04:25'),
(135, 'OREGANO ', '100', '85', '', '', 2, '2021-05-05 16:05:51'),
(136, 'OREGANO MOLIDO', '60', '60', '', '', 6, '2021-02-22 00:23:57'),
(137, 'PAN MOLIDO ', '15', '14', '', '', 8, '2021-05-05 16:06:19'),
(138, 'PAPRICA CHINA', '0', '90', '', '', 1, '2021-02-22 00:23:57'),
(139, 'PAPRICA PERUANA', '0', '90', '', '', 1, '2021-02-22 00:23:57'),
(140, 'PASA CHILENA ', '60', '50', '', '', 5, '2021-03-20 12:10:51'),
(141, 'PASA NACIONAL ', '50', '40', '', '', 5, '2021-04-27 08:30:06'),
(142, 'PEPITA ENTERA  ', '100', '88', '', '', 3, '2021-05-05 16:06:51'),
(143, 'PEPITA PREPARADA', '70', '55', '', '', 2, '2021-02-22 00:23:57'),
(144, 'PEPITA SIMPLE', '65', '65', '', '', 2, '2021-02-22 00:23:57'),
(145, 'PESCADO SECO', '0', '0', '', '', 4, '2021-02-22 00:23:57'),
(146, 'PIMIENTA CHICA', '110', '100', '', '', 2, '2021-02-22 00:23:57'),
(147, 'PIMIENTA GORDA ', '110', '100', '', '', 2, '2021-05-05 16:07:27'),
(148, 'PIMIENTA MOLIDA BLANCA ', '80', '70', '', '', 6, '2021-04-06 08:58:43'),
(149, 'PIMIENTA MOLIDA NEGRA ', '80', '70', '', '', 6, '2021-05-05 16:07:56'),
(150, 'PINGUICA', '70', '70', '', '', 3, '2021-02-22 00:23:57'),
(151, 'POLVO DE CAMARON', '40', '40', '', '', 6, '2021-02-22 00:23:57'),
(152, 'PULPA DE CAMARON  ', '280', '220', '', '', 6, '2021-03-20 13:31:28'),
(153, 'SALSA YUCATECA ROJA CHICA ', '18', '15', '', '', 8, '2021-04-22 08:08:19'),
(154, 'SALSA YUCATECA ROJA GRANDE', '28', '28', '', '', 8, '2021-02-22 00:23:57'),
(155, 'SALSA YUCATECA VERDE CHICA', '18', '18', '', '', 8, '2021-02-22 00:23:57'),
(156, 'SALSA YUCATECA VERDE GRANDE', '28', '28', '', '', 8, '2021-02-22 00:23:57'),
(157, 'SEMILLA DE CILANTRO', '40', '40', '', '', 3, '2021-02-22 00:23:57'),
(158, 'TAMARINDO   ', '28', '25', '', '', 5, '2021-05-05 16:08:53'),
(159, 'TRIPILLA', '0', '0', '', '', 4, '2021-02-22 00:23:57'),
(160, 'VARIOS ', '500', '50', '', '', 8, '2021-05-05 16:09:29'),
(161, 'Almendra en Polvo', '165', '158', '165', '', 6, '2021-03-09 08:35:00'),
(162, 'MOLE SAN FRANCISCO POLVO 1/5 ', '230', '45', '230', '', 7, '2021-03-09 08:43:55'),
(163, 'Amaranto ', '40', '35', '', '', 3, '2021-05-05 12:36:01'),
(164, 'Anís Estrella', '350', '300', '', '', 2, '2021-03-20 13:51:13'),
(165, 'Guajillo Molido ', '60', '45', '60', '', 6, '2021-03-25 09:32:12'),
(166, 'Tamarindo ', '26', '24', '', '', 5, '2021-05-05 16:09:10'),
(167, 'NOTA SIN DETALLE', '1', '1', '', '', 8, '2021-04-24 12:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` mediumtext NOT NULL,
  `pagado` mediumtext NOT NULL,
  `credito` mediumtext NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `pagado`, `credito`, `fecha`) VALUES
(1, 'Periquin', '0', '0', '2021-02-10 14:58:18'),
(2, 'DAVID VILLASEÑOR', '0', '0', '2021-02-10 15:27:48'),
(3, 'ROBERTO AMBRIZ', '', '', '2021-03-09 09:25:28'),
(4, 'RAYMUNDO ZUÑIGA', '', '', '2021-03-09 09:31:35'),
(5, 'PROABASTO', '', '', '2021-03-09 09:31:51'),
(6, 'CHILES Y CONDIMENTOS AZTECA', '', '', '2021-03-09 09:33:11'),
(7, 'CACAHUATE CORRO', '', '', '2021-03-09 09:33:33'),
(8, 'VILLACARRIEDO', '', '', '2021-03-09 09:33:51'),
(9, 'DOÑA LUPE/NUEZ', '', '', '2021-05-26 07:50:27'),
(10, 'MARTHA /NUEZ', '', '', '2021-03-09 09:34:34'),
(11, 'KENNY /ÁRBOL HIDALGO', '', '', '2021-03-09 09:35:00'),
(12, 'ANTONIO CAZAREZ', '', '', '2021-03-09 09:35:36'),
(13, 'MALACO /MULATOS', '', '', '2021-03-09 09:36:40'),
(14, 'FERNANDA GAYOSSO/MORA,MORITAS,MECOS', '', '', '2021-03-09 09:37:36'),
(15, 'RICARDO ALMANZA', '', '', '2021-04-23 12:14:23'),
(16, 'CIMARRON', '', '', '2021-03-09 09:38:43'),
(17, 'SOLO LO MEJOR', '', '', '2021-03-09 09:39:00'),
(18, 'DON MIGUEL /CAMARÓN ', '', '', '2021-03-09 09:39:28'),
(19, 'TEODORO HERNÁNDEZ ', '', '', '2021-03-09 09:39:52'),
(20, 'CAMPO VERDE', '', '', '2021-03-09 09:40:23'),
(21, 'VILLACARIEDO', '', '', '2021-03-09 09:40:50'),
(22, 'LA COSECHA', '', '', '2021-03-09 09:41:53'),
(23, 'OTROS', '', '', '2021-04-06 09:32:44'),
(24, 'RICARDO ALMANZA', '', '', '2021-04-23 12:13:56'),
(25, 'antonio', '', '11000', '2021-10-28 17:51:51'),
(26, 'yo', '', '500', '2021-10-28 17:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `tiket_adeudos`
--

CREATE TABLE `tiket_adeudos` (
  `id` int(10) NOT NULL,
  `folio_unico` varchar(30) NOT NULL,
  `metodoPago` varchar(20) NOT NULL,
  `cantidad` double NOT NULL,
  `pagoExhibicion` int(5) NOT NULL,
  `diferido` int(2) NOT NULL,
  `debe` int(11) NOT NULL,
  `fechaAdeudo` datetime NOT NULL,
  `fecha_promesa_adeudo` date DEFAULT NULL,
  `fechaPago` datetime NOT NULL,
  `usuario` varchar(150) NOT NULL COMMENT 'usuario que recibe el pago',
  `corte_caja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `tiket_adeudos`
--

INSERT INTO `tiket_adeudos` (`id`, `folio_unico`, `metodoPago`, `cantidad`, `pagoExhibicion`, `diferido`, `debe`, `fechaAdeudo`, `fecha_promesa_adeudo`, `fechaPago`, `usuario`, `corte_caja`) VALUES
(1, '1640022586', 'credito', 0, 1, 1, 1, '2021-12-20 12:13:28', NULL, '2021-12-21 10:35:23', 'erick malagon - email:erick.leo.malagon@gmail.com', 7),
(3, '1640114777', 'credito', 0, 1, 1, 0, '2021-12-21 13:32:13', NULL, '2021-12-21 13:34:19', 'erick malagon - email:erick.leo.malagon@gmail.com', 8),
(4, '1640125252', '', 500, 1, 0, 0, '2021-12-21 16:22:00', '2021-12-31', '2021-12-21 16:25:01', 'erick malagon - email:erick.leo.malagon@gmail.com', 8),
(5, '1640126448', '', 20, 1, 0, 1, '2021-12-21 16:41:17', '2021-12-31', '2022-05-06 11:10:07', 'erick malagon - email:erick.leo.malagon@gmail.com', 9),
(6, '1640794361', '', 140, 1, 0, 1, '2021-12-29 10:53:27', '2021-12-31', '0000-00-00 00:00:00', 'erick malagon - email:erick.leo.malagon@gmail.com', 9),
(7, '1640796334', 'credito', 410, 1, 1, 1, '2021-12-29 10:53:43', NULL, '0000-00-00 00:00:00', 'erick malagon - email:erick.leo.malagon@gmail.com', 9),
(8, '1650410744', '', 0, 1, 0, 0, '2022-04-19 18:37:42', '2022-04-30', '2022-04-19 18:40:54', 'erick malagon - email:erick.leo.malagon@gmail.com', 12),
(9, '1650410121', 'credito', 0, 1, 1, 0, '2022-04-19 18:48:16', NULL, '2022-04-19 18:49:46', 'erick malagon - email:erick.leo.malagon@gmail.com', 12),
(10, '1651851454', '', 490, 1, 0, 1, '2023-02-02 14:46:33', '2023-02-08', '0000-00-00 00:00:00', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tiket_pagos`
--

CREATE TABLE `tiket_pagos` (
  `id` int(10) NOT NULL,
  `folio_unico` varchar(30) NOT NULL,
  `metodoPago` varchar(20) NOT NULL,
  `cantidad` double NOT NULL,
  `pagoExhibicion` int(5) NOT NULL,
  `diferido` int(2) NOT NULL,
  `debe` int(11) NOT NULL,
  `fechaPago` datetime NOT NULL,
  `usuario` varchar(150) NOT NULL COMMENT 'usuario que recibe el pago',
  `credito` varchar(11) DEFAULT NULL,
  `validado` int(5) DEFAULT NULL,
  `corte_caja` int(30) DEFAULT NULL,
  `PagoCredito` int(11) DEFAULT NULL COMMENT 'si es pago de un credito'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `tiket_pagos`
--

INSERT INTO `tiket_pagos` (`id`, `folio_unico`, `metodoPago`, `cantidad`, `pagoExhibicion`, `diferido`, `debe`, `fechaPago`, `usuario`, `credito`, `validado`, `corte_caja`, `PagoCredito`) VALUES
(1, '1640022575', 'efectivo', 300, 1, 0, 0, '2021-12-20 11:51:18', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 7, NULL),
(2, '1640022551', 'tarjeta', 483, 1, 0, 0, '2021-12-20 11:51:35', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 7, NULL),
(3, '1640022601', 'transferencia', 1350, 1, 0, 0, '2021-12-20 11:53:37', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 7, NULL),
(4, '1640022586', 'efectivo', 25, 1, 1, 1, '2021-12-20 12:13:28', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 7, NULL),
(5, '1640022586', 'tarjeta', 25, 1, 1, 1, '2021-12-20 12:13:28', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 7, NULL),
(6, '1640022586', 'transferencia', 25, 1, 1, 1, '2021-12-20 12:13:28', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 7, NULL),
(7, '1640022586', 'tarjeta', 375, 1, 0, 0, '2021-12-20 18:49:41', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 7, NULL),
(8, '1640022586', 'efectivo', 10, 1, 0, 1, '2021-12-21 10:32:27', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 7, NULL),
(9, '1640022586', 'transferencia', 10, 1, 0, 1, '2021-12-21 10:35:23', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 7, NULL),
(10, '1640114726', 'efectivo', 650, 1, 0, 0, '2021-12-21 13:31:08', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 8, NULL),
(11, '1640114715', 'tarjeta', 409, 1, 0, 0, '2021-12-21 13:31:34', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 8, NULL),
(12, '1640114757', 'transferencia', 650, 1, 0, 0, '2021-12-21 13:31:47', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 8, NULL),
(13, '1640114777', 'efectivo', 10, 1, 1, 1, '2021-12-21 13:32:13', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 8, NULL),
(14, '1640114777', 'tarjeta', 7, 1, 1, 1, '2021-12-21 13:32:13', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 8, NULL),
(15, '1640114777', 'transferencia', 10, 1, 1, 1, '2021-12-21 13:32:13', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 8, NULL),
(16, '1640114777', 'efectivo', 343, 1, 0, 0, '2021-12-21 13:34:19', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 8, NULL),
(17, '1640125252', 'tarjeta', 500, 1, 0, 0, '2021-12-21 16:25:01', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 9, NULL),
(18, '1640796334', 'efectivo', 500, 1, 1, 1, '2021-12-29 10:53:43', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 9, NULL),
(19, '1640794372', 'efectivo', 420, 1, 0, 0, '2021-12-29 11:46:34', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 10, NULL),
(20, '1650317306', 'efectivo', 1250, 1, 0, 0, '2022-04-18 17:18:13', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 11, NULL),
(21, '1650317352', 'tarjeta', 407, 1, 0, 0, '2022-04-18 17:18:48', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 11, NULL),
(22, '1650409882', 'efectivo', 860, 1, 0, 0, '2022-04-19 18:12:58', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 12, NULL),
(23, '1650410071', 'tarjeta', 1075, 1, 0, 0, '2022-04-19 18:29:53', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 12, NULL),
(24, '1650409851', 'transferencia', 1173, 1, 0, 0, '2022-04-19 18:31:24', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 12, NULL),
(25, '1650410733', 'efectivo', 1000, 1, 0, 0, '2022-04-19 18:36:00', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 12, NULL),
(26, '1650410733', 'tarjeta', 1000, 1, 0, 0, '2022-04-19 18:36:00', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 12, NULL),
(27, '1650410733', 'transferencia', 1000, 1, 0, 0, '2022-04-19 18:36:00', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 12, NULL),
(28, '1650410744', 'efectivo', 260, 1, 0, 1, '2022-04-19 18:39:17', 'erick malagon - email:erick.leo.malagon@gmail.com', '1', NULL, 12, NULL),
(29, '1650410744', 'tarjeta', 550, 1, 0, 0, '2022-04-19 18:40:54', 'erick malagon - email:erick.leo.malagon@gmail.com', '1', NULL, 12, NULL),
(30, '1650410121', 'efectivo', 20, 1, 1, 1, '2022-04-19 18:48:16', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 12, NULL),
(31, '1650410121', 'transferencia', 20, 1, 1, 1, '2022-04-19 18:48:16', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, 12, NULL),
(32, '1650410121', 'efectivo', 300, 1, 0, 0, '2022-04-19 18:49:46', 'erick malagon - email:erick.leo.malagon@gmail.com', '1', NULL, 12, NULL),
(33, '1651847885', 'efectivo', 800, 1, 0, 0, '2022-05-06 11:05:20', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, NULL, NULL),
(34, '1651850345', 'efectivo', 300, 1, 0, 0, '2022-05-06 11:05:24', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, NULL, NULL),
(35, '1640126448', 'efectivo', 200, 1, 0, 1, '2022-05-06 11:10:07', 'erick malagon - email:erick.leo.malagon@gmail.com', '1', NULL, NULL, NULL),
(36, '1651850886', 'efectivo', 512, 1, 0, 0, '2023-02-02 14:40:44', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, NULL, NULL),
(37, '1651851076', 'efectivo', 150, 1, 0, 0, '2023-02-02 14:45:39', 'erick malagon - email:erick.leo.malagon@gmail.com', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_gastos`
--

CREATE TABLE `tipo_gastos` (
  `id` int(11) NOT NULL,
  `concepto` mediumtext NOT NULL,
  `presupuesto` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `tipo_gastos`
--

INSERT INTO `tipo_gastos` (`id`, `concepto`, `presupuesto`) VALUES
(1, 'Luz', '700'),
(2, 'Agua', '0'),
(3, 'Renta bodega', '0'),
(4, 'Mama', '0'),
(5, 'Contador Fiscal', '0'),
(6, 'IMSS-INFONAVIT', '0'),
(7, 'Mtto Bodega', '0'),
(8, 'Comidas', '2000'),
(9, 'Impuesto sobre nomina', '0'),
(10, 'Generales', '3000'),
(11, 'Extras', '0'),
(12, 'Gasolina y casetas', '0'),
(13, 'Gastos vehiculos', '0'),
(14, 'Aportación para retiro', '0'),
(15, 'Bolsa', '0'),
(16, 'Prestamo', '0'),
(17, 'Proveedores', '0');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` mediumtext NOT NULL,
  `paterno` mediumtext NOT NULL,
  `materno` mediumtext NOT NULL,
  `email` mediumtext NOT NULL,
  `password` mediumtext NOT NULL,
  `estatus` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `paterno`, `materno`, `email`, `password`, `estatus`, `fecha`) VALUES
(0, '', '', '', 'leo@gmail.com', '$2y$12$uS/BVx7qhB2hNjk2KgMwzO7UixG33sOAhkhdNBnZlFyg50Eg/gQHS', 0, '2021-09-03 18:37:09'),
(1, 'Ruben', 'Zuñiga', 'Ortiz', 'rubenzuniga@live.com.mx', 'rzocdzna58', 1, '2021-01-19 00:13:42'),
(2, 'rosa ', ' ', ' ', 'rosa@hotmail.com', 'rosarosa', 1, '0000-00-00 00:00:00'),
(3, 'Enrrique', ' ', ' ', 'enrrique@gmail.com', 'enrrique', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `venta_gastos`
--

CREATE TABLE `venta_gastos` (
  `id` int(11) NOT NULL,
  `tipo_gasto` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `fecha_gasto` datetime NOT NULL,
  `notas` longtext DEFAULT NULL,
  `corte_caja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `venta_tiket`
--

CREATE TABLE `venta_tiket` (
  `id` int(11) NOT NULL,
  `sucursal` int(2) NOT NULL,
  `vendedor` int(3) NOT NULL,
  `folio` varchar(30) NOT NULL,
  `cliente_id` int(5) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `metodoPago` varchar(20) DEFAULT NULL,
  `monto_total` double DEFAULT NULL,
  `monto_iva` double DEFAULT NULL,
  `monto_pago` double DEFAULT NULL,
  `monto_adeudo` double DEFAULT NULL,
  `estatus` varchar(15) NOT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_pago` datetime DEFAULT NULL,
  `fecha_adeudo` datetime DEFAULT NULL,
  `fecha_pago_adeudo` datetime DEFAULT NULL,
  `fecha_promesa_adeudo` date DEFAULT NULL COMMENT 'fecha de prosesa de pago del adeudo o credito',
  `corte_caja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci COMMENT='datos para el tiket y relacionar productos de venta';

--
-- Dumping data for table `venta_tiket`
--

INSERT INTO `venta_tiket` (`id`, `sucursal`, `vendedor`, `folio`, `cliente_id`, `cliente`, `metodoPago`, `monto_total`, `monto_iva`, `monto_pago`, `monto_adeudo`, `estatus`, `fecha_creacion`, `fecha_pago`, `fecha_adeudo`, `fecha_pago_adeudo`, `fecha_promesa_adeudo`, `corte_caja`) VALUES
(1, 1, 6, '1640022551', 0, 'Venta General', 'tarjeta', 483, NULL, 483, NULL, 'abierto', '2021-12-20 11:49:11', '2021-12-20 11:51:35', NULL, NULL, NULL, 7),
(2, 1, 6, '1640022575', 0, 'Venta General', 'efectivo', 300, NULL, 300, NULL, 'pagado', '2021-12-20 11:49:35', '2021-12-20 11:51:18', NULL, NULL, NULL, 7),
(3, 1, 6, '1640022586', 0, 'Venta General', 'diferido', 450, NULL, 450, 0, 'pagado', '2021-12-20 11:49:46', '2021-12-20 12:13:28', '2021-12-20 12:13:28', '2021-12-21 10:35:23', NULL, 7),
(4, 1, 6, '1640022601', 18, 'EFRAÍN ÁGUILA Y ALICIA', 'transferencia', 1350, NULL, 1350, NULL, 'pagado', '2021-12-20 11:50:01', '2021-12-20 11:53:37', NULL, NULL, NULL, 7),
(5, 1, 6, '1640114715', 44, 'RICARDO SUETER', 'tarjeta', 409, NULL, 409, NULL, 'pagado', '2021-12-21 13:25:15', '2021-12-21 13:31:34', NULL, NULL, NULL, 8),
(6, 1, 6, '1640114726', 15, 'DOÑA CHUY Y PATY ', 'efectivo', 650, NULL, 650, NULL, 'pagado', '2021-12-21 13:25:26', '2021-12-21 13:31:08', NULL, NULL, NULL, 8),
(7, 1, 6, '1640114757', 28, 'DOÑA MARY  ', 'transferencia', 650, NULL, 650, NULL, 'pagado', '2021-12-21 13:25:57', '2021-12-21 13:31:47', NULL, NULL, NULL, 8),
(8, 1, 6, '1640114777', 25, 'JOSÉ LUIS', 'diferido', 370, NULL, 370, 0, 'pagado', '2021-12-21 13:26:17', '2021-12-21 13:32:13', '2021-12-21 13:32:13', '2021-12-21 13:34:19', NULL, 8),
(9, 1, 2, '1640125252', 5, 'Daniela', 'credito', 500, NULL, 500, 0, 'credito', '2021-12-21 16:20:52', NULL, '2021-12-21 16:22:00', '2021-12-21 16:25:01', '2021-12-31', 8),
(10, 1, 2, '1640126448', 0, 'Venta General', 'credito', 220, NULL, 200, 20, 'credito', '2021-12-21 16:40:48', NULL, '2021-12-21 16:41:17', '2022-05-06 11:10:07', '2021-12-31', 9),
(11, 1, 2, '1640794361', 0, 'Venta General', 'credito', 140, NULL, 0, 140, 'credito', '2021-12-29 10:12:41', NULL, '2021-12-29 10:53:27', NULL, '2021-12-31', 9),
(12, 1, 2, '1640794372', 0, 'Venta General', 'efectivo', 420, NULL, 420, NULL, 'pagado', '2021-12-29 10:12:52', '2021-12-29 11:46:34', NULL, NULL, NULL, 9),
(13, 1, 2, '1640796334', 2, 'Rogelio Aguilar', 'diferido', 910, NULL, 500, 410, 'pagado', '2021-12-29 10:45:34', '2021-12-29 10:53:43', '2021-12-29 10:53:43', NULL, NULL, 9),
(14, 1, 6, '1650317306', 11, 'ALBINO', 'efectivo', 1250, NULL, 1250, NULL, 'pagado', '2022-04-18 16:28:26', '2022-04-18 17:18:13', NULL, NULL, NULL, 10),
(15, 1, 6, '1650317352', 0, 'Venta General', 'tarjeta', 407, NULL, 407, NULL, 'pagado', '2022-04-18 16:29:12', '2022-04-18 17:18:48', NULL, NULL, NULL, 10),
(16, 1, 6, '1650409851', 2, 'Rogelio Aguilar', 'transferencia', 1173, NULL, 1173, NULL, 'pagado', '2022-04-19 18:10:51', '2022-04-19 18:31:24', NULL, NULL, NULL, 12),
(17, 1, 6, '1650409882', 4, 'Chema', 'efectivo', 860, NULL, 860, NULL, 'pagado', '2022-04-19 18:11:22', '2022-04-19 18:12:58', NULL, NULL, NULL, 12),
(18, 1, 6, '1650410071', 41, 'PANCHO', 'tarjeta', 1075, NULL, 1075, NULL, 'pagado', '2022-04-19 18:14:31', '2022-04-19 18:29:53', NULL, NULL, NULL, 12),
(19, 1, 6, '1650410121', 3, 'Hilario ', 'diferido', 340, NULL, 340, 0, 'pagado', '2022-04-19 18:15:21', '2022-04-19 18:48:16', '2022-04-19 18:48:16', '2022-04-19 18:49:46', NULL, 12),
(20, 1, 6, '1650410733', 0, 'Venta General', 'diferido', 3000, NULL, 3000, NULL, 'pagado', '2022-04-19 18:25:33', '2022-04-19 18:36:00', NULL, NULL, NULL, 12),
(21, 1, 6, '1650410744', 42, 'PANCHITA', 'credito', 810, NULL, 810, 0, 'credito', '2022-04-19 18:25:44', NULL, '2022-04-19 18:37:42', '2022-04-19 18:40:54', '2022-04-30', 12),
(22, 1, 6, '1651847885', 0, 'Venta General', 'efectivo', 800, NULL, 800, NULL, 'pagado', '2022-05-06 09:38:05', '2022-05-06 11:05:20', NULL, NULL, NULL, 13),
(23, 1, 6, '1651850345', 0, 'Venta General', 'efectivo', 300, NULL, 300, NULL, 'pagado', '2022-05-06 10:19:05', '2022-05-06 11:05:24', NULL, NULL, NULL, NULL),
(24, 1, 6, '1651850886', 2, 'Rogelio Aguilar', 'efectivo', 512, NULL, 512, NULL, 'pagado', '2022-05-06 10:28:06', '2023-02-02 14:40:44', NULL, NULL, NULL, NULL),
(25, 1, 6, '1651851076', 0, 'Venta General', 'efectivo', 150, NULL, 150, NULL, 'pagado', '2022-05-06 10:31:16', '2023-02-02 14:45:39', NULL, NULL, NULL, NULL),
(26, 1, 6, '1651851454', 0, 'Venta General', 'credito', 490, NULL, 0, 490, 'credito', '2022-05-06 10:37:34', NULL, '2023-02-02 14:46:33', NULL, '2023-02-08', NULL),
(27, 1, 6, '1651851955', 0, 'Venta General', NULL, 2166, NULL, NULL, NULL, 'abierto', '2022-05-06 10:45:55', NULL, NULL, NULL, NULL, NULL),
(28, 1, 6, '1674854914', 0, 'Venta General', NULL, 195, NULL, NULL, NULL, 'abierto', '2023-01-27 15:28:34', NULL, NULL, NULL, NULL, NULL);

--
-- Triggers `venta_tiket`
--
DELIMITER $$
CREATE TRIGGER `editar_tiket` BEFORE UPDATE ON `venta_tiket` FOR EACH ROW BEGIN

DECLARE clienteT VARCHAR(50);

if new.cliente_id <> 0 THEN
  set clienteT = (select nombre from clientes where id = new.cliente_id);
else 
  set clienteT = 'Venta General';
end if;

set new.cliente = clienteT;

end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `nuevo_tiket` BEFORE INSERT ON `venta_tiket` FOR EACH ROW BEGIN

DECLARE clienteT VARCHAR(50);

if new.cliente_id <> 0 THEN
  set clienteT = (select nombre from clientes where id = new.cliente_id);
else 
  set clienteT = 'Venta General';
end if;

set new.cliente = clienteT;

end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abono_clientes`
--
ALTER TABLE `abono_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `abono_entradas`
--
ALTER TABLE `abono_entradas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cierres_caja`
--
ALTER TABLE `cierres_caja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corte_caja`
--
ALTER TABLE `corte_caja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inicio_caja`
--
ALTER TABLE `inicio_caja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket_adeudos`
--
ALTER TABLE `tiket_adeudos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket_pagos`
--
ALTER TABLE `tiket_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_gastos`
--
ALTER TABLE `tipo_gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venta_gastos`
--
ALTER TABLE `venta_gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venta_tiket`
--
ALTER TABLE `venta_tiket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abono_clientes`
--
ALTER TABLE `abono_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `abono_entradas`
--
ALTER TABLE `abono_entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cierres_caja`
--
ALTER TABLE `cierres_caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `corte_caja`
--
ALTER TABLE `corte_caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inicio_caja`
--
ALTER TABLE `inicio_caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tiket_adeudos`
--
ALTER TABLE `tiket_adeudos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tiket_pagos`
--
ALTER TABLE `tiket_pagos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tipo_gastos`
--
ALTER TABLE `tipo_gastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `venta_gastos`
--
ALTER TABLE `venta_gastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `venta_tiket`
--
ALTER TABLE `venta_tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
