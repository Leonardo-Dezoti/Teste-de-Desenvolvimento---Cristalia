-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/05/2023 às 02:44
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `exercicio2`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargo`
--

CREATE TABLE `cargo` (
  `Codigo` int(11) NOT NULL,
  `Descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cargo`
--

INSERT INTO `cargo` (`Codigo`, `Descricao`) VALUES
(1, 'Jardineiro'),
(2, 'Operador de Produção'),
(3, 'Analista Fiscal'),
(4, 'Auxiliar de escritorio'),
(5, 'Mecanico'),
(6, 'Analista de Sistemas'),
(7, 'Gerente'),
(8, 'Diretor'),
(9, 'Porteiro'),
(10, 'Analista de RH');

-- --------------------------------------------------------

--
-- Estrutura para tabela `func`
--

CREATE TABLE `func` (
  `Empresa` int(11) DEFAULT NULL,
  `RE` int(11) NOT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `Cargo` int(11) DEFAULT NULL,
  `Status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `func`
--

INSERT INTO `func` (`Empresa`, `RE`, `Nome`, `Cargo`, `Status`) VALUES
(1, 54, 'Antonio Pereira', 7, 'D'),
(1, 84, 'Joao Gomes', 9, 'A'),
(1, 584, 'Benedito Costa', 10, 'A'),
(2, 658, 'Luis Montanha', 7, 'A'),
(1, 841, 'Isabel Silva', 9, 'D'),
(2, 847, 'Joaquim Barbosa', 3, 'A'),
(1, 1245, 'Maria da Silva', 6, 'A');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`Codigo`);

--
-- Índices de tabela `func`
--
ALTER TABLE `func`
  ADD PRIMARY KEY (`RE`),
  ADD KEY `fk_car` (`Cargo`);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `func`
--
ALTER TABLE `func`
  ADD CONSTRAINT `fk_car` FOREIGN KEY (`Cargo`) REFERENCES `cargo` (`Codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
