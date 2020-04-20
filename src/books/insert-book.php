<?php

    require_once "../config/operations.php";
    require_once "validation.php";
    require_once "database-book.php";

    date_default_timezone_set("America/Sao_Paulo");

    $input = $_POST;

    $validation = [];
    $validation[] = notEmpty($input["titulo"], "título");
    $validation[] = maxSize($input["titulo"], 70, "título");

    $validation[] = notEmpty($input["autor"], "autor");
    $validation[] = maxSize($input["autor"], 70, "autor");

    $validation[] = notEmpty($input["paginas"], "páginas");
    $validation[] = isNumeric($input["paginas"], "páginas");
    $validation[] = lessThan($input["paginas"], 1000, "páginas");

    $validation[] = notEmpty($input["genero"], "gênero");
    $validation[] = maxSize($input["genero"], 100, "gênero");
    $validation[] = inList(selectPermittedGenres()["id"], $input["genero"], "gênero");

    $validation[] = notEmptyFile($_FILES["capa"], "capa");
    $validation[] = validExtension($_FILES["capa"], "capa");
    $validation[] = maxSizeFile($_FILES["capa"], 5000000, "capa");

    $validation[] = notEmpty($input["editora"], "editora");
    $validation[] = maxSize($input["editora"], 100, "editora");

    $validation[] = notEmpty($input["descricao"], "descricao");
    $validation[] = maxSize($input["descricao"], 1000, "descrição");

    if (validationFails($validation)) {
        redirectError(validationErrors($validation), $input, "create-book.php");
        exit;
    }


    $input["paginas"] = intval($input["paginas"]);
    $input["nacional"] = isset($input["nacional"]) ? "S" : "N";
    $input["capa"] = sprintf("../files/cover/%s", $_FILES["capa"]["name"]);
    $input["data_cadastro"] = date("Y-m-d H:i:s");

    //move_uploaded_file($_FILES["capa"]["tmp_name"], "../files/cover/$filename");

    $insert = insertBook($input);

    if (! $insert['success']) {
        redirectError([$insert["message"]], $input, 'create-book.php');
        exit;
    }

    // 7. o livro foi inserido na base de dados com sucesso e redireciona-se para
    // a página de listagem com a mensagem de feedback de sucesso.

    redirect('index.php', $insert);

    function redirect($page, $message)
    {
        setcookie('message', serialize($message));
        header("Location: $page");
    }

?>