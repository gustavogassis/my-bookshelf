<!doctype html>
<html lang="pt-br">
    <head>
        <title>My Bookshelf - Meus Livros</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../css/main.css" />
    </head>
    <body>
        <div class="main">
            <header>
                <h1>My Bookshelf</h1>
                <!-- <img src="icons/user-solid.svg"/> -->
            </header>
            <main>
                <h2>Meus Livros</h2>

                <div>O livro <span>Apanhador no Campo de Centeio</span> foi cadastrado com sucesso!</div>

                <div>
                    <a href="create-book.php">Cadastre um novo livro</a>
                    <button>Apagar selecionados</button>
                </div>

                <div>
                    <table>
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th>Capa</th>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Gênero</th>
                                <th>Editora</th>
                                <th>Páginas</th>
                                <th>Nacional</th>
                                <th>Descrição</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox" id="1"/>
                                </td>
                                <td>
                                    <img src="https://via.placeholder.com/60x80?text=Capa">
                                </td>
                                <td>Capitães de Areia</td>
                                <td>Jorge Amado</td>
                                <td>Romance</td>
                                <td>Globo</td>
                                <td>280</td>
                                <td>Sim</td>
                                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</td>
                                <td>
                                    <button>Visualizar</button>
                                    <button>Editar</button>
                                    <button>Remover</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

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
            <footer>
                    <p>&copy2020 Copyright: mybookshelf.com</p>
            </footer>
        </div>
    </body>
</html>