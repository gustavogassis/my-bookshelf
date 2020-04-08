
<!doctype html>
<html lang="pt-br">
    <head>
        <title>My Bookshelf - Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../css/reset.css" />
        <link rel="stylesheet" href="../../css/form.css" />
        <link rel="stylesheet" href="../../css/button.css" />
        <link rel="stylesheet" href="../../css/login.css" />
    </head>
    <body>
        <div class="container">
            <h1 class="login__logo">My Bookshelf</h1>
            <div class="content">
                <div class="login">
                    <form action="#" method="post">
                        <div class="form__group">
                            <label class="form__label" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form__control" placeholder="maria@empresa.com" autofocus />
                            <div class="form__error">Esse campo é obrigatório.</div>
                        </div>


                        <div class="form__group">
                            <label class="form__label" for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" class="form__control" />
                            <div class="form__error">Esse campo é obrigatório.</div>
                        </div>

                        <div class="form__text">
                            <a href="#" class="form__link">Esqueci minha senha</a>
                        </div>

                        <input type="submit" class="button button--primary button--block" value="Entrar" />
                    </form>
                </div>

                <div class="register">
                    <p class="register__text">Ainda não é um usuário?</p>

                    <a class="button button--block" href="#">Cadastre-se</a>
                </div>
            </div>
        </div>
    </body>
</html>