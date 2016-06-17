-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 17-Jun-2016 às 09:49
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `campeonatos`
--

INSERT INTO `campeonatos` (`id_campeonato`, `nome`, `campeao`, `vice`) VALUES
(1, 'Mundial', 0, 0),
(2, 'Brasileirão 2016', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipes`
--

CREATE TABLE IF NOT EXISTS `equipes` (
  `id_equipe` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `titulos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_equipe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `equipes`
--

INSERT INTO `equipes` (`id_equipe`, `nome`, `titulos`) VALUES
(0, 'N/D', 0),
(1, 'São Paulo', 5),
(2, 'Barcelona', 10),
(3, 'Internacional', NULL),
(4, 'Chapecoense', NULL),
(5, 'Sport', NULL),
(6, 'Santos', NULL),
(7, 'Atlético Paranaense', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=148 ;

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
(36, 1, 'João Schmidt', 'Meia'),
(38, 3, 'Danilo Fernandes', 'Goleiro'),
(39, 3, 'Jacsson', 'Goleiro'),
(40, 3, 'Keiller', 'Goleiro'),
(41, 3, 'Muriel', 'Goleiro'),
(42, 3, 'Alan Costa', 'Lateral'),
(43, 3, 'Artur', 'Zagueiro'),
(44, 3, 'Eriks', 'Lateral'),
(45, 3, 'Ernando', 'Volante'),
(46, 3, 'Alex', 'Meia Atacante'),
(47, 3, 'Alisson Farias', 'Meia'),
(48, 3, 'Anderson', 'Volante'),
(49, 3, 'Andrigo', 'Meia'),
(50, 3, 'Aylon', 'Atacante'),
(51, 3, 'Bruno Baio', 'Atacante'),
(52, 3, 'Eduardo Sasha', 'Atacante'),
(53, 3, 'Gustavo Ramos', 'Atacante'),
(54, 3, 'Leandro Almeida', 'Zagueiro'),
(55, 3, 'Raphinha', 'Lateral'),
(56, 3, 'William', 'Volante'),
(57, 4, 'Danilo', 'Goleiro'),
(58, 4, 'Follmann', 'Goleiro'),
(59, 4, 'Marcelo Boek', 'Goleiro'),
(60, 4, 'Nivaldo', 'Goleiro'),
(61, 4, 'Alan Ruschel', 'Zagueiro'),
(62, 4, 'Caixinha', 'Lateral'),
(63, 4, 'Claudio Wink', 'Zagueiro'),
(64, 4, 'Damerson', 'Volante'),
(65, 4, 'Dener Assunção', 'Zagueiro'),
(66, 4, 'Felipe Machado', 'Lateral'),
(67, 4, 'Igor', 'Zagueiro'),
(68, 4, 'Marcelo', 'Volante'),
(69, 4, 'Andrei', 'Meia'),
(70, 4, 'Arthur Maia', 'Meia'),
(71, 4, 'Cleber Santana', 'Meia Atacante'),
(72, 4, 'Gil', 'Meia'),
(73, 4, 'Hyoran', 'Meia'),
(74, 4, 'Josimar', 'Meia Atacante'),
(75, 4, 'Ananias', 'Atacante'),
(76, 4, 'Bruno Rangel', 'Atacante'),
(77, 4, 'Kempes', 'Atacante'),
(78, 4, 'Lourency', 'Atacante'),
(79, 4, 'Perotti', 'Atacante'),
(80, 4, 'Silvinho', 'Atacante'),
(81, 5, 'Agenor', 'Goleiro'),
(82, 5, 'Lucas Ferreira', 'Goleiro'),
(83, 5, 'Luiz Carlos', 'Goleiro'),
(84, 5, 'Magrão', 'Goleiro'),
(85, 5, 'Adryelson', 'Zagueiro'),
(86, 5, 'Christiano', 'Zagueiro'),
(87, 5, 'Durval', 'Zagueiro'),
(88, 5, 'Evandro', 'Lateral'),
(89, 5, 'Henrique Mattos', 'Volante'),
(90, 5, 'Maicon', 'Zagueiro'),
(91, 5, 'Matheus Ferraz', 'Volante'),
(92, 5, 'Oswaldo', 'Lateral'),
(93, 5, 'Clayton', 'Meia'),
(94, 5, 'Diego Souza', 'Meia Atacante'),
(95, 5, 'Everton Felipe', 'Meia'),
(96, 5, 'Fabrício', 'Meia'),
(97, 5, 'Fabio', 'Meia'),
(98, 5, 'Gabriel Xavier', 'Meia Atacante'),
(99, 5, 'Luiz Antonio', 'Meia'),
(100, 5, 'Alison', 'Atacante'),
(101, 5, 'Edmilson', 'Atacante'),
(102, 5, 'Johnathan Goiano', 'Atacante'),
(103, 5, 'Lenis', 'Atacante'),
(104, 6, 'Gabriel Gasparotto', 'Goleiro'),
(105, 6, 'John Victor', 'Goleiro'),
(106, 6, 'João Paulo', 'Goleiro'),
(107, 6, 'Vanderlei', 'Goleiro'),
(108, 6, 'Caju', 'Zagueiro'),
(109, 6, 'Daniel Guedes', 'Zagueiro'),
(110, 6, 'David Braz', 'Zagueiro'),
(111, 6, 'Diogo Vitor', 'Zagueiro'),
(112, 6, 'Gustavo Henrique', 'Volante'),
(113, 6, 'Lucas Veríssimo', 'Lateral'),
(114, 6, 'Luiz Felipe', 'Volante'),
(115, 6, 'Paulo Ricardo', 'Lateral'),
(116, 6, 'Alison', 'Meia'),
(117, 6, 'Bruno Leonardo', 'Meia'),
(118, 6, 'Danilo', 'Meia'),
(119, 6, 'Diego Gomes', 'Meia Atacante'),
(120, 6, 'Elano', 'Meia'),
(121, 6, 'Fernando Medeiros', 'Meia Atacante'),
(122, 6, 'Gabriel', 'Atacante'),
(123, 6, 'Joel', 'Atacante'),
(124, 6, 'Máxi Rolon', 'Atacante'),
(125, 6, 'Ricardo Oliveira', 'Atacante'),
(126, 7, 'Lucas Macanhan', 'Goleiro'),
(127, 7, 'Rodolfo', 'Goleiro'),
(128, 7, 'Santos', 'Goleiro'),
(129, 7, 'Weverton', 'Goleiro'),
(130, 7, 'Bruno Pereirinha', 'Zagueiro'),
(131, 7, 'Cleberson', 'Zagueiro'),
(132, 7, 'Eduardo', 'Zagueiro'),
(133, 7, 'Jorge Felipe', 'Zagueiro'),
(134, 7, 'Léo', 'Lateral'),
(135, 7, 'Marcão', 'Lateral'),
(136, 7, 'Paulo André', 'Volante'),
(137, 7, 'Thiago Heleno', 'Volante'),
(138, 7, 'Barrientos', 'Meia'),
(139, 7, 'Bruno Mota', 'Meia'),
(140, 7, 'Deivid', 'Meia'),
(141, 7, 'Giovanny', 'Meia Atacante'),
(142, 7, 'Hernani', 'Meia'),
(143, 7, 'Jadson', 'Meia Atacante'),
(144, 7, 'Anderson Lopes', 'Atacante'),
(145, 7, 'André Lima', 'Atacante'),
(146, 7, 'Bruno Rodrigues', 'Atacante'),
(147, 7, 'Ewandro', 'Atacante');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`id_jogo`, `id_campeonato`, `hora_inicio`, `hora_fim`, `data`, `finalizado`, `campo_nome`, `campo_dimensao`, `equipe_1`, `equipe_2`) VALUES
(1, 1, NULL, NULL, NULL, 0, 'Mineirão', '90x120', 1, 2),
(5, 2, '18:30:00', '22:00:00', '2016-05-15', 1, 'Beira Rio', '115x125', 3, 4),
(6, 2, '16:00:00', '22:00:00', '2016-05-22', 1, 'Murumbi', '115x125', 1, 3),
(7, 2, '16:00:00', '22:00:00', '2016-05-26', 1, 'Beira Rio', '115x125', 3, 5),
(8, 2, '18:30:00', '22:30:00', '2016-05-29', 1, 'Vila Belmiro', '110x120', 6, 3),
(9, 2, '19:30:00', '23:30:00', '2016-06-01', 1, 'Beira Rio', '115x125', 3, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sumulas`
--

CREATE TABLE IF NOT EXISTS `sumulas` (
  `id_sumula` int(11) NOT NULL AUTO_INCREMENT,
  `id_jogo` int(11) NOT NULL,
  `log` text,
  `equipe_1` int(11) NOT NULL,
  `equipe_2` int(11) NOT NULL,
  `id_arbitro` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sumula`,`id_jogo`,`equipe_1`,`equipe_2`),
  UNIQUE KEY `id_jogo_UNIQUE` (`id_jogo`),
  KEY `fk_sumula_jogo1_idx` (`id_jogo`),
  KEY `fk_sumula_equipe1_idx` (`equipe_1`),
  KEY `fk_sumula_equipe2_idx` (`equipe_2`),
  KEY `fk_sumulas_arbitros1_idx` (`id_arbitro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `sumulas`
--

INSERT INTO `sumulas` (`id_sumula`, `id_jogo`, `log`, `equipe_1`, `equipe_2`, `id_arbitro`) VALUES
(1, 5, '{"escalacao":[],"eventos":[]}', 3, 4, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sumulas_view`
--

CREATE TABLE IF NOT EXISTS `sumulas_view` (
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
  ADD CONSTRAINT `fk_sumulas_arbitros1` FOREIGN KEY (`id_arbitro`) REFERENCES `arbitros` (`id_arbitro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sumula_equipe1` FOREIGN KEY (`equipe_1`) REFERENCES `equipes` (`id_equipe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sumula_equipe2` FOREIGN KEY (`equipe_2`) REFERENCES `equipes` (`id_equipe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sumula_jogo1` FOREIGN KEY (`id_jogo`) REFERENCES `jogos` (`id_jogo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sumulas_view`
--
ALTER TABLE `sumulas_view`
  ADD CONSTRAINT `fk_sumula_jogo10` FOREIGN KEY (`id_jogo`) REFERENCES `jogos` (`id_jogo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
