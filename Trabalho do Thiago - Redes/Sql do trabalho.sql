-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/07/2023 às 02:55
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ifrs`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `candidato`
--

CREATE TABLE `candidato` (
  `id_candidato` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `cpf` char(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `candidato`
--

INSERT INTO `candidato` (`id_candidato`, `nome`, `cpf`, `email`) VALUES
(1, 'thiago adriel', '98798798787', 'thiago.a.o.lima@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `name_estado` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estado`
--

INSERT INTO `estado` (`id_estado`, `name_estado`) VALUES
(1, 'RS'),
(2, 'SP');

-- --------------------------------------------------------

--
-- Estrutura para tabela `filial`
--

CREATE TABLE `filial` (
  `id_filial` int(11) NOT NULL,
  `fk_estado` int(11) NOT NULL,
  `cidade` varchar(41) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `filial`
--

INSERT INTO `filial` (`id_filial`, `fk_estado`, `cidade`) VALUES
(1, 1, 'porto alegre'),
(2, 1, 'tramandaí'),
(3, 1, 'bagé'),
(4, 2, 'são paulo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `filial_usuario`
--

CREATE TABLE `filial_usuario` (
  `fk_filial` int(11) NOT NULL,
  `fk_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `filial_usuario`
--

INSERT INTO `filial_usuario` (`fk_filial`, `fk_usuario`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcao`
--

CREATE TABLE `funcao` (
  `id_funcao` int(11) NOT NULL,
  `name_funcao` varchar(15) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcao`
--

INSERT INTO `funcao` (`id_funcao`, `name_funcao`, `admin`) VALUES
(1, 'administrador', 1),
(2, 'entrevistrador', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `histórico`
--

CREATE TABLE `histórico` (
  `fk_vaga` int(11) NOT NULL,
  `fk_candidato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `histórico`
--

INSERT INTO `histórico` (`fk_vaga`, `fk_candidato`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `login` varchar(12) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `fk_funcao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `login`, `senha`, `fk_funcao`) VALUES
(1, 'admin', '123', 1),
(2, 'carlos', '1234', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vaga`
--

CREATE TABLE `vaga` (
  `id_vaga` int(11) NOT NULL,
  `fk_filial` int(11) NOT NULL,
  `cargo` varchar(15) NOT NULL,
  `salario` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vaga`
--

INSERT INTO `vaga` (`id_vaga`, `fk_filial`, `cargo`, `salario`, `descricao`) VALUES
(1, 1, 'programador jun', 1200, '12h ás 20h'),
(2, 1, 'estagiário', 600, '14h ás 16h'),
(3, 1, 'faxineiro', 1400, '14h ás 20h'),
(5, 3, 'espião', 5000, 'ead');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`id_candidato`);

--
-- Índices de tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Índices de tabela `filial`
--
ALTER TABLE `filial`
  ADD PRIMARY KEY (`id_filial`),
  ADD KEY `FK_filial_id_estado` (`fk_estado`);

--
-- Índices de tabela `filial_usuario`
--
ALTER TABLE `filial_usuario`
  ADD PRIMARY KEY (`fk_filial`,`fk_usuario`),
  ADD KEY `FK_filial_usuario_id_usuario` (`fk_usuario`);

--
-- Índices de tabela `funcao`
--
ALTER TABLE `funcao`
  ADD PRIMARY KEY (`id_funcao`);

--
-- Índices de tabela `histórico`
--
ALTER TABLE `histórico`
  ADD PRIMARY KEY (`fk_vaga`,`fk_candidato`),
  ADD KEY `FK_historico_id_candidato` (`fk_candidato`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `FK_usuario_id_funcao` (`fk_funcao`);

--
-- Índices de tabela `vaga`
--
ALTER TABLE `vaga`
  ADD PRIMARY KEY (`id_vaga`),
  ADD KEY `FK_vaga_id_filial` (`fk_filial`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `candidato`
--
ALTER TABLE `candidato`
  MODIFY `id_candidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `filial`
--
ALTER TABLE `filial`
  MODIFY `id_filial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `funcao`
--
ALTER TABLE `funcao`
  MODIFY `id_funcao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `vaga`
--
ALTER TABLE `vaga`
  MODIFY `id_vaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `filial`
--
ALTER TABLE `filial`
  ADD CONSTRAINT `FK_filial_id_estado` FOREIGN KEY (`fk_estado`) REFERENCES `estado` (`id_estado`);

--
-- Restrições para tabelas `filial_usuario`
--
ALTER TABLE `filial_usuario`
  ADD CONSTRAINT `FK_filial_usuario_id_filial` FOREIGN KEY (`fk_filial`) REFERENCES `filial` (`id_filial`),
  ADD CONSTRAINT `FK_filial_usuario_id_usuario` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Restrições para tabelas `histórico`
--
ALTER TABLE `histórico`
  ADD CONSTRAINT `FK_historico_id_candidato` FOREIGN KEY (`fk_candidato`) REFERENCES `candidato` (`id_candidato`),
  ADD CONSTRAINT `FK_historico_id_vaga` FOREIGN KEY (`fk_vaga`) REFERENCES `vaga` (`id_vaga`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_usuario_id_funcao` FOREIGN KEY (`fk_funcao`) REFERENCES `funcao` (`id_funcao`);

--
-- Restrições para tabelas `vaga`
--
ALTER TABLE `vaga`
  ADD CONSTRAINT `FK_vaga_id_filial` FOREIGN KEY (`fk_filial`) REFERENCES `filial` (`id_filial`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
