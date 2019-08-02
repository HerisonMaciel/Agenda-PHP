-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Ago-2019 às 09:08
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto-php-crud-pessoa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `telefone`, `email`) VALUES
(337, 'csv1', '1', 'cvc1@1'),
(338, 'csv2', '2', 'cvc1@2'),
(339, 'csv3', '3', 'cvc1@3'),
(340, 'csv4', '4', 'cvc1@4'),
(341, 'csv5', '5', 'cvc1@5'),
(342, 'csv6', '6', 'cvc1@6'),
(343, 'csv7', '7', 'cvc1@7'),
(344, 'csv8', '8', 'cvc1@8'),
(345, 'csv9', '9', 'cvc1@9'),
(346, 'csv1', '1', 'cvc1@1'),
(347, 'csv2', '2', 'cvc1@2'),
(348, 'csv3', '3', 'cvc1@3'),
(349, 'csv4', '4', 'cvc1@4'),
(350, 'csv5', '5', 'cvc1@5'),
(351, 'csv6', '6', 'cvc1@6'),
(352, 'csv7', '7', 'cvc1@7'),
(354, 'csv9', '9', 'cvc1@9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
