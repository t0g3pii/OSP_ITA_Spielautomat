<?php
define('DB_HOST', 'vweb18.nitrado.net');
define('DB_NAME', 'ni128208_2sql8');
define('DB_USERNAME', 'ni128208_2sql8');
define('DB_PASSWORD', 'Passwort');

$pdo = new PDO('mysql:host='.$DB_HOST.';dbname='.$DB_NAME.'', $DB_USERNAME, $DB_PASSWORD);
?>