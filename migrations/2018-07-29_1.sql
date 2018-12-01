-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 29-Jul-2018 às 19:14
-- Versão do servidor: 5.6.39
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `desafio_codigo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jornada`
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
-- Estrutura da tabela `trilha`
--

CREATE TABLE `trilha` (
  `id` int(11) NOT NULL,
  `id_jornada` int(11) NOT NULL,
  `titulo` varchar(64) NOT NULL,
  `resumo` text,
  `descricao` text,
  `ativa` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `trilha`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trilha`
--
ALTER TABLE `trilha`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jornada`
--
ALTER TABLE `jornada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `trilha`
--
ALTER TABLE `trilha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;
