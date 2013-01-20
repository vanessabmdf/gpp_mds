-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27-log
-- Versão do PHP: 5.4.6

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
-- Estrutura da tabela `solicitante`
--

CREATE TABLE IF NOT EXISTS `solicitante` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `matricula` int(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `nome_usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha_usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `solicitante`
--

INSERT INTO `solicitante` (`codigo`, `nome`, `email`, `matricula`, `data_nascimento`, `nome_usuario`, `senha_usuario`) VALUES
(2, 'lui111zff.mat33os@gmail.com', 'luizff.matos@gmail.com', 45355433, '1212-12-12', '123456', '1212121212'),
(5, '1111111111', '1111111@11.com', 2147483647, '0123-01-01', '134434', '2311231231'),
(6, 'Luiz11', '11111@lskjd.c9ojn', 23230923, '0000-00-00', '029302390', '1092303923'),
(7, '11111111111', '11111@sddsd.com', 2938923, '0000-00-00', '20932093', '092309230932'),
(8, '11111', '111111@sdds.com', 23232323, '0000-00-00', '232323', '323232323'),
(9, '121212', '121221@2323.com', 82738237, '0000-00-00', '82738237832', '872873897398131231'),
(10, '111111111', '111111111@sdsd.com', 2930293, '0120-12-21', '2300023032', '0320230203');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
