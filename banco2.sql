-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para projeto
CREATE DATABASE IF NOT EXISTS `projeto` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `projeto`;

-- Copiando estrutura para tabela projeto.atividade
CREATE TABLE IF NOT EXISTS `atividade` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dataCadastro` datetime DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `idProjeto` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idxprojeto` (`idProjeto`),
  CONSTRAINT `idxprojeto` FOREIGN KEY (`idProjeto`) REFERENCES `projeto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projeto.atividade: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
INSERT INTO `atividade` (`id`, `dataCadastro`, `descricao`, `idProjeto`) VALUES
	(44, '2019-06-07 13:39:21', 'Atividade 1', 27),
	(45, '2019-06-07 13:39:21', 'Atividade 2', 27),
	(46, '2019-06-07 13:39:21', 'Atividade 3', 27),
	(47, '2019-06-07 13:39:21', 'Atividade 4', 27),
	(48, '2019-06-07 13:39:21', 'Atividade 5', 27),
	(49, '2019-06-07 13:39:21', 'Atividade 6', 27),
	(50, '2019-06-07 13:39:21', 'Atividade 7', 27),
	(51, '2019-06-07 13:39:21', 'Atividade 8', 27),
	(52, '2019-06-07 13:39:21', 'Atividade 9', 27),
	(53, '2019-06-07 13:39:21', 'Atividade 10', 27);
/*!40000 ALTER TABLE `atividade` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto.lancamento_automatico
CREATE TABLE IF NOT EXISTS `lancamento_automatico` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `idCliente` bigint(20) NOT NULL,
  `planoConta` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idxcliente` (`idCliente`),
  KEY `idxplanoconta` (`planoConta`),
  CONSTRAINT `idxcliente` FOREIGN KEY (`idCliente`) REFERENCES `pessoa` (`id`),
  CONSTRAINT `idxplanoconta` FOREIGN KEY (`planoConta`) REFERENCES `planos_conta` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela projeto.lancamento_automatico: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `lancamento_automatico` DISABLE KEYS */;
/*!40000 ALTER TABLE `lancamento_automatico` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto.pessoa
CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela projeto.pessoa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` (`id`, `nome`) VALUES
	(1, 'Karoline'),
	(2, 'Roberto');
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto.pessoa_fisica
CREATE TABLE IF NOT EXISTS `pessoa_fisica` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(50) NOT NULL,
  `idPessoa` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idxfisica` (`idPessoa`),
  CONSTRAINT `idxfisica` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela projeto.pessoa_fisica: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pessoa_fisica` DISABLE KEYS */;
INSERT INTO `pessoa_fisica` (`id`, `cpf`, `idPessoa`) VALUES
	(1, '123456789', 1);
/*!40000 ALTER TABLE `pessoa_fisica` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto.pessoa_juridica
CREATE TABLE IF NOT EXISTS `pessoa_juridica` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(50) NOT NULL,
  `idPessoa` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idxjuridica` (`idPessoa`),
  CONSTRAINT `idxjuridica` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela projeto.pessoa_juridica: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pessoa_juridica` DISABLE KEYS */;
INSERT INTO `pessoa_juridica` (`id`, `cnpj`, `idPessoa`) VALUES
	(1, '987654321', 2);
/*!40000 ALTER TABLE `pessoa_juridica` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto.planos_conta
CREATE TABLE IF NOT EXISTS `planos_conta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela projeto.planos_conta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `planos_conta` DISABLE KEYS */;
INSERT INTO `planos_conta` (`id`, `descricao`) VALUES
	(1, 'plano 1'),
	(2, 'plano 2'),
	(3, 'plano 3');
/*!40000 ALTER TABLE `planos_conta` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto.projeto
CREATE TABLE IF NOT EXISTS `projeto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projeto.projeto: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `projeto` DISABLE KEYS */;
INSERT INTO `projeto` (`id`, `descricao`) VALUES
	(27, 'Projeto 1');
/*!40000 ALTER TABLE `projeto` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
