<?php

require_once '../config/database.php';

function connect() {
    $conection = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    return $conection;
}

function insertBook($data) {
    try {

        $idBook = insertTableBook($data);

        associateGenres($data['genero'], $idBook);

        associateAuthor($idBook, $data['autor']);


        return ["success" => true, "message" => sprintf("O livro <span class='alert__strong'>%s</span> foi cadastrado com sucesso", $data["titulo"])];

    }catch (PDOException $e) {
        return ["success" => false, "message" => "Houve um problema na conexão. Entre em contato com a central de atendimento!"];
    }
}

function insertTableBook($data) {
    $conn = connect();

    $sql = "INSERT INTO livros (titulo, capa, descricao, paginas, nacional, editora, data_cadastro, data_atualizacao)
    VALUES (:title, :cover, :descriptions, :pages, :nacional, :publisher, :dateRegister, :dateUpdate)";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':title', $data["titulo"], PDO::PARAM_STR);
    $stmt->bindValue(':cover', $data["capa"], PDO::PARAM_STR);
    $stmt->bindValue(':descriptions', $data["descricao"], PDO::PARAM_STR);
    $stmt->bindValue(':pages', $data["paginas"], PDO::PARAM_INT);
    $stmt->bindValue(':nacional', $data["nacional"], PDO::PARAM_STR);
    $stmt->bindValue(':publisher', $data["editora"], PDO::PARAM_STR);
    $stmt->bindValue(':dateRegister', $data["data_cadastro"], PDO::PARAM_STR);
    $stmt->bindValue(':dateUpdate', $data["data_cadastro"], PDO::PARAM_STR);

    $flag = $stmt->execute();

    $idBook = $conn->lastInsertId();

    return $idBook;
}

function associateGenres($idGenres, $idBook) {
    $conn = connect();

    foreach($idGenres as $idGenre) {
        $sql = "INSERT INTO pertence (id_livro, id_genero) VALUES (:id_livro, :idGenre)";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id_livro', $idBook, PDO::PARAM_INT);
        $stmt->bindValue(':idGenre', $idGenre, PDO::PARAM_INT);
        $stmt->execute();
    }
}

function associateAuthor($idBook, $author) {
    $conn = connect();

    // 1. verifica se o autor existe
    $idAuthor = getIdAuthor($author);

    // 2. se não existe insere
    if (! $idAuthor) {
        $idAuthor = insertAuthor($author);
    }

    // 3. associa com o livro
    $sql = "INSERT INTO escrito_por (id_livro, id_escritor) VALUES (:idBook, :idAuthor)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':idBook', $idBook, PDO::PARAM_INT);
    $stmt->bindValue(':idAuthor', $idAuthor, PDO::PARAM_INT);
    $stmt->execute();
}

function getIdAuthor($author) {
    $conn = connect();

    $sql = "SELECT id FROM escritores WHERE nome = '$author'";
    $stmt = $conn->prepare($sql);
    $flag = $stmt->execute();
    $result = $stmt->fetch();
}

function insertAuthor($author) {
    $conn = connect();

    $sql = "INSERT INTO escritores (nome) VALUES (:author)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':author', $author, PDO::PARAM_STR);
    $stmt->execute();

    $idAuthor = $conn->lastInsertId();

    return $idAuthor;
}


function selectBooks() {
    try {
        $conn = connect();

        $sql = "SELECT l.*, GROUP_CONCAT(g.nome SEPARATOR ', ') as genero, e.nome as autor
            FROM livros AS l
                JOIN pertence AS p
                ON l.id = p.id_livro
                JOIN generos AS g
                ON g.id = p.id_genero
                JOIN escrito_por AS ep
                ON l.id = ep.id_livro
                JOIN escritores AS e
                ON e.id = ep.id_escritor
                GROUP BY l.titulo
                ORDER BY l.data_cadastro DESC;";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = [];

        while ($row = $stmt->fetch()) {
            $result[] = $row;
        }

        return ["success" => true, "value" => $result];// retirar e fazer else no html

    }catch (PDOException $e) {

    }
}

function deleteBook($id) {
    try {

        deleteRowLivros($id);
        deleteRowPertence($id);
        deleteRowEscritoPor($id);

    }catch (PDOException $e) {

    }
}

function deleteRowLivros($id) {
    try {
        $conn = connect();

        $sql = "delete from livros where id = $id;";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

    }catch (PDOException $e) {

    }
}

function deleteRowPertence($id) {
    try {
        $conn = connect();

        $sql = "delete from pertence where id_livro = $id;";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

    }catch (PDOException $e) {

    }
}

function deleteRowEscritoPor($id) {
    try {
        $conn = connect();

        $sql = "delete from escrito_por where id_livro = $id;";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return ["success" => true, "value" => $result];// retirar e fazer else no html

    }catch (PDOException $e) {

    }
}


?>