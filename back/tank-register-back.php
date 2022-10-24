<?php
    session_start();

    if (!isset($_POST['nNumber']) or !isset($_POST['nCap']) or !isset($_POST['nShape']) or !isset($_POST['nUser'])) {
		header("Location: ../tank-register.php");
		exit;
	}

    $shape = $_POST['nShape'];
    if ($shape == '1') {
        $dimensions = $_POST['nDimQua'];
    } else if ($shape == '2') {
        $dimensions = $_POST['nDimCir'];
    } else {
        header('Location: ../tank-register.php');
    }

    require('conection.php');

    try {
        $sql = $pdo->query("INSERT INTO tanks(id, serial_number, capacity, dimensions) VALUES (default, '" . $_POST['nNumber'] . "', '" . $_POST['nCap'] . "', '" . $dimensions . "')");
        $tank_id = $pdo->lastInsertId();

        $sql2 = $pdo->query("INSERT INTO users_has_tanks(id, id_user, id_tank) VALUES (default, '" . $_POST['nUser'] . "', '" . $tank_id . "')");
    
        $_SESSION['tankRegistered'] = 'Cadastro realizado com sucesso.';
    } catch(PDOException $e) {
        $_SESSION['tankRegistered'] = '<strong>ERRO</strong><br/><br/>' . $e->getMessage() . ".";
    }

    header('Location: ../tank-register.php');
?>
