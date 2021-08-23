-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Ago-2021 às 04:57
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apurodb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf` char(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `telefone` char(12) NOT NULL,
  `fidelidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cpf`, `nome`, `cidade`, `telefone`, `fidelidade`) VALUES
('11797569678', 'Christian Braga', 'Montes Claros - MG', '3899600670', 0),
('1990809685', 'Filipe Nunes', 'Betim - MG', '31991884649', 2),
('2756428498', 'Emiliano Braga', 'Lontra - MG', '38996887648', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL,
  `cnpj` char(14) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `localidade` varchar(100) NOT NULL,
  `contato` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `cnpj`, `nome`, `localidade`, `contato`) VALUES
(1, '5681278000150', 'Marina Produtos de Limpeza', 'Itauna - MG', '(37) 3241-3634 / atendimento@produtosmarina.com.br'),
(2, '19999523000111', 'Desprol', 'Betim - MG', '(31)35921802; (31)35961213. www.desprol.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `cpf` char(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `telefone` char(12) NOT NULL,
  `endereco` varchar(75) DEFAULT NULL,
  `cpf_supervisor` char(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `nivel_acesso` int(11) NOT NULL,
  `data_admissao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`cpf`, `nome`, `cargo`, `telefone`, `endereco`, `cpf_supervisor`, `email`, `senha`, `nivel_acesso`, `data_admissao`) VALUES
('01010008659', 'Luis Guilherme', 'Gestor TI', '31994576780', 'R. Dona Guiguita 127', '1234567891', 'adm@adm', '123', 1, '2021-08-22 20:58:07'),
('11123456789', 'Lucas', 'Socio', '31994576782', 'R. Dona Guiguita 127', NULL, 'nei@apuro', '123', 2, '2021-08-22 20:58:07'),
('1234567891', 'Sergio Augusto', 'Diretor', '31994576781', 'R. Alvorada, 55', NULL, 'amendoim@limpeza', '123', 1, '2021-08-22 20:58:07'),
('2010008659', 'Aline', 'a', '1', 'a', NULL, 'a@a', '123', 0, '2021-08-23 02:38:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `codigo_prod` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `rendimento` varchar(25) DEFAULT NULL,
  `custo` varchar(10) DEFAULT NULL,
  `preco_venda` varchar(10) DEFAULT NULL,
  `id_fornecedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`codigo_prod`, `marca`, `descricao`, `rendimento`, `custo`, `preco_venda`, `id_fornecedor`) VALUES
(1, 'Alvejante Floral Marina', 'Lavagem de roupas brancas e desinfecção de ambient', '1L', '10', '15.99', 1),
(2, 'Agua Sanitaria Marina', 'limpeza geral, desinfecção de cozinhas, banheiros,', '1L, 5L', '8.55', '12.99', 1),
(6, 'detergente ype', 'lava louÃ§as', '300ml', '5', '10', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `cod_venda` int(11) NOT NULL,
  `cpf_cliente` char(11) NOT NULL,
  `cpf_vendedor` char(11) NOT NULL,
  `codigo_produto` int(11) NOT NULL,
  `dataHora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`cod_venda`, `cpf_cliente`, `cpf_vendedor`, `codigo_produto`, `dataHora`) VALUES
(1, '1990809685', '11123456789', 1, '2021-08-23 00:50:03'),
(2, '1990809685', '11123456789', 2, '2021-08-23 00:50:03'),
(3, '2756428498', '1234567891', 2, '2021-08-23 00:50:03'),
(4, '1990809685', '1234567891', 1, '2021-08-23 00:52:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `telefone` (`telefone`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnpj` (`cnpj`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `telefone` (`telefone`),
  ADD KEY `cpf_supervisor` (`cpf_supervisor`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`codigo_prod`),
  ADD KEY `id_fornecedor` (`id_fornecedor`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`cod_venda`),
  ADD KEY `cpf_cliente` (`cpf_cliente`),
  ADD KEY `cpf_vendedor` (`cpf_vendedor`),
  ADD KEY `codigo_produto` (`codigo_produto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `codigo_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `cod_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`cpf_supervisor`) REFERENCES `funcionario` (`cpf`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedor` (`id`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`cpf_cliente`) REFERENCES `cliente` (`cpf`),
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`cpf_vendedor`) REFERENCES `funcionario` (`cpf`),
  ADD CONSTRAINT `venda_ibfk_3` FOREIGN KEY (`codigo_produto`) REFERENCES `produto` (`codigo_prod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
