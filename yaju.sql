-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-03-2017 a las 01:34:54
-- Versión del servidor: 5.5.38-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `yaju`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'Arte y Humanidades'),
(2, 'Automoviles y Transporte'),
(4, 'Belleza y estilo'),
(5, 'Ciencias sociales'),
(6, 'Ciencias y matematicas'),
(7, 'Comer y beber'),
(8, 'Computadoras e internet'),
(9, 'Deportes'),
(10, 'Educacion y formacion'),
(11, 'Electronica de consumo'),
(12, 'Embarazo y maternidad'),
(13, 'Familia, Amor y Relaciones'),
(14, 'Hogar y jardineria'),
(3, 'Internacional'),
(15, 'Juegos y recreacion'),
(16, 'Mascotas'),
(18, 'Medio ambiente'),
(19, 'Musica y entretenimiento'),
(20, 'Negocios y finanzas'),
(21, 'Noticias y eventos'),
(22, 'Política y gobierno'),
(23, 'Restaurantes'),
(24, 'Salud y belleza'),
(25, 'Sociedad y cultura'),
(17, 'Viajes'),
(26, 'Yajú y sus Productos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) CHARACTER SET latin1 NOT NULL,
  `preguntas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nick` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria` (`categoria`),
  KEY `preguntas` (`preguntas`),
  KEY `nick` (`nick`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `categoria`, `preguntas`, `nick`, `fecha`, `hora`) VALUES
(1, 'Arte y Humanidades', '¿Qué es el arte?', 'balvarado', '2017-02-17', '20:00:00'),
(2, 'Ciencias y matematicas', '¿Cuanto es 2x2-1?', 'drivera', '2017-02-17', '00:00:00'),
(3, 'Automoviles y Transporte', '¿Que es un carro?', 'esilva', '2017-02-17', '00:00:00'),
(4, 'Belleza y estilo', '¿Como tener abdominales en 1 semana?', 'dmolineros', '2017-02-17', '00:00:00'),
(5, 'Ciencias sociales', '¿Quien es Descartes?', 'jnavarro', '2017-02-17', '00:00:00'),
(6, 'Deportes', '¿Cuanto quedo el Barcelona de Espana?', 'balvarado', '2017-02-17', '21:35:29'),
(7, 'Mascotas', '¿Perros o Gatos?', 'jnavarro', '2017-02-17', '21:35:58'),
(8, 'Deportes', '¿Cuando juega Ecuador?', 'pepeperez', '2017-02-17', '21:36:27'),
(9, 'Comer y beber', '¿Papas fritas o Mote?', 'balvarado', '2017-02-17', '21:37:36'),
(10, 'Deportes', '¿Cuando juega el Chelsea?', 'dmolineros', '2017-02-17', '21:38:20'),
(11, 'Computadoras e internet', '¿Macbook o Surface?', 'gcisneros', '2017-02-17', '21:39:03'),
(12, 'Arte y Humanidades', '¿Quien fue Da Vinci?', 'gcisneros', '2017-02-18', '00:33:59'),
(13, 'Comer y beber', '¿Jugo o Gaseosa?', 'mbaracus', '2017-02-18', '03:46:14'),
(14, 'Internacional', '¿Creen que Trump de verdad construya el muro?', 'balvarado', '2017-02-18', '05:33:20'),
(15, 'Familia, Amor y Relaciones', '¿Es normal que mis padres peleen?', 'jnavarro', '2017-02-18', '05:39:44'),
(16, 'Comer y beber', '¿El restaurante Salsaritas sirve buenos tacos?', 'ppregunton', '2017-02-28', '12:10:53'),
(17, 'Comer y beber', '¿Donde venden las mejores micheladas?', 'dmolineros', '2017-03-03', '08:30:00'),
(18, 'Deportes', '¿Quien es el jugador de fútbol mas rápido del mundo?', 'ppregunton', '2017-03-01', '23:30:00'),
(19, 'Arte y Humanidades', '¿Que es el ballet?', 'jnavarro', '2017-03-02', '11:27:00'),
(20, 'Ciencias y matemáticas', '¿Quien fue Aristoteles?', 'balvarado', '2017-03-09', '02:00:00'),
(21, 'Automoviles y Transporte', '¿Que es mejor un Porsche o un audi?', 'mbaracus', '2017-03-09', '04:00:00'),
(22, 'Ciencias sociales', '¿Donde está localizado Islandia?', 'esilva', '2017-03-09', '12:00:00'),
(23, 'Mascotas', '¿Cuantos años viven los perros?', 'drivera', '2017-03-08', '14:00:00'),
(24, 'Belleza y estilo', '¿Sirven las cremas antiarrugas?', 'gcisneros', '2017-03-10', '18:00:00'),
(25, 'Computadoras e internet', '¿Que marca de laptop es buena para comprar?', 'pepeperez', '2017-03-10', '14:00:00'),
(26, 'Familia, Amor y Relaciones', '¿Como se puede tener una relación con tu pareja fuerte?', 'balvarado', '2017-03-09', '13:00:00'),
(28, 'Familia, Amor y Relaciones', '¿Como se puede tener una relación con tu pareja fuerte?', 'balvarado', '2017-03-09', '13:00:00'),
(29, 'Comer y beber ', '¿Donde vende hamburguesas con refill de papas o gaseosa?', 'jnavarro', '2017-03-10', '16:00:00'),
(30, 'Deportes', '¿Cuantos goles lleva el Pirata Barcos en LDU?', 'dmolineros', '2017-03-10', '21:00:00'),
(31, 'Arte y Humanidades', '¿Quien pinto la Monalisa?', 'esilva', '2017-03-11', '22:00:00'),
(32, 'Ciencias y matemáticas', '¿Como se hace el trinomio cuadrado perfecto?', 'drivera', '2017-03-11', '11:00:00'),
(33, 'Automoviles y Transporte', '¿Que bus me deja en Pintag?', 'pepeperez', '2017-03-10', '19:00:00'),
(34, 'Ciencias sociales', '¿Que paso con la civilización maya?', 'balvarado', '2017-03-04', '08:00:00'),
(35, 'Mascotas', '¿Qué pasa si les cortan el bigote a los gatos?', 'gcisneros', '2017-03-05', '18:00:00'),
(36, 'Belleza y estilo', '¿Cual corte de pelo está a la moda?', 'dmolineros', '2017-03-06', '10:00:00'),
(37, 'Computadoras e internet', '¿Netlife es el mejor internet en Ecuador?', 'gcisneros', '2017-03-04', '08:00:00'),
(38, 'Familia, Amor y Relaciones', '¿Como puedo ser un buen hijo?', 'jnavarro', '2017-03-07', '06:00:00'),
(39, 'Comer y beber', '¿Donde venden buenas guaguas de pan?', 'amediavilla', '2017-03-12', '22:44:44'),
(40, 'Comer y beber', '¿Pilsener o Club?', 'amediavilla', '2017-03-12', '22:48:10'),
(41, 'Arte y Humanidades', '¿Quien pintó El Grito?', 'amediavilla', '2017-03-12', '22:53:50'),
(42, 'Belleza y estilo', '¿Las mascarillas asiáticas para puntos negros funcionan?', 'AngelesC', '2017-03-12', '23:38:35'),
(43, 'Computadoras e internet', '¿Corregir Error de Windows Update para Windows 10?', 'elgeek', '2017-03-12', '23:39:30'),
(44, 'Belleza y estilo', '¿El aceite de coco es bueno para dar brillo al cabello?', 'AngelesC', '2017-03-12', '23:40:02'),
(45, 'Ciencias y matematicas', '¿Como completar el trinomio cuadrado perfecto ?', 'elgeek', '2017-03-12', '23:41:26'),
(46, 'Deportes', '¿En que mes del 2018 empieza el mundial?', 'NicolasB23', '2017-03-12', '23:41:37'),
(47, 'Deportes', '¿Cual es el mayor récord de Usain Bolt?', 'NicolasB23', '2017-03-12', '23:43:27'),
(48, 'Ciencias sociales', '¿Como afectara la presidencia de Donald Trump en la politica estadounidense?', 'deastroke', '2017-03-12', '23:44:13'),
(49, 'Mascotas', '¿Cual raza de perro es mas protectora con los niños?', 'Marianela123', '2017-03-12', '23:45:14'),
(50, 'Automoviles y Transporte', '¿Cual es  el precio de mercado del  Bugatti-Byron?', 'deastroke', '2017-03-12', '23:45:21'),
(51, 'Mascotas', '¿En que lugar puedo esterilizar a mi cachorro en Quito?', 'Marianela123', '2017-03-12', '23:45:41'),
(52, 'Educacion y formacion', '¿El mejor colegio pensionado de Quito?', 'jazminR', '2017-03-12', '23:48:26'),
(53, 'Comer y beber', '¿Donde comer buen encebollado en Quito?', 'Goofy', '2017-03-12', '23:49:28'),
(54, 'Ciencias sociales', '¿Análisis y resumen del Tratado Comunista de Carl Marx?', 'jazminR', '2017-03-12', '23:50:03'),
(55, 'Arte y Humanidades', '¿Donde Conseguir esfuminos y grafito en Quito?', 'Goofy', '2017-03-12', '23:50:39'),
(56, 'Ciencias y matematicas', '¿Sirve el Teorema de Green para resolver integrales triples o solo para las dobles?', 'ErickV', '2017-03-12', '23:53:51'),
(57, 'Juegos y recreacion', '¿Cual es el ultimo nivel de Candy Crush?', 'ErickV', '2017-03-12', '23:54:51'),
(58, 'Ciencias y matematicas', '¿Como integrar el sen^`4?', 'acertijo2', '2017-03-12', '23:55:08'),
(59, 'Musica y entretenimiento', '¿Como se llama la cancion que suna turutu tun turu lululio?', 'acertijo2', '2017-03-12', '23:57:13'),
(60, 'Computadoras e internet', '¿Que celular es mejr el Xiaomi redmin note 3 o el huawei p9 lite?', 'robin', '2017-03-13', '00:00:00'),
(61, 'Política y gobierno', '¿Por quien voto por Correa o Lasso?', 'robin', '2017-03-13', '00:01:26'),
(64, 'Automoviles y Transporte', '¿Un Peugeot 206 o un Prius?', 'balvarado', '2017-03-13', '00:40:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE IF NOT EXISTS `respuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pregunta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nick` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `mejor` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pregunta` (`pregunta`),
  KEY `nick` (`nick`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=122 ;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `respuesta`, `pregunta`, `nick`, `fecha`, `hora`, `mejor`) VALUES
(1, 'Leonardo era un artista Italiano nacido en 1490', '¿Quien fue Da Vinci?', 'balvarado', '2017-02-18', '00:00:00', 0),
(2, 'Un día primaveral de 1504, un hijo pródigo florentino, Da Vinci, acudió a una importante reunión. La cita es con uno ... "Fue toda una conmoción para Miguel Ángel.', '¿Quien fue Da Vinci?', 'jnavarro', '2017-02-18', '00:43:27', 1),
(3, 'Leonardo da Vinci Artista florentino Nació el 15 de abril de 1452 en Vinci, ... "de Vinci": su nombre de nacimiento completo fue "Lionardo di ser Piero da Vinci".', '¿Quien fue Da Vinci?', 'esilva', '2017-02-18', '00:42:12', 0),
(4, 'Sin comer absolutamente nada, y haciendo 123412 abdominales diarias, saludos.', '¿Como tener abdominales en 1 semana?', 'amediavilla', '2017-02-18', '01:28:53', 0),
(5, 'Actividad en la que el hombre recrea, con una finalidad estÃ©tica, un aspecto de la realidad o un sentimiento en formas bellas valiÃ©ndose de la materia, la imagen o el sonido.', '¿Que es el arte?', 'esilva', '2017-02-18', '01:53:31', 0),
(6, 'Conjunto de obras que resultan de esta actividad, asÃ­ como las diferentes tendencias o estilos de las mismas.', '¿Que es el arte?', 'drivera', '2017-02-18', '01:55:00', 0),
(7, 'El Chelsea juega este dia Sabado', '¿Cuando juega el Chelsea?', 'drivera', '2017-02-18', '01:57:40', 0),
(10, 'Es algo bonito', '¿Que es el arte?', 'mbaracus', '2017-02-18', '03:40:56', 0),
(13, 'Jugo, es mas sano', '¿Jugo o Gaseosa?', 'mbaracus', '2017-02-18', '04:09:18', 0),
(14, 'PerdiÃ³ 4-0', '¿Cuanto quedo el Barcelona de Espana?', 'gcisneros', '2017-02-18', '04:54:32', 0),
(18, 'Mote mi bro', '¿Papas fritas o Mote?', 'gcisneros', '2017-02-18', '05:10:08', 0),
(19, 'RenÃ© Descartes, tambiÃ©n llamado Renatus Cartesius (en escritura latina) (La Haye en Touraine, Turena, 31 de marzo de 1596-Estocolmo, Suecia, 11 de febrero de 1650), fue un filÃ³sofo, matemÃ¡tico y fÃ­sico francÃ©s', '¿Quien es Descartes?', 'balvarado', '2017-02-18', '06:03:26', 1),
(20, 'Un filosofo', '¿Quien es Descartes?', 'drivera', '2017-02-18', '06:25:31', 0),
(21, 'Un filosofo', '¿Quien es Descartes?', 'drivera', '2017-02-18', '06:26:26', 0),
(22, 'Un filosofo', '¿Quien es Descartes?', 'drivera', '2017-02-18', '06:26:42', 0),
(23, 'Un filosofo', '¿Quien es Descartes?', 'drivera', '2017-02-18', '06:26:58', 0),
(24, 'En la brasil y Amazonas', '¿Donde vende hamburguesas con refill de papas o gaseosa?', 'balvarado', '2017-03-10', '11:55:08', 0),
(25, 'En el valle', '¿Donde vende hamburguesas con refill de papas o gaseosa?', 'dmolineros', '2017-03-10', '11:57:12', 0),
(26, 'Por Carcelen', '¿Donde vende hamburguesas con refill de papas o gaseosa?', 'drivera', '2017-03-10', '12:18:15', 0),
(27, 'una baile tipico', '¿Que es el ballet?', 'dmolineros', '2017-03-10', '19:26:37', 0),
(28, 'el corte de pelo a la moda es palermo', '¿Cual corte de pelo está a la moda?', 'balvarado', '2017-03-10', '20:38:30', 1),
(38, 'Da Vinci', '¿Quien pinto la Monalisa?', 'amediavilla', '2017-03-12', '22:38:19', 0),
(40, 'No es posible', '¿Como se hace el trinomio cuadrado perfecto?', 'amediavilla', '2017-03-12', '22:40:13', 0),
(41, 'jamas', '¿Como se hace el trinomio cuadrado perfecto?', 'amediavilla', '2017-03-12', '22:53:22', 0),
(42, 'Se Mueren :)', '¿Qué pasa si les cortan el bigote a los gatos?', 'balvarado', '2017-03-09', '23:40:53', 0),
(43, 'Se Ven feos', '¿Qué pasa si les cortan el bigote a los gatos?', 'amediavilla', '2017-03-10', '23:41:14', 1),
(44, 'Es imposible.', '¿Corregir Error de Windows Update para Windows 10?', 'gcisneros', '2017-03-12', '23:45:53', 0),
(45, 'Club!', '¿Pilsener o Club?', 'ErickV', '2017-03-13', '00:03:31', 0),
(46, 'Leonardo Da Vinci', '¿Quien pinto la Monalisa?', 'ErickV', '2017-03-13', '00:04:27', 0),
(47, 'en el restaurante top-ten ', '¿Donde vende hamburguesas con refill de papas o gaseosa?', 'elgeek', '2017-03-13', '00:05:04', 0),
(48, 'En Carcelen el restaurante Las Palmeras', '¿Donde comer buen encebollado en Quito?', 'ErickV', '2017-03-13', '00:11:06', 0),
(49, 'el teorema de green solo sirve para integrales dobles, si quieres resolver integrales tripel te recomiendo que revises el teorema de Stokes ', '¿Sirve el Teorema de Green para resolver integrales triples o solo para las dobles?', 'elgeek', '2017-03-13', '00:11:47', 0),
(50, 'En el Cyrano', '¿Donde venden buenas guaguas de pan?', 'ErickV', '2017-03-13', '00:13:22', 0),
(51, 'uno de las razas mas dociles se la considera al Golden retriver, tambien el labrador retriver y pastor aleman ', '¿Cual raza de perro es mas protectora con los niños?', 'elgeek', '2017-03-13', '00:13:55', 0),
(52, 'Top Ten en Quito', '¿Donde vende hamburguesas con refill de papas o gaseosa?', 'ErickV', '2017-03-13', '00:14:13', 0),
(53, '1.830.500€', '¿Cual es  el precio de mercado del  Bugatti-Byron?', 'ErickV', '2017-03-13', '00:15:45', 0),
(54, 'no sirven es inevitable la vejez', '¿Sirven las cremas antiarrugas?', 'elgeek', '2017-03-13', '00:16:47', 0),
(55, ':s Pon el link para ver cual es', '¿Como se llama la cancion que suna turutu tun turu lululio?', 'ErickV', '2017-03-13', '00:17:31', 0),
(56, 'Nada puede frenar el proceso de envejecimiento natural de la piel, las cremas solo te las humectan', '¿Sirven las cremas antiarrugas?', 'ErickV', '2017-03-13', '00:18:39', 0),
(57, 'en cualquier veterinario o suelen ofrecer campañas de esterilizacion en varios barrios de la ciudad', '¿En que lugar puedo esterilizar a mi cachorro en Quito?', 'elgeek', '2017-03-13', '00:19:10', 0),
(58, 'Edvard Munch, 1893', '¿Quien pintó El Grito?', 'elgeek', '2017-03-13', '00:21:15', 0),
(59, 'Teniendo confianza, respeto y paciencia', '¿Como se puede tener una relación con tu pareja fuerte?', 'jazminR', '2017-03-13', '00:21:15', 0),
(60, 'si el aceite de coco es un humectante natural y le devuelve el brillo al cabello seco o maltratado', '¿El aceite de coco es bueno para dar brillo al cabello?', 'jazminR', '2017-03-13', '00:21:56', 0),
(61, 'El teorma de green solo puedes utilizarlo para intgrales dobles', '¿Sirve el Teorema de Green para resolver integrales triples o solo para las dobles?', 'jazminR', '2017-03-13', '00:23:57', 0),
(62, 'dell, apple, asus, toshiba, lenovo', '¿Que marca de laptop es buena para comprar?', 'elgeek', '2017-03-13', '00:24:00', 0),
(63, 'Utilizando identidades trigonomtricas te ayuda mucho la del sen^2 y luego separas e integras el coseno', '¿Como integrar el sen^`4?', 'jazminR', '2017-03-13', '00:27:06', 0),
(64, 'depende del modelo del auto, pero en lo personal el diseño de auto lo realiza mejor audi', '¿Que es mejor un Porsche o un audi?', 'robin', '2017-03-13', '00:27:19', 0),
(65, 'En Juan Marcet', '¿Donde Conseguir esfuminos y grafito en Quito?', 'jazminR', '2017-03-13', '00:28:08', 0),
(66, 'Edvard Munch, 1893', '¿Quien pintó El Grito?', 'jazminR', '2017-03-13', '00:28:57', 0),
(67, 'Si son realmente útiles,  yo las probé y si funcionan', '¿Las mascarillas asiáticas para puntos negros funcionan?', 'jazminR', '2017-03-13', '00:30:04', 0),
(68, 'el Huawei P9 Lite a mi parecer tiene mejores caracteristicas. ', '¿Que celular es mejr el Xiaomi redmin note 3 o el huawei p9 lite?', 'jazminR', '2017-03-13', '00:31:34', 0),
(69, 'En el Salseron ', '¿Donde comer buen encebollado en Quito?', 'jazminR', '2017-03-13', '00:32:01', 0),
(70, 'Igual con cualquiera la crisis en el país ya esta presente y el único camino para librarla según la lógica del capitalismo es el neoliberalismo.', '¿Por quien voto por Correa o Lasso?', 'Marianela123', '2017-03-13', '00:34:23', 0),
(71, 'entre 13 y 15 años', '¿Cuantos años viven los perros?', 'robin', '2017-03-13', '00:34:48', 0),
(72, 'Posiblemente por las medidas Proteccionistas que tome el Estado se torne ultranacionalista.', '¿Como afectara la presidencia de Donald Trump en la politica estadounidense?', 'Marianela123', '2017-03-13', '00:35:28', 0),
(73, 'en super paco', '¿Donde Conseguir esfuminos y grafito en Quito?', 'Marianela123', '2017-03-13', '00:37:04', 0),
(74, 'Dell', '¿Que marca de laptop es buena para comprar?', 'Marianela123', '2017-03-13', '00:37:51', 0),
(75, 'Pilsener', '¿Pilsener o Club?', 'Marianela123', '2017-03-13', '00:38:51', 0),
(76, 'que clase de pregunta es esa', '¿Como se llama la cancion que suna turutu tun turu lululio?', 'goofy', '2017-03-13', '00:39:38', 0),
(77, 'aproximadamente un millon de euros', '¿Cual es  el precio de mercado del  Bugatti-Byron?', 'angelesc', '2017-03-13', '00:43:09', 0),
(78, 'En el Honey & Honey', '¿Donde venden buenas guaguas de pan?', 'angelesc', '2017-03-13', '00:44:16', 0),
(79, 'Nose', '¿Que bus me deja en Pintag?', 'angelesc', '2017-03-13', '00:44:37', 0),
(80, 'la Condamine', '¿El mejor colegio pensionado de Quito?', 'angelesc', '2017-03-13', '00:45:01', 0),
(81, 'Es complicado de Resumir, es mejor que lo leas por ti mismo. Saludos', '¿Análisis y resumen del Tratado Comunista de Carl Marx?', 'angelesc', '2017-03-13', '00:45:48', 0),
(82, 'Prius es mejor auto', '¿Un Peugeot 206 o un Prius?', 'deastroke', '2017-03-13', '00:46:18', 0),
(83, ' Xiaomi redmin note 3 es el mejor!', '¿Que celular es mejr el Xiaomi redmin note 3 o el huawei p9 lite?', 'angelesc', '2017-03-13', '00:46:29', 0),
(84, 'Solo para integrales dobles usa Stokes para las triples.', '¿Sirve el Teorema de Green para resolver integrales triples o solo para las dobles?', 'angelesc', '2017-03-13', '00:47:07', 0),
(85, 'Es mejor usar otro tipo de productos como botox.', '¿Sirven las cremas antiarrugas?', 'angelesc', '2017-03-13', '00:47:55', 0),
(86, 'revisa el servicio de windows porque depende de que actualizacinon sea y el tipo de error ', '¿Corregir Error de Windows Update para Windows 10?', 'deastroke', '2017-03-13', '00:48:36', 0),
(87, 'El récord olímpico  en 2012 fue establecido en 9,63 segundos', '¿Cual es el mayor récord de Usain Bolt?', 'angelesc', '2017-03-13', '00:49:19', 0),
(88, 'Audi', '¿Que es mejor un Porsche o un audi?', 'angelesc', '2017-03-13', '00:49:53', 0),
(89, 'creo que mejor es el aguacate', '¿El aceite de coco es bueno para dar brillo al cabello?', 'deastroke', '2017-03-13', '00:50:47', 0),
(90, '2012 9,35 segundos', '¿Cual es el mayor récord de Usain Bolt?', 'Marianela123', '2017-03-13', '00:51:02', 0),
(91, 'cualquier aceite es bueno, el de argan, coco, risino, almendra, etc.', '¿El aceite de coco es bueno para dar brillo al cabello?', 'Marianela123', '2017-03-13', '00:51:44', 0),
(92, 'en el terminal puedespreguntar o fijarte en los letreros que hay en los buses, suerte.', '¿Que bus me deja en Pintag?', 'deastroke', '2017-03-13', '00:52:28', 0),
(93, 'Respeto.', '¿Como se puede tener una relación con tu pareja fuerte?', 'Marianela123', '2017-03-13', '00:52:31', 0),
(94, ' Leonardo Da Vinci', '¿Quien pinto la Monalisa?', 'Marianela123', '2017-03-13', '00:53:16', 0),
(95, 'wtf?', '¿Como se llama la cancion que suna turutu tun turu lululio?', 'Marianela123', '2017-03-13', '00:54:36', 0),
(96, 'en el extremo noroeste de Europa, cuyo territorio abarca la isla homónima y algunas pequeñas islas e islotes adyacentes en el océano Atlántico, entre el resto de Europa y Groenlandia', '¿Donde está localizado Islandia?', 'deastroke', '2017-03-13', '00:54:50', 0),
(97, 'cualquiera igual te enborracha', '¿Pilsener o Club?', 'robin', '2017-03-13', '00:59:22', 0),
(98, 'Cerrara todos los mercados internacionales para proteger su economía, sin embargo esta medida traera grandes perdida en la economia mundial.', '¿Como afectara la presidencia de Donald Trump en la politica estadounidense?', 'NicolasB23', '2017-03-13', '00:59:37', 0),
(99, 'Los Ilinizas', '¿El mejor colegio pensionado de Quito?', 'NicolasB23', '2017-03-13', '01:00:01', 0),
(100, 'Conchas y Cazuelas, sector parque Bicentenario.', '¿Donde comer buen encebollado en Quito?', 'NicolasB23', '2017-03-13', '01:00:33', 0),
(101, 'no se, bueno si se pero no te vua decir ', '¿Cual es el ultimo nivel de Candy Crush?', 'robin', '2017-03-13', '01:02:01', 0),
(102, 'divide el termino que acompaña a la x para dos y luego elevalo al cuadrado, ese termino lo sumas y lo retas y listo esta completado el trinomio, no olvides sumar y restar para no alterar la ecuacion.', '¿Como completar el trinomio cuadrado perfecto ?', 'NicolasB23', '2017-03-13', '01:02:32', 0),
(103, 'en el noroeste de Europa', '¿Donde está localizado Islandia?', 'NicolasB23', '2017-03-13', '01:03:26', 0),
(104, 'en un motel', '¿Como se puede tener una relación con tu pareja fuerte?', 'robin', '2017-03-13', '01:03:52', 0),
(105, '1.8 millones de euros', '¿Cual es  el precio de mercado del  Bugatti-Byron?', 'NicolasB23', '2017-03-13', '01:05:31', 0),
(106, 'No, solo para integrales dobles.', '¿Sirve el Teorema de Green para resolver integrales triples o solo para las dobles?', 'NicolasB23', '2017-03-13', '01:06:45', 0),
(107, 'En cualquier papeleria', '¿Donde Conseguir esfuminos y grafito en Quito?', 'NicolasB23', '2017-03-13', '01:07:46', 0),
(108, 'Leonardo Da Vinci', '¿Quien pinto la Monalisa?', 'NicolasB23', '2017-03-13', '01:08:19', 0),
(109, 'Edvard Munch', '¿Quien pintó El Grito?', 'NicolasB23', '2017-03-13', '01:09:02', 0),
(110, 'el gran sport esta a 1.830.500 y el normar aproximadamente 1 millon', '¿Cual es  el precio de mercado del  Bugatti-Byron?', 'robin', '2017-03-13', '01:09:41', 0),
(111, 'el manifiesto comuista es muy extenso, pero en si habla sobre el modelo economico que se a presentado en los ultimos años ', '¿Análisis y resumen del Tratado Comunista de Carl Marx?', 'robin', '2017-03-13', '01:12:05', 0),
(112, 'Con identidades trigonometricas se te simplifica la resolucion de la integral.', '¿Como integrar el sen^`4?', 'NicolasB23', '2017-03-13', '01:12:49', 0),
(113, 'por lo menos pon la letra ', '¿Como se llama la cancion que suna turutu tun turu lululio?', 'robin', '2017-03-13', '01:12:53', 0),
(114, 'Club', '¿Pilsener o Club?', 'NicolasB23', '2017-03-13', '01:13:53', 0),
(115, 'trata con remplazar el seno con el cos2x=sen^2 x -1 /2', '¿Como integrar el sen^`4?', 'robin', '2017-03-13', '01:15:16', 0),
(116, 'En las veterinarias particulares o incluso municipales, incluso puedes esperar las campañas de esterilizacion que ofrece el municipio cada cierto tiempo.', '¿En que lugar puedo esterilizar a mi cachorro en Quito?', 'NicolasB23', '2017-03-13', '01:15:20', 0),
(117, 'Golden o Pastor Aleman', '¿Cual raza de perro es mas protectora con los niños?', 'NicolasB23', '2017-03-13', '01:15:48', 0),
(118, 'en los ceviches de la rumiñahui', '¿Donde comer buen encebollado en Quito?', 'robin', '2017-03-13', '01:16:41', 0),
(119, 'depende que busques en un celular, el redmin tiene una buena bateria y el p9 tiene una mejor camara pero en si casi tiene las mismas caracteristicas', '¿Que celular es mejr el Xiaomi redmin note 3 o el huawei p9 lite?', 'acertijo2', '2017-03-13', '01:18:53', 0),
(120, 'depende de la raza, pero maximo 15 años', '¿Cuantos años viven los perros?', 'ErickV', '2017-03-13', '01:18:59', 0),
(121, '9,63 segundos', '¿Cual es el mayor récord de Usain Bolt?', 'ErickV', '2017-03-13', '01:19:31', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nick` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fechanacimiento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `puntaje` int(11) unsigned NOT NULL,
  PRIMARY KEY (`nick`),
  UNIQUE KEY `nick` (`nick`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nick`, `password`, `nombres`, `apellidos`, `correo`, `fechanacimiento`, `sexo`, `foto`, `puntaje`) VALUES
('acertijo2', '1234', 'William', 'Cabral', 'willCabral@hotmail.com', '2006-03-25', 'Masculino', 'acertijo2.jpg', 2),
('amediavilla', '1234', 'Andres', 'Mediavilla', 'amediavilla@hotmail.com', '1993-08-21', 'Masculino', 'amediavilla.jpg', 7),
('AngelesC', '1234', 'Anegeles', 'Conteron', 'angelesC@hotmail.com', '2017-01-11', 'Femenino', 'AngelesC.jpg', 24),
('balvarado', '1234', 'Bryan', 'Alvarado', 'bryan@atiko7.com', '1996-03-01', 'Masculino', 'balvarado.jpg', 11),
('deastroke', '1234', 'Juan', 'Morales', 'juaanMo@gmail.com', '2008-03-06', 'Masculino', 'deastroke.jpg', 12),
('dillanez', '1234', 'David', 'Illanez', 'dillanez@hotmail.com', '1998-03-01', 'Masculino', 'dillanez.jpg', 10),
('dmolineros', '1234', 'David', 'Molineros', 'dmolineros@hotmail.com', '1995-06-03', 'Masculino', 'dmolineros.jpg', 19),
('drivera', '1234', 'David Andres', 'Rivera Jarrin', 'drivera@hotmail.com', '1994-10-03', 'Masculino', 'drivera.jpg', 22),
('elgeek', '1234', 'Fernando', 'Lucema', 'fercholucce@outlook.com', '2009-09-15', 'Masculino', 'elgeek.jpg', 20),
('ErickV', '1234', 'Erick', 'Velez', 'ErickV@gmail.com', '2017-02-02', 'Masculino', 'ErickV.jpg', 25),
('esilva', '1234', 'Eduardo', 'Silva Saltos', 'esilva@hotmail.com', '1993-04-12', 'Masculino', 'esilva.jpg', 10),
('gcisneros', '1234', 'Gianfranco', 'Cisneros', 'gcisneros@hotmail.com', '1994-12-28', 'Masculino', 'gcisneros.jpg', 31),
('goofy', '1234', 'Ramiro', 'Palcios', 'ramaP10@hotmail.com', '2010-03-30', 'Masculino', 'goofy.jpg', 2),
('iherreria', '1234', 'Ignasio', 'Herreria', 'iherreria@hotmail.com', '1997-10-06', 'Masculino', 'iherreria.jpg', 10),
('JazminR', '1234', 'Jazmin ', 'Romero', 'jazromero@hotmail.com', '2017-01-11', 'Femenino', 'JazminR.jpg', 24),
('jnavarro', '1234', 'Jimmy', 'Navarro', 'jnavarro@hotmail.com', '1994-12-13', 'Masculino', 'jnavarro.jpg', 0),
('Marianela123', '1234', 'Marianela', 'Rinaldi', 'marianelar@gmail.com', '2007-01-08', 'Femenino', 'Marianela123.jpg', 22),
('mpineida', '1234', 'Mario', 'Pineida', 'mario@hotmail.com', '1997-03-03', 'Masculino', 'mpineida.jpg', 10),
('NicolasB23', '1234', 'Nicolas', 'Barrera', 'Nicolas23@gmail.com', '2017-02-02', 'Femenino', 'NicolasB23.jpg', 29),
('pepeperez', '1234', 'Pepe', 'Perez', 'pepeperez@hotmail.com', '1950-12-12', 'Masculino', 'pepeperez.jpg', 10),
('ppregunton', '1234', 'Pepe', 'Pregunton', 'ppregunton@hotmail.com', '1994-06-04', 'Masculino', 'ppregunton.jpg', 40),
('rcardenas', '1234', 'Romario', 'Cardenas', 'romario@hotmail.com', '2007-03-05', 'Masculino', 'rcardenas.jpg', 10),
('Robin', '1234', 'Marcelo', 'Cabrera', 'marcecabre@gmail.com', '2008-12-29', 'Masculino', 'Robin.jpg', 23);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
