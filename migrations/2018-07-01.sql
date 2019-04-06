-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 26/12/2018 às 13:20
-- Versão do servidor: 5.7.21
-- Versão do PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `desafio_codigo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `desafio`
--

CREATE TABLE `desafio` (
  `id` int(11) NOT NULL,
  `id_trilha` int(11) NOT NULL,
  `ordem` int(11) NOT NULL,
  `titulo` varchar(64) NOT NULL,
  `conteudo` text,
  `ativo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `jornada`
--

CREATE TABLE `jornada` (
  `id` int(11) NOT NULL,
  `titulo` varchar(64) NOT NULL,
  `resumo` text,
  `descricao` text,
  `ativa` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `trilha`
--

CREATE TABLE `trilha` (
  `id` int(11) NOT NULL,
  `id_jornada` int(11) NOT NULL,
  `titulo` varchar(64) NOT NULL,
  `resumo` text,
  `descricao` text,
  `ativa` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(128) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `tipo` enum('admin','tutor','usuario','') NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data_ultimo_acesso` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `desafio`
--
ALTER TABLE `desafio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_desafio_trilha_idx` (`id_trilha`);

--
-- Índices de tabela `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `trilha`
--
ALTER TABLE `trilha`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `desafio`
--
ALTER TABLE `desafio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jornada`
--
ALTER TABLE `jornada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `trilha`
--
ALTER TABLE `trilha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `desafio`
--
ALTER TABLE `desafio`
  ADD CONSTRAINT `fk_desafio_trilha` FOREIGN KEY (`id_trilha`) REFERENCES `trilha` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
