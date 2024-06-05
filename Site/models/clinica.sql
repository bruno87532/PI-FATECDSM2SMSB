-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/06/2024 às 02:03
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco`
--
CREATE DATABASE IF NOT EXISTS `banco` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `banco`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `conta`
--

CREATE TABLE `conta` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `saldo` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `conta`
--

INSERT INTO `conta` (`id`, `descricao`, `saldo`) VALUES
(1, 'Conta A', 800.00),
(2, 'Conta B', 700.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `conta`
--
ALTER TABLE `conta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Banco de dados: `clinica`
--
CREATE DATABASE IF NOT EXISTS `clinica` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `clinica`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `statusC` char(1) DEFAULT NULL,
  `id_medico` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `horarioInicio` time NOT NULL,
  `horarioFim` time NOT NULL,
  `diagnostico` varchar(255) DEFAULT NULL,
  `tratamento` varchar(255) DEFAULT NULL,
  `valor` double NOT NULL,
  `dataC` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` int(11) NOT NULL,
  `cep` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numeroCasa` varchar(10) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `cep`, `estado`, `cidade`, `bairro`, `rua`, `numeroCasa`, `complemento`) VALUES
(72, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(73, 13610827, 'SP', 'Leme', 'Jardim do sol', 'Maria Fercem', '232', 'bloco 8 ap 104'),
(74, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Otávio Habbermann', '232', NULL),
(75, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(76, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(77, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(78, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(79, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(80, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(81, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(82, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(83, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(84, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(85, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(86, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(87, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(88, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(89, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(90, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(91, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(92, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(93, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(94, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(95, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(96, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(97, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(98, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(99, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(100, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(101, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(102, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(103, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(104, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(105, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(106, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(107, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
(108, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `ID` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `dataInicio` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `horarioInicio` time NOT NULL,
  `nascimento` date NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `horarioFim` time NOT NULL,
  `genero` char(1) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`ID`, `id_endereco`, `cargo`, `nome`, `dataInicio`, `email`, `cpf`, `horarioInicio`, `nascimento`, `telefone`, `horarioFim`, `genero`, `senha`) VALUES
(1, 73, 'Balconista', 'Bruno Henrique Guinerio', '2024-06-01', 'brunoguinerio@gmail.com', '51364755874', '09:00:00', '2003-04-12', '19982869853', '18:00:00', 'M', '123456789');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medicos`
--

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nascimento` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `crm` varchar(20) NOT NULL,
  `disponibilidadeInicio` time NOT NULL,
  `disponibilidadeFim` time NOT NULL,
  `genero` char(1) NOT NULL,
  `especialidade` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medicos`
--

INSERT INTO `medicos` (`id`, `id_endereco`, `id_funcionario`, `cpf`, `nome`, `nascimento`, `email`, `telefone`, `crm`, `disponibilidadeInicio`, `disponibilidadeFim`, `genero`, `especialidade`, `senha`) VALUES
(1, 78, 1, '51364755874', 'Bruno Henrique Guinerio', '2003-04-12', 'brunoguinerio1204@gmail.com', '19982869853', '0', '00:39:00', '22:38:00', 'M', 'Medico', '$2y$10$e/eMiG23Jtlu0UiGBRHDTOr0IjodYZKUnJQwVFW3qgEt81b/Zhcm.'),
(2, 79, 1, '740.515.060', 'Bruno Henrique Guinerio', '2003-04-12', 'brunoguinerio@gmail.com', '19982869853', 'CRM-RS54932', '00:39:00', '22:38:00', 'M', 'Medico', '$2y$10$9ieodOfnobFrYBVmuQPIIeKwImNh.bNercc7Efa3hN.kLpub7GOFy'),
(3, 81, 1, '858.491.710', 'Bruno Henrique Guinerio', '2003-04-12', 'brunoguinerio12@gmail.com', '19982869853', 'CRM-DF54321', '12:42:00', '20:42:00', 'M', 'Medico', '$2y$10$WHXtOtf6EZdFo.MJ2Xs1ledUqwiKTyKNxo9szF6MewgyYsD0/MyKy'),
(4, 83, 1, '219.417.990', 'Bruno Henrique Guinerio', '2003-04-12', 'brunoguinerio124@gmail.com', '19982869853', 'CRM-RJ54238', '09:00:00', '18:00:00', 'M', 'Ortopedista', '$2y$10$a7rS8VCdg7FX8ozwwykXc.BQWb7OKBHricsW5UPGh7udtIqXDdz0e'),
(6, 86, 1, '995.334.210', 'Bruno Henrique Guinerio', '2003-04-12', 'brunoguinerio1aaa4@gmail.com', '19982869853', 'CRM-RJ54271', '09:00:00', '18:00:00', 'M', 'Ortopedista', '$2y$10$yZBUsFAVwlN4Oc8QjEvtaOt3b2Jma9ZY3FJET6G0V2vM7DGFDzeFy'),
(7, 87, 1, '580.756.440', 'Gabriel Cardoso Schhranck', '2024-06-02', 'gabrielschranck@gmail.com', '19989429974', 'CRM-DF50421', '19:00:00', '20:00:00', 'M', 'Ortopedista', '$2y$10$WYTZ/0ws8EV4Lhux2a9BN.gIj/jDvJLMNXgYQ665LaFexqDe4WPXm'),
(8, 104, 1, '417.977.370', 'Bruno Henrique Guinerio', '2003-04-12', 'testeeeeeeeeeeeeeee@gmail.com', '19982869853', 'CRM-RS54931', '00:17:00', '20:17:00', 'M', 'Testeree', '$2y$10$t4sWg.eAOe09h.nh73QvdORXLt4VvmI9XU8CoiKINfOSHPev/vnqO'),
(9, 105, 1, '120.258.280', 'Bruno Henrique Guinerio', '2003-04-12', 'brunsdaszgoguinerio@gmail.com', '19982869853', 'CRM-RS54930', '12:21:00', '12:21:00', 'M', 'medico', '$2y$10$pGWggnsVsPmc5MEEkd8LWOxCo18NOiVRlkeethX.RTuvNPg3Aw8KO'),
(10, 106, 1, '552.717.200', 'Bruno Guinerio', '2003-04-12', 'brunomedico@gmail.com', '19982869853', 'CRM-MG54321', '12:12:00', '12:12:00', 'M', 'Ortopedista', '$2y$10$LmvjJaZXo8sNBSurFknm..XZdYF30MTL27WjQtc4nccGAf1fSbmXK'),
(11, 108, 1, '948.583.240', 'Bruno Henrique Guinerio', '2003-04-12', 'brunomedicoteste@gmail.com', '19982869853', 'CRM-DF12385', '12:21:00', '12:01:00', 'M', 'Ortopedista', '$2y$10$R04hAuZ1dMK3KXMz26h1P.jwLFYe6A.Ahl7e4fFVTKBYqmQdnixHu');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nascimento` date NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `necessidadeEspecial` char(1) DEFAULT NULL,
  `necessidadeTipo` varchar(100) DEFAULT NULL,
  `genero` char(1) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `idoso` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `id_endereco`, `nome`, `cpf`, `nascimento`, `telefone`, `email`, `necessidadeEspecial`, `necessidadeTipo`, `genero`, `senha`, `idoso`) VALUES
(62, 72, 'Bruno Henrique Guinerio', '51364755874', '2003-04-12', '19982869853', 'brunoguinerio1204@gmail.com', '1', 'Aluno da Fatec', 'M', '$2y$10$IEyXlMpvkngAR2w1RX0/ru3jtaIUm7zYcOWmeMjQverkpsuCZ3ZgK', NULL),
(63, 88, 'Matheus Henrique Batista de Lima Peixoto', '203.836.090', '2003-04-12', '19982869853', 'matheusdelima@gmail.com', '1', 'Fatec', 'M', '$2y$10$dRyglmntdbGCkD2Jte7/p.5T.WvrhTCNehWmrpkGO3LCtefPIq4ey', NULL),
(64, 89, 'Bruno Henrique Guinerio', '213.812.910', '2003-04-12', '19982869853', 'brunoguineri@gmail.com', NULL, NULL, 'M', '$2y$10$g8DBfpkbye3AzboUnurKNuIVOhpjHsoHlbJmUD14i9vstVF0G4Gb6', '1'),
(65, 92, 'Bruno Henrique Guinerio', '178.308.600', '2003-04-12', '19982869853', 'brunoguinerio120dgx4@gmail.com', NULL, NULL, 'M', '$2y$10$HVXCp0p5l9OOfCnIVAtYueKTXYWCfzpP9kXwtfC/giIBZRywAv33i', '1'),
(66, 93, 'Bruno Henrique Guinerio', '416.026.420', '2003-04-12', '19982869853', 'bruno@gmail.com', NULL, NULL, 'M', '$2y$10$tY9XReuk9W4HNH.nrFGbsODopD/dLUWSj4HSlVAAkSmmz5N.U9JmS', '1'),
(67, 94, 'Bruno Henrique Guinerio', '724.647.360', '2003-04-12', '19982869853', 'testeeeee@gmail.com', '1', 'testeee', 'M', '$2y$10$ASsbX22QKfvm5PHrl.qxX.FKwvkEe3KwT6LIBnHdUfAd63hbf6mO.', '1'),
(68, 96, 'testeeee', '280.173.990', '2003-04-12', '19841125444', 'testeeeeee@gmaill.com', NULL, NULL, 'M', '$2y$10$vLYqAnEW4FLwYo.M.INcS.P3wwVgd7mZrDPGlxDQTDcvcqRhVAFYG', '1'),
(69, 107, 'Bruno Henrique Guinerio', '044.565.020', '2003-04-12', '19982869853', 'brunopaciente@gmail.com', NULL, NULL, 'M', '$2y$10$0LylEl5VPcHhGqPM3doKWuCCs7kiWf1nnBReGGFro8WW1shF4GHRG', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_medico` (`id_medico`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Índices de tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `id_endereco` (`id_endereco`);

--
-- Índices de tabela `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `crm` (`crm`),
  ADD KEY `id_endereco` (`id_endereco`);

--
-- Índices de tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `id_endereco` (`id_endereco`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id`),
  ADD CONSTRAINT `consultas_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`id_endereco`) REFERENCES `enderecos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_ibfk_1` FOREIGN KEY (`id_endereco`) REFERENCES `enderecos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_endereco`) REFERENCES `enderecos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;