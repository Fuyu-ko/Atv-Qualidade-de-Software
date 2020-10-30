SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

SET @@global.time_zone = '+3:00';

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

SET @@global.time_zone = '+3:00';

create schema if not exists lista;
USE lista;

create table nConformidades (
	 arqAuditoria char not null,
	 idNC char not null,
	 item text not null,
	 classNC char not null,
	 NCencontrada longtext not null,
	 acaoCorrecao longtext,
	 prazo date not null,
	 responsavel text not null,
	 dEnvio date,
	 dReavaliacao date,
	 escalonado text,
	 novoPrazo date,
	 dResolucao date,
	 obs longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
