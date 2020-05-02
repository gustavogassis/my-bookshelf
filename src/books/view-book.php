<?php

    require_once "database-book.php";
    require_once "validation.php";
    require_once "../login/check-login.php";

    isLogged();

    $data = selectBookById($_POST["id"]);
?>

<!doctype html>
<html lang="pt-br">
    <head>
        <title>My Bookshelf - <?= $data["titulo"] ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../css/reset.css" />
        <link rel="stylesheet" href="../../css/layout.css" />
        <link rel="stylesheet" href="../../css/button.css" />
        <link rel="stylesheet" href="../../css/form.css" />
        <link rel="stylesheet" href="../../css/table.css" />
    </head>
    <body>
        <div class="container">
            <header class="header">
                <h1 class="header__logo"><a href="../dashboard/index.php">My Bookshelf</a></h1>
                <form action="../login/logout.php" method="post">
                    <button class="button header__button">Logout</button>
                </form>
            </header>
            <main class="content">
                <h2 class="content__title"><?= $data["titulo"] ?></h2>

                <div class="form">
                    <div class="form__group">
                        <label class="form__label" for="titulo">Título</label>
                        <div class="form__value">
                            <div class="form__control form__control--view">
                                <?= $data["titulo"]; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form__group">
                        <label class="form__label" for="autor">Autor(es)</label>
                        <div class="form__value">
                            <div class="form__control form__control--view">
                                <?= $data["autor"]; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form__group">
                        <label class="form__label" for="paginas">Número de páginas</label>
                        <div class="form__value">
                            <div class="form__control form__control--view">
                                <?= $data["paginas"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form__group">
                        <label class="form__label" for="genero" >Gênero</label>
                        <div class="form__value">
                            <div class="form__control form__control--view">
                                <?= $data["genero"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form__group">
                        <label class="form__label" for="nacional">Publicação Nacional?</label>
                        <div class="form__value">
                            <div class="form__control form__control--view">
                                <?= $data["nacional"] == "S" ? "Sim" : "Não" ?>
                            </div>
                        </div>
                    </div>

                    <div class="form__group">
                        <span class="form__label">Capa</span>
                        <div class="form__value">
                            <div class="form__control form__control--view">
                                <img class="table__img" src="<?= $data["capa"] ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="form__group">
                        <label class="form__label" for="editora">Editora</label>
                        <div class="form__value">
                            <div class="form__control form__control--view">
                                <?= $data["editora"] ?>
                            </div>
                        </div>
                    </div>

                    <div class="form__group">
                        <label class="form__label" for="descricao">Descrição</label>
                        <div class="form__value">
                            <div class="form__control form__control--view">
                                <?= $data["descricao"] ?>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
            <footer class="footer">
                <p class="footer__text">&copy;2020 Copyright: mybookshelf.com</p>
            </footer>
        </div>
    </body>
</html>