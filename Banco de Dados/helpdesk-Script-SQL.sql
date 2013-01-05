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
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(500) NOT NULL,
  `data_inicial` date NOT NULL,
  `data_final` date NOT NULL,
  `codigo_status` int(11) NOT NULL,
  `codigo_servico` int(11) NOT NULL,
  `codigo_tecnico` int(11) NOT NULL,
  `codigo_solicitante` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(500) NOT NULL,
  `data` date NOT NULL,
  `codigo_emissor` int(11) NOT NULL,
  `codigo_chamado` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitante`
--

CREATE TABLE IF NOT EXISTS `solicitante` (
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `matricula` int(11) NOT NULL,
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `data_nascimento` date NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solucao`
--

CREATE TABLE IF NOT EXISTS `solucao` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(500) NOT NULL,
  `data` date NOT NULL,
  `codigo_chamado` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(500) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `subtipo_servico`
--

CREATE TABLE IF NOT EXISTS `subtipo_servico` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(500) NOT NULL,
  `codigo_tipo_servico` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_servico`
--

CREATE TABLE IF NOT EXISTS `tipo_servico` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(500) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transicao_status`
--

CREATE TABLE IF NOT EXISTS `transicao_status` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_origem` int(11) NOT NULL,
  `codigo_destino` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `codigo_perfil` int(11) NOT NULL,
  `codigo_solicitante` int(11) NOT NULL,
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
