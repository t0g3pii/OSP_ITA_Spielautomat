<?php
    require("inc/db.inc.php");
    $result = $pdo->query( "INSERT INTO `user` (`username`) VALUES ('".$_GET['username']."');" );
    echo $pdo->lastInsertId;
?>