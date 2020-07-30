-- Matheus Franciscone da Cunha
-- DDL

CREATE DATABASE db_aeroclube;

USE db_aeroclube;

CREATE TABLE tb_socio(
id_socio int primary key auto_increment,
nome_socio varchar(45) not null,
end_socio varchar(50) not null,
email_socio varchar(50) not null,
idade_socio int(2) not null
);

CREATE TABLE tb_telefone(
id_telefone int primary key auto_increment,
id_socio int not null,
ddd_telefone int(2) not null,
nm_telefone int(9) not null
);

CREATE TABLE tb_alunos(
id_aluno int primary key auto_increment,
id_socio int not null
);

CREATE TABLE tb_pilotos(
id_piloto int primary key auto_increment,
id_socio int not null,
nm_breve_piloto bigint(10) not null
);

CREATE TABLE tb_formacao(
id_formacao int primary key auto_increment,
id_piloto int not null,
nome_curso_formacao varchar(45) not null,
dt_diploma_formacao date not null,
instituicao_formacao varchar(45) not null
);

CREATE TABLE tb_aula(
id_aula int primary key auto_increment,
id_aluno int not null,
dt_aula date not null,
id_formacao int not null,
hr_saida_aula varchar(5) not null,
hr_chegada_aula varchar(5) not null,
parecer_inst_aula varchar(50) not null
);

CREATE TABLE tb_contato(
id_contato int primary key auto_increment,
nome_contato varchar(30) not null,
email_contato varchar(50) not null,
nm_celular_contato bigint(12) not null,
mensagem_contato varchar(70)
);


----------------------------------------------------

ALTER TABLE tb_telefone
ADD CONSTRAINT id_socio_telefone
FOREIGN KEY (id_socio) REFERENCES tb_socio(id_socio)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE tb_pilotos
ADD CONSTRAINT id_socio_piloto
FOREIGN KEY (id_socio) REFERENCES tb_socio(id_socio)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE tb_alunos
ADD CONSTRAINT id_socio_aluno
FOREIGN KEY (id_socio) REFERENCES tb_socio(id_socio)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE tb_formacao
ADD CONSTRAINT id_piloto_formacao
FOREIGN KEY (id_piloto) REFERENCES tb_pilotos(id_piloto)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE tb_aula
ADD CONSTRAINT id_formacao_aulas
FOREIGN KEY (id_formacao) REFERENCES tb_formacao(id_formacao)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE tb_aula
ADD CONSTRAINT id_alunos_aulas
FOREIGN KEY (id_aluno) REFERENCES tb_alunos(id_aluno)
ON DELETE CASCADE
ON UPDATE CASCADE;