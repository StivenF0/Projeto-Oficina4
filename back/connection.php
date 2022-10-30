<?php
    try {
        $host = 'localhost';
        $database = 'oficinas40_testes';
        $username = 'oficinas40';
        $password = 'oficinas40password';

        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        print '<strong>Falha ao conectar Banco de Dados: </strong>' . $e->getMessage();
    }
?>
