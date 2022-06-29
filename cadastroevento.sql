-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jun-2022 às 06:30
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastroevento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `descricao` varchar(5000) NOT NULL,
  `dataInicio` varchar(10) NOT NULL,
  `dataFim` varchar(10) NOT NULL,
  `tipoEvento` varchar(200) NOT NULL,
  `banner` varchar(1000) NOT NULL,
  `wifi` int(1) NOT NULL DEFAULT 2,
  `estacionamento` int(1) NOT NULL DEFAULT 2,
  `bebida` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id`, `nome`, `descricao`, `dataInicio`, `dataFim`, `tipoEvento`, `banner`, `wifi`, `estacionamento`, `bebida`) VALUES
(2, 'Show do Harry Styles', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.', '2022-07-13', '2022-06-13', 'Show não gratuíto', 'a6dd1542a3f9ea51ac94cb481b4c948e.jpg', 1, 1, 2),
(3, 'Pantera Negra: Wakanda Forever', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.', '2022-08-25', '2022-08-19', 'Cinema', '489265ec0c4d53396a14d48da4d0dcf7.jpg', 2, 1, 2),
(4, 'Festival de Drinks', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2022-08-24', '2022-08-08', 'Festival', '93276b2ce5defcf8023b4da2f8f9bac5.jpg', 1, 2, 1),
(5, 'Aniversário Grátis', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum', '2022-09-08', '2022-09-07', 'Aniversário ', 'cace8d275b422783cee7b3303c3a2fe4.jpg', 2, 1, 1),
(6, 'Avatar: The Way of Water', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.', '2022-08-18', '2022-09-14', 'Cinema', '943ea661080b4bdd6f48fd8a8ff4460b.jpg', 1, 1, 2),
(7, 'Show do Eminem', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.', '2022-08-25', '2022-08-25', 'Show', 'df6f45c7a9b7fdb4897731eae1bca84c.jpg', 1, 2, 2),
(8, 'Bar em SP', ' It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.', '2022-08-17', '2022-08-18', 'Festival', '372274d388492c783f85917808ad63ba.jpg', 1, 1, 2),
(9, 'Show da Rihanna', ' It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.', '2022-11-30', '2022-10-30', 'Show', 'dea7ca7e51150175061b847dbb568f2c.jpg', 2, 1, 2),
(10, 'Espetáculo Rei Leão', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.', '2022-12-29', '2022-12-29', 'Teatro', 'b280f286b0370595a1906d44fb39fb65.jpg', 2, 1, 2),
(11, 'Buteco´s Bar', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.', '2022-09-20', '2022-09-20', 'Festival', 'ca4f0c71973fa09cdfb64e8138662f81.jpg', 1, 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
