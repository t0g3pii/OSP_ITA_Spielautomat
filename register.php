<?php
    require("inc/db.inc.php");
    $st = $pdo->prepare( "INSERT INTO `user` (`username`, `pin`) VALUES (?, ?);" );
    $st->execute(array($_GET["username"], $_GET["pin"]));
    if (!$st->execute()) {
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'index.php?error=register';
        header("Location: http://$host$uri/$extra");
    } else {
        session_start();
        $_SESSION["UUID"] = $st->lastInsertId;
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'game.php';
        header("Location: http://$host$uri/$extra");
    }
?>