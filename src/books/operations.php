<?php

require_once '../config/database.php';

function selectPermittedGenres() {

    $conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

    $sql = "SELECT id, nome FROM generos";
    $stmt = $conn->prepare($sql);
    $flag = $stmt->execute();
    $listIdGenres = [];
    $listGenres = [];

    while ($row = $stmt->fetch()) {
        ['id' => $id, 'nome'=> $genre] = $row;
        $listIdGenres[] = $id;
        $listGenres[] = ['id' => $id, 'genre' => utf8_encode($genre)];
    }
    return ['id' => $listIdGenres, 'genre' => $listGenres];
}


?>