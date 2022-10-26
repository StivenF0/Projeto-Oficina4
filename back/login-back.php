<?php
    session_start();

    // Just testing with db now
    if (($_POST['nUser'] == 'Administrador') && ($_POST['nPasswd'] == 'admin')) {
        $_SESSION['activeSession'] = true;
        $_SESSION['user'] = $_POST['nUser'];
        $_SESSION['permission'] = 'Admin';
        $_SESSION['error'] = false;
    } else $_SESSION['error'] == true;

    header('Location: ../login.php');
?>
