-- Up
CREATE TABLE pertence (
	id INT AUTO_INCREMENT NOT NULL,
    id_livro INT NOT NULL,
    id_genero INT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_livro) 	REFERENCES livros(id),
    FOREIGN KEY (id_genero) REFERENCES generos(id)
) DEFAULT CHARSET = utf8;

-- Down
DROP TABLE pertence;