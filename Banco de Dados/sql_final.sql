CREATE TABLE chamado (
  cod INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo_serviço_cod INTEGER UNSIGNED NOT NULL,
  usuario_login VARCHAR NOT NULL,
  nome_chamado VARCHAR(30) NULL,
  descricao VARCHAR(300) NULL,
  data_inicial DATE NULL,
  data_final DATE NULL,
  patrimonio_equip VARCHAR(20) NULL,
  localizacao_equip VARCHAR(20) NULL,
  cod_tecnico INTEGER UNSIGNED NULL,
  PRIMARY KEY(cod),
  INDEX chamado_FKI_usuario(usuario_login),
  INDEX chamado_FK_tipo_servico(tipo_serviço_cod)
);

CREATE TABLE hitorico_chamado (
  cod INTEGER UNSIGNED NOT NULL,
  statuss_cod INTEGER UNSIGNED NOT NULL,
  chamado_cod INTEGER UNSIGNED NOT NULL,
  dh_atualizacao DATETIME NOT NULL,
  PRIMARY KEY(cod),
  INDEX hitorico_chamado_cod_chamado(chamado_cod),
  INDEX hitorico_chamado_cod_status(statuss_cod)
);

CREATE TABLE perfil (
  cod INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(25) NULL,
  PRIMARY KEY(cod)
);

CREATE TABLE solucao (
  cod INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  chamado_cod INTEGER UNSIGNED NOT NULL,
  descricao VARCHAR(300) NULL,
  dt_solucao DATE NULL,
  PRIMARY KEY(cod),
  INDEX solucao_FK_chamado(chamado_cod)
);

CREATE TABLE statuss (
  cod INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(25) NULL,
  PRIMARY KEY(cod)
);

CREATE TABLE tipo_serviço (
  cod INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(25) NULL,
  PRIMARY KEY(cod)
);

CREATE TABLE usuario (
  login VARCHAR NOT NULL AUTO_INCREMENT,
  perfil_cod INTEGER UNSIGNED NOT NULL,
  senha VARCHAR(8) NULL,
  email VARCHAR(30) NULL,
  PRIMARY KEY(login),
  INDEX usuario_FK_perfil(perfil_cod)
);


