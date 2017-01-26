-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: database
-- Generation Time: Dec 22, 2016 at 03:45 PM
-- Server version: 5.7.15
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_amizades`
--

CREATE TABLE `tbl_amizades` (
  `id` int(11) NOT NULL,
  `id_usuario` mediumint(9) NOT NULL COMMENT 'usuario',
  `id_amigo` mediumint(9) NOT NULL COMMENT 'amigo',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` tinyint(4) NOT NULL COMMENT 'invisible'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL COMMENT 'Nome',
  `imagem` tinytext NOT NULL COMMENT 'Imagem (750x300 px)',
  `url` varchar(255) NOT NULL COMMENT 'Link (URL de Destino)',
  `nova_janela` enum('Sim','Não') NOT NULL COMMENT 'Abrir a url em nova aba/janela ?',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` enum('Sim','Não') NOT NULL DEFAULT 'Sim' COMMENT 'Visível no site ?'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `nome`, `imagem`, `url`, `nova_janela`, `ordem`, `ativo`) VALUES
(1, 'Banner global', '24e2b1309890849.jpg', '#', 'Sim', 0, 'Sim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_campus`
--

CREATE TABLE `tbl_campus` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL COMMENT 'Nome',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` enum('Sim','Não') NOT NULL DEFAULT 'Sim' COMMENT 'Visível no site ?',
  `id_coordenador` mediumint(9) NOT NULL COMMENT 'Coordenador'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_campus`
--

INSERT INTO `tbl_campus` (`id`, `nome`, `ordem`, `ativo`, `id_coordenador`) VALUES
(1, 'Campinas', 0, 'Sim', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cursos`
--

CREATE TABLE `tbl_cursos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL COMMENT 'Nome',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` enum('Sim','Não') NOT NULL DEFAULT 'Sim' COMMENT 'Visível no site ?'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cursos`
--

INSERT INTO `tbl_cursos` (`id`, `nome`, `ordem`, `ativo`) VALUES
(1, 'Análise e Desenvolvimento de Sistemas', 0, 'Sim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_oportunidades`
--

CREATE TABLE `tbl_oportunidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL COMMENT 'Nome da empresa',
  `imagem` tinytext NOT NULL COMMENT 'Foto (Logo 300x300)',
  `descricao` longtext NOT NULL COMMENT 'Descrição',
  `contato` varchar(255) NOT NULL COMMENT 'Telefone ou Email de contato',
  `id_campus` mediumint(9) NOT NULL COMMENT 'Campus',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` enum('Sim','Não') NOT NULL DEFAULT 'Sim' COMMENT 'Visível no site ?'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sys_config`
--

CREATE TABLE `tbl_sys_config` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL COMMENT 'invisible',
  `email_contato` varchar(255) NOT NULL COMMENT 'Email - Contato',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` enum('Sim','Não') NOT NULL DEFAULT 'Sim' COMMENT 'invisible'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sys_config`
--

INSERT INTO `tbl_sys_config` (`id`, `nome`, `email_contato`, `ordem`, `ativo`) VALUES
(1, 'Configurações', 'ricardo@umbernardo.com.br', 0, 'Sim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sys_menu`
--

CREATE TABLE `tbl_sys_menu` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL COMMENT 'Nome',
  `pagina` varchar(255) NOT NULL COMMENT 'Página',
  `class` varchar(255) NOT NULL COMMENT 'Classe (CSS)',
  `parent` mediumint(9) NOT NULL COMMENT 'Parent',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` enum('Sim','Não') NOT NULL COMMENT 'Menu disponível'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sys_menu`
--

INSERT INTO `tbl_sys_menu` (`id`, `nome`, `pagina`, `class`, `parent`, `ordem`, `ativo`) VALUES
(1, '**Parent Vazio**', '', '', 0, 44, 'Sim'),
(2, 'Campus', 'page_campus.php', 'li_padrao', 1, 0, 'Sim'),
(3, 'Titulações', 'page_titulacao.php', 'li_padrao', 1, 0, 'Sim'),
(4, 'Cursos', 'page_cursos.php', 'li_padrao', 1, 0, 'Sim'),
(5, 'Usuários', 'page_usuario.php', 'li_padrao', 1, 0, 'Sim'),
(6, 'Amizades', 'page_amizades.php', 'li_padrao', 1, 0, 'Não'),
(7, 'Oportunidades', 'page_oportunidades.php', 'li_padrao', 1, 0, 'Sim'),
(8, 'Banner global', 'page_banner.php?a=e&item=MuQ1=A=s', 'li_padrao', 1, 0, 'Sim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sys_newsletter`
--

CREATE TABLE `tbl_sys_newsletter` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sys_seo`
--

CREATE TABLE `tbl_sys_seo` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL COMMENT 'url (ex: "/home/", "/contato/", "/ver-produto/3/"), iniciado com barra ("/")',
  `seo_title` varchar(255) NOT NULL COMMENT 'invisible',
  `seo_keywords` varchar(255) NOT NULL COMMENT 'Meta Tag - SEO : Keywords',
  `seo_description` varchar(255) NOT NULL COMMENT 'Meta Tag - SEO : Description',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` enum('Sim','Não') NOT NULL DEFAULT 'Sim' COMMENT 'invisible'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sys_seo`
--

INSERT INTO `tbl_sys_seo` (`id`, `nome`, `seo_title`, `seo_keywords`, `seo_description`, `ordem`, `ativo`) VALUES
(1, 'Meta Tags Padrão', '', 'Keywords do site', 'Description do Site', 1, 'Sim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sys_textos_gerais`
--

CREATE TABLE `tbl_sys_textos_gerais` (
  `id` int(11) NOT NULL,
  `cod` varchar(255) NOT NULL COMMENT 'invisible',
  `nome` varchar(255) NOT NULL COMMENT 'Nome',
  `descricao` longtext NOT NULL COMMENT 'Descrição',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` enum('Sim','Não') NOT NULL DEFAULT 'Sim' COMMENT 'Visível no site ?'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sys_usuarios`
--

CREATE TABLE `tbl_sys_usuarios` (
  `id` int(11) NOT NULL,
  `ordem` int(11) NOT NULL DEFAULT '0' COMMENT 'invisible',
  `ativo` enum('Não','Sim','') DEFAULT NULL COMMENT 'Ativo',
  `login` varchar(255) NOT NULL DEFAULT '' COMMENT 'Login',
  `senha` varchar(50) DEFAULT NULL COMMENT 'Senha',
  `nome` varchar(255) NOT NULL DEFAULT '' COMMENT 'Nome',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT 'Email',
  `cadastrado` date NOT NULL DEFAULT '0000-00-00' COMMENT 'Data do Cadastro',
  `datas` mediumtext NOT NULL COMMENT 'Datas de Acessos',
  `ips` mediumtext NOT NULL COMMENT 'IPs de Acessos'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sys_usuarios`
--

INSERT INTO `tbl_sys_usuarios` (`id`, `ordem`, `ativo`, `login`, `senha`, `nome`, `email`, `cadastrado`, `datas`, `ips`) VALUES
(1, 1, 'Sim', 'ricardos', 'fc25f57bf41c84b0e820185c740a5150', 'Admin Master', '', '0000-00-00', '26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;24/06/2015;15/06/2015;15/06/2015;15/06/2015;15/06/2015;15/06/2015;15/06/2015;11/06/2015;11/06/2015;11/06/2015;09/06/2015;02/06/2015;29/05/2015;21/05/2015;21/05/2015;08/04/2015;24/02/2015;09/12/2014;04/12/2014;02/12/2014;20/11/2014;16/10/2014;16/10/2014;15/10/2014;15/10/2014;15/10/2014;15/10/2014;14/10/2014;14/10/2014;13/10/2014;13/10/2014;10/10/2014;10/10/2014;10/10/2014;08/09/2014;05/09/2014;05/09/2014;28/08/2014;25/08/2014;22/08/2014;18/08/2014;08/08/2014;08/08/2014;', '127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;179.156.210.113;179.159.180.118;179.159.180.118;179.159.180.118;179.156.210.113;179.159.180.118;179.159.180.118;179.156.210.113;179.156.210.113;179.159.101.19;179.159.101.19;179.156.210.113;179.159.101.19;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;179.156.211.5;179.159.209.86;179.159.209.86;179.156.211.5;127.0.0.1;');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_titulacao`
--

CREATE TABLE `tbl_titulacao` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL COMMENT 'Nome',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` enum('Sim','Não') NOT NULL DEFAULT 'Sim' COMMENT 'Visível no site ?'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_titulacao`
--

INSERT INTO `tbl_titulacao` (`id`, `nome`, `ordem`, `ativo`) VALUES
(1, 'Graduação', 0, 'Sim'),
(2, 'Pós-Graduação', 1, 'Sim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL COMMENT 'Nome',
  `email` varchar(255) NOT NULL COMMENT 'E-mail',
  `password` varchar(255) NOT NULL COMMENT 'invisible',
  `telefone` varchar(255) NOT NULL COMMENT 'Telefone',
  `id_campus` mediumint(9) NOT NULL COMMENT 'Campus',
  `id_titulacao` mediumint(9) NOT NULL COMMENT 'Titulação',
  `id_curso` mediumint(9) NOT NULL COMMENT 'Curso',
  `ano_entrada` varchar(255) NOT NULL COMMENT 'Ano de Entrada',
  `ano_conclusao` varchar(255) NOT NULL COMMENT 'Ano de Conclusão',
  `ra` varchar(255) NOT NULL COMMENT 'RA',
  `trabalhando` enum('Sim','Não') NOT NULL COMMENT 'Trabalhando',
  `receber_feed` enum('Sim','Não') NOT NULL COMMENT 'Receber Feed de Empregos',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` enum('Sim','Não') NOT NULL DEFAULT 'Sim' COMMENT 'Visível no site ?',
  `avatar` tinytext COMMENT 'Foto de Avatar',
  `capa` tinytext COMMENT 'Foto de Capa',
  `resumo` longtext COMMENT 'Resumo',
  `interesses` longtext COMMENT 'Interesses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id`, `nome`, `email`, `password`, `telefone`, `id_campus`, `id_titulacao`, `id_curso`, `ano_entrada`, `ano_conclusao`, `ra`, `trabalhando`, `receber_feed`, `ordem`, `ativo`, `avatar`, `capa`, `resumo`, `interesses`) VALUES
(1, 'Ricardo Santos', 'ricardo@umb.digital', '$2y$10$AFs9fuZT7aXTbyCMe5.Hqe9A4Zqco3Ile5c5vE285L6XYIuZEIBpy', '123', 1, 1, 1, '1997', '2014', '2019', 'Sim', 'Sim', 0, 'Sim', NULL, NULL, 'ção', 'aeho,aieha,ção'),
(2, 'Teste', 'teste@teste.com', '$2y$10$He6P/bhvsseoRWOuMKVcTeHgGa9Hzk3e7vQlHyhr4Jm7jsJsGmEGe', '123', 1, 1, 1, '1990', '2016', '123', 'Sim', 'Sim', 0, 'Sim', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_amizades`
--
ALTER TABLE `tbl_amizades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cursos`
--
ALTER TABLE `tbl_cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_oportunidades`
--
ALTER TABLE `tbl_oportunidades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sys_config`
--
ALTER TABLE `tbl_sys_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sys_menu`
--
ALTER TABLE `tbl_sys_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sys_newsletter`
--
ALTER TABLE `tbl_sys_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sys_seo`
--
ALTER TABLE `tbl_sys_seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sys_textos_gerais`
--
ALTER TABLE `tbl_sys_textos_gerais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sys_usuarios`
--
ALTER TABLE `tbl_sys_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_titulacao`
--
ALTER TABLE `tbl_titulacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_amizades`
--
ALTER TABLE `tbl_amizades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_cursos`
--
ALTER TABLE `tbl_cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_oportunidades`
--
ALTER TABLE `tbl_oportunidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sys_config`
--
ALTER TABLE `tbl_sys_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_sys_menu`
--
ALTER TABLE `tbl_sys_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_sys_newsletter`
--
ALTER TABLE `tbl_sys_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sys_seo`
--
ALTER TABLE `tbl_sys_seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_sys_textos_gerais`
--
ALTER TABLE `tbl_sys_textos_gerais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sys_usuarios`
--
ALTER TABLE `tbl_sys_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_titulacao`
--
ALTER TABLE `tbl_titulacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
