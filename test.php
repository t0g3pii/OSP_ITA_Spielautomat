<?php
$hostname="vweb18.nitrado.net";
$username="ni128208_2sql8";
$password="Passwort";
$db = "ni128208_2sql8";
try {
$dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
$sql = "SELECT lastFree FROM ni128208_2sql8";
$time = $dbh->query($sql);
foreach ($time as $row) {
    $date = new DateTime($row['lastFree']);
    $dateN = new DateTime();

    if ($date > $dateN) {
        echo $date . " größer als " . $dateN;
    } else {
        echo $date . " kleiner als " . $dateN;
    }
}
} catch (PDOException $e) {
    echo $e;
}
?>