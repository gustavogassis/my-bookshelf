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
                <!-- <img src="icons/user-solid.svg"/> -->
            </header>
            <main class="content">
                <h2 class="content__title">Meus Livros</h2>

                <div class="alert">O livro <span class="alert__strong">Apanhador no Campo de Centeio</span> foi cadastrado com sucesso!</div>

                <div class="toolbar">
                    <a class="button button--primary toolbar__item" href="create-book.php">Cadastrar</a>
                    <button class="button toolbar__item">Apagar selecionados</button>
                </div>

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
                        <tr class="table__row">
                            <td data-th="Selecione" class="table__data">
                                <input type="checkbox" id="1"/>
                            </td>
                            <td data-th="Capa" class="table__data">
                                <img src="https://via.placeholder.com/60x80?text=Capa">
                            </td>
                            <td data-th="Título" class="table__data">Capitães de Areia</td>
                            <td data-th="Autor" class="table__data">Jorge Amado</td>
                            <td data-th="Gênero" class="table__data">Romance</td>
                            <td data-th="Editora" class="table__data">Globo</td>
                            <td data-th="Páginas" class="table__data">280</td>
                            <td data-th="Nacional" class="table__data">Sim</td>
                            <td data-th="Descrição" class="table__data">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</td>
                            <td data-th="Ações" class="table__data  actions">
                                <button class="button button--small">Visualizar</button>
                                <button class="button button--small">Editar</button>
                                <button class="button button--small">Remover</button>
                            </td>
                        </tr>

                        <tr class="table__row">
                            <td data-th="Selecione" class="table__data">
                                <input type="checkbox" id="1"/>
                            </td>
                            <td data-th="Capa" class="table__data">
                                <img src="https://via.placeholder.com/60x80?text=Capa">
                            </td>
                            <td data-th="Título" class="table__data">Capitães de Areia</td>
                            <td data-th="Autor" class="table__data">Jorge Amado</td>
                            <td data-th="Gênero" class="table__data">Romance</td>
                            <td data-th="Editora" class="table__data">Globo</td>
                            <td data-th="Páginas" class="table__data">280</td>
                            <td data-th="Nacional" class="table__data">Sim</td>
                            <td data-th="Descrição" class="table__data">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</td>
                            <td data-th="Ações" class="table__data">
                                <button class="button button--small">Visualizar</button>
                                <button class="button button--small">Editar</button>
                                <button class="button button--small">Remover</button>
                            </td>
                        </tr>

                        <tr class="table__row">
                            <td data-th="Selecione" class="table__data">
                                <input type="checkbox" id="1"/>
                            </td>
                            <td data-th="Capa" class="table__data">
                                <img src="https://via.placeholder.com/60x80?text=Capa">
                            </td>
                            <td data-th="Título" class="table__data">Capitães de Areia</td>
                            <td data-th="Autor" class="table__data">Jorge Amado</td>
                            <td data-th="Gênero" class="table__data">Romance</td>
                            <td data-th="Editora" class="table__data">Globo</td>
                            <td data-th="Páginas" class="table__data">280</td>
                            <td data-th="Nacional" class="table__data">Sim</td>
                            <td data-th="Descrição" class="table__data">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</td>
                            <td data-th="Ações" class="table__data  actions">
                                <button class="button button--small">Visualizar</button>
                                <button class="button button--small">Editar</button>
                                <button class="button button--small">Remover</button>
                            </td>
                        </tr>

                        <tr class="table__row">
                            <td data-th="Selecione" class="table__data">
                                <input type="checkbox" id="1"/>
                            </td>
                            <td data-th="Capa" class="table__data">
                                <img src="https://via.placeholder.com/60x80?text=Capa">
                            </td>
                            <td data-th="Título" class="table__data">Capitães de Areia</td>
                            <td data-th="Autor" class="table__data">Jorge Amado</td>
                            <td data-th="Gênero" class="table__data">Romance</td>
                            <td data-th="Editora" class="table__data">Globo</td>
                            <td data-th="Páginas" class="table__data">280</td>
                            <td data-th="Nacional" class="table__data">Sim</td>
                            <td data-th="Descrição" class="table__data">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</td>
                            <td data-th="Ações" class="table__data  actions">
                                <button class="button button--small">Visualizar</button>
                                <button class="button button--small">Editar</button>
                                <button class="button button--small">Remover</button>
                            </td>
                        </tr>

                    </tbody>
                </table>

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