-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2025 a las 06:15:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `los_rosales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idAdministrador` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(1, 'Luis', 'Ramirez', 'a@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'Ana', 'Martinez', 'b@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamento`
--

CREATE TABLE `apartamento` (
  `torre` varchar(45) NOT NULL,
  `apartamento` varchar(45) NOT NULL,
  `Propietario_idPropietario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `apartamento`
--

INSERT INTO `apartamento` (`torre`, `apartamento`, `Propietario_idPropietario`) VALUES
('Torre A', '101', 101),
('Torre A', '102', 102),
('Torre A', '103', 103),
('Torre B', '201', 104),
('Torre B', '202', 105),
('Torre B', '203', 106),
('Torre C', '301', 107),
('Torre C', '302', 108),
('Torre C', '303', 109),
('Torre D', '401', 110);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `Administrador_idAdministrador` int(11) NOT NULL,
  `Apartamento_torre` varchar(45) NOT NULL,
  `Apartamento_apartamento` varchar(45) NOT NULL,
  `fecha_cobro` date NOT NULL,
  `fecha_pago` date DEFAULT NULL,
  `pago_sin_interes` int(11) NOT NULL,
  `interes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFactura`, `Administrador_idAdministrador`, `Apartamento_torre`, `Apartamento_apartamento`, `fecha_cobro`, `fecha_pago`, `pago_sin_interes`, `interes`) VALUES
(1001, 1, 'Torre A', '101', '2025-05-01', '2025-05-05', 100000, 102000),
(1002, 1, 'Torre A', '102', '2025-05-01', NULL, 95000, 97000),
(1003, 1, 'Torre A', '103', '2025-05-01', '2025-05-10', 98000, 100000),
(1004, 2, 'Torre B', '201', '2025-05-01', '2025-05-08', 110000, 112000),
(1005, 2, 'Torre B', '202', '2025-05-01', NULL, 105000, 107000),
(1006, 2, 'Torre B', '203', '2025-05-01', '2025-05-15', 115000, 117500),
(1007, 1, 'Torre C', '301', '2025-05-01', '2025-05-05', 120000, 122500),
(1008, 1, 'Torre C', '302', '2025-05-01', '2025-05-07', 125000, 127000),
(1009, 2, 'Torre C', '303', '2025-05-01', NULL, 130000, 133000),
(1010, 2, 'Torre D', '401', '2025-05-01', '2025-05-09', 135000, 138000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `idPropietario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`idPropietario`, `nombre`, `apellido`, `correo`, `clave`, `fecha_nacimiento`) VALUES
(101, 'Juan', 'Perez', 'pro@gmail.com', '202cb962ac59075b964b07152d234b70', '1980-05-10'),
(102, 'Maria', 'Gomez', 'maria.gomez@email.com', 'clave456', '1975-12-22'),
(103, 'Carlos', 'Lopez', 'carlos.lopez@email.com', 'clave789', '1990-03-15'),
(104, 'Luisa', 'Martinez', 'luisa.martinez@email.com', 'clave321', '1988-07-18'),
(105, 'Pedro', 'Sanchez', 'pedro.sanchez@email.com', 'clave654', '1970-11-02'),
(106, 'Ana', 'Rodriguez', 'ana.rodriguez@email.com', 'clave987', '1992-01-25'),
(107, 'Sofia', 'Vargas', 'sofia.vargas@email.com', 'clave111', '1985-04-14'),
(108, 'Miguel', 'Ramirez', 'miguel.ramirez@email.com', 'clave222', '1978-09-30'),
(109, 'Valeria', 'Ortiz', 'valeria.ortiz@email.com', 'clave333', '1995-06-10'),
(110, 'Andres', 'Castillo', 'andres.castillo@email.com', 'clave444', '1982-11-05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`);

--
-- Indices de la tabla `apartamento`
--
ALTER TABLE `apartamento`
  ADD PRIMARY KEY (`torre`,`apartamento`),
  ADD KEY `fk_Apartamento_Propietario_id` (`Propietario_idPropietario`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `fk_Factura_Administrador1_idx` (`Administrador_idAdministrador`),
  ADD KEY `fk_Factura_Apartamento1_idx` (`Apartamento_torre`,`Apartamento_apartamento`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`idPropietario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apartamento`
--
ALTER TABLE `apartamento`
  ADD CONSTRAINT `fk_Apartamento_Propietario` FOREIGN KEY (`Propietario_idPropietario`) REFERENCES `propietario` (`idPropietario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_Factura_Administrador1` FOREIGN KEY (`Administrador_idAdministrador`) REFERENCES `administrador` (`idAdministrador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Factura_Apartamento1` FOREIGN KEY (`Apartamento_torre`,`Apartamento_apartamento`) REFERENCES `apartamento` (`torre`, `apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
