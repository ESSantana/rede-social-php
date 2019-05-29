-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Maio-2019 às 16:09
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
  `date_comment` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `friendship`
--

CREATE TABLE `friendship` (
  `id_friend` int(11) NOT NULL,
  `cod_ask` int(11) NOT NULL,
  `cod_answer` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Estrutura da tabela `post`
--
-- Error reading structure for table social.post: #1932 - Table 'social.post' doesn't exist in engine
-- Error reading data for table social.post: #1064 - Você tem um erro de sintaxe no seu SQL próximo a 'FROM `social`.`post`' na linha 1

-- --------------------------------------------------------

--
-- Estrutura da tabela `publish`
--

CREATE TABLE `publish` (
  `id_post` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `post` text NOT NULL,
  `img` text NOT NULL,
  `data_post` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `publish`
--

INSERT INTO `publish` (`id_post`, `cod_user`, `post`, `img`, `data_post`) VALUES
(1, 6, 'Teste 123', '', '2019-05-29'),
(2, 6, 'Casa123', 'https://www.plantapronta.com.br/projetos/140/01.jpg', '2019-05-29'),
(3, 4, 'teste', '', '2019-05-29');

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
(2, 'Lucas', 'lucas123', 'f5bb0c8de146c67b44babbf4e6584cc0', '', '2', 'abril', '1992', 'Salvador, BA', 'Stand Up'),
(3, 'Alucard', 'alu321', '202cb962ac59075b964b07152d234b70', 'https://vignette.wikia.nocookie.net/fiction-battlefield/images/b/b9/Alucard_netflix.jpeg/revision/latest?cb=20181112164606&path-prefix=pt-br', '19', 'dezembro', '1987', 'Monte Mor, SP', 'Stand Up'),
(4, 'root', 'root', '63a9f0ea7bb98050796b649e85481845', '', '12', 'abril', '1999', 'Salvador, BA', 'Piadocas'),
(5, 'teste', 'teste', '698dc19d489c4e4db73e28a713eab07b', '', '1', 'Janeiro', '2019', '', 'teste'),
(6, 'Luis Vitor', 'lui123', '202cb962ac59075b964b07152d234b70', '', '15', 'Junho', '2001', '', 'Trocadilhos'),
(7, 'Luis', 'lui3213', '202cb962ac59075b964b07152d234b70', '', '1', 'Janeiro', '2019', '', 'Trocadilhos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `cod_post` (`cod_post`),
  ADD KEY `cod_user` (`cod_user`);

--
-- Indexes for table `friendship`
--
ALTER TABLE `friendship`
  ADD PRIMARY KEY (`id_friend`),
  ADD KEY `cod_answer` (`cod_answer`),
  ADD KEY `cod_ask` (`cod_ask`);

--
-- Indexes for table `lik`
--
ALTER TABLE `lik`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `cod_post` (`cod_post`),
  ADD KEY `cod_user` (`cod_user`);

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
  MODIFY `id_friend` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lik`
--
ALTER TABLE `lik`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publish`
--
ALTER TABLE `publish`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`cod_post`) REFERENCES `post` (`id_post`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`cod_user`) REFERENCES `user` (`id_user`);

--
-- Limitadores para a tabela `friendship`
--
ALTER TABLE `friendship`
  ADD CONSTRAINT `friendship_ibfk_1` FOREIGN KEY (`cod_answer`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `friendship_ibfk_2` FOREIGN KEY (`cod_ask`) REFERENCES `user` (`id_user`);

--
-- Limitadores para a tabela `lik`
--
ALTER TABLE `lik`
  ADD CONSTRAINT `lik_ibfk_1` FOREIGN KEY (`cod_post`) REFERENCES `post` (`id_post`),
  ADD CONSTRAINT `lik_ibfk_2` FOREIGN KEY (`cod_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
