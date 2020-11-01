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
	titulo text not null, # Precisa de um título ou algo q facilite a identificação além do id, tbm ajuda nas outras 2 tabelas
	descricaoAvaliacao longtext not null,
	auditor text not null,
	dataAuditoria date, 
    primary key(idAuditoria)
) engine=InnoDB default charset=utf8;

# Placeholder > Apagar dps q tiver uma forma de adicionar
insert into auditoria(idAuditoria, titulo, descricaoAvaliacao, auditor) values
(1, "Lorem ipsum", "Esse texto está sendo usado apenas para testes", "Placeholder P");

create table checkList(
	idAvaliacao int not null,
    idAuditoriaC int not null,
    nomeCheck text not null, # O checklist precisa de um nome > É oq vamos mostrar no título quando a pessoa for selecionar o checklist
    # idCheck int not null unique, -> Supostamente esse era o PK, acho q dá para tirar
    artefato text not null,
	pergunta text not null,
	checkagem enum("Sim", "Não", "Não aplicável") not null, # Tbm não lembro oq era T^T
	item text not null, # Isso tbm não
	obs longtext,
    primary key(idAvaliacao),
    foreign key(idAuditoriaC) references auditoria(idAuditoria)
) engine=InnoDB default charset=utf8;

# Placeholder > Apagar dps q tiver uma forma de adicionar
insert into checkList values
(1, 1, "Lorem Ipsum 2", "Placeholder", "Oq era a pergunta mesmo?", "Não", "Placeholder 2", "Lorem ipsum dolor sit amet, 
	consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
	Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
	Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");

create table nConformidades (
	idNC int not null auto_increment,
    idAvaliacaoNc int not null,
    idAuditoriaNc int not null,
    # idCheck int not null unique, -> Isso supostamente é a FK de checklist
	classNC text not null,
    NcEncontradas longtext not null,
    acaoCorretiva longtext not null,
	prazo date not null,
	responsavel text not null, # Esse é o mesmo responsável pela auditoria?
	dEnvio date,
	dReavaliacao date,
	escalonado text,
	novoPrazo date,
	dResolucao date,
    primary key(idNC),
    foreign key(idAvaliacaoNc) references checkList(idAvaliacao),
    foreign key(idAuditoriaNc) references auditoria(idAuditoria)
) engine=InnoDB default charset=utf8;

# A classificação pode ter uma tabela tbm, facilitaria nossa vida em 100%
create table classificacao (
	idClass int not null auto_increment,
    class tinytext not null,
    tempo int not null,
    primary key(idClass)
) engine=InnoDB default charset=utf8;

insert into classificacao(class, tempo) values
("Advertência", 0),
("Baixa-Simples", 4),
("Baixa-Complexa", 5),
("Média-Simples", 3),
("Média-Complexa", 4),
("Alta-Simples", 2),
("Alta-Complexa", 3),
("Urgente-Simples", 1),
("Urgente-Complexa", 2);

# Ideias que podem ser boas mas não sei se temos tempo suficiente para isso
# Talvez dê para ter tbm uma tabela para os responsáveis
# Com os campos (id, cargo, superior) -> O superior para definir uma hierarquia
# Se fosse atualizado para ser escalonado, daria para automaticamente salvar um novo item com o responsável atualizado
# Dá para deixa do lado de cada coisa uma breve descrição em comentário, para facilitar nossa vida e a da prof
# Fiz umas adições na lista - Gabe

select*from auditoria;
select*from nConformidades;