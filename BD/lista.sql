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

#auditoriaDROP database lista;
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
	titulo longtext not null, # Precisa de um título ou algo q facilite a identificação além do id, tbm ajuda nas outras 2 tabelas
	descricaoAvaliacao longtext not null,
	auditor longtext not null,
	dataAuditoria date, 
    primary key(idAuditoria)
) engine=InnoDB default charset=utf8;

# Placeholder > Apagar dps q tiver uma forma de adicionar
insert into auditoria(idAuditoria, titulo, descricaoAvaliacao, auditor) values
(1, "Avaliacao de Qualidade do Trello", "Esse texto está sendo usado apenas para testes", "Maria Teste 1"),
(2, "Avaliacao de Qualidade do Trello 2", "Esse texto tbm está sendo usado apenas para testes", "Maria Teste 2");

create table checkList(
	idAvaliacao int not null, # id do checklist
    idAuditoriaC int not null,
    nomeCheck longtext not null, # O checklist precisa de um nome > É oq vamos mostrar no título quando a pessoa for selecionar o checklist
 # ~Ana é pra isso q serve a FK idAuditoria, pra conecta com a respectiva auditoria q ja tem descrição
    primary key(idAvaliacao),
    foreign key(idAuditoriaC) references auditoria(idAuditoria)
) engine=InnoDB default charset=utf8;

create table itemCheck(
	idItem int not null auto_increment,
	pergunta longtext not null,
	checkagem enum("Sim", "Não", "Não aplicável") not null, # Conferir se o a pergunta foi saciada
	item text not null, # O que está sendo avaliado
	obs longtext,
    idCheck int not null,
    primary key(idItem),
    foreign key(idCheck) references checkList(idAvaliacao)
) engine=InnoDB default charset=utf8;

# Placeholder > Apagar dps q tiver uma forma de adicionar
insert into checkList values
(1, 1,  "Insira um nome pro checklist");

insert into itemCheck values
(1, "Inserir pergunta aqui", "Não", "Trello", "Nao ha", 1);

create table nConformidades (
	idNC int not null auto_increment,
    idAvaliacaoNc int not null,
    idAuditoriaNc int not null,
	artefato text not null,
	classNC text not null,
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
) engine=InnoDB default charset=utf8;

# A classificação pode ter uma tabela tbm, facilitaria nossa vida em 100%
# > ~Ana justissimo
create table classificacao (
	idClass int not null auto_increment,
    class tinytext not null,
    tempo int not null,
    primary key(idClass)
) engine=InnoDB default charset=utf8;

insert into classificacao(class, tempo) values
("Advertência (Não se Aplica)", 0),
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

# select*from auditoria;
# select*from nConformidades;