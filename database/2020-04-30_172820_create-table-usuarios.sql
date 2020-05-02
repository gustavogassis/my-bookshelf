-- Up
CREATE TABLE usuarios (
	id INT AUTO_INCREMENT NOT NULL,
    nome VARCHAR(70) NOT NULL,
    email VARCHAR(70) NOT NULL,
    senha VARCHAR(50) NOT NULL,
 	data_cadastro TIMESTAMP,
	ultimo_acesso TIMESTAMP,
    PRIMARY KEY(id)
) DEFAULT CHARSET = utf8;

--Down
DROP TABLE usuarios;