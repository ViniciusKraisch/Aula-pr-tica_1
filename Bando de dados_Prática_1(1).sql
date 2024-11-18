CREATE DATABASE pratica_1;

USE pratica_1;

CREATE TABLE colaborador (
	pk_id_colaborador INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_colaborador VARCHAR(30) NOT NULL,
    email_colaborador VARCHAR(50) NOT NULL
    );
    
    
CREATE TABLE cliente (
	pk_id_cliente INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_cliente VARCHAR(30) NOT NULL,
    email_cliente VARCHAR(50) NOT NULL,
    telefone_cliente VARCHAR(20) NOT NULL
    );
    
    
CREATE TABLE chamado (
	pd_id_chamado INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
     fk_id_cliente INT NULL,
    descricao_chamado INT NOT NULL,
    criticidade_chamado ENUM ('Baixa', 'Média', 'Alta'),
    status_chamado ENUM ('Aberto', 'Em andamento', 'Resolvido'),
    Dataabertura_chamado DATE NOT NULL,
    fk_id_colaborador INT NULL
    );
   
   
   
    