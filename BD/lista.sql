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
	 idNC char not null,
	 arqAuditoria char not null,
	 classNC char not null,
	 prazo date not null,
	 responsavel text not null,
	 dEnvio date,
	 dReavaliacao date,
	 escalonado text,
	 novoPrazo date,
	 dResolucao date,
     primary key(idNC)
) engine=InnoDB default charset=latin1;

create table artefatos(
	idArtefato int not null unique,
	artefato text,
	pergunta text,
	checkagem enum("Sim", "Não", "Não aplicável") not null,
    primary key(idArtefato)
) engine=InnoDB default charset=latin1;

create table avaliacao(
	item text not null,
	NCencontradas longtext not null,
	acaoCorretiva longtext,
	obs longtext,
	foreign key(idnc) references nConformidades(idNC),
    foreign key(idart) references artefatos(idArtefato)
) engine=InnoDB default charset=latin1;

create table auditoria(
	descricaoAvaliacao longtext not null,
	auditor text not null,
	dAuditoria date
) engine=InnoDB default charset=latin1;


