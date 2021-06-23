-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Dez-2020 às 18:29
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetophp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(2, 'Smartphone'),
(3, 'Televisor'),
(4, 'Ar gelado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf_cnpj_cli` varchar(18) NOT NULL,
  `nome_cli` varchar(50) DEFAULT NULL,
  `numero_cli` varchar(10) DEFAULT NULL,
  `bairro_cli` varchar(10) DEFAULT NULL,
  `cidade_cli` varchar(20) DEFAULT NULL,
  `cep_cli` varchar(10) DEFAULT NULL,
  `estado_cli` varchar(2) DEFAULT NULL,
  `endereco_cli` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cpf_cnpj_cli`, `nome_cli`, `numero_cli`, `bairro_cli`, `cidade_cli`, `cep_cli`, `estado_cli`, `endereco_cli`) VALUES
('215151531531', 'Charles Richard', '1154646465', 'Legal', 'Bragança', '1121212121', 'SP', 'Rua de Brgança');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `numero_compra` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `valor_comissao` decimal(10,2) DEFAULT NULL,
  `valor_transporte` decimal(10,2) DEFAULT NULL,
  `cpf_cnpj_vend` varchar(18) DEFAULT NULL,
  `cpf_cnpj_trans` varchar(18) DEFAULT NULL,
  `cpf_cnpj_cli` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `codigo_img` int(11) NOT NULL,
  `codigo_prod` varchar(10) DEFAULT NULL,
  `nome_arquivo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemcompra`
--

CREATE TABLE `itemcompra` (
  `numero_compra` int(11) DEFAULT NULL,
  `codigo_prod` varchar(10) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `quantidade` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `codigo_prod` varchar(10) NOT NULL,
  `nome_pro` varchar(50) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor_unitario` decimal(10,2) DEFAULT NULL,
  `quantidade` decimal(5,2) DEFAULT NULL,
  `peso` varchar(10) DEFAULT NULL,
  `dimensoes` varchar(15) DEFAULT NULL,
  `unidade_Venda` varchar(3) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `imgprincipal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`codigo_prod`, `nome_pro`, `descricao`, `valor_unitario`, `quantidade`, `peso`, `dimensoes`, `unidade_Venda`, `id`, `imgprincipal`) VALUES
('02121', 'Ar condicionado', 'ausodchasuihasu', '500.00', '1.00', '3221', '32212', '1', 4, 'cb065159ee7a0ca1a21950104112e9fdwebp'),
('1514', 'Celular LG', 'celular ruim que trava', '500.00', '2.00', '123', '25x58', '5', 2, '36ba1e8a92a5b4036c9b6968428d4748.png'),
('36650', 'TV LG', 'tv legal', '1500.00', '2.00', '200', '15x96', '1', 3, '592474e57e5c06d9e5e0c843886886c5.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `transportadora`
--

CREATE TABLE `transportadora` (
  `cpf_cnpj_trans` varchar(18) NOT NULL,
  `nome_trans` varchar(50) DEFAULT NULL,
  `endereco_trans` varchar(50) DEFAULT NULL,
  `numero_trans` varchar(10) DEFAULT NULL,
  `bairro_trans` varchar(10) DEFAULT NULL,
  `cidade_trans` varchar(5) DEFAULT NULL,
  `estado_trans` varchar(2) DEFAULT NULL,
  `cep_trans` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `cpf_cnpj_vend` varchar(18) NOT NULL,
  `nome_vend` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf_cnpj_cli`);

--
-- Índices para tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`numero_compra`),
  ADD KEY `cpf_cnpj_vend` (`cpf_cnpj_vend`),
  ADD KEY `cpf_cnpj_cli` (`cpf_cnpj_cli`),
  ADD KEY `cpf_cnpj_trans` (`cpf_cnpj_trans`);

--
-- Índices para tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`codigo_img`),
  ADD KEY `codigo_prod` (`codigo_prod`);

--
-- Índices para tabela `itemcompra`
--
ALTER TABLE `itemcompra`
  ADD KEY `numero_compra` (`numero_compra`),
  ADD KEY `codigo_prod` (`codigo_prod`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`codigo_prod`),
  ADD KEY `id` (`id`);

--
-- Índices para tabela `transportadora`
--
ALTER TABLE `transportadora`
  ADD PRIMARY KEY (`cpf_cnpj_trans`);

--
-- Índices para tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`cpf_cnpj_vend`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`cpf_cnpj_vend`) REFERENCES `vendedor` (`cpf_cnpj_vend`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`cpf_cnpj_cli`) REFERENCES `cliente` (`cpf_cnpj_cli`),
  ADD CONSTRAINT `compra_ibfk_3` FOREIGN KEY (`cpf_cnpj_trans`) REFERENCES `transportadora` (`cpf_cnpj_trans`);

--
-- Limitadores para a tabela `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `imagem_ibfk_1` FOREIGN KEY (`codigo_prod`) REFERENCES `produto` (`codigo_prod`);

--
-- Limitadores para a tabela `itemcompra`
--
ALTER TABLE `itemcompra`
  ADD CONSTRAINT `ItemCompra_ibfk_1` FOREIGN KEY (`numero_compra`) REFERENCES `compra` (`numero_compra`),
  ADD CONSTRAINT `ItemCompra_ibfk_2` FOREIGN KEY (`codigo_prod`) REFERENCES `produto` (`codigo_prod`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
