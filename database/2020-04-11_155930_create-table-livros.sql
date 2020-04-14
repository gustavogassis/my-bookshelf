-- Up
CREATE TABLE livros (
	id INT AUTO_INCREMENT NOT NULL,
    titulo VARCHAR(70) NOT NULL,
    capa VARCHAR(70),
    descricao VARCHAR(1000),
    paginas SMALLINT UNSIGNED,
    nacional ENUM('S','N'),
    editora VARCHAR(100),
 	data_cadastro TIMESTAMP,
	data_atualizacao TIMESTAMP,
    PRIMARY KEY(id)
) DEFAULT CHARSET = utf8;

-- Down
DROP TABLE livros;