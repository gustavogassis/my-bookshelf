<?php

    require_once "database-book.php";
    require_once "validation.php";

    $idBook = explode(",", $_POST["idLivros"]);

    $message = [];

    foreach ($idBook as $id) {
        $book = selectBookById($id);

        deleteBook($book["id"]);
        unlink($book["capa"]);//mandar caso houver erro

        $message[] = sprintf("O livro <b>%s</b> foi apagado com sucesso", $book["titulo"]);
    }

    redirect("index.php", $message);

?>