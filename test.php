
<?php
require("inc/db.inc.php");

$st = $pdo->prepare( "SELECT username, credits, lastFree FROM `user` WHERE `UUID` = ?" );
$st->execute(array(103));
$data = $st->fetch();

$date = new DateTime($data['lastFree']);
$dateN = new DateTime();

echo $date ."</br>";
echo $dateN ."</br>";

?>