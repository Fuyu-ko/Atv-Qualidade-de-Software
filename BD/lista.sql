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

#DROP database lista;
create schema if not exists lista;
USE lista;

/*
create table artefatos(
	idArtefato int not null unique,
	artefato text,
	pergunta text,
	checkagem enum("Sim", "Não", "Não aplicável") not null,
    primary key(idArtefato)
) engine=InnoDB default charset=latin1;

create table auditoria(
	descricaoAvaliacao longtext not null,
	auditor text not null,
	dataAuditoria date
) engine=InnoDB default charset=latin1;

create table avaliacao(
	idNC char not null,
    idArtefato int not null unique,
	item text not null,
	NcEncontradas longtext not null,
	acaoCorretiva longtext,
	obs longtext,
	foreign key(idNC) references nConformidades(idNC),
    foreign key(idArtefato) references artefatos(idArtefato)
) engine=InnoDB default charset=latin1;

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
*/

create table auditoria(
	idAuditoria int not null,
	descricaoAvaliacao longtext not null,
	auditor text not null,
	dataAuditoria date, 
    primary key(idAuditoria)
) engine=InnoDB default charset=latin1;

create table checkList(
	idAvaliacao int not null,
    idAuditoriaC int not null,
    idCheck int not null unique,
    artefato text not null,
	pergunta text not null,
	checkagem enum("Sim", "Não", "Não aplicável") not null,
	item text not null,
	obs longtext,
    primary key(idAvaliacao),
    foreign key(idAuditoriaC) references auditoria(idAuditoria)
) engine=InnoDB default charset=latin1;

create table nConformidades (
	 idNC int not null,
     idAvaliacaoNc int not null,
     idAuditoriaNc int not null,
     idCheck int not null unique,
	 classNC char not null,
     NcEncontradas longtext not null,
     acaoCorretiva longtext not null,
	 prazo date not null,
	 responsavel text not null,
	 dEnvio date,
	 dReavaliacao date,
	 escalonado text,
	 novoPrazo date,
	 dResolucao date,
     primary key(idNC),
    foreign key(idAvaliacaoNc) references checkList(idAvaliacao),
    foreign key(idAuditoriaNc) references auditoria(idAuditoria)
) engine=InnoDB default charset=latin1;