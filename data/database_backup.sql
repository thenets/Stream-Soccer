-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 15-Jun-2016 às 08:37
-- Versão do servidor: 5.5.49-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `unifei_soccer`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arbitros`
--

CREATE TABLE IF NOT EXISTS `arbitros` (
  `id_arbitro` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `tipo` enum('principal','auxiliar') DEFAULT NULL,
  PRIMARY KEY (`id_arbitro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `arbitros`
--

INSERT INTO `arbitros` (`id_arbitro`, `nome`, `tipo`) VALUES
(1, 'Kratos', 'principal'),
(2, 'Zeus', 'auxiliar'),
(3, 'Chronos', 'auxiliar'),
(4, 'Thor', 'auxiliar'),
(5, 'Afrodite', 'auxiliar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `campeonatos`
--

CREATE TABLE IF NOT EXISTS `campeonatos` (
  `id_campeonato` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `campeao` int(11) DEFAULT NULL,
  `vice` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_campeonato`),
  KEY `fk_campeonatos_equipes1_idx` (`campeao`),
  KEY `fk_campeonatos_equipes2_idx` (`vice`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `campeonatos`
--

INSERT INTO `campeonatos` (`id_campeonato`, `nome`, `campeao`, `vice`) VALUES
(1, 'Mundial', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipes`
--

CREATE TABLE IF NOT EXISTS `equipes` (
  `id_equipe` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `titulos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_equipe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `equipes`
--

INSERT INTO `equipes` (`id_equipe`, `nome`, `titulos`) VALUES
(0, 'N/D', 0),
(1, 'São Paulo', 5),
(2, 'Barcelona', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogadores`
--

CREATE TABLE IF NOT EXISTS `jogadores` (
  `id_jogador` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipe` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `posicao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_jogador`,`id_equipe`),
  KEY `fk_jogador_equipe_idx` (`id_equipe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Extraindo dados da tabela `jogadores`
--

INSERT INTO `jogadores` (`id_jogador`, `id_equipe`, `nome`, `posicao`) VALUES
(1, 2, 'Lionel Messi', 'Atacante'),
(2, 2, 'Neymar', 'Atacante'),
(3, 2, 'Luis Alberto Suarez', 'Atacante'),
(4, 2, 'Arda Turan', 'Meia'),
(5, 2, 'Gerard Pique', 'Zagueiro'),
(6, 2, 'Andres Iniesta', 'Meia'),
(7, 2, 'Javier Mascherano', 'Zagueiro'),
(8, 2, 'Denis Suarez', 'Meia'),
(9, 2, 'Claudio Bravo', 'Goleiro'),
(10, 2, 'Ivan Rakitic', 'Meia'),
(11, 2, 'Jordi Alba', 'Zagueiro'),
(12, 1, 'Paulo Henrique Ganso', 'Meia'),
(13, 2, 'Aleix Vidal', 'Zagueiro'),
(14, 1, 'Jonathan Calleri', 'Atacante'),
(15, 1, 'Maico Pereira Roque', 'Zagueiro'),
(16, 1, 'Diego Lugano', 'Zagueiro'),
(17, 1, 'Kelvin Mateus de Oliveira', 'Atacante'),
(18, 2, 'Sergio Busquets', 'Meia'),
(19, 1, 'Denis César de Matos', 'Goleiro'),
(20, 2, 'Sandro Ramirez', 'Atacante'),
(21, 1, 'Michel Bastos', 'Meia'),
(22, 2, 'Sergi Roberto', 'Meia'),
(23, 1, 'Ricardo Centurión', 'Meia'),
(24, 1, 'Hudson', 'Meia'),
(25, 2, 'Gerard Gumbau', 'Meia'),
(26, 1, 'Alan Kardec', 'Atacante'),
(27, 1, 'Eugenio Mena', 'Zagueiro'),
(28, 1, 'Rodrigo Caio', 'Zagueiro'),
(29, 1, 'Ytalo José dos Santos', 'Atacante'),
(30, 1, 'Breno Vinínius Rodrigues Borges', 'Zagueiro'),
(31, 1, 'Lucas Cavalcante Silva', 'Zagueiro'),
(32, 1, 'José Rogério de Oliveira Melo', 'Atacante'),
(33, 1, 'Lyanco', 'Zagueiro'),
(34, 1, 'Renan Ribeiro', 'Goleiro'),
(35, 1, 'Wesley Lopes Beltrame', 'Meia'),
(36, 1, 'João Schmidt', 'Meia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE IF NOT EXISTS `jogos` (
  `id_jogo` int(11) NOT NULL AUTO_INCREMENT,
  `id_campeonato` int(11) NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fim` time DEFAULT NULL,
  `data` date DEFAULT NULL,
  `finalizado` tinyint(1) DEFAULT NULL,
  `campo_nome` varchar(255) NOT NULL,
  `campo_dimensao` varchar(255) NOT NULL,
  `equipe_1` int(11) NOT NULL,
  `equipe_2` int(11) NOT NULL,
  PRIMARY KEY (`id_jogo`,`equipe_1`,`equipe_2`),
  KEY `fk_jogos_campeonatos1_idx` (`id_campeonato`),
  KEY `fk_jogos_equipes1_idx` (`equipe_1`),
  KEY `fk_jogos_equipes2_idx` (`equipe_2`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`id_jogo`, `id_campeonato`, `hora_inicio`, `hora_fim`, `data`, `finalizado`, `campo_nome`, `campo_dimensao`, `equipe_1`, `equipe_2`) VALUES
(1, 1, NULL, NULL, NULL, 0, 'Mineirão', '90x120', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sumulas`
--

CREATE TABLE IF NOT EXISTS `sumulas` (
  `id_sumula` int(11) NOT NULL,
  `id_jogo` int(11) NOT NULL AUTO_INCREMENT,
  `log` text,
  `id_equipe1` int(11) NOT NULL,
  `id_equipe2` int(11) NOT NULL,
  `id_arbitro` int(11) NOT NULL,
  PRIMARY KEY (`id_sumula`,`id_jogo`,`id_equipe1`,`id_equipe2`,`id_arbitro`),
  KEY `fk_sumula_jogo1_idx` (`id_jogo`),
  KEY `fk_sumula_equipe1_idx` (`id_equipe1`),
  KEY `fk_sumula_equipe2_idx` (`id_equipe2`),
  KEY `fk_sumula_arbitro1_idx` (`id_arbitro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sumulasView`
--

CREATE TABLE IF NOT EXISTS `sumulasView` (
  `id_jogo` int(11) NOT NULL AUTO_INCREMENT,
  `id_sumula` int(11) NOT NULL,
  `log` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_jogo`,`id_sumula`),
  KEY `fk_sumula_jogo1_idx` (`id_jogo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `campeonatos`
--
ALTER TABLE `campeonatos`
  ADD CONSTRAINT `fk_campeonatos_equipes1` FOREIGN KEY (`campeao`) REFERENCES `equipes` (`id_equipe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_campeonatos_equipes2` FOREIGN KEY (`vice`) REFERENCES `equipes` (`id_equipe`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `jogadores`
--
ALTER TABLE `jogadores`
  ADD CONSTRAINT `fk_jogador_equipe` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id_equipe`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `jogos`
--
ALTER TABLE `jogos`
  ADD CONSTRAINT `fk_jogos_equipes1` FOREIGN KEY (`equipe_1`) REFERENCES `equipes` (`id_equipe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jogos_equipes2` FOREIGN KEY (`equipe_2`) REFERENCES `equipes` (`id_equipe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jogos_campeonatos1` FOREIGN KEY (`id_campeonato`) REFERENCES `campeonatos` (`id_campeonato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sumulas`
--
ALTER TABLE `sumulas`
  ADD CONSTRAINT `fk_sumula_arbitro1` FOREIGN KEY (`id_arbitro`) REFERENCES `arbitros` (`id_arbitro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sumula_equipe1` FOREIGN KEY (`id_equipe1`) REFERENCES `equipes` (`id_equipe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sumula_equipe2` FOREIGN KEY (`id_equipe2`) REFERENCES `equipes` (`id_equipe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sumula_jogo1` FOREIGN KEY (`id_jogo`) REFERENCES `jogos` (`id_jogo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sumulasView`
--
ALTER TABLE `sumulasView`
  ADD CONSTRAINT `fk_sumula_jogo10` FOREIGN KEY (`id_jogo`) REFERENCES `jogos` (`id_jogo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
