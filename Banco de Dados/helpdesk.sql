-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `helpdesk`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamado`
--

CREATE TABLE IF NOT EXISTS `chamado` (
  `codigo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `data_inicial` date NOT NULL,
  `data_final` date NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `comentarioChamado` text COLLATE utf8_unicode_ci NOT NULL,
  `solicitante` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tecnico` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `solucao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipoChamado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `data_inicial` (`data_inicial`,`data_final`,`solicitante`,`tecnico`,`status`,`solucao`,`tipoChamado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `chamado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solucao`
--

CREATE TABLE IF NOT EXISTS `solucao` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `data` (`data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_chamado`
--

CREATE TABLE IF NOT EXISTS `tipo_chamado` (
  `codigo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `descricao` (`descricao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `matricula` int(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `nome_usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha_usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo`, `nome`, `email`, `matricula`, `data_nascimento`, `nome_usuario`, `senha_usuario`) VALUES
(2, 'lui111zff.mat33os@gmail.com', 'luizff.matos@gmail.com', 45355433, '1212-12-12', '123456', '1212121212'),
(5, '1111111111', '1111111@11.com', 2147483647, '0123-01-01', '134434', '2311231231'),
(6, 'Luiz11', '11111@lskjd.c9ojn', 23230923, '0000-00-00', '029302390', '1092303923'),
(7, '11111111111', '11111@sddsd.com', 2938923, '0000-00-00', '20932093', '092309230932'),
(8, '11111', '111111@sdds.com', 23232323, '0000-00-00', '232323', '323232323'),
(9, '121212', '121221@2323.com', 82738237, '0000-00-00', '82738237832', '872873897398131231'),
(10, '111111111', '111111111@sdsd.com', 2930293, '0120-12-21', '2300023032', '0320230203'),
(11, 'teste123', 'teste@mail.com', 100131192, '1993-10-12', 'vanessa', 'hunhun');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
