-- Up
CREATE TABLE escrito_por (
	id INT AUTO_INCREMENT NOT NULL,
    id_livro INT NOT NULL,
    id_escritor INT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_livro) 	REFERENCES livros(id),
    FOREIGN KEY (id_escritor) REFERENCES escritor(id)
) DEFAULT CHARSET = utf8;

-- Down
DROP TABLE escrito_por;