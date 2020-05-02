-- Up
INSERT INTO usuarios
		(nome, email, senha, data_cadastro, ultimo_acesso)
    VALUES
		('Gustavo', 'gassis25@gmail.com', 'paDcxpzhMuQVk', NOW(), NOW());

--Down
DELETE FROM usuarios WHERE id = 1;