-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Maio-2019 às 18:22
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `cod_post` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_comment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `friendship`
--

CREATE TABLE `friendship` (
  `id_friend` int(11) NOT NULL,
  `cod_ask` int(11) NOT NULL,
  `cod_answer` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `friendship`
--

INSERT INTO `friendship` (`id_friend`, `cod_ask`, `cod_answer`, `status`) VALUES
(1, 2, 1, '1'),
(2, 3, 1, '1'),
(3, 4, 1, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lik`
--

CREATE TABLE `lik` (
  `id_like` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `cod_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publish`
--

CREATE TABLE `publish` (
  `id_post` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `post` text NOT NULL,
  `img` text NOT NULL,
  `data_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `publish`
--

INSERT INTO `publish` (`id_post`, `cod_user`, `post`, `img`, `data_post`) VALUES
(1, 1, 'Um palco', 'https://www.claroecriativo.com.br/wp-content/uploads/2018/05/Stand-Up.jpg', '2019-05-30 08:01:09'),
(2, 2, 'Testes', '', '2019-05-30 08:46:41'),
(3, 2, 'Testes', '', '2019-05-30 08:46:47'),
(4, 3, 'Se aparecer lÃ¡ Ã© show!\r\n', '', '2019-05-30 01:13:29'),
(5, 4, 'Se aparecer lÃ¡ tbm Ã© show!', '', '2019-05-30 01:13:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `login` varchar(30) NOT NULL,
  `pass` varchar(120) NOT NULL,
  `photo` varchar(320) NOT NULL,
  `dia_nasc` varchar(11) NOT NULL,
  `mes_nasc` varchar(11) NOT NULL,
  `ano_nasc` varchar(11) NOT NULL,
  `local_nasc` varchar(255) NOT NULL,
  `especi_hum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `name`, `login`, `pass`, `photo`, `dia_nasc`, `mes_nasc`, `ano_nasc`, `local_nasc`, `especi_hum`) VALUES
(1, 'Emerson', 'emerson123', '202cb962ac59075b964b07152d234b70', 'img/emerson.jpeg', '1', 'Janeiro', '2019', '', 'Piadilhas'),
(2, 'Luis', 'lui123', '202cb962ac59075b964b07152d234b70', 'img/luis.jpeg', '1', 'Janeiro', '2019', '', 'Trocadalhos'),
(3, 'Administrador', 'admin', '202cb962ac59075b964b07152d234b70', 'img/profile.png', '1', 'Janeiro', '2019', '', 'Administrar'),
(4, 'Carlos', 'car123', '202cb962ac59075b964b07152d234b70', 'img/profile.png', '12', 'Fevereiro', '1990', 'Salvador,BA', 'Sei lá man kkkk'),
(5, 'Luana', 'lua123', '202cb962ac59075b964b07152d234b70', 'img/profile.png', '1', 'Abril', '1990', 'Salvador,BA', 'Sei lá man kkkk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `friendship`
--
ALTER TABLE `friendship`
  ADD PRIMARY KEY (`id_friend`);

--
-- Indexes for table `lik`
--
ALTER TABLE `lik`
  ADD PRIMARY KEY (`id_like`);

--
-- Indexes for table `publish`
--
ALTER TABLE `publish`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friendship`
--
ALTER TABLE `friendship`
  MODIFY `id_friend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lik`
--
ALTER TABLE `lik`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publish`
--
ALTER TABLE `publish`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
