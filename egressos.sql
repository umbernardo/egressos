-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 26, 2016 at 10:32 AM
-- Server version: 5.5.52-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `egressos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_amizades`
--

CREATE TABLE IF NOT EXISTS `tbl_amizades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` mediumint(9) NOT NULL COMMENT 'usuario',
  `id_amigo` mediumint(9) NOT NULL COMMENT 'amigo',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` tinyint(4) NOT NULL COMMENT 'invisible',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_amizades`
--

INSERT INTO `tbl_amizades` (`id`, `id_usuario`, `id_amigo`, `ordem`, `ativo`) VALUES
(1, 4, 1, 0, 0),
(2, 2, 1, 0, 0),
(3, 4, 2, 0, 1),
(4, 5, 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE IF NOT EXISTS `tbl_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL COMMENT 'Nome',
  `imagem` tinytext NOT NULL COMMENT 'Imagem (750x300 px)',
  `url` varchar(255) NOT NULL COMMENT 'Link (URL de Destino)',
  `nova_janela` enum('Sim','Não') NOT NULL COMMENT 'Abrir a url em nova aba/janela ?',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` enum('Sim','Não') NOT NULL DEFAULT 'Sim' COMMENT 'Visível no site ?',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `nome`, `imagem`, `url`, `nova_janela`, `ordem`, `ativo`) VALUES
(1, 'Banner global', '345c96d2f980657.jpg', '#', 'Sim', 0, 'Sim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_campus`
--

CREATE TABLE IF NOT EXISTS `tbl_campus` (
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

CREATE TABLE IF NOT EXISTS `tbl_cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL COMMENT 'Nome',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` enum('Sim','Não') NOT NULL DEFAULT 'Sim' COMMENT 'Visível no site ?',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_cursos`
--

INSERT INTO `tbl_cursos` (`id`, `nome`, `ordem`, `ativo`) VALUES
(1, 'Análise e Desenvolvimento de Sistemas', 0, 'Sim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_oportunidades`
--

CREATE TABLE IF NOT EXISTS `tbl_oportunidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL COMMENT 'Nome da empresa',
  `imagem` tinytext NOT NULL COMMENT 'Foto (Logo 300x300)',
  `descricao` longtext NOT NULL COMMENT 'Descrição',
  `contato` varchar(255) NOT NULL COMMENT 'Telefone ou Email de contato',
  `id_campus` mediumint(9) NOT NULL COMMENT 'Campus',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` enum('Sim','Não') NOT NULL DEFAULT 'Sim' COMMENT 'Visível no site ?',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_oportunidades`
--

INSERT INTO `tbl_oportunidades` (`id`, `nome`, `imagem`, `descricao`, `contato`, `id_campus`, `ordem`, `ativo`) VALUES
(1, '3M', '8b0164ce32fe14f.png', 'Vaga de teste', '199999999', 1, 0, 'Sim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sys_config`
--

CREATE TABLE IF NOT EXISTS `tbl_sys_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL COMMENT 'invisible',
  `email_contato` varchar(255) NOT NULL COMMENT 'Email - Contato',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` enum('Sim','Não') NOT NULL DEFAULT 'Sim' COMMENT 'invisible',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_sys_config`
--

INSERT INTO `tbl_sys_config` (`id`, `nome`, `email_contato`, `ordem`, `ativo`) VALUES
(1, 'Configurações', 'ricardo@umbernardo.com.br', 0, 'Sim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sys_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_sys_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL COMMENT 'Nome',
  `pagina` varchar(255) NOT NULL COMMENT 'Página',
  `class` varchar(255) NOT NULL COMMENT 'Classe (CSS)',
  `parent` mediumint(9) NOT NULL COMMENT 'Parent',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` enum('Sim','Não') NOT NULL COMMENT 'Menu disponível',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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

CREATE TABLE IF NOT EXISTS `tbl_sys_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_sys_newsletter`
--

INSERT INTO `tbl_sys_newsletter` (`id`, `nome`, `email`) VALUES
(1, 'Ricardo teste', 'ricardo.teste@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sys_seo`
--

CREATE TABLE IF NOT EXISTS `tbl_sys_seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL COMMENT 'url (ex: "/home/", "/contato/", "/ver-produto/3/"), iniciado com barra ("/")',
  `seo_title` varchar(255) NOT NULL COMMENT 'invisible',
  `seo_keywords` varchar(255) NOT NULL COMMENT 'Meta Tag - SEO : Keywords',
  `seo_description` varchar(255) NOT NULL COMMENT 'Meta Tag - SEO : Description',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` enum('Sim','Não') NOT NULL DEFAULT 'Sim' COMMENT 'invisible',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_sys_seo`
--

INSERT INTO `tbl_sys_seo` (`id`, `nome`, `seo_title`, `seo_keywords`, `seo_description`, `ordem`, `ativo`) VALUES
(1, 'Meta Tags Padrão', '', 'Keywords do site', 'Description do Site', 1, 'Sim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sys_textos_gerais`
--

CREATE TABLE IF NOT EXISTS `tbl_sys_textos_gerais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) NOT NULL COMMENT 'invisible',
  `nome` varchar(255) NOT NULL COMMENT 'Nome',
  `descricao` longtext NOT NULL COMMENT 'Descrição',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` enum('Sim','Não') NOT NULL DEFAULT 'Sim' COMMENT 'Visível no site ?',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sys_usuarios`
--

CREATE TABLE IF NOT EXISTS `tbl_sys_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordem` int(11) NOT NULL DEFAULT '0' COMMENT 'invisible',
  `ativo` enum('Não','Sim','') DEFAULT NULL COMMENT 'Ativo',
  `login` varchar(255) NOT NULL DEFAULT '' COMMENT 'Login',
  `senha` varchar(50) DEFAULT NULL COMMENT 'Senha',
  `nome` varchar(255) NOT NULL DEFAULT '' COMMENT 'Nome',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT 'Email',
  `cadastrado` date NOT NULL DEFAULT '0000-00-00' COMMENT 'Data do Cadastro',
  `datas` mediumtext NOT NULL COMMENT 'Datas de Acessos',
  `ips` mediumtext NOT NULL COMMENT 'IPs de Acessos',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_sys_usuarios`
--

INSERT INTO `tbl_sys_usuarios` (`id`, `ordem`, `ativo`, `login`, `senha`, `nome`, `email`, `cadastrado`, `datas`, `ips`) VALUES
(1, 2, 'Sim', 'ricardos', 'fc25f57bf41c84b0e820185c740a5150', 'Admin Master', '', '0000-00-00', '26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;26/06/2015;24/06/2015;15/06/2015;15/06/2015;15/06/2015;15/06/2015;15/06/2015;15/06/2015;11/06/2015;11/06/2015;11/06/2015;09/06/2015;02/06/2015;29/05/2015;21/05/2015;21/05/2015;08/04/2015;24/02/2015;09/12/2014;04/12/2014;02/12/2014;20/11/2014;16/10/2014;16/10/2014;15/10/2014;15/10/2014;15/10/2014;15/10/2014;14/10/2014;14/10/2014;13/10/2014;13/10/2014;10/10/2014;10/10/2014;10/10/2014;08/09/2014;05/09/2014;05/09/2014;28/08/2014;25/08/2014;22/08/2014;18/08/2014;08/08/2014;08/08/2014;', '127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;179.156.210.113;179.159.180.118;179.159.180.118;179.159.180.118;179.156.210.113;179.159.180.118;179.159.180.118;179.156.210.113;179.156.210.113;179.159.101.19;179.159.101.19;179.156.210.113;179.159.101.19;127.0.0.1;127.0.0.1;127.0.0.1;127.0.0.1;179.156.211.5;179.159.209.86;179.159.209.86;179.156.211.5;127.0.0.1;'),
(3, 0, 'Sim', 'campinas', 'e8f1ff76458fd3f512698108ab33bcf4', 'IFSP', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_titulacao`
--

CREATE TABLE IF NOT EXISTS `tbl_titulacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL COMMENT 'Nome',
  `ordem` int(11) NOT NULL COMMENT 'invisible',
  `ativo` enum('Sim','Não') NOT NULL DEFAULT 'Sim' COMMENT 'Visível no site ?',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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

CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `interesses` longtext COMMENT 'Interesses',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id`, `nome`, `email`, `password`, `telefone`, `id_campus`, `id_titulacao`, `id_curso`, `ano_entrada`, `ano_conclusao`, `ra`, `trabalhando`, `receber_feed`, `ordem`, `ativo`, `avatar`, `capa`, `resumo`, `interesses`) VALUES
(1, 'Ricardo Teste', 'ricardo.teste@gmail.com', '$2y$10$peDo3yjJtQAUSWhB4h/PAuEp0B8Q8vlY83DAb2Nf93fyZyKOg.jTi', '123', 1, 1, 1, '1996', '1997', '1', 'Sim', 'Sim', 0, 'Sim', 'avatar', 'capa', '', ''),
(2, 'Ricardo Bernardo', 'ricardo@umbernardo.com.br', '$2y$10$XZcZszWKCrSSN68TyOkb0.Pcw6DRcdy50Y2Tq8hlp1UmMzbmrOvAS', '19999722507', 1, 1, 1, '2013', '2016', '13503508', 'Sim', 'Sim', 0, 'Sim', NULL, NULL, 'Planejamento e estratégia digital visando resultados.\r\nCom mais de 10 anos de experiência, eu ajudo empresas a firmar presença no mercado digital em constante mudança, trabalhando para construir uma base on-line sólida e rentável. Utilizo uma combinação de técnicas de arquitetura de informação, experiência do usuário, SEM, otimização e monitoramento de campanhas em busca de aumentar a aquisição de usuário orgânico e análise de conversões para campanhas patrocinadas (PPC). Possuo sólida experiência em gestão de projetos com estreito relacionamento entre equipe e cliente, e além de compreender as necessidades do cliente mantenho foco total nos resultados deixando transparente todo o processo e as etapas de desenvolvimento.\r\n\r\nHabilidades:\r\n\r\nGerenciamento de projetos digitais\r\nFront-end developer\r\nGestão de desenvolvimento (SCRUM)\r\nArquitetura da informação\r\nConversão e otimização\r\nExperiência do usuário (UX Design)\r\nSearch Engine Marketing (SEO orgânico e Pay Per Click) desenvolvimento e monitoramento\r\nGestão de e-commerce\r\nAnálise de sites (Google Analytics)\r\nCampanhas de e-mail marketing', 'Google,java,CSS,WebDesign'),
(3, 'teste', 'rafael.muniz@oi.com.br', '$2y$10$AmY6kwbIlqQK.vuvp5VyGOmw1KXt3OqTC39icVcn95HDy9Wq5ZbEW', '11999231649', 1, 1, 1, '2013', '2016', '1111111', 'Sim', 'Sim', 0, 'Sim', NULL, NULL, 'Teste teste teste', 'web'),
(4, 'Roberto', 'ricardo@umb.digital', '$2y$10$0AZMnBOlgVjRcQ1/ec2WxuEC4SGjICXLbGxA5GZEl53lVRQy2Bp9a', '19999722507', 1, 1, 1, '2013', '2016', '135056872', 'Sim', 'Sim', 0, 'Sim', NULL, NULL, 'Resumo teste, apenas teste', 'css,java,utm'),
(5, 'Everton Silva', 'evertonjsilva31@gmail.com', '$2y$10$LooqWpmu4sf4zP/Ufntue.N6Ks/nTJTE8X1Tgm60MEHYwt1gQ5wxq', '3598737475', 1, 1, 1, '2013', '2016', '1231234234', 'Sim', 'Sim', 0, 'Sim', NULL, NULL, 'Professor EBTT - Instituto Federal de São Paulo', 'Machine Learning,Data Science');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
