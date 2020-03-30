<!doctype html>
<html lang="pt-br">
    <head>
        <title>My Bookshelf - Cadastro de Livros</title>
        <meta charset="utf-8">
    </head>
    <body>
        <div class="container">
            <header>
                    <h1>My Bookshelf</h1>
                    <!-- <img src="../icons/user-solid.svg"/> -->
            </header>
            <main>
                <h2>Cadastro de Livros</h2>
                
                <div>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="titulo">Título</label>
                            <input type="text" name="titulo" id="titulo" autofocus />
                        </div>

                        <div>
                            <label for="autor">Autor(es)</label>
                            <input type="text" name="autor" id="autor" />
                        </div>

                        <div>
                            <label for="paginas">Número de páginas</label>
                            <input type="text" name="paginas" id="paginas" />
                        </div>

                        <div>
                            <label for="genero" >Gênero</label>
                            <select name="genero" id="genero" multiple size="4">
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
                            <div>Pressione Ctrl para selecionar mais de um gênero</div>
                        </div>

                        <div>
                            <label for="nacional">Publicação Nacional?</label>
                            <input type="checkbox" name="nacional" id="nacional" />
                        </div>
                        
                        <div>   
                            <label for="capa">Capa</label>
                            <input type="file" name="capa" id="capa">
                            <!-- <img src="../icons/paperclip-solid.svg"/> -->
                        </div>
                        
                        
                        <div>
                            <label for="editora">Editora</label>
                            <input type="text" name="editora" id="editora">
                        </div>

                        <div>
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" id="descricao" cols="30" rows="5"></textarea>
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