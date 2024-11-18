-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Nov-2024 às 13:38
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `desgracados`
--

CREATE TABLE `desgracados` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(69) NOT NULL,
  `endereco` varchar(69) NOT NULL,
  `telefone` varchar(69) NOT NULL,
  `email` varchar(69) NOT NULL,
  `cidade` varchar(69) NOT NULL,
  `estado` varchar(69) NOT NULL,
  `cpf` varchar(69) NOT NULL,
  `cep` varchar(69) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `desgracados`
--

INSERT INTO `desgracados` (`id_cliente`, `nome`, `endereco`, `telefone`, `email`, `cidade`, `estado`, `cpf`, `cep`) VALUES
(1, 'y', 'tktxyskj', 'tsxk', 'gxk', 'tgktgd', 'ktdgk', 'gujd', 'styku'),
(2, 'fhxj', 'fhsgjm', 'gfhsjmgfs', 'jmfg', 'hsjmfghjmfghjmfgh', 'mfgh', 'jmnfhgx', 'jfh'),
(3, '', '', '', '', '', '', '', ''),
(4, '', '', '', '', 'ARARUAMA', 'RJ', '444444', ''),
(5, '', '', '', '', 'ACRELÂNDIA', 'AC', '12435346', ''),
(6, '', '', '', '', 'ACRELÂNDIA', 'AC', '456734765', ''),
(7, '', '', '', '', 'ACRELÂNDIA', 'AC', 'er567u546756', ''),
(8, '', '', '', '', 'ACRELÂNDIA', 'AC', '5e76867', ''),
(9, '', '', '', '', 'ACRELÂNDIA', 'AC', '5687564e8', ''),
(10, '', '', '', '', 'ACRELÂNDIA', 'AC', '123321', ''),
(11, '', '', '', '', 'ACRELÂNDIA', 'AC', '1233221', ''),
(12, '', '', '', '', 'ACRELÂNDIA', 'AC', '6547534873587', ''),
(13, '', '', '', '', 'ACRELÂNDIA', 'AC', '647547847658', ''),
(14, '', '', '', '', 'ACRELÂNDIA', 'AC', '123421432123412341234123123', ''),
(15, '', '', '', '', 'ACRELÂNDIA', 'AC', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prod`
--

CREATE TABLE `prod` (
  `id` int(11) NOT NULL,
  `d` varchar(69) NOT NULL,
  `p` float NOT NULL,
  `cat` varchar(69) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `prod`
--

INSERT INTO `prod` (`id`, `d`, `p`, `cat`) VALUES
(3, 'comida', 10, 'Alimentos'),
(5, 'pc gamerr', 99999, 'Informática'),
(7, 'secador de cabelo (seca apenas um único fio)', 2, 'Eletrônicos'),
(11, 'fygj', 0, 'Eletrônicos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `pass` varchar(6) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`pass`, `user`) VALUES
('123', 'rth');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_vendas` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_unit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_vendas`, `id_produto`, `id_cliente`, `quantidade`, `valor_unit`) VALUES
(1, 10, 1, 0, 69),
(2, 10, 1, 0, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `desgracados`
--
ALTER TABLE `desgracados`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `prod`
--
ALTER TABLE `prod`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`pass`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_vendas`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `desgracados`
--
ALTER TABLE `desgracados`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `prod`
--
ALTER TABLE `prod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_vendas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
