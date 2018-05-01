--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
`id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`nome` varchar(256) NOT NULL,
`email` varchar(256) NOT NULL,
`telefone` varchar(64) NOT NULL,
`assunto` varchar(256) NOT NULL,
`mensagem` varchar(1024) NOT NULL
) ENGINE=InnoDB;


-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
`id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`car_id` int(11) NOT NULL,
`path_file` varchar(256) NOT NULL
) ENGINE=InnoDB;

--
-- Extraindo dados da tabela `galeria`
--

INSERT INTO `galeria` (`id`, `car_id`, `path_file`) VALUES
(1, 1, 'banner.jpg'),
(2, 1, 'banner1.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
`id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`nome` varchar(256) NOT NULL,
`preco` float NOT NULL,
`ano` varchar(9) NOT NULL,
`km` int(11) NOT NULL,
`cor` varchar(64) NOT NULL,
`portas` int(2) NOT NULL,
`combustivel` varchar(64) NOT NULL,
`cambio` varchar(64) NOT NULL,
`final_placa` int(2) NOT NULL,
`carroceria` varchar(64) NOT NULL,
`data_anuncio` datetime DEFAULT CURRENT_TIMESTAMP,
`observacoes` varchar(1024) NOT NULL,
`detalhes` varchar(1024) NOT NULL
) ENGINE=InnoDB;

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
`id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`user` varchar(64) NOT NULL,
`pass` varchar(256) NOT NULL
) ENGINE=InnoDB;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `pass`) VALUES
(1, '1', '1');