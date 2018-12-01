-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 12/08/2018 às 14:09
-- Versão do servidor: 5.7.21
-- Versão do PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

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
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `desafio`
--
ALTER TABLE `desafio`
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
