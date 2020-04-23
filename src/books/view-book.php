<?php
require_once "../config/operations.php";
require_once "../config/database.php";
require_once "validation.php";

$listIdGenres = selectPermittedGenres()['id'];
$listGenres = selectPermittedGenres()['genre'];

[$formdata, $errors] = validationData();


?>

<!doctype html>
<html lang="pt-br">
    <head>
        <title>My Bookshelf - Cadastro de Livros</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../css/reset.css" />
        <link rel="stylesheet" href="../../css/layout.css" />
        <link rel="stylesheet" href="../../css/button.css" />
        <link rel="stylesheet" href="../../css/form.css" />
    </head>
    <body>
        <div class="container">
            <header class="header">
                <h1 class="header__logo"><a href="../dashboard/index.php">My Bookshelf</a></h1>
            </header>
            <main class="content">
                <h2 class="content__title">Cadastro de Livros</h2>

                <?php if (count($errors) > 0) : ?>
                    <ul class="alert alert--error">
                        <?php foreach ($errors as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="form">
                    <form action="./insert-book.php" method="post" enctype="multipart/form-data">
                        <div class="form__group">
                            <label class="form__label" for="titulo">Título</label>
                            <div class="form__value">
                                <input type="text" class="form__control" name="titulo" id="titulo" value="<?= $formdata['titulo'] ?? '' ?>" autofocus />
                                <div class="form__error">Esse campo é obrigatório.</div>
                            </div>
                        </div>

                        <div class="form__group">
                            <label class="form__label" for="autor">Autor(es)</label>
                            <div class="form__value">
                                <input type="text" class="form__control" name="autor" id="autor" value="<?= $formdata['autor'] ?? '' ?>" />
                                <div class="form__error">Esse campo é obrigatório.</div>
                            </div>
                        </div>

                        <div class="form__group">
                            <label class="form__label" for="paginas">Número de páginas</label>
                            <div class="form__value">
                                <input type="number" pattern="[0-9]*" inputmode="numeric" class="form__control form__control--small" name="paginas" id="paginas" value="<?= $formdata['paginas'] ?? '' ?>" />
                                <div class="form__error">Esse campo é obrigatório.</div>
                            </div>
                        </div>

                        <div class="form__group">
                            <label class="form__label" for="genero" >Gênero</label>
                            <div class="form__value">
                                <select name="genero[]" class="form__control" id="genero" multiple size="4">
                                    <?php foreach ($listGenres as $genre) : ?>
                                        <?php $selected = in_array($genre['id'], $formdata['genero']) ? "selected" : ""; ?>
                                        <option value="<?= $genre['id'] ?>" <?= $selected ?> ><?= $genre['genre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="form__help">Pressione Ctrl para selecionar mais de um gênero</div>
                                <div class="form__error">Esse campo é obrigatório.</div>
                            </div>
                        </div>

                        <div class="form__group">
                            <label class="form__label" for="nacional">Publicação Nacional?</label>
                            <div class="form__value">
                                <?php $checked = isset($formdata['nacional']) ? 'checked' : '' ?>
                                <input type="checkbox" class="form__control check__control" name="nacional" id="nacional" <?= $checked ?>  />
                                <div class="form__error">Esse campo é obrigatório.</div>
                            </div>
                        </div>

                        <div class="form__group">
                            <span class="form__label">Capa</span>
                            <div class="form__value">
                                <label class="form__label-file form__control" for="capa">Selecione um arquivo</label>
                                <input type="file" class="form__control form__control-file" name="capa" id="capa">
                                <div class="form__error">Esse campo é obrigatório.</div>
                            </div>
                            <!-- <img src="../icons/paperclip-solid.svg"/> -->
                        </div>

                        <div class="form__group">
                            <label class="form__label" for="editora">Editora</label>
                            <div class="form__value">
                                <input type="text" class="form__control" name="editora" id="editora" value="<?= $formdata['editora'] ?? '' ?>" />
                                <div class="form__error">Esse campo é obrigatório.</div>
                            </div>
                        </div>

                        <div class="form__group">
                            <label class="form__label" for="descricao">Descrição</label>
                            <div class="form__value">
                                <textarea name="descricao" class="form__control" id="descricao" cols="30" rows="5" ><?= $formdata['descricao'] ?? '' ?></textarea>
                                <div class="form__error">Esse campo é obrigatório.</div>
                            </div>
                        </div>

                        <div class="form__action">
                            <input type="reset" class="button" value="Limpar">
                            <input type="submit" class="button button--primary" value="Salvar">
                        </div>
                    </form>
                </div>

            </main>
            <footer class="footer">
                <p class="footer__text">&copy;2020 Copyright: mybookshelf.com</p>
            </footer>
        </div>
    </body>
</html>