<?php

    require_once '../db_config/db_config.php';
    require_once '../db_config/operations.php';
    require_once 'validation.php';

    date_default_timezone_set('America/Sao_Paulo');

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
    $validation[] = inList($listIdGenres, $input['genero'], 'gênero');

    $validation[] = notEmptyFile($_FILES['capa'], 'capa');
    $validation[] = validExtension($_FILES['capa'], 'capa');
    $validation[] = maxSizeFile($_FILES['capa'], 5000000,'capa');

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

    $titulo = $input["titulo"];
    $autores = $input["autor"];
    $paginas = intval($input["paginas"]);
    $id_generos = $input["genero"];
    $nacional = isset($input["nacional"]) ? "S" : "N";
    $capa = $_FILES["capa"];
    $editora = $input["editora"];
    $descricao = $input["descricao"];
    $data_cadastro = new DateTimeImmutable();
    $data_cadastro = $data_cadastro->format('Y-m-d H:i:s');

    $filename = $_FILES['capa']['name'];
    $routeCover = "../files/cover/$filename";
    //move_uploaded_file($_FILES['capa']['tmp_name'], "../files/cover/$filename");

    try {
        $conn = new PDO($dsn, DB_USER, DB_PASSWORD);

        $sql = "INSERT INTO livros (titulo, capa, descricao, paginas, nacional, editora, data_cadastro, data_atualizacao)
                    VALUES (:titulo, :capa, :descricao, :paginas, :nacional, :editora, :data_cadastro, :data_atualizacao)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindValue(':capa', $routeCover, PDO::PARAM_STR);
        $stmt->bindValue(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->bindValue(':paginas', $paginas, PDO::PARAM_INT);
        $stmt->bindValue(':nacional', $nacional, PDO::PARAM_STR);
        $stmt->bindValue(':editora', $editora, PDO::PARAM_STR);
        $stmt->bindValue(':data_cadastro', $data_cadastro, PDO::PARAM_STR);
        $stmt->bindValue(':data_atualizacao', $data_cadastro, PDO::PARAM_STR);

        $flag = $stmt->execute();

        $sql3 = "SELECT id FROM livros WHERE data_cadastro = '$data_cadastro'";
        $stmt = $conn->prepare($sql3);
        $flag3 = $stmt->execute();
        $row = $stmt->fetch();
        $id_livro = $row['id'];

        if (count($id_generos) > 1) {
            foreach($id_generos as $id_genero) {
                $sql4 = "INSERT INTO pertence (id_livro, id_genero) VALUES (:id_livro, :id_genero)";
                $stmt = $conn->prepare($sql4);
                $stmt->bindValue(':id_livro', $id_livro, PDO::PARAM_INT);
                $stmt->bindValue(':id_genero', $id_genero, PDO::PARAM_INT);
                $flag4 = $stmt->execute();
            }
        } else {
            $sql4 = "INSERT INTO pertence (id_livro, id_genero) VALUES (:id_livro, :id_genero)";
            $stmt = $conn->prepare($sql4);
            $stmt->bindValue(':id_livro', $id_livro, PDO::PARAM_INT);
            $stmt->bindValue(':id_genero', $id_generos, PDO::PARAM_INT);
            $flag4 = $stmt->execute();
        }

        $sql5 = "SELECT id FROM escritores WHERE nome = '$autores'";
        $stmt = $conn->prepare($sql5);
        $flag5 = $stmt->execute();
        $result = $stmt->fetch();

        if (!$result){
            $sql6 = "INSERT INTO escritores (nome) VALUES (:nome)";
            $stmt = $conn->prepare($sql6);
            $stmt->bindValue(':nome', $autores, PDO::PARAM_STR);
            $flag6 = $stmt->execute();

            $sql7 = "SELECT id FROM escritores WHERE nome = '$autores'";
            $stmt = $conn->prepare($sql7);
            $flag7 = $stmt->execute();
            $result = $stmt->fetch();
            $id_escritor = $result['id'];
        }else{
            $id_escritor = $result['id'];
        }

        $sql8 = "INSERT INTO escrito_por (id_livro, id_escritor) VALUES (:id_livro, :id_escritor)";
        $stmt = $conn->prepare($sql8);
        $stmt->bindValue(':id_livro', $id_livro, PDO::PARAM_INT);
        $stmt->bindValue(':id_escritor', $id_escritor, PDO::PARAM_INT);
        $flag8 = $stmt->execute();




    }
    catch (PDOException $e) {
        echo "Houve um problema na conexão. Entre em contato com a central de atendimento!";
    }

?>