<?php require_once "functions.php";
if (isset($_POST['acessar'])) {
    login($connect);
}
if (isset($_POST['cadastrar'])) {
    inserirUsuarios($connect);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/stile.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coleira Tec</title>
</head>

<body>
    <div class="container">
        <!-- Texto de boas-vindas centralizado -->
        <h1 class="welcome-text">Bem-vindo ao Coleira Tec.</h1>

        <div class="form-container">
            <form method="post">
                <fieldset>
                    <legend>Entrar</legend>
                    <input type="email" name="email" placeholder="Informe seu E-mail" required></input>
                    <input type="password" name="senha" placeholder="Insira sua senha" required></input>
                    <input type="submit" name="acessar" value="acessar"></input>
                </fieldset>
            </form>

            <form method="post">
                <fieldset>
                    <legend>Iniciar Jornada</legend>
                    <input type="text" name="nome" placeholder="nome" required></input>
                    <input type="email" name="email" placeholder="Informe seu E-mail" required></input>
                    <input type="password" name="senha" placeholder="Insira sua senha" required></input>
                    <input type="password" name="repetesenha" placeholder="Comfime sua senha" required></input>
                    <input type="celular" name="celular" placeholder="celular" required></input>
                    <input type="submit" name="cadastrar" value="cadastrar"></input>
                </fieldset>
            </form>
        </div>
    </div>
</body>

</html>