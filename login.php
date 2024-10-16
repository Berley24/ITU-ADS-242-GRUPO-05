<?php require_once "functions.php";
if (isset($_POST['acessar'])) {
    login($connect);
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coleira tec</title>
</head>

<body>
    <form action="" method="post">
        <fieldset>
            <legend>Painel de login</legend>
            <input type="email" name="email" placeholder="Informe seu E-mail" required></input>

            <input type="password" name="senha" placeholder="Insirá sua senha" required></input>

            <input type="submit" name="acessar" value="acessar"></input>

        </fieldset>
    </form>
</body>

</html>