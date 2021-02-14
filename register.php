<?php
    require("inc/db.inc.php");
    $st = $pdo->prepare( "INSERT INTO `user` (`username`) VALUES ('".$_GET['username']."');" );
    if (!$st->execute()) {
        print_r($st->errorInfo());
    }
?>