

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE social;
USE social;

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `cod_post` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_comment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `friendship` (
  `id_friend` int(11) NOT NULL,
  `cod_ask` int(11) NOT NULL,
  `cod_answer` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `friendship` (`id_friend`, `cod_ask`, `cod_answer`, `status`) VALUES
(1, 2, 1, '1'),
(2, 3, 1, '1'),
(3, 4, 1, '1');



CREATE TABLE `lik` (
  `id_like` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `cod_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `publish` (
  `id_post` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `post` text NOT NULL,
  `img` text NOT NULL,
  `data_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `publish` (`id_post`, `cod_user`, `post`, `img`, `data_post`) VALUES
(1, 1, 'Um palco', 'https://www.claroecriativo.com.br/wp-content/uploads/2018/05/Stand-Up.jpg', '2019-05-30 08:01:09'),
(2, 2, 'Testes', '', '2019-05-30 08:46:41'),
(3, 2, 'Testes', '', '2019-05-30 08:46:47'),
(4, 3, 'Se aparecer lÃ¡ Ã© show!\r\n', '', '2019-05-30 01:13:29'),
(5, 4, 'Se aparecer lÃ¡ tbm Ã© show!', '', '2019-05-30 01:13:59');



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


INSERT INTO `user` (`id_user`, `name`, `login`, `pass`, `photo`, `dia_nasc`, `mes_nasc`, `ano_nasc`, `local_nasc`, `especi_hum`) VALUES
(1, 'Emerson', 'emerson123', '202cb962ac59075b964b07152d234b70', 'img/emerson.jpeg', '1', 'Janeiro', '2019', '', 'Piadilhas'),
(2, 'Luis', 'lui123', '202cb962ac59075b964b07152d234b70', 'img/luis.jpeg', '1', 'Janeiro', '2019', '', 'Trocadalhos'),
(3, 'Administrador', 'admin', '202cb962ac59075b964b07152d234b70', 'img/profile.png', '1', 'Janeiro', '2019', '', 'Administrar'),
(4, 'Carlos', 'car123', '202cb962ac59075b964b07152d234b70', 'img/profile.png', '12', 'Fevereiro', '1990', 'Salvador,BA', 'Sei lá man kkkk'),
(5, 'Luana', 'lua123', '202cb962ac59075b964b07152d234b70', 'img/profile.png', '1', 'Abril', '1990', 'Salvador,BA', 'Sei lá man kkkk');


ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

ALTER TABLE `friendship`
  ADD PRIMARY KEY (`id_friend`);

ALTER TABLE `lik`
  ADD PRIMARY KEY (`id_like`);

ALTER TABLE `publish`
  ADD PRIMARY KEY (`id_post`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login` (`login`);

ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `friendship`
  MODIFY `id_friend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `lik`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `publish`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;
