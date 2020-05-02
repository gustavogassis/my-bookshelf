<?php

require_once "../config/database.php";

function connect() {
    $conection = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    return $conection;
}


function selectByEmail($email) {
    $conn = connect();

    $sql = "SELECT * FROM usuarios WHERE email = '$email';";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();

    return $result;
}

function validLogin($email, $pass) {
    $result = selectByEmail($email);

    if (!$result || !($result["senha"] === $pass)) {
        return [
            "success" => false,
            "message" => "Email ou senha inválidos. Tente Novamente!"
        ];
    }

    return [
        "success" => true,
        "message" => "",
        "data"    => $result
    ];
}

?>