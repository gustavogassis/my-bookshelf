<?php

require_once "../login/check-login.php";

isLogged();

$username = $_SESSION["user"];

?>

<!doctype html>
<html lang="pt-br">
    <head>
        <title>My Bookshelf</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../css/reset.css" />
        <link rel="stylesheet" href="../../css/button.css" />
        <link rel="stylesheet" href="../../css/layout.css" />
        <link rel="stylesheet" href="../../css/dashboard.css" />
    </head>
    <body>
        <div class="container">
            <header class="header">
                <h1><a href="#" class="header__logo">My Bookshelf</a></h1>
                <form action="../login/logout.php" method="post">
                    <button class="button header__button">Logout</button>
                </form>
            </header>
            <main class="content">
                <h2 class="content__title">Bem Vindo ao My Bookshelf, <?= $username ?>!</h2>

                <div class="dashboard">
                    <a href="../books/index.php" class="dashboard__item">Acesse seus livros</a>
                    <a href="../books/create-book.php" class="dashboard__item">Cadastre novos livros</a>
                </div>
            </main>
            <footer class="footer footer__dashboard">
                <p class="footer__text">&copy2020 Copyright: mybookshelf.com</p>
            </footer>
        </div>
    </body>
</html>