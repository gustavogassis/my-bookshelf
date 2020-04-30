<?php

    require_once "database-book.php";
    require_once "validation.php";

    $input = $_POST;

    $book = selectBookById($input["id"]);

    deleteBook($book["id"]);
    unlink($book["capa"]);//mandar caso houver erro

    $message = [];
    $message[] = sprintf("O livro <b>%s</b> foi apagado com sucesso", $book["titulo"]);

    redirect("index.php", $message);

?>