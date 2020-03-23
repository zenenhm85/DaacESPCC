-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2018 a las 06:39:17
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `daac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`nome`) VALUES
('InformÃ¡tica para GestÃ£o');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disciplinas`
--

CREATE TABLE `disciplinas` (
  `nome` varchar(50) NOT NULL,
  `ano` int(11) NOT NULL,
  `semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `disciplinas`
--

INSERT INTO `disciplinas` (`nome`, `ano`, `semestre`) VALUES
('Algebra Linear', 1, 1),
('Analise e GestÃ£o Financeira I', 3, 1),
('Analise e GestÃ£o Financeira II', 3, 1),
('AnÃ¡lise e GestÃ£o Financeira I', 2, 1),
('Arquitetura de Computadores', 3, 2),
('Calculo Financeiro', 2, 2),
('ComunicaÃ§Ã£o Empresarial', 4, 1),
('Contabilidade AnÃ¡litica I', 3, 1),
('Contabilidade AnÃ¡litica II', 3, 2),
('Contabilidade geral I', 2, 1),
('Contabilidade geral II', 2, 2),
('Desenho de Software', 4, 2),
('Desenho MultimÃ©dia', 4, 2),
('Desenvolvimento Organizacional', 3, 1),
('FÃ­sica I', 2, 1),
('FÃ­sica II', 2, 2),
('InteligÃªncia Artificial', 4, 2),
('IntroduÃ§Ã£o a Economia', 1, 1),
('IntroduÃ§Ã£o a ProgramaÃ§Ã£o', 2, 2),
('IntroduÃ§Ã£o Ã¡ GestÃ£o de Empresa', 1, 1),
('LÃ³gica MatemÃ¡tica', 2, 2),
('Linguagem de ProgramaÃ§Ã£o', 1, 2),
('Logica MatemÃ¡tica', 2, 1),
('Marketing e Publicidade', 4, 2),
('MatemÃ¡tica Discreta', 3, 2),
('MatemÃ£tica I', 1, 1),
('Metodologia de InvestigaÃ§Ã£o CientÃ­fica I', 3, 1),
('Metodologia de InvestigaÃ§Ã£o CientÃ­fica II', 4, 1),
('Monografia/Relatorio', 5, 1),
('ProgramaÃ§Ã£o I', 3, 1),
('ProgramaÃ§Ã£o III', 3, 1),
('ProgramaÃ§Ã£o IV', 4, 2),
('Rede II', 4, 2),
('Redes de Computadores', 2, 2),
('Redes II', 4, 2),
('seguranÃ§a InformÃ¡tica', 4, 1),
('Sistema AplicaÃ§Ã£o I', 1, 1),
('Sistema de GestÃ£o de Base de Dados', 2, 2),
('Sistema Operatvo', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudante`
--

CREATE TABLE `estudante` (
  `nome` varchar(50) NOT NULL,
  `bi` varchar(15) NOT NULL,
  `pai` varchar(50) NOT NULL,
  `mae` varchar(50) NOT NULL,
  `direcao` varchar(100) NOT NULL,
  `data` varchar(50) NOT NULL,
  `ano` int(11) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `nota` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) NOT NULL,
  `sexo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudante`
--

INSERT INTO `estudante` (`nome`, `bi`, `pai`, `mae`, `direcao`, `data`, `ano`, `curso`, `nota`, `email`, `telefone`, `sexo`) VALUES
('Jeremias JosÃ© JoÃ£o ', '002357697CC049', 'Manuel dos Santos', 'Eva Sebastiao', 'Menongue, Cuando Cubango', '1995-03-03', 2017, 'InformÃ¡tica para GestÃ£o', '', '', '929212878', 'homem'),
('Cassiane cassia', '0034517kn032', 'Elias Joao', 'Ana Daniel', 'Menongue, Cuando Cubango', '1995-06-02', 2018, 'InformÃ¡tica para GestÃ£o', '', 'cassi@gmail.com', '923455469', 'mulher'),
('Cassia cassiane', '004713057KN000', 'elias elizeu', 'ana isabel', 'Menongue, Cuando Cubango', '1998-06-12', 2018, 'InformÃ¡tica para GestÃ£o', '', 'cassi@gmail.com', '924223223', 'homem'),
('Manuel Joao', '004713057KN011', 'JosÃ© Manuel', 'Elisa JoÃ£o', 'Cuando Cubango', '1998-11-09', 2013, 'InformÃ¡tica para GestÃ£o', '', 'joamanuel@asa.cu', '222222222', 'mulher'),
('Acesaldino  Augusto Manuel', '004713057KN045', 'Jose Eduardo', 'Mae 1', 'Endereco 1', '1990-02-12', 2016, 'InformÃ¡tica para GestÃ£o', '', 'a@a.ao', '123456789', 'homem'),
('cccccccccccc', '004713057KN111', 'ccc', 'cc', 'ccc', '1985-11-13', 2013, 'InformÃ¡tica para GestÃ£o', '', 'cccc@aa.cu', '444444444', 'homem'),
('Admiro Fernandes Carlos', '00994517CC034', 'Jose Carlos', 'Sara dos santos', 'Menongue, Cuando Cubango', '1993-05-01', 2015, 'InformÃ¡tica para GestÃ£o', '', '', '922165269', 'homem'),
('AntÃ³nio Capita JoÃ£o', '104713057KN022', 'Pai 1', 'Mae 1', 'dsfsdfsdfsd', '1991-06-02', 2014, 'InformÃ¡tica para GestÃ£o', '', '', '924454592', 'homem'),
('Alberto Daniel JoÃ£o', '104713057KN044', 'ddd', 'dd', 'ddddd', '1986-11-25', 2014, 'InformÃ¡tica para GestÃ£o', '', 'albaaria@.hotmail.com', '923443223', 'homem');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `est_dis`
--

CREATE TABLE `est_dis` (
  `bi` varchar(15) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `class` decimal(11,0) NOT NULL,
  `ano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `est_dis`
--

INSERT INTO `est_dis` (`bi`, `nome`, `class`, `ano`) VALUES
('104713057KN022', 'Algebra Linear', '10', 2018),
('104713057KN022', 'Analise e GestÃ£o Financeira I', '10', 2018),
('104713057KN022', 'Analise e GestÃ£o Financeira II', '18', 2018),
('104713057KN022', 'AnÃ¡lise e GestÃ£o Financeira I', '9', 2018),
('104713057KN022', 'Arquitetura de Computadores', '14', 2018),
('104713057KN022', 'Calculo Financeiro', '17', 2018),
('104713057KN022', 'ComunicaÃ§Ã£o Empresarial', '11', 2018),
('104713057KN022', 'Contabilidade AnÃ¡litica I', '10', 2018),
('104713057KN022', 'Contabilidade AnÃ¡litica II', '12', 2018),
('104713057KN022', 'Contabilidade geral I', '11', 2018),
('104713057KN022', 'Contabilidade geral II', '12', 2018),
('104713057KN022', 'Desenho de Software', '10', 2018),
('104713057KN022', 'Desenho MultimÃ©dia', '14', 2018),
('104713057KN022', 'Desenvolvimento Organizacional', '12', 2018),
('104713057KN022', 'FÃ­sica I', '14', 2018),
('104713057KN022', 'FÃ­sica II', '13', 2018),
('104713057KN022', 'InteligÃªncia Artificial', '9', 2018),
('104713057KN022', 'IntroduÃ§Ã£o a Economia', '18', 2018),
('104713057KN022', 'IntroduÃ§Ã£o a ProgramaÃ§Ã£o', '16', 2018),
('104713057KN022', 'IntroduÃ§Ã£o Ã¡ GestÃ£o de Empresa', '14', 2018),
('104713057KN022', 'LÃ³gica MatemÃ¡tica', '15', 2018),
('104713057KN022', 'Linguagem de ProgramaÃ§Ã£o', '12', 2018),
('104713057KN022', 'Logica MatemÃ¡tica', '14', 2018),
('104713057KN022', 'Marketing e Publicidade', '14', 2018),
('104713057KN022', 'MatemÃ¡tica Discreta', '13', 2018),
('104713057KN022', 'MatemÃ£tica I', '15', 2018),
('104713057KN022', 'Metodologia de InvestigaÃ§Ã£o CientÃ­fica I', '11', 2018),
('104713057KN022', 'Metodologia de InvestigaÃ§Ã£o CientÃ­fica II', '13', 2018),
('104713057KN022', 'Monografia/Relatorio', '20', 2018),
('104713057KN022', 'ProgramaÃ§Ã£o I', '15', 2018),
('104713057KN022', 'ProgramaÃ§Ã£o III', '16', 2018),
('104713057KN022', 'ProgramaÃ§Ã£o IV', '12', 2018),
('104713057KN022', 'Rede II', '15', 2018),
('104713057KN022', 'Redes de Computadores', '10', 2018),
('104713057KN022', 'Redes II', '13', 2018),
('104713057KN022', 'seguranÃ§a InformÃ¡tica', '10', 2018),
('104713057KN022', 'Sistema AplicaÃ§Ã£o I', '12', 2018),
('104713057KN022', 'Sistema de GestÃ£o de Base de Dados', '18', 2018),
('104713057KN022', 'Sistema Operatvo', '17', 2018),
('104713057KN044', 'Algebra Linear', '20', 2018),
('104713057KN044', 'Analise e GestÃ£o Financeira I', '16', 2018),
('104713057KN044', 'Analise e GestÃ£o Financeira II', '15', 2018),
('104713057KN044', 'AnÃ¡lise e GestÃ£o Financeira I', '10', 2018),
('104713057KN044', 'Arquitetura de Computadores', '18', 2018),
('104713057KN044', 'Calculo Financeiro', '12', 2018),
('104713057KN044', 'ComunicaÃ§Ã£o Empresarial', '13', 2018),
('104713057KN044', 'Contabilidade AnÃ¡litica I', '9', 2018),
('104713057KN044', 'Contabilidade AnÃ¡litica II', '11', 2018),
('104713057KN044', 'Contabilidade geral I', '11', 2018),
('104713057KN044', 'Contabilidade geral II', '12', 2018),
('104713057KN044', 'Desenho de Software', '14', 2018),
('104713057KN044', 'Desenho MultimÃ©dia', '12', 2018),
('104713057KN044', 'Desenvolvimento Organizacional', '13', 2018),
('104713057KN044', 'FÃ­sica I', '11', 2018),
('104713057KN044', 'FÃ­sica II', '12', 2018),
('104713057KN044', 'InteligÃªncia Artificial', '13', 2018),
('104713057KN044', 'IntroduÃ§Ã£o a Economia', '13', 2018),
('104713057KN044', 'IntroduÃ§Ã£o a ProgramaÃ§Ã£o', '12', 2018),
('104713057KN044', 'IntroduÃ§Ã£o Ã¡ GestÃ£o de Empresa', '13', 2018),
('104713057KN044', 'LÃ³gica MatemÃ¡tica', '15', 2018),
('104713057KN044', 'Linguagem de ProgramaÃ§Ã£o', '12', 2018),
('104713057KN044', 'Logica MatemÃ¡tica', '15', 2018),
('104713057KN044', 'Marketing e Publicidade', '12', 2018),
('104713057KN044', 'MatemÃ¡tica Discreta', '13', 2018),
('104713057KN044', 'MatemÃ£tica I', '15', 2018),
('104713057KN044', 'Metodologia de InvestigaÃ§Ã£o CientÃ­fica I', '13', 2018),
('104713057KN044', 'Metodologia de InvestigaÃ§Ã£o CientÃ­fica II', '12', 2018),
('104713057KN044', 'Monografia/Relatorio', '18', 2018),
('104713057KN044', 'ProgramaÃ§Ã£o I', '11', 2018),
('104713057KN044', 'ProgramaÃ§Ã£o III', '12', 2018),
('104713057KN044', 'ProgramaÃ§Ã£o IV', '16', 2018),
('104713057KN044', 'Rede II', '13', 2018),
('104713057KN044', 'Redes de Computadores', '11', 2018),
('104713057KN044', 'Redes II', '16', 2018),
('104713057KN044', 'seguranÃ§a InformÃ¡tica', '13', 2018),
('104713057KN044', 'Sistema AplicaÃ§Ã£o I', '13', 2018),
('104713057KN044', 'Sistema de GestÃ£o de Base de Dados', '14', 2018),
('104713057KN044', 'Sistema Operatvo', '15', 2018);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `nome` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`nome`, `senha`, `tipo`) VALUES
('antonio', '123456', 'Técnico'),
('capita', '1234567', 'Administrador'),
('user2', 'valeria', 'TÃ©cnico'),
('user3', '123456', 'Administrador'),
('zenen', '123456', 'TÃ©cnico');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`nome`);

--
-- Indices de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`nome`);

--
-- Indices de la tabla `estudante`
--
ALTER TABLE `estudante`
  ADD PRIMARY KEY (`bi`);

--
-- Indices de la tabla `est_dis`
--
ALTER TABLE `est_dis`
  ADD PRIMARY KEY (`bi`,`nome`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
