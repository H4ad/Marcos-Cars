-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 03-Jan-2017 às 05:00
-- Versão do servidor: 5.6.20-log
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
`id` int(11) NOT NULL,
  `nome` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `assunto` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `mensagem` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;


-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
`id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `patch_file` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Extraindo dados da tabela `galeria`
--

INSERT INTO `galeria` (`id`, `car_id`, `patch_file`) VALUES
(1, 1, 'banner.jpg'),
(2, 1, 'banner1.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
`id` int(11) NOT NULL,
  `nome` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `preco` float NOT NULL,
  `ano` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `km` int(11) NOT NULL,
  `cor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `portas` int(2) NOT NULL,
  `combustivel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cambio` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `final_placa` int(2) NOT NULL,
  `carroceria` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `data_anuncio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `observacoes` text COLLATE utf8_unicode_ci NOT NULL,
  `detalhes` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `ano`, `km`, `cor`, `portas`, `combustivel`, `cambio`, `final_placa`, `carroceria`, `data_anuncio`, `observacoes`, `detalhes`) VALUES
(1, 'Banner', 0, '0000-00-0', 0, '', 0, '', '', 0, '', '0000-00-00 00:00:00', '', '');


-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `pass`) VALUES
(1, '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeria`
--
ALTER TABLE `galeria`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
