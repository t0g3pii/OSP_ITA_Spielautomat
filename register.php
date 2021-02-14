<?php
    require("inc/db.inc.php");
    $st = $pdo->prepare( "INSERT INTO `user` (`username`) VALUES ('".$_GET['username']."');" );
    if (!$st->execute()) {
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'index.php?error=username';
        header("Location: http://$host$uri/$extra");
    }
?>