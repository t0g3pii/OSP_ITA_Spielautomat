<?php
session_start();
if (!isset($_SESSION["UUID"])) {
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    session_destroy();
    exit();
}

echo $_SESSION["UUID"];