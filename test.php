
<?php
require("inc/db.inc.php");

$st = $pdo->prepare( "SELECT username, credits, lastFree FROM `user` WHERE `UUID` = ?" );
$st->execute(array(103));
$data = $st->fetch();

$date = new DateTime($data['lastFree']);
$dateN = new DateTime();

echo $date->format('Y-m-d H:i:s') ."</br>";
echo $dateN->format('Y-m-d H:i:s') ."</br></br>";

$since_start = $dateN->diff($date);
echo $since_start->days.' days total<br>';
echo $since_start->y.' years<br>';
echo $since_start->m.' months<br>';
echo $since_start->d.' days<br>';
echo $since_start->h.' hours<br>';
echo $since_start->i.' minutes<br>';
echo $since_start->s.' seconds<br><br>';

$minutes = $since_start->days * 24 * 60;
$minutes += $since_start->h * 60;
$minutes += $since_start->i;
echo $minutes.' minutes';
?>