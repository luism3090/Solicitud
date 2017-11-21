-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2017 a las 07:02:04
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `solicitud_alumno`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `no_de_control` varchar(100) NOT NULL,
  `id_semestre` int(11) NOT NULL,
  `apellido_paterno` varchar(100) NOT NULL,
  `apellido_materno` varchar(100) NOT NULL,
  `nombre_alumno` varchar(100) NOT NULL,
  `curp_alumno` varchar(50) NOT NULL,
  `creditos_aprobados` int(11) DEFAULT NULL,
  `creditos_cursados` int(11) DEFAULT NULL,
  `clave_oficial` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`no_de_control`, `id_semestre`, `apellido_paterno`, `apellido_materno`, `nombre_alumno`, `curp_alumno`, `creditos_aprobados`, `creditos_cursados`, `clave_oficial`) VALUES
('123987456', 1, 'Mora', 'Luna', 'Roberto', 'RML56345EGE', NULL, NULL, 'IE0905'),
('4444444444', 1, 'Mata', 'Torres', 'Diego', 'DMT3252353', NULL, NULL, 'IAC4826'),
('77777777', 2, 'Molina', 'Escobar', 'Luis', 'LME3090', NULL, NULL, 'IAC4826');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE IF NOT EXISTS `carreras` (
  `clave_oficial` varchar(200) NOT NULL,
  `carrera` varchar(200) NOT NULL,
  `nombre_carrera` varchar(200) NOT NULL,
  `nombre_reducido` varchar(100) NOT NULL,
  `carga_maxima` int(11) NOT NULL,
  `carga_minima` int(11) NOT NULL,
  `creditos_totales` int(11) NOT NULL,
  `fecha_ingreso` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`clave_oficial`, `carrera`, `nombre_carrera`, `nombre_reducido`, `carga_maxima`, `carga_minima`, `creditos_totales`, `fecha_ingreso`) VALUES
('IAC4826', 'IAC', 'Ingenieria en Acuicultura', 'Ing. Acui', 30, 30, 60, '2017-11-16 22:11:39'),
('IAL0903', 'IAL', 'Ingenieria Mecanica', 'Ing Alim', 44, 44, 44, '2017-11-12 00:00:01'),
('IE0905', 'Electrónica', 'Ingeniería en Electrónica', 'Ing. Elect', 12, 10, 15, '2017-11-12 20:24:37'),
('ISC0902', 'ISC', 'Ingenieria en Sistemas Computacionales', 'Ing. Sist. Comp', 100, 80, 120, '2017-11-12 00:00:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
`id_materia` int(11) NOT NULL,
  `nombre_completo_materia` varchar(100) NOT NULL,
  `nombre_abreviado_materia` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nombre_completo_materia`, `nombre_abreviado_materia`) VALUES
(3, 'Programación Web con PHP', 'PWP'),
(4, 'Matemáticas I', 'Mate I'),
(6, 'Inteligencia Artificial', 'IA'),
(7, 'Redes de computadoras', 'Red comp'),
(8, 'Ingles I', 'Ing'),
(9, 'Bases de datos', 'BD'),
(10, 'Contabilidad i', 'Conta i'),
(14, 'Calculo diferencial', 'CalD'),
(15, 'Mecánica Clásica', 'Meca'),
(16, 'Taller de Etica', 'TE'),
(17, 'Fundamentos de Investigacion', 'FU'),
(18, 'Comunicación Humana', 'COMU'),
(19, 'Dibujo Mecanico', 'DM'),
(20, 'Biologia Acuatica', 'BA'),
(21, 'Introduccion a la Acuicultura', 'IAC'),
(22, 'Desarrollo Humano', 'DH');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos_escolares`
--

CREATE TABLE IF NOT EXISTS `periodos_escolares` (
`id_periodo_escolar` int(11) NOT NULL,
  `periodo` varchar(50) DEFAULT NULL,
  `identificacion_larga` varchar(100) DEFAULT NULL,
  `identificacion_corta` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `periodos_escolares`
--

INSERT INTO `periodos_escolares` (`id_periodo_escolar`, `periodo`, `identificacion_larga`, `identificacion_corta`) VALUES
(2, '20171', 'Enero-Junio/2017', 'Ene-Jun/2017'),
(3, '20172', 'Verano/2017', NULL),
(4, '20173', 'Agosto_Diciembre/2017', 'Ago-Dic/2017');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_materias_carreras`
--

CREATE TABLE IF NOT EXISTS `rel_materias_carreras` (
  `clave_oficial` varchar(100) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `creditos_materia` int(11) NOT NULL,
  `horas_teoricas` float NOT NULL,
  `horas_practicas` float NOT NULL,
  `id_semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rel_materias_carreras`
--

INSERT INTO `rel_materias_carreras` (`clave_oficial`, `id_materia`, `creditos_materia`, `horas_teoricas`, `horas_practicas`, `id_semestre`) VALUES
('ISC0902', 4, 6, 6, 6, 1),
('IAL0903', 3, 1, 1, 1, 10),
('IAL0903', 4, 2, 2, 2, 10),
('IAL0903', 4, 2, 2, 2, 1),
('IAL0903', 15, 3, 3, 3, 2),
('IAC4826', 3, 2, 2, 2, 1),
('IAC4826', 4, 3, 3, 3, 1),
('IAC4826', 8, 2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestres`
--

CREATE TABLE IF NOT EXISTS `semestres` (
`id_semestre` int(11) NOT NULL,
  `nombre_semestre` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `semestres`
--

INSERT INTO `semestres` (`id_semestre`, `nombre_semestre`) VALUES
(1, '1° Semestre'),
(2, '2° Semestre'),
(3, '3° Semestre'),
(4, '4° Semestre'),
(5, '5° Semestre'),
(6, '6° Semestre'),
(7, '7° Semestre'),
(8, '8° Semestre'),
(9, '9° Semestre'),
(10, '10° Semestre'),
(11, '11° Semestre'),
(12, '12° Semestre'),
(13, '13° Semestre'),
(14, '14° Semestre'),
(15, '15° Semestre'),
(16, '16° Semestre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE IF NOT EXISTS `solicitudes` (
`num_solicitud` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `observacion` varchar(350) DEFAULT NULL,
  `asunto` varchar(350) NOT NULL,
  `lugar` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL,
  `motivos_academicos` varchar(500) DEFAULT NULL,
  `motivos_personales` varchar(500) DEFAULT NULL,
  `otros` varchar(500) DEFAULT NULL,
  `id_semestre` int(11) NOT NULL,
  `no_de_control` varchar(100) NOT NULL,
  `id_periodo_escolar` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`num_solicitud`, `status`, `observacion`, `asunto`, `lugar`, `fecha`, `motivos_academicos`, `motivos_personales`, `otros`, `id_semestre`, `no_de_control`, `id_periodo_escolar`) VALUES
(2, 'Pendiente', 'Observacion 1', 'Asunto 1', 'Oaxaca', '2017-11-20 00:00:00', 'motivos academicos 1', 'motivos personales 1', 'otros 1', 1, '77777777', 2),
(3, 'Pendiente', 'obervaciones 2', 'Asunto 2', 'Xalapa', '2017-11-20 00:00:00', 'motivos academicos 2', 'motivos personales 2', 'otros 2', 1, '123987456', 2),
(4, 'Pendiente', 'ob 3', 'Asunto 3', 'Vera', '2017-11-20 00:00:00', 'academicos 3', 'personales 3', '', 2, '77777777', 2),
(5, 'Pendiente', 'observaciones 4', 'Asunto 4', 'México', '2017-11-21 00:00:00', 'academicos 4', '', '', 1, '4444444444', 2),
(6, 'Pendiente', 'observacione 5', 'Asunto 5', 'Salina Cruz', '2017-11-30 00:00:00', 'academicos 5', '', '', 1, '4444444444', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `correo`, `password`, `estado`) VALUES
(1, 'Luis', 'Moreno', 'luis@hotmail.com', '12345', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
 ADD PRIMARY KEY (`no_de_control`), ADD KEY `fk_alumnos_carreras1_idx` (`clave_oficial`), ADD KEY `fk_alumnos_semestres1_idx` (`id_semestre`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
 ADD PRIMARY KEY (`clave_oficial`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
 ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `periodos_escolares`
--
ALTER TABLE `periodos_escolares`
 ADD PRIMARY KEY (`id_periodo_escolar`);

--
-- Indices de la tabla `rel_materias_carreras`
--
ALTER TABLE `rel_materias_carreras`
 ADD KEY `FK_rel_materias_carreras_idx` (`clave_oficial`), ADD KEY `fk_rel_materias_carreras_materias1_idx` (`id_materia`), ADD KEY `fk_rel_materias_carreras_semestres1_idx` (`id_semestre`);

--
-- Indices de la tabla `semestres`
--
ALTER TABLE `semestres`
 ADD PRIMARY KEY (`id_semestre`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
 ADD PRIMARY KEY (`num_solicitud`), ADD KEY `fk_solicitudes_semestres1_idx` (`id_semestre`), ADD KEY `fk_solicitudes_alumnos1_idx` (`no_de_control`), ADD KEY `fk_solicitudes_periodos_escolares1_idx` (`id_periodo_escolar`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `periodos_escolares`
--
ALTER TABLE `periodos_escolares`
MODIFY `id_periodo_escolar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `semestres`
--
ALTER TABLE `semestres`
MODIFY `id_semestre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
MODIFY `num_solicitud` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
ADD CONSTRAINT `fk_alumnos_carreras1` FOREIGN KEY (`clave_oficial`) REFERENCES `carreras` (`clave_oficial`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `fk_alumnos_semestres1` FOREIGN KEY (`id_semestre`) REFERENCES `semestres` (`id_semestre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rel_materias_carreras`
--
ALTER TABLE `rel_materias_carreras`
ADD CONSTRAINT `FK_rel_materias_carreras` FOREIGN KEY (`clave_oficial`) REFERENCES `carreras` (`clave_oficial`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `fk_rel_materias_carreras_materias1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_rel_materias_carreras_semestres1` FOREIGN KEY (`id_semestre`) REFERENCES `semestres` (`id_semestre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
ADD CONSTRAINT `fk_solicitudes_alumnos1` FOREIGN KEY (`no_de_control`) REFERENCES `alumnos` (`no_de_control`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_solicitudes_periodos_escolares1` FOREIGN KEY (`id_periodo_escolar`) REFERENCES `periodos_escolares` (`id_periodo_escolar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_solicitudes_semestres1` FOREIGN KEY (`id_semestre`) REFERENCES `semestres` (`id_semestre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
