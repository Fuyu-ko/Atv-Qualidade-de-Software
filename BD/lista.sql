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

create table auditoria(
	idAuditoria int not null auto_increment,
	titulo longtext not null,
	descricaoAvaliacao longtext not null,
	auditor longtext not null,
	dataAuditoria date, 
    primary key(idAuditoria)
) engine=InnoDB default charset=utf8;

create table checkList(
	idAvaliacao int not null auto_increment,
    idAuditoriaC int not null,
    nomeCheck longtext not null,
	artefato longtext not null,
    primary key(idAvaliacao),
    foreign key(idAuditoriaC) references auditoria(idAuditoria)
) engine=InnoDB default charset=utf8;

create table itemCheck(
	idItem int not null auto_increment,
	pergunta longtext not null,
	checkagem enum("Sim", "Não", "Não aplicável") not null,
	item text not null,
    NcEncontrada longtext,
	obs longtext,
    idCheck int not null,
    primary key(idItem),
    foreign key(idCheck) references checkList(idAvaliacao)
) engine=InnoDB default charset=utf8;

create table nConformidades (
	idNC int not null auto_increment,
    idAvaliacaoNc int not null,
    idAuditoriaNc int not null,
	artefato text not null,
    itemAvaliado longtext not null,
	classNC text not null,
    NcEncontradas longtext not null,
    acaoCorretiva longtext not null,
	prazo date not null,
	responsavel text not null, 
	dEnvio date not null,
	dReavaliacao date,
	escalonado enum("Não", "Sim") not null,
	novoPrazo date,
	dResolucao date,
    primary key(idNC),
    foreign key(idAvaliacaoNc) references checkList(idAvaliacao),
    foreign key(idAuditoriaNc) references auditoria(idAuditoria)
) engine=InnoDB default charset=utf8;

create table classificacao (
	idClass int not null auto_increment,
    class tinytext not null,
    tempo int not null,
    primary key(idClass)
) engine=InnoDB default charset=utf8;
