<?php

    require_once "../books/database-book.php";

    header("Content-Type: application/json");

    $result = selectAllDistinctsAuthors();
    $authors = [];

    foreach ($result as $author) {
        $authors[] = ["value" => $author["nome"], "data" => $author["nome"]];
    }

    echo json_encode(["suggestions" => $authors]);

?>