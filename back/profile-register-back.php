<?php
    session_start();

    if (!isset($_POST['nName']) or !isset($_POST['nPasswd']) or !isset($_POST['nEmail']) or !isset($_POST['nType'])) {
		header("Location: ../profile-register.php");
		exit;
	}

    require('conection.php');

    try {
        $sql = $pdo->query("INSERT INTO users(id, nome, email, passwd, permission) VALUES (default, '" . $_POST['nName'] . "', '" . $_POST['nEmail'] . "', md5('" . $_POST['nPasswd'] . "'), '" . $_POST['nType'] . "')");

        $_SESSION['profileRegistered'] = "Cadastro realizado com sucesso.";
    } catch (PDOException $e) {
        $_SESSION['profileRegistered'] = '<strong>ERRO</strong><br/><br/>' . $e->getMessage();
    }

    header('Location: ../profile-register.php');
?>
