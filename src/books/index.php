<?php
require_once "database-book.php";

$message = 0;
if (isset($_COOKIE["message"])) {
    $message = unserialize($_COOKIE["message"]);
    setcookie("message", "", time() - 3600);
}

$result = selectBooks()["value"];

?>

<!doctype html>
<html lang="pt-br">
    <head>
        <title>My Bookshelf - Meus Livros</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../css/reset.css" />
        <link rel="stylesheet" href="../../css/paginator.css" />
        <link rel="stylesheet" href="../../css/layout.css" />
        <link rel="stylesheet" href="../../css/button.css" />
        <link rel="stylesheet" href="../../css/table.css" />
    </head>
    <body>
        <div class="container">
            <header class="header">
                <h1 class="header__logo"><a href="../dashboard/index.php">My Bookshelf</a></h1>
            </header>
            <main class="content">
                <h2 class="content__title">Meus Livros</h2>

                <?php if ($message) : ?>
                    <div class="alert"><?= $message ?></div>
                <?php endif; ?>

                <div class="toolbar">
                    <a class="button button--primary toolbar__item" href="create-book.php">Cadastrar</a>
                    <button class="button toolbar__item">Apagar selecionados</button>
                </div>

                <?php if ($result) :?>
                    <table class="table">
                        <thead class="table__header">
                            <tr>
                                <th class="table__data-header">
                                    <input type="checkbox" id="select-all" />
                                </th>
                                <th class="table__data-header">Capa</th>
                                <th class="table__data-header">Título</th>
                                <th class="table__data-header">Autor</th>
                                <th class="table__data-header">Gênero</th>
                                <th class="table__data-header">Editora</th>
                                <th class="table__data-header">Páginas</th>
                                <th class="table__data-header">Nacional</th>
                                <th class="table__data-header">Descrição</th>
                                <th class="table__data-header">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php foreach ($result as $row) : ?>
                            <tr class="table__row">
                                <td data-th="Selecione" class="table__data">
                                    <input type="checkbox" id="<?= $row["id"] ?>" />
                                </td>
                                <td data-th="Capa" class="table__data">
                                    <img src="<?= $row["capa"] ?>" class="table__img">
                                </td>
                                <td data-th="Título" class="table__data"><?= $row["titulo"] ?></td>
                                <td data-th="Autor" class="table__data"><?= $row["autor"] ?></td>
                                <td data-th="Gênero" class="table__data"><?= $row["genero"] ?></td>
                                <td data-th="Editora" class="table__data"><?= $row["editora"] ?></td>
                                <td data-th="Páginas" class="table__data"><?= $row["paginas"] ?></td>
                                <td data-th="Nacional" class="table__data"><?= $row["nacional"] == "S" ? "Sim" : "Não" ?></td>
                                <td data-th="Descrição" class="table__data"><?= substr($row["descricao"], 0, 50) . "..." ?></td>
                                <td data-th="Ações" class="table__data  actions">
                                    <button class="button button--small">Visualizar</button>
                                    <button class="button button--small">Editar</button>
                                    <form action="./delete-book.php" method="post">
                                        <input type="hidden" name="id" value="<?= $row["id"] ?>" />
                                        <input type="hidden" name="titulo" value="<?= $row["titulo"] ?>" />
                                        <input type="hidden" name="capa" value="<?= $row["capa"] ?>" />
                                        <button class="button button--small" type="submit">Remover</button>
                                    </form>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div class="alert alert--error">Ainda não há nenhum livro cadastrado</div>
                <?php endif; ?>

                <ul class="paginator">
                    <li class="paginator__item">
                        <a href="#" class="paginator__link">Anterior</a>
                    </li>
                    <li class="paginator__item">
                        <a href="#" class="paginator__link">1</a>
                    </li>
                    <li class="paginator__item">
                        <a href="#" class="paginator__link paginator__link--active">2</a>
                    </li>
                    <li class="paginator__item">
                        <a href="#" class="paginator__link">3</a>
                    </li>
                    <li class="paginator__item">
                        <a href="#" class="paginator__link">Próximo</a>
                    </li>
                </ul>
            </main>
            <footer class="footer">
                    <p class="footer__text">&copy2020 Copyright: mybookshelf.com</p>
            </footer>
        </div>
    </body>
</html>