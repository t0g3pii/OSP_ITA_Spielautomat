
<?php
require("inc/db.inc.php");
$st = $pdo->prepare( "SELECT username, credits, lastFree FROM `user` WHERE `UUID` = ?" );
$st->execute(array(103));
$data = $st->fetch();
$date = new DateTime($data['lastFree']);
$dateN = new DateTime();
$since_start = $dateN->diff($date);
$minutes = $since_start->days * 24 * 60;
$minutes += $since_start->h * 60;
$minutes += $since_start->i;
echo $minutes.' minutes';
if ($minutes > 1440) {
    echo "Mehr wie ein Tag";
    return true;
} else {
    echo "Weniger wie ein Tag";
    return false;
}
?>