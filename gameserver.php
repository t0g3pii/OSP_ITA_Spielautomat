<?php
    session_start();
    if (!isset($_SESSION["UUID"])) {
        exit("ERROR! Bitte erneut anmelden!");
    }

    if ($_POST["action"]=="getData") {
        require("inc/db.inc.php");
        $st = $pdo->prepare( "SELECT username, credits, lastFree FROM `user` WHERE `UUID` = ?" );
        $st->execute(array($_SESSION["UUID"]));
        $data = $st->fetch();
        echo json_encode($data);
    }
?>