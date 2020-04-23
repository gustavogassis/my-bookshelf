<?php

    require_once "database-book.php";
    require_once "validation.php";

    $input = $_POST;
    deleteBook($input['id']);
    unlink($input["capa"]);

    $message = sprintf("O livro %s foi apagado com sucesso", $input['titulo']);

    redirect("index.php", $message);

?>