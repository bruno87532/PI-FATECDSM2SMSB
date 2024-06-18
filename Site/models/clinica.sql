-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para clinica
CREATE DATABASE IF NOT EXISTS `clinica` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `clinica`;

-- Copiando estrutura para procedure clinica.CalculaIntervalos
DELIMITER //
CREATE PROCEDURE `CalculaIntervalos`(horaInicio TIME, horaFim TIME, id int)
BEGIN
    DECLARE horas TIME;
    SET horas = horaInicio;
    DELETE FROM horariosMedicos;

    WHILE horas <= horaFim DO
        INSERT INTO horariosMedicos (horario, idMedico) VALUES (horas, id);
        SET horas = ADDTIME(horas, '00:30:00');
    END WHILE;
END//
DELIMITER ;

-- Copiando estrutura para tabela clinica.consultas
CREATE TABLE IF NOT EXISTS `consultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statusC` char(1) DEFAULT NULL,
  `id_medico` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `horarioInicio` time NOT NULL,
  `horarioFim` time NOT NULL,
  `diagnostico` varchar(255) DEFAULT NULL,
  `tratamento` varchar(255) DEFAULT NULL,
  `valor` double NOT NULL,
  `dataC` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_medico` (`id_medico`),
  KEY `id_paciente` (`id_paciente`),
  CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id`),
  CONSTRAINT `consultas_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela clinica.consultas: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela clinica.enderecos
CREATE TABLE IF NOT EXISTS `enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numeroCasa` varchar(10) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela clinica.enderecos: ~37 rows (aproximadamente)
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
	(108, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '232', NULL),
	(109, 13616, 'SP', 'Leme', 'Jardim Santana', 'Rua Doutor João F. Domenico Seródio', '425', NULL),
	(110, 13610827, 'SP', 'Leme', 'Jardim do Sol', 'Rua Maria Fercem', '123', 'Apto 1'),
	(111, 13611000, 'SP', 'Leme', 'Centro', 'Rua Doutor Armando de Salles Oliveira', '456', 'Casa'),
	(112, 13612250, 'SP', 'Leme', 'Centro', 'Rua João Pessoa', '789', 'Apto 2'),
	(113, 13613450, 'SP', 'Leme', 'Jardim Eloisa', 'Rua João XXIII', '101', 'Casa 1'),
	(114, 13615160, 'SP', 'Leme', 'Barra Funda', 'Rua Comendador Zuntini', '202', 'Casa 2'),
	(115, 13617330, 'SP', 'Leme', 'Jardim Nova Leme', 'Rua José Antunes', '303', 'Casa 3'),
	(116, 13617711, 'SP', 'Leme', 'Arcindo Rinaldi', 'Rua Arcindo Rinaldi', '404', 'Apto 4'),
	(117, 13617894, 'SP', 'Leme', 'Caju', 'Rua Coronel José Leme Franco', '505', 'Casa 4'),
	(118, 13600200, 'SP', 'Araras', 'Centro', 'Rua Tiradentes', '606', 'Apto 5'),
	(119, 13600340, 'SP', 'Araras', 'Centro', 'Rua Albino Cardoso', '707', 'Casa 5'),
	(120, 13635160, 'SP', 'Pirassununga', 'Centro', 'Rua Duque de Caxias', '808', 'Apto 6'),
	(121, 13630140, 'SP', 'Pirassununga', 'Jardim Carlos Gomes', 'Rua Joaquim Procópio de Araújo', '909', 'Casa 6'),
	(122, 13610440, 'SP', 'Leme', 'Vila Santucci', 'Rua Padre Julião', '1010', 'Apto 7'),
	(123, 13600270, 'SP', 'Araras', 'Parque Industrial', 'Rua Washington Luiz', '1111', 'Casa 7'),
	(124, 13630100, 'SP', 'Pirassununga', 'Vila Santa Fé', 'Rua Bom Jesus', '1212', 'Apto 8'),
	(125, 13610450, 'SP', 'Leme', 'Jardim Nova Era', 'Rua Francisco Munhoz', '1313', 'Casa 8'),
	(126, 13600280, 'SP', 'Araras', 'Jardim Santa Cruz', 'Rua Luís Carlos', '1414', 'Apto 9'),
	(127, 13630110, 'SP', 'Pirassununga', 'Vila São Pedro', 'Rua Dom Pedro II', '1515', 'Casa 9'),
	(128, 13610830, 'SP', 'Leme', 'Centro', 'Rua Capitão Brasiliano', '1616', 'Apto 10'),
	(129, 13600350, 'SP', 'Araras', 'Centro', 'Rua Marechal Deodoro', '1717', 'Casa 10'),
	(130, 13610900, 'SP', 'Leme', 'Jardim Eloisa', 'Rua Francisco Montoro', '1818', 'Apto 11'),
	(131, 13600360, 'SP', 'Araras', 'Centro', 'Rua Nunes Machado', '1919', 'Casa 11'),
	(132, 13610330, 'SP', 'Leme', 'Jardim Nova Leme', 'Rua Sebastião Pereira', '2020', 'Apto 12'),
	(133, 13600400, 'SP', 'Araras', 'Centro', 'Rua Júlio Mesquita', '2121', 'Casa 12'),
	(134, 13630150, 'SP', 'Pirassununga', 'Centro', 'Rua São João', '2222', 'Apto 13'),
	(135, 13610470, 'SP', 'Leme', 'Vila São João', 'Rua Benedito Antônio', '2323', 'Casa 13'),
	(136, 13600420, 'SP', 'Araras', 'Centro', 'Rua Dona Renata', '2424', 'Apto 14'),
	(137, 13611030, 'SP', 'Leme', 'Centro', 'Rua Coronel João Franco Mourão', '2525', 'Casa 14'),
	(138, 13600450, 'SP', 'Araras', 'Centro', 'Rua Brasil', '2626', 'Apto 15'),
	(139, 13630160, 'SP', 'Pirassununga', 'Centro', 'Rua XV de Novembro', '2727', 'Casa 15'),
	(140, 13600460, 'SP', 'Araras', 'Centro', 'Rua Prudente de Moraes', '2828', 'Apto 16'),
	(141, 13611040, 'SP', 'Leme', 'Centro', 'Rua Major Arthur Franco Mourão', '2929', 'Casa 16'),
	(142, 13600500, 'SP', 'Araras', 'Centro', 'Rua São Benedito', '3030', 'Apto 17'),
	(143, 13630170, 'SP', 'Pirassununga', 'Centro', 'Rua da Liberdade', '3131', 'Casa 17'),
	(144, 13600550, 'SP', 'Araras', 'Centro', 'Rua Visconde do Rio Branco', '3232', 'Apto 18'),
	(145, 13611050, 'SP', 'Leme', 'Centro', 'Rua João Mendes', '3333', 'Casa 18'),
	(146, 13600600, 'SP', 'Araras', 'Centro', 'Rua 9 de Julho', '3434', 'Apto 19'),
	(147, 13630180, 'SP', 'Pirassununga', 'Centro', 'Rua Sete de Setembro', '3535', 'Casa 19'),
	(148, 13600650, 'SP', 'Araras', 'Centro', 'Rua São Paulo', '3636', 'Apto 20'),
	(149, 13611060, 'SP', 'Leme', 'Centro', 'Rua Joaquim Mourão', '3737', 'Casa 20'),
	(150, 13600700, 'SP', 'Araras', 'Centro', 'Rua Dom Pedro', '3838', 'Apto 21'),
	(151, 13630190, 'SP', 'Pirassununga', 'Centro', 'Rua Três de Maio', '3939', 'Casa 21'),
	(152, 13600750, 'SP', 'Araras', 'Centro', 'Rua Coronel Justiniano', '4040', 'Apto 22'),
	(153, 13611070, 'SP', 'Leme', 'Centro', 'Rua Antônio Mourão', '4141', 'Casa 22'),
	(154, 13600800, 'SP', 'Araras', 'Centro', 'Rua Tenente Corona', '4242', 'Apto 23'),
	(155, 13630200, 'SP', 'Pirassununga', 'Centro', 'Rua Nove de Julho', '4343', 'Casa 23'),
	(156, 13600850, 'SP', 'Araras', 'Centro', 'Rua Dom Bosco', '4444', 'Apto 24'),
	(157, 13611080, 'SP', 'Leme', 'Centro', 'Rua Conselheiro Antônio Prado', '4545', 'Casa 24');

-- Copiando estrutura para tabela clinica.funcionarios
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `id_endereco` (`id_endereco`),
  CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`id_endereco`) REFERENCES `enderecos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela clinica.funcionarios: ~0 rows (aproximadamente)
INSERT INTO `funcionarios` (`ID`, `id_endereco`, `cargo`, `nome`, `dataInicio`, `email`, `cpf`, `horarioInicio`, `nascimento`, `telefone`, `horarioFim`, `genero`, `senha`) VALUES
	(1, 73, 'Balconista', 'Bruno Henrique Guinerio', '2024-06-01', 'brunoguinerio@gmail.com', '51364755874', '09:00:00', '2003-04-12', '19982869853', '18:00:00', 'M', '123456789'),
	(2, 111, 'Recepcionista', 'Ana Clara Souza', '2021-01-10', 'ana.souza@clinicacampinas.com', '12345678901', '08:00:00', '1990-04-15', '19999990001', '17:00:00', 'F', 'senha123'),
	(3, 112, 'Enfermeira', 'Maria Fernanda Lima', '2020-02-15', 'maria.lima@clinicacampinas.com', '34567890123', '07:00:00', '1985-07-12', '19999990003', '16:00:00', 'F', 'senha789'),
	(4, 113, 'Recepcionista', 'João Pedro Silva', '2018-03-10', 'joao.silva@clinicacampinas.com', '45678901234', '10:00:00', '1992-11-25', '19999990004', '19:00:00', 'M', 'senha321'),
	(5, 114, 'Auxiliar Administrativo', 'Lucas Santos', '2017-05-20', 'lucas.santos@clinicacampinas.com', '56789012345', '08:00:00', '1993-08-30', '19999990005', '17:00:00', 'M', 'senha654'),
	(6, 115, 'Enfermeiro', 'Rafael Costa', '2020-12-12', 'rafael.costa@clinicacampinas.com', '78901234567', '07:00:00', '1989-03-20', '19999990007', '16:00:00', 'M', 'senha111'),
	(7, 116, 'Auxiliar de Limpeza', 'Claudia Martins', '2021-07-15', 'claudia.martins@clinicacampinas.com', '89012345678', '13:00:00', '1994-02-14', '19999990008', '22:00:00', 'F', 'senha222'),
	(8, 117, 'Técnico em Radiologia', 'Marcos Oliveira', '2018-11-11', 'marcos.oliveira@clinicacampinas.com', '90123456789', '08:00:00', '1986-01-05', '19999990009', '17:00:00', 'M', 'senha333'),
	(9, 118, 'Fisioterapeuta', 'Fernanda Batista', '2019-04-25', 'fernanda.batista@clinicacampinas.com', '01234567890', '09:00:00', '1991-12-01', '19999990010', '18:00:00', 'F', 'senha444'),
	(10, 119, 'Recepcionista', 'Mariana Rocha', '2021-01-10', 'mariana.rocha@clinicacampinas.com', '12345678911', '08:00:00', '1990-04-15', '19999990011', '17:00:00', 'F', 'senha555'),
	(11, 120, 'Enfermeira', 'Laura Nunes', '2020-02-15', 'laura.nunes@clinicacampinas.com', '34567890133', '07:00:00', '1985-07-12', '19999990013', '16:00:00', 'F', 'senha777'),
	(12, 121, 'Recepcionista', 'Felipe Lima', '2018-03-10', 'felipe.lima@clinicacampinas.com', '45678901244', '10:00:00', '1992-11-25', '19999990014', '19:00:00', 'M', 'senha888'),
	(13, 122, 'Auxiliar Administrativo', 'Juliana Carvalho', '2017-05-20', 'juliana.carvalho@clinicacampinas.com', '56789012355', '08:00:00', '1993-08-30', '19999990015', '17:00:00', 'F', 'senha999'),
	(14, 123, 'Enfermeiro', 'Thiago Costa', '2020-12-12', 'thiago.costa@clinicacampinas.com', '78901234577', '07:00:00', '1989-03-20', '19999990017', '16:00:00', 'M', 'senha2222'),
	(15, 124, 'Auxiliar de Limpeza', 'Patricia Santos', '2021-07-15', 'patricia.santos@clinicacampinas.com', '89012345688', '13:00:00', '1994-02-14', '19999990018', '22:00:00', 'F', 'senha3333'),
	(16, 125, 'Técnico em Radiologia', 'Ricardo Gomes', '2018-11-11', 'ricardo.gomes@clinicacampinas.com', '90123456799', '08:00:00', '1986-01-05', '19999990019', '17:00:00', 'M', 'senha4444'),
	(17, 126, 'Fisioterapeuta', 'Aline Castro', '2019-04-25', 'aline.castro@clinicacampinas.com', '01234567800', '09:00:00', '1991-12-01', '19999990020', '18:00:00', 'F', 'senha5555'),
	(18, 127, 'Recepcionista', 'Camila Fernandes', '2021-01-10', 'camila.fernandes@clinicacampinas.com', '12345678921', '08:00:00', '1990-04-15', '19999990021', '17:00:00', 'F', 'senha6666'),
	(19, 128, 'Enfermeira', 'Isabela Martins', '2020-02-15', 'isabela.martins@clinicacampinas.com', '34567890143', '07:00:00', '1985-07-12', '19999990023', '16:00:00', 'F', 'senha8888'),
	(20, 129, 'Recepcionista', 'Leonardo Silva', '2018-03-10', 'leonardo.silva@clinicacampinas.com', '45678901254', '10:00:00', '1992-11-25', '19999990024', '19:00:00', 'M', 'senha9999'),
	(21, 130, 'Auxiliar Administrativo', 'Lucas Souza', '2017-05-20', 'lucas.souza@clinicacampinas.com', '56789012365', '08:00:00', '1993-08-30', '19999990025', '17:00:00', 'M', 'senha1010'),
	(22, 131, 'Enfermeiro', 'Felipe Oliveira', '2020-12-12', 'felipe.oliveira@clinicacampinas.com', '78901234587', '07:00:00', '1989-03-20', '19999990027', '16:00:00', 'M', 'senha1122'),
	(23, 132, 'Auxiliar de Limpeza', 'Carla Ribeiro', '2021-07-15', 'carla.ribeiro@clinicacampinas.com', '89012345698', '13:00:00', '1994-02-14', '19999990028', '22:00:00', 'F', 'senha1212'),
	(24, 133, 'Técnico em Radiologia', 'Pedro Almeida', '2018-11-11', 'pedro.almeida@clinicacampinas.com', '90123456709', '08:00:00', '1986-01-05', '19999990029', '17:00:00', 'M', 'senha1313'),
	(25, 134, 'Fisioterapeuta', 'Renata Dias', '2019-04-25', 'renata.dias@clinicacampinas.com', '01234567819', '09:00:00', '1991-12-01', '19999990030', '18:00:00', 'F', 'senha1414'),
	(95, 135, 'Recepcionista', 'Gabriel Pereira', '2021-02-01', 'gabriel.pereira@clinicacampinas.com', '99823456014', '08:00:00', '1990-05-17', '19999990031', '17:00:00', 'M', 'senha1515'),
	(96, 136, 'Enfermeira', 'Carolina Alves', '2020-03-05', 'carolina.alves@clinicacampinas.com', '34956783012', '07:00:00', '1987-06-13', '19999990032', '16:00:00', 'F', 'senha1616'),
	(97, 137, 'Recepcionista', 'Rafael Santos', '2018-04-18', 'rafael.santos@clinicacampinas.com', '45798012345', '10:00:00', '1992-09-26', '19999990033', '19:00:00', 'M', 'senha1717'),
	(98, 138, 'Auxiliar Administrativo', 'Lucas Moreira', '2017-06-15', 'lucas.moreira@clinicacampinas.com', '56812345678', '08:00:00', '1993-10-30', '19999990034', '17:00:00', 'M', 'senha1818'),
	(99, 139, 'Enfermeiro', 'Pedro Fernandes', '2020-11-14', 'pedro.fernandes@clinicacampinas.com', '78965412390', '07:00:00', '1989-01-25', '19999990035', '16:00:00', 'M', 'senha1919'),
	(100, 140, 'Auxiliar de Limpeza', 'Juliana Oliveira', '2021-08-19', 'juliana.oliveira@clinicacampinas.com', '89034567812', '13:00:00', '1994-03-14', '19999990036', '22:00:00', 'F', 'senha2020'),
	(101, 141, 'Técnico em Radiologia', 'Mateus Araujo', '2018-12-22', 'mateus.araujo@clinicacampinas.com', '90156789012', '08:00:00', '1986-02-15', '19999990037', '17:00:00', 'M', 'senha2121'),
	(102, 142, 'Fisioterapeuta', 'Beatriz Ribeiro', '2019-05-30', 'beatriz.ribeiro@clinicacampinas.com', '01278901234', '09:00:00', '1991-11-19', '19999990038', '18:00:00', 'F', 'senha2222'),
	(103, 143, 'Recepcionista', 'Vinicius Castro', '2021-02-10', 'vinicius.castro@clinicacampinas.com', '12389012345', '08:00:00', '1990-06-21', '19999990039', '17:00:00', 'M', 'senha2323'),
	(104, 144, 'Enfermeira', 'Larissa Martins', '2020-04-25', 'larissa.martins@clinicacampinas.com', '34501234567', '07:00:00', '1987-08-12', '19999990040', '16:00:00', 'F', 'senha2424'),
	(105, 145, 'Recepcionista', 'Gustavo Lima', '2018-05-17', 'gustavo.lima@clinicacampinas.com', '45623456789', '10:00:00', '1992-12-11', '19999990041', '19:00:00', 'M', 'senha2525'),
	(106, 146, 'Auxiliar Administrativo', 'Alice Souza', '2017-07-18', 'alice.souza@clinicacampinas.com', '56745678901', '08:00:00', '1993-09-15', '19999990042', '17:00:00', 'F', 'senha2626'),
	(107, 147, 'Enfermeiro', 'Murilo Costa', '2020-10-20', 'murilo.costa@clinicacampinas.com', '78967890123', '07:00:00', '1989-04-23', '19999990043', '16:00:00', 'M', 'senha2727'),
	(108, 148, 'Auxiliar de Limpeza', 'Daniela Gomes', '2021-09-11', 'daniela.gomes@clinicacampinas.com', '89078901234', '13:00:00', '1994-05-12', '19999990044', '22:00:00', 'F', 'senha2828'),
	(109, 149, 'Técnico em Radiologia', 'Thiago Almeida', '2018-11-27', 'thiago.almeida@clinicacampinas.com', '90189012345', '08:00:00', '1986-03-01', '19999990045', '17:00:00', 'M', 'senha2929'),
	(110, 150, 'Fisioterapeuta', 'Bianca Nunes', '2019-06-21', 'bianca.nunes@clinicacampinas.com', '01290123456', '09:00:00', '1991-07-31', '19999990046', '18:00:00', 'F', 'senha3030'),
	(111, 151, 'Recepcionista', 'Lucas Vieira', '2021-02-15', 'lucas.vieira@clinicacampinas.com', '12345678909', '08:00:00', '1990-08-18', '19999990047', '17:00:00', 'M', 'senha3131'),
	(112, 152, 'Enfermeira', 'Mariana Azevedo', '2020-05-28', 'mariana.azevedo@clinicacampinas.com', '34567890111', '07:00:00', '1987-09-14', '19999990048', '16:00:00', 'F', 'senha3232'),
	(113, 153, 'Recepcionista', 'Rodrigo Sousa', '2018-06-19', 'rodrigo.sousa@clinicacampinas.com', '45678901222', '10:00:00', '1992-10-13', '19999990049', '19:00:00', 'M', 'senha3333'),
	(114, 154, 'Auxiliar Administrativo', 'Isabela Costa', '2017-08-23', 'isabela.costa@clinicacampinas.com', '56789012333', '08:00:00', '1993-06-18', '19999990050', '17:00:00', 'F', 'senha3434'),
	(115, 155, 'Enfermeiro', 'Victor Santos', '2020-09-30', 'victor.santos@clinicacampinas.com', '78901234544', '07:00:00', '1989-11-09', '19999990051', '16:00:00', 'M', 'senha3535'),
	(116, 156, 'Auxiliar de Limpeza', 'Fernanda Carvalho', '2021-10-05', 'fernanda.carvalho@clinicacampinas.com', '89012345655', '13:00:00', '1994-12-02', '19999990052', '22:00:00', 'F', 'senha3636'),
	(117, 157, 'Técnico em Radiologia', 'André Barbosa', '2018-12-15', 'andre.barbosa@clinicacampinas.com', '90123456766', '08:00:00', '1986-07-19', '19999990053', '17:00:00', 'M', 'senha3737');

-- Copiando estrutura para tabela clinica.horariosmedicos
CREATE TABLE IF NOT EXISTS `horariosmedicos` (
  `horario` time DEFAULT NULL,
  `idMedico` int(11) DEFAULT NULL,
  KEY `idMedico` (`idMedico`),
  CONSTRAINT `horariosmedicos_ibfk_1` FOREIGN KEY (`idMedico`) REFERENCES `medicos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela clinica.horariosmedicos: ~19 rows (aproximadamente)
INSERT INTO `horariosmedicos` (`horario`, `idMedico`) VALUES
	('09:00:00', 10),
	('09:30:00', 10),
	('10:00:00', 10),
	('10:30:00', 10),
	('11:00:00', 10),
	('11:30:00', 10),
	('12:00:00', 10),
	('12:30:00', 10),
	('13:00:00', 10),
	('13:30:00', 10),
	('14:00:00', 10),
	('14:30:00', 10),
	('15:00:00', 10),
	('15:30:00', 10),
	('16:00:00', 10),
	('16:30:00', 10),
	('17:00:00', 10),
	('17:30:00', 10),
	('18:00:00', 10);

-- Copiando estrutura para tabela clinica.medicos
CREATE TABLE IF NOT EXISTS `medicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `crm` (`crm`),
  KEY `id_endereco` (`id_endereco`),
  CONSTRAINT `medicos_ibfk_1` FOREIGN KEY (`id_endereco`) REFERENCES `enderecos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=605 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela clinica.medicos: ~10 rows (aproximadamente)
INSERT INTO `medicos` (`id`, `id_endereco`, `id_funcionario`, `cpf`, `nome`, `nascimento`, `email`, `telefone`, `crm`, `disponibilidadeInicio`, `disponibilidadeFim`, `genero`, `especialidade`, `senha`) VALUES
	(1, 78, 1, '51364755874', 'Bruno Henrique Guinerio', '2003-04-12', 'brunoguinerio1204@gmail.com', '19982869853', '0', '00:39:00', '22:38:00', 'M', 'Medico', '$2y$10$e/eMiG23Jtlu0UiGBRHDTOr0IjodYZKUnJQwVFW3qgEt81b/Zhcm.'),
	(2, 79, 1, '740.515.060', 'Bruno Henrique Guinerio', '2003-04-12', 'brunoguinerio@gmail.com', '19982869853', 'CRM-RS54932', '00:39:00', '22:38:00', 'M', 'Medico', '$2y$10$9ieodOfnobFrYBVmuQPIIeKwImNh.bNercc7Efa3hN.kLpub7GOFy'),
	(3, 81, 1, '858.491.710', 'Bruno Henrique Guinerio', '2003-04-12', 'brunoguinerio12@gmail.com', '19982869853', 'CRM-DF54321', '12:42:00', '20:42:00', 'M', 'Medico', '$2y$10$WHXtOtf6EZdFo.MJ2Xs1ledUqwiKTyKNxo9szF6MewgyYsD0/MyKy'),
	(4, 83, 1, '219.417.990', 'Bruno Henrique Guinerio', '2003-04-12', 'brunoguinerio124@gmail.com', '19982869853', 'CRM-RJ54238', '09:00:00', '18:00:00', 'M', 'Ortopedista', '$2y$10$a7rS8VCdg7FX8ozwwykXc.BQWb7OKBHricsW5UPGh7udtIqXDdz0e'),
	(6, 86, 1, '995.334.210', 'Bruno Henrique Guinerio', '2003-04-12', 'brunoguinerio1aaa4@gmail.com', '19982869853', 'CRM-RJ54271', '09:00:00', '18:00:00', 'M', 'Ortopedista', '$2y$10$yZBUsFAVwlN4Oc8QjEvtaOt3b2Jma9ZY3FJET6G0V2vM7DGFDzeFy'),
	(7, 87, 1, '580.756.440', 'Gabriel Cardoso Schhranck', '2024-06-02', 'gabrielschranck@gmail.com', '19989429974', 'CRM-DF50421', '19:00:00', '20:00:00', 'M', 'Ortopedista', '$2y$10$WYTZ/0ws8EV4Lhux2a9BN.gIj/jDvJLMNXgYQ665LaFexqDe4WPXm'),
	(8, 104, 1, '417.977.370', 'Bruno Henrique Guinerio', '2003-04-12', 'testeeeeeeeeeeeeeee@gmail.com', '19982869853', 'CRM-RS54931', '00:17:00', '20:17:00', 'M', 'Testeree', '$2y$10$t4sWg.eAOe09h.nh73QvdORXLt4VvmI9XU8CoiKINfOSHPev/vnqO'),
	(9, 105, 1, '120.258.280', 'Bruno Henrique Guinerio', '2003-04-12', 'brunsdaszgoguinerio@gmail.com', '19982869853', 'CRM-RS54930', '12:21:00', '12:21:00', 'M', 'medico', '$2y$10$pGWggnsVsPmc5MEEkd8LWOxCo18NOiVRlkeethX.RTuvNPg3Aw8KO'),
	(10, 106, 1, '552.717.200', 'Bruno Guinerio', '2003-04-12', 'brunomedico@gmail.com', '19982869853', 'CRM-MG54321', '09:00:00', '18:00:00', 'M', 'Nutricionista', '$2y$10$LmvjJaZXo8sNBSurFknm..XZdYF30MTL27WjQtc4nccGAf1fSbmXK'),
	(11, 108, 1, '948.583.240', 'Bruno Henrique Guinerio', '2003-04-12', 'brunomedicoteste@gmail.com', '19982869853', 'CRM-DF12385', '12:21:00', '12:01:00', 'M', 'Ortopedista', '$2y$10$R04hAuZ1dMK3KXMz26h1P.jwLFYe6A.Ahl7e4fFVTKBYqmQdnixHu'),
	(306, 137, 137, '56890345678', 'Laura Oliveira', '1991-08-10', 'laura.oliveira@clinicacampinas.com', '19999990033', 'CRM-SP26262', '08:00:00', '17:00:00', 'F', 'Dermatologia', 'senha1717'),
	(307, 138, 138, '67890123456', 'Diego Martins', '1988-07-02', 'diego.martins@clinicacampinas.com', '19999990034', 'CRM-SP27272', '07:00:00', '16:00:00', 'M', 'Oftalmologia', 'senha1818'),
	(308, 139, 139, '78901234567', 'Carolina Lima', '1995-04-15', 'carolina.lima@clinicacampinas.com', '19999990035', 'CRM-SP28282', '10:00:00', '19:00:00', 'F', 'Nutricionista', 'senha1919'),
	(309, 140, 140, '89012345678', 'Marcos Santos', '1987-03-20', 'marcos.santos@clinicacampinas.com', '19999990036', 'CRM-SP29292', '08:00:00', '17:00:00', 'M', 'Fisioterapia', 'senha2020'),
	(310, 141, 141, '90123456789', 'Juliana Costa', '1993-01-25', 'juliana.costa@clinicacampinas.com', '19999990037', 'CRM-SP30303', '07:00:00', '16:00:00', 'F', 'Psiquiatria', 'senha2121'),
	(311, 142, 142, '01234567890', 'Rodrigo Oliveira', '1990-11-10', 'rodrigo.oliveira@clinicacampinas.com', '19999990038', 'CRM-SP31313', '13:00:00', '22:00:00', 'M', 'Traumatologia', 'senha2222'),
	(312, 143, 143, '12345678901', 'Gabriela Silva', '1986-09-05', 'gabriela.silva@clinicacampinas.com', '19999990039', 'CRM-SP32323', '08:00:00', '17:00:00', 'F', 'Infectologia', 'senha2323'),
	(313, 144, 144, '23456789012', 'Gustavo Almeida', '1994-06-20', 'gustavo.almeida@clinicacampinas.com', '19999990040', 'CRM-SP33333', '09:00:00', '18:00:00', 'M', 'Cardiologia', 'senha2424'),
	(314, 145, 145, '34567890123', 'Vanessa Rodrigues', '1989-05-15', 'vanessa.rodrigues@clinicacampinas.com', '19999990041', 'CRM-SP34343', '08:00:00', '17:00:00', 'F', 'Ginecologia', 'senha2525'),
	(315, 146, 146, '45678901234', 'Roberto Santos', '1992-12-30', 'roberto.santos@clinicacampinas.com', '19999990042', 'CRM-SP35353', '07:00:00', '16:00:00', 'M', 'Dermatologia', 'senha2626'),
	(316, 147, 147, '56789012345', 'Larissa Martins', '1993-11-25', 'larissa.martins@clinicacampinas.com', '19999990043', 'CRM-SP36363', '10:00:00', '19:00:00', 'F', 'Oftalmologia', 'senha2727'),
	(582, 72, 317, '78901234561', 'Amanda Oliveira', '1995-04-05', 'amanda.oliveira@clinicacampinas.com', '19999990055', 'CRM-SP38383', '07:00:00', '16:00:00', 'F', 'Fisioterapia', 'senha2929'),
	(583, 73, 318, '89012345672', 'Rafaela Santos', '1987-01-10', 'rafaela.santos@clinicacampinas.com', '19999990056', 'CRM-SP39393', '13:00:00', '22:00:00', 'F', 'Psiquiatria', 'senha3030'),
	(584, 74, 319, '90123456783', 'Leonardo Souza', '1993-02-15', 'leonardo.souza@clinicacampinas.com', '19999990057', 'CRM-SP40404', '08:00:00', '17:00:00', 'M', 'Traumatologia', 'senha3131'),
	(585, 75, 320, '01234567894', 'Patricia Lima', '1990-12-10', 'patricia.lima@clinicacampinas.com', '19999990058', 'CRM-SP41414', '09:00:00', '18:00:00', 'F', 'Infectologia', 'senha3232'),
	(586, 76, 321, '12345678905', 'Lucas Oliveira', '1986-10-05', 'lucas.oliveira@clinicacampinas.com', '19999990059', 'CRM-SP42424', '08:00:00', '17:00:00', 'M', 'Cardiologia', 'senha3333'),
	(587, 77, 322, '23456789016', 'Fernanda Costa', '1994-07-20', 'fernanda.costa@clinicacampinas.com', '19999990060', 'CRM-SP43434', '07:00:00', '16:00:00', 'F', 'Ginecologia', 'senha3434'),
	(588, 78, 323, '34567890127', 'Guilherme Rodrigues', '1989-06-15', 'guilherme.rodrigues@clinicacampinas.com', '19999990061', 'CRM-SP44444', '10:00:00', '19:00:00', 'M', 'Dermatologia', 'senha3535'),
	(589, 79, 324, '45678901238', 'Camila Santos', '1992-01-30', 'camila.santos@clinicacampinas.com', '19999990062', 'CRM-SP45454', '08:00:00', '17:00:00', 'F', 'Oftalmologia', 'senha3636'),
	(590, 80, 324, '56789012349', 'Ana Paula Oliveira', '1988-08-20', 'ana.paula@clinicacampinas.com', '19999990063', 'CRM-SP46464', '07:00:00', '16:00:00', 'F', 'Nutricionista', 'senha3737'),
	(591, 81, 325, '67890123450', 'Roberto Almeida', '1991-07-15', 'roberto.almeida@clinicacampinas.com', '19999990064', 'CRM-SP47474', '13:00:00', '22:00:00', 'M', 'Fisioterapia', 'senha3838'),
	(592, 82, 326, '67890123451', 'Carla Lima', '1995-04-05', 'carla.lima@clinicacampinas.com', '19999990065', 'CRM-SP48484', '08:00:00', '17:00:00', 'F', 'Psiquiatria', 'senha3939'),
	(593, 83, 327, '67890123452', 'Rafael Martins', '1987-01-10', 'rafael.martins@clinicacampinas.com', '19999990066', 'CRM-SP49494', '07:00:00', '16:00:00', 'M', 'Traumatologia', 'senha4040'),
	(594, 84, 328, '67890123453', 'Juliana Souza', '1993-02-15', 'juliana.souza@clinicacampinas.com', '19999990067', 'CRM-SP50505', '10:00:00', '19:00:00', 'F', 'Infectologia', 'senha4141'),
	(595, 85, 329, '67890123454', 'Gabriel Lima', '1990-12-10', 'gabriel.lima@clinicacampinas.com', '19999990068', 'CRM-SP51515', '09:00:00', '18:00:00', 'M', 'Cardiologia', 'senha4242'),
	(596, 86, 330, '67890123455', 'Vanessa Costa', '1986-10-05', 'vanessa.costa@clinicacampinas.com', '19999990069', 'CRM-SP52525', '08:00:00', '17:00:00', 'F', 'Ginecologia', 'senha4343'),
	(597, 88, 332, '67890123457', 'Carolina Santos', '1989-06-15', 'carolina.santos@clinicacampinas.com', '19999990071', 'CRM-SP54545', '10:00:00', '19:00:00', 'F', 'Oftalmologia', 'senha4545'),
	(598, 89, 333, '67890123458', 'Diego Oliveira', '1992-01-30', 'diego.oliveira@clinicacampinas.com', '19999990072', 'CRM-SP55555', '08:00:00', '17:00:00', 'M', 'Nutricionista', 'senha4646'),
	(599, 90, 334, '67890123459', 'Amanda Almeida', '1988-08-20', 'amanda.almeida@clinicacampinas.com', '19999990073', 'CRM-SP56565', '07:00:00', '16:00:00', 'F', 'Fisioterapia', 'senha4747'),
	(600, 91, 335, '67890123460', 'Rafaela Lima', '1991-07-15', 'rafaela.lima@clinicacampinas.com', '19999990074', 'CRM-SP57575', '13:00:00', '22:00:00', 'F', 'Psiquiatria', 'senha4848'),
	(601, 92, 336, '67890123461', 'Leonardo Almeida', '1995-04-05', 'leonardo.almeida@clinicacampinas.com', '19999990075', 'CRM-SP58585', '08:00:00', '17:00:00', 'M', 'Traumatologia', 'senha4949'),
	(602, 93, 337, '67890123462', 'Juliana Martins', '1987-01-10', 'juliana.martins@clinicacampinas.com', '19999990076', 'CRM-SP59595', '07:00:00', '16:00:00', 'F', 'Infectologia', 'senha5050'),
	(603, 94, 338, '67890123463', 'Gabriel Silva', '1993-02-15', 'gabriel.silva@clinicacampinas.com', '19999990077', 'CRM-SP60606', '10:00:00', '19:00:00', 'M', 'Cardiologia', 'senha5151'),
	(604, 95, 339, '67890123464', 'Fernanda Lima', '1990-12-10', 'fernanda.lima@clinicacampinas.com', '19999990078', 'CRM-SP61616', '09:00:00', '18:00:00', 'F', 'Ginecologia', 'senha5252');

-- Copiando estrutura para tabela clinica.pacientes
CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `idoso` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `id_endereco` (`id_endereco`),
  CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_endereco`) REFERENCES `enderecos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela clinica.pacientes: ~8 rows (aproximadamente)
INSERT INTO `pacientes` (`id`, `id_endereco`, `nome`, `cpf`, `nascimento`, `telefone`, `email`, `necessidadeEspecial`, `necessidadeTipo`, `genero`, `senha`, `idoso`) VALUES
	(62, 72, 'Bruno Henrique Guinerio', '51364755874', '2003-04-12', '19982869853', 'brunoguinerio1204@gmail.com', '1', 'Aluno da Fatec', 'M', '$2y$10$IEyXlMpvkngAR2w1RX0/ru3jtaIUm7zYcOWmeMjQverkpsuCZ3ZgK', NULL),
	(63, 88, 'Matheus Henrique Batista de Lima Peixoto', '203.836.090', '2003-04-12', '19982869853', 'matheusdelima@gmail.com', '1', 'Fatec', 'M', '$2y$10$dRyglmntdbGCkD2Jte7/p.5T.WvrhTCNehWmrpkGO3LCtefPIq4ey', NULL),
	(64, 89, 'Bruno Henrique Guinerio', '213.812.910', '2003-04-12', '19982869853', 'brunoguineri@gmail.com', NULL, NULL, 'M', '$2y$10$g8DBfpkbye3AzboUnurKNuIVOhpjHsoHlbJmUD14i9vstVF0G4Gb6', '1'),
	(65, 92, 'Bruno Henrique Guinerio', '178.308.600', '2003-04-12', '19982869853', 'brunoguinerio120dgx4@gmail.com', NULL, NULL, 'M', '$2y$10$HVXCp0p5l9OOfCnIVAtYueKTXYWCfzpP9kXwtfC/giIBZRywAv33i', '1'),
	(66, 93, 'Bruno Henrique Guinerio', '416.026.420', '2003-04-12', '19982869853', 'bruno@gmail.com', NULL, NULL, 'M', '$2y$10$tY9XReuk9W4HNH.nrFGbsODopD/dLUWSj4HSlVAAkSmmz5N.U9JmS', '1'),
	(67, 94, 'Bruno Henrique Guinerio', '724.647.360', '2003-04-12', '19982869853', 'testeeeee@gmail.com', '1', 'testeee', 'M', '$2y$10$ASsbX22QKfvm5PHrl.qxX.FKwvkEe3KwT6LIBnHdUfAd63hbf6mO.', '1'),
	(68, 96, 'testeeee', '280.173.990', '2003-04-12', '19841125444', 'testeeeeee@gmaill.com', NULL, NULL, 'M', '$2y$10$vLYqAnEW4FLwYo.M.INcS.P3wwVgd7mZrDPGlxDQTDcvcqRhVAFYG', '1'),
	(69, 107, 'Bruno Henrique Guinerio', '044.565.020', '2003-04-12', '19982869853', 'brunopaciente@gmail.com', NULL, NULL, 'M', '$2y$10$0LylEl5VPcHhGqPM3doKWuCCs7kiWf1nnBReGGFro8WW1shF4GHRG', '1'),
	(70, 109, 'yabadaba dubedube', '704.001.800', '1941-06-10', '19983492015', 'yaba@gmail.com', '1', 'bruno', 'M', '$2y$10$s2J9GlxhzjNuKTNgwj9br.Kz3YdvHYGqeJkrnkhCwgK.TDK362qUG', '1'),
	(239, 105, 'Rafaela Silva', '23456789122', '1993-12-15', '19999990068', 'rafaela.silva@email.com', '1', NULL, 'F', 'senha6565', NULL),
	(240, 106, 'Rodrigo Lima', '34567890233', '1988-11-10', '19999990069', 'rodrigo.lima@email.com', '2', 'Audição', 'M', 'senha6767', NULL),
	(241, 107, 'Fernanda Oliveira', '45678901344', '1995-08-25', '19999990070', 'fernanda.oliveira@email.com', '1', NULL, 'F', 'senha6868', NULL),
	(242, 108, 'Thiago Santos', '56789012455', '1992-07-20', '19999990071', 'thiago.santos@email.com', '2', 'Cadeira de Rodas', 'M', 'senha6969', NULL),
	(243, 109, 'Carla Silva', '67890123566', '1987-06-05', '19999990072', 'carla.silva@email.com', '1', NULL, 'F', 'senha7070', NULL),
	(244, 110, 'Bruno Lima', '78901234677', '1994-05-01', '19999990073', 'bruno.lima@email.com', '2', 'Visão', 'M', 'senha7171', NULL),
	(245, 111, 'Mariana Santos', '89012345788', '1986-04-16', '19999990074', 'mariana.santos@email.com', '1', NULL, 'F', 'senha7272', NULL),
	(246, 112, 'José Oliveira', '90123456899', '1991-03-01', '19999990075', 'jose.oliveira@email.com', '2', 'Acessibilidade', 'M', 'senha7373', NULL),
	(247, 113, 'Aline Lima', '01234568010', '1990-12-20', '19999990076', 'aline.lima@email.com', '1', NULL, 'F', 'senha7474', NULL),
	(248, 114, 'Marcos Silva', '12345678121', '1988-11-05', '19999990077', 'marcos.silva@email.com', '2', 'Audição', 'M', 'senha7575', NULL),
	(249, 115, 'Juliana Oliveira', '23456789232', '1995-10-30', '19999990078', 'juliana.oliveira@email.com', '1', NULL, 'F', 'senha7676', NULL),
	(250, 116, 'Lucas Santos', '34567890343', '1987-09-15', '19999990079', 'lucas.santos@email.com', '2', 'Cadeira de Rodas', 'M', 'senha7777', NULL),
	(251, 117, 'Carolina Silva', '45678901454', '1994-08-10', '19999990080', 'carolina.silva@email.com', '1', NULL, 'F', 'senha7878', NULL),
	(252, 118, 'Gabriel Lima', '56789012565', '1989-07-05', '19999990081', 'gabriel.lima@email.com', '2', 'Visão', 'M', 'senha7979', NULL),
	(253, 119, 'Fernanda Santos', '67890123676', '1993-06-20', '19999990082', 'fernanda.santos@email.com', '1', NULL, 'F', 'senha8080', NULL),
	(254, 120, 'Gustavo Oliveira', '78901234787', '1988-05-15', '19999990083', 'gustavo.oliveira@email.com', '2', 'Acessibilidade', 'M', 'senha8181', NULL),
	(255, 121, 'Amanda Lima', '89012345898', '1991-04-30', '19999990084', 'amanda.lima@email.com', '1', NULL, 'F', 'senha8282', NULL),
	(256, 122, 'Thiago Silva', '90123456009', '1990-03-15', '19999990085', 'thiago.silva@email.com', '2', 'Audição', 'M', 'senha8383', NULL),
	(257, 123, 'Vanessa Santos', '01234568120', '1993-12-10', '19999990086', 'vanessa.santos@email.com', '1', NULL, 'F', 'senha8484', NULL),
	(258, 124, 'Rafaela Lima', '12345678231', '1988-11-25', '19999990087', 'rafaela.lima@email.com', '2', 'Cadeira de Rodas', 'F', 'senha8585', NULL),
	(259, 125, 'Rodrigo Oliveira', '23456789342', '1995-10-01', '19999990088', 'rodrigo.oliveira@email.com', '1', NULL, 'M', 'senha8686', NULL),
	(260, 126, 'Fernanda Silva', '34567890453', '1987-09-16', '19999990089', 'fernanda.silva@email.com', '2', 'Visão', 'F', 'senha8787', NULL),
	(261, 127, 'Thiago Costa', '45678901564', '1992-08-01', '19999990090', 'thiago.costa@email.com', '1', NULL, 'M', 'senha8888', NULL),
	(262, 128, 'Carla Lima', '56789012675', '1986-07-16', '19999990091', 'carla.lima@email.com', '2', 'Acessibilidade', 'F', 'senha8989', NULL),
	(263, 129, 'Bruno Santos', '67890123786', '1991-06-01', '19999990092', 'bruno.santos@email.com', '1', NULL, 'M', 'senha9090', NULL),
	(264, 130, 'Mariana Oliveira', '78901234897', '1990-05-20', '19999990093', 'mariana.oliveira@email.com', '2', 'Audição', 'F', 'senha9191', NULL),
	(265, 131, 'José Costa', '89012346008', '1987-04-05', '19999990094', 'jose.costa@email.com', '1', NULL, 'M', 'senha9292', NULL),
	(266, 132, 'Aline Silva', '90123457119', '1994-03-20', '19999990095', 'aline.silva@email.com', '2', 'Cadeira de Rodas', 'F', 'senha9393', NULL),
	(267, 133, 'Marcos Lima', '01234568230', '1993-02-05', '19999990096', 'marcos.lima@email.com', '1', NULL, 'M', 'senha9494', NULL),
	(268, 134, 'Juliana Santos', '12345678341', '1988-12-20', '19999990097', 'juliana.santos@email.com', '2', 'Visão', 'F', 'senha9595', NULL),
	(269, 135, 'Lucas Oliveira', '23456789452', '1995-11-05', '19999990098', 'lucas.oliveira@email.com', '1', NULL, 'M', 'senha9696', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
