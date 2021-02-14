<?php
    error_reporting( E_ALL );
    require("inc/db.inc.php");
    $result = $pdo->query( "INSERT INTO `user` (`username`) VALUES ('".$_GET['username']."');" );
    print_r( $result );
?>