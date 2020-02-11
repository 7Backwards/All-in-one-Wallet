-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2019 at 03:15 AM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estgv16064`
--

-- --------------------------------------------------------

--
-- Table structure for table `administradores`
--

CREATE TABLE `administradores` (
  `ID_ADMIN` int(11) NOT NULL,
  `NOME_ADMIN` text NOT NULL,
  `EMAIL_ADMIN` text NOT NULL,
  `PASSWORD_ADMIN` text NOT NULL,
  `TELEMOVEL_ADMIN` int(11) DEFAULT NULL,
  `creation_key` varchar(250) NOT NULL,
  `Estado_Admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administradores`
--

INSERT INTO `administradores` (`ID_ADMIN`, `NOME_ADMIN`, `EMAIL_ADMIN`, `PASSWORD_ADMIN`, `TELEMOVEL_ADMIN`, `creation_key`, `Estado_Admin`) VALUES
(1, 'BizDirect', 'ipvpint@gmail.com', 'b081e8e3db4106215ff8fe47c9026104', 910000000, '', 1),
(10, 'Emanuel', 'emanene123@gmail.com', '202cb962ac59075b964b07152d234b70', 920000000, '92e3a6439e504fd6e780c25856b03862', 1),
(12, 'Gonçalo Lopes', 'goncalo-lopes@hotmail.com', '254b753e9a79d30d13d988651cada302', 967267452, 'e9d04aeb871aaff57c133eb82bc4d5ae', 1);

-- --------------------------------------------------------

--
-- Table structure for table `aprovacao`
--

CREATE TABLE `aprovacao` (
  `ID_APROVACAO` int(11) NOT NULL,
  `ID_COMERCIANTE` int(11) NOT NULL,
  `ID_ADMIN` int(11) NOT NULL,
  `APROVACAO` tinyint(1) DEFAULT NULL,
  `DESCRICAO_NAO_APROVACAO` longtext,
  `RAZAO_NAO_APROVACAO` longtext,
  `DATA_APROVACAO` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aprovacao`
--

INSERT INTO `aprovacao` (`ID_APROVACAO`, `ID_COMERCIANTE`, `ID_ADMIN`, `APROVACAO`, `DESCRICAO_NAO_APROVACAO`, `RAZAO_NAO_APROVACAO`, `DATA_APROVACAO`) VALUES
(1, 1, 1, 1, NULL, NULL, '2019-07-09 00:53:22'),
(3, 1, 1, 1, NULL, NULL, '2019-07-09 13:50:41'),
(6, 3, 1, 1, NULL, NULL, '2019-07-09 20:36:32'),
(9, 1, 1, 1, NULL, NULL, '2019-07-10 13:12:22'),
(10, 5, 1, 1, NULL, NULL, '2019-07-12 16:59:26'),
(11, 5, 1, 1, NULL, NULL, '2019-07-12 17:00:08'),
(13, 5, 1, 1, NULL, NULL, '2019-07-12 19:48:36'),
(14, 9, 1, 1, NULL, NULL, '2019-07-12 19:49:17'),
(18, 12, 1, 1, NULL, NULL, '2019-07-13 21:17:04'),
(19, 9, 12, 1, NULL, NULL, '2019-07-14 20:23:29'),
(20, 14, 12, 0, ' Não cumpre os requisitos', NULL, '2019-07-14 20:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `area_interesse`
--

CREATE TABLE `area_interesse` (
  `ID_AREAINTERESSE` int(11) NOT NULL,
  `NOME_AREAINTERESSE` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_interesse`
--

INSERT INTO `area_interesse` (`ID_AREAINTERESSE`, `NOME_AREAINTERESSE`) VALUES
(1, 'Agricultura'),
(2, 'Arquitetura'),
(3, 'Comunicações'),
(4, 'Desporto'),
(5, 'Gastronomia'),
(6, 'Hotelaria'),
(7, 'Informática'),
(8, 'Lazer'),
(9, 'Logística'),
(10, 'Negócios Imobiliários'),
(11, 'Saúde'),
(12, 'Tecnologia'),
(13, 'Transportes'),
(14, 'Turismo'),
(15, 'Vestuário');

-- --------------------------------------------------------

--
-- Table structure for table `area_interesse_campanhas`
--

CREATE TABLE `area_interesse_campanhas` (
  `ID_AREAINTERESSE` int(11) NOT NULL,
  `ID_CAMPANHA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_interesse_campanhas`
--

INSERT INTO `area_interesse_campanhas` (`ID_AREAINTERESSE`, `ID_CAMPANHA`) VALUES
(3, 31),
(5, 36),
(5, 37),
(11, 20),
(11, 39);

-- --------------------------------------------------------

--
-- Table structure for table `area_interesse_clientes`
--

CREATE TABLE `area_interesse_clientes` (
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_AREAINTERESSE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `campanhas`
--

CREATE TABLE `campanhas` (
  `ID_CAMPANHA` int(11) NOT NULL,
  `ID_ESTABELECIMENTO` int(11) NOT NULL,
  `FILENAME_LOGOTIPO_CAMPANHA` text,
  `DESCRICAO_CAMPANHA` text NOT NULL,
  `NOTIFICACAO_CAMPANHA` tinyint(1) NOT NULL,
  `DATA_INICIO_CAMPANHA` date NOT NULL,
  `DATA_FIM_CAMPANHA` date DEFAULT NULL,
  `NOME_CAMPANHA` longtext NOT NULL,
  `ESTADO_PUBLICACAO_CAMPANHA` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campanhas`
--

INSERT INTO `campanhas` (`ID_CAMPANHA`, `ID_ESTABELECIMENTO`, `FILENAME_LOGOTIPO_CAMPANHA`, `DESCRICAO_CAMPANHA`, `NOTIFICACAO_CAMPANHA`, `DATA_INICIO_CAMPANHA`, `DATA_FIM_CAMPANHA`, `NOME_CAMPANHA`, `ESTADO_PUBLICACAO_CAMPANHA`) VALUES
(19, 2, 'e813b8864d076f7504fc65b988930f68.jpg', 'Desconto aplicado a todos os produtos de higiene durante o período de 10 a 13 de Julho. ', 0, '2019-07-10', '2019-07-14', '15% Desconto em todos os produtos de higiene', 0),
(20, 1, '73a9fbda593cf371d68d6f0e6c05cb8d.jpg', ' Desconto aplicado a todos os produtos de higiene durante o período de 10 a 13 de Julho. ', 0, '2019-07-05', '2019-07-14', '15% Desconto em todos os produtos de higiene', 1),
(31, 1, '3ebf04ff0d23a27cf29cd2e60a569201.png', ' Desconto de 10% em todos os telemóveis disponíveis na loja.', 0, '2019-06-02', '2019-10-04', '10% em todos os telemoveis', 1),
(32, 2, 'e813b8864d076f7504fc65b988930f68.jpg', 'Descontos em compras superiores a 100€.', 0, '2019-07-10', '2019-07-07', 'Descontos Exclusivos', 0),
(33, 3, '4ee8a299404457fca37c8a7e7f43cc67.jpg', 'Pontos a dobraar!', 0, '2019-07-15', '2019-07-31', 'Pontos loucos', 1),
(34, 4, 'e813b8864d076f7504fc65b988930f68.jpg', 'Cada euro que gastar ganha 1 ponto', 0, '2019-07-01', '2019-07-25', 'venha ganhar pontos!', 1),
(36, 1, '4e6e1e2f7cd0a53a9457b6d87bfd6dd1.jpg', 'Venha aproveitar a nossa promoção de 30% em todas as especiarias', 0, '2019-07-08', '2019-07-10', '30% Desconto em todas as especiarias', 0),
(37, 13, 'bad02fafa8bfaea327c2d69de9a1e83b.jpg', ' Venha comer a melhor pizza de Viseu', 0, '2019-07-10', '2019-07-21', 'Oferta de 15% em todas as pizzas familiares', 1),
(39, 5, 'f3e6d68ea37f5c2184ca9e96c378fcac.jpg', ' Aplicável a todos os produtos em stock', 0, '2019-07-14', '2019-07-22', 'Leve 2 Pague 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cartoes`
--

CREATE TABLE `cartoes` (
  `ID_CARTAO` int(11) NOT NULL,
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_ESTABELECIMENTO` int(11) NOT NULL,
  `PONTOS_CARTAO` int(11) DEFAULT NULL,
  `NOTIFICACAO_ESTABELECIMENTO` tinyint(1) NOT NULL,
  `ESTADO_CARTAO` tinyint(1) DEFAULT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cartoes`
--

INSERT INTO `cartoes` (`ID_CARTAO`, `ID_CLIENTE`, `ID_ESTABELECIMENTO`, `PONTOS_CARTAO`, `NOTIFICACAO_ESTABELECIMENTO`, `ESTADO_CARTAO`, `date_creation`) VALUES
(22, 8, 1, 2, 1, NULL, '2019-07-01 17:35:03'),
(23, 9, 1, 6, 1, NULL, '2019-05-07 17:35:03'),
(25, 11, 1, 0, 1, NULL, '2019-07-14 14:28:59'),
(38, 13, 13, 0, 1, NULL, '2019-07-14 21:53:17'),
(39, 14, 13, 0, 1, NULL, '2019-07-14 22:08:37'),
(41, 14, 1, 20, 1, NULL, '2019-07-14 22:11:10'),
(42, 14, 1, 0, 1, NULL, '2019-07-14 22:11:11'),
(47, 10, 13, 0, 1, NULL, '2019-07-15 00:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `ID_CLIENTE` int(11) NOT NULL,
  `firebase_id` varchar(250) NOT NULL,
  `NOME_CLIENTE` text,
  `PASSWORD_CLIENTE` varchar(250) DEFAULT NULL,
  `EMAIL_CLIENTE` text,
  `TELEMOVEL_CLIENTE` int(11) DEFAULT NULL,
  `NIF_CLIENTE` int(11) DEFAULT NULL,
  `DATA_NASC_CLIENTE` date DEFAULT NULL,
  `SEXO_CLIENTE` char(1) DEFAULT NULL,
  `CIDADE_CLIENTE` text,
  `verification_key` varchar(250) DEFAULT NULL,
  `is_email_verified` enum('no','yes') DEFAULT NULL,
  `reset_password_key` varchar(250) DEFAULT NULL,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ESTADO_CLIENTE` tinyint(1) DEFAULT NULL,
  `NOTIFICACAO_EMAIL` int(11) NOT NULL,
  `NOTIFICACAO_APP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`ID_CLIENTE`, `firebase_id`, `NOME_CLIENTE`, `PASSWORD_CLIENTE`, `EMAIL_CLIENTE`, `TELEMOVEL_CLIENTE`, `NIF_CLIENTE`, `DATA_NASC_CLIENTE`, `SEXO_CLIENTE`, `CIDADE_CLIENTE`, `verification_key`, `is_email_verified`, `reset_password_key`, `date_creation`, `ESTADO_CLIENTE`, `NOTIFICACAO_EMAIL`, `NOTIFICACAO_APP`) VALUES
(8, '5zLGwhB4o6fY1nFDSlgVJdxLtGe2', 'João Aragão', NULL, 'jbdcaragao@gmail.com', 921345768, NULL, NULL, NULL, 'Bragança', NULL, NULL, NULL, '2019-02-13 14:46:54', NULL, 0, 0),
(9, '2sNeomIIdXQC56qbXS7BL9LEN0U2', 'Gonçalo ', NULL, NULL, 912346758, NULL, NULL, NULL, 'Viseu', NULL, NULL, NULL, '2019-03-13 15:05:57', NULL, 0, 0),
(10, '0syUwxshUPRypvato0ISzb0DLYk2', 'gonçalo neves', NULL, 'neves.goncaloscp9@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:12:15', NULL, 1, 1),
(11, 'VPI4aGtE9cT1eXDmqNEhU8HZVvO2', 'Teresa Neves', NULL, 'teresa.neves.1969@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:28:48', NULL, 0, 0),
(13, 'hhGYOY1ullXGvLosWP0A7RSvV963', 'Gonçalo ', NULL, 'goncalo.prazeres@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-14 20:27:35', NULL, 0, 0),
(14, '5Zet6SveM6QRJs10vNx1nAWUhz12', 'Eduardo Silva', NULL, 'edudanny99@outlook.pt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-14 22:08:28', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comerciantes`
--

CREATE TABLE `comerciantes` (
  `ID_COMERCIANTE` int(11) NOT NULL,
  `ID_ESTABELECIMENTO` int(11) DEFAULT NULL,
  `ID_ADMIN` int(11) DEFAULT NULL,
  `NOME_COMERCIANTE` text NOT NULL,
  `PASSWORD_COMERCIANTE` text NOT NULL,
  `EMAIL_COMERCIANTE` text NOT NULL,
  `TELEMOVEL_COMERCIANTE` int(11) DEFAULT NULL,
  `NIF_COMERCIANTE` int(11) DEFAULT NULL,
  `SEXO` int(11) DEFAULT NULL,
  `DATA_NASCIMENTO` date DEFAULT NULL,
  `ESTADO_COMERCIANTE` tinyint(1) DEFAULT '0',
  `verification_key` varchar(250) DEFAULT NULL,
  `is_email_verified` enum('no','yes') DEFAULT NULL,
  `reset_password_key` varchar(250) DEFAULT NULL,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comerciantes`
--

INSERT INTO `comerciantes` (`ID_COMERCIANTE`, `ID_ESTABELECIMENTO`, `ID_ADMIN`, `NOME_COMERCIANTE`, `PASSWORD_COMERCIANTE`, `EMAIL_COMERCIANTE`, `TELEMOVEL_COMERCIANTE`, `NIF_COMERCIANTE`, `SEXO`, `DATA_NASCIMENTO`, `ESTADO_COMERCIANTE`, `verification_key`, `is_email_verified`, `reset_password_key`, `date_creation`) VALUES
(1, 1, NULL, 'Gonçalo  Neves', 'b081e8e3db4106215ff8fe47c9026104', 'neves.goncaloscp9@gmail.com', 938117205, 871232123, 0, '1999-05-21', 1, '846f60e8b731e71943994410fc8dcaaf', 'yes', 'bb00bad803af32f97c1bbd89792991f2', '2019-02-08 16:26:31'),
(3, 5, NULL, 'Ana Santos', '2fe04e524ba40505a82e03a2819429cc', 'ansanttos99@hotmail.com', 969696969, 123456789, 1, '1999-12-04', 1, '8cefc1bf5d5baef57a44854606064a67', 'yes', '88de93adba45a1cc98df27d978ab76bd', '2019-01-09 21:35:28'),
(5, 7, NULL, 'Luís Ferro', '2fe04e524ba40505a82e03a2819429cc', 'lfaferro1@live.com.pt', 917381745, 273612831, 0, '1999-01-12', 1, 'c79df7510bb32235b302c6fd92786c2b', 'no', NULL, '2019-01-10 17:30:42'),
(9, 10, NULL, 'Maria Pereira', '2fe04e524ba40505a82e03a2819429cc', 'doxis6000@hotmail.com', 925214054, 999999999, 1, '1994-01-04', 1, '67c9fb5d90e38a140d612dd558b97f59', 'yes', '07dba8d15e7b8932a9be750503b668c3', '2019-02-12 20:45:45'),
(12, 13, NULL, 'Emanuel Lopes', '2fe04e524ba40505a82e03a2819429cc', 'leoname123@hotmail.com', 920000000, 211548796, 0, '1997-11-05', 1, 'f4b7d8a4e42978c77d871f57b81e2cb0', 'yes', 'aff41a4c8e3df737792b6bc9d66f4ab8', '2019-01-13 22:13:32'),
(14, 15, NULL, 'Francisco Lopes', '2fe04e524ba40505a82e03a2819429cc', 'franciscolopes2000@hotmail.com', 925359117, 123456789, 0, '2000-07-21', 2, '3c23e37767065a1e7a2353ce466f2f2d', 'yes', NULL, '2019-02-14 21:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `empregados`
--

CREATE TABLE `empregados` (
  `ID_EMPREGADO` int(11) NOT NULL,
  `ID_ESTABELECIMENTO` int(11) NOT NULL,
  `TIPO_EMPREGADO` varchar(250) NOT NULL,
  `NOME_EMPREGADO` text NOT NULL,
  `PASSWORD_EMPREGADO` text,
  `EMAIL_EMPREGADO` text,
  `DATA_NASC_EMPREGADO` date DEFAULT NULL,
  `SEXO_EMPREGADO` varchar(50) DEFAULT NULL,
  `CIDADE_EMPREGADO` text,
  `ESTADO_EMPREGADO` tinyint(1) DEFAULT '0',
  `creation_key` varchar(250) DEFAULT NULL,
  `verification_key` varchar(250) DEFAULT NULL,
  `reset_password_key` varchar(250) DEFAULT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empregados`
--

INSERT INTO `empregados` (`ID_EMPREGADO`, `ID_ESTABELECIMENTO`, `TIPO_EMPREGADO`, `NOME_EMPREGADO`, `PASSWORD_EMPREGADO`, `EMAIL_EMPREGADO`, `DATA_NASC_EMPREGADO`, `SEXO_EMPREGADO`, `CIDADE_EMPREGADO`, `ESTADO_EMPREGADO`, `creation_key`, `verification_key`, `reset_password_key`, `date_creation`) VALUES
(2, 5, 'Atendedor de Balcão', 'Daniel', NULL, 'daniel@gmail.com', NULL, NULL, NULL, 0, '86b99c10eb35e8cac67ab00645a38306', NULL, NULL, '2019-07-09 20:43:36'),
(3, 5, 'Gestor de armazém', 'Eduardo', '2fe04e524ba40505a82e03a2819429cc', 'edudanny99@outlook.pt', '1999-05-17', 'Outro', 'Santo Tirso', 1, '138c023fdff5bd1d46e8e1028962ed11', NULL, NULL, '2019-07-09 20:47:18'),
(4, 10, 'Gerente', 'Pedro de Matos', '9cdfb439c7876e703e307864c9167a15', 'pedro.afonsom@hotmail.com', '1993-03-20', 'Masculino', 'Viseu', 1, '29c3ce4d44cba0b36eea77cff8791be9', NULL, NULL, '2019-07-12 21:50:29'),
(13, 1, 'chefe supremo', 'Gonçalo', 'b081e8e3db4106215ff8fe47c9026104', 'prazerescoz@hotmail.com', '2000-12-02', 'Masculino', 'Vale de Cambra', 1, 'fb6508c80f96ad42e56fdd362a75a7d2', NULL, '11be79ead1472607730c1d6b0ed1e5bf', '2019-07-13 17:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `estabelecimento`
--

CREATE TABLE `estabelecimento` (
  `ID_ESTABELECIMENTO` int(11) NOT NULL,
  `NOME_ESTABELECIMENTO` longtext NOT NULL,
  `CIDADE_ESTABELECIMENTO` varchar(250) NOT NULL,
  `MORADA_ESTABELECIMENTO` longtext NOT NULL,
  `LAT` text,
  `LON` text,
  `CODIGO_POSTAL_ESTABELECIMENTO` longtext NOT NULL,
  `FILENAME_COMPROVATIVO` varchar(100) DEFAULT NULL,
  `FILENAME_LOGOTIPO` varchar(100) DEFAULT NULL,
  `DESCRICAO_ESTABELECIMENTO` longtext,
  `ganhar_pontos` double DEFAULT NULL,
  `usar_pontos` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estabelecimento`
--

INSERT INTO `estabelecimento` (`ID_ESTABELECIMENTO`, `NOME_ESTABELECIMENTO`, `CIDADE_ESTABELECIMENTO`, `MORADA_ESTABELECIMENTO`, `LAT`, `LON`, `CODIGO_POSTAL_ESTABELECIMENTO`, `FILENAME_COMPROVATIVO`, `FILENAME_LOGOTIPO`, `DESCRICAO_ESTABELECIMENTO`, `ganhar_pontos`, `usar_pontos`) VALUES
(1, 'Mercearia do Gonçalo', 'Viseu', 'Rua do Gonçalo, Porta Nº25', '40.646686', '-7.9218798', '3505-000', 'b650e206e55fdbc7a5804eb4c8d76091.pdf', '37c5aa8b922b8fb61a1dab01f4a21a16.png', 'Loja com bons preços e bom estacionamento. Com diversidade de produtos.', 1, 0.5),
(2, 'Litradas Bar', 'Viseu', 'Rua do Joao, Porta Nº30', '40.6458933', '-7.9204761', '3505-000', 'b650e206e55fdbc7a5804eb4c8d76091.pdf', 'd302d8ece41e6edfd1adda8f715ec1fa.png', 'Aderiu ao ALLINONEWALLET - Bar', 1, 0.5),
(3, 'McDonald´´s', 'Viseu', 'Rua do mc, Porta Nº30', '40.6459133', '-7.927069', '3505-000', 'b650e206e55fdbc7a5804eb4c8d76091.pdf', 'd302d8ece41e6edfd1ajhgrte8f715ec1fa.png', 'Aderiu ao ALLINONEWALLET - Restaurante', 1, 0.5),
(5, 'Farmácia do Bairro', 'Viseu', 'Rua da Farmácia, Nr 23', NULL, NULL, '3505-678', '6c3f1c067949c0a2bb28bbc5cabfecf7.jpg', '160c81579803f70a49a7ede2c8386c8f.png', 'Farmácia', 1, 0.5),
(7, 'Quiosque do Luís', 'Viseu', 'Rua do Luís , Lote 10', NULL, NULL, '3505-555', '79c2bbfc4550e84fa071675e2ed7f453.pdf', 'c9cc879ce8779e857458f2b446b5c4bd.png', 'Quiosque com bons preços, venha visitar-nos!', 0.5, 0.2),
(10, 'ocasioes & oportunidades', 'Viseu', 'rua de viseu', NULL, NULL, '3515-888', '746850b75e23637036d09c9cdd4906ac.pdf', '18c0b32df634550a59060e933be5f2c9.jpg', 'boas roupas', 1, 1),
(13, 'Mimos Pizza', 'Viseu', 'Av. Antonio Jose de Almeida', NULL, NULL, '3505-539', '3890f3ae275c5f17bdfc67dfb503f56d.jpg', 'dd189880e94197fed335def4c1f4fc97.jpg', 'Restaurante de qualidade', 1, 0.7),
(14, 'Café da Esquina', 'Viseu', 'Rua Sra. da Paz, nº5, Pinheiro, Santos Evos', NULL, NULL, '3505-288', '1b480a9841aa7c2fdc31252480487880.jpg', 'c2be6356958c778a5d0a2a669b4e6104.jpg', 'Café ', 2, 1),
(15, 'Pix', 'Viseu', 'Rua Sra. da Paz, nº5', NULL, NULL, '3505-288', '9ff42d2b5a522fb40436108c107c65d7.pdf', '8d7306f7a1983c9e9ed1ffac61acb7a1.jpg', 'Muito boa', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Estabelecimento_AreaInteresse`
--

CREATE TABLE `Estabelecimento_AreaInteresse` (
  `ID_AREAINTERESSE` int(11) NOT NULL,
  `ID_ESTABELECIMENTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Estabelecimento_AreaInteresse`
--

INSERT INTO `Estabelecimento_AreaInteresse` (`ID_AREAINTERESSE`, `ID_ESTABELECIMENTO`) VALUES
(5, 1),
(6, 2),
(8, 2),
(11, 5),
(8, 7),
(14, 7),
(15, 10),
(5, 13),
(4, 14),
(7, 15);

-- --------------------------------------------------------

--
-- Table structure for table `ESTABELECIMENTO_PLANO`
--

CREATE TABLE `ESTABELECIMENTO_PLANO` (
  `ID_PLANO` int(11) NOT NULL,
  `ID_ESTABELECIMENTO` int(11) NOT NULL,
  `DATA_AQUISICAO_PLANO` datetime DEFAULT CURRENT_TIMESTAMP,
  `DATA_EXPIRACAO_PLANO` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ESTABELECIMENTO_PLANO`
--

INSERT INTO `ESTABELECIMENTO_PLANO` (`ID_PLANO`, `ID_ESTABELECIMENTO`, `DATA_AQUISICAO_PLANO`, `DATA_EXPIRACAO_PLANO`) VALUES
(1, 2, '2019-07-08 14:14:19', '2019-07-17 00:00:00'),
(2, 3, '2019-07-08 14:15:04', '2019-07-25 00:00:00'),
(2, 13, '2019-07-14 22:50:36', '2019-08-13 22:50:36'),
(3, 1, '2019-07-13 19:01:06', '2019-08-12 19:01:06'),
(3, 10, '2019-07-12 21:16:21', '2019-08-11 21:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `notificacoes`
--

CREATE TABLE `notificacoes` (
  `ID_NOTIFICACAO` int(11) NOT NULL,
  `ID_COMERCIANTE` int(11) NOT NULL,
  `TITULO_NOTIFICACAO` text NOT NULL,
  `DESCRICAO_NOTIFICACAO` text NOT NULL,
  `DATA_NOTIFICACAO` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plano`
--

CREATE TABLE `plano` (
  `ID_PLANO` int(11) NOT NULL,
  `NOME_PLANO` longtext NOT NULL,
  `PRECO_PLANO` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plano`
--

INSERT INTO `plano` (`ID_PLANO`, `NOME_PLANO`, `PRECO_PLANO`) VALUES
(1, 'Free', 0.00),
(2, 'PRO', 9.99),
(3, 'PREMIUM', 14.99);

-- --------------------------------------------------------

--
-- Table structure for table `transacoes`
--

CREATE TABLE `transacoes` (
  `ID_TRANSACAO` int(11) NOT NULL,
  `ID_CARTAO` int(11) NOT NULL,
  `DATA_TRANSACAO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `VALOR_TRANSACAO` double NOT NULL,
  `PONTOS_GANHOS` int(11) DEFAULT NULL,
  `PONTOS_DESCONTADOS` int(11) NOT NULL,
  `NOME_RESPONSAVEL` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transacoes`
--

INSERT INTO `transacoes` (`ID_TRANSACAO`, `ID_CARTAO`, `DATA_TRANSACAO`, `VALOR_TRANSACAO`, `PONTOS_GANHOS`, `PONTOS_DESCONTADOS`, `NOME_RESPONSAVEL`) VALUES
(49, 41, '2019-07-15 01:50:29', 10, 10, 0, 'Gonçalo  Neves'),
(50, 41, '2019-07-15 01:50:39', 10, 10, 0, 'Gonçalo  Neves');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indexes for table `aprovacao`
--
ALTER TABLE `aprovacao`
  ADD PRIMARY KEY (`ID_APROVACAO`),
  ADD KEY `FK_ADMIN_REALIZA_APROVACAO` (`ID_ADMIN`),
  ADD KEY `FK_COMERCIANTE_SUBMETE_APROVACAO` (`ID_COMERCIANTE`);

--
-- Indexes for table `area_interesse`
--
ALTER TABLE `area_interesse`
  ADD PRIMARY KEY (`ID_AREAINTERESSE`);

--
-- Indexes for table `area_interesse_campanhas`
--
ALTER TABLE `area_interesse_campanhas`
  ADD PRIMARY KEY (`ID_AREAINTERESSE`,`ID_CAMPANHA`),
  ADD KEY `ID_COMERCIANTE` (`ID_AREAINTERESSE`,`ID_CAMPANHA`),
  ADD KEY `ID_AREAINTERESSE` (`ID_AREAINTERESSE`),
  ADD KEY `FK_ID_CAMPANHA` (`ID_CAMPANHA`);

--
-- Indexes for table `area_interesse_clientes`
--
ALTER TABLE `area_interesse_clientes`
  ADD PRIMARY KEY (`ID_CLIENTE`,`ID_AREAINTERESSE`),
  ADD KEY `FK_AREA_INTERESSE_CLIENTES2` (`ID_AREAINTERESSE`);

--
-- Indexes for table `campanhas`
--
ALTER TABLE `campanhas`
  ADD PRIMARY KEY (`ID_CAMPANHA`),
  ADD KEY `ID_ESTABELECIMENTO` (`ID_ESTABELECIMENTO`);

--
-- Indexes for table `cartoes`
--
ALTER TABLE `cartoes`
  ADD PRIMARY KEY (`ID_CARTAO`),
  ADD KEY `FK_TEM_CLIENTE` (`ID_CLIENTE`),
  ADD KEY `ID_ESTABELECIMENTO` (`ID_ESTABELECIMENTO`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID_CLIENTE`);

--
-- Indexes for table `comerciantes`
--
ALTER TABLE `comerciantes`
  ADD PRIMARY KEY (`ID_COMERCIANTE`),
  ADD KEY `FK_TEM_ESTABELECIMENTO` (`ID_ESTABELECIMENTO`),
  ADD KEY `FK_VERIFICACOMERCIANTE` (`ID_ADMIN`);

--
-- Indexes for table `empregados`
--
ALTER TABLE `empregados`
  ADD PRIMARY KEY (`ID_EMPREGADO`),
  ADD KEY `ID_ESTABELECIMENTO` (`ID_ESTABELECIMENTO`);

--
-- Indexes for table `estabelecimento`
--
ALTER TABLE `estabelecimento`
  ADD PRIMARY KEY (`ID_ESTABELECIMENTO`);

--
-- Indexes for table `Estabelecimento_AreaInteresse`
--
ALTER TABLE `Estabelecimento_AreaInteresse`
  ADD PRIMARY KEY (`ID_AREAINTERESSE`,`ID_ESTABELECIMENTO`),
  ADD KEY `ID_ESTABELECIMENTO` (`ID_ESTABELECIMENTO`);

--
-- Indexes for table `ESTABELECIMENTO_PLANO`
--
ALTER TABLE `ESTABELECIMENTO_PLANO`
  ADD PRIMARY KEY (`ID_PLANO`,`ID_ESTABELECIMENTO`),
  ADD KEY `FK_ASSOCIATION_2` (`ID_ESTABELECIMENTO`);

--
-- Indexes for table `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`ID_NOTIFICACAO`),
  ADD KEY `FK_CRIANOTIFICACAO` (`ID_COMERCIANTE`);

--
-- Indexes for table `plano`
--
ALTER TABLE `plano`
  ADD PRIMARY KEY (`ID_PLANO`);

--
-- Indexes for table `transacoes`
--
ALTER TABLE `transacoes`
  ADD PRIMARY KEY (`ID_TRANSACAO`),
  ADD KEY `FK_TEM_TRANSACOES` (`ID_CARTAO`),
  ADD KEY `ID_CARTAO` (`ID_CARTAO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `aprovacao`
--
ALTER TABLE `aprovacao`
  MODIFY `ID_APROVACAO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `area_interesse`
--
ALTER TABLE `area_interesse`
  MODIFY `ID_AREAINTERESSE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `area_interesse_clientes`
--
ALTER TABLE `area_interesse_clientes`
  MODIFY `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `campanhas`
--
ALTER TABLE `campanhas`
  MODIFY `ID_CAMPANHA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `cartoes`
--
ALTER TABLE `cartoes`
  MODIFY `ID_CARTAO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `comerciantes`
--
ALTER TABLE `comerciantes`
  MODIFY `ID_COMERCIANTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `empregados`
--
ALTER TABLE `empregados`
  MODIFY `ID_EMPREGADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `estabelecimento`
--
ALTER TABLE `estabelecimento`
  MODIFY `ID_ESTABELECIMENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ESTABELECIMENTO_PLANO`
--
ALTER TABLE `ESTABELECIMENTO_PLANO`
  MODIFY `ID_PLANO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `ID_NOTIFICACAO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `plano`
--
ALTER TABLE `plano`
  MODIFY `ID_PLANO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transacoes`
--
ALTER TABLE `transacoes`
  MODIFY `ID_TRANSACAO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `aprovacao`
--
ALTER TABLE `aprovacao`
  ADD CONSTRAINT `FK_ADMIN_REALIZA_APROVACAO` FOREIGN KEY (`ID_ADMIN`) REFERENCES `administradores` (`ID_ADMIN`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_COMERCIANTE_SUBMETE_APROVACAO` FOREIGN KEY (`ID_COMERCIANTE`) REFERENCES `comerciantes` (`ID_COMERCIANTE`) ON DELETE CASCADE;

--
-- Constraints for table `area_interesse_campanhas`
--
ALTER TABLE `area_interesse_campanhas`
  ADD CONSTRAINT `FK_AREAINTERESSE` FOREIGN KEY (`ID_AREAINTERESSE`) REFERENCES `area_interesse` (`ID_AREAINTERESSE`),
  ADD CONSTRAINT `FK_ID_CAMPANHA` FOREIGN KEY (`ID_CAMPANHA`) REFERENCES `campanhas` (`ID_CAMPANHA`) ON DELETE CASCADE;

--
-- Constraints for table `area_interesse_clientes`
--
ALTER TABLE `area_interesse_clientes`
  ADD CONSTRAINT `FK_AREA_INTERESSE_CLIENTES` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `clientes` (`ID_CLIENTE`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_AREA_INTERESSE_CLIENTES2` FOREIGN KEY (`ID_AREAINTERESSE`) REFERENCES `area_interesse` (`ID_AREAINTERESSE`);

--
-- Constraints for table `cartoes`
--
ALTER TABLE `cartoes`
  ADD CONSTRAINT `FK_ID_ESTABELECIMENTO_` FOREIGN KEY (`ID_ESTABELECIMENTO`) REFERENCES `estabelecimento` (`ID_ESTABELECIMENTO`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_TEM_CLIENTE` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `clientes` (`ID_CLIENTE`) ON DELETE CASCADE;

--
-- Constraints for table `comerciantes`
--
ALTER TABLE `comerciantes`
  ADD CONSTRAINT `FK_TEM_ESTABELECIMENTO` FOREIGN KEY (`ID_ESTABELECIMENTO`) REFERENCES `estabelecimento` (`ID_ESTABELECIMENTO`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_VERIFICACOMERCIANTE` FOREIGN KEY (`ID_ADMIN`) REFERENCES `administradores` (`ID_ADMIN`) ON DELETE CASCADE;

--
-- Constraints for table `empregados`
--
ALTER TABLE `empregados`
  ADD CONSTRAINT `FK_ID_ESTABELECIMENTO` FOREIGN KEY (`ID_ESTABELECIMENTO`) REFERENCES `estabelecimento` (`ID_ESTABELECIMENTO`);

--
-- Constraints for table `Estabelecimento_AreaInteresse`
--
ALTER TABLE `Estabelecimento_AreaInteresse`
  ADD CONSTRAINT `FK_COMERCIANTE_Estabelecimento_AreaInteresse` FOREIGN KEY (`ID_AREAINTERESSE`) REFERENCES `area_interesse` (`ID_AREAINTERESSE`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ESTABELECIMENTO_Estabelecimento_AreaInteresse` FOREIGN KEY (`ID_ESTABELECIMENTO`) REFERENCES `estabelecimento` (`ID_ESTABELECIMENTO`) ON DELETE CASCADE;

--
-- Constraints for table `ESTABELECIMENTO_PLANO`
--
ALTER TABLE `ESTABELECIMENTO_PLANO`
  ADD CONSTRAINT `FK_ASSOCIATION_1` FOREIGN KEY (`ID_PLANO`) REFERENCES `plano` (`ID_PLANO`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ASSOCIATION_2` FOREIGN KEY (`ID_ESTABELECIMENTO`) REFERENCES `estabelecimento` (`ID_ESTABELECIMENTO`) ON DELETE CASCADE;

--
-- Constraints for table `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD CONSTRAINT `FK_CRIANOTIFICACAO` FOREIGN KEY (`ID_COMERCIANTE`) REFERENCES `comerciantes` (`ID_COMERCIANTE`) ON DELETE CASCADE;

--
-- Constraints for table `transacoes`
--
ALTER TABLE `transacoes`
  ADD CONSTRAINT `FK_TRANSACAO_CARTAO` FOREIGN KEY (`ID_CARTAO`) REFERENCES `cartoes` (`ID_CARTAO`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
