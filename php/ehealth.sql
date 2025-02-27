-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jul-2021 às 02:09
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ehealth`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbconsultas`
--

CREATE TABLE `tbconsultas` (
  `consulta` int(11) NOT NULL,
  `medico_FK` int(11) NOT NULL,
  `paciente_FK` int(11) NOT NULL,
  `horario` varchar(7) COLLATE utf8_bin NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbconsultas`
--

INSERT INTO `tbconsultas` (`consulta`, `medico_FK`, `paciente_FK`, `horario`, `data`) VALUES
(2, 3, 1, '16:40', '2020-11-18'),
(4, 2, 3, '19:00', '2020-11-11'),
(5, 5, 6, '12:00', '2020-12-01'),
(7, 3, 1, '04:03', '2021-07-15'),
(8, 1, 1, '01:06', '2021-07-14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbespecialidades`
--

CREATE TABLE `tbespecialidades` (
  `especialidade` int(11) NOT NULL,
  `descricao` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbespecialidades`
--

INSERT INTO `tbespecialidades` (`especialidade`, `descricao`) VALUES
(1, 'Clínica Médica'),
(2, 'Cirurgia Geral'),
(3, 'Pediatria'),
(4, 'Ginecologia'),
(5, 'Anestesiologia'),
(6, 'Ortopedia'),
(7, 'Oftalmologia'),
(8, 'Cardiologia'),
(9, 'Radiologia'),
(10, 'Psiquiatria'),
(11, 'Dermatologia'),
(12, 'Otorrinolaringologia'),
(13, 'Endocrinologia'),
(14, 'Cirurgia Plástica'),
(15, 'Infectologia'),
(16, 'Cirurgia Vascular'),
(17, 'Urologia'),
(18, 'Cancerologia'),
(19, 'Nefrologia'),
(20, 'Neurologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmedicos`
--

CREATE TABLE `tbmedicos` (
  `medico` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `CRM` varchar(20) COLLATE utf8_bin NOT NULL,
  `especialidade_FK` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbmedicos`
--

INSERT INTO `tbmedicos` (`medico`, `nome`, `CRM`, `especialidade_FK`, `data_cadastro`) VALUES
(1, 'Óscar Bento', '35643-AM', 4, '2021-07-01 10:00:00'),
(2, 'Tomás Bento', '99158-BA', 11, '2021-07-01 10:00:00'),
(3, 'Diego Varela', '90518-CE', 10, '2021-07-01 10:00:00'),
(4, 'Eduardo Bandeira', '32533-MG', 18, '2021-07-01 10:00:00'),
(5, 'Óscar Alves', '24544-PE', 16, '2021-07-01 10:00:00'),
(6, 'Xande Amaral', '98445-RJ', 12, '2021-07-01 10:00:00'),
(7, 'Viriato Mendes', '50916-SC', 10, '2021-07-01 10:00:00'),
(8, 'Toninho Martins', '26362-SP', 10, '2021-07-01 10:00:00'),
(9, 'Teófilo Pires', '93836-PR', 15, '2021-07-01 10:00:00'),
(10, 'Duarte Montenegro', '36918-DF', 11, '2021-07-01 10:00:00'),
(11, 'Natália Vasconcelos', '36187-AM', 13, '2021-07-01 10:00:00'),
(12, 'Micaela Silvestre', '20970-BA', 6, '2021-07-01 10:00:00'),
(13, 'Benedita Saldanha', '80250-CE', 7, '2021-07-01 10:00:00'),
(14, 'Cláudia Carvalho', '26050-MG', 5, '2021-07-01 10:00:00'),
(15, 'Luana Cordeiro', '43381-PE', 5, '2021-07-01 10:00:00'),
(16, 'Graça Pimentel', '56543-RJ', 17, '2021-07-01 10:00:00'),
(17, 'Rosalina Guerra', '25463-SC', 12, '2021-07-01 10:00:00'),
(18, 'Catarina Coutinho', '25876-SP', 10, '2021-07-01 10:00:00'),
(19, 'Paulina Leitão', '21105-PR', 5, '2021-07-01 10:00:00'),
(20, 'Julinha Florencio', '97577-SP', 3, '2021-07-01 10:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpacientes`
--

CREATE TABLE `tbpacientes` (
  `paciente` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `cpf` varchar(20) COLLATE utf8_bin NOT NULL,
  `plano` tinyint(1) NOT NULL,
  `data_nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbpacientes`
--

INSERT INTO `tbpacientes` (`paciente`, `nome`, `cpf`, `plano`, `data_nascimento`) VALUES
(1, 'Diniz Pires', '514.894.163-91', 1, '1976-07-20'),
(2, 'Nataniel Pascoal', '534.151.401-11', 1, '1983-07-25'),
(3, 'António Pinho', '248.192.194-18', 1, '2002-07-07'),
(4, 'Marcos Neves', '389.367.934-77', 1, '1963-01-19'),
(5, 'Jônatas Batista', '754.409.244-83', 0, '2009-04-26'),
(6, 'Danilo Luz', '161.548.261-57', 0, '1987-02-01'),
(7, 'Maximiano Vomlel', '722.630.643-35', 0, '1969-06-08'),
(8, 'Helder Luz', '431.451.354-79', 0, '1981-07-03'),
(9, 'Caio Campos', '742.243.308-11', 1, '1993-07-09'),
(10, 'Rafinha Mendez', '216.833.504-24', 1, '1967-03-04'),
(11, 'Brunilda Alvim', '111.900.893-78', 1, '1968-12-25'),
(12, 'Liana Albuquerque', '771.265.193-51', 0, '1974-12-16'),
(13, 'Lena Menezes', '647.136.966-72', 1, '1977-05-16'),
(14, 'Mara Águas', '670.363.514-99', 0, '2004-10-11'),
(15, 'Eneida Rodrigues', '960.801.916-33', 1, '1985-08-08'),
(16, 'Doroteia Mata', '707.782.266-47', 0, '1991-03-11'),
(17, 'Madalena Garcia', '383.331.691-80', 1, '1994-02-02'),
(18, 'Apolônia Gama', '971.587.464-95', 0, '1991-09-09'),
(19, 'Débora Leitão', '154.969.486-29', 1, '1996-10-02'),
(20, 'Carmo Braga', '696.253.894-82', 0, '1982-02-25'),
(21, 'Reynaldo Câmara', '810.861.641-28', 0, '1983-12-15'),
(22, 'Nelson Pereira', '313.275.441-61', 1, '1985-04-10'),
(23, 'Eduardo Cerqueira', '144.260.364-34', 1, '1964-08-01'),
(24, 'Telmo Seixas', '197.797.790-17', 1, '2003-02-01'),
(25, 'Valério Ávila', '456.573.796-38', 1, '1992-06-02'),
(26, 'Carlitos Rodrigues', '283.992.564-11', 1, '2004-08-09'),
(27, 'Noah Moreira', '774.541.399-41', 0, '2008-02-19'),
(28, 'Eduardo Peres', '606.458.415-57', 0, '1974-12-10'),
(29, 'Lucas do Rosário', '650.746.404-47', 1, '1978-07-23'),
(30, 'Norberto Barbosa', '703.983.506-40', 0, '1961-06-03'),
(31, 'Luísa Barboza', '236.985.723-40', 0, '2004-09-23'),
(32, 'Margarida Borges', '192.430.181-41', 0, '1975-07-28'),
(33, 'Lucília Brandão', '777.353.845-12', 0, '1974-10-12'),
(34, 'Benigna Almeida', '917.729.903-99', 1, '1965-12-03'),
(35, 'Lucinda Serra', '488.559.482-96', 0, '1985-11-04'),
(36, 'Sofia Saraiva', '586.924.742-72', 0, '1990-10-01'),
(37, 'Irene Tomás', '597.424.576-81', 1, '2005-05-23'),
(38, 'Luzia Azevedo', '963.594.987-21', 1, '1985-04-04'),
(39, 'Rosa Serra', '170.863.962-23', 1, '1965-05-22'),
(40, 'Lucinda Freitas', '415.273.994-91', 1, '2003-01-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpessoas`
--

CREATE TABLE `tbpessoas` (
  `pessoa` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `cpf` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbpessoas`
--

INSERT INTO `tbpessoas` (`pessoa`, `nome`, `cpf`) VALUES
(1, 'Henrique Amorim', '12312313'),
(2, 'Anna Silva', '654611651'),
(3, 'Paula dos Santos', '484651132184'),
(4, 'Gabriela Mattos', '484131841616');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbconsultas`
--
ALTER TABLE `tbconsultas`
  ADD PRIMARY KEY (`consulta`);

--
-- Índices para tabela `tbespecialidades`
--
ALTER TABLE `tbespecialidades`
  ADD PRIMARY KEY (`especialidade`);

--
-- Índices para tabela `tbmedicos`
--
ALTER TABLE `tbmedicos`
  ADD PRIMARY KEY (`medico`);

--
-- Índices para tabela `tbpacientes`
--
ALTER TABLE `tbpacientes`
  ADD PRIMARY KEY (`paciente`);

--
-- Índices para tabela `tbpessoas`
--
ALTER TABLE `tbpessoas`
  ADD PRIMARY KEY (`pessoa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbconsultas`
--
ALTER TABLE `tbconsultas`
  MODIFY `consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbespecialidades`
--
ALTER TABLE `tbespecialidades`
  MODIFY `especialidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tbmedicos`
--
ALTER TABLE `tbmedicos`
  MODIFY `medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=444;

--
-- AUTO_INCREMENT de tabela `tbpacientes`
--
ALTER TABLE `tbpacientes`
  MODIFY `paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `tbpessoas`
--
ALTER TABLE `tbpessoas`
  MODIFY `pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
