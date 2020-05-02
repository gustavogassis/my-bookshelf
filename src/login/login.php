<?php

    require_once "./validation-login.php";
    require_once "./database-login.php";

    $input = $_POST;

    $validation = [];
    $validation[] = notEmpty($input["email"], "email");
    $validation[] = maxSize($input["email"], 70, "email");
    $validation[] = isEmail($input["email"], "email");

    $validation[] = notEmpty($input["senha"], "senha");
    $validation[] = maxSize($input["senha"], 50, "senha");

    if (validationFails($validation)) {
        redirectError(validationErrors($validation), $input["email"], "./index.php");
        exit;
    }

    $input["senha"] = crypt($input["senha"], "password");

    $result = validLogin($input["email"], $input["senha"]);

    if (!$result["success"]) {
        redirectError([$result["message"]], $input["email"], "./index.php");
        exit;
    }

    $data = $result["data"];

    session_start();
    $_SESSION["user"] = $data["nome"];
    $_SESSION["email"] = $data["email"];

    header("Location: ../dashboard/index.php");

?>