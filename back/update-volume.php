<?php
    include "./connection_update.php";
    
    $sql = "SELECT * FROM registers WHERE volume IS NOT NULL";
    $result = mysqli_query($connection, $sql) or die('Failed to return data');

    $registers = array();
    while ($listRegisters = mysqli_fetch_array($result)) {
        $registers[] = $listRegisters['volume'];
    }

    print $registers[count($registers) - 1];
    // print 0;
?>
