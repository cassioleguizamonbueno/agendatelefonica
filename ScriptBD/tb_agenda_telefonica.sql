-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Fev-2018 às 02:27
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `madeira_madeira`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_agenda_telefonica`
--

CREATE TABLE `tb_agenda_telefonica` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_agenda_telefonica`
--

INSERT INTO `tb_agenda_telefonica` (`id`, `nome`, `telefone`, `celular`) VALUES
(1, 'cassio', '35273054', '99592922'),
(3, 'cassio', '35273054', '9959293'),
(8, 'aa', 'ass', 'ss'),
(11, 'dsa', 'fdsa', 'fdsa'),
(13, 'teste', '(22) 22222-2222', '(58) 58585-5555'),
(14, 'CÃ¡ssio VinÃ­cius Leguizamon Bueno', '(41) 99955-9293', '(41) 3527-3054');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_agenda_telefonica`
--
ALTER TABLE `tb_agenda_telefonica`
  ADD UNIQUE KEY `pk_agenda_telefonica` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_agenda_telefonica`
--
ALTER TABLE `tb_agenda_telefonica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
