<?php
    $host = "localhost";
    $dbname = 'oficinas40_testes';
    $username = 'oficinas40';
    $password = 'oficinas40password';

    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    $sql = $pdo->query("SELECT volume FROM registers");
    $result = $sql->fetchAll(PDO::FETCH_OBJ);

    $lastVolume = NULL;
    foreach ($result as $register) {
        $lastVolume = $register->volume;
    }

    print $lastVolume;
?>
