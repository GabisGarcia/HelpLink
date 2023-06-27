CREATE DATABASE HelpLink;

USE HelpLink;
/* SET GLOBAL event_scheduler = ON;
--  tabelas básicas - FEITO
-- Hierarquia de tabelas- FEITO
-- popular tabelas
-- triggers
-- procedures
-- views
-- users
DELIMITER $$
CREATE EVENT DELETE_CODIGOS
ON SCHEDULE EVERY 10 MINUTE
ON COMPLETION PRESERVE
DO BEGIN
    DELETE FROM CODIGOS WHERE DATA_DE_CRIACAO < (NOW() - INTERVAL 10 MINUTE);
END $$

DELIMITER ; */


-- Senha criptografada em MD5
CREATE TABLE USUARIO(
    ID_CONTA INT AUTO_INCREMENT PRIMARY KEY,
    NOME VARCHAR(55) NOT NULL,
    EMAIL VARCHAR(50) UNIQUE NOT NULL,
    SENHA VARCHAR(32) NOT NULL,
    TELEFONE VARCHAR(11) UNIQUE NOT NULL,
    ADM BIT DEFAULT 0,
    DESCRICAO_USER VARCHAR(255)
);

CREATE TABLE TAGS(
    ID_TAG INT AUTO_INCREMENT PRIMARY KEY,
    NOME VARCHAR(23) NOT NULL
);


CREATE TABLE POST(
    ID_POST INT AUTO_INCREMENT PRIMARY KEY ,
    ID_CONTA INT,
    TITULO VARCHAR(55)  NOT NULL,
    DESCRICAO VARCHAR(5000)  NOT NULL,
    VALOR FLOAT NOT NULL,
    DOACAO VARCHAR(255),
    CONTATO VARCHAR(255)  NOT NULL,
    POST_DATE DATETIME NOT NULL DEFAULT NOW(),
    APROVADO BIT DEFAULT 0,
    REPUTACAO INT DEFAULT 0,
    CAMINHO_IMAGEM VARCHAR(255) UNIQUE,
    FOREIGN KEY (ID_CONTA) REFERENCES USUARIO(ID_CONTA)
);


CREATE TABLE LIKES(
    ID_CONTA INT NOT NULL,
    ID_POST INT NOT NULL,
    FOREIGN KEY (ID_CONTA) REFERENCES USUARIO(ID_CONTA),
    FOREIGN KEY (ID_POST) REFERENCES POST(ID_POST)
);

CREATE TABLE POST_TAG(
    ID_POST INT  NOT NULL,
    ID_TAG INT  NOT NULL,
    FOREIGN KEY (ID_POST) REFERENCES POST(ID_POST),
    FOREIGN KEY (ID_TAG) REFERENCES TAGS(ID_TAG)
);

CREATE TABLE CODIGOS(
    ID_CONTA INT NOT NULL,
    CODIGO INT NOT NULL,
    DATA_DE_CRIACAO DATETIME NOT NULL DEFAULT NOW(),
    FOREIGN KEY (ID_CONTA) REFERENCES USUARIO(ID_CONTA), 
    PRIMARY KEY (ID_CONTA, CODIGO)
);

CREATE TRIGGER DEL_REL_POST_TAG
BEFORE DELETE ON POST 
FOR EACH ROW
    DELETE FROM POST_TAG WHERE ID_POST = ID_POST;


insert into USUARIO (ID_CONTA, NOME, EMAIL, SENHA, TELEFONE, ADM, DESCRICAO_USER) values                                -- SENHA = 1
                                                                                (1, 'Lucas', 'lucas.alt40@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '16996201245', 0, 'Melhor 2 pedras no caminho do que 1 no rim. Beba água'),
                                                                                (2, 'Gabriele', 'garciagabriele@hotmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '16996159113', 0, 'Sou inteligente e dedicada <3'),
                                                                                (3, 'Letícia', 'snches.lauren@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '16996218097', 0,'Adoro feios *-*'),
                                                                                (4, 'Gabriel', 'gabriel@email.com', 'c4ca4238a0b923820dcc509a6f75849b', '16997479217', 0,'descricao do gabriel'),
                                                                                (5, 'Marcelo', 'marcelo@email.com', 'c4ca4238a0b923820dcc509a6f75849b', '16981944022', 0,'descricao do Marcelo'),
                                                                                (6, 'Admin', 'admin@email.com', 'c4ca4238a0b923820dcc509a6f75849b', '1640028922', 1,'O rei desse software, não errem ou seram banidos. Leiam a EULA.');
insert into TAGS values (null, 'Animal'),
                        (null, 'Estudos'),
                        (null, 'Humanitário'),
                        (null, 'Saúde'),
                        (null, 'Cirurgias'),
                        (null, 'Medicamentos'),
                        (null, 'Comunitário'),
                        (null, 'Alimentação'),
                        (null, 'Caridade'),
                        (null, 'Funeral'),
                        (null, 'Família'),
                        (null, 'Esportes'),
                        (null, 'Emergência'),
                        (null, 'Desaparecidos'),
                        (null, 'Outros');

insert into POST (ID_POST, ID_CONTA, TITULO, DESCRICAO, VALOR, DOACAO, CONTATO) values (null, 1, 'a', 'b', 50, '','c');
insert into POST_TAG values (1,1);
insert into POST_TAG values (1,2);
