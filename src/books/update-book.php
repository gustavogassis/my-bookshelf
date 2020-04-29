<?php

    require_once "operations.php";
    require_once "validation.php";
    require_once "database-book.php";

    $input = $_POST;

    $validation = [];

    // $file = notEmptyFile($_FILES["capa"], "capa");

    // if ($file["valid"]) {
    //     $validation[] = validExtension($_FILES["capa"], "capa");
    //     $validation[] = maxSizeFile($_FILES["capa"], 5000000, "capa");
    //     $input["capa"] = sprintf("../../files/cover/%s", $_FILES["capa"]["name"]);
    // }

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

    $validation[] = notEmpty($input["editora"], "editora");
    $validation[] = maxSize($input["editora"], 100, "editora");

    $validation[] = notEmpty($input["descricao"], "descricao");
    $validation[] = maxSize($input["descricao"], 1000, "descrição");

    if (validationFails($validation)) {
        redirectError(validationErrors($validation), $input, "edit-book.php");
        exit;
    }


    deleteBook($input['id']);


    $input["paginas"] = intval($input["paginas"]);
    $input["nacional"] = isset($input["nacional"]) ? "S" : "N";
    $input["data_cadastro"] = date("Y-m-d H:i:s");

    $insert = insertBook($input);

    if (! $insert['success']) {
        redirectError([$insert["message"]], $input, 'index.php');
        exit;
    }

    // 7. o livro foi inserido na base de dados com sucesso e redireciona-se para
    // a página de listagem com a mensagem de feedback de sucesso.
    $message = [];
    $message[] = sprintf("O livro <b>%s</b> foi atualizado com sucesso", $input['titulo']);
    redirect('index.php', $message);


?>