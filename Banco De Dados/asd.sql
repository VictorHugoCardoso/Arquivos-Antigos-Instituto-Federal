CREATE database exemplo;

DROP database exemplo;

USE exemplo;

CREATE TABLE aluno(
	nome varchar(40) not null,
	numero INT not null,
	aniversario date not null 
);

SHOW tables;

DESCRIBE aluno;

INSERT INTO aluno values('victor','12','12-12-1997');

SELECT * FROM aluno;

SELECT * FROM aluno WHERE nome="Victor";

DELETE FROM aluno WHERE nome="calton";

UPDATE aluno SET nome="VIADO" WHERE numero="24";

mysqldump -u root -p curso > curso3.sql
mysql -u root -p curso < curso3.sql

CONSTRAINT pk_tbCategoria PRIMARY KEY (codigo_categoria)

CONSTRAINT un_CPFcli UNIQUE (CPF_cli),

CONSTRAINT fk_tbFilme_tbTitulo FOREIGN KEY (codigo_titulo) REFERENCES tbTitulo (codigo_titulo)ON DELETE CASCADE ON UPDATE CASCADE

CONSTRAINT ck_NomeClasse CHECK (nome_classe IN ('Lançamento', 'Catálogo'))