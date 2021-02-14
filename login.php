<?php
    require("inc/db.inc.php");
    $st = $pdo->prepare( "SELECT * FROM `user` WHERE `username` = ? AND `pin` = ?" );
    $st->execute(array($_GET["username"], $_GET["pin"]));

    if ($st->rowCount() == 0) {
        $host  = $_SERVER["HTTP_HOST"];
        $uri   = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
        $extra = "index.php?error=login";
        header("Location: http://$host$uri/$extra");
    } else {
        session_start();
        $user = $st->fetch();
        $_SESSION["UUID"] = $user["UUID"];
        $host  = $_SERVER["HTTP_HOST"];
        $uri   = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
        $extra = "game.php";
        header("Location: http://$host$uri/$extra");
    }
?>