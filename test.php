
<?php
require("inc/db.inc.php");

$st = $pdo->prepare( "SELECT username, credits, lastFree FROM `user` WHERE `UUID` = ?" );
$st->execute(array(103));
$data = $st->fetch();

print_r($data['lastFree']);
?>