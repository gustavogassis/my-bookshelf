<!doctype html>
<html lang="pt-br">
    <head>
        <title>My Bookshelf - Cadastro de Livros</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../css/form.css" />
    </head>
    <body>
        <div class="container">
            <header>
                    <h1>My Bookshelf</h1>
                    <!-- <img src="../icons/user-solid.svg"/> -->
            </header>
            <main>
                <h2>Cadastro de Livros</h2>

                <div class="form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form__group">
                            <label class="form__label" for="titulo">Título</label>
                            <div class="form__value">
                                <input type="text" class="form__control form__control--xxlarge" name="titulo" id="titulo" value="Capitães de Areia" autofocus />
                                <div class="form__error">Esse campo é obrigatório.</div>
                            </div>
                        </div>

                        <div class="form__group">
                            <label class="form__label" for="autor">Autor(es)</label>
                            <div class="form__value">
                                <input type="text" class="form__control form__control--xlarge" name="autor" id="autor" />
                                <div class="form__error">Esse campo é obrigatório.</div>
                            </div>
                        </div>

                        <div class="form__group">
                            <label class="form__label" for="paginas">Número de páginas</label>
                            <div class="form__value">
                                <input type="text" class="form__control form__control--xxsmall" name="paginas" id="paginas" />
                                <div class="form__error">Esse campo é obrigatório.</div>
                            </div>
                        </div>

                        <div class="form__group">
                            <label class="form__label" for="genero" >Gênero</label>
                            <div class="form__value">
                                <select name="genero" class="form__control form__control--xlarge" id="genero" multiple size="4">
                                    <option value="aventura">Aventura</option>
                                    <option value="biografia">Biografia</option>
                                    <option value="conto">Conto</option>
                                    <option value="crônica">Crônica</option>
                                    <option value="distopia">Distopia</option>
                                    <option value="drama">Drama</option>
                                    <option value="fantasia">Fantasia</option>
                                    <option value="ficção">Ficção</option>
                                    <option value="poesia">Poesia</option>
                                    <option value="romance">Romance</option>
                                    <option value="terror">Terror</option>
                                </select>
                                <div class="form__help">Pressione Ctrl para selecionar mais de um gênero</div>
                                <div class="form__error">Esse campo é obrigatório.</div>
                            </div>
                        </div>

                        <div class="form__group">
                            <label class="form__label" for="nacional">Publicação Nacional?</label>
                            <div class="form__value">
                                <input type="checkbox" class="form__control" name="nacional" id="nacional" />
                                <div class="form__error">Esse campo é obrigatório.</div>
                            </div>
                        </div>

                        <div class="form__group">
                            <label class="form__label" for="capa">Capa</label>
                            <div class="form__value">
                                <input type="file" class="form__control form__control--xlarge" name="capa" id="capa">
                                <div class="form__error">Esse campo é obrigatório.</div>
                            </div>
                            <!-- <img src="../icons/paperclip-solid.svg"/> -->
                        </div>

                        <div class="form__group">
                            <label class="form__label" for="editora">Editora</label>
                            <div class="form__value">
                                <input type="text" class="form__control form__control--xlarge" name="editora" id="editora">
                                <div class="form__error">Esse campo é obrigatório.</div>
                            </div>
                        </div>

                        <div class="form__group">
                            <label class="form__label" for="descricao">Descrição</label>
                            <div class="form__value">
                                <textarea name="descricao" class="form__control form__control--xxlarge" id="descricao" cols="30" rows="5"></textarea>
                                <div class="form__error">Esse campo é obrigatório.</div>
                            </div>
                        </div>

                        <div>
                            <input type="reset" value="Limpar">
                            <input type="submit" value="Salvar">
                        </div>
                    </form>
                </div>

            </main>
            <footer>
                <p>&copy;2020 Copyright: mybookshelf.com</p>
            </footer>
        </div>
    </body>
</html>