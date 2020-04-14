<?php

require_once 'db_config.php';

function selectPermittedGenres($dsn) {

    $conn = new PDO($dsn, DB_USER, DB_PASSWORD);

    $sql = "SELECT nome FROM generos";
    $stmt = $conn->prepare($sql);
    $flag = $stmt->execute();
    $listGenres = [];

    while ($row = $stmt->fetch()) {
        ['nome' => $nome] = $row;
        $listGenres[] = $nome;
    }
    return $listGenres;
}

$listGenres = selectPermittedGenres($dsn);

?>