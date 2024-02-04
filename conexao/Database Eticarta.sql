-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: mysql.twi.com.br:3306
-- Tempo de Geração: 06/10/2022 às 12:33:30
-- Versão do Servidor: 5.6.49-log
-- Versão do PHP: 7.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `pibemaprgovbr`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `et_admin`
--

CREATE TABLE IF NOT EXISTS `et_admin` (
  `cod_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nome_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `ir` int(11) DEFAULT NULL,
  `ge` int(11) DEFAULT NULL,
  `ms` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `et_dest`
--

CREATE TABLE IF NOT EXISTS `et_dest` (
  `cod_dest` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_pessoa` int(11) DEFAULT NULL,
  `tratativa` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome_dest` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cargo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rua` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `cep` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cod_dest`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
