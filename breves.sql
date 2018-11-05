-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 05-Nov-2018 às 03:04
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `breves`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`cod`, `titulo`, `url`, `descricao`, `status`, `data`) VALUES
(13, 'Remédio', 'remedio', 'Remédio diversos', 1, '2018-11-04 11:43:29'),
(12, 'Shampoo', 'shampoo', 'Shampoo Geral', 1, '2018-11-04 11:42:52'),
(11, 'Sabonete', 'sabonete', 'Sobonete diversos', 1, '2018-11-04 11:42:07'),
(10, 'Gel ', 'gel', 'Gel de Limpeza', 1, '2018-11-04 11:41:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

DROP TABLE IF EXISTS `imagens`;
CREATE TABLE IF NOT EXISTS `imagens` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(255) NOT NULL,
  `post_cod` int(11) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM AUTO_INCREMENT=160 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `variacao` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `subcategoria` varchar(255) NOT NULL,
  `marca_do_produto` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `valor_antigo` varchar(255) DEFAULT NULL,
  `desconto` varchar(255) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `data` datetime NOT NULL,
  `cod_ra` varchar(255) DEFAULT NULL,
  `oferta` int(1) DEFAULT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`cod`, `variacao`, `titulo`, `categoria`, `subcategoria`, `marca_do_produto`, `url`, `descricao`, `valor`, `valor_antigo`, `desconto`, `estoque`, `status`, `thumb`, `data`, `cod_ra`, `oferta`) VALUES
(2, 3, 'Kit Sabonete Dove Branco Com 6 Unidades 90g Preço Especial', '11', '122', 'Dove', 'kit-sabonete-dove-branco-com-6-unidades-90g-preco-especial', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n\r\n&lt;/body&gt;\r\n&lt;/html&gt;', '12, 00', '9, 00', '7', 100, 1, 'produto/2018/11/kit-sabonete-dove-branco-com-6-unidades-90g-preco-especial-1541366897.png', '2018-11-04 19:28:17', '000002', 1),
(3, 1, 'Dorflex com 10 comprimidos', '13', '125', 'Dorflex', 'dorflex-com-10-comprimidos', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n&lt;p&gt;INDICA&Ccedil;&Atilde;O: Analg&eacute;sico e relaxante muscular, indicado no al&iacute;vio da dor associada a contraturas musculares decorrentes de processos traum&aacute;ticos ou inflamat&oacute;rios e em cefal&eacute;ias tensionais.&lt;/p&gt;\r\n&lt;p&gt;CONTRA-INDICA&Ccedil;&Atilde;O: &eacute; contra-indicado em casos de gravidez, hipersensibilidade a qualquer um dos componentes da f&oacute;rmula, n&atilde;o deve ser utilizado em pacientes com glaucoma, &uacute;lcera p&eacute;ptica,obstru&ccedil;&atilde;o do colo da bexiga e miastenia grave.&lt;/p&gt;\r\n&lt;p&gt;REA&Ccedil;&Atilde;O ADVERSA: Bradicardia ou taquicardia, arritmias card&iacute;acas, secura da boca, sede, diminui&ccedil;&atilde;o da sudorese, midr&iacute;ase, dificuldade de acomoda&ccedil;&atilde;o visual (vis&atilde;o borrada)&lt;/p&gt;\r\n&lt;/body&gt;\r\n&lt;/html&gt;', '8, 00', '4, 99', '3', 20, 1, 'produto/2018/11/dorflex-com-10-comprimidos.jpg', '2018-11-04 19:35:14', '00003', 1),
(4, 5, 'Darrow Actine Pele Acneica - Esfoliante Facial 60g', '12', '124', 'Active', 'darrow-actine-pele-acneica-esfoliante-facial-60g', '&#60;!DOCTYPE html&#62;&#13;&#10;&#60;html&#62;&#13;&#10;&#60;head&#62;&#13;&#10;&#60;/head&#62;&#13;&#10;&#60;body&#62;&#13;&#10;&#60;p&#62;Esfoliante facial para pele oleosa e com acne.&#38;nbsp;Darrow Actine&#38;nbsp;complementa a limpeza com a remo&#38;ccedil;&#38;atilde;o das&#38;nbsp;c&#38;eacute;lulas mortas e desobstru&#38;ccedil;&#38;atilde;o dos poros. Sua pele macia e com a oleosidade controlada.&#60;br /&#62;&#60;br /&#62;&#60;strong&#62;Darrow Actine&#60;/strong&#62;&#38;nbsp;suaviza a superf&#38;iacute;cie do rosto com microesferas que estimulam a renova&#38;ccedil;&#38;atilde;o celular sem deixar o rosto ressecado e melhoram a a&#38;ccedil;&#38;atilde;o dos demais tratamentos nas camadas mais profundas da pele. Al&#38;eacute;m disso, sua f&#38;oacute;rmula atua nas gl&#38;acirc;ndulas com a regulagem da produ&#38;ccedil;&#38;atilde;o seb&#38;aacute;cea e impede a prolifera&#38;ccedil;&#38;atilde;o bacteriana causadora da acne.&#60;br /&#62;&#60;br /&#62;Com&#38;nbsp;&#60;strong&#62;Darrow Actine&#60;/strong&#62;, voc&#38;ecirc; tem um grande aliado no combate &#38;agrave;s espinhas, que deixa sua pele fica com os poros faciais descongestionados e com a agrad&#38;aacute;vel sensa&#38;ccedil;&#38;atilde;o de limpeza e bem-estar.&#60;/p&#62;&#13;&#10;&#60;/body&#62;&#13;&#10;&#60;/html&#62;', '70, 00', '50, 90', '10', 50, 1, 'produto/2018/11/darrow-actine-pele-acneica-esfoliante-facial-60g.jpg', '2018-11-04 21:58:23', '000004', 1),
(5, 5, 'Sabonete Rexona Acqua Fresh 84g', '11', '122', 'Rexona', 'sabonete-rexona-acqua-fresh-84g', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n&lt;p&gt;O Sabonete Rexona Acqua Fresh 84g limpa e hidrata a pele, proporcionando bem estar e relaxamento. Especialmente desenvolvida para todos os tipos de pele, o Sabonete Rexona &eacute; a solu&ccedil;&atilde;o para o seu momento de cuidados. Seja em qualquer momento do dia, a hora de tomar banho &eacute; um momento onde escapamos da realidade, relaxamos e cuidamos do nosso corpo, n&atilde;o &eacute; mesmo? E para que esse momento ganhe muito mais qualidade, nada melhor que produtos especialmente desenvolvidos para suprir as car&ecirc;ncias da pele, promovendo a hidrata&ccedil;&atilde;o e o rejuvenescimento da pele. Rexona &eacute; ideal para quem busca um cuidado especial, com produtos inovadores, Rexona n&atilde;o te abandona.&lt;/p&gt;\r\n&lt;/body&gt;\r\n&lt;/html&gt;', '15, 00', '12, 90', '3', 150, 1, 'produto/2018/11/sabonete-rexona-acqua-fresh-84g.jpg', '2018-11-04 19:47:48', '000005', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocao`
--

DROP TABLE IF EXISTS `promocao`;
CREATE TABLE IF NOT EXISTS `promocao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategoria`
--

DROP TABLE IF EXISTS `subcategoria`;
CREATE TABLE IF NOT EXISTS `subcategoria` (
  `sub_cod` int(11) NOT NULL AUTO_INCREMENT,
  `sub_titulo` varchar(255) NOT NULL,
  `sub_url` varchar(255) NOT NULL,
  `sub_descricao` varchar(255) NOT NULL,
  `sub_status` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`sub_cod`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `subcategoria`
--

INSERT INTO `subcategoria` (`sub_cod`, `sub_titulo`, `sub_url`, `sub_descricao`, `sub_status`, `categoria`) VALUES
(126, 'Sabonete Liquido', 'sabonete-liquido', 'Sabonete Liquido para o Corpo', 1, '11'),
(125, 'Dorflex em Comprimido', 'dorflex-em-comprimido', 'Dorflex em Comprimido', 1, '13'),
(124, 'Shampoo sem Sal', 'shampoo-sem-sal', 'Shampoo sem Sal Diversos', 1, '12'),
(123, 'Shampoo com Sal', 'shampoo-com-sal', 'Shampoo com Sal Diversos', 1, '12'),
(122, 'Sabonete Quadro', 'sabonete-quadro', 'Sabonete em Quadro', 1, '11'),
(121, 'Gel de Limpeza', 'gel-de-limpeza', 'Gel de Limpeza Profunda', 1, '10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sliders`
--

DROP TABLE IF EXISTS `tb_sliders`;
CREATE TABLE IF NOT EXISTS `tb_sliders` (
  `slider_cod` int(11) NOT NULL AUTO_INCREMENT,
  `slider_titulo` varchar(255) NOT NULL,
  `slider_status` int(11) NOT NULL,
  `slider_link` varchar(255) NOT NULL,
  `slider_thumb` varchar(255) NOT NULL,
  `slider_tamanho` char(1) NOT NULL,
  PRIMARY KEY (`slider_cod`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_sliders`
--

INSERT INTO `tb_sliders` (`slider_cod`, `slider_titulo`, `slider_status`, `slider_link`, `slider_thumb`, `slider_tamanho`) VALUES
(37, 'Urbanismo', 1, '#', 'sliders/2018/11/urbanismo.jpg', 'g'),
(36, 'Breves Medicamento Genérico', 1, '#', 'sliders/2018/11/breves-medicamento-generico.jpg', 'g');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` int(1) NOT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `bairro` varchar(180) DEFAULT NULL,
  `cidade` varchar(180) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod`, `usuario`, `email`, `status`, `nome`, `senha`, `nivel`, `cep`, `bairro`, `cidade`, `endereco`, `estado`, `data`) VALUES
(5, 'Junio', 'junio@gmail.com', 1, 'Junio  Santos', '91c7f25f8c2364924cac69dc32ddd55f', 1, '', '', '', '', '', '2018-04-26 12:16:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `variacao`
--

DROP TABLE IF EXISTS `variacao`;
CREATE TABLE IF NOT EXISTS `variacao` (
  `id_variacao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_variacao` varchar(100) NOT NULL,
  `status_variacao` int(1) NOT NULL,
  PRIMARY KEY (`id_variacao`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `variacao`
--

INSERT INTO `variacao` (`id_variacao`, `nome_variacao`, `status_variacao`) VALUES
(1, 'UN', 1),
(3, 'KIT', 1),
(5, 'G', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
