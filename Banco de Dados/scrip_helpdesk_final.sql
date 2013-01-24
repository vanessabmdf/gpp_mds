CREATE TABLE chamado (
  cod INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo_serviço_cod INTEGER UNSIGNED NOT NULL,
  usuario_login VARCHAR NOT NULL,
  nome_chamado VARCHAR NULL,
  descricao VARCHAR NULL,
  data_inicial DATE NULL,
  data_final DATE NULL,
  patrimonio_equip VARCHAR NULL,
  localizacao_equip VARCHAR NULL,
  cod_tecnico INTEGER UNSIGNED NULL,
  PRIMARY KEY(cod),
  INDEX chamado_FKI_usuario(usuario_login),
  INDEX chamado_FKIndex2(tipo_serviço_cod)
);

CREATE TABLE chamado (
  cod INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo_serviço_cod INTEGER UNSIGNED NOT NULL,
  usuario_login VARCHAR NOT NULL,
  nome_chamado VARCHAR NULL,
  descricao VARCHAR NULL,
  data_inicial DATE NULL,
  data_final DATE NULL,
  patrimonio_equip VARCHAR NULL,
  localizacao_equip VARCHAR NULL,
  cod_tecnico INTEGER UNSIGNED NULL,
  PRIMARY KEY(cod),
  INDEX chamado_FKI_usuario(usuario_login),
  INDEX chamado_FKIndex2(tipo_serviço_cod)
);

CREATE TABLE hitorico_chamado (
  cod INTEGER UNSIGNED NOT NULL,
  statuss_cod INTEGER UNSIGNED NOT NULL,
  chamado_cod INTEGER UNSIGNED NOT NULL,
  dh_atualizacao DATETIME NOT NULL,
  PRIMARY KEY(cod),
  INDEX hitorico_chamado_FKIndex1(chamado_cod),
  INDEX hitorico_chamado_FKIndex2(statuss_cod)
);

CREATE TABLE perfil (
  cod INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR NULL,
  PRIMARY KEY(cod)
);

CREATE TABLE solucao (
  cod INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  chamado_cod INTEGER UNSIGNED NOT NULL,
  descricao VARCHAR() NULL,
  palavra_chave VARCHAR NULL,
  PRIMARY KEY(cod),
  INDEX solucao_FK_chamado(chamado_cod)
);

CREATE TABLE statuss (
  cod INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  descricao VARCHAR NULL,
  PRIMARY KEY(cod)
);

CREATE TABLE subtipo_servico (
  cod INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo_serviço_cod INTEGER UNSIGNED NOT NULL,
  descricao VARCHAR NULL,
  PRIMARY KEY(cod),
  INDEX subtipo_servico_FKIndex1(tipo_serviço_cod)
);

CREATE TABLE tipo_serviço (
  cod INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  descricao VARCHAR NULL,
  PRIMARY KEY(cod)
);

CREATE TABLE usuario (
  login VARCHAR NOT NULL AUTO_INCREMENT,
  perfil_cod INTEGER UNSIGNED NOT NULL,
  senha VARCHAR NULL,
  email VARCHAR NULL,
  PRIMARY KEY(login),
  INDEX usuario_FKIndex1(perfil_cod)
);


