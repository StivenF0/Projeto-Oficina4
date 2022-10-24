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
        <title>Tank Register - WaterView</title>

        <!-- APP ICON -->

        <!-- CSS STYLESHEETS -->
        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/tank-register.css">
        <link rel="stylesheet" href="styles/modal.css">

        <!-- JQUERY -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <header>
            <nav class="navbar">
                <div class="img-container">
                    <img src="img/waterview-logo.svg" alt="">
                </div>
                <ul class="links">
                    <li>
                        <a href="index.html">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Página Inicial</span> 
                        </a>
                    </li>
                    <li>
                        <a href="history.html">
                            <i class="fa fa-calendar-o" aria-hidden="true"></i>
                            <span>Histórico Mensal</span> 
                        </a>
                    </li>
                    <li>
                        <a href="profile.html">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> <span>Perfil</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>

        <main>
            <h1>Cadastro de reservatório</h1>

            <form action="back/tank-register-back.php" method="POST">
                <div class="form-part-one">
                    <p><input type="text" placeholder=" " id="idNumber" name="nNumber" class="inputs"><label for="idNumber">Número de série </label></p>
                    <p><input type="number" min="1" id="idCapacity" name="nCap" class="inputs" placeholder=" "><label for="idCapacity">Capacidade (L) </label></p>
                    
                </div>

                <p class="user-p">
                    <select name="nShape" id="idShape">
                        <option value="default" disabled selected>Formato da caixa</option>
                        <option value="1">Quadrática</option>
                        <option value="2">Circular</option>
                    </select>
                </p>

                <div class="form-part-one part-two" id="opts">
                    <p id="opt1"><input type="text" placeholder=" " id="idDimensions1" name="nDimQua" class="inputs"><label id="dimensionsLabel" for="idDimensions">Dimensões (C x L x H)</label></p>
                    <p id="opt2"><input type="text" placeholder=" " id="idDimensions2" name="nDimCir" class="inputs"><label id="dimensionsLabel" for="idDimensions">Dimensões (R x H)</label></p>
                </div>

                <p class="user-p">
                    <select name="nUser" id="idSel">
                        <option value="default" disabled selected id="selected">Selecione o usuário</option>
                        
                        <?php 
                            require('back/conection.php');

                            try {
                                $sql = $pdo->query("SELECT id, nome FROM users");
                                $result = $sql->fetchAll(PDO::FETCH_OBJ);

                                foreach ($result as $user) {
                                    print "<option value='" . $user->id . "'>" . $user->nome . "</option>";
                                }
                            } catch (PDOException $e) {
                                print "<option value=''>" . $e->getMssage() . "</option>";
                            }
                        ?>
                    </select>
                </p>

                <input type="submit" value="Cadastrar" id="subBtn" disabled>
            </form>
        </main>

        <!-- MODAL -->
        <div class="outside" id="div-outside">
            <div class="inside" id="div-inside">
                <p><?php print $_SESSION['tankRegistered']; ?></p>
            </div>
        </div>

        <script src="scripts/tank-register.js"></script>

        <?php
            $registered = (!empty($_SESSION['tankRegistered'])) ? $_SESSION['tankRegistered'] : false;

            if ($registered) {
        ?>
                <script src="scripts/modal.js"></script>        
        <?php
                $_SESSION['tankRegistered'] = NULL;
            }
        ?>
    </body>
</html>
