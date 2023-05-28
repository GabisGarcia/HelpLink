CREATE DATABASE HelpLink;

USE HelpLink;
--  tabelas básicas - FEITO
-- Hierarquia de tabelas- FEITO
-- popular tabelas
-- triggers
-- procedures
-- views
-- users


-- Senha criptografada em MD5
CREATE TABLE USUARIO(
    ID_CONTA INT AUTO_INCREMENT PRIMARY KEY,
    NOME VARCHAR(55) NOT NULL,
    EMAIL VARCHAR(50) UNIQUE NOT NULL,
    SENHA VARCHAR(32) NOT NULL,
    TELEFONE VARCHAR(20) NOT NULL,
    ADM BIT DEFAULT 0,
    DESCRICAO_USER VARCHAR(150)
);

CREATE TABLE TAGS(
    ID_TAG INT AUTO_INCREMENT PRIMARY KEY,
    NOME VARCHAR(50) NOT NULL
);

-- criar procedure para apgar primeiro as menções do post em tags

CREATE TABLE POST(
    ID_POST INT AUTO_INCREMENT PRIMARY KEY ,
    ID_CONTA INT,
    TITULO VARCHAR(30)  NOT NULL,
    DESCRICAO VARCHAR(200)  NOT NULL,
    VALOR FLOAT NOT NULL,
    DOACAO VARCHAR(50),
    CONTATO VARCHAR(255)  NOT NULL,
    POST_DATE DATETIME NOT NULL DEFAULT NOW(),
    APROVADO BIT DEFAULT 0,
    REPUTACAO INT DEFAULT 0,
    FOREIGN KEY (ID_CONTA) REFERENCES USUARIO(ID_CONTA)
);

CREATE TABLE POST_TAG(
    ID_POST INT  NOT NULL,
    ID_TAG INT  NOT NULL,
    FOREIGN KEY (ID_POST) REFERENCES POST(ID_POST),
    FOREIGN KEY (ID_TAG) REFERENCES TAGS(ID_TAG)
);

CREATE TRIGGER DEL_REL_POST_TAG
BEFORE DELETE ON POST 
FOR EACH ROW
    DELETE FROM POST_TAG WHERE ID_POST = ID_POST;


insert into USUARIO (ID_CONTA, NOME, EMAIL, SENHA, TELEFONE, DESCRICAO_USER) values (null, 'A DA SILVA', 'a@a.cum', 'b', '123', 'desc'),
                                                                              (null, 'A A DA SILVA', 'a@a.teste', 'c', '456', 'des'),
                                                                              (null, 'A TESTE DA SILVA', 'a@a.teste1', 'd', '789', 'de');
insert into TAGS values (null, 'animal'),
                        (null, 'gato'),
                        (null, 'cavalo');

insert into TAGS values (null, 'humanitario');
insert into POST (ID_POST, ID_CONTA, TITULO, DESCRICAO, VALOR, DOACAO, CONTATO) values (null, 1, 'a', 'b', 50, '','c');
insert into POST_TAG values (1,1);
insert into POST_TAG values (1,2);
