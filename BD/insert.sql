use lista;

#AUDITORIA
INSERT INTO `lista`.`auditoria` (`idAuditoria`, `titulo`, `descricaoAvaliacao`, `auditor`, `dataAuditoria`) VALUES ('1', 'Auditoria do KanBam - Sea+', 'Auditoria de Qualidade do artefato: KanBam - Sea+', 'Ana Schran', '2020-11-03');
INSERT INTO `lista`.`auditoria` (`idAuditoria`, `titulo`, `descricaoAvaliacao`, `auditor`, `dataAuditoria`) VALUES ('2', 'Auditoria do Trello - Zoho Desk', 'Auditoria de Qualidade do artefato: Trello - Zoho Desk', 'Ana Schran', '2020-11-03');

#CHECKLISTs
INSERT INTO `lista`.`checklist` (`idAvaliacao`, `idAuditoriaC`, `nomeCheck`, `artefato`) VALUES ('1', '1', 'Avaliação de QA: KanBam - Sea+', 'KanBam - Sea+');
INSERT INTO `lista`.`checklist` (`idAvaliacao`, `idAuditoriaC`, `nomeCheck`, `artefato`) VALUES ('2', '2', 'Avaliação de QA: Trello - Zoho Desk', 'Trello - Zoho Desk');

#ITEM DE CHECKLIST2
INSERT INTO `lista`.`itemcheck` (`idItem`, `pergunta`, `checkagem`, `item`, `obs`, `idCheck`) VALUES ('8', 'Os dados relevantes para a confecção do projeto são especificados e apresentados no artefato?', 'Sim', 'Dados do Projeto', 'Não há', '2');
INSERT INTO `lista`.`itemcheck` (`idItem`, `pergunta`, `checkagem`, `item`, `obs`, `idCheck`) VALUES ('9', 'A documentação apresenta a explicação descritiva de seus itens (ex.: atividades e gráficos)?', 'Sim', 'Documentação', 'Não há', '2');
INSERT INTO `lista`.`itemcheck` (`idItem`, `pergunta`, `checkagem`, `item`, `obs`, `idCheck`) VALUES ('10', 'A documentação apresenta explicações através de gráficos, tabelas ou demais ilustrações?', 'Sim', 'Documentação', 'Não há', '2');
INSERT INTO `lista`.`itemcheck` (`idItem`, `pergunta`, `checkagem`, `item`, `obs`, `idCheck`) VALUES ('11', 'A documentação apresenta um mecanismo de priorização de tarefas?', 'Não', 'Documentação', 'Importância é diferente de prioridade', '2');
INSERT INTO `lista`.`itemcheck` (`idItem`, `pergunta`, `checkagem`, `item`, `obs`, `idCheck`) VALUES ('12', 'A documentação apresenta as referências e fontes no artefato?', 'Não', 'Coleta de Dados', 'As fontes são importantes para evidenciar a originaidade, logo, ausência de plágio.', '2');
INSERT INTO `lista`.`itemcheck` (`idItem`, `pergunta`, `checkagem`, `item`, `obs`, `idCheck`) VALUES ('13', 'O artefato possui todas as terefas com responsáveis definidos?', 'Sim', 'Recursos Humanos', 'Não há', '2');
INSERT INTO `lista`.`itemcheck` (`idItem`, `pergunta`, `checkagem`, `item`, `obs`, `idCheck`) VALUES ('14', 'Há um responsável pelo acesso, atualização e mantimento do artefato definido?', 'Sim', 'Segurança', 'Não há', '2');
INSERT INTO `lista`.`itemcheck` (`idItem`, `pergunta`, `checkagem`, `item`, `obs`, `idCheck`) VALUES ('15', 'O artefato apresenta um mecanismo de marcação de conteúdos confidenciais?', 'Não aplicável', 'Segurança', 'Não há', '2');
INSERT INTO `lista`.`itemcheck` (`idItem`, `pergunta`, `checkagem`, `item`, `obs`, `idCheck`) VALUES ('16', 'O artefato apresenta um mecanismo de inserção das metas e prazos? ', 'Sim', 'Metas e Prazos', 'Não há', '2');
INSERT INTO `lista`.`itemcheck` (`idItem`, `pergunta`, `checkagem`, `item`, `obs`, `idCheck`) VALUES ('17', 'Há um critério padrão para a execução das atividades sendo apresentado no artefato?', 'Não', 'Organização', 'Não há', '2');
INSERT INTO `lista`.`itemcheck` (`idItem`, `pergunta`, `checkagem`, `item`, `obs`, `idCheck`) VALUES ('18', 'A distribuição do conteúdo presente no artefato é apresentada?', 'Não', 'Distribuição', 'Não há', '2');

#NC
INSERT INTO `lista`.`nconformidades` (`idNC`, `idAvaliacaoNc`, `idAuditoriaNc`, `artefato`, `itemAvaliado`, `classNC`, `NcEncontradas`, `acaoCorretiva`, `prazo`, `responsavel`, `dEnvio`, `dReavaliacao`, `escalonado`) VALUES ('11', '2', '2', 'Trello - Zoho Desk', 'Documentação', 'Baixa-Complexa', ' Não possui priorização de tarefas', ' Indicar através de um sistema de etiquetas coloridas a respectiva complexidade (ex.: vermelha = urgente), adicionando também, uma legenda.', '2020-11-10', 'Gerente de Projetos', '2020-11-03', '2020-11-10', 'Não');
INSERT INTO `lista`.`nconformidades` (`idNC`, `idAvaliacaoNc`, `idAuditoriaNc`, `artefato`, `itemAvaliado`, `classNC`, `NcEncontradas`, `acaoCorretiva`, `prazo`, `responsavel`, `dEnvio`, `dReavaliacao`, `escalonado`) VALUES ('12', '2', '2', 'Trello - Zoho Desk', 'Coleta de Dados', 'Baixa-Simples', 'Não apresenta as fontes utilizadas para a coleta dos dados', 'Indicar as fontes utilizadas (sugere-se aderir o formato padrão da ABNT para as referências)', '2020-11-09', 'Gerente de Projetos', '2020-11-03', '2020-11-09', 'Não');
INSERT INTO `lista`.`nconformidades` (`idNC`, `idAvaliacaoNc`, `idAuditoriaNc`, `artefato`, `itemAvaliado`, `classNC`, `NcEncontradas`, `acaoCorretiva`, `prazo`, `responsavel`, `dEnvio`, `dReavaliacao`, `escalonado`) VALUES ('17', '2', '2', 'Trello - Zoho Desk', 'Organização', 'Média-Complexa', 'Não possui um padrão de execução para as tarefas', 'Apresentar um cronograma de execução para as tarefas', '2020-11-09', 'Gerente de Projetos', '2020-11-03', '2020-11-09', 'Não');
INSERT INTO `lista`.`nconformidades` (`idNC`, `idAvaliacaoNc`, `idAuditoriaNc`, `artefato`, `itemAvaliado`, `classNC`, `NcEncontradas`, `acaoCorretiva`, `prazo`, `responsavel`, `dEnvio`, `dReavaliacao`, `escalonado`) VALUES ('18', '2', '2', 'Trello - Zoho Desk', 'Distribuição', 'Média-Simples', 'Não apresenta a estratégia de distribuição do conteúdo do artefato utilizado', 'Apresentar a descrição da estratégia de distribuíção (especificar local de distribuição, responsáveis e público-alvo)', '2020-11-06', 'Gerente de Projetos', '2020-11-03', '2020-11-06', 'Não');

#Classificação
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
