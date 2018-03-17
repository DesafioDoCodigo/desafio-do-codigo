-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 13-Fev-2018 às 12:39
-- Versão do servidor: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `desafio_codigo`
--

CREATE DATABASE IF NOT EXISTS `desafio_codigo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `desafio_codigo`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `Debug` text NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bug`
--

CREATE TABLE `bug` (
  `id` int(11) NOT NULL,
  `id_report` int(11) NOT NULL,
  `onde` text NOT NULL,
  `oque` text NOT NULL,
  `ip` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cron_mail_list`
--

CREATE TABLE `cron_mail_list` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `emailid` int(3) NOT NULL,
  `vars` varchar(512) COLLATE utf8_unicode_ci NOT NULL COMMENT 'json',
  `date_created` datetime NOT NULL,
  `date_sended` datetime DEFAULT NULL,
  `sended` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `khantoken`
--

CREATE TABLE `khantoken` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `oauthToken` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `oauthTokenSecret` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_verifier` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `limitador_pontos`
--

CREATE TABLE `limitador_pontos` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `missao` varchar(3) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ref',
  `tentativas` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mail_template`
--

CREATE TABLE `mail_template` (
  `id` int(3) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filename` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'subject mail'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `missoes`
--

CREATE TABLE `missoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(256) NOT NULL,
  `ref` varchar(4) NOT NULL,
  `color` varchar(64) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas`
--

CREATE TABLE `paginas` (
  `id` int(11) NOT NULL,
  `nome` text COLLATE utf8_unicode_ci NOT NULL,
  `cod` text COLLATE utf8_unicode_ci NOT NULL,
  `icone` text COLLATE utf8_unicode_ci NOT NULL,
  `ref` text COLLATE utf8_unicode_ci NOT NULL,
  `tipo` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recovery`
--

CREATE TABLE `recovery` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `expires` date NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(128) NOT NULL,
  `nome` varchar(256) NOT NULL,
  `sexo` char(1) CHARACTER SET swe7 NOT NULL,
  `senha` varchar(255) NOT NULL COMMENT 'PASSWORD_BCRYPT',
  `email` varchar(128) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `autoriza` varchar(16) NOT NULL,
  `serie` varchar(128) NOT NULL,
  `cidade` varchar(128) NOT NULL,
  `escola` varchar(128) NOT NULL,
  `nasc` varchar(32) NOT NULL,
  `telefone` varchar(24) NOT NULL,
  `apelido` varchar(64) NOT NULL,
  `tipo` varchar(16) NOT NULL,
  `total` int(11) NOT NULL,
  `tutor` text NOT NULL,
  `DataAdd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL,
  `m_last` int(11) NOT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=true;0=false'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_mission`
--

CREATE TABLE `user_mission` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `missao` int(4) NOT NULL,
  `pontos` int(4) NOT NULL DEFAULT '0',
  `when` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `visualizacao`
--

CREATE TABLE `visualizacao` (
  `id` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vs_database_diagrams`
--

CREATE TABLE `vs_database_diagrams` (
  `name` char(80) DEFAULT NULL,
  `diadata` text,
  `comment` varchar(1022) DEFAULT NULL,
  `preview` text,
  `lockinfo` char(80) DEFAULT NULL,
  `locktime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `version` char(80) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `limitador_pontos`
--
ALTER TABLE `limitador_pontos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_template`
--
ALTER TABLE `mail_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missoes`
--
ALTER TABLE `missoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref` (`ref`);

--
-- Indexes for table `paginas`
--
ALTER TABLE `paginas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recovery`
--
ALTER TABLE `recovery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`login`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `user_mission`
--
ALTER TABLE `user_mission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `missao` (`missao`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `visualizacao`
--
ALTER TABLE `visualizacao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `limitador_pontos`
--
ALTER TABLE `limitador_pontos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mail_template`
--
ALTER TABLE `mail_template`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paginas`
--
ALTER TABLE `paginas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recovery`
--
ALTER TABLE `recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_mission`
--
ALTER TABLE `user_mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `visualizacao`
--
ALTER TABLE `visualizacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;