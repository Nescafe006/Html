CREATE DATABASE db_livros;

USE db_livros;

CREATE TABLE autor(
au_cod INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
au_nome VARCHAR(45),
au_nacionalidade VARCHAR(45),
au_biografia VARCHAR(45)
);


CREATE TABLE livro(
li_cod INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
li_titulo VARCHAR(45),
li_isbn VARCHAR(45),
li_edicao VARCHAR(45),
li_editora VARCHAR(45),
li_anodepublicacao DATE,
li_precodecapa FLOAT,
li_categoria VARCHAR(45),
au_cod INT,
FOREIGN KEY (au_cod) REFERENCES autor(au_cod)
);


INSERT INTO autor (au_nome, au_nacionalidade, au_biografia) 
VALUES ('Machado de Assis', 'brasileiro','Machado de Assis (1839-1908) foi um escritor brasileiro');

INSERT INTO livro (li_titulo, li_isbn, li_edicao, li_editora, li_anodepublicacao, li_precodecapa,li_categoria)
VALUES ('Os primeiros - a ressurreição', '978-65-89999-01-', 'edição suprema','Casa do lobo', '2023-10-01', '300', 'romance');


UPDATE autor
SET au_nome= 'machado'
WHERE au_cod = 1;

UPDATE livro
SET li_categoria = 'ação'
WHERE li_cod = 1;


DELETE FROM autor
WHERE au_cod = 3;

DELETE FROM livro
WHERE li_cod = 1;

SELECT * FROM autor;

SELECT * FROM livro;



