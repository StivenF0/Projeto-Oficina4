<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- BASIC META -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- RESPONSIVE META -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- APP INFO -->
        <meta name="author" content="Acsa Cibelly Carvalho Bezerra, Eduardo Aquino da Silva, Stiven Felipe Câmara Fonseca">
        
        <!-- PAGE TITLE -->
        <title>Profile Register - WaterView</title>

        <!-- APP ICON -->

        <!-- CSS STYLESHEETS -->
        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/register.css">
        <link rel="stylesheet" href="styles/modal.css">

        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <header>
            <nav class="navbar">
                <div class="img-container">Img</div>
                <ul class="links">
                    <li><i class="fa fa-calendar-o" aria-hidden="true"></i> <a href="./">Página Inicial</a> </li>
                    <li><i class="fa fa-calendar-o" aria-hidden="true"></i> <a href="history.html">Histórico Mensal</a> </li>
                    <li><i class="fa fa-user-circle-o" aria-hidden="true"></i> <span><a href="">Perfil</a></span></li>
                </ul>
            </nav>
        </header>

        <main>
            <h1>Cadastro de perfil</h1>

            <form action="back/profile-register-back.php" method="POST">
                <div class="form-part-one">
                    <p><input type="text" placeholder=" " id="profile-name" name="nName" class="inputs" required><label for="profile-name">Nome</label></p>
                    <p><input type="password" min="1" id="password" name="nPasswd" class="inputs" placeholder=" " required><label for="password">Senha</label></p>
                    
                    <p><input type="email" placeholder=" " id="profile-email" name="nEmail" class="inputs" required><label id="emailLabel" for="profile-email">E-mail</label></p>
                </div>

                <p id="user-p">
                    <!-- with php and database this will be different -->
                    <select name="nType" id="idSel" required>
                        <option value="default" disabled selected id="selected">Tipo de usuário</option>
                        <option value="admin">Administrador</option>
                        <option value="comum">Comum</option>
                    </select>
                </p>

                <input type="submit" value="Cadastrar" id="subBtn" disabled>
            </form>
        </main>

        <!-- MODAL -->
        <div class="outside" id="div-outside">
            <div class="inside" id="div-inside">
                <p><?php print $_SESSION['profileRegistered']; ?></p>
            </div>
        </div>

        <script src="scripts/profile-register.js"></script>

        <?php
            $registered = (!empty($_SESSION['profileRegistered'])) ? $_SESSION['profileRegistered'] : false;

            if ($registered) {
        ?>
                <script src="scripts/modal.js"></script>        
        <?php
                $_SESSION['profileRegistered'] = NULL;
            }
        ?>
    </body>
</html>
