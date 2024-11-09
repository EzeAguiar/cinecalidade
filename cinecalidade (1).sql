-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/10/2024 às 19:58
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cinecalidade`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `imagem` varchar(2000) NOT NULL,
  `critica` text DEFAULT NULL,
  `ano` int(11) NOT NULL,
  `classificacao` varchar(10) NOT NULL,
  `genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `filmes`
--

INSERT INTO `filmes` (`id`, `titulo`, `imagem`, `critica`, `ano`, `classificacao`, `genero`) VALUES
(27, 'deadpool', '../uploads/6710197112c31-66edb785b71a4-movie2.jpg', 'yrsf', 2024, '6/10', 'Ação'),
(28, 'Moana 2', '../uploads/67101a391d005-66edba3f6de6b-movie4.jpg', 'dfhe', 2025, '8', 'Aventura'),
(29, 'Haikyu The Movie', '../uploads/67101a52c03a2-66edb859834eb-movie1.jpg', 'fhthujsyukl', 2024, '9', 'Esporte'),
(30, 'mecenarios', '../uploads/6712a032a4bc3-20162406.jpg', 'filme', 2010, '6/10', 'Ação');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
