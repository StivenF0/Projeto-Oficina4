<?php
    $connection = mysqli_connect('localhost', 'oficinas40', 'oficinas40password', 'oficinas40_testes') or die('Failed to connect');
    mysqli_query($connection, "SET NAMES 'utf8'");
    mysqli_query($connection, 'SET character_set_connection=utf8');
    mysqli_query($connection, 'SET character_set_client=utf8');
    mysqli_query($connection, 'SET character_set_results=utf8');
?>
