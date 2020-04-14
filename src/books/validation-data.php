<?php

    require_once 'validation.php';
    $genre = ["aventura", "biografia", "conto", "crônica", "distopia", "drama", "fantasia",
    "ficção", "poesia", "romance", "terror"];

    $input = $_POST;

    $validation = [];
    $validation[] = notEmpty($input['titulo'], 'título');
    $validation[] = maxSize($input['titulo'], 70,'título');

    $validation[] = notEmpty($input['autor'], 'autor');
    $validation[] = maxSize($input['autor'], 70,'autor');

    $validation[] = notEmpty($input['paginas'], 'páginas');
    $validation[] = isNumeric($input['paginas'], 'páginas');
    $validation[] = lessThan($input['paginas'], 1000, 'páginas');

    $validation[] = notEmpty($input['genero'], 'gênero');
    $validation[] = maxSize($input['genero'], 100,'gênero');
    $validation[] = inList($genre, $input['genero'], 'gênero');//tornar genérico

    $validation[] = notEmptyFile($_FILES['capa'], 'capa');
    $validation[] = validExtension($_FILES['capa'], 'capa');
    $validation[] = maxSizeFile($_FILES['capa'], '128M','capa');

    $validation[] = notEmpty($input['editora'], 'editora');
    $validation[] = maxSize($input['editora'], 100,'editora');

    $validation[] = notEmpty($input['descricao'], 'descricao');
    $validation[] = maxSize($input['descricao'], 1000,'descricao');

    $errors = implode('|', validationErrors($validation));

    if (validationFails($validation)) {
        setcookie('errors', $errors);
        setcookie('formdata', serialize($input));
        header('Location: create-book.php');
        exit;
    }

    echo 'dados válidos';
/*
    $titulo = $input["titulo"];
    $autores = $input["autor"];
    $paginas = intval($input["paginas"]);
    $generos = implode($input["genero"], "/");
    $nacional = isset($input["nacional"]) ? "S" : "N";
    $capa = $_FILES["capa"];
    $editora = $input["editora"];
    $descricao = $input["descricao"];

    //move_uploaded_file($_FILES['capa']['tmp_name'], "../files/cover/$filename");

    define("DB_HOST", "host=127.0.0.1");
    define("DB_PORT", "port=3306");
    define("DB_NAME", "dbname=my_bookshelf");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");

    $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s', DB_HOST, DB_PORT, DB_ DBNAME)

    try {
        $conn = new PDO($dsn, USER, PASSWORD);

        $sql = "INSERT INTO generos VALUES (:id, :nome)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', '', PDO::PARAM_INT);
        $stmt->bindValue(':nome', 'Romance', PDO::PARAM_STR);

        $flag = $stmt->execute();

    }
    catch (PDOException $e) {
        echo "Houve um problema na conexão. Entre em contato com a central de atendimento!";
    }
*/
?>