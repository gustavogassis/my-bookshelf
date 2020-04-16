<?php

require_once 'db_config.php';

function selectPermittedGenres($dsn) {

    $conn = new PDO($dsn, DB_USER, DB_PASSWORD);

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

$listIdGenres = selectPermittedGenres($dsn)['id'];
$listGenres = selectPermittedGenres($dsn)['genre'];
?>