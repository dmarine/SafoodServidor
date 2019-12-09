-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.6-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para safood
CREATE DATABASE IF NOT EXISTS `safood` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `safood`;

-- Volcando estructura para tabla safood.alergenos
CREATE TABLE IF NOT EXISTS `alergenos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla safood.alergenos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `alergenos` DISABLE KEYS */;
/*!40000 ALTER TABLE `alergenos` ENABLE KEYS */;

-- Volcando estructura para tabla safood.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla safood.categorias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla safood.comidas
CREATE TABLE IF NOT EXISTS `comidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `idCategoria` int(11) NOT NULL DEFAULT 0,
  `imagen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comidas_categorias` (`idCategoria`),
  CONSTRAINT `FK_comidas_categorias` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla safood.comidas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `comidas` DISABLE KEYS */;
/*!40000 ALTER TABLE `comidas` ENABLE KEYS */;

-- Volcando estructura para tabla safood.comidas_alergenos
CREATE TABLE IF NOT EXISTS `comidas_alergenos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idComida` int(11) NOT NULL,
  `idAlergeno` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__comida` (`idComida`),
  KEY `FK__alergeno` (`idAlergeno`),
  CONSTRAINT `FK__alergeno` FOREIGN KEY (`idAlergeno`) REFERENCES `alergenos` (`id`),
  CONSTRAINT `FK__comida` FOREIGN KEY (`idComida`) REFERENCES `comidas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla safood.comidas_alergenos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `comidas_alergenos` DISABLE KEYS */;
/*!40000 ALTER TABLE `comidas_alergenos` ENABLE KEYS */;

-- Volcando estructura para tabla safood.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idComida` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla safood.pedidos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Volcando estructura para tabla safood.restaurantes
CREATE TABLE IF NOT EXISTS `restaurantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla safood.restaurantes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `restaurantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `restaurantes` ENABLE KEYS */;

-- Volcando estructura para tabla safood.restaurantes_comidas
CREATE TABLE IF NOT EXISTS `restaurantes_comidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRestaurante` int(11) NOT NULL,
  `idComida` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__restaurantes` (`idRestaurante`),
  KEY `FK__comidas` (`idComida`),
  CONSTRAINT `FK__comidas` FOREIGN KEY (`idComida`) REFERENCES `comidas` (`id`),
  CONSTRAINT `FK__restaurantes` FOREIGN KEY (`idRestaurante`) REFERENCES `restaurantes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla safood.restaurantes_comidas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `restaurantes_comidas` DISABLE KEYS */;
/*!40000 ALTER TABLE `restaurantes_comidas` ENABLE KEYS */;

-- Volcando estructura para tabla safood.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla safood.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla safood.usuarios_alergenos
CREATE TABLE IF NOT EXISTS `usuarios_alergenos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idAlergeno` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__usuarios` (`idUsuario`),
  KEY `FK__alergenos` (`idAlergeno`),
  CONSTRAINT `FK__alergenos` FOREIGN KEY (`idAlergeno`) REFERENCES `alergenos` (`id`),
  CONSTRAINT `FK__usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla safood.usuarios_alergenos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios_alergenos` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios_alergenos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
