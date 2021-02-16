-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 16-Fev-2021 às 23:24
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `systemunep`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avais`
--

CREATE TABLE `avais` (
  `id` int(255) NOT NULL,
  `user` varchar(255) CHARACTER SET utf8 NOT NULL,
  `data_inicio` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_fim` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(3) NOT NULL DEFAULT 0,
  `motivo` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avisos`
--

CREATE TABLE `avisos` (
  `id` int(255) NOT NULL,
  `usr_habbo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mensagem` varchar(10000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `avisos`
--

INSERT INTO `avisos` (`id`, `usr_habbo`, `mensagem`) VALUES
(1, 'theGuiihBR', '<p><u>Seja bem-vindo ao System da Organiza&ccedil;&atilde;o UNEP <span style=\"background-color: #ffffff; color: #4d5156; font-family: arial, sans-serif; font-size: 14px;\">&reg;</span></u></p><p><br></p><p>Lembrando que o System est&aacute; em desenvolvimento. Qualquer erro ou bug, reporte ao seu superior ou ao desenvolvedor.</p><p><br></p><p>- Equipe.</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>'),
(2, 'theGuiihBR', '<p style=\"text-align: center;\"><strong><u><span style=\"font-size: 48px;\">Banidos do DEPARTAMENTO DE POL&Iacute;CIA MILITAR &reg;</span></u></strong></p><p><br></p><p><br></p><p style=\"text-align: left;\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">________________________________________________________</span></p><p><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Nick: Greendayyyy / HelenaElegantxi</span></p><p><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Data: 25/11/2020</span></p><p><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Dura&ccedil;&atilde;o do banimento: Indeterminado</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"font-size: 14px;\">Motivo: -x-</span></span></p><p><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Aplicador: Comando de Opera&ccedil;&otilde;es Especiais</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"font-size: 14px;\">________________________________________________________</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Nick: drbbion</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Data: 19/11/2020</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Dura&ccedil;&atilde;o do banimento: Indeterminado</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"font-size: 14px;\">Motivo: -x-</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Aplicador: Presid&ecirc;ncia</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"font-size: 14px;\">________________________________________________________</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Nick: luiz97057</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Data: 21/11/2020</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Dura&ccedil;&atilde;o do banimento: Indeterminado</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"font-size: 14px;\">Motivo: -x-</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Aplicador: Comando de Opera&ccedil;&otilde;es Especiais&nbsp;</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"font-size: 14px;\">________________________________________________________</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Nick: Rainhamanu1317</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Data: 21/11/2020</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Dura&ccedil;&atilde;o do banimento: Indeterminado</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"font-size: 14px;\">Motivo: -x-</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Aplicador: Presid&ecirc;ncia&nbsp;</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"font-size: 14px;\">________________________________________________________</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Nick: S2CAMPOSS2</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Data: 21/11/2020</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Dura&ccedil;&atilde;o do banimento: Indeterminado</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"font-size: 14px;\">Motivo: -x-</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Aplicador: Presid&ecirc;ncia&nbsp;</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"font-size: 14px;\">________________________________________________________</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"color: rgb(65, 65, 65); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; float: none; display: inline !important;\">Nick: X-Dleon-X</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"color: rgb(65, 65, 65); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; float: none; display: inline !important;\">Data: 21/11/2020</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"color: rgb(65, 65, 65); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; float: none; display: inline !important;\">Dura&ccedil;&atilde;o do banimento: Indeterminado</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"font-size: 14px;\">Motivo: -x-</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"color: rgb(65, 65, 65); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; float: none; display: inline !important;\">Aplicador: Presid&ecirc;ncia</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"font-size: 14px;\">________________________________________________________</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(65, 65, 65); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; float: none; display: inline !important;\">Nick: gilmazinho35</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(65, 65, 65); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; float: none; display: inline !important;\">Data: 21/11/2020</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Dura&ccedil;&atilde;o do banimento: Indeterminado</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"font-size: 14px;\">Motivo: -x-</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Aplicador: Presid&ecirc;ncia&nbsp;</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"font-size: 14px;\">________________________________________________________</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Nick: hitalo942</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Data: 22/11/2020</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\">Dura&ccedil;&atilde;o do banimento: Indeterminado</span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        Arial,Helvetica,sans-serif;\"><span style=\"font-size: 14px;\">Motivo: -x-</span></span></p><p style=\"text-align: left;\"><span style=\"font-family: \r\n        ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `guias`
--

CREATE TABLE `guias` (
  `id` int(255) NOT NULL,
  `nickname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cargo` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `guias`
--

INSERT INTO `guias` (`id`, `nickname`, `cargo`) VALUES
(1, 'theGuiihBR', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(255) NOT NULL,
  `enviado_por` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usr_habbo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tipo` int(10) NOT NULL,
  `msg` varchar(10000) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `enviado_por`, `usr_habbo`, `tipo`, `msg`, `data`) VALUES
(1, 'theGuiihBR', 'joaovic26090', 1, 'Test.', '2021-01-10 20:05:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrutores`
--

CREATE TABLE `instrutores` (
  `id` int(255) NOT NULL,
  `nickname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cargo` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `instrutores`
--

INSERT INTO `instrutores` (`id`, `nickname`, `cargo`) VALUES
(1, 'theGuiihBR', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE TABLE `logs` (
  `id` bigint(255) NOT NULL,
  `usr_habbo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `msg` varchar(10000) DEFAULT NULL,
  `usr_ip` varchar(255) NOT NULL,
  `log_tipo` int(5) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros`
--

CREATE TABLE `membros` (
  `id` int(255) NOT NULL,
  `usr_habbo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usr_patente` int(11) NOT NULL DEFAULT 18,
  `usr_promo` timestamp NOT NULL DEFAULT current_timestamp(),
  `usr_responsavel` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usr_status` int(11) NOT NULL DEFAULT 1,
  `usr_executivo` int(2) NOT NULL DEFAULT 0,
  `usr_sigla` varchar(10) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `usr_destaque` int(2) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `membros`
--

INSERT INTO `membros` (`id`, `usr_habbo`, `usr_patente`, `usr_promo`, `usr_responsavel`, `usr_status`, `usr_executivo`, `usr_sigla`, `usr_destaque`) VALUES
(1, 'theGuiihBR', 0, '2021-01-09 23:09:39', 'theGuiihBR', 1, 0, 'Abc', 0),
(2, ':.DiegoRalf.:', 1, '2021-01-10 05:04:48', ':.DiegoRalf.:', 1, 0, '', 0),
(3, 'joaovic26090', 14, '2021-01-10 20:05:56', 'theGuiihBR', 1, 0, '', 0),
(4, 'xgaviox', 14, '2021-01-10 20:22:04', 'theGuiihBR', 1, 0, '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `new_relatorios`
--

CREATE TABLE `new_relatorios` (
  `id` int(255) NOT NULL,
  `nickname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tipo` int(5) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id` int(255) NOT NULL,
  `enviado_por` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user` varchar(255) CHARACTER SET utf8 NOT NULL,
  `msg` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_read` int(10) NOT NULL DEFAULT 0,
  `noti_type` int(10) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notificacoes`
--

INSERT INTO `notificacoes` (`id`, `enviado_por`, `user`, `msg`, `is_read`, `noti_type`, `data`) VALUES
(1, 'theGuiihBR', 'joaovic26090', 'Você foi promovido! Motivos/descrições: Test.', 0, 1, '2021-01-10 20:05:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `painel`
--

CREATE TABLE `painel` (
  `id` int(255) NOT NULL,
  `usr_habbo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usr_senha` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usr_perm` int(2) NOT NULL DEFAULT 0,
  `usr_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `painel`
--

INSERT INTO `painel` (`id`, `usr_habbo`, `usr_senha`, `usr_perm`, `usr_cadastro`) VALUES
(1, 'theGuiihBR', '202cb962ac59075b964b07152d234b70', 2, '2021-01-09 23:08:54'),
(2, 'joaovic26090', '202cb962ac59075b964b07152d234b70', 1, '2021-01-10 20:42:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `patentes`
--

CREATE TABLE `patentes` (
  `id` int(255) NOT NULL,
  `patente` varchar(255) NOT NULL,
  `patente_executivo` varchar(255) NOT NULL,
  `perm_promover` int(10) NOT NULL,
  `perm_rebaixar` int(10) NOT NULL,
  `perm_demitir` int(10) NOT NULL,
  `perm_contratar` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `patentes`
--

INSERT INTO `patentes` (`id`, `patente`, `patente_executivo`, `perm_promover`, `perm_rebaixar`, `perm_demitir`, `perm_contratar`) VALUES
(1, 'Criador', 'Criador', 1, 1, 1, 1),
(2, 'Supremo', 'Supremo', 3, 3, 3, 3),
(4, 'Fundador', 'Fundador', 4, 5, 5, 4),
(5, 'Auxiliar da Fundação', 'Auxiliar da Fundação', 5, 5, 5, 5),
(7, 'Conselheiro', 'Conselheiro', 7, 7, 7, 7),
(8, 'Presidente', 'Presidente', 8, 8, 8, 8),
(9, 'Vice-Presidente', 'Vice-Presidente', 9, 9, 9, 9),
(10, 'Diretor', 'Diretor', 10, 10, 11, 10),
(11, 'Avaliador', 'Avaliador', 11, 11, 9, 11),
(12, 'Secretário', 'Secretário', 12, 12, 10, 12),
(13, 'Supervisor', 'Supervisor', 13, 13, 11, 13),
(14, 'Analista', 'Analista', 14, 14, 12, 14),
(15, 'Orientador', 'Orientador', 15, 15, 13, 15),
(16, 'Associado', 'Associado', 16, 16, 14, 16),
(17, 'Trainee', 'Trainee', 0, 0, 0, 17),
(18, 'Estagiário', 'Estagiário', 0, 0, 0, 18),
(0, 'Desenvolvedor', 'Desenvolvedor', 1, 1, 1, 1),
(3, 'Diplomata', 'Diplomata', 3, 4, 4, 4),
(6, 'Consultor', 'Consultor', 6, 6, 6, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(255) NOT NULL,
  `nickname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cargo` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorios`
--

CREATE TABLE `relatorios` (
  `id` int(255) NOT NULL,
  `usr_habbo` varchar(255) NOT NULL,
  `recrutas` varchar(255) NOT NULL,
  `observacoes` varchar(255) NOT NULL,
  `motivo` varchar(255) NOT NULL DEFAULT '',
  `tipo` int(5) NOT NULL,
  `status` int(3) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `relatorios`
--

INSERT INTO `relatorios` (`id`, `usr_habbo`, `recrutas`, `observacoes`, `motivo`, `tipo`, `status`) VALUES
(2, 'theGuiihBR', 'xgaviox', '', 'Testando.', 1, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avais`
--
ALTER TABLE `avais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `guias`
--
ALTER TABLE `guias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `instrutores`
--
ALTER TABLE `instrutores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `membros`
--
ALTER TABLE `membros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usr_habbo` (`usr_habbo`);

--
-- Índices para tabela `new_relatorios`
--
ALTER TABLE `new_relatorios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `painel`
--
ALTER TABLE `painel`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `patentes`
--
ALTER TABLE `patentes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `relatorios`
--
ALTER TABLE `relatorios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avais`
--
ALTER TABLE `avais`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `avisos`
--
ALTER TABLE `avisos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `guias`
--
ALTER TABLE `guias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `instrutores`
--
ALTER TABLE `instrutores`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `membros`
--
ALTER TABLE `membros`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `new_relatorios`
--
ALTER TABLE `new_relatorios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `painel`
--
ALTER TABLE `painel`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `patentes`
--
ALTER TABLE `patentes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
