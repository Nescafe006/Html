CREATE DATABASE db_tarefa;

USE db_tarefa;

CREATE TABLE usuario (
usu_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
usu_nome VARCHAR(45), 
usu_email VARCHAR(45)

);


CREATE TABLE tarefa (
taf_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
taf_descricao VARCHAR(40),
taf_setor     VARCHAR(40),
taf_prioridade VARCHAR(40),
taf_data        DATE,
taf_status VARCHAR(40),
usu_id INT,
FOREIGN KEY(usu_id) REFERENCES usuario (usu_id)
);

SELECT * FROM usuarios;

SELECT * FROM tarefa;



