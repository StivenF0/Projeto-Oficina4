<?php
    session_start();

    $activeSession = !empty($_SESSION['activeSession']) ? $_SESSION['activeSession'] : false;

    if ($activeSession) {
        header('Location: index.html');
    }

    $error = !empty($_SESSION['error']) ? $_SESSION['error'] : false;
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fazer Login</title>
        <link rel="stylesheet" href="styles/login.css">
        <script src="scripts/login.js" defer></script>
    </head>
    <body>
        <form class="form" action="back/login-back.php">
            <div>
                <h1>Login</h1>
            </div>
            <div>
                <input type="text" id="user" name="nUser" placeholder=" ">
                <label for="user">Usuário</label>
            </div>
            <div>
                <input type="password" id="password" name="nPasswd" placeholder=" ">
                <label for="password">Senha</label>
                <input type="checkbox" id="passToggle">
                <label for="passToggle"></label>
            </div>

            <?php
                if ($error) {
            ?>  
                    <div>
                        <p class="error">Usuário ou senha inválido</p>
                    </div>
            <?php
                }
            ?>

            <div>
                <input type="checkbox" id="check" name="nKeeCon">
                <label for="check">Manter conectado</label>
            </div>
            <div>
                <input type="submit" value="Entrar">
            </div>
        </form>
    </body>
</html>
