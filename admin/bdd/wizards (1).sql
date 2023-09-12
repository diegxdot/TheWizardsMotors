-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2021 a las 09:12:05
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wizards`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `idU` varchar(50) NOT NULL,
  `asunto` varchar(50) NOT NULL,
  `comentario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `idU`, `asunto`, `comentario`) VALUES
(0, 'diegohzg12@gmail.com', 'Excelente servicio', 'Compre mi primer vehiculo aquí, y salio todo perfecto con el servicio.'),
(0, 'esparta10008000@gmail.com', 'Bueno', 'Los trabajadores me trataron bien y recibi nuevo vehiculo woao'),
(0, 'diegohzg12@gmail.com', 'Bueno', 'asdsada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`id`, `nombre`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preventa`
--

CREATE TABLE `preventa` (
  `id` int(11) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `vehiculo` int(11) NOT NULL,
  `pagado` int(11) NOT NULL,
  `abonado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidoP` varchar(20) NOT NULL,
  `apellidoM` varchar(20) NOT NULL,
  `correo` varchar(40) DEFAULT NULL,
  `contrasena` varchar(18) DEFAULT NULL,
  `estatus` int(11) NOT NULL,
  `privilegios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `curp`, `nombre`, `apellidoP`, `apellidoM`, `correo`, `contrasena`, `estatus`, `privilegios`) VALUES
(1, '0', 'Administrador', '', '', 'contacto@wizards.com', '1234', 1, 1),
(4, 'HEGD021231HGTRRGA8', 'Diego', 'Hernandez', 'García', 'diegohzg12@gmail.com', 'Kawita12@', 1, 1),
(5, '021', 'Gera', 'Toro', 'García', 'a@sol.com', '1234', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `anyo` varchar(4) DEFAULT NULL,
  `km` varchar(10) NOT NULL,
  `precio` varchar(10) NOT NULL,
  `resumen` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `marca`, `modelo`, `anyo`, `km`, `precio`, `resumen`, `imagen`) VALUES
(1, 'Ford', 'Mustang', '2021', '100km', '$860,800', 'Disfruta de todo el Poder y Desempeño de Mustang 2021, el Auto Deportivo icónico de Ford que a través de sus 460 Caballos de Fuerza te harán experimentar la Adrenalina al Máximo, ya sea en Ciudad, Carretera o en Pistas de Carreras. ', 'uploads/fordmustang2021.png'),
(3, 'Ford', 'Figo', '2021', '100km', '$250,000', 'Viaja con amigos o familia en Ford Figo 2021, el auto compacto que ofrece un excepcional rendimiento de combustible, gran desempeño en ciudad o carretera y amplio espacio interior, equipado con gran tecnología compatible con tu smartphone.', 'uploads/figo2021.png'),
(8, 'Chevrolet', 'Aveo', '2022', '100km', '$210,000', 'Chevrolet Aveo 2022 te permite hacer más de lo que te gusta, gracias a su diseño, espacio interior y gran rendimiento.', 'uploads/aveo2022.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preventa`
--
ALTER TABLE `preventa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curp del comprador` (`curp`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `curp` (`curp`),
  ADD KEY `estatus del usuario` (`estatus`),
  ADD KEY `privilegios del usuario` (`privilegios`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preventa`
--
ALTER TABLE `preventa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `preventa`
--
ALTER TABLE `preventa`
  ADD CONSTRAINT `curp del comprador` FOREIGN KEY (`curp`) REFERENCES `usuarios` (`curp`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `estatus del usuario` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `privilegios del usuario` FOREIGN KEY (`privilegios`) REFERENCES `privilegios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
