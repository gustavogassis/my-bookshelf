-- Up
CREATE TABLE escritores (
	id INT AUTO_INCREMENT NOT NULL,
    nome VARCHAR(50) NOT NULL,
	PRIMARY KEY(id)
) DEFAULT CHARSET = utf8;

-- Down
DROP TABLE escritores;