<?php
    session_start();

    $activeSession = (!empty($_SESSION['activeSession'])) ? $_SESSION['activeSession'] : false;

    if (!$activeSession) {
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="styles/profile.css">

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;700&display=swap" rel="stylesheet">
    <title>Profile</title>
</head>
<body>
    <div class="container">
        <img class="profile" src="./img/profile.png" alt="Foto de perfil do usuário">
        <input class="username" type="text" name="username" value=" Beltrano" id="">
        <a href="#" class="logout"><img src="./img/sair.png" width="32px" alt=""></a>
        <a href="./">Página principal</a>
    </div>

    <div class="nav_tabs">
        <ul>
            <li>
                <input type="radio" name="tabs" id="tab1" class="rd_tabs" checked>
                <label for="tab1">Dados pessoais</label>
                <div id="datas" class="content">
                    <form action="" method="post">
                        <p>Foto de perfil</p>
                        <input type="url" name="" id="">
                        <p>Nome</p>
                        <input type="text">
                        <p>E-mail</p>
                        <input type="email" name="" id="">
                    </form>
                </div>      
            </li>
            <li>
                <input type="radio" name="tabs" id="tab2" class="rd_tabs">
                <label for="tab2">Usuários</label>
                <div class="content">
                    <form action="" method="POST">
                        <ul>
                            <li>
                                <p>Beltrano</p>
                                <p>Principal</p>
                                <a href="#">Entrar</a>
                            </li>
                            <li>
                                <p>Maria</p>
                                <p>Comum</p>
                                <a href="#">Entrar</a>
                            </li>
                            <li>
                                <p>Dieguinho</p>
                                <p>Comum</p>
                                <a href="#">Entrar</a>
                            </li>
                        </ul>
                    </form>
                </div>
            </li>
            <li>   
                <input type="radio" name="tabs" id="tab3" class="rd_tabs">
                <label for="tab3">Reservatórios</label>
                <div id="reservoir" class="content">
                    <form action="" method="POST">
                        <p>Nome</p>
                        <input type="text" value="Caixa d'Água 1000L" name="reservoir-name">
                        <p>Capacidade de armazenamento</p>
                        <input type="number" value="1000L" name="" id="">
                    </form>      
                </div>            
            </li>
            <li>   
                <input type="radio" name="tabs" id="tab4" class="rd_tabs">
                <label for="tab4">Configurações</label>
                <div class="content">
                    <p>
                         <a href="">Mudar senha</a>
                    </p>
                    <p>
                        <a href="">Apagar conta</a>
                    </p>
                   
                </div>
            </li>
        </ul>   
    </div>



<script src="./scripts.js"></script>
</body>
</html>
