<?php
    session_start();

    include 'connection.php';

    try {
        $sql = $pdo->query("SELECT * FROM `users` WHERE BINARY `nome` = '" . $_POST['nUser'] . "' AND passwd = md5('" . $_POST['nPasswd'] . "')");
        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        if (count($result) == 1) {
            $_SESSION['activeSession'] = true;
            $_SESSION['user'] = $_POST['nUser'];
            foreach($result as $user) {
                $_SESSION['permission'] = $user->permission;
            }
            $_SESSION['error'] = false;
            print 'All Done!';
        } else {
            $_SESSION['activeSssion'] = false;
            $_SESSION['error'] = true;
        }
    } catch(PDOException $e) {
        print '<strong>ERRO: </strong>' . $e->getMessage() . ".";
        $_SESSION['error'] = true;
    }

    header('Location: ../login.php');
?>
