<?php
    session_start();
    if (!isset($_SESSION["UUID"])) {
        exit("ERROR! Bitte erneut anmelden!");
    }

    require("inc/db.inc.php");
    if ($_POST["action"]=="getData") {
        $st = $pdo->prepare( "SELECT credits FROM `user` WHERE `UUID` = ?" );
        $st->execute(array($_SESSION["UUID"]));
        $data = $st->fetch();
        exit(json_encode($data));
    } elseif ($_POST["action"]=="getFree") {
        $st = $pdo->prepare( "UPDATE `user` SET `credits`=`credits` + 100, `lastFree`=CURRENT_TIMESTAMP WHERE  `UUID`=?" );
        $st->execute(array($_SESSION["UUID"]));
        exit("success");
    } elseif ($_POST["action"]=="logout") {
        session_destroy();
        exit("success");
    }
?>