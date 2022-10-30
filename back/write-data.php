<?php
    if ($_REQUEST['data'] != "") {
        switch ($_REQUEST['data']) {
            case "1":
                $action = "1";
                break;
            case "0":
                $action = "0";
                break;
        }

        for ($a = 1; $a <= 20; $a++) {
            if (file_exists("COM" . $a)) {
                $arduinoConnection = fopen("COM$a", "w");
                fwrite($arduinoConnection, $action);
                fclose($arduinoConnection);
            }
        }
    }
?>
