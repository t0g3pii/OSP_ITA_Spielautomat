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
    } elseif ($_POST["action"]=="play") {
        $pdo->query("UPDATE `user` SET `credits`=`credits` - ".$_POST["stake"]." WHERE `UUID`=".$_SESSION["UUID"]);
        $st = $pdo->prepare( "SELECT * FROM `slots`" );
        $st->execute();
        $count = ($st->rowCount()) - 1;
        $win = 0;
        $roleone = rand(0, $count);
        $roletwo = rand(0, $count);
        $rolethree = rand(0, $count);
        if($roleone==$roletwo && $roleone==$rolethree) {
            $data = $st->fetchAll();
            $win = $_POST["stake"] * $data[$roleone]["win"];
            $pdo->query("UPDATE `user` SET `credits`=`credits` + ".$win." WHERE `UUID`=".$_SESSION["UUID"]);
        }
        exit(json_encode(array($roleone,$roletwo,$rolethree,$win)));
    }
?>